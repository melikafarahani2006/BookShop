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
$link=mysqli_connect("localhost" , "root" , "" , "bookworm");
if(mysqli_connect_errno())
  exit("error :" .mysqli_connect_error());
mysqli_query($link , "SET NAMES UTF8"); ///farsi
$book_code=0;
if(isset($_GET['id']))
$book_code=$_GET['id'];

if(!(isset($_SESSION['state_login']) && $_SESSION['state_login']===true )){

?>

<div style="width:700px;height:400px;background-color:rgb(146, 235, 198);margin:100px  400px;border-radius:100px;">
<p style="text-align:center;font-size:20px;color:red;padding:50px;"><b>برای ثبت سفارش و خرید پستی باید وارد حساب کاربری خود شوید</b></p>

<p style="font-size:22px;padding:30px;text-align:center;">در صورتی که عضو سایت هستید
  <a href="login.php" style="text-decoration:none;color:blue;"><b>اینجا</b></a>
 کلیک کنید</p>

<p style="font-size:22px;padding:30px;text-align:center;">در صورتی که عضو نیستید ، برای ثبت نام در سایت
  <a href="register.php" style="text-decoration:none;color:blue;"><b>اینجا</b></a>
کلیک کنید</p>
</div>


<?php 
  exit();
       }//if
       $query="SELECT * FROM books WHERE bookcode='$book_code'";
       $result=mysqli_query($link,$query);

?>


<form action="action_order.php" name="order" method="POST" style="text-align:center">
               <table style="width:100%" border="1px">
                  <tr>
                     <td style="width:50%;">
            <?php
            if($row=mysqli_fetch_array($result))
            {
            ?>
                <br>

                <table style="width:100%;margin-left:auto;margin-right:auto;text-align:center;direction:rtl;margin-top:20px;" border="0">
                     <tr>
                        <td style="width:22%;font-size:20px;"><span style="color:red;font-size:20px;">*</span>کد کتاب</td>
                        <td style="width:78%;">
                           <input type="text" id="book_code" name="book_code" class="inputs"  value="<?php echo($book_code); ?>" style="margin-left:25px;" readonly>
                        </td>
                     </tr>


                     <tr>
                        <td style="width:22%;font-size:20px;"><span style="color:red;font-size:20px;">*</span>نام کتاب</td>
                        <td style="width:78%;">
                           <input type="text" id="book_name" name="book_name" class="inputs" value="<?php echo($row['name']); ?>" style="text-align:center;margin-left:25px;" readonly>
                        </td>
                     </tr>


                     <tr>
                        <td style="width:22%;font-size:20px;"><span style="color:red;font-size:20px;">*</span>تعداد درخواستی</td>
                        <td style="width:78%;">
                           <input type="text" id="book_req" name="book_req" class="inputs"  style="text-align:center;margin-left:25px;border:2px solid red;border-radius:19px;"  onChange="calc_price();" >
                        </td>
                     </tr>


                     <tr>
                        <td style="width:22%;font-size:20px;"><span style="color:red;font-size:20px;">*</span>قیمت واحد کتاب</td>
                        <td style="width:78%;">
                           <input type="text" id="price" name="price" class="inputs" value="<?php echo($row['price']); ?>" style="text-align:center;" readonly>  تومن
                        </td>
                     </tr>


                     <tr>
                        <td style="width:22%;font-size:20px;"><span style="color:red;font-size:20px;">*</span>مبلغ قابل پرداخت</td>
                        <td style="width:785;">
                           <input type="text" id="total_price" name="total_price" class="inputs" value="0" style="text-align:center;" readonly>  تومن 
                        </td>
                     </tr>


            <script type="text/javascript">
               function calc_price() {
                 var book_qty=<?php echo($row['bookqty']);  ?>;
                 var price=document.getElementById("price").value;
                 var count=document.getElementById("book_req").value;
                 var total_price;

                 if(count > book_qty){
                    alert("تعداد موجودی انبار کمتر از درخواست شماست!!");
                    document.getElementById("pro_req").value=0;
                    count=0;
                 }

                 if(count==0 || count=="")
                 total_price=document.getElementById("total_price").value=0;
                 else{
                 total_price=count * price;
                 document.getElementById("total_price").value=total_price;}
               }
            </script>

              
                 <tr>
                    <td><br><br><br></td>
                    <td></td>
                 </tr>
         <?php
                $query="SELECT * FROM users WHERE firstname='{$_SESSION['firstname']}'";
                $result=mysqli_query($link,$query);
                $user_row=mysqli_fetch_array($result);
         ?>

               <tr>
                <td style="width:40%;font-size:20px;"><span style="color:red;font-size:20px;">*</span>نام کاربر</td>
                <td style="width:60%;"><input type="text" id="firstname" name="firstname"  class="inputs" value="<?php echo($user_row['firstname']); ?>" style="text-align:left;padding-left:20px;margin-left:30px;"  readonly></td>
               </tr>


               <tr>
                <td style="width:40%;font-size:20px;"><span style="color:red;font-size:20px;">*</span>ایمیل </td>
                <td style="width:60%;"><input type="text" id="email" name="email" class="inputs"  value="<?php echo($user_row['email']); ?>" style="text-align:left;padding-left:20px;margin-left:30px;"  readonly></td>
               </tr>


               <tr>
                <td style="width:40%;font-size:20px;"><span style="color:red;font-size:20px;">*</span>شماره تماس</td>
                <td style="width:60%;"><input type="text" id="mobile" name="mobile" class="inputs"  value="09" style="text-align:left;padding-left:20px;border:2px solid red;border-radius:19px;margin-left:30px;"  ></td>
               </tr>


               <tr>
                <td style="width:40%;font-size:20px;"><span style="color:red;font-size:20px;">*</span>آدرس </td>
                <td style="width:60%;"><textarea id="address" name="address"  style="text-align:right;border-radius:10px;padding-right:20px;border:2px solid red;border-radius:19px;margin-left:30px;" cols="36" rows="6" >...</textarea></td>
               </tr>


               <tr>
                <td><br><br><br></td>
                <td><input type="button" value="خرید کتاب " onclick="check_input();" style="width:140px;height:50px;line-height:50px;text-align:center;background-color:#01a0e1;border-radius:8px;color:#fff;font-size:20px;"></td>
               </tr>

               </table>
           
      
               
               <script type="text/javascript">
                   function check_input(){
                  var r=confirm("آیا از صحت اطلاعات اطمینان دارید ؟");
                     if(r==true)
                     {
                        var validation=true;
                        var count=document.getElementById("book_req").value;
                        var mobile=document.getElementById("mobile").value;
                        var address=document.getElementById("address").value;

                        if(count==0)
                          validation=false;
                        if(mobile.length < 11)
                          validation=false;
                        if(address.length < 15)
                          validation=false;
                    if(validation)
                       document.order.submit();
                    else
                      alert("برخی از سفارش های فرم محصول به درستی پر نشده اند!");
                      
                     }

                    }
               </script>

           </td>
             
           <td style="width:39%;text-align:left;position:relative;">
            <a href="book_detail.php?id=<?php echo($row['bookcode']) ?>"  class="box1">
              <p style="width:200px;height:550px;"><img src="image/books/<?php echo($row['bookimage']) ?>"  class="img1" style="padding:30px 25px;width:300px;height:400px;"> </p>     
            </a>
            <h2 style="color:hotpink;font-size:30px;position:absolute;top:50px;right:20px;"><?php echo($row['name']); ?></h2>
            </br></br>
      <span style="font-size:22px;position:absolute;right:100px;top:120px;">  نویسنده :  <?php echo($row['author']) ?> </span>  
      <span style="font-size:22px;position:absolute;right:100px;top:170px;">  مترجم  :  <?php echo($row['translator']) ?> </span> 
      <span style="font-size:22px;position:absolute;right:100px;top:220px;">  تعداد صفحه :  <?php echo($row['sheets']) ?> </span> 
      <span style="font-size:22px;position:absolute;right:100px;top:270px;"> : رده سنی  </span>  <span style="font-size:22px;position:absolute;right:180px;top:270px;">  <?php echo($row['agerange']) ?> </span>  
      <span style="font-size:22px;position:absolute;right:100px;top:330px;">  ژانر  :  <?php echo($row['genre']) ?> </span> 
      <span style="position:absolute;right:80px;top:380px;font-size:26px;color:darkblue;"> : خلاصه  </span>
    
      <p style="width:510px;height:155px;border-radius:50px;line-height:20px;padding:15px;border:1px solid red;background-color:rgb(146, 235, 198);position:absolute;right:60px;top:410px;text-align:right;direction:rtl;font-size:19px;"> 
             <?php $count=strlen($row['summary']);
            echo(substr($row['summary'],0,(int)($count / 2))); ?>
      </p> 
     

    
</td>

                  
                 </tr>
             </table>
          </form>





<?php
            } //if
?>