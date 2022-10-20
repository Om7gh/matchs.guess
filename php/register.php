
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ملك التوقعات</title>
	  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../sass/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php
    session_start();
    $server="localhost";
    $user="root";
    $password="";
    $db="football";
    $conn=mysqli_connect($server,$user,$password,$db);


    if(isset($_POST['btnadmin']))
    {
        $x=0;
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $pass1=$_POST['pass1'];
        $q=mysqli_query($conn,"select email from users");
         while($row=mysqli_fetch_array($q))
         {
            if($row[0]==$email)
            {
                $x=1;
            }
            
         }

         if ($pass != $pass1) {
             $x=2;
         }

         if($x==0)
         {
          $q1=mysqli_query($conn,"select max(id) from users");
          $maxx=mysqli_fetch_array($q1);
          $id=$maxx[0]+1;
          $name=$_POST['name'];
          $q2=mysqli_query($conn,"insert into users values(0,$id,'$name','$email','$pass')");
          $_SESSION['id']=$id;
          $_SESSION['name']=$name;
          echo '<script>alert("done");</script>';
          header('location: home.php');
         }
         else if($x==1)
         {
            echo '<script>alert("the account already sing up");</script>';
         }else
         {
            echo '<script>alert("password not match");</script>';
         }



    }


?>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="logo"><h1>ملك التوقعات</h1></div>
            <div class="conn">
                <button type="submit" class="log"><a href="login.php">تسجبل الدخول </a></button>
                <button type="submit" class="reg"><a href="register.php">انشاء حساب</a></button>
            </div>
        </nav>
        <form  method="post" action="register.php" id="form">
            <div class="title">انشئ حسابك</div>
            <div class="inputs">
                <label for="username">اسم المستخدم</label>
                <input type="username" id="username" name="name" required="required">
            </div>
            <div class="inputs">
                <label for="email">البريد الاكتروني</label>
                <input type="email" id="email" name="email" required="required">
            </div>
            <div class="inputs">
                <label for="pass">كلمة السر</label>
                <input type="password" id="pass" name="pass" required="required">
            </div>
            <div class="inputs">
                <label for="cpass">اعادة كلمة السر</label>
                <input type="password" id="cpass" name="pass1" required="required">
            </div>
            
            <div class="inputs">
              <button type="submit" class="submit" name="btnadmin">انشئ حساب</button>
            </div>
            <div class="footer">
                <p style="color: #777"> لديك حساب مسبقا? <a href="login.php" style="color:white">سجل الدخول</a></p>
            </div>
        </form>
    </div>

    
</body>
</html>