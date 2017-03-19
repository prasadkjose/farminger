<html>
<head>
     <link rel="stylesheet" href="style.sass">
    <link rel="stylesheet" href="style.css">
         <link rel="stylesheet" href="css/circle.css">
        <link rel="stylesheet" href="css/button.css">

    </head>
<body>
    
    <?php
     
     
    
                                $sql= new mysqli('localhost','root', '', 'farminger' );

                                if($sql->connect_error)

                                    { die("connection failed:". $sql->connect_error);
                                    }
                                 
                               
                             
       
       $querry1= $sql->query("select cur_moist.* from cur_moist order by timestamp desc limit 1"); #display

                                 $querry= $sql->query("select cur_moist.* from cur_moist"); #display
    
    

    
    
   ?>
  
    <div class="wrapper"  >
           
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
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        
        <div>
                
   <p class="text-center" ><a href="pump.php" class="myButton" ><i class="fa fa-download"> </i> Pump Status</a></p>
        </div>  
    
    
    </div>
    </body>

</html>