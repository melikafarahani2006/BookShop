<?php
session_start();
if(!(isset($_SESSION['state_login']) && $_SESSION['state_login']===true && $_SESSION['user_type']=="admin")){
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
    <title>آپلود کتاب</title>
    <style>
        *,body{
            direction:rtl;
        }
         .cover{
            width:100%;
            height:100%;
            position:absolute;
            display:flex;
            align-items:center;
            justify-content:center;
            top:120px;
        }
        .upload {
            width:50%;
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
        <img src="./image/mainBackground.jpg" alt=""  class="back" style="width:100vw;height:900px;position:relative;opacity:0.5;">
        <a href="http://localhost/bookworm/homepage.php" ><img src="./image/exitIcon..png" style="position:absolute;top:10px;right:20px;width:50px;height:50px;"></a>

     <div class="cover">
        <form class="upload"  name="upload" action="action_admin_products.php" method="POST"   enctype="multipart/form-data">
          
                <div>
                         <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> نام :</p>
                         <input   class="inputImg"  type="text" id="name" name="name" placeholder="  نام کتاب را وارد کنید"  style="margin-right:10px;">
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                     <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> نویسنده  :</p>
                     <input   class="inputImg"  type="text" id="author" name="author" placeholder="  نام نویسنده را وارد کنید"  style="margin-left:40px;">
                </div>


                <div>
                         <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> مترجم  :</p>
                         <input  class="inputImg"  type="text" id="translator" name="translator" placeholder="  نام مترجم را وارد کنید">
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                     <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> کد کتاب :</p>
                     <input  class="inputImg"  type="text" id="bookcode" name="bookcode" placeholder="  کد کتاب را وارد کنید" style="margin-left:35px;">
                </div>


                <div>
                    <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span>  تعداد صفحات  :</p>
                     <input  class="inputImg"  type="text" id="sheets" name="sheets" placeholder="  تعداد صفحات را وارد کنید">
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                     <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span> رده سنی :</p>
                         <select  class="inputImg"   id="agerange" name="agerange"   style="margin-right:10px;">  
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
                         <input  class="inputImg"  type="text" id="price" name="price" placeholder="  قیمت را وارد کنید">

                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       
                     <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span>  ژانر  :</p>
                     <select  class="inputImg"  id="genre" name="genre"   style="margin-left:35px;">
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
                    <p style="text-align:right ;font-size:20px;margin-right:180px;"><span style="color:red;">*</span> موجودی کتاب : </p>
                    <input type="text" id="bookqty" name="bookqty"  class="inputImg" style="margin-right:200px;"  placeholder="موجودی را وارد کنید"  >
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>

                <div>
                    <p style="text-align:right ;font-size:20px;"><span style="color:red;">*</span>آپلود تصویر کتاب : </p>
                    <input type="file" id="bookimage" name="bookimage"   style="display:inline-block;flex:right;"  multiple >
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>

                <div>
                       <p style="text-align:right ;font-size:20px;"><span style="color:red;">*</span>آپلود PDF کتاب : </p>
                    <input type="file" id="bookpdf" name="bookpdf"   style="display:inline-block;flex:left;"  multiple >
                </div>

                <div>
                     <p style="text-align:right;font-size:20px;"><span style="color:red;">*</span>  خلاصه کتاب :</p>
                     <textarea   type="text" id="summary" name="summary" placeholder="  خلاصه کتاب را وارد کنید"  rows="10" cols="90"></textarea>
                </div>
              

                <div>
                       <p style="  width:200px;height:0px;"></p>
                         <button style="width:200px;height:50px;background-color:blue;color:white;font-size:20px;"   id="upload" name="upload" >آپلود کن</button>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input style="width:200px;height:50px;background-color:blue;color:white;font-size:20px;"  type="reset" id="reset" name="reset" value="لغو">
                </div>
           
        </form>
     </div>

           
</section>

</body>
</html>