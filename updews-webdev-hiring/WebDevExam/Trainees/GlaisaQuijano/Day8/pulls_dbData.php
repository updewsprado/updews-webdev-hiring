<?php
    include ('dbConnection.php');
    if (isset($_GET['optNode'])) 
        
        
    $node = $_GET['optNode'];
    $conn = mysqli_connect($dbLocation, $dbUser, $dbPassword, $dbName);

    //check connection
        if (mysqli_connect_errno())
        {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        } else { 
                    $query = "SELECT * FROM accel";
                    $output = mysqli_query($conn, $query);
                    while ($record = mysqli_fetch_array($output)){
                    $record = (object)$record; 
                ?>            
                     <tbody>              
                        <tr> 
                           <td><?php echo $record->timestamp; ?></td>
                           <td><?php echo $record ->node; ?></td>
                           <td><?php echo $record ->xval; ?></td>
                           <td><?php echo $record->yval; ?></td>
                           <td><?php echo $record ->zval; ?></td> 
                           <td><?php echo $record ->mval; ?></td>
                       </tr>
                       
                       </tbody> <?php 
                       
              } ?>    
                    </table> 
               
    <?php
            
}        
        
?> 
