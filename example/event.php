<?php
use Exinfinite\ServerEvent;
$count = 0;
ServerEvent::setEvent('userconnect');
while (true) {
    ServerEvent::shot("Server Sent Event round {$count}");
    $count++;
    sleep(3);
}
