<?php
      session_start();
      if(!(isset($_SESSION['state_login']) && $_SESSION['state_login']===true && $_SESSION['user_type']=='admin')){
 ?>

 <script>
    location.replace("homePage.php");
 </script>

 <?php
       }
   ?>



<?php
if(isset($_POST["name"]) && !empty($_POST["name"]) &&
   isset($_POST["author"]) && !empty($_POST["author"]) &&
   isset($_POST["translator"]) && !empty($_POST["translator"]) &&
   isset($_POST["price"]) && !empty($_POST["price"]) &&
   isset($_POST["sheets"]) && !empty($_POST["sheets"]) &&
  isset($_POST["agerange"]) && !empty($_POST["agerange"]) &&
   isset($_POST["genre"]) && !empty($_POST["genre"]) &&
   isset($_POST["summary"]) && !empty($_POST["summary"]) &&
   isset($_POST["bookqty"]) && !empty($_POST["bookqty"]) &&
   isset($_POST["bookcode"]) && !empty($_POST["bookcode"]) )

   {
    $name=$_POST["name"];
    $author=$_POST["author"];
    $translator=$_POST["translator"];
    $price=$_POST["price"];
    $sheets=$_POST["sheets"];
    $agerange=$_POST["agerange"];
    $summary=$_POST["summary"];
    $genre=$_POST["genre"];
    $bookqty=$_POST["bookqty"];
    $bookcode=$_POST["bookcode"];
    $bookimage=$_FILES["bookimage"]["name"];
    $bookpdf=$_FILES["bookpdf"]["name"];

   }
   else
     exit("<script> alert('برخی فیلد ها مقدار دهی نشده اند'); </script>");




     $target_imagefile="image/books/".$bookimage;
     $target_pdffile="image/pdf/".$bookpdf;
     $uploadOk=1;
     $imageFileType=pathinfo($target_imagefile,PATHINFO_EXTENSION);
     $pdfFileType=pathinfo($target_pdffile,PATHINFO_EXTENSION);


     $check=getimagesize($_FILES["bookimage"]["tmp_name"]);
     if($check !== false){
        echo("پرونده انتخابی یک تصویر از نوع" .$check['mime']. "است<br/>");
          $uploadOk=1;
     }
     else
     {
        echo("<script> alert('پرونده انتخاب شده یک تصویر نیست!'); </script>");
        $uploadOk=0;
     }


     if(file_exists($target_imagefile)){
        echo("<script> alert('پرونده ای با همین نام در سرویس دهنده ی میزبان وجود دارد'); </script>");
        $uploadOk=0;
     }

     if(file_exists($target_pdffile)){
        echo("<script> alert('پرونده ای با همین نام در سرویس دهنده ی میزبان وجود دارد'); </script>");
        $uploadOk=0;
     }


     if($_FILES["bookimage"]["size"] > (500*1024)) {
        echo("<script> alert('اندازه ی پرونده ی انتخابی بیشتر از 500 کیلوبایت است'); </script>");
         $uploadOk=0;
     }



     if($imageFileType !="jpg" && $imageFileType !="JPG" && $imageFileType !="png" && $imageFileType !="PNG" && $imageFileType !="jpeg" && $imageFileType !="JPEG" && $imageFileType !="gif" && $imageFileType !="GIf")
     {
        echo("<script> alert('فقط پسوند های png , jpg , jpeg & gif برای پرونده مجاز هستند'); </script>");
        $uploadOk=0;
     }


     if($pdfFileType !="pdf" && $pdfFileType !="PDF"   )
     {
        echo("<script> alert('فقط پسوند PDF برای پرونده مجاز هستند'); </script>");
        $uploadOk=0;
     }


     if($uploadOk==0){
        echo("<script> alert('پرونده ی انتخاب شده به سرویس دهنده ی میزبان ارسال نشد'); </script>");
     }
     else{
        if(move_uploaded_file($_FILES["bookimage"]["tmp_name"],$target_imagefile) && move_uploaded_file($_FILES["bookpdf"]["tmp_name"],$target_pdffile)){
            echo("پرونده" .$_FILES['bookimage']['name']. $_FILES['bookpdf']['name']. "با موفقیت به سرویس دهنده ی میزبان انتقال یافت<br/>");
        }
        else{
            echo("<script> alert('خطا در ارسال پرونده به سرویس دهنده ی میزبان رخ داده است'); </script>");
        }
     }





     $link=mysqli_connect("localhost" , "root" , "" , "bookworm");
     if(mysqli_connect_errno())
       exit("error :" .mysqli_connect_error());
     mysqli_query($link , "SET NAMES UTF8"); ///farsi
    


     if($uploadOk==1)
     {
        $query="INSERT INTO books (name,translator,author,bookcode,sheets,price,agerange,genre,bookimage,bookpdf,summary,bookqty)
         VALUES ('$name','$translator','$author','$bookcode','$sheets','$price','$agerange','$genre','$bookimage','$bookpdf','$summary','$bookqty')";

         if(mysqli_query($link,$query)=== true)
         echo("<script> alert('کتاب جدید با موفقیت به لیست کتاب ها اضافه شد'); </script>");
         else
         echo("<script> alert('خطا در ثبت مشخصات کتاب در انبار'); </script>");
     }
     else
     echo("<script> alert('خطا در ثبت مشخصات کتاب در انبار'); </script>");

     mysqli_close($link);
?>



<script>
    location.replace("wholeBooks.php");
</script>





