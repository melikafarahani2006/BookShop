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
if(!(isset($_GET['action']) && $_GET['action']=='DELETE'))
{
  if(isset($_POST["name"]) && !empty($_POST["name"]) &&
      isset($_POST["bookcode"]) && !empty($_POST["bookcode"]) &&
      isset($_POST["bookqty"]) && !empty($_POST["bookqty"]) &&
      isset($_POST["price"]) && !empty($_POST["price"]) &&
      isset($_POST["summary"]) && !empty($_POST["summary"]) &&
      isset($_POST["translator"]) && !empty($_POST["translator"]) &&
      isset($_POST["genre"]) && !empty($_POST["genre"]) &&
      isset($_POST["agerange"]) && !empty($_POST["agerange"]) &&
      isset($_POST["sheets"]) && !empty($_POST["sheets"]) &&
      isset($_POST["author"]) && !empty($_POST["author"]) )

   {
    $name=$_POST["name"];
    $bookcode=$_POST["bookcode"];
    $bookqty=$_POST["bookqty"];
    $price=$_POST["price"];
    $summary=$_POST["summary"];
    $author=$_POST["author"];
    $translator=$_POST["translator"];
    $sheets=$_POST["sheets"];
    $genre=$_POST["genre"];
    $agerange=$_POST["agerange"];

      if(isset( $_SESSION['bookimage']) && !empty($_SESSION['bookimage'])) 
         { $bookimage=$_SESSION['bookimage']; }
      else
          { $bookimage=$_FILES["bookimage"]["name"]; }

          if(isset( $_SESSION['bookpdf']) && !empty($_SESSION['bookpdf'])) 
         { $bookpdf=$_SESSION['bookpdf']; }
      else
          { $bookpdf=$_FILES["bookpdf"]["name"]; }

   }
   else
     exit("<script> alert('برخی فیلد ها مقدار دهی نشده اند'); </script>");
}



                                                                $link=mysqli_connect("localhost" , "root" , "" , "bookworm");
                                                                if(mysqli_connect_errno())
                                                                  exit("error :" .mysqli_connect_error());
                                                                mysqli_query($link , "SET NAMES UTF8"); ///farsi

                                                                              
                                                                   if(isset($_GET['action']))
                                                                   {
                                                                     $id=$_GET['id'];
                                                                     $action=$_GET['action'];
                                                                      switch ($action) {
                                                                         case 'EDIT' :
                                                                           $query="UPDATE books SET 
                                                                           bookcode='$bookcode',
                                                                           name='$name',
                                                                           bookqty='$bookqty',
                                                                           price='$price',
                                                                           summary='$summary',
                                                                           author='$author',
                                                                           translator='$translator',
                                                                           genre='$genre',
                                                                           agerange='$agerange',
                                                                           sheets='$sheets'
                                                                           WHERE bookcode='$id' ";
                                                                     if(mysqli_query($link,$query)=== true)
                                                                       {
                                                                          echo("<script> alert('کتاب انتخابی با موفقیت ویرایش شد'); </script>");
                                                                           echo("<script> location.replace('admin_Books_Management.php'); </script> ");
                                                                       }
                                                                     else
                                                                        {
                                                                             echo("<script> alert('خطا در ویرایش کتاب'); </script>");
                                                                             echo("<script> location.replace('admin_Books_Management.php'); </script> ");
                                                                        }
                                                                         break;
                                                                           

                                                                         case 'DELETE' :
                                                                           $img_query="SELECT bookimage FROM books WHERE bookcode='$id' ";
                                                                           $img_result=mysqli_query($link,$img_query);
                                                                           $img_row=mysqli_fetch_array($img_result);
                                                                           $img_dir="image/books/".$img_row['bookimage'];


                                                                           $pdf_query="SELECT bookpdf FROM books WHERE bookcode='$id' ";
                                                                           $pdf_result=mysqli_query($link,$pdf_query);
                                                                           $pdf_row=mysqli_fetch_array($pdf_result);
                                                                           $pdf_dir="image/pdf/".$pdf_row['bookpdf'];


                                                                           $query="DELETE FROM books WHERE bookcode='$id'";
                                                                             if(mysqli_query($link,$query) === true)
                                                                               {
                                                                                 echo("<script> alert(' کتاب انتخابی با موفقیت از انبار حذف شد'); </script>");
                                                                                     if(unlink($img_dir) && unlink($pdf_dir))
                                                                                         echo("<script> alert('کتاب با موفقیت از سرور حذف شد'); </script>");
                                                                                     else
                                                                                         echo("<script> alert('خطا در حذف کتاب از سرور'); </script>");
                                                                                                   
                                                                               }
                                                                              else
                                                                               echo("<script> alert('خطا در حذف کتاب از انبار'); </script>");


                                                                         break;
                                                                     
                                                                                                                                                
                                                                          }

                                                                          mysqli_close($link);
                                                                          exit();
                                                                      
                                                                     
                                                                   }
                                             ?>
<script>
  location.replace("admin_Books_Management.php");
</script>