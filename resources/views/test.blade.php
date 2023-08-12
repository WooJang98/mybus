<!DOCTYPE html>
<html>
<head>
    <title>MS SQL Data</title>
</head>
<body>
    <h1>php와 mssql 연동</h1>
<h2>car_id 확인 중입니다...</h2>

<ul>
<?php
    foreach ($car_id as $ci) {
        echo "<li>";
        echo $ci;
        echo "</li>";
    }
    
?>

<h2>vrn 확인 중입니다...</h2>

<ul>
<?php
    foreach ($VRN as $v) {
        echo "<li>";
        echo $v;
        echo "</li>";
    }
    
?>

<h2>car_status 확인 중입니다...</h2>

<ul>
<?php
    foreach ($car_status as $c) {
        echo "<li>";
        echo $c;
        echo "</li>";
    }
    
?>

<h2>driver_code 확인 중입니다...</h2>
<ul>
<?php
    foreach ($driver_code as $dc) {
        echo "<li>";
        echo $dc;
        echo "</li>";
    }
    
?>

<h2>driver_name 확인 중입니다...</h2>
<ul>
<?php
    foreach ($driver_name as $d) {
        echo "<li>";
        echo $d;
        echo "</li>";
    }
    
?>