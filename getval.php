<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>CSS Table Layout</title>
  
  <link rel="stylesheet" href="style.sass">
    <link rel="stylesheet" href="style.css">

 <script>
     
        
        
                                                                                        
                                                                                  

       
</script>
    
    
</head>

<?php
    
    $sens_top=$_GET["sens_top"];
    $sens_bot= $_GET["sens_bot"];
    $moist=$_GET["moist"];
    $pstat=$_GET["pstat"];
    
    if($sens_top>=0 && $sens_top<=200)
    {
        $full=1;
        $status=1;
        $empty=0;
    }
     
    else if ($sens_bot>=900 && $sens_bot<=1020)
    {
        $full=0;
        $status=0;
        $empty=1;
    }
    

                                $sql= new mysqli('localhost','root', '', 'farminger' );

                                if($sql->connect_error)

                                    { die("connection failed:". $sql->connect_error);
                                    }
                                 else 
                                     echo "connection success";

                                 
    
    $querry1= $sql->query("insert into tank (top, bottom, status) VALUES ($full, $empty, $status)");
    $querry2= $sql->query("insert into pump_status (pump_status) VALUES ($pstat)");
    
    
    $moist_per=ceil(100*$moist/1020); #convert sensor data to percentage
    
$querry3= $sql->query("insert into cur_moist (value) VALUES ($moist_per) "); #insert in table
    
    $querry= $sql->query("select tank.* from tank");
                               
        if($querry1==FALSE)
        { echo "code error 1";
        }
    if($querry2==FALSE)
        { echo "code error2";
        }
    if($querry3==FALSE)
        { echo "code error 3";
        }
    
    
    
                                              
    
  ?>

    <body>
                    
                            
       
        
         <div class="wrapper ">

                      <div class="table ">

                        <div class="row header green">
                          <div class="cell">
                            timestanp
                          </div>
                          <div class="cell">
                            Tank Status
                          </div>
                          


                          </div>

       

      
             <?php

                                                    if($querry!==FALSE)
                                                    {
                                                        while($row = mysqli_fetch_array($querry))
                                                                 { echo "<div class=\"row\">
                                                                                <div class=\"cell\">".$row["Timestamp"].
                                                                                    "</div><div class=\"cell\">";
                                                                  if($row["status"]==0)
                                                                  {
                                                                      echo" <div class=\"cell\"> Tank Almost Empty
                                                                                    </div>";
                                                                  }
                                                                  else 
                                                                  {
                                                                      echo" <div class=\"cell\"> Tank Almost Full
                                                                                    </div>";
                                                                  }
                                                                  
                                                                  
                                                                     echo "</div></div>";
                                                                 }
                                                                                mysqli_free_result($querry);
                                                    }
                                              mysqli_close($sql);
            ?>

                        </div>
                    </div>
 
    
    </body>
    
    
</html>
