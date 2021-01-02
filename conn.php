<?php

$conn = mysqli_connect('localhost', 'root', '', 'user_auth');

if(!$conn){
    die('Error occured ' . mysqli_error($conn));
}