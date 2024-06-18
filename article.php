<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<?php 
    /*----report and show all the php errors----*/
    	error_reporting(E_ALL);
      ini_set('display_errors', 1);

    /*----include the database conection----*/  
      include_once("uni/db_connect.php");

   
?>

<!-- The header will contain the title, icon and  links for css and javascript -->
<head>
    <meta charset="utf-8" />
    <title>Naturalists</title>
    <meta name="description" content="A Blog website about bio foods, exercises, skin care, ect">
	<meta name="keywords" content="bio foods, exercises, skin care, health">
	<meta name="author" content="Alketa Memaj"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 

     
     <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/blogger-sans-bold-otf" type="text/css"/>
     <link rel="stylesheet" href="css/header.css">
     <link rel="stylesheet" href="css/presantation.css">
     <link rel="stylesheet" href="css/content.css">
      <link rel="stylesheet" href="css/footer.css">
      <link rel="stylesheet" href="css/article.css">
      
 
      <script src="https://kit.fontawesome.com/b2064e6a7e.js" crossorigin="anonymous"></script>
      

</head>

<body>


    <?php
           
           $id= $_GET['title'];
           $query_article="SELECT * FROM posts Where Title_Excert='$id'";
           $result_article=mysqli_query($connect, $query_article);
           $row_article=mysqli_fetch_assoc($result_article);
             $img_src="img/".$row_article["Title_Excert"].".jpg";
             $title=$row_article["Post_Title"];
             $description=$row_article["Content_Excert"];
             $author=$row_article["Post_Author"];
             $date=$row_article["Post_Date"];
             $category=$row_article["Post_Category"];
             $title_ex=$row_article["Title_Excert"];
             $link="article.php?title=" .$title_ex. "";
     ?>

  <div id="logo_desktop">
   <img src="img/naturalists_logo.png" alt="naturalists website logo">
  </div>
 
  <div id="header_mobile">
      <img id="naturalists_logo" src="img/naturalists_logo.png" alt="naturalists website logo">
      <i class="fa-solid fa-bars fa-2x" onclick="openNav()" id="toogle_menu"></i>
   </div>

   <div id="mobile_nav" class="overlay">
     <i class="fa-solid fa-xmark fa-2x" onclick="closeNav()"></i>
      <div class="overlay-content">
         <a href="index.php" style="color:red;"> Home </a>
		 <a href="bio_foods.php" style="color:#1fbfb8;" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='#1fbfb8'"> Bio Foods </a> 
	      <a href="health.php" style="color:#05716c;" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='#05716c'"> Health </a> 
	      <a href="exercises.php" style="color:#197ba5;" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='#197ba5'"> Exercises </a>
          <a href="skin_care.php" style="color:#031163;" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='#031163'">Skin care </a>
      
      </div>
   </div>

  
 <div id="page">

   <div class="content_article">
   <?php echo "
       <h1 id='article_title'>$title</h1>
       <h2 id='article_category' style='display:none;'>$category</h2>  
     ";
   ?>
       
                   
       

       <div class="page_content">
         <?php echo "
              <div class='content_article_1'>
                <img src='$img_src' id='article_img_1'> </img>
                <p class='description_1'> $description </p>
               </div>

              <div class='content_article_2'>
               <p class='description_2'> $description </p>
               <img src='$img_src' id='article_img_1'> </img>
              </div>

              <div class='article_comments'> 
               <p> <i class='fa-solid fa-location-dot'></i> .../ <a href='index.php'>Home</a> / <a href=category.php?category=".$category.">" .$category. "</a> / <a href=" .$link. ">" .$title. "</a>
              </div>
        
              <div class='last_art_cont'>
               <h3> Last Articles </h3> ";
         ?>
          
    


         <?php
             $query_last="SELECT * FROM posts ORDER BY 'Post_Date' DESC Limit 8";
             $result_last=mysqli_query($connect, $query_last);
             while($row_last=mysqli_fetch_assoc($result_last))
              {
                $title_last=$row_last["Post_Title"];
                $date_last=$row_last["Post_Date"];
                $category_last=$row_last["Post_Category"];
                $title_ex=$row_last["Title_Excert"];
                $link="article.php?title=" .$title_ex. "";

               echo "
               
              <a href=" .$link. "><h5>" .$title_last. "</h5></a>
              <a href=category.php?category=" .$category_last. "><h6>" .$category_last. "</h6></a>
              
               ";
             } 
         ?>
       </div>          
   </div>

  </div>

  </div>

 <footer>
      <div id="about_us"> 
        <h3> About us </h3>
        <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
        Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
        Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. 
        Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut,
        </p>
      </div>

      <div id="contact_us">
       <h3> Contact us</h3>
       <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook fa-2x"></i></a>
        <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram fa-2x"></i></a>
        <a href="https://www.youtube.com/" target="_blank"><i class="fa-brands fa-youtube fa-2x"></i></a>
       <a href="https://twitter.com/" target="_blank"> <i class="fa-brands fa-twitter fa-2x"></i></a>
     </div>
   </footer>

  
 
 
 <script type="text/javascript" src="js/article.js"></script>
 <script type="text/javascript" src="js/mobile_menu.js"></script>
 </body>
 </html>