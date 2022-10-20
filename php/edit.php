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
    $server="localhost";
    $user="root";
    $password="";
    $db="football";
    $conn=mysqli_connect($server,$user,$password,$db);

    if($conn)
    {
        $q=mysqli_query($conn,"select * from teams");
        $q1=mysqli_query($conn,"select * from teams");
        $q4=mysqli_query($conn,"select * from matchs where ateamone=-1");
    }

    if(isset($_POST['btnadd']))
    {
       $q2=mysqli_query($conn,"select max(id) from matchs");
       $maxx=mysqli_fetch_array($q2);
       $mm=$maxx[0]+1;
       $li=$_POST['ligue'];
       $t1=$_POST['teamo'];
       $t2=$_POST['teamt'];
       $q3=mysqli_query($conn,"insert into matchs values($mm,'$li',$t1,$t2,-1,-1)");
       header('Location: edit.php');
    }

    if(isset($_POST['delete']))
    {
        $h=$_POST['hedid'];
        $q7=mysqli_query($conn,"delete from matchs where id=$h");
        header('Location: edit.php');
    }

    if(isset($_POST['logout']))
    {
        $_SESSION['name']="";
        header("Location: login.php");
    }


?>
<body>

    <div class="box-admin">
   

        <nav style="display: flex; justify-content: space-between ">
            <div class="logo">
                مدير التوقعات
            </div>
            
           <div class="profil-info">
            <form method="post" action="edit.php">
            <button name="logout">تسجيل الخروج</button>
            </form>
           
            </div>
        </nav>


        <div class="box-edit">
            <div class="form-box">
                 <form action="edit.php" method="post">
                    <h2>اضافة مباراة</h2>
                    <select name="teamo">
                    <?php
                    while ($row=mysqli_fetch_array($q)) {
                        echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                    }
                    ?>
                    </select>
                    <select name="teamt">
                    <?php
                    while ($row=mysqli_fetch_array($q1)) {
                        echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                    }
                    ?>
                    </select>
                    <input type="text" placeholder="ligue" name="ligue" required="required">
                    <button type="submit" name="btnadd">انشاء مباراة</button>
                 </form>
                
            </div>
                <hr>
            <div class="output">
                    <table style="">
                    <tr style="">
                         <th style="">الفريق الاول</th>
                         <th style="">الفريق الثاني</th>
                         <th style="">الدوري</th>

                         <th style="">الشعار الفريق 1</th>
                         <th style="">الشعار الفريق 2</th>
                         <th style="">الخيار</th>
                     </tr>

                     <?php
                     while($row=mysqli_fetch_array($q4))
                     {
                        $q5=mysqli_query($conn,"select name from teams,matchs where teams.id=".$row[2]."");
                        $n1=mysqli_fetch_array($q5);
                        $q6=mysqli_query($conn,"select name from teams,matchs where teams.id=".$row[3]."");
                        $n2=mysqli_fetch_array($q6);
                        echo '<tr>';
                        echo '<td>'.$n1[0].'</td>';
                        echo '<td>'.$n2[0].'</td>';
                        echo '<td>'.$row[1].'</td>';
                        echo '<td><img src="../images/'.$row[2].'.png" style="width:100px;" alt="logo"></td>';
                        echo '<td><img src="../images/'.$row[3].'.png" style="width:100px;" alt="logo"></td>';
                        echo '<td>';
                        echo '<form action="edit.php" method="post">';
                        echo '<input type="hidden" name="hedid" value="'.$row[0].'" />';
                        echo '<button type="submit" name="delete" style="">حدف</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';

                     }


                     ?>

                     
                        


                    </table>
            </div>
        </div>
       
    </div>

    
</body>
</html>