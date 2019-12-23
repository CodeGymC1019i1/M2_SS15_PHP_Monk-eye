<?php
include_once "../class/DBConnect.php";
include_once "../class/Stories.php";
include_once "../class/Library_of_story.php";

//$update = new Library_of_story();
//$id = $_POST['id'];
//$name = $_POST['name'];
//$author = $_POST['author'];
//$category = $_POST['category'];
//$starget = $_FILES['image']['name'];
//$story = new Stories($name, $author, $category, $starget);
//$update->updateLibrary($id, $story);
//move_uploaded_file($_FILES['image']['tmp_name'], $starget);
//
//header("location:../index.php");

$manager = new Library_of_story();
$id = $_POST['id'];
$story = $manager->editLibrary($id);
$image = $story['image'];
if ($_FILES['image']['error'] == 4) {
    $category = $_POST['category'];
    $author = $_POST['author'];
    $name = $_POST['name'];
    $story = new Stories($name, $author, $category, $image);
    $manager->updateLibrary($id, $story);
}
if ($_FILES['image']['error'] == 0) {
    unlink("../images/".$image);
    $image = $_FILES['image']['name'];
    $target = "../images/" . date("Y_m_d_h_i_s_a") . basename($image);
    $category = $_POST['category'];
    $author = $_POST['author'];
    $name = $_POST['name'];
    $story = new Stories($name, $author, $category, $target);
    $manager->updateLibrary($id, $story);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
}
header("Location:../index.php");
