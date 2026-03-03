<?php
//   session_start();

  
  $link=mysqli_connect("localhost" , "root" , "" , "bookworm");
  if(mysqli_connect_errno())
     exit("Error :" .mysqli_connect_error());
     mysqli_query($link , "SET NAMES UTF8"); ///farsi


    if(isset($_POST['fullname']) && !empty($_POST['fullname']) && 
        isset($_POST['emailaddress']) && !empty($_POST['emailaddress']) && 
        isset($_POST['commenttext']) && !empty($_POST['commenttext'])){

     $fullname=$_POST["fullname"];
     $emailaddress=$_POST["emailaddress"];
     $commenttext=$_POST["commenttext"];
    
  
        }
        else{
        echo("<script> alert('لطفا اطلاعات خود را کامل وارد کنید '); </script>");
?>
        
         <script>
              location.replace("contact_us.php");
          </script>
 <?php
          exit();
        } //else


  
        $query="INSERT INTO comments 
        (num,FullName,EmailAddress,CommentText)
        VALUES ('0', '$fullname', '$emailaddress' , '$commenttext') ";
        
  
  
        if(mysqli_query($link,$query)===true)  {
            echo("<script> alert('پیام شما در لیست پیام ها و نظرات کاربران سایت بوک ورم ثبت شد. پیشنهادات شما برای ما با اهمیت بوده و حتما آن را برای پیشرفت بهتر کارمون لحاظ می کنیم'); </script>");
        }
      
      else
      echo("<script> alert('پیام شما ارسال نشد . مجدد تلاش کنید'); </script>");
      
           mysqli_close($link);
?>

<script>
            location.replace("contact_us.php");
 </script>