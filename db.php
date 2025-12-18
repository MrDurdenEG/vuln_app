<?php

$conn = new mysqli("localhost", "root", "", "vuln_app");

if (!$conn) {
  die(mysqli_error($conn));
}

