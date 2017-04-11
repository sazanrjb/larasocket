<?php
return [
    "driver"   => "smtp",
    "host"     => "smtp.mailtrap.io",
    "port"     => 2525,
    "from"     => [
        "address" => "sazanrjb@example.com",
        "name"    => "Example",
    ],
    "username" => "53052f0c8a29c2063",
    "password" => "43ecd9caebd579",
    "sendmail" => "/usr/sbin/sendmail -bs",
    "pretend"  => false,
];