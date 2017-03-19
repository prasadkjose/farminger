 <?php
 $moist=$_GET['moisture'];
    
     echo "test sucessful..... moisture:" .$moist;


 $sql= new mysqli('localhost','u515704334_a', 'qwerty123', 'u515704334_a' );

                                if($sql->connect_error)

                                    { die("connection failed:". $sql->connect_error);
                                    }
                                 else 
                                     echo "connection success";

                                $querry= $sql->query("select test.* from test");
                             $sql->query("insert into test (value) values ($moist)");
if($querry!==FALSE){
                  
    echo "<table cellpadding=\"10\" border= \" 3px \"> <tr> <th>value</th> <th> timestamp </th> <th>Sno </th> </tr>";
		     while($row = mysqli_fetch_array($querry))
             {
                  echo "<tr>" ;

		       echo " <td>";
                     echo   $row["value"] ;
                echo "</td> <td>  "; 
                 echo $row["timestamp"] ;
                 echo "</td></tr> ";
                
                }
                echo "</table>";
		    mysqli_free_result($querry);
		  } ;
     
     ?>