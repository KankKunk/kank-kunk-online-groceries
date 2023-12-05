<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ariiq_50421204 Groceries</title>
    <link rel="stylesheet" href="style.css">
   
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style>
        input {
            margin: 10px;
        }
    </style>

</head>
<body style="background-color: #9ecef6;">
    <center>
        <h1>Pochinki Groceries</h1>
        <div class="main">
            <form action="insert.php" method="POST" enctype="multipart/form-data">
                <label for="">Nama:</label>
                <input type="text" name="name"><br>
                <label for="">Harga:</label>
                <input type="text" name="price" id=""><br>
                <label for="">Gambar:</label>
                <input type="file" name="image" id=""><br>
                <button type="submit" name="upload">Upload</button>
            </form>
        </div>
    </center>

    <!-- Fetch data -->
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';
                $pic = mysqli_query($con,"SELECT * FROM `tblcard`");
                while($row = mysqli_fetch_array($pic)){
                    echo "
                    <tr>
                        <td>$row[Id]</td>
                        <td>$row[Name]</td>
                        <td>$row[Price]</td>
                        <td><img src='$row[Image]' width='200px' height='70px'></td>
                        <td><a href='delete.php? Id= $row[Id]' class='btn btn-danger'>Delete</a></td>
                        <td><a href='update.php? Id= $row[Id]' class='btn btn-danger'>Update</a></td>
                        <td></td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
