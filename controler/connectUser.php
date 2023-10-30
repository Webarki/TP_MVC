<?php
$getUser = new User();
$getUser->email = $_SESSION['email'];
$user = $getUser->getUserMail();
