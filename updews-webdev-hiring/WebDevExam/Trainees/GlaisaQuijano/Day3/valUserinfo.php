<?php       
        $fname = $_POST['txtFirstName'];
        $lname = $_POST['txtLastName'];
        $email = $_POST['txtEmail']; 
        $age = $_POST['txtAge'];
        
        $conn = mysqli_connect('localhost', 'root', '', 'exam');
        
        $sql = "SELECT * FROM tbluserinfo WHERE firstname='$fname' AND lastname='$lname'";
        $output = mysqli_query($conn, $sql);
        
// check if name is already existing in the database        
        if ($output->num_rows >0) {
            header("location:day2.php?name=exist");               
        } else  {  
            $sql = "INSERT INTO tbluserinfo (firstname, lastname, email, age) VALUES ('$fname','$lname','$email',$age)";
            mysqli_query($conn, $sql); 
            header("location:day2.php?name=added");    
        } 
        ?>