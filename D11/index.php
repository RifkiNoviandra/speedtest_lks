<?php
    if (isset($_GET['page'])){
        $data = $_GET['page'];
    }else{
        $data = 1;
    }
    $path = "../D11/";
    $temp_files = scandir($path);

    $file_json = file_get_contents("data.json");
    $data_json = json_decode($file_json);
    $get_length = count($data_json);

//    natsort($temp_files);

    $data_json = array_slice($data_json , $data * 5 , 5)
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/bootstrap.js"></script>
</head>
<body>
<table class="table">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Id</th>
        <th scope="col">Age</th>
        <th scope="col">Name</th>
        <th scope="col">Gender</th>
        <th scope="col">Company</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Address</th>
    </tr>
    </thead>
    <tbody></tbody>
    <?php
    $number = (($data-1) * 5)+1 ;
    foreach($data_json as $key => $data_items){
        ?>
        <tr>
            <td><?= $number++ ?></td>
            <td><?php print_r($data_items->id) ?></td>
            <td><?php print_r($data_items->age) ?></td>
            <td><?php print_r($data_items->name) ?></td>
            <td><?php print_r($data_items->gender) ?></td>
            <td><?php print_r($data_items->company) ?></td>
            <td><?php print_r($data_items->email) ?></td>
            <td><?php print_r($data_items->phone) ?></td>
            <td><?php print_r($data_items->address) ?></td>
        </tr>
    <?php
    }
    ?>
</table>
<!--"id": "5d15736ec05251a7634adb58",-->
<!--"age": 34,-->
<!--"name": "Cannon Leblanc",-->
<!--"gender": "male",-->
<!--"company": "TECHADE",-->
<!--"email": "cannonleblanc@techade.com",-->
<!--"phone": "+1 (946) 529-2083",-->
<!--"address": "688 Miller Place, Waterview, North Carolina, 4575"-->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php
            if ($data <= 1){
                ?>

                <li class="page-item disabled">
                    <a class="page-link" href="index.php?page=<?= $data - 1 ?>" tabindex="-1"> < </a>
                </li>

                <?php
            }else{
                ?>

                <li class="page-item">
                    <a class="page-link" href="index.php?page=<?= $data - 1 ?>" tabindex="-1"> < </a>
                </li>

                <?php
            }
        ?>

        <?php

        for ($i = 1 ; $i <= $get_length/5 ; $i++){
            if ($data == $i){
                ?>
                <li class="page-item"><a class="page-link link_active" href="index.php?page=<?= $i ?>"><?= $i ?></a></li>
                <?php
            }else{
                ?>
                <li class="page-item"><a class="page-link custom" href="index.php?page=<?= $i ?>"><?= $i ?></a></li>
                <?php
            }
        }

        if ($data < floor($get_length/5)){
            ?>
            <li class="page-item">
                <a class="page-link" href="index.php?page=<?= $data+1 ?>"> > </a>
            </li>
            <?php
        }else{
            ?>
            <li class="page-item disabled">
                <a class="page-link" href="index.php?page=<?= $data+1 ?>"> > </a>
            </li>
        <?php
        }
        ?>

    </ul>
</nav>
</body>
</html>
