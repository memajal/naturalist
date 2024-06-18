<html>  
<head>  
<title> Pagination </title>  
</head>  
<body>  
  
<?php  
  
    //database connection  
   
    /*----report and show all the php errors----*/
    	error_reporting(E_ALL);
      ini_set('display_errors', 1);

    /*----include the database conection----*/  
      include_once("uni/db_connect.php");

  
    //define total number of results you want per page  
    $results_per_page = 15;  
  
    //find the total number of results stored in the database  
    $query = "select *from posts";  
    $result = mysqli_query($connect, $query);  
    $number_of_result = mysqli_num_rows($result);  
  
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
    $query = "SELECT *FROM posts LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($connect, $query);  
      
    //display the retrieved result on the webpage  
    while ($row = mysqli_fetch_array($result)) {  
        echo $row['Post_Title'] . ' ' . $row['Post_Author'] . '</br>';  
    }  
  
  
    //display the link of the pages in URL  
    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "pagination.php?page=' . $page . '">' . $page . ' </a>';  
    }  
  
?>  
</body>  
</html>