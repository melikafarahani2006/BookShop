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
   
    <!-- <link rel="stylesheet"  href="http://cdn.font-store.ir/{{font.CDNfileName}}"> -->
    <title>کتابامون</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
            background-color:lightblue;
            background-image:url('./image/background.png');
            /* min-height:100vh;
            display:grid;
            place-items:center; */
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
            height:300px;
            background-color:rgb(241, 232, 147);
            position:relative;
            /* top:4530px; */
        }
        footer{
            width:100%;
            height:50px;
            line-height:50px;
            background-color:rgb(241, 232, 147);
            border-top:2px solid white;
            /* position:absolute;
            top:4900px; */
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

        .row1{
            width:100%;
            height:auto;
            display:flex;
            position:relative;

        }
        .row2{
            width:100%;
            height:auto;
            display:flex;
            position:relative;
             top:700px;
        }
        .row3{
            width:100%;
            height:auto;
            display:flex;
            position:relative;
             top:1400px;
        }
        .row4{
            width:100%;
            height:auto;
            display:flex;
            position:relative;
             top:2100px;
        }
        .row5{
            width:100%;
            height:auto;
            display:flex;
            position:relative;
             top:2800px;
        }
        /* .box1{
           width:35%;
           height:600px;
           border:2px solid black;
           display:inline-block;
           float:right;
           position:absolute;
           right:10%;
           border-radius:10%;
           background-color:white;
        }
        .box2{
           width:35%;
           height:600px;
           border:2px solid black;
           display:inline-block;
           float:left;
           position:absolute;
           left:10%;
           border-radius:10%;
           background-color:white;
        } 
        .box1 .img1,
        .box2 .img1 {
            width:200px;
            height:300px;
            position:absolute;
            top:20px;
            right:40px;
        
        }
        .box1 .img2,
        .box2 .img2 {
            width:200px;
            height:300px;
            position:absolute;
            top:20px;
            left:40px;
        
        }*/
        .box1 .img1:hover{
            transform:scale(1.2);
            border-radius:15%;
            transition:transform 1s;
        }
       /* .box1 .img2:hover,
        .box2 .img2:hover{
            transform:scale(1.1);
            border-radius:10%;
        }
         .box1 .text1,
        .box2 .text2 {
            position:absolute;
            bottom:70px;
            right:60px;
        }
        .box1 .text1 span,
        .box2 .text2 span {
            display:block;
            font-size:20px;
        } */
       
       
.slider{
    height:250px;
    margin:auto;
    position:relative;
    width:90%;
    display:grid;
    place-items:center;
    overflow:hidden;
}

.slide-track{
    display:flex;
    width:calc(250px * 18);
    animation:scroll 40s linear infinite;
}
@keyframes scroll{
    0%{
        transform:translateX(0);
    }
    100%{
        transform:translateX(calc(-250px * 9))
    }
}
.slide{
    height:250px;
    width:250px;
    display:flex;
    align-items:center;
    padding:15px;
    perspective:100px;
}
.slide:hover{
    transform:scale(1.2);
}
img{
    width:100%;
    height:250px;
    transition:transform 1s;
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


        <?php
           if(isset($_GET['query']))
           {
             $query = $_GET['query'];
             
              $sql = "SELECT * FROM books WHERE name LIKE '%$query%'";
              $Searchresult = mysqli_query($link, $sql);
           }
       ?>



        <a href="" class="aboutUs">درباره ما</a>
        <p style="height:100%;line-height:100px;width:40px;text-align:center;">
            <span style="font-size:20px;color:black;">09370670319</span>
        </p>
            <p style="border-right:1px solid white;height:100%;;line-height:100px">
            <img src="./image/phoneIcon.png" alt="" style="width:30px;height:30px;margin-right:80px;">
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
        <!-- <img src="./image/background.png" alt="" style="position:absolute;width:100%;height:832px;top:800px;"> -->
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
                                <li>
                                    <a href="contact_us.php">تماس با ما</a>
                                </li>
                               
                            </ul>
                           </nav>


    <section>


    <?php 
        $query="SELECT bookimage FROM books ";
        $result=mysqli_query($link,$query);
    ?>


              <div class="slider" style="width:80%;height:600px;">
        <div class="slide-track">
            <div class="slide">
                <img src="image/books/<?php  if($row=mysqli_fetch_array($result)) echo($row['bookimage']) ?>" alt="">
            </div>
            <div class="slide">
                <img src="image/books/<?php  if($row=mysqli_fetch_array($result)) echo($row['bookimage']); ?>" alt="">
            </div>
            <div class="slide">
                <img src="image/books/<?php  if($row=mysqli_fetch_array($result)) echo($row['bookimage']); ?>" alt="">
            </div>
            <div class="slide">
                <img src="image/books/<?php  if($row=mysqli_fetch_array($result)) echo($row['bookimage']); ?>" alt="">
            </div>
            <div class="slide">
                <img src="image/books/<?php  if($row=mysqli_fetch_array($result)) echo($row['bookimage']); ?>" alt="">
            </div>
            <div class="slide">
                <img src="image/books/<?php  if($row=mysqli_fetch_array($result)) echo($row['bookimage']); ?>" alt="">
            </div>
            <div class="slide">
                <img src="image/books/<?php  if($row=mysqli_fetch_array($result)) echo($row['bookimage']); ?>" alt="">
            </div>
        </div>
              </div>



<?php
   
 
   $query="select * from books";
   $result=mysqli_query($link,$query);




   
$genre="";
if(isset($_GET['genre']))
$genre=$_GET['genre'];
$genrequery="SELECT * FROM books WHERE genre='$genre'";
$genreresult=mysqli_query($link,$genrequery);




$agerange="";
if(isset($_GET['agerange']))
$agerange=$_GET['agerange'];
$agerangeQuery="SELECT * FROM books WHERE agerange='$agerange'";
$agerangeResult=mysqli_query($link,$agerangeQuery);
?>

 <table style="width:100%;position:relative;left:6%;" >
<tr>
      <?php
      $counter=0;
      if(!(isset($_GET['genre']) || isset($_GET['agerange']) || isset($_GET['query']))){
      while($row=mysqli_fetch_array($result))
      {
            $counter++;
      ?>
      <td style="width:39%;text-align:left;border:2px solid black;border-radius:10%;background-color:white;position:relative;">
            <a href="book_detail.php?id=<?php echo($row['bookcode']) ?>"  class="box1">
              <p style="width:200px;height:550px;"><img src="image/books/<?php echo($row['bookimage']) ?>"  class="img1" style="padding:30px 25px;width:300px;height:400px;"> </p>     
            </a>
            <h2 style="color:hotpink;font-size:25px;position:absolute;top:100px;right:10px;"><?php echo($row['name']); ?></h2>
            </br></br>
      
      <span style="font-size:19px;position:absolute;right:40px;top:250px;">  نویسنده :  <?php echo($row['author']) ?> </span> &nbsp; 
      <span style="font-size:19px;position:absolute;right:40px;top:300px;">  مترجم  :  <?php echo($row['translator']) ?> </span> 
      <span style="font-size:19px;position:absolute;right:40px;top:350px;">  تعداد صفحه :  <?php echo($row['sheets']) ?> </span> &nbsp; 
      <span style="font-size:19px;position:absolute;right:40px;top:400px;"> : رده سنی   </span>   <span style="font-size:19px;position:absolute;right:110px;top:400px;"> <?php echo($row['agerange']) ?> </span> &nbsp; 
      <span style="font-size:19px;position:absolute;right:40px;top:450px;">  ژانر  :  <?php echo($row['genre']) ?> </span> 
       <span style="color:red;font-size:19px;position:absolute;right:40px;top:500px;">  تعداد موجودی :  <?php echo($row['bookqty']) ?> </span> 
      <span style="font-size:19px;position:absolute;right:40px;top:550px;">  قیمت :  <?php echo($row['price']) ?> </span> &nbsp; <span style="position:absolute;left:300px;bottom:30px;font-size:20px;">تومان</span>

      <b><a href="book_detail.php?id=<?php echo($row['bookcode']) ?>"  style="text-decoration:none;font-size:19px;position:absolute;left:50px;bottom:40px;">توضیحات تکمیلی و خرید</a></b>
     
     </td>

     <td style="width:1px;"></td>
     <?php
     if($counter % 2 ==0)
     echo("</tr><tr style='height:100px;'></tr><tr>");

      } //while

   if($counter % 2 !=0)
   echo("</tr>");

      }//if






      else if(isset($_GET['genre'])){
        while($row=mysqli_fetch_array($genreresult))
        {
              $counter++;
        ?>
        <td style="width:39%;text-align:left;border:2px solid black;border-radius:10%;background-color:white;position:relative;">
              <a href="book_detail.php?id=<?php echo($row['bookcode']) ?>"  class="box1">
                <p style="width:200px;height:550px;"><img src="image/books/<?php echo($row['bookimage']) ?>"  class="img1" style="padding:30px 25px;width:300px;height:400px;"> </p>     
              </a>
              <h2 style="color:hotpink;font-size:25px;position:absolute;top:100px;right:10px;"><?php echo($row['name']); ?></h2>
              </br></br>
        
        <span style="font-size:19px;position:absolute;right:40px;top:250px;">  نویسنده :  <?php echo($row['author']) ?> </span> &nbsp; 
        <span style="font-size:19px;position:absolute;right:40px;top:300px;">  مترجم  :  <?php echo($row['translator']) ?> </span> 
        <span style="font-size:19px;position:absolute;right:40px;top:350px;">  تعداد صفحه :  <?php echo($row['sheets']) ?> </span> &nbsp; 
        <span style="font-size:19px;position:absolute;right:40px;top:400px;"> : رده سنی   </span>   <span style="font-size:19px;position:absolute;right:110px;top:400px;"> <?php echo($row['agerange']) ?> </span> &nbsp; 
        <span style="font-size:19px;position:absolute;right:40px;top:450px;">  ژانر  :  <?php echo($row['genre']) ?> </span> 
         <span style="color:red;font-size:19px;position:absolute;right:40px;top:500px;">  تعداد موجودی :  <?php echo($row['bookqty']) ?> </span> 
        <span style="font-size:19px;position:absolute;right:40px;top:550px;">  قیمت :  <?php echo($row['price']) ?> </span> &nbsp; <span style="position:absolute;left:300px;bottom:30px;font-size:20px;">تومان</span>
  
        <b><a href="book_detail.php?id=<?php echo($row['bookcode']) ?>"  style="text-decoration:none;font-size:19px;position:absolute;left:50px;bottom:40px;">توضیحات تکمیلی و خرید</a></b>
       
       </td>
  
       <td style="width:1px;"></td>
       <?php
       if($counter % 2 ==0)
       echo("</tr><tr style='height:100px;'></tr><tr>");
  
        } //while
  
     if($counter % 2 !=0)
     echo("</tr>");
      } //else if






       if(isset($_GET['agerange']))
      {
        while($row=mysqli_fetch_array($agerangeResult))
        {
              $counter++;
        ?>
        <td style="width:39%;text-align:left;border:2px solid black;border-radius:10%;background-color:white;position:relative;">
              <a href="book_detail.php?id=<?php echo($row['bookcode']) ?>"  class="box1">
                <p style="width:200px;height:550px;"><img src="image/books/<?php echo($row['bookimage']) ?>"  class="img1" style="padding:30px 25px;width:300px;height:400px;"> </p>     
              </a>
              <h2 style="color:hotpink;font-size:25px;position:absolute;top:100px;right:10px;"><?php echo($row['name']); ?></h2>
              </br></br>
        
        <span style="font-size:19px;position:absolute;right:40px;top:250px;">  نویسنده :  <?php echo($row['author']) ?> </span> &nbsp; 
        <span style="font-size:19px;position:absolute;right:40px;top:300px;">  مترجم  :  <?php echo($row['translator']) ?> </span> 
        <span style="font-size:19px;position:absolute;right:40px;top:350px;">  تعداد صفحه :  <?php echo($row['sheets']) ?> </span> &nbsp; 
        <span style="font-size:19px;position:absolute;right:40px;top:400px;"> : رده سنی   </span>   <span style="font-size:19px;position:absolute;right:110px;top:400px;"> <?php echo($row['agerange']) ?> </span> &nbsp; 
        <span style="font-size:19px;position:absolute;right:40px;top:450px;">  ژانر  :  <?php echo($row['genre']) ?> </span> 
         <span style="color:red;font-size:19px;position:absolute;right:40px;top:500px;">  تعداد موجودی :  <?php echo($row['bookqty']) ?> </span> 
        <span style="font-size:19px;position:absolute;right:40px;top:550px;">  قیمت :  <?php echo($row['price']) ?> </span> &nbsp; <span style="position:absolute;left:300px;bottom:30px;font-size:20px;">تومان</span>
  
        <b><a href="book_detail.php?id=<?php echo($row['bookcode']) ?>"  style="text-decoration:none;font-size:19px;position:absolute;left:50px;bottom:40px;">توضیحات تکمیلی و خرید</a></b>
       
       </td>
  
       <td style="width:1px;"></td>
       <?php
       if($counter % 2 ==0)
       echo("</tr><tr style='height:100px;'></tr><tr>");
  
        } //while
  
     if($counter % 2 !=0)
     echo("</tr>");

      } // if 
      ?>





<?php

  if(isset($_GET['query'])){
 
    if($row = mysqli_fetch_array($Searchresult)) {
      $counter++;
?>
<td style="width:39%;text-align:left;border:2px solid black;border-radius:10%;background-color:white;position:relative;">
      <a href="book_detail.php?id=<?php echo($row['bookcode']) ?>"  class="box1">
        <p style="width:200px;height:550px;"><img src="image/books/<?php echo($row['bookimage']) ?>"  class="img1" style="padding:30px 25px;width:300px;height:400px;"> </p>     
      </a>
      <h2 style="color:hotpink;font-size:25px;position:absolute;top:100px;right:10px;"><?php echo($row['name']); ?></h2>
      </br></br>

<span style="font-size:19px;position:absolute;right:40px;top:250px;">  نویسنده :  <?php echo($row['author']) ?> </span> &nbsp; 
<span style="font-size:19px;position:absolute;right:40px;top:300px;">  مترجم  :  <?php echo($row['translator']) ?> </span> 
<span style="font-size:19px;position:absolute;right:40px;top:350px;">  تعداد صفحه :  <?php echo($row['sheets']) ?> </span> &nbsp; 
<span style="font-size:19px;position:absolute;right:40px;top:400px;"> : رده سنی   </span>   <span style="font-size:19px;position:absolute;right:110px;top:400px;"> <?php echo($row['agerange']) ?> </span> &nbsp; 
<span style="font-size:19px;position:absolute;right:40px;top:450px;">  ژانر  :  <?php echo($row['genre']) ?> </span> 
 <span style="color:red;font-size:19px;position:absolute;right:40px;top:500px;">  تعداد موجودی :  <?php echo($row['bookqty']) ?> </span> 
<span style="font-size:19px;position:absolute;right:40px;top:550px;">  قیمت :  <?php echo($row['price']) ?> </span> &nbsp; <span style="position:absolute;left:300px;bottom:30px;font-size:20px;">تومان</span>

<b><a href="book_detail.php?id=<?php echo($row['bookcode']) ?>"  style="text-decoration:none;font-size:19px;position:absolute;left:50px;bottom:40px;">توضیحات تکمیلی و خرید</a></b>

</td>

<td style="width:1px;"></td>
<?php
if($counter % 2 ==0)
echo("</tr><tr style='height:100px;'></tr><tr>");

} //if


  else{
    echo("<p style='font-size:22px;text-align:center;color:red;'><b> !!کتاب مورد نظر یافت نشد </b></p>");}

if($counter % 2 !=0)
echo("</tr>");


} //first if
  

?>


 </table>






<!-- 
    <div class="row1">
        <div class="box1">
            <img src="./image/mainlogo.jpg" alt="1" class="img1">
            <img src="./image/mainlogo.jpg" alt="2" class="img2">
            <p class="text1">
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
            </p>
        </div>

        <div class="box2">
            <img src="./image/mainlogo.jpg" alt="1" class="img1">
            <img src="./image/mainlogo.jpg" alt="2" class="img2">
            <p class="text2">
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
            </p>
        </div>
    </div>

    <div class="row2">
        <div class="box1">
            <img src="./image/mainlogo.jpg" alt="1" class="img1">
            <img src="./image/mainlogo.jpg" alt="2" class="img2">
            <p class="text1">
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
            </p>
        </div>

        <div class="box2">
            <img src="./image/mainlogo.jpg" alt="1" class="img1">
            <img src="./image/mainlogo.jpg" alt="2" class="img2">
            <p class="text2">
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
            </p>
        </div>
    </div>

    <div class="row3">
        <div class="box1">
            <img src="./image/mainlogo.jpg" alt="1" class="img1">
            <img src="./image/mainlogo.jpg" alt="2" class="img2">
            <p class="text1">
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
            </p>
        </div>

        <div class="box2">
            <img src="./image/mainlogo.jpg" alt="1" class="img1">
            <img src="./image/mainlogo.jpg" alt="2" class="img2">
            <p class="text2">
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
            </p>
        </div>
    </div>

    <div class="row4">
        <div class="box1">
            <img src="./image/mainlogo.jpg" alt="1" class="img1">
            <img src="./image/mainlogo.jpg" alt="2" class="img2">
            <p class="text1">
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
            </p>
        </div>

        <div class="box2">
            <img src="./image/mainlogo.jpg" alt="1" class="img1">
            <img src="./image/mainlogo.jpg" alt="2" class="img2">
            <p class="text2">
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
            </p>
        </div>
    </div>


    <div class="row5">
        <div class="box1">
            <img src="./image/mainlogo.jpg" alt="1" class="img1">
            <img src="./image/mainlogo.jpg" alt="2" class="img2">
            <p class="text1">
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
            </p>
        </div>

        <div class="box2">
            <img src="./image/mainlogo.jpg" alt="1" class="img1">
            <img src="./image/mainlogo.jpg" alt="2" class="img2">
            <p class="text2">
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
               <span>xLorem ipsum dolor sit amet.</span>
            </p>
        </div>
    </div>

 -->

<br><br>
<!-- 
<p class="fot">
            <div style="width:200px;height:200px;direction:ltr;border:2px dashed darkblue;border-radius:30%;position:absolute;bottom:0; ">
            <p style="text-align:center;margin-top:20px;color:magenta;"><b>ما را در شبکه های </b></p>
            <p style="text-align:center;margin-top:20px;color:magenta;"><b>اجتماعی دنبال کنید </b></p>
            <img src="./image/telegramIcon.png" alt="" style="width:50px;height:50px;margin:20x 9px;margin-left:16px;margin-bottom:20px;">
            <img src="./image/InstagramIcon.png" alt=""  style="width:50px;height:50px;margin:20px 0px;margin-right:4px;">
           <a href="#"> <img src="./image/MailIcon.png" alt=""  style="width:50px;height:50px;margin:20px 0px;"></a>
            </div>
                             <div style="">
                                    <label style="width:350px;height:30px;border-bottom-right-radius:10px;border-bottom-left-radius:10px;font-size:18px;background-color:darkblue;color:white;text-align:center;">نظر و پیشنهاد خود را با ما در میان بگزار</label>
                                           <input type="text" name="name" id="name" placeholder="نام خود را وارد کنید * " style="width:500px;text-align:right;border-radius:15px;border:2px solid grey;padding-right:10px;height:30px;font-size:15px;">
                                           <input type="text" name="email" id="email" placeholder="ایمیل خود را وارد کنید * " style="width:500px;height:40px;text-align:right;border-radius:15px;border:2px solid grey;padding-right:10px;font-size:15px;">        
                                          <textarea name="text" id="text" cols="47" rows="5" placeholder="پیام خود را اینجا تایپ کنید * " style="text-align:right;border-radius:15px;border:2px solid grey;padding-right:10px;font-size:15px;"></textarea>
                                    <button style="width:95px;height:33px;;border-radius:10px;background-color:darkblue;color:white;font-size:15px;">ثبت و ارسال</button>
                             </div>



     </p> -->
     <footer>
        <p style="font-size:17px;margin-left:250px;margin-bottom: 0rem;">تمامی حقوق وب سایت "بوک ورم" محفوظ می باشد و هرگونه کپی برداری از کل یا جـز آن بدون ذکر منبع خلاف قانون بوده و پیگرد قانونی دارد</p>
    </footer>

</body>
</html>