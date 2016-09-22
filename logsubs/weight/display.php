<!doctype html>


<head>
    <meta charset="utf-8">
    <title>i log my</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/jquery-2.0.0.min.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
    <script src="js/chart.js"></script>
</head>

<body>

    <? include_once("../inc/login.php"); ?>
    <? include_once("../inc/navbar.php"); ?>
    <? include_once("getweight.php"); ?>


<div id="chartContainer" style="height: 500px; width: 100%;">
</div>



    <canvas id="chart" height="450" width="600"></canvas>
    <script src="js/chart.js"></script>




    <script src="js/weight-input.js"></script>
    <script src="js/insertLogName.js"></script>

    <script>
        $.ajax({
        url: "getWeight.php",
                context: document.body,
                dataType: "json"
        }).done(function (data) {
            console.log("data=" + JSON.stringify(data[0]));
            var rawJSON = data[0];
            var dataPoints=[];
            $.each(data, function(index) {
                var jsonData={};
                console.log("line="+ JSON.stringify(data[index]));
                var date = new Date(data[index]['x']);
                console.log("date="+date);
                jsonData['x'] = date;
                jsonData['y'] = data[index]['y'];
                console.log("jsonData=" +JSON.stringify(jsonData));
                dataPoints.push(jsonData);
                
            });
            console.log("dataPoints="+JSON.stringify(dataPoints));
           // console.log("labels=" + JSON.stringify(labels));
            var chart = new CanvasJS.Chart("chartContainer",
                    {
                        
                        axisX: {
                           
                            gridThickness: 2
                        },
                        axisY: {
                            title: "Weight in pounds"
                        },
                        data: [
                            {
                                type: "line",
                                dataPoints: dataPoints
                            }
                        ]
                    });
            chart.render();
        });
      
    </script>
    <script type="text/javascript" src="../canvas/canvasjs.min.js"></script>
</head>



    <?php
    if ($error) {
        echo '<div class="alert alert-danger alert-dismissible">'
        . $error
        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>';
    }
    ?>


</body>
</html>