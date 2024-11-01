<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlynhansu2";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn) {
    echo("" . mysqli_connect_error());
}
mysqli_query($conn, "SET NAMES 'UTF8'");

?>