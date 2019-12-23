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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
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
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col" style="color: red">Name</th>
                <th scope="col" style="color:#000;">Author</th>
                <th scope="col" style="color: #00FF00;">Category</th>
                <th scope="col" style="color: #9999FF">Image</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($library as $key => $value): ?>
                <tr>
                    <th scope="row"><?php echo ++$key ?></th>
                    <td><?php echo $value->getName() ?></td>
                    <td><?php echo $value->getAuthor() ?></td>
                    <td><?php echo $value->getCategory() ?></td>
                    <td><img src="images/<?php echo $value->getImage() ?>" alt="" width="100px"></td>
                    <td>
                        <a href="CRUD/delete.php?id=<?php echo $value->getId() ?>"
                           onclick="return confirm('Bạn có chắc muốn xoá')" class="btn btn-outline-danger">delete</a>
                    </td>
                    <td>
                        <a href="CRUD/edit.php?id=<?php echo $value->getId() ?>"
                           onclick="return confirm('Bạn có chắc muốn sửa')"  class="btn btn-outline-success">edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </center>
</form>
</body>
</html>