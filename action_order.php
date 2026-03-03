<?php
  session_start();

  
  $link=mysqli_connect("localhost" , "root" , "" , "bookworm");
  if(mysqli_connect_errno())
     exit("Error :" .mysqli_connect_error());
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
      .inputs{
        text-align:center;
        width:310px;
        height:39px; 
        background:url('./image/input1.png') no-repeat center center ;
        background-size:cover; 
        border:none;
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
 if(!(isset($_SESSION['state_login']) && $_SESSION['state_login']===true)) {
?>

 <script>
    location.replace("homePage.php");
 </script>

<?php }//if ?>

<?php
   $bookcode=$_POST['book_code'];
   $bookname=$_POST['book_name'];
   $bookreq=$_POST['book_req'];
   $Price=$_POST['price'];
   $totalPrice=$_POST['total_price'];

   $firstname=$_POST['firstname'];
   $email=$_POST['email'];
   $mobile=$_POST['mobile'];
   $address=$_POST['address'];

     $username=$_SESSION["username"];




      $query="INSERT INTO orders 
      (id,username,orderDate,bookCode,bookReq,bookPrice,mobile,address,trackcode,state)
      VALUES ('0', '$username', '".date('y-m-d')."' , '$bookcode' , '$bookreq' , '$Price' , '$mobile' , '$address' , '000000000000000000000000' , '0' ) ";
      


      if(mysqli_query($link,$query)===true)  {
        echo("<p style='width:700px;height:400px;background-color:rgb(146, 235, 198);margin:100px  400px;border-radius:100px;text-align:center;line-height:40px;'>");
        echo("<span style='color:green;text-align:center;'><br><b> سفارش شما با موفقیت در سامانه ثبت شد </b></span>");
    
        echo("<span style='color:brown;text-align:center;'><br><b> کاربر گرامی خانم/آقا $firstname </b></span>");
        echo("<span style='color:green;text-align:center;'><br><b> کتاب $bookname با کد $bookcode به تعداد/مقدار $bookreq با قیمت پایه $Price ریال را سفارش داده اید </b></span>");
        echo("<span style='color:red;text-align:center;'><br><b> مبلغ قابل پرداخت برای سفارش ثبت شده $totalPrice ریال است  </b></span>");
    
        echo("<span style='color:blue;text-align:center;'><br><b> پس از بررسی سفارش و تایید آن با شما تماس گرفته خواهد شد</b></span>");
        echo("<span style='color:blue;text-align:center;'><br><b>  محصول خریداری شده از طریق پست ایران طبق آدرس درج شده ارسال خواهد شد </b></span>");
        echo("<span style='color:blue;text-align:center;'><br><b> در هنگام تحویل گرفتن محصول ان را بررسی و از صحت و سالم بودن آن اطمینان حاصل کنید سپس مبلغ کتاب را طبق فاکتور ارائه شده به مامور پست تحویل دهید </b></span>");
        echo("</p>");

        $query="UPDATE books SET bookqty=bookqty-$bookreq WHERE bookcode='$bookcode'";
        mysqli_query($link,$query);
    }
    
    else
        echo("<p style='color:red;text-align:center;'><b> خطا در ثبت سفارش </b></p>");
    
         mysqli_close($link);
    

?>