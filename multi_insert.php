<?php

//  Database connection 
// require_once 'connection.php';

$msg = "";

if (isset($_POST['save'])) {
    // Form
    $nem = $_POST['name'];
    $address = $_POST['address'];

    // Data inserted
    $row = $_GET['row'];

    // Table name people
    $query = "INSERT INTO people(name, address) VALUES";
    for ($i = 0; $i < $row; $i++) {
        $query .= "('" . $name[$i] . "', '" . $address[$i] . "'),";
    }
    $query = rtrim($query, "\x2C");
    $result = mysqli_multi_query($connection, $query);
    
    if ($result != true) $msg = "Failed to Save " . mysqli_error($connection);
    else {
        unset($_GET['row']);
        $msg = "Saved";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>PHP Multiple Insert</title>
</head>

<body>
    <div class="container">
        <h2>PHP Multiple Insert</h2>
        <div class="panel panel-default">
            <div class="panel-body">
                <?php if (!isset($_GET['row'])) { ?>
                    <form class="form-inline" action="index.php" method="get">
                        <div class="form-group">
                            <label for="row">Row</label>
                            <input type="text" name="row" class="form-control">
                        </div>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </form>
                    <?php
                    if (isset($_GET['row']) == empty($_GET['row'])) {
                        $msg = "Must Insert a Number";
                    }
                } elseif (isset($_GET['row'])) { ?>
                    <form action="index.php?row=<?= $_GET['row'] ?>" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Member</h4>
                                <hr>
                            </div>
                            <?php
                            $row = $_GET['row'];
                            for ($i = 1; $i <= $row; $i++) {
                            ?>
                                <div class="col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name[]" placeholder="Name" id="name"><br>
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" name="address[]" placeholder="Address" id="address"><br>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-md-12">
                                <hr><input class="btn btn-primary" type="submit" name="save" value="Save">
                                <a class="btn btn-danger" href="index.php">Back</a>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
        <?php if ($msg != "") : ?>
            <div class="alert alert-info" role="alert" align="center">
                <strong><?= $msg ?></strong>
            </div>
        <?php endif ?>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>