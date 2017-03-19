<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Moisture</title>
  
  <link rel="stylesheet" href="style.sass">
    
    <link rel="stylesheet" href="style.css">
         <link rel="stylesheet" href="css/circle.css">
        
        <link rel="stylesheet" href="css/button.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>




 <script>
                                                            
       
</script>
    
     
    
    
    
    
</head>

<?php
     
     
    
                                $sql= new mysqli('localhost','root', '', 'farminger' );

                                if($sql->connect_error)

                                    { die("connection failed:". $sql->connect_error);
                                    }
                                 
                               
                             
       
       $querry1= $sql->query("select cur_moist.* from cur_moist order by timestamp desc limit 1"); #display

                                 $querry= $sql->query("select cur_moist.* from cur_moist"); #display
    
    

    
    
   ?>

    <body id="bod">
        
        <div style="text-align:center;">   
            <p class="text-center" style="float:left;" > <a href="index.html" class="myButton1">Home</a></p>
            <p class="text-center" style=" float:left;" > <a href="pump.php" class="myButton2">Pump Status</a></p>
            <p class="text-center" style="float:left;" > <a href="moistureDisp.php" class="myButton3">Refresh</a></p>
        </div>
            
            <br>
        
                     

                    <br>
                    <br>
                    <br>
                    
        <div class="clearfix" style="text-align:center;color:white;">

                    <h1>Moisture Level</h1>

             <?php 
                                                        if($querry1!==FALSE)
                                                    {
                                                        while($row = mysqli_fetch_array($querry1))
                                                                 {  
                                                             echo" <div class=\"c100 p". $row["value"] ."\"style=\"margin-left:120px;\">
                    
                                                                                    <span>".$row["value"]."%</span>
                                                                                        <div class=\"slice\">
                                                                                        <div class=\"bar\"></div>
                                                                                        <div class=\"fill\"></div>
                                                                                    </div>
                                                                                </div>";
                                                                 }
                                                                                mysqli_free_result($querry1);
                                                    }
            else echo"error";
                                             
           
     
         ?>
        
        </div>
    
        
        
         <br>
         <br>
         <br>
         <br>
         <br>
        
        
                                                    
        

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
    <script>$(document).ready(function(){
      refresh();
    });

    function refresh(){
        $('#bod').load('dashdispAjax.php', function(){
           setTimeout(refresh, 2000);
        });
    } 
     </script>
    
    
     
    
    
    
    
    
</html>
