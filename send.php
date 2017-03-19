 <html>

<head>
   
    
    
  <?php
  $sql= new mysqli('localhost','root', '', 'farminger' );

                                if($sql->connect_error)

                                    { die("connection failed:". $sql->connect_error);
                                    }
                                 else 
                                     echo "connection success";

                   $a=$_POST['a'];            
                           

                                $querry1= $sql->query("insert into test (val) VALUES ($a) "); #insert in table
                                
    
    

    
    
    if ($querry1!==TRUE)
        echo "error";
   
?>
                        
                       
     
     
     </head>

    
    addded
    
    

</html>

                             