
<?php
session_start();
if(!(isset($_SESSION['state_login']) && $_SESSION['state_login']===true && $_SESSION['user_type']=="admin")){
?>

<script>
    location.replace("homePage.php");
</script>


<?php
} //if



$link=mysqli_connect("localhost" , "root" , "" , "bookworm");
if(mysqli_connect_errno())
  exit("error :" .mysqli_connect_error());
mysqli_query($link , "SET NAMES UTF8"); ///farsi


$name=$author=$translator=$bookcode=$sheets=$agerange=$price=$genre=$bookqty=$bookimage=$bookpdf=$summary=$URL="";
$btn_caption="مدیریت کتاب";

  if(isset($_GET['action']) && $_GET['action']=="EDIT"){
    $id=$_GET['id'];
    $query="SELECT * FROM books WHERE bookcode=$id";
    $result=mysqli_query($link,$query);
      if($row=mysqli_fetch_array($result)){
        $bookcode=$row['bookcode'];
        $name=$row['name'];
        $author=$row['author'];
        $translator=$row['translator'];
        $sheets=$row['sheets'];
        $agerange=$row['agerange'];
        $price=$row['price'];
        $genre=$row['genre'];
        $bookqty=$row['bookqty'];
        $bookimage=$row['bookimage'];
        $bookpd=$row['bookpdf'];
        $summary=$row['summary'];

        $URL="?id=$bookcode&action=EDIT";
        $btn_caption="ویرایش کتاب";
      }
  }




  else if(isset($_GET['action']) && $_GET['action']=="DELETE"){
    $id=$_GET['id'];
    $query="SELECT * FROM books WHERE bookcode=$id";
    $result=mysqli_query($link,$query);
      if($row=mysqli_fetch_array($result)){
        $bookcode=$row['bookcode'];
        $name=$row['name'];
        $author=$row['author'];
        $translator=$row['translator'];
        $sheets=$row['sheets'];
        $agerange=$row['agerange'];
        $price=$row['price'];
        $genre=$row['genre'];
        $bookqty=$row['bookqty'];
        $bookimage=$row['bookimage'];
        $bookpdf=$row['bookpdf'];
        $summary=$row['summary'];

        $URL="?id=$bookcode&action=DELETE";
        $btn_caption="حذف کتاب";
      }
  }
?>


<script>
  function sure() {
             var check = confirm("از حذف یا ویرایش اطلاعات اطمینان دارید ؟");
             if(check==true) {
              document.admin_Books_Management.submit();}
              else{
                alert("حذف یا ویرایش انحام نشد");
                event.preventDefault();}
  }
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>آپلود کتاب</title>
    <style>
        *,body{
            direction:rtl;
        }
        body{
            background-color:mintcream;
        }
         .cover{
            width:100%;
            height:100%;
            position:absolute;
            display:flex;
            /* align-items:center;
            justify-content:center; */
            top:100px;
            right:80px;
        }
        .EDIT {
            width:90%;
            height:auto;
            border-radius:20px;
            background-color: rgba(243, 200, 136, 0.70);
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
          font-size:17px;
          /* border-radius:30%; */
          
        }
        
    </style>
</head>
<body>
      







    <section>
        <img src="./image/mainBackground.jpg" alt=""  class="back" style="width:100vw;height:900px;position:relative;opacity:0.4;">
        <a href="http://localhost/bookworm/homepage.php" ><img src="./image/exitIcon..png" style="position:absolute;top:10px;right:20px;width:50px;height:50px;"></a>

     <div class="cover">
        <form class="EDIT"  name="EDIT" action="action_admin_Books_Management.php<?php if(!empty($URL))  echo($URL); ?>" method="POST"   enctype="multipart/form-data">
          
                <div>
                         <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> نام :</p>
                         <input   class="inputImg"  type="text" id="name" name="name" placeholder="  نام کتاب را وارد کنید" value="<?php echo($name); ?>" style="margin-right:10px;">
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                     <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> نویسنده  :</p>
                     <input   class="inputImg"  type="text" id="author" name="author" placeholder="  نام نویسنده را وارد کنید" value="<?php echo($author); ?>" style="margin-left:40px;">
                </div>


                <div>
                         <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> مترجم  :</p>
                         <input  class="inputImg"  type="text" id="translator" name="translator" placeholder="  نام مترجم را وارد کنید"  value="<?php echo($translator); ?>">
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                     <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> کد کتاب :</p>
                     <input  class="inputImg"  type="text" id="bookcode" name="bookcode" placeholder="  کد کتاب را وارد کنید" value="<?php echo($bookcode); ?>" style="margin-left:35px;">
                </div>


                <div>
                    <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span>  تعداد صفحات  :</p>
                     <input  class="inputImg"  type="text" id="sheets" name="sheets" placeholder="  تعداد صفحات را وارد کنید"  value="<?php echo($sheets); ?>">
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                     <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> رده سنی :</p>
                         <select  class="inputImg"   id="agerange" name="agerange"   style="margin-right:10px;" >  
                            <option value="<?php echo($agerange); ?>" style="direction:ltr;">  <?php echo($agerange); ?> </option>   
                            <option value="10 بالای">10+</option>
                            <option value="14 بالای">14+</option>
                            <option value="12 بالای">12+</option>
                            <option value="16 بالای">16+</option>
                            <option value="12-7">12-7</option>
                            <option value="10-100">10-100</option>
                        </select>
                     <!-- <input  class="inputImg"  type="text" id="." name="."  style="visibility:hidden;"> -->
                </div>


                <div>
                       <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> قیمت  :</p>
                         <input  class="inputImg"  type="text" id="price" name="price" placeholder="  قیمت را وارد کنید" value="<?php echo($price); ?>">

                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       
                     <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span>  ژانر  :</p>
                     <select  class="inputImg"  id="genre" name="genre"   style="margin-left:35px;" >
                          <option value="<?php echo($genre); ?>"> <?php echo($genre); ?> </option>
                          <option value="ماجراجویی">ماجراجویی</option>
                          <option value="فانتزی">فانتزی</option>
                          <option value="زندگی نامه">زندگی نامه</option>
                          <option value="فانتزی-ماجراجویی">فانتزی-ماجراجویی</option>
                          <option value="ماجراجویی-وحشت">ماجراجویی-وحشت</option>
                          <option value="کارآگاهی-معمایی">کارآگاهی-معمایی</option>
                          <option value="علمی تخیلی">علمی تخیلی</option>
                          <option value="رمان نوجوان">رمان نوجوان</option>
                          <option value="فانتزی جادویی">فانتزی جادویی </option>
                     </select>
                </div>

                <div>
                    <p style="text-align:right ;font-size:20px;margin-right:140px;"><span style="color:red;">*</span> موجودی کتاب : </p>
                    <input type="text" id="bookqty" name="bookqty"  class="inputImg" style="margin-right:100px;" value="<?php echo($bookqty); ?>"  placeholder="موجودی را وارد کنید"  >
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>

                <div>
                    <p style="text-align:right ;font-size:20px;"><span style="color:red;">*</span> تصویر کتاب : </p>
                    <?php if(!empty($bookimage)){
                              echo("<img src='image/books/$bookimage' width='90px' height='100px'>");
                              $_SESSION['bookimage']=$bookimage; }
                          else {
                     ?>
                    <input type="file" id="bookimage" name="bookimage"   style="display:inline-block;flex:right;" disabled >
                      <?php  } //else ?>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>

                <div>
                       <p style="text-align:right ;font-size:20px;"><span style="color:red;">*</span> PDF کتاب : </p>
                       <?php if(!empty($bookpdf)){
                              echo("<img src='image/pdf.icon.png' width='40px' height='60px'>");
                              $_SESSION['bookpdf']=$bookpdf; }
                          else {
                     ?>
                    <input type="file" id="bookpdf" name="bookpdf"   style="display:inline-block;flex:left;"  disabled >
                      <?php  } //else ?>
                </div>

                <div>
                     <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span>  خلاصه کتاب :</p>
                     <textarea   type="text" id="summary" name="summary" placeholder="  خلاصه کتاب را وارد کنید"  rows="10" cols="90"  ><?php echo($summary); ?></textarea>
                </div>
              

                <div>
                       <p style="  width:200px;height:0px;"></p>
                         <button style="width:200px;height:50px;background-color:blue;color:white;font-size:20px;"  onclick="sure();" id="manage" name="manage" > <?php echo($btn_caption); ?> </button>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input style="width:200px;height:50px;background-color:blue;color:white;font-size:20px;"  type="reset" id="reset" name="reset" value="لغو">
                </div>
           
        </form>
     </div>

           
<?php
   $query="SELECT * FROM books";
   $result=mysqli_query($link,$query);
?>

<table style="width:80%;text-align:center;direction:rtl;margin:30px 130px;" border="1px">
  <tr>
    <td>کد کتاب</td>
    <td>نام کتاب</td>
    <td>موجودی کتاب</td>
    <td>قیمت کتاب</td>
    <td>تصویر کتاب</td>
    <td>ابزار مدیریتی</td>
  </tr>
   
<?php
      while($row=mysqli_fetch_array($result)) {
?>

   <tr>
      <td> <?php echo($row['bookcode']); ?></td>
      <td> <?php echo($row['name']); ?></td>
      <td> <?php echo($row['bookqty']); ?></td>
      <td> <?php echo($row['price']); ?></td>
      <td> <img src="image/books/<?php echo($row['bookimage']); ?>" width="100px" height="95px" style="padding:7px"></td>
      <td>
          <b><a href="admin_Books_Management.php?id=<?php echo($row['bookcode']); ?>&action=DELETE" style="text-decoration:none;padding-left:25px;" > حذف</a></b>
          <b><a href="admin_Books_Management.php?id=<?php echo($row['bookcode']); ?>&action=EDIT" style="text-decoration:none;padding-right:25px;"> ویرایش</a></b>
      </td>
   </tr>

<?php 
      } //while
?>

</table>

</section>

</body>
</html>









