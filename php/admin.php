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
            <form method="post" action="admin.php">
            <button name="logout">تسجيل الخروج</button>
            </form>
            <button id="register"><a href="addadmin.php">انشاء حساب ادمن</a></button>
           
            </div>
        </nav>
        <div class="box1">
              <div class="box-admin-edit">
            <a href="edit.php">تعديل المباريات</a>
        </div>
        <div class="box-admin-edit">
        <a href="add.php">اضافة الفرق</a>
            
        </div>
        <div class="box-admin-edit">
        <a href="addresult.php">ادخال النتائج</a>
</div>
        </div>


        
    </div>

    <script src="../javascript/admin.js"></script>
</body>
</html>