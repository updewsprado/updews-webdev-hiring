
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="css4.css">
    </head>
     
    <body> 
       
        <header><h1>Home<h1></header>
                    
        <div class="left-sidebar">
            <?php include ('navBar.php') ?>
        </div>    
        
                    
        <div class="web-content">
            <div id="qoute-wrapper">
                    <p id="QouteId" name="qouteid">"Success is going from failure to failure without losing enthusiasm.",</p>
            </div> 
            
            <div class="btnCenter">
                     <input type="button" value="Qoute for the Day" id="btnQoute" >
            </div>
        </div>
         
<!-- this is the function. when btn is click it will generate a random number-->                   
        <script src="jquery-3.0.0.min.js" type="text/javascript"></script> 
        <script type="text/javascript">          


        $(document).ready (function() {
            
            //array of qoutes
            var q = ['"Success means doing the best we can with what we have. Success is the doing, not the getting; in the trying, not the triumph. Success is a personal standard, reaching for the highest that is in us, becoming all that we can be."', 
                '"Success is not the key to happiness. Happiness is the key to success. If you love what you are doing, you will be successful"', 
                '"Do not be embarrassed by your failures, learn from them and start again."',
                '"Victory is sweetest when you have known defeat."',
                '"Action is the foundational key to all success."',
                '"The best years of your life are the ones in which you decide your problems are your own. You do not blame them on your mother, the ecology, or the president. You realize that you control your own destiny."',
                '"Success is going from failure to failure without losing enthusiasm."',
                '"Success is not measured by what you accomplish, but by the opposition you have encountered, and the courage with which you have maintained the struggle against overwhelming odds."',
                '"Life is not about finding yourself. Life is about creating yourself."',
                '"Spend eighty percent of your time focusing on the opportunities of tomorrow rather than the problems of yesterday."'
            ];
                
                
            $("#btnQoute").click(function() {     
                var randId = Math.floor(Math.random() * 10);
                document.getElementById("QouteId").innerHTML = q[randId];
           });   
            
            
        });
 
  
        </script>
    </body>
</html>