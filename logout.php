<?php
session_start();
session_destroy();
header('location:./index.php');
// if (session_destroy()){
//     header('location:./index.php');
// }