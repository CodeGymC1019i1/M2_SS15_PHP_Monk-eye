<?php
include_once "../class/DBConnect.php";
include_once "../class/Stories.php";
include_once "../class/Library_of_story.php";

$manager = new Library_of_story();
$library = $manager->getAll();
$id = $_GET['id'];

$editlibrary = $manager->editLibrary($id);
$name = $editlibrary['name'];
$author = $editlibrary['author'];
$category = $editlibrary['category'];
$image = $editlibrary['image'];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="update.php" method="post" enctype="multipart/form-data">
    <center>
    <table >
        <tr style="display: none">
        </tr>
        <tr>
            <td style="display: none"><input type="text" name="id" value="<?php echo $id?>"></td>
            <td>Name:</td>
            <td><input type="text" name="name" value="<?php echo $name?>"></td>
        </tr>
        <tr>
            <td>Author:</td>
            <td><input type="text" name="author" value="<?php echo $author?>"></td>
        </tr>
        <tr>
            <td>Category:</td>
            <td><input type="text" name="category" value="<?php echo $category?>"></td>
        </tr>
        <tr>
            <td>Image:</td>
            <td><input type="file" name="image" value="<?php echo $image?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="update"></td>
        </tr>
    </table>
    <table border="1" style="width: 70%">
        <tr>
            <td>STT</td>
            <td>name</td>
            <td>author</td>
            <td>category</td>
            <td>image</td>
        </tr>
        <?php foreach ($library as $key => $value):?>
            <tr>
                <td><?php echo ++$key?></td>
                <td><?php echo $value->getName()?></td>
                <td><?php echo $value->getAuthor()?></td>
                <td><?php echo $value->getCategory()?></td>
                <td><img src="../images/<?php echo $value->getImage()?>" alt="" width="100px"></td>
            </tr>
        <?php endforeach;?>
    </table>
    </center>
</form>
</body>
</html>
