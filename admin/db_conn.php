<?php
$conn=new mysqli("localhost", "wetinde2_ucappa", "cappa@2024", "wetinde2_cappa");

if(mysqli_connect_errno()){
    printf("connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>