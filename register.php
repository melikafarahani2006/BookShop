<?php
     session_start();
     if(isset($_SESSION['state_login']) && $_SESSION['state_login']===true){
?>

<script>
  location.replace("homePage.php");
</script>

<?php
     }
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <title>ثبت نام</title>
    <style>
        *,body{
            direction:rtl;
        }
         .cover{
            width:100%;
            height:100%;
            position:absolute;
            display:flex;
            /* align-items:center;
            justify-content:center; */
            top:10px;
            right:110px;
        }
        .register {
            width:50%;
            height:600px;
            border-radius:20px;
            background-color: rgba(235, 232, 194, 0.945);
            margin-top:15px;
            position:absolute;
             display:flex;
           flex-direction:row;
            flex-wrap:wrap;
            align-items:center;
            justify-content:space-around;

        }
        .inputImg{
          background:url("./image/input1.png") no-repeat center center ;
          background-size:cover;
          border:none;
          width:285px;
          height:35px;
          text-align:right;
          /* border-radius:30%; */
          
        }
        
    </style>
</head>
<body>

<script>
  
$('.carousel').carousel({
                  interval:1000,
                  keyboard:true,
            
              });

</script>


    <section>
        <img src="./image/mainBackground.jpg" alt=""  class="back" style="width:100%;height:100%;position:relative;opacity:0.5;">
        <a href="http://localhost/bookworm/homepage.php" ><img src="./image/exitIcon..png" style="position:absolute;top:10px;right:20px;width:50px;height:50px;"></a>

       
     <div class="cover">
        <form class="register"  name="register" action="action_register.php" method="POST">
          
                <div>
                         <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> نام :</p>
                         <input   class="inputImg"  type="text" id="firstname" name="firstname" placeholder="  نام را وارد کنید"  style="margin-right:10px;">
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                     <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> نام کاربری :</p>
                     <input   class="inputImg"  type="text" id="username" name="username" placeholder="  نام کاربری را وارد کنید"  style="margin-left:40px;">
                </div>


                <div>
                         <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> نام خانوادگی :</p>
                         <input  class="inputImg"  type="text" id="lastname" name="lastname" placeholder="  نام خانوادگی را وارد کنید">
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                     <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> گذرواژه :</p>
                     <input  class="inputImg"  type="password" id="password" name="password" placeholder="  گذرواژه را وارد کنید" style="margin-left:35px;">
                </div>


                <div>
                    <p style="text-align:right;font-size:20px;"><span style="color:red;margin-right:50px;">*</span>  تکرار گذرواژه :</p>
                     <input  class="inputImg"  type="password" id="repassword" name="repassword" placeholder="  تکرار گذرواژه را وارد کنید" style="margin-left:10px;">
                 
                  
                     <input  class="inputImg"  type="text" id="." name="."  style="visibility:hidden;">
                </div>


                <div>
                         <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> ایمیل :</p>
                         <input  class="inputImg"  type="text" id="email" name="email" placeholder="  ایمیل را وارد کنید"  style="margin-right:10px;">  
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       
                     <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span>  آدرس پستی :</p>
                     <input  class="inputImg" type="text" id="postaddress" name="postaddress" placeholder="  آدرس پستی را وارد کنید"  style="margin-left:35px;">
                </div>

                <div>
                         <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> شماره موبایل :</p>
                         <input  class="inputImg"  type="text" id="phonenumber" name="phonenumber" placeholder="  شماره موبایل را وارد کنید">
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       
                     <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> کد پستی :</p>
                     <input  class="inputImg" type="text" id="postcode" name="postcode" placeholder="  کد پستی را وارد کنید"  style="margin-left:30px;">
                </div>
              

                <div>
                       <p style="  width:200px;height:20px;"></p>
                         <input style="width:120px;height:45px;background:url('./image/submit1.png') no-repeat center center; background-size:cover;"  type="submit" id="submit" name="submit" value="">
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <!-- <input style="width:70px;height:50px;"  type="reset" id="reset" name="reset" > -->
                </div>
           
        </form>
     </div>


     <div id="carouselExampleSlidesOnly" class="carousel slide"  data-ride="carousel" style="width:550px;height:570px;position:absolute;left:0px;top:0px;opacity:0.8;">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./image/pic1.jpg" class="d-block w-100" alt="..." style="height:720px;">
    </div>
    <div class="carousel-item">
      <img src="./image/pic2.jpg" class="d-block w-100" alt="..."  style="height:720px;">
    </div>
    <div class="carousel-item">
      <img src="./image/pic9.jpg" class="d-block w-100" alt="..."  style="height:720px;">
    </div>
    <div class="carousel-item">
      <img src="./image/pic6.jpg" class="d-block w-100" alt="..."  style="height:720px;">
    </div>
  </div>
</div>


    </section>
</body>
</html>