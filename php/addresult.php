<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ملك التوقعات</title>
    <link rel="stylesheet" href="../sass/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <style>
        nav {
            display: flex;
            flex-direction: row-reverse;
            justify-content: space-between;
            align-items: center;
            height:10vh;
            padding:0 5rem;
        }
        nav .logo {
            font-size: 3rem;
            color: black;
            font-weight: 600;
        }
    </style>
</head>
<?php
    session_start();
    $server="localhost";
    $user="root";
    $password="";
    $db="football";
    $conn=mysqli_connect($server,$user,$password,$db);

    if ($conn) {
        $se=$_SESSION['id'];
        $q=mysqli_query($conn,"select * from matchs where ateamone=-1;");
    }

    if(isset($_POST['btna']))
    {
        $g1=$_POST['guess1'];
        $g2=$_POST['guess2'];
        $id=$_POST['hed'];
        $q3=mysqli_query($conn,"update matchs set ateamone=$g1,ateamtwo=$g2 where id=$id");
        echo '<script>alert("done");</script>';
        header('location: addresult.php');
    }

    if(isset($_POST['logout']))
    {
        $_SESSION['name']="";
        header("Location: login.php");
    }


?>
<body>
    <div class="box">

        <nav>
            <div class="logo">
                مدير التوقعات
            </div>
            <div class="profil-info">
            <form method="post" action="addresult.php">
            <button name="logout">تسجيل الخروج</button>
            </form>
            </div>
        </nav><?php

        while ($row=mysqli_fetch_array($q)) {

            $q1=mysqli_query($conn,"select name from teams,matchs where teams.id=".$row[2]."");
            $n1=mysqli_fetch_array($q1);
            $q2=mysqli_query($conn,"select name from teams,matchs where teams.id=".$row[3]."");
            $n2=mysqli_fetch_array($q2);

            echo '<div class="match match-admin">';
            echo '<div class="match-intro match-intro-admin">';
            echo '<h2>'.$row[1].'</h2>';
            echo '<h3><span>'.$n1[0].'</span>';
            echo ' vs ';
            echo '<span>'.$n2[0].'</span>';
            echo '</h3>';
            echo '</div>';
            echo '<div class="match-logo match-logo-admin">';
            echo '<div class="equipe equipe1">';
            echo '<img src="../images/'.$row[2].'.png" alt="" class="logo-equipe">';
            echo '<p>'.$n1[0].'</p>';
            echo '</div>';
            echo '<div class="guess">';
            echo '<button onclick="x('.$row[0].')">ادخال النتيجة</button>';
            echo '</div>';
            echo '<div class="equipe equipe">';
            echo '<p>'.$n2[0].'</p>';
            echo '<img src="../images/'.$row[3].'.png" alt="" class="logo-equipe">';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            




        }
        ?>
      
      

    </div>
        
    
 <form class="guess-box" style="display: flex; " method="post" action="addresult.php">
            <div class="guess-canal" style="flex-direction: row; gap: 5px; font:size: 1.5rem;">
                <input type="hidden" name="hed" id="hed"> 
                <input type="text" id="guess" name="guess1" placeholder="نتيجة الفريق الاول" style="width: 100px;" required="required">
                :
                <input type="text" id="guess1" name="guess2" placeholder="نتيجة الفريق الثاني" style="width: 100px;" required="required">
            </div>
            <button type="submit" id="guess-send" name="btna">تم</button>
        </form>


 <script>
        const guessBox = document.querySelector(".guess-box");
        const guessButton = document.querySelectorAll(".guess button"); 
        const doneButton = document.querySelector("#guess-send");
        const guessInput = document.querySelector("#guess");

        guessButton.forEach((button) => {
            button.addEventListener('click', function() {
                guessButton.forEach(button => {
                    guessBox.style.visibility = "visible"
                });
            });
        })


        function x(v)
        {
            document.getElementById("hed").value=v;
        }


    </script>
</body>
</html>