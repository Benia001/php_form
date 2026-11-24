
<!DOCTYPE html
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title style="color: purple;">Quadratic equations</title>
<style>
    body{
        background-color: #ffff;
        font-family: arial,sans-serif;
        text-align: center;
        font-size: 30px;
        border-radius: 30px;
        border-color: #eaf;
    }
    h1{
        text-align: center;
    }
    p{
        font-size: 18px;
        text-align: center;
    }
    form{
        font-size: large;
        color: darkblue;
    }
    button{
        background-color: purple;
        color: white;
        font-size: large;
        font-style: italic;
        cursor: pointer;
        font-size: 40px;
    }
    h2{
        text-align: center;

    }
    .result {
        font-size: 20px;
        background-color: #eaf;
        text-align: center;
        border-radius: 50px;
        border-left: #eafa;
    }

</style>
</head>
<body>
    <h1 style="color: purple;">Quadratic Equations</h1>
    <p style="color: dark blue;">Please follow the instructions, make equations enjoyable!</p></P>
    <form method="POST" action="quadratic.php">
        <label for="a">a:</label>
        <input type="number" id="a" name="a" required>
        <br><br>
        <label for="b" >b:</label>
        <input type="number" id="b" name="b" required>
        <br><br>
        <label for="c">c:</label>
        <input type="number" id="c" name="c" required>
        <br><br>
        <button type="submit">Solve </button>
    </form>
    <?php
    if($_SERVER['REQUEST_METHOD']== 'POST'){
        $a = (float)$_POST["a"];
        $b = (float)$_POST["b"];
        $c = (float)$_POST["c"];

        $delta = ($b**2 - (4*$a*$c));

        echo "<div class='result'>";
           echo("<h2>RESULTS </h2>");
        echo("The Discriminant: " . $delta ."<br>");
        if($delta >0){
            $root1 = (-$b + sqrt($delta))/(2 * $a);
            $root2 = (-$b + sqrt($delta)) / (2 * $a);
            echo("There are two roots: ");
            echo ("<br>");
            echo "First root: " . $root1;
            echo "<br>";
            echo "Second root:" . $root2;
            
        }elseif($delta == 0){
            $root =(-$b /(2* $a));
            echo("There is exactly one root.");
            echo"<br>";
            echo"The root: " . $root;
        }else{
            echo("No root available.");
        }
     
    } 
     ?>
    
</body>
</html>