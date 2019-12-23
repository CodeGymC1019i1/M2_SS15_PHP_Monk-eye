<?php
include_once "class/DBConnect.php";
include_once "class/Library_of_story.php";
include_once "class/Stories.php";

$manager = new Library_of_story();
$library = $manager->getAll();
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
<form action="CRUD/addLibrary.php" method="post" enctype="multipart/form-data">
    <center>
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Author:</td>
                <td><input type="text" name="author"></td>
            </tr>
            <tr>
                <td>Category:</td>
                <td><input type="text" name="category"></td>
            </tr>
            <tr>
                <td>Image:</td>
                <td><input type="file" name="image"></td>
                <td><input type="submit" value="upload"></td>
            </tr>
        </table>
        <table border="1" style="width: 80%;">
            <tr>
                <td>STT</td>
                <td>name</td>
                <td>author</td>
                <td>category</td>
                <td>image</td>
            </tr>
            <?php foreach ($library as $key => $value): ?>
                <tr>
                    <td><?php echo ++$key ?></td>
                    <td><?php echo $value->getName()?></td>
                    <td><?php echo $value->getAuthor() ?></td>
                    <td><?php echo $value->getCategory() ?></td>
                    <td><img src="images/<?php echo $value->getImage() ?>" alt="" width="100px"></td>
                    <td>
                        <a href="CRUD/delete.php?id=<?php echo $value->getId() ?>"
                           onclick="return confirm('Bạn có chắc muốn xoá')">delete</a>
                    </td>
                    <td>
                        <a href="CRUD/edit.php?id=<?php echo $value->getId() ?>"
                           onclick="return confirm('Bạn có chắc muốn sửa')">edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </center>
</form>
</body>
</html>