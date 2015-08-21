<?php 
    
    require 'connection.php';

  if(isset($_POST['keyword'])){
     $keyword = trim($_POST['keyword']);
     $keyword = mysqli_real_escape_string($link, $keyword);
     $query = "select * from users where [Contact Name] like '$keyword%'"; //MUST BEGIN WITH $KEYWORD

    //echo $query;
     $result = mysqli_query($link,$query);
     if($result){
        if(mysqli_affected_rows($link)!=0){
         while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
         echo '<span><a class="meterRow">'.$row['meter_name'].'</a><span>'.$row['meter_location'].'</span></span>';
        }
     }else {
        echo 'No Results for :"'.$_POST['keyword'].'"';
        }
    }
    }else {
     echo 'Parameter Missing';
    }

 ?>