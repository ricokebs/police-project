<?php
require 'security.php';
if(isset($_POST['crime'])){
    require 'db.php';
    extract($_POST);
    $today =date('Y-m-d H:i:s');
    $left ="0000-00-00";
    $sql= "INSERT INTO `subjects`(`id`, `names`, `identification`, `gender`, `date`, `crime`, `type`, `date_left`) VALUES
                                (null, '$names', '$identity' , '$gender', '$today', '$crime', '$type', '$left')";
mysqli_query($conn, $sql) or die(mysqli_error($conn));
$message = "Suspect Added";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>


    <link rel="stylesheet" href="bootstrap-4.2/css/bootstrap.css">

    <script src="bootstrap-4.2/js/jquery.min.js"></script>
    <script src="bootstrap-4.2/js/popper.min.js"></script>
    <script src="bootstrap-4.2/js/bootstrap.min.js"></script>

</head>
<body>

<?php require 'navbar.php'; ?>\

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card" style="margin-top: 60px;">
                <div class="car_header">
                    Add Suspect
                </div>
                <div class="card-body">
                    <h4 class="text-success">
                        <?php
                        if(isset($message))
                            echo $message
                        ?>
                    </h4>
                    <form action="home.php" method="post">
                        <div class="form-group">
                            <label for="email">Names:</label>
                            <input type="Text" name="email" required class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">ID/Passport Number:</label>
                            <input type="Text" name="Identity" required class="form-control" id="pwd">
                        </div>
                        <div class="form-check">

                        </div>

                        <div class="form-check">
                            <label><input type="radio" value="Male" name="gender">Male</label>
                        </div>
                        <div class="form-check">
                            <label><input type="radio" value="Female" name="gender">Female</label>
                        </div>
                        <div class="from-control">
                            <label>Type Of Crime</label>
                            <select name="Type" class="form-control">
                                <option value="Traffic">Traffic</option value>
                                <option value="Robbery">Robbery</option value>
                                <option value="Theft">Theft</option value>
                                <option value="Domestic">Domestic</option value>
                                <option value="Murder">Murder</option value>
                                <option value="Other">Other</option value>
                            </select>
                        </div>

                        <div class="form-group">
                            <label >Describe The Crime</label>
                        <textarea name="crime"  rows="5" class="form-control"></textarea>
                        </div>
                        <button class="btn btn-primary btn-block">Add Susupect</button>
                    <p class="text-danger">
                        <?php
                        if (isset($error))
                            echo $error;
                        ?>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>