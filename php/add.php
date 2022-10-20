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

<style>
 
    </style>

    <?php

    $server="localhost";
    $user="root";
    $password="";
    $db="football";
    $conn=mysqli_connect($server,$user,$password,$db);

    if(isset($_POST['addt']))
    {
        $q1=mysqli_query($conn,"select max(id) from teams");
        $maxx=mysqli_fetch_array($q1);
        $id=$maxx[0]+1;
        $equip=$_POST['equip'];
        $logo=$_FILES['logo'];
        $q2=mysqli_query($conn,"insert into teams values($id,'$equip')");
        copy($logo['tmp_name'],"D:/xampp/htdocs/omer/images/".$id.".png");   
        echo '<script>alert("done");</script>';
    }

    if(isset($_POST['logout']))
    {
        $_SESSION['name']="";
        header("Location: login.php");
    }


    ?>



<body>
    <div class="box-admin">

        <nav style="display: flex; justify-content: space-between">
            <div class="logo">
                مدير التوقعات
            </div>
            <div class="profil-info">
            <form method="post" action="add.php">
            <button name="logout">تسجيل الخروج</button>
            </form>
            </div>
        </nav>
     
      <form action="add.php" method="post" enctype="multipart/form-data" id="add-form">
        <h2>انشاء فريق جديد</h2>
        <input type="text" placeholder="ادخال الفريق" name="equip">
        <div>
            <label for="#">اختر شعار الفريق</label>
        <input type="file" name="logo">
        </div>
        <button type="submit" class="button" name="addt">انشاء فريق</button>
      </form>

       
    </div>

        
</body>
</html>