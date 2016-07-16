<html>
    <head>
        <title>Day2-HTML</title>
        <link rel="stylesheet" type="text/css" href="myCss.css">
    </head>
     
    <body>
        <header class="header"><h1>Day2-HTML</h1>
            <?php include ('dropdown.php')?>            
        </header>      
        
        <h2>Please input your details</h2>
        <form class="frmUserinfo" method="post" action="valUserinfo.php" name="frmUserinfo">
            <label>First Name</label><input type="text" name="txtFirstName" required><br>
            <label>Last Name</label><input type="text" name="txtLastName" required><br>
            <label>Email</label><input type="text" name="txtEmail"><br>
            <label>Age</label><input type="number" name="txtAge" required><br>
            <button type="submit" name="btnInfo">Submit</button>
        </form> 
    <?php     
        if ($_GET['name']=='exist'){
            echo "Name already exist!";
        } if ($_GET['name']=='added'){
            echo "Name successfully added"; 
        }
    ?> 
        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        
    </body>  
</html>
