<?php
$HOSTNAME='localhost';
$USERNAME='csdb12';
$PASSWORD='csdb12';
$DATABASE='csdb12';

$con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);
if(!$con){
    die(mysqli_error($con));
}
?>
