<?php
     

if(isset($_POST["username"]) && !empty($_POST["username"]) &&
   isset($_POST["firstname"]) && !empty($_POST["firstname"]) &&
   isset($_POST["lastname"]) && !empty($_POST["lastname"]) &&
   isset($_POST["password"]) && !empty($_POST["password"]) &&
   isset($_POST["repassword"]) && !empty($_POST["repassword"]) &&
   isset($_POST["phonenumber"]) && !empty($_POST["phonenumber"]) &&
   isset($_POST["postaddress"]) && !empty($_POST["postaddress"]) &&
   isset($_POST["postcode"]) && !empty($_POST["postcode"]) &&
   isset($_POST["email"]) && !empty($_POST["email"]))
    {
     $username=$_POST["username"];
     $firstname=$_POST["firstname"];
     $lastname=$_POST["lastname"];
     $password=$_POST["password"];
     $repassword=$_POST["repassword"];
     $phonenumber=$_POST["phonenumber"];
     $postaddress=$_POST["postaddress"];
     $postcode=$_POST["postcode"];
     $email=$_POST["email"];

    //  echo("<div style='background-color:pink;width:400px;height:200px'>username is:$username password is:$password repassword is:$repassword</div>");
    }

    else{
        exit("<script> alert('برخی فیلد ها مقداردهی نشده اند'); </script>");
    }
     
    if($password != $repassword)
    exit("<script> alert('رمز عبور با تکرار آن متشابه نیست'); </script>");
    if(filter_var($email,FILTER_VALIDATE_EMAIL)===false)
    exit("<script> alert('ایمیل به درستی وارد نشده است'); </script>");



   // echo("<div style='background-color:pink;width:400px;height:200px'>username is:$username password is:$password repassword is:$repassword</div>");
    
     
   $link=mysqli_connect("localhost","root","","bookworm");
   if (mysqli_connect_errno())
   {
       exit("error:".mysqli_connect_error());
   }
//    mysqli_query($link,"SET NAMES UTF8");
   mysqli_set_charset($link , "utf8");
   $query="INSERT INTO users(firstname,lastname,username,password,email,phone_number,post_address,post_code,type)
   VALUES('$firstname','$lastname','$username','$password','$email','$phonenumber','$postaddress','$postcode','0')";
   if(mysqli_query($link,$query)===true)
   echo("<script> alert(' ثبت نام با موفقیت انحام شد'); </script>");
   else
   echo("<script> alert('خطا در ثبت اطلاعات....مجدد تلاش کنید'); </script>");

   mysqli_close($link);
   ?>


<script>
    location.replace("homePage.php");
</script>



