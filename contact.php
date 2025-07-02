<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST["name"]);
  $email = trim($_POST["email"]);
  $message = trim($_POST["message"]);

  if ($name && $email && $message) {
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
      echo "<script>alert('Message stored successfully!'); window.location.href='index.php';</script>";
    } else {
      echo "<script>alert('Failed to store message.'); window.location.href='index.php';</script>";
    }

    $stmt->close();
  } else {
    echo "<script>alert('All fields are required.'); window.location.href='index.php';</script>";
  }

  $conn->close();
}
?>
