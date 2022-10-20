<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <link rel="stylesheet" href="../sass/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php

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


    if(isset($_POST['btnadmin']))
    {
    	$x=0;
    	 $email=$_POST['email'];
    	 $q=mysqli_query($conn,"select email from users");
    	 while($row=mysqli_fetch_array($q))
    	 {
    	 	if($row[0]==$email)
    	 	{
    	 		$x=1;
    	 	}
    	 	
    	 }

    	 if($x==0)
    	 {
          $q1=mysqli_query($conn,"select max(id) from users");
          $maxx=mysqli_fetch_array($q1);
          $id=$maxx[0]+1;
          $name=$_POST['name'];
          $pass=$_POST['pass'];
          $q2=mysqli_query($conn,"insert into users values(1,$id,'$name','$email','$pass')");
          echo '<script>alert("done");</script>';
         }
         else
         {
         	echo '<script>alert("the account already sing up");</script>';
         }

    }


?>
<body>
			
			<form method="post" action="admin.php">
            <button name="logout">تسجيل الخروج</button>
            </form>

            <form method="post" action="addadmin.php" id='form' style='color: white; font-size: 1.5rem;'>

            	name : <input type="name" name="name" style='border-radius: 1rem; padding: .5rem 1.5rem; width: 200px;'>
            	
            	email : <input type="email" name="email" style='border-radius: 1rem; padding: .5rem 1.5rem; width: 200px;'>
            	
            	password : <input type="password" name="pass" style='border-radius: 1rem; padding: .5rem 1.5rem; width: 200px;'>
            	
            	<input type="submit" name="btnadmin" style='padding: .5rem 2.5rem; border-radius: 1rem; 
                border: none; outlin: none; font-size: 1.5rem;font-weight: 800; color: blue'>
            </form>
            




</body>
</html>