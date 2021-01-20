<?php

require_once "config.php";

$time1 = " 00:00:00";
$time2 = " 23:59:59";

$from = $_POST["fromairport"];
$to = $_POST["toairport"];
$date = $_POST["date"];
$class = $_POST["class"];

$date = date("Y-m-d", strtotime($date));

$time1 = $date . $time1;
$time2 = $date . $time2;

$query_from = mysqli_query($link, "SELECT * FROM airport WHERE Name= ('$from')");
foreach($query_from as $row){

    $departure_name = $row["Name"];
    $departure_city = $row["City"];
    $departure = $row["Airport_Code"];
    $departure_country = $row["Country"];
}

$query_to = mysqli_query($link, "SELECT * FROM airport WHERE Name= ('$to')");
foreach($query_to as $row){

    $destination_name = $row["Name"];
    $destination_city = $row["City"];
    $destination = $row["Airport_Code"];
    $destination_country = $row["Country"];
}

$query_flights = mysqli_query($link, "SELECT * FROM flight WHERE Departure=('$departure') and Destination=('$destination') and Departure_Time >= '($time1)' ");

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Style -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/fresh-bootstrap-table.css" rel="stylesheet" />

    <!-- Fonts and icons -->
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">

</head>

<body>

<div class="fresh-table full-color-orange">
    <!--
      Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
      Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
    -->



    <table id="fresh-table" class="table">
        <thead>
        <th data-field="id">Flight</th>
        <th data-field="name">Company</th>
        <th data-field="salary">Departure</th>
        <th data-field="country">Destination</th>
        <th data-field="city">Departure Time</th>
        <th data-field="city">Capacity</th>
        <th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents"></th>
        </thead>
        <tbody>

        <?php
        $count = 1;
        foreach($query_flights as $row){
            echo '<tr>';
            echo '<td>' . $count . '</td>';
            echo '<td>' . $row["Company"] . '</td>';
            echo '<td>' . $departure_name . '</td>';
            echo '<td>' . $destination_name . '</td>';
            echo '<td>' . $row["Departure_Time"] . '</td>';
            echo '<td>' . $row["Capacity"] . '</td>';
            echo '<td><button class="btn btn-warning">SATIN AL</button></td>';
            echo '</tr>';
            $count = $count + 1;
        }
        ?>



        </tbody>
    </table>
</div>

</body>

</html>