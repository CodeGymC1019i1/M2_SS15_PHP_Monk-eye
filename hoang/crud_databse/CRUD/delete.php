<?php
include_once "../class/DBConnect.php";
include_once "../class/Stories.php";
include_once "../class/Library_of_story.php";

$id = $_GET['id'];
$deletelibrary = new Library_of_story();
$deletelibrary->deleteLibrary($id);


header("Location:../index.php");