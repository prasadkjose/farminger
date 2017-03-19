<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Pump status</title>
  
  <link rel="stylesheet" href="style.sass">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/button.css">
       
     
        
        
                                                                                        
                                                                                  

       
 
</head>

<?php
    
     
    
                                $sql= new mysqli('localhost','root', '', 'farminger' );

                                if($sql->connect_error)

                                    { die("connection failed:". $sql->connect_error);
                                    }
                                 

                                $querry= $sql->query("select pump_status.* from pump_status");
    $querry1= $sql->query("select tank.status from tank order by timestamp desc limit 1"); 
           $querry2= $sql->query("select pump_status from pump_status order by timestamp desc limit 1"); #display

    
    
    
  ?>

    <body id="bod">
        
         <div style="text-align:center;">   
            <p class="text-center" style="float:left;" > <a href="index.html" class="myButton1">Home</a></p>
            <p class="text-center" style="margin-left:25px; float:left;" > <a href="moistureDisp.php" class="myButton2">Moisture</a></p>
            <p class="text-center" style="float:right; margin-right:10px;" > <a href="pump.php" class="myButton3">Refresh</a></p>
        </div>
        <br>
        <br>
        <br>
        
        
 <?php       
      
                                        if($querry2!==FALSE)
                                                    {
                                                        while($row = mysqli_fetch_array($querry2))
                                                                 { 
                                                            if($row["pump_status"]==1)
                                                            {
                                                             echo "<p class=\"text-center\" style=\" margin-left:70px;\" > <a  class=\"myButton4\" style=\"color:#2F4F4F;\">Pump is ON</a></p>";
  
                                                            }
                                                            else
                                                            {
                                                                echo "<p class=\"text-center\" style=\" margin-right:70px;\" > <a  class=\"myButton4\" style=\"color:#2F4F4F;\" >Pump is OFF</a></p>";

                                                            }
                                                            
                                                                  
                                                                 }
                                                                                mysqli_free_result($querry2);
                                                    }
        else
            echo "error";
 
        
            
?>
        


 
       
        
    
        
        
       
        
        
                    <div class="wrapper ">

                      <div class="table ">

                        <div class="row header green">
                           
                          <div class="cell">
                            Timestamp
                          </div>
                          <div class="cell">
                            Pump Status
                          </div>


                          </div>

       

      
             <?php

                                                    if($querry!==FALSE)
                                                    {
                                                        while($row = mysqli_fetch_array($querry))
                                                                 { echo "<div class=\"row\">
                                                                                <div class=\"cell\">".$row["timestamp"]."</div>";
                                                                  if($row["pump_status"]==0)
                                                                      
                                                                  {
                                                                      echo" <div class=\"cell\"> Pump OFF </div></div>";
                                                                  }
                                                                  
                                                                  else 
                                                                  {
                                                                      echo"<div class=\"cell\"> Pump ON </div></div>";
                                                                  }
                                                                 }
                                                                                mysqli_free_result($querry);
                                                    }
                                              mysqli_close($sql);
            ?>

                        </div>
                   
      
        
        
        
        
        <div class="bot" style="margin-left:20px; height:100px;">
        
            <?php  
                if($querry1!==FALSE)
                {
         while($row1 = mysqli_fetch_array($querry1))
                    { 
                
                if($row1["status"]==0)
                {
   echo "
   <h1 style=\"color:white; text-align:center\">Tank is almost empty.</h1>
                <p style=\"color:white; text-align:center\"> <i>Please turn ON the valve</i></p>   
   
   
   <ul>
    <li class=\"water-bottle\">
        <div class=\"cap\">
            <div class=\"cap-top\">
            </div>
            <div class=\"cap-seal\">
            </div>
        </div>
       <div class=\"bottle\">
            <div class=\"water-empty\"> </div>
        </div>
    </li>";
                }
                else
                {
      
    echo    "
    <h1 style=\"color:white; text-align:center\">Tank is almost full.</h1>
                <p style=\"color:white; text-align:center\"> <i>Please turn OFF the valve</i></p>   
   
    <li class=\"water-bottle\" style=\"margin-left:50px;\">
        <div class=\"cap\">
            <div class=\"cap-top\">
            </div>
            <div class=\"cap-seal\">
            </div>
        </div>
       <div class=\"bottle\" >
            <div class=\"water-full\" > </div>
        </div>
    </li>
   </ul>";
        
                      }
              
                                                    }
                                            
            mysqli_free_result($querry1);
                    
            }
?>
                
                 


        
        </div>
                         </div>
        
        <script>
        
        
        </script>
 
    
    </body>
    
    
</html>
