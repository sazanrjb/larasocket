<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
  <!-- Styles -->
  <style>
    html, body {
      font-family: 'Raleway', sans-serif;
      background: #ebe9e7;
      height: 100vh;
      margin: 0;
    }

    .full-height {
      height: 100vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }

    .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
    }

    .content {
      text-align: center;
    }

    .title {
      font-size: 84px;
    }

    .m-b-md {
      margin-bottom: 30px;
    }

    [v-cloak] {
      display: none;
    }

    li {
      list-style-type: none;
      background: #fff;
      padding: 10px;
      border-bottom: 1px solid #dddfe2;
    }

    li.active {
      background: #edf2fa;
    }

    a {
      font-weight: 700;
      color: #1d2129;
    }

    h4 {
      font-size: 15px;
    }

    h3 {
      font-weight:800;
    }

    h5 {
      font-weight: 600;
      font-size:12px;
    }
    .description {
      color: #7d7272;
    }
    
    .container li:hover {
      background-color: #f3f3f3;
    }

    .logo {
      height: 57px;
      float:left;
    }

    .notif_body {
      margin-left: 70px;
    }
  </style>
</head>
<body>
<div id="app" v-cloak>
  <h1 class="content">Notifications</h1>
  <div class="container">
    <ul v-if="notifications.length">
      <li>
        <a @click="readAllNotification()" href="javascript:void(0)">Mark all notifications as read</a> <strong>&middot;</strong>
        <a href="javascript:void(0)" @click="fetchNotifications">Refresh</a>
      </li>
      <li v-for="notification in notifications" :class="{active: notification.read_at == null}">
        <img src="/images/agentcis_invert.png" alt="" class="logo"/>
        <div class="notif_body">
          <h4><a :href="notification.data.url">@{{ notification.data.notificationMessage }}</a></h4>
          <h5 class="description">@{{ notification.data.description }}</h5>
        </div>
      </li>
      <hr>
    </ul>
    <ul v-else>
      <li>No Notifications</li>
    </ul>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.6/vue.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.1/axios.min.js"></script>
<script>
  // request permission on page load
  document.addEventListener('DOMContentLoaded', function() {
    if (!Notification) {
      alert('Desktop notifications not available in your browser. Try Chromium.');
      return;
    }

    if (Notification.permission !== "granted")
      Notification.requestPermission();
  });
</script>
<script>
  var socket = io('http://127.0.0.1:3000');
  new Vue({
    el: '#app',

    data: {
      notifications: [],
      user: {},
    },

    methods: {
      notifyMe: function(data) {
        if (Notification.permission !== "granted")
          Notification.requestPermission();
        else {
          var notification = new Notification(data.task.title, {
            icon: '/images/agentcis_invert.png',
            body: data.task.description,
          });

          notification.onclick = function() {
            window.open('/notifications/' + data.task.id);
          };
        }

      },

      readAllNotification: function() {
        axios.get('/notifications/read')
                .then(function(response) {
                  if(response.data.status == true) {
                    this.fetchNotifications();
                  }
                }.bind(this));
      },

      fetchNotifications: function() {
        axios.get('/notifications/get-all')
                .then(function(response) {
                  this.notifications = response.data;
                }.bind(this));
      }
    },
    mounted: function() {
      socket.on('testChannel:App\\Events\\TaskCreated', function(data) {
        toastr.success('', data.user.name + ' created a new notification, ' + data.task.title);
        this.notifyMe(data);
      }.bind(this));

      this.fetchNotifications();
    }
  });
</script>
</body>
</html>
