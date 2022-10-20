
<! DOCTYPE HTML>
<HTML>
     <head>
	      <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		  <title>Se connecter</title>
		  <link rel="stylesheet" type="text/css" href="../sass/style.css">
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	  </head>
<?php
session_start();
$server="localhost";
$user="root";
$password="";
$db="football";
$conn=mysqli_connect($server,$user,$password,$db);

$x=0;
if(isset($_POST['btn']))
{
  $x=1;
  $q=mysqli_query($conn,"select * from users");
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  while ($row=mysqli_fetch_array($q)) 
  {
    if($email==$row[3]&&$pass==$row[4])
    {
      $x=3;
      $_SESSION['id']=$row[1];
      $_SESSION['name']=$row[2];
      if($row[0]==0)
      {
      	header('location: home.php');
      }  
      else  
      {
      	header('location: admin.php');
      }
    }
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
		<form  method="post" action="login.php" id="form">
            <div class="title">سجل الدخول</div>
           
            <div class="inputs">
                <label for="email">البريد الاكتروني</label>
                <input type="email" id="email" name="email" required="required">
            </div>
            <div class="inputs">
                <label for="pass">كلمة السر</label>
                <input type="password" id="pass" name="pass" required="required">
            </div>
           
            
          
    
        
							<div>
							<?php 
							if($x==1)
							{
							echo '<div style="color:red;">The email or password is not correct, please try again.</div>';
							echo "<br>";

							}else
							{
							echo "";
								}
							?>							
							</div>
							<br> <div class="inputs">
							<button type="submit" name="btn" class="submit" > 
								تسجيل الدخول
								</button> 
            </div>
							
				  <div class="footer">
                <p style="color: #777">  ليس لديك حساب? <a href="register.php" style="color: white;">انشاء حساب</a></p>
            </div>  
                </p>										
						 </form>
                      
                  </div>
 			</div>
		  </body>	
</HTML>