<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title> Moisture Update</title>
  
  <link rel="stylesheet" href="style.sass">
    
    <link rel="stylesheet" href="style.css">
         <link rel="stylesheet" href="css/circle.css">
        <link rel="stylesheet" href="css/style.css">


 <script>
                                                            
       
</script>
    
     
    
    
    
    
</head>

<?php
     
      
    
                                $sql= new mysqli('localhost','root', '', 'farminger' );

                                if($sql->connect_error)

                                    { die("connection failed:". $sql->connect_error);
                                    }
                                 else 
                                     echo "connection success";

                               
 
                                 $querry= $sql->query("select cur_moist.* from cur_moist"); #display
    
    

    
     
   ?>

    <body>
        
        
        <div class="clearfix" style="text-align:center;color:white;">
                    <h1>Moisture Level</h1>

             
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
        </div>
    
        
        
        
        
        
                                                    
        

                    <div class="wrapper">

                      <div class="table">

                        <div class="row header">
                           
                          <div class="cell">
                            Moisture Percentage
                          </div>
                          <div class="cell">
                            Timestamp
                          </div>


                          </div>

       

      
             <?php

                                                    if($querry!==FALSE)
                                                    {
                                                        while($row = mysqli_fetch_array($querry))
                                                                 { echo "<div class=\"row\">
                                                                                 <div class=\"cell\">".
                                                                                            $row["value"]."</div> <div class=\"cell\">".
                                                                                            $row["timestamp"]."</div></div>";
                                                                 }
                                                                                mysqli_free_result($querry);
                                                    }
                                              mysqli_close($sql);
            ?>

                        </div>
                    </div>
 
        

    </body>
    
     
  
</html>
