
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grading System</title>
</head>
<body>

    <h1>STUDENT'S GRADES</h1>

    <form method="POST" action="">

        <label for="marks">Marks:</label>
        <input type="number" id="marks" name="marks"
               min="0" max="100" required>

        <button type="submit">Calculate Grade</button>

    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $marks = $_POST["marks"];

        switch (true) {

            case ($marks >= 80 && $marks <= 100):
                $grade = "A";
                $remark = "Excellent";
                break;

            case ($marks >= 70 && $marks < 80):
                $grade = "B";
                $remark = "Very Good";
                break;

            case ($marks >= 60 && $marks < 70):
                $grade = "C";
                $remark = "Good";
                break;

            case ($marks >= 50 && $marks < 60):
                $grade = "D";
                $remark = "Fair";
                break;

            case ($marks >= 40 && $marks < 50):
                $grade = "E";
                $remark = "Pass";
                break;

            case ($marks >= 0 && $marks < 40):
                $grade = "F";
                $remark = "Fail";
                break;

            default:
                $grade = "Invalid";
                $remark = "Invalid marks";
        }

        echo "<h2>RESULT</h2>";
        echo "Marks: " . $marks . "<br>";
        echo "Grade: " . $grade . "<br>";
        echo "Remark: " . $remark;

    }

    ?>

</body>
</html>
