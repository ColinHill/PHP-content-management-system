<?php
$db = mysqli_connect("localhost", "root", "inet2005", "CMSTestDB2");
$query = "SELECT COUNT(Articles_ID) FROM Articles WHERE AllPages = 0";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)){
$nopages = $row['COUNT(Articles_ID)'];
}
$query = "SELECT COUNT(Articles_ID) FROM Articles WHERE AllPages = 1";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)){
$allpages = $row['COUNT(Articles_ID)'];
}
$query = "SELECT COUNT(Articles_ID) FROM Articles WHERE AllPages = 0 AND Page = NULL";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)){
$deactive = $row['COUNT(Articles_ID)'];
}

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Highcharts Example</title>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <style type="text/css">
        ${demo.css}
    </style>
    <script type="text/javascript">
        $(function () {
            $('#container').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Articles used on all pages, no pages, or specific pages'
                },
                subtitle: {
                    text: 'CMS'
                },
                xAxis: {
                    categories: ['Articles', 'Specific', 'Deactivated'],
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    allowDecimals: false,
                    title: {
                        text: 'Articles',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ' Articles'
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -40,
                    y: 100,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'All Pages',
                    data: [<?php echo $allpages ?>]
                }, {
                    name: 'Specific/Deactived',
                    data: [<?php echo $nopages ?>]
                }, {
                    name: 'Deactive',
                    data: [<?php echo $deactive ?>]
                }
                ]
            });
        });
    </script>
</head>
<body>
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>

</body>
</html>