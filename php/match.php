<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ملك التوقعات</title>
    <link rel="stylesheet" href="../sass/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php
    session_start();
    $char=substr($_SESSION['name'],0,1);

    if(isset($_POST['logout']))
    {
        $_SESSION['name']="";
        header("Location: login.php");
    }
    $server="localhost";
    $user="root";
    $password="";
    $db="football";
    $conn=mysqli_connect($server,$user,$password,$db);

    if ($conn) {
        $se=$_SESSION['id'];
        $q=mysqli_query($conn,"select * from matchs where id not in(select mid from results where uid=$se) and ateamone=-1;");
    }

    ?>
<body>
    <div class="box">
        <nav class="navbar">
        
            <div class="logo">  <div class="menu">
                <span></span><span></span><span></span>
            </div><h1>ملك التوقعات</h1></div>
           <ul class="lists">
            <li><a href="home.php">الرئيسية</a></li>
            <li><a href="match.php" style="color:white;">جدول المباريات</a></li>
            <li><a href="result.php">توقع النتيجة</a></li>
           </ul>
           <div class="profil">
            <div class="avatar"><span><?php echo $char; ?></span></div>
           </div>
           <div class="profil-info">
            <form method="post" action="home.php">
            <button name="logout">تسجيل الخروج</button>
            </form>
           </div>
        </nav>

        <!-- ads  -->

        <div class="ads ads1">
            <div class="title">
                <h1>مكان الاعلانات</h1>
            </div>
        </div>

        <div class="ads ads2">
        <div class="title">
                <h1>مكان الاعلانات</h1>
            </div>
        </div>
       
        <!-- macth content  -->
        
        <?php

        while ($row=mysqli_fetch_array($q)) {

            $q1=mysqli_query($conn,"select name from teams,matchs where teams.id=".$row[2]."");
            $n1=mysqli_fetch_array($q1);
            $q2=mysqli_query($conn,"select name from teams,matchs where teams.id=".$row[3]."");
            $n2=mysqli_fetch_array($q2);
            $x=1;
            echo '<div class="match">';
            echo '<div class="match-intro">';
            echo '<h2>'.$row[1].'</h2>';
            echo '<h3><span>'.$n1[0].'</span>';
            echo ' vs ';
            echo '<span>'.$n2[0].'</span>';
            echo '</h3>';
            echo '</div>';
            echo '<div class="match-logo">';
            echo '<div class="equipe equipe1">';
            echo '<img src="../images/'.$row[2].'.png" alt="" class="logo-equipe">';
            echo '<p>'.$n1[0].'</p>';
            echo '</div>';
            echo '<div class="guess">';
            echo '<button onclick="x('.$row[0].')">توقع النتيجة</button>';
            echo '</div>';
            echo '<div class="equipe equipe">';
            echo '<p>'.$n2[0].'</p>';
            echo '<img src="../images/'.$row[3].'.png" alt="" class="logo-equipe">';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $x++;



        }




        ?>



        <form class="guess-box" style="display: flex;" method="post" action="result.php">
            <div class="guess-canal" style="flex-direction: row; gap: 5px; font:size: 1.5rem;">
                <input type="hidden" name="hed" id="hed"> 
                <input type="text" id="guess" name="guess1" placeholder="نتيجة الفريق الاول" style="width: 100px;" required="required">
                :
                <input type="text" id="guess1" name="guess2" placeholder="نتيجة الفريق الثاني" style="width: 100px;" required="required">
            </div>
            <button type="submit" id="guess-send" name="btnf">تم</button>
        </form>
    </div>

    <div class="show-result">

    </div>
    <script src="../javascript/index.js"></script>
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