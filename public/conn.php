<?php 
/* ====================== DOCKER ====================== */
$conn = mysqli_connect('db','student','@Student123','students');
/* ====================== LOCALHOST - XAMPP ====================== */
// $conn = mysqli_connect('localhost','student','@Student123','students');

if(!isset($conn)){
    exit ("can't create conn to connect  'students' ");
}