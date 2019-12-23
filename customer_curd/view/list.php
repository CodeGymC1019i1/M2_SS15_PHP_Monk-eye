<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<body>
<h2>Danh sách khách hàng</h2>
<form class="form-inline my-2 my-lg-0" action="" method="POST">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="">Search</button>
</form>
<a href="index.php?page=add" class="btn btn-outline-success m-3">Thêm</a>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">STT</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($customers as $key => $customer) { ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $customer->customerName ?></td>
            <td><?php echo $customer->customerEmail ?></td>
            <td><?php echo $customer->customerAddress ?></td>
            <td><a href="index.php?page=delete&id=<?php echo $customer->id; ?>"
                   class="btn btn-outline-danger">Delete</a></td>
            <td><a href="index.php?page=edit&id=<?php echo $customer->id; ?>" class="btn btn-outline-secondary">Edit</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>
