<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title> Moisture Update</title>
  
  <link rel="stylesheet" href="style.sass">
    
    <link rel="stylesheet" href="style.css">
         <link rel="stylesheet" href="css/circle.css">
        <link rel="stylesheet" href="css/style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



 <script>
                                                            
       
</script>
    
     
    
    
    
    
</head>


    <body id="bod">
        <?php
     
    $moist=$_GET["moist"];
     
    
                                $sql= new mysqli('localhost','root', '', 'farminger' );

                                if($sql->connect_error)

                                    { die("connection failed:". $sql->connect_error);
                                    }
                                 else 
                                     echo "connection success";

                               
                            $moist_per=ceil(100*$moist/600); #convert sensor data to percentage

                                $querry1= $sql->query("insert into cur_moist (value) VALUES ($moist_per) "); #insert in table
                                $querry= $sql->query("select cur_moist.* from cur_moist"); #display
    
    

    
    
    if ($querry1!==TRUE)
        echo "error";
   ?>

        
        
        <div class="clearfix" style="text-align:center;color:white;">
                    <h1>Moisture Level</h1>

             <?php  echo" <div class=\"c100 p". $moist_per ."\"style=\"margin-left:70px;\">
                    
                    <span>".$moist_per."%</span>";
    
              ?>
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
 <button>Get External Content</button>

     </body>
    
  <script>
       $(document).ready(function(){
      refreshTable();
    });

    function refreshTable(){
        $('#bod').load('moistureDisp.php', function(){
           setTimeout(refreshTable, 2000);
        });
    }
     
</script>  
</html>
