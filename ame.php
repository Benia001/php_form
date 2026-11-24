
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>

    <h2>Student Registration Form</h2>

    <form method="POST" action="">
        <label>First Name:</label>
        <input type="text" name="first_name" required>
        <br><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" required>
        <br><br>

        <label>Email Address:</label>
        <input type="email" name="email" required>
        <br><br>

        <label>Date of Birth:</label>
        <input type="date" name="dob" required>
        <br><br>

        <label>Password:</label>
        <input type="password" name="password" required>
        <br><br>

        <button type="submit" name="register">
            Register
        </button>
    </form>

    <?php
    if (isset($_POST['register'])) {
        $first = htmlspecialchars($_POST['first_name']);
        $last = htmlspecialchars($_POST['last_name']);
        $email = htmlspecialchars($_POST['email']);
        $dob = htmlspecialchars($_POST['dob']);

        echo "<h3>Registration Successful!</h3>";
        echo "Name: $first $last <br>";
        echo "Email: $email <br>";
        echo "Date of Birth: $dob";
    }
    ?>

</body>
</html>
