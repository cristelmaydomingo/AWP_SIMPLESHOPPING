<?php
require 'DB_config.php'; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Email = $_POST['Email'];

    // Validate input (you can add more validation)
    if (empty($Username) || empty($Password) || empty($Email)) {
        echo "All fields are required.";
    } else {
        $sql = "INSERT INTO users (Username, Password, Email) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Error: " . $conn->error);
        }

        $stmt->bind_param("sss", $Username, $Password, $Email);

        if ($stmt->execute()) {
            echo "Registration successful.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Shopping Registration</title>
</head>
<body>
<h2> Simple Shopping Registration </h2>
    <form action="User_Registration.php" method="post">
        <label for="Username">User Name:</label>
        <input type="text" name="Username" id="Username" required><br><br>

        <label for="Password">Password:</label>
        <input type="text" name="Password" id="Password" required><br><br>

        <label for="Email">Email:</label>
        <input type="text" name="Email" id="Email" required><br><br>

        <input type="submit" value="Register">
    </form>

</body>
</html>