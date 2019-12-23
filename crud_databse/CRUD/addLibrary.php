<?php
include_once "../class/DBConnect.php";
include_once "../class/Stories.php";
include_once "../class/Library_of_story.php";

$name = $_POST['name'];
$author = $_POST['author'];
$category = $_POST['category'];
$image = $_FILES['image']['name'];
$filename = $_FILES['image']['tmp_name'];

$starget = "../images/".date("Y_m_d_h_i_s_a").basename($image);
$story = new Stories($name, $author, $category, $starget);
$manager = new Library_of_story();
$manager->addLibrary($story);
move_uploaded_file($filename, $starget);


header("Location:../index.php");