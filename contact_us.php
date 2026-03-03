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
    <title>تماس با ما</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
            background-color:lightblue;
            background-image:url('./image/background.png');
            direction:ltr;
            position:relative;
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
            top:1230px;
        }
        footer{
            width:100%;
            height:50px;
            line-height:50px;
            background-color:rgb(241, 232, 147);
            border-top:2px solid white;
            position:absolute;
            top:1500px;
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
                                    <ul class="drop-down" style="top:55px;">
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
                                    <ul class="drop-down2" style="top:55px;">
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
                              
                               
                            </ul>
                           </nav>



                     <div style="position:relative;">
                    <img src="./image/mainLogo.jpg" style="width:300px;height:240px;margin:100px  600px;border-radius:100px;position:absolute;">
                    <img src="./image/shop.png" style="width:300px;height:240px;margin:100px  200px;border-radius:100px;position:absolute;">
                    <img src="./image/vlog.png" style="width:300px;height:240px;margin:100px  1000px;border-radius:100px;position:absolute;">
                    </div>


<section style="width:85%;height:850px;position:relative;left:120px;top:400px;background-color:#efeaea;border-radius:100px;border:2px solid grey;">
    <h1 style="color:green;text-align:right;margin:50px 100px;direction:rtl;">تماس با ما  </h1>
       <pre style="margin-top:60px;margin-right:-60px;color:#01a0e1;direction:rtl;font-size:20px;">
          کاربر گرامی شما برای تماس با ما می‌توانید به آدرس پستی ما :  
    <pre style="color:orange;margin-right:110px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
atque aperiam corporis dicta autem consequatur, </pre>
            مراجعه نمایید.

            و یا از طریق شبکه های اجتماعی زیر از تمام اخبار و اطلاعات جدید
             و به روز ما مطلع بشید و حتی برامون پیام بفرستید.

             شماره تماس با ما :
             <pre style="color:orange;margin-right:150px;">  021-56748  </pre>

                             <a href=""> <img src="./image/telegramIcon.png" style="width:100px;height:80px;"></a>    <a href=""><img src="./image/MailIcon.png" style="width:100px;height:80px;"></a>  


      </pre>

<form action="action_contact_us.php" method="POST" name="comment">
      <pre style="position:absolute;top:100px;left:50px;color:black;font-size:20px;">
           <h3 style="background-color:white;width:200px;margin-left:150px;text-align:center;color:green;">فرم تماس با ما</h3>
           <pre style="color:#01a0e1">
در صورت هر گونه شکایت با تلفن و آدرس مجموعه تماس بگیرید
           </pre>
                        : نام خانوادگی  
       <input type="text" id="fullname" name="fullname" style="width:400px;text-align:center;width:310px;height:39px; background:url('./image/input1.png') no-repeat center center; background-size:cover;border:none;">

                        : آدرس ایمیل 
       <input type="text" id="emailaddress" name="emailaddress" style="width:400px;text-align:center;width:310px;height:39px; background:url('./image/input1.png') no-repeat center center; background-size:cover;border:none;">


                            : متن پیام 
 <textarea cols="30" rows="15" id="commenttext" name="commenttext" style="width:400px;text-align:right;padding:20px; background:url('./image/input1.png') no-repeat center center; background-size:cover;border:none;border-radius:20px;" ></textarea>

                       <button style="width:100px;height:40px;text-align:center;background-color:rgb(1, 160, 225);font-size:18px;color:white;border-radius:10px;">بفرست</button>

      </pre>
</form>

</section>












     <footer>
        <p style="font-size:17px;margin-left:250px;margin-bottom: 0rem;">تمامی حقوق وب سایت "بوک ورم" محفوظ می باشد و هرگونه کپی برداری از کل یا جـز آن بدون ذکر منبع خلاف قانون بوده و پیگرد قانونی دارد</p>
    </footer>

</body>
</html>