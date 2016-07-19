<html>
    <head>
        <title>WebDev Exam-Day2</title>
        <link rel="stylesheet" type="text/css" href="css/css4.css">
    </head> 
      
    <body>
        <header class="header"><h1>WebDev Exam</h1> 
                        
        </header>       
         
        <div class="web-content">
            <div id="about-content">
                    <h2>Please input your details</h2>
                    <form class="frmUserinfo" method="post" action="valUserinfo.php" name="frmUserinfo">
                        <label>First Name</label><input type="text" name="txtFirstName" required><br>
                        <label>Last Name</label><input type="text" name="txtLastName" required><br>
                        <label>Email</label><input type="text" name="txtEmail"><br>
                        <label>Age</label><input type="number" name="txtAge" required><br><br>
                             <button type="submit" id="btnInfo">Submit</button>
                    </form> 
                     
                    <p style="margin-top: 50px; padding: 50px;"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div> 
        </div>  
        
         <div class="left-sidebar">
            <?php include ('navBar.php') ?> 
        </div>  

    </body>  
</html>
