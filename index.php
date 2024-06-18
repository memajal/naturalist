<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php 
    /*----report and show all the php errors----*/
    	error_reporting(E_ALL);
      ini_set('display_errors', 1);

    /*----include the database conection----*/  
      include_once("uni/db_connect.php");

      include_once("uni/db_select.php");
?>

<!-- The header will contain the title, icon and 
links for css and javascript -->
<head>
    <meta charset="utf-8" />
    <title>Naturalists</title>
    <meta name="description" content="A Blog website about bio foods, exercises, skin care, ect">
	<meta name="keywords" content="bio foods, exercises, skin care, health">
	<meta name="author" content="Alketa Memaj"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 

    <link rel="icon" href="img/naturalists_icon.png">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/blogger-sans-bold-otf" type="text/css"/>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/slideshow.css">
    <link rel="stylesheet" href="css/content.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://kit.fontawesome.com/b2064e6a7e.js" crossorigin="anonymous"></script> 

    <style>
    .current{
        background-color:white;

    }
    </style>

</head>

<body>

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
		 <a href="category.php?category=Bio_Foods"> Bio Foods </a> 
	      <a href="category.php?category=Health"> Health </a> 
	      <a href="category.php?category=Exercises"> Exercises </a>
          <a href="category.php?category=Skin_Care">Skin care </a>
      
      </div>
   </div>

  


   <div id="page">
    
     <div class="content">
        
        <?php
        $query="SELECT * FROM posts ORDER BY Post_Date DESC LIMIT 3";
        $result=mysqli_query($connect, $query);
        while($row=mysqli_fetch_assoc($result))
        {   
            $img_src="img/".$row["Title_Excert"].".jpg";
            $anchor_href="img/$row[Title_Excert]";
            $category=$row["Post_Category"];
            $title=$row["Post_Title"];
            $content=$row["Content_Excert"];
            $title_ex=$row["Title_Excert"];
            $link="article.php?title=" .$title_ex. "";

            echo '
            <div class="slide-show">
              <img src=" '.$img_src.'"> 
              <div class="text_over_img">
                <h2 style="display:none;">'.$category.'</h2>
                <h3><a href=" '.$link.'">'.$title.'</a></h3>
                <h4>' .$content. '</h4> 
              </div>
            </div>';  

            
         }

         
        ?>    
       

        <!-- The dots/circles -->
        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
          <span class="dot" onclick="currentSlide(3)"></span>
        </div>
         
        <header>
         
          <ul id="menu">
             <li class="current"><a href="index.php">Home</a></li>
             <li><a href="category.php?category=Bio_Foods">Bio Foods</a></li>
             <li><a href="category.php?category=Health">Health</a></li>
             <li><a href="category.php?category=Exercises">Exercises</a></li>
             <li><a href="category.php?category=Skin_Care">Skin care</a></li>
          
          </ul>
        </header> 
        
        
        <h2 style="color:black; background-color:white;"> Last Articles</h2>
        <div class="last_articles">
          <?php
              
              
            $query="SELECT * FROM posts";
            $result=mysqli_query($connect, $query);
            $number_of_result = mysqli_num_rows($result); 
            $results_per_page=10;
           
           //determine the total number of pages available  
           $number_of_page = ceil ($number_of_result / $results_per_page); 

           //determine which page number visitor is currently on  
           if (!isset ($_GET['page']) ) {  
           $page = 1;  
           } else {  
           $page = $_GET['page'];  
           }  
  
            //determine the sql LIMIT starting number for the results on the displaying page  
            $page_first_result = ($page-1) * $results_per_page;  

            //retrieve the selected results from database   
            $query = "SELECT *FROM posts ORDER BY Post_Date DESC LIMIT " . $page_first_result . ',' . $results_per_page; 
            $result = mysqli_query($connect, $query);  

            while($row=mysqli_fetch_assoc($result))
            { 
              $img_src="img/".$row["Title_Excert"].".jpg";
              $anchor_href="img/$row[Title_Excert]";
              $category=$row["Post_Category"];
              $title=$row["Post_Title"];
              $author=$row["Post_Author"];
              $date=$row["Post_Date"];
              $content=$row["Content_Excert"];
              $title_ex=$row["Title_Excert"];
              $link="article.php?title=" .$title_ex. "";
            
             echo "
              <div class='last_articles_posts'>
                 <a href=" .$link. "> <img src=" .$img_src."> </a>
                 <a href=category.php?category=" .$category. "><h5>" .$category. "</h5></a>
                 <a href=" .$link."> <h4>".$title."</h4></a>
                 
                 
                 <span id='author_date'>" .$author. '&nbsp Date:' .$date. "</span>
                 <h6>" .$content. "</h6> 
               </div>";
            }
          ?>
        </div>

        <div class="pagination">
           <?php
            //display the link of the pages in URL  
        for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "index.php?page=' . $page . '" >' . $page . ' </a>';  
    }  
          ?>
           
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

<script type="text/javascript" src="js/slideshow.js"></script>
<script type="text/javascript" src="js/mobile_menu.js"></script>
<script type="text/javascript" src="js/style.js"></script>

</body>
</html>