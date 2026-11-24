<!DOCTYPE html>
<html>
    <head>
        <title>Grading system.</title>
    </head>
    <body>
       <h1>STUDENT'S GRADES.</h1>
        <form method="post">
            <label for="names">Names</label>
            <input type="text" id="names" name="names" required>
            <br><br>
            <label for="marks">Marks</label>
            <input type="number" name="marks" id="marks" required>
            <br><br>
            <button type="submit">Show Grade</button>
        </form>
        
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $names = $_POST['names'];
    $marks = $_POST['marks'];
switch(true){
case ($marks>=80 && $marks<=100):
    $grade = 'A';
 break;
case  ($marks>=70 && $marks<=79):
$grade ='B';
 break;
case ($marks>=60 && $marks<=69):
$grade ='C';
 break;
case ($marks>=50 && $marks<=59):
$grade ='D';
 break;
case ($marks>=40 && $marks<=49):
    $grade ='E';
 break;
case ($marks>=30 && $marks<=39):
$grade ='F';
 break;
default:
echo('invalid grade');
}
echo("<h2>RESULTS </h2>");
echo("Names: " . $names ."<br>");
echo("Marks: " . $marks . "<br>");
echo("Grade: ". $grade);
}
?>
    </body>
</html>