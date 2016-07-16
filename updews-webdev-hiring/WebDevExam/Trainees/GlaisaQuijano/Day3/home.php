<html>
    <head>
        <title>Day3-HTML</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="myCss.css">
    </head>
    
    <body>
        <header class="header"><h1>Day3-HTML</h1></header>      
        
        <div class="left-sidebar"></div>
        <div class="web-content">
            <?php include ('dropdown.php')?> 
            
                <form class="frmUserinfo" method="post" action="valUserinfo.php " name="frmUserinfo">
                    <h2>Please input your details</h2>
                        <label>First Name</label><input type="text" name="txtFirstName" required><br>
                        <label>Last Name</label><input type="text" name="txtLastName" required><br>
                        <label>Email</label><input type="text" name="txtEmail"><br>
                        <label>Age</label><input type="number" name="txtAge" required><br>
                        <label></label><button type="submit" id="btnInfo">Submit</button>
                </form>
            
            <div class="p-holder">
                <p style="margin-top: 150px;"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
        
        </div>
                    
    </body>  
</html>
