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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/lib/splide.min.css">
    <link rel="stylesheet" href="static/css/main.css">  
    
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <script src="static/js/lib/splide.min.js"></script>
    <script src="static/js/lib/splide-extension-auto-scroll.min.js"></script>
    <script src="static/js/app.js"></script>

    <!-- <link rel="stylesheet"  href="http://cdn.font-store.ir/{{font.CDNfileName}}"> -->
    <title>Bookworm</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        a{
            text-decoration:none;
            color:darkblue;
        }
        a:hover{
            color:hotpink;
            text-decoration:none;
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
        /* .leftbtn{
            width:30px;
            height:20px;
            position:absolute;
            text-align:center;
            display:block;
            margin-left:910px;
            margin-top:130px;
        }
        .rightbtn{
            width:30px;
            height:20px;
            position:absolute;
            text-align:center;
            display:block;
            margin-left:1260px;
            margin-top:130px;
           
        }
        .leftbtn1{
            width:30px;
            height:20px;
            position:absolute;
            text-align:center;
            display:block;
            margin-left:70px;
            margin-top:130px;
        }
        .rightbtn1{
            width:30px;
            height:20px;
            position:absolute;
            text-align:center;
            display:block;
            margin-left:420px;
            margin-top:130px;
           
        } */
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
        .navbar li a {
     color: #131010 ;
     text-decoration: none;
     font-size: 17px;
       }
    .navbar li:hover .drop-down {
    border-radius: 5px;
    min-width: 175px;
    height: 320px;
    visibility: visible;
     }
     
    </style>

</head>
<body>

<script>

$('.carousel').carousel({
                  interval:1500,
                  keyboard:true,
            
              });





// suggestion box & the other
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}
</script>



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
            <img src="./image/phoneIcon.png" alt="" style="width:30px;height:30px;margin-right:40px;">
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
        <img src="./image/background.png" alt="" style="position:absolute;width:100%;height:832px;top:800px;">
    </header>

                           <nav style="box-shadow: 8px 8px 5px lightblue;">
                            <ul class="navbar">
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


    <section>
     <!-- <img src="./image/mainBackground.jpg" alt="" style="width:100%;height:700px;"> -->
                   
     <div id="slider" class="carousel slide" data-ride="carousel">      
                <ol class="carousel-indicators">
                  <li data-target="#slider" data-slide-to="0" class="active"></li>
                  <li data-target="#slider" data-slide-to="1"></li>         
                  <li data-target="#slider" data-slide-to="2"></li>        
                  <li data-target="#slider" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="./image/pic8.jpg" style="height:650px;">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="./image/pic11.jpg"  style="height:650px;">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="./image/pic13.jpg"  style="height:650px;">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="./image/mainBackground.jpg"  style="height:650px;">  
                  </div>
                </div>
                <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <!-- <span class="sr-only">Previous</span> -->
                </a>
                <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <!-- <span class="sr-only">Next</span> -->
                </a>
        </div>


     <p style="width:400px;height:400px;background-color:rgb(146, 235, 198);position:relative;top:-114px;left:90px;border-radius:20%;">
        <span style="width:150px;height:55px;background-color:rgb(146, 235, 198);position:absolute;padding:10px;border-radius:40%;;font-size:20px;color:darkblue;margin:-30px 120px;padding-left:30px;border-top-left-radius:70%;;border-top-right-radius:70%;"> <a href="wholeBooks.php"><b>تازه ترین ها</b></a></span>
        <!-- <a href=""> <img src="./image/mainLogo.jpg" alt="" style="width:400px;height:400px;padding:50px;margin-top:20px;"></a> -->

        <?php
                $query="SELECT bookimage FROM books WHERE bookcode>(SELECT MAX(bookcode)-4 FROM books)ORDER BY bookimage DESC";
                $result=mysqli_query($link,$query);
                 
        ?>
 
         <marquee behavior="alternate" id="marquee" scrollamount="4"  style="margin:0 50px;" scrolldelay="100" onmouseover="this.stop();" onmouseout="this.start();">
            <a href=""><img src="image/books/<?php if($row=mysqli_fetch_array($result)) echo($row['bookimage']); ?>" alt="" style="width:307px;height:276px;margin:50px 10px;"></a>
            <a href=""><img src="image/books/<?php if($row=mysqli_fetch_array($result)) echo($row['bookimage']); ?>" alt="" style="width:307px;height:276px;margin:50px 10px;"></a>
            <a href=""><img src="image/books/<?php if($row=mysqli_fetch_array($result)) echo($row['bookimage']); ?>" alt="" style="width:307px;height:276px;margin:50px 10px;"></a>
            <a href=""><img src="image/books/<?php if($row=mysqli_fetch_array($result)) echo($row['bookimage']); ?>" alt="" style="width:307px;height:276px;margin:50px 10px;"></a>
         </marquee>

     </p>
<?php  //if  ?>
       
       <div onClick="document.getElementById('marquee').setAttribute('direction','right');"  style="width:40px;height:40px;position:absolute;top:900px;left:115px;background-color:#d0cccc;font-size:35px;border-radius:100%;text-align:center;line-height:36px;cursor:pointer;"><</div>    <!--   left buttons -->
           <div onClick="document.getElementById('marquee').setAttribute('direction','left');"  style="width:40px;height:40px;position:absolute;top:900px;left:420px;background-color:#d0cccc;font-size:35px;border-radius:100%;text-align:center;line-height:36px;cursor:pointer;">></div>
       


        <img src="./image/mainLogo.jpg" alt="" style="width:400px;height:400px;padding:50px;margin:-320px 550px;position:absolute;border-radius:40%;">


        



        
    <p style="width:400px;height:400px;background-color:rgb(146, 235, 198);position:relative;top:-525px;left:1030px;border-radius:20%;">
        <span style="width:150px;height:55px;background-color:rgb(146, 235, 198);position:absolute;padding:10px;border-radius:40%;;font-size:22px;color:darkmagenta;margin:-30px 130px;padding-left:30px;border-top-left-radius:70%;;border-top-right-radius:70%;"> <a href="wholeBooks.php"><b>پیشنهاد ما</b>  </a></span>
        <!-- <a href=""> <img src="./image/mainLogo.jpg" alt="" style="width:400px;height:400px;padding:50px;margin-top:20px;"></a> -->
    
            <img class="mySlides" src="./image/books/سرزمین هزار دالان.jpg" style="position:absolute;padding:50px 50px;width:407px;height:376px;display:block;">
            <img class="mySlides" src="./image/books/پاستیل های بنفش.jpg" style="position:absolute;padding:50px 50px;width:407px;height:376px;">
            <img class="mySlides" src="./image/books/سفر به انتهای دنیا.jpg"  style="position:absolute;padding:50px 50px;width:407px;height:376px;display:block;">
            <img class="mySlides" src="./image/books/هری پاتر و زندانی آزکابان.jpg" style="position:absolute;padding:50px 50px;width:407px;height:376px;display:block;">

      
    </p>
        
           
      <div onclick="plusDivs(-1)" style="width:40px;height:40px;position:absolute;top:900px;left:1050px;background-color:#d0cccc;font-size:35px;border-radius:100%;text-align:center;line-height:36px;cursor:pointer;"><</div>        <!--  right buttons -->
           <div onclick="plusDivs(+1)" style="width:40px;height:40px;position:absolute;top:900px;left:1370px;background-color:#d0cccc;font-size:35px;border-radius:100%;text-align:center;line-height:36px;cursor:pointer;">></div>
     

         <!-- <a href=""> <img src="./image/picgenre.png" alt="" style="width:300px;height:300px;padding:50px;margin:400px  260px;position:absolute;border-radius:30%;"></a> 
         <a href="">  <img src="./image/picage.png" alt="" style="width:300px;height:300px;padding:50px;margin:400px  830px;position:absolute;border-radius:30%;"></a>  -->

     </section>


     <p class="fot">
            <div style="width:200px;height:200px;direction:ltr;border:2px dashed darkblue;border-radius:30%;position:absolute;top:1600px;left:150px; ">
            <p style="text-align:center;margin-top:20px;color:magenta;"><b>ما را در شبکه های </b></p>
            <p style="text-align:center;margin-top:20px;color:magenta;"><b>اجتماعی دنبال کنید </b></p>
            <img src="./image/telegramIcon.png" alt="" style="width:50px;height:50px;margin:18x 9px;margin-left:16px;">
            <img src="./image/InstagramIcon.png" alt=""  style="width:50px;height:50px;margin:18px 0px;margin-right:4px;">
           <a href="contact_us.php"> <img src="./image/MailIcon.png" alt=""  style="width:50px;height:50px;margin:18px 0px;"></a>
            </div>

                                <form action="action_contact_us.php" method="POST">
                                    <label style="position:absolute;width:350px;height:30px;border-bottom-right-radius:10px;border-bottom-left-radius:10px;font-size:18px;right:140px;top:1529px;background-color:darkblue;color:white;text-align:center;">نظر و پیشنهاد خود را با ما در میان بگزار</label>
                                           <input type="text" name="fullname" id="fullname" placeholder="نام خود را وارد کنید * " style="position:absolute;top:1580px;right:50px;width:500px;text-align:right;border-radius:15px;border:2px solid grey;padding-right:10px;">
                                           <input type="text" name="emailaddress" id="emailaddress" placeholder="ایمیل خود را وارد کنید * " style="position:absolute;top:1620px;right:50px;width:500px;height:40px;text-align:right;border-radius:15px;border:2px solid grey;padding-right:10px;">        
                                          <textarea name="commenttext" id="commenttext" cols="47" rows="5" placeholder="پیام خود را اینجا تایپ کنید * " style="position:absolute;right:50px;top:1680px;text-align:right;border-radius:15px;border:2px solid grey;padding-right:10px;"></textarea>
                                    <button style="position:absolute;width:95px;height:33px;;border-radius:10px;background-color:darkblue;color:white;font-size:15px;right:390px;top:1840px;">ثبت و ارسال</button>
                                </form>



     </p>
     <footer>
        <p style="font-size:17px;margin-left:250px;margin-bottom: 0rem;">تمامی حقوق وب سایت "بوک ورم" محفوظ می باشد و هرگونه کپی برداری از کل یا جـز آن بدون ذکر منبع خلاف قانون بوده و پیگرد قانونی دارد</p>
    </footer>

</body>
</html>