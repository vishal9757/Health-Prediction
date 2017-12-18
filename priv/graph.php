<?php
session_start();
$age = $_SESSION['agese'];
$tobacco = $_SESSION['tobaccose'];
$alcohol = $_SESSION['alcoholse'];
$famhist = $_SESSION['famhistse'];
$obesity = $_SESSION['obesityse'];
$sbp = $_SESSION['sbpse'];
$typea = $_SESSION['typease'];
$idl = $_SESSION['idlse'];
$adiposity = $_SESSION['adiposityse'];
   /**
    * step 1: Include the `fusioncharts.php` file that contains functions to embed the charts.
    */
   include("fusioncharts.php");

   $arr = array("$sbp, $tobacco, $idl, $adiposity, $typea, $obesity, $alcohol");
   $jsondata = json_encode($arr);
?>
<html>

   <head>
    <title>FusionCharts XT - Simple Column 2D Chart</title>
    <!--
        Step 2:  Include the `fusioncharts.js` file. This file is needed to render the chart.
         Ensure that the path to this JS file is correct. Otherwise, it may lead to JavaScript errors.
    -->
    <script src="fusioncharts.js"></script>
   </head>
   <body>
    <?php
        /**
         *  Step 3: Create a `columnChart` chart object using the FusionCharts PHP class constructor. 
         *  Syntax for the constructor: `FusionCharts("type of * chart", "unique chart id", "width of chart", 
         *  "height of chart", "div id to render the chart", "data format", "data source")`
         */
      $mscombi2dChart = new FusionCharts("column2d", "ex3", "100%", 400, "chart-1", "json", $jsondata); {
    "chart": {
        "caption": "Patient value & Normal value",
        "xaxisname": "Parameters",
        "yaxisname": "Value",
        "theme": "ocean"
    },
    "categories": [
        {
            "category": [
                {
                    "label": "SBP"
                },
                {
                    "label": "tobacco"
                },
                {
                    "label": "IDL"
                },
                {
                    "label": "Adiposity"
                },
                {
                    "label": "Type-a"
                },
                {
                    "label": "Obesity"
                },
                {
                    "label": "Alcohol"
                }
            ]
        }
    ],
    "dataset": [
        {
            "seriesname": "Actual Revenue",
			"renderas": "line",
			"showvalues": "0",
            "data": [
                {
                    "value": $sbp
                },
                {
                    "value": $tobacco;
                },
                {
                    "value": $idl;
                },
                {
                    "value": $adiposity;
                },
                {
                    "value": $typea;
                },
                {
                    "value": $obesity;
                },
                {
                    "value": $alcohol;
                }
            ]
        },
        {
            "seriesname": "Projected Revenue",
            "renderas": "line",
            "showvalues": "0",
            "data": [
                {
                    "value": "118"
                },
                {
                    "value": "4.5"
                },
                {
                    "value": "6.47"
                },
                {
                    "value": "17.2"
                },
                {
                    "value": "54"
                },
                {
                    "value": "23.63"
                },
                {
                    "value": "25.7"
                }
            ]
        }
        
    ],
};
// Render the chart

        /**
         *  Because we are using JSON/XML to specify chart data, `json` is passed as the value for the data
         *   format parameter of the constructor. The actual chart data, in string format, is passed as the value
         *   for the data source parameter of the constructor. Alternatively, you can store this string in a 
         *   variable and pass the variable to the constructor.
         */

        /**
         * Step 4: Render the chart
         */
        $mscombi2dChart->render();
    ?>
    <div id="chart-1"><!-- Fusion Charts will render here--></div>
   </body>
</html>