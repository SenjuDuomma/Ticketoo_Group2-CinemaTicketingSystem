<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "ticketoo";

$conn = new mysqli($servername, $dBUsername, $dBPassword, $dBName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  ?>