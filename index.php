<?php

include 'connection.php';

// Initialize variables to store input values and error messages
$name = $email = $phone = $password = "";
$nameError = $emailError = $passwordError = "";

if (isset($_POST['submit'])) {
    // Function to sanitize and validate input
    function sanitize_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Validate and sanitize form inputs
    $name = sanitize_input($_POST['name']);
    $email = sanitize_input($_POST['email']);
    $phone = sanitize_input($_POST['phone']);
    $password = sanitize_input($_POST['password']);

    // Validate name (minimum 8 characters, at least one uppercase letter, and at least one number)
    if (strlen($name) < 8 || !preg_match('/[A-Z]/', $name) || !preg_match('/[0-9]/', $name)) {
        $nameError = "Invalid name format. It must have a minimum of 8 characters, at least one uppercase letter, and at least one number.";
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
    }

    // Your existing database connection code
    // ...

    if (empty($nameError) && empty($emailError)) {
        // Only insert into the database if there are no validation errors
        $query = "INSERT INTO `persons`(`name`, `email`, `phone`, `password`) VALUES ('$name','$email','$phone','$password')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Data is inserted";
        } else {
            echo "Failed to insert data";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Form</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-5">
        <h2>Add Person</h2>

        <!-- Bootstrap Form -->
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
                <small class=" text-danger"><?php echo $nameError; ?></small>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <small class="text-danger"><?php echo $emailError; ?></small>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>