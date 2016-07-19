<html>
    <head>
        <title>Index</title>
        <link rel="stylesheet" type="text/css" href="css/css4.css">
        <script src="dygraph-combined.js"></script>
    </head>
      
    <body> 
        <header><h1>Dygraph<h1></header>
                    
        <div class="left-sidebar">
            <?php include ('navBar.php') ?> 
        </div> 
         
        <div class="web-content">
            <div id="graph-linear"></div><br>
            <div id="graph-sinusoid"></div>
        </div>    
                    
                    
<!--   script goes here-->        
<script type="text/javascript">
//call the JSON file        
     var xmlhttp = new XMLHttpRequest(),
              json; 
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState===4 && xmlhttp.status===200){
                        json = JSON.parse(xmlhttp.responseText);
                        console.log(json);
                    }     
                };    
                xmlhttp.open('GET', 'jsonArray.json', true);
                xmlhttp.send();
                
//Stringify JSON object into JAVASCRIPT var
    var node = JSON.stringify(Node);
    console.log(node);
    
//display dygraph    
    linear = new Dygraph(
        document.getElementById("graph-linear"), // containing div
        // CSV or path to a CSV file. 
        "gamb.csv",
        {        
            labels: ["Date","Node", "X", "y", "Z", "M"],
        }
       ); 
  
//Sinusoid graph           
    function data() {
    var r = "gamb.csv";
    for (var i = 1; i <= 31; i++) {
    r += "2006/10/" + (i > 10 ? i : "0" + i);
    r += "," + 10 * (8 * i);
    r += "," + 10 * (250 - 8 * i);
    r += "," + 10 * (125 + 125 * Math.sin(0.3 * i));
    r += "\n";
  }
  return r;  
}

// To construct a dygraph, pass in a div, the data and options.
// legend: 'always' makes the legend show up, even when the mouse isn't over the chart.
    sinusoid = new Dygraph(
            document.getElementById("graph-sinusoid"), data, {
  title: 'Stacked chart w/ Total',
  stackedGraph: true,
  axes: {
    x: {
      valueFormatter: function(val, opts, series_name, dygraph) {
        for (var i = 0; i < dygraph.numRows(); i++) {
          if (dygraph.getValue(i, 0) != val) continue;
          var total = 0;
          for (var j = 1; j < dygraph.numColumns(); j++) {
            total += dygraph.getValue(i, j);
          }
          return Dygraph.dateString_(val) + ' (total: ' + total.toFixed(2) + ')';
        }
      }

    }
  }
});

       
        
     
    
    </script>         
    </body>
</html>
