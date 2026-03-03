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
            direction:rtl;
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
            top:1530px;
        }
        footer{
            width:100%;
            height:50px;
            line-height:50px;
            background-color:rgb(241, 232, 147);
            border-top:2px solid white;
            position:absolute;
            top:1900px;
            text-align:center;
        }

        div.scroll-container {
  /* background-color: #333; */
  overflow: auto;
  white-space: nowrap;
  padding: 10px;
  width:950px;
  margin-right:70px;
}

div.scroll-container img {
  padding: 10px;
}

.blinking{
    animation:blinkingText 7.2s infinite;
}
@keyframes blinkingText{
    30%{     color: #581;    }
    79%{    color: transparent; }
    50%{    color: transparent; }
    99%{    color:transparent;  }
    100%{   color: #463;    }
}
.blinking:hover {
  animation-play-state: paused;
}
    </style>



<script>
      

    </script>


</head>
<body>
          
<header style="direction:ltr">
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
                                    <ul class="drop-down"  style="top:55px;">
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
                                    <ul class="drop-down2"  style="top:55px;">
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
   $IMGquery="SELECT * FROM books";
   $result=mysqli_query($link,$IMGquery);
?>                

<div style="display:flex;justify-content:center;align-items:center;width:80%;height:350px;text-align:center;background-color:lightyellow;border:3px dashed red;border-radius:20%;margin:100px  100px;margin-right:150px;">
           <!--   <p onClick="document.getElementById('marquee').scrollamount('4');"  style="width:40px;height:40px;border:3px solid blue;transform:rotate(45deg);position:absolute;top:140px;left:40px;border-top:none;border-right:none;"></p>   <!-- left button -->
       <!--      <p  onClick="document.getElementById('marquee').scrollamount('4');"  style="width:40px;height:40px;border:3px solid blue;transform:rotate(45deg);position:absolute;top:140px;left:20px;border-bottom:none;border-left:none;margin-left:1050px;"></p>    <!-- right button -->

             <div class="scroll-container">
        <img src="image/books/<?php if($IMGrow=mysqli_fetch_array($result)) echo($IMGrow['bookimage']); ?>" alt="Forest"  style="width:200px;height:250px;" >
        <img src="image/books/<?php if($IMGrow=mysqli_fetch_array($result)) echo($IMGrow['bookimage']); ?>" alt="Northern Lights"   style="width:200px;height:250px;">
        <img src="image/books/<?php if($IMGrow=mysqli_fetch_array($result)) echo($IMGrow['bookimage']); ?>" alt="Mountains"  style="width:200px;height:250px;">
        <img src="image/books/<?php if($IMGrow=mysqli_fetch_array($result)) echo($IMGrow['bookimage']); ?>" alt="Cinque Terre"  style="width:200px;height:250px;">
        <img src="image/books/<?php if($IMGrow=mysqli_fetch_array($result)) echo($IMGrow['bookimage']); ?>" alt="Forest"  style="width:200px;height:250px;">
        <img src="image/books/<?php if($IMGrow=mysqli_fetch_array($result)) echo($IMGrow['bookimage']); ?>" alt="Northern Lights"  style="width:200px;height:250px;">
        <img src="image/books/<?php if($IMGrow=mysqli_fetch_array($result)) echo($IMGrow['bookimage']); ?>" alt="Mountains"  style="width:200px;height:250px;">
        
      </div>
             

       <a href="http://localhost/bookworm/wholeBooks.php" class="blinking"  style="width:80px;position:absolute;margin-top:10px;font-size:25px;right:50px;color:red;border-radius:10px;border-style:solid solid;">دیدن همه</a>      
</div>





<?php
   $query="SELECT * FROM books";
   $result=mysqli_query($link,$query);
   if($row=mysqli_fetch_array($result)) {
?>

                          <div>
                                  <p style="width:80%;height:200px;border:2px solid grey;position:absolute;margin-right:150px;background-color:white;">
                                    <a href="book_detail.php?id=<?php echo($row['bookcode']); ?>">
                                      <img src="image/books/<?php echo($row['bookimage']); ?>" alt="" style="width:140px;height:140px;margin:30px 50px;">
                                    </a>
                                       <span style="width:500px;height:100px;display:inline-block;position:absolute;margin-top:40px;color:purple;font-size:20px;"> <?php echo($row['name']); ?> </span>
                                         <span style="width:500px;;height:100px;display:inline-block;position:absolute;margin-top:80px;font-size:20px;"> <?php echo($row['author']); ?> </span>
                                           <span style="width:500px;;height:100px;display:inline-block;position:absolute;margin-top:115px;font-size:20px;"> <?php echo($row['genre']); ?> </span>
                                             <p style="width:500px;;height:100px;display:inline-block;position:absolute;margin-top:155px;font-size:20px;direction:ltr;right:-44px;"> <?php echo($row['agerange']); ?> </p>
                                        <a href="book_detail.php?id=<?php echo($row['bookcode']); ?>" style="width:80px;position:absolute;margin:150px 1250px;font-size:20px;">نشون بده</a>
                                 </p>
                          </div>
<?php } //if ?>




<?php
   $query="SELECT * FROM books WHERE bookcode=1015";
   $result=mysqli_query($link,$query);
   if($row=mysqli_fetch_array($result)) {
?>

            <div>
                   <p style="width:80%;height:200px;border:2px solid grey;position:absolute;margin-right:150px;background-color:white;margin-top:250px;">
                      <a href="book_detail.php?id=<?php echo($row['bookcode']); ?>">
                        <img src="image/books/<?php echo($row['bookimage']); ?>" alt="" style="width:140px;height:140px;margin:30px 50px;">
                      </a>
                              <span style="width:500px;;height:100px;display:inline-block;position:absolute;margin-top:40px;color:purple;font-size:20px;"> <?php echo($row['name']); ?> </span>
                                  <span style="width:500px;;height:100px;display:inline-block;position:absolute;margin-top:80px;font-size:20px;"> <?php echo($row['author']); ?></span>
                                     <span style="width:500px;;height:100px;display:inline-block;position:absolute;margin-top:115px;font-size:20px;"><?php echo($row['genre']); ?> </span>
                                         <p style="width:500px;;height:100px;display:inline-block;position:absolute;margin-top:405px;font-size:20px;direction:ltr;right:-44px;"><?php echo($row['agerange']); ?> </p>
                                  <a href="book_detail.php?id=<?php echo($row['bookcode']); ?>" style="width:80px;position:absolute;margin:400px 1250px;font-size:20px;">نشون بده</a>
                 </p>
            </div>
<?php } //if ?>




<?php
   $query="SELECT * FROM books WHERE bookcode=1021";
   $result=mysqli_query($link,$query);
   if($row=mysqli_fetch_array($result)) {
?>

                                               <div>
                                                       <p style="width:80%;height:200px;border:2px solid grey;position:absolute;margin-right:150px;background-color:white;margin-top:500px;">
                                                           <a href="book_detail.php?id=<?php echo($row['bookcode']); ?>">
                                                             <img src="image/books/<?php echo($row['bookimage']); ?>" alt="" style="width:140px;height:140px;margin:30px 50px;">
                                                           </a>
                                                                <span style="width:500px;;height:100px;display:inline-block;position:absolute;margin-top:40px;color:purple;font-size:20px;"><?php echo($row['name']); ?> </span>
                                                                    <span style="width:500px;;height:100px;display:inline-block;position:absolute;margin-top:80px;font-size:20px;"><?php echo($row['author']); ?> </span>
                                                                       <span style="width:500px;;height:100px;display:inline-block;position:absolute;margin-top:115px;font-size:20px;"><?php echo($row['genre']); ?> </span>
                                                                           <p style="width:500px;;height:100px;display:inline-block;position:absolute;margin-top:650px;font-size:20px;direction:ltr;right:-44px;"><?php echo($row['agerange']); ?> </p>
                                                                <a href="book_detail.php?id=<?php echo($row['bookcode']); ?>" style="width:80px;position:absolute;margin:650px 1250px;font-size:20px;">نشون بده</a>
                                                      </p>
                                               </div>
<?php } //if ?>








                                               <p class="fot">
            <div style="width:200px;height:200px;direction:ltr;border:2px dashed darkblue;border-radius:30%;position:absolute;top:1600px;left:150px; ">
            <p style="text-align:center;margin-top:20px;color:magenta;"><b>ما را در شبکه های </b></p>
            <p style="text-align:center;margin-top:20px;color:magenta;"><b>اجتماعی دنبال کنید </b></p>
            <img src="./image/telegramIcon.png" alt="" style="width:50px;height:50px;margin:25px 11px;">
            <img src="./image/InstagramIcon.png" alt=""  style="width:50px;height:50px;margin:25px 0px;margin-right:11px;">
           <a href="contact_us.php"> <img src="./image/MailIcon.png" alt=""  style="width:50px;height:50px;margin:25px 0px;"></a>
            </div>

                             <form action="action_contact_us.php" method="POST">
                                    <label style="position:absolute;width:350px;height:30px;border-bottom-right-radius:10px;border-bottom-left-radius:10px;font-size:18px;right:140px;top:816px;background-color:darkblue;color:white;text-align:center;">نظر و پیشنهاد خود را با ما در میان بگزار</label>
                                           <input type="text" name="fullname" id="fullname" placeholder="* نام خود را وارد کنید  " style="position:absolute;top:930px;right:50px;width:500px;text-align:right;border-radius:15px;border:2px solid grey;padding-right:10px;height:30px;font-size:15px;">
                                           <input type="text" name="emailaddress" id="emailaddress" placeholder="* ایمیل خود را وارد کنید  " style="position:absolute;top:980px;right:50px;width:500px;height:40px;text-align:right;border-radius:15px;border:2px solid grey;padding-right:10px;font-size:15px;">        
                                          <textarea name="commenttext" id="commenttext" cols="47" rows="5" placeholder="* پیام خود را اینجا تایپ کنید  " style="position:absolute;right:50px;top:1040px;text-align:right;border-radius:15px;border:2px solid grey;padding-right:10px;font-size:16px;"></textarea>
                                    <button style="position:absolute;width:97px;height:33px;;border-radius:10px;background-color:darkblue;color:white;font-size:17px;right:450px;top:1140px;">ثبت و ارسال</button>
                            </form>


     </p>
     <footer>
        <p style="font-size:17px;margin-left:250px;">تمامی حقوق وب سایت "بوک ورم" محفوظ می باشد و هرگونه کپی برداری از کل یا جـز آن بدون ذکر منبع خلاف قانون بوده و پیگرد قانونی دارد</p>
    </footer>


    
</body>
</html>