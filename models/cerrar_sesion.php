<?php

    session_start();
    session_destroy();
    header("location:" . $host_name . "index");

?>