<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users & Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    // Akses public API Gorest.co.in menggunakan CURL
    require("helper.php");

    // Panggil getAPI
    $users = getAPI("https://gorest.co.in/public/v2/users");
    echo "<div class = 'container'><table class='table table-striped table-hover border-collapse' table border='1'>
    <thead>
    <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Status</th>
    </tr>
    </thead>
    <tbody>";
    foreach (json_decode($users, 1) as $row) {
        echo "<tr>
        <td>" . $row["id"] . "</td>
        <td>" . $row["name"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["gender"] . "</td>
        <td>" . $row["status"] . "</td>
        </tr>" . "<br>";
    }
    ?>

    <?php


    echo "
    <hr>";
    //  Panggil getAPI untuk posts
    $posts = getAPI("https://gorest.co.in/public/v2/posts");
    echo "<div class='row p-3'>";
    foreach (json_decode($posts, 1) as $row) {
        echo "<div class='col-lg-4 col-sm-6 col-xs-12 mb-3'>
        <h5>" . $row['title'] . "</h5>
        " . $row['body'] . "
        </div>";
    }
    echo "</div>";
    ?>
</body>

</html>