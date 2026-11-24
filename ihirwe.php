<!DOCTYPE html>
<html>
<head>
    <title>Student Registration form</title>
</head>
<body>
    <h1>Students' identification form</h1>
<form method="POST" action="">
    <label>First Name:</label>
    <input type="text" name="first_name"required>
    <br><br>
    <label>Last Name</label>
    <input type="text" name="last_name"required>
    <br><br>
    <label>Email</label>
    <input type="text"name="last_name"required>
    <br><br>
    <label>Date of Birth</label>
    <input type="date"name="dob"required>
    <label>Password</label>
    <input type="password" name="password"required>
    <br><br>
    <label>Hobbies</label>
    <input type="text" name="hobbies"required>
    <br><br>
    <button type="submit "name="register">
        register
    </button>

</form>
<?php
if(isset($_POST['register'])) {
    $first=htmlspecialchars($_POST['first_name']);
    $last=htmlspecialchars($_POST['last_name']);
    $email=htmlspecialchars($_POST['email']);
    $dob=htmlspecialchars($_POST['dob']);
    $hobbies=htmlspecialchars($_POST['hobbies']);
    
    echo"<h3>Registration Successful!</h3>";
    echo "Name:$first $last<br>";
    echo"<Email:$email<br>";
    echo"Date of birth:$dob<br>";
}
?>
</body>
</html>