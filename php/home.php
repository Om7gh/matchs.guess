
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ملك التوقعات</title>
    <link rel="stylesheet" href="../sass/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>
<?php
    session_start();
    $char=substr($_SESSION['name'],0,1);

    if(isset($_POST['logout']))
    {
        $_SESSION['name']="";
        header("Location: login.php");
    }

    ?>
<body>
    <div class="box">
        <nav class="navbar">
         
            <div class="logo">
            <div class="menu">
                <span></span><span></span><span></span>
            </div></i><h1>ملك التوقعات</h1></div>
           <ul class="lists">
            <li><a href="home.php" style="color:white;">الرئيسية</a></li>
            <li><a href="match.php">جدول المباريات</a></li>
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
           <!-- <div class="toogle">
           <i class="fa-solid fa-bars"></i>
           </div> -->
        </nav>

        <!-- hero content  -->
        <div class="hero">
            <div class="intro">
                <h1>مرحبا عزيزي الزائر على موقعنا</h1>
            </div>
            <div class="middle">
                <p>ملك التوقعات يقدم لك مبارات حصرية و مشوقة من مختلف الفرق و الدوريات</p>
                <p>و يقدم ايضا ميزة توقع نتيجة مباراتك المفضلة من خلال معرفتك بظروف المباراة</p>
            </div>
            <div class="end">
                <button><a href="match.php">ابدء الان</a></button>
            </div>
           </div>
    </div>

    <script src="../javascript/index.js"></script>
</body>
</html>