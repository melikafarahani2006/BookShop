<?php
session_start();

$link=mysqli_connect("localhost" , "root" , "" , "bookworm");
if(mysqli_connect_errno())
  exit("error :" .mysqli_connect_error());
mysqli_query($link , "SET NAMES UTF8"); ///farsi
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="./css/style.css">

   

    <title>کتابامون</title>
    <style>
        *{
            margin:0;
            padding:0;
            position:relative;
        }
        body{
            background-color:lightblue;
            background-image:url('./image/background.png');
            /* direction:rtl; */
            position:relative;
        }
        a{
            text-decoration:none;
        }
        a:hover{
            color:hotpink;
        }
        header{
            width:100%;
            height:100px;
            background-color: rgb(146, 235, 198);
            display:flex;
            align-items:center;
           justify-content:space-around;;
           flex-direction:row;
        }
        .topa>a{
            text-decoration:none;
            font-size:20px;
            color:black;
        }
        .topa>a:hover{
            color:hotpink;
        }
        .aboutUs{
            width:70px;
            height:100%;
            line-height:100px;
            border-left:1px solid white;
            border-right:1px solid white;
            font-size:19px;
            text-align:center;
            color:black;

        }
        .fot{
            width:100%;
            height:400px;
            background-color:rgb(241, 232, 147);
            position:absolute;
            top:1330px;
        }
        footer{
            width:100%;
            height:50px;
            line-height:50px;
            background-color:rgb(241, 232, 147);
            border-top:2px solid white;
            position:absolute;
            top:1700px;
            text-align:center;
        }

     

    </style>


</head>
<body>
          
<header>
        <img src="./image/logo.png" alt=""  style="width:150px;height:60px; ">
        <p>
            <form action="wholeBooks.php" method="GET">
            <input type="text" id="search" name="query" placeholder="دنبال چی می گردی؟" style="text-align:center;width:310px;height:39px; background:url('./image/input1.png') no-repeat center center; background-size:cover;border:none;">
           <button type="submit" style="visibility:hidden;"> <img src="./image/searchIcon.png" alt=""  style="width:30px;height:30px;visibility:visible; "> </button> 
            </form>
        </p>
        <a href="" class="aboutUs">درباره ما</a>
        <p style="height:100%;line-height:100px;width:40px;text-align:center;">
            <span style="font-size:20px;color:black;">09370670319</span>
        </p>
            <p style="border-right:1px solid white;height:115%;;line-height:100px">
            <img src="./image/phoneIcon.png" alt="" style="width:30px;height:30px;margin-right:40px;top:15px;">
            </p>
       <p class="topa">

        <?php
                 if(!(isset($_SESSION['state_login']) && $_SESSION['state_login']===true)) {?>
                   <a href="http://localhost/bookworm/register.php">ثبت نام   </a>
                   <span><b> / </b></span>

        <?php } ?>

       

        <?php
                 if(isset($_SESSION['state_login']) && $_SESSION['state_login']===true)
                 {
                    echo(" <a href='http://localhost/bookworm/logOut.php'>خروج   (". $_SESSION['firstname'] .") </a>");
                 }

                 else
                 echo("  <a href='http://localhost/bookworm/logIn.php'>ورود  </a>");
             ?>

        <!-- <a href="http://localhost/bookworm/logIn.php"> ورود </a> -->
        <img src="./image/homeIcon.png" alt=""  style="width:20px;height:20px; ">
        </p>
      
    </header>

                    <nav style="box-shadow: 8px 8px 5px lightblue;">
                            <ul class="navbar">
                                <li>
                                    <a href="http://localhost/bookworm/homePage.php">خانه</a>
                                </li>
                                <?php
                                     if(isset($_SESSION['state_login']) && $_SESSION['state_login']===true && $_SESSION['user_type']=='admin'){
                                                 echo(" <li><a href='http://localhost/bookworm/admin_products.php'> آپلود کتاب جدید  </a></li>");
                                                 echo(" <li><a href='http://localhost/bookworm/admin_Books_Management.php'> مدیریت کتاب ها  </a></li>");
                                     }
                                 ?>
                               
                                <li>
                                    <a href="http://localhost/bookworm/ourbooks.php">کتابامون</a>
                                </li>
                                <li>
                                    <a href="">ژانر ها</a>
                                    <ul class="drop-down">
                                    <?php 
                                         $query="SELECT * FROM books WHERE genre='ماجراجویی'";
                                         $result1=mysqli_query($link,$query);

                                         $query="SELECT * FROM books WHERE genre='فانتزی'";
                                         $result2=mysqli_query($link,$query);

                                         $query="SELECT * FROM books WHERE genre='زندگی نامه'";
                                         $result3=mysqli_query($link,$query);

                                         $query="SELECT * FROM books WHERE genre='فانتزی-ماجراجویی'";
                                         $result4=mysqli_query($link,$query);
                                        
                                         $query="SELECT * FROM books WHERE genre='کارآگاهی-معمایی'";
                                         $result5=mysqli_query($link,$query);

                                         $query="SELECT * FROM books WHERE genre='علمی تخیلی'";
                                         $result6=mysqli_query($link,$query);

                                         $query="SELECT * FROM books WHERE genre='رمان نوجوان'";
                                         $result7=mysqli_query($link,$query);

                                         $query="SELECT * FROM books WHERE genre='فانتزی جادویی'";
                                         $result8=mysqli_query($link,$query);
                                       
                                    ?>
                                        <li><a href="wholeBooks.php?genre=<?php if($row=mysqli_fetch_array($result1)) echo($row['genre']);  ?>">ماجراجویی</a></li>
                                        <li><a href="wholeBooks.php?genre=<?php if($row=mysqli_fetch_array($result2)) echo($row['genre']);  ?>">فانتزی</a></li>
                                        <li><a href="wholeBooks.php?genre=<?php if($row=mysqli_fetch_array($result3)) echo($row['genre']);  ?>">زندگی نامه</a></li>
                                        <li><a href="wholeBooks.php?genre=<?php if($row=mysqli_fetch_array($result4)) echo($row['genre']);  ?>">فانتزی/ماجراجویی</a></li>
                                        <li><a href="wholeBooks.php?genre=<?php if($row=mysqli_fetch_array($result5)) echo($row['genre']);  ?>">کارآگاهی/معمایی</a></li>
                                        <li><a href="wholeBooks.php?genre=<?php if($row=mysqli_fetch_array($result6)) echo($row['genre']);  ?>">علمی تخیلی</a></li>
                                        <li><a href="wholeBooks.php?genre=<?php if($row=mysqli_fetch_array($result7)) echo($row['genre']);  ?>">رمان نوجوان</a></li>
                                        <li><a href="wholeBooks.php?genre=<?php if($row=mysqli_fetch_array($result8)) echo($row['genre']);  ?>">فانتزی جادویی</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">رده سنی</a>
                                    <ul class="drop-down2">
                                    <?php 
                                         $query="SELECT * FROM books WHERE agerange='10 بالای'";
                                         $result1=mysqli_query($link,$query);

                                         $query="SELECT * FROM books WHERE agerange='14 بالای'";
                                         $result2=mysqli_query($link,$query);

                                         $query="SELECT * FROM books WHERE agerange='12 بالای'";
                                         $result3=mysqli_query($link,$query);

                                         $query="SELECT * FROM books WHERE agerange='12-7'";
                                         $result4=mysqli_query($link,$query);
                                        
                                         $query="SELECT * FROM books WHERE agerange='16 بالای'";
                                         $result5=mysqli_query($link,$query);

                                         $query="SELECT * FROM books WHERE agerange='10-100'";
                                         $result6=mysqli_query($link,$query);
                                       ?>
                                        <li><a href="wholeBooks.php?agerange=<?php if($row=mysqli_fetch_array($result1)) echo($row['agerange']);  ?>">10+</a></li>
                                        <li><a href="wholeBooks.php?agerange=<?php if($row=mysqli_fetch_array($result2)) echo($row['agerange']);  ?>">14+</a></li>
                                        <li><a href="wholeBooks.php?agerange=<?php if($row=mysqli_fetch_array($result3)) echo($row['agerange']);  ?>">12+</a></li>
                                        <li><a href="wholeBooks.php?agerange=<?php if($row=mysqli_fetch_array($result4)) echo($row['agerange']);  ?>">12-7</a></li>
                                        <li><a href="wholeBooks.php?agerange=<?php if($row=mysqli_fetch_array($result5)) echo($row['agerange']);  ?>">16+ </a></li>
                                        <li><a href="wholeBooks.php?agerange=<?php if($row=mysqli_fetch_array($result6)) echo($row['agerange']);  ?>">10-100 </a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">ارتباط با ما</a>
                                </li>
                                <li>
                                    <a href="contact_us.php">تماس با ما</a>
                                </li>
                              
                            </ul> 
                           </nav>










<?php


     
       $book_code=0;
       if(isset($_GET['id']))
       $book_code=$_GET['id'];
       $query="select * from books where bookcode='$book_code'";
       $result=mysqli_query($link,$query);
 ?>

   <table style="width:90%;text-align:center;position:relative;left:50px;">
   <tr>
<?php
   if($row=mysqli_fetch_array($result))
   {
?>

<td style="width:39%;text-align:left;position:relative;">
            <a href="book_detail.php?id=<?php echo($row['bookcode']) ?>"  class="box1">
              <p style="width:200px;height:550px;"><img src="image/books/<?php echo($row['bookimage']) ?>"  class="img1" style="padding:30px 25px;width:450px;height:600px;"> </p>     
            </a>
            <h2 style="color:hotpink;font-size:30px;position:absolute;top:60px;right:450px;"><?php echo($row['name']); ?></h2>
            </br></br>
         <span style="font-size:24px;position:absolute;right:450px;top:150px;">  کد کتاب :  <?php echo($row['bookcode']) ?> </span>  
      <span style="font-size:24px;position:absolute;right:450px;top:200px;">  نویسنده :  <?php echo($row['author']) ?> </span>  
      <span style="font-size:24px;position:absolute;right:450px;top:250px;">  مترجم  :  <?php echo($row['translator']) ?> </span> 
      <span style="font-size:24px;position:absolute;right:450px;top:300px;">  تعداد صفحه :  <?php echo($row['sheets']) ?> </span> 
      <span style="font-size:24px;position:absolute;right:450px;top:350px;"> :  رده سنی  </span> <span style="font-size:24px;position:absolute;right:540px;top:350px;"> <?php echo($row['agerange']) ?> </span> 
      <span style="font-size:24px;position:absolute;right:450px;top:400px;">  ژانر  :  <?php echo($row['genre']) ?> </span> 
      <span style="color:red;font-size:24px;position:absolute;right:450px;top:450px;">  تعداد موجودی :  <?php echo($row['bookqty']) ?> </span> 

      <a href="image/pdf/<?php echo($row['bookpdf']); ?>"   style="position:absolute;top:500px;right:450px;">
        <img src="./image/pdf.icon.png" alt="meee" style="width:40px;height:40px;"><span style="font-size:20px;color:blue;"> دانلود فایل به صورت</span>
      </a>

      <hr style="height:500px;width:3px;background-color:orange;position:absolute;top:70px;right:350px;">

      <hr style="height:3px;width:250px;background-color:orange;position:absolute;top:100px;right:20px;">
      <span style="font-size:24px;position:absolute;right:50px;top:150px;">  قیمت :  <?php echo($row['price']) ?> </span> &nbsp; <span style="position:absolute;right:210px;top:150px;font-size:23px;">تومان</span>
      <hr style="height:3px;width:250px;background-color:orange;position:absolute;top:230px;right:20px;">

      <b><a href="order.php?id=<?php echo($row['bookcode']) ?>"  style="width:250px;height:50px;line-height:50px;text-align:center;border-radius:20%;background-color:rgb(228, 241, 55);color:purple;text-decoration:none;font-size:24px;position:absolute;bottom:200px;left:1100px;">
        <marquee behavior="scroll" direction="right" scrolldelay="180">سفارش و خرید پستی</marquee>
      </a></b>

      <span style="position:absolute;right:70px;top:570px;font-size:28px;color:darkblue;"> : خلاصه  </span>
      <p style="width:1000px;height:240px;border-radius:50px;line-height:30px;padding:30px;border:1px solid red;background-color:rgb(243, 215, 174);position:absolute;right:40px;top:620px;text-align:right;direction:rtl;font-size:19px;">  <?php echo($row['summary']) ?> </p> 
     
</td>

<?php
   } //if
?>

</tr>
</table>




<p class="fot">
            <div style="width:200px;height:200px;direction:ltr;border:2px dashed darkblue;border-radius:30%;position:absolute;top:1400px;left:150px; ">
            <p style="text-align:center;margin-top:20px;color:magenta;"><b>ما را در شبکه های </b></p>
            <p style="text-align:center;margin-top:20px;color:magenta;"><b>اجتماعی دنبال کنید </b></p>
            <img src="./image/telegramIcon.png" alt="" style="width:50px;height:50px;margin:25px 11px;">
            <img src="./image/InstagramIcon.png" alt=""  style="width:50px;height:50px;margin:25px 0px;margin-right:11px;">
           <a href="contact_us.php"> <img src="./image/MailIcon.png" alt=""  style="width:50px;height:50px;margin:25px 0px;"></a>
            </div>

                           <form action="action_contact_us.php" method="POST">
                                    <label style="position:absolute;width:350px;height:30px;border-bottom-right-radius:10px;border-bottom-left-radius:10px;font-size:18px;right:140px;top:560px;background-color:darkblue;color:white;text-align:center;">نظر و پیشنهاد خود را با ما در میان بگزار</label>
                                           <input type="text" name="fullname" id="fullname" placeholder="* نام خود را وارد کنید  " style="position:absolute;top:620px;right:50px;width:500px;text-align:right;border-radius:15px;border:2px solid grey;padding-right:10px;height:30px;font-size:15px;">
                                           <input type="text" name="emailaddress" id="emailaddress" placeholder="* ایمیل خود را وارد کنید  " style="position:absolute;top:670px;right:50px;width:500px;height:40px;text-align:right;border-radius:15px;border:2px solid grey;padding-right:10px;font-size:15px;">        
                                          <textarea name="commenttext" id="commenttext" cols="47" rows="5" placeholder="* پیام خود را اینجا تایپ کنید  " style="position:absolute;right:50px;top:730px;text-align:right;border-radius:15px;border:2px solid grey;padding-right:10px;font-size:16px;"></textarea>
                                    <button style="position:absolute;width:97px;height:33px;;border-radius:10px;background-color:darkblue;color:white;font-size:17px;right:390px;top:870px;">ثبت و ارسال</button>
                         </form>


     </p>
     <footer>
        <p style="font-size:17px;margin-left:250px;">تمامی حقوق وب سایت "بوک ورم" محفوظ می باشد و هرگونه کپی برداری از کل یا جـز آن بدون ذکر منبع خلاف قانون بوده و پیگرد قانونی دارد</p>
    </footer>


    
</body>
</html>