<?php
 session_start();


if(isset($_POST["username"]) && !empty($_POST["username"]) &&
   isset($_POST["password"]) && !empty($_POST["password"]))
    {
     $username=$_POST["username"];
     $password=$_POST["password"];
    
    // echo("<div style='background-color:pink;width:400px;height:200px'>username is:$username password is:$password repassword is:$repassword</div>");
    }

    else{
        exit("<script> alert('برخی فیلد ها مقداردهی نشده اند'); </script>");
    }

    $link=mysqli_connect("localhost" , "root" , "" , "bookworm");
    if(mysqli_connect_errno())
      exit("error :" .mysqli_connect_error());
    mysqli_query($link , "SET NAMES UTF8"); ///farsi
    $query="select * from users where username='$username' and password='$password'";
    $result=mysqli_query($link , $query);
    $row=mysqli_fetch_array($result);
    if($row){
        // echo("<p style='color:green'>کاربر گرامی {$row['firstname']} عزیز خوش آمدید</p>");
        $_SESSION["state_login"]=true;
        $_SESSION["firstname"]=$row["firstname"];
        $_SESSION["username"]=$row["username"];

        if($row["type"]==0)
        $_SESSION["user_type"]="public";
        else if($row["type"]==1)
        $_SESSION["user_type"]="admin";
    }
    else{
        echo("<script> alert('نام کاربری یا پسورد پیدا نشد!'); </script>");
    }
    mysqli_close($link);

    ?>

<script>
    location.replace("homePage.php");
</script>


    