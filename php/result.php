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

    if(isset($_POST['btnf']))
    {
        $uid=$_SESSION['id'];
        $mid=$_POST['hed'];
        $UTeamOne=$_POST['guess1'];
        $UTeamTwo=$_POST['guess2'];
        $insert=mysqli_query($conn,"insert into results values($uid,$mid,$UTeamOne,$UTeamTwo)");
        header('Location: result.php');
    }


    if($conn)
    {
        $ses=$_SESSION['id'];
        $q1=mysqli_query($conn,"select idteamone,idteamtwo,ateamone,ateamtwo,uteamone,uteamtwo from matchs,results where id=mid and uid=$ses");
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
            <li><a href="match.php">جدول المباريات</a></li>
            <li><a href="result.php" style="color:white;">توقع النتيجة</a></li>
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
        <!-- hero content  -->
        <?php

        while ($row=mysqli_fetch_array($q1)) {

            $q2=mysqli_query($conn,"select name from teams,matchs where teams.id=".$row[0]."");
            $n1=mysqli_fetch_array($q2);
            $q3=mysqli_query($conn,"select name from teams,matchs where teams.id=".$row[1]."");
            $n2=mysqli_fetch_array($q3);

            echo '<div class="guess-logo">';
            echo '<div class="match-logo">';
            echo '<div class="equipe equipe1">';
            echo '<img src="../images/'.$row[0].'.png" alt="" class="logo-equipe">';
            echo '<p>'.$n1[0].'</p>';
            echo '</div>';
            echo '<div class="result">';
            echo '<div class="show-results">';
            echo '<h1>نتيجة المباراة</h1>';
            echo '<div class="span-result">';
            if($row[2]==-1)
            {
                echo '<span>-</span>:<span>-</span>';
            }
            else
            {
                echo '<span>'.$row[2].'</span>';
                echo ':';
                echo '<span>'.$row[3].'</span>';

            }
            echo '</div>';
            echo '</div>';
            echo '<div class="user-guess">';
            echo '<h3>توقعك</h3>';
            if($row[2]==-1)
            {
                echo '<span>قيد الانتظار</span>';
            }
            else if($row[2]==$row[4] && $row[3]==$row[5])
            {
                echo "<span>صحيح</span>";
            }
            else
            {
                echo '<span>خطأ</span>';
            }
            echo '</div>';
            echo '</div>';
            echo '<div class="equipe equipe">';
            echo '<p>'.$n2[0].'</p>';
            echo '<img src="../images/'.$row[1].'.png" alt="" class="logo-equipe">';
            echo '</div>';
            echo '</div>';
            echo '</div>';


            }





        ?>


    </div>

    <script src="../javascript/index.js"></script>
</body>
</html>