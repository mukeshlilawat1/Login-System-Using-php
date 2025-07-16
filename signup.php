<?php
$ShowAlert = false;
$ShowError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'partials/dbConnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists = false;

    if (($password == $cpassword) && $exists == false) {
        $sql = "INSERT INTO `user` (`username`, `password`, `date`) VALUES ('$username', '$password', current_timestamp()) ";
        $results = mysqli_query($conn, $sql);

        if ($results) {
            $ShowAlert = true;
        }
    } else {
        $ShowError = "password do not match";
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>SignUp</title>
</head>

<body>
    <?php
    require 'partials/_nav.php';
    ?>

    <?Php
    if ($ShowAlert) {
        echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    }

    if ($ShowError) {
        echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error </strong> ' . $ShowError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    }
    ?>

    <div class="container " style="display:flex; flex-direction:column; align-items:center">
        <h1 class="text-center">SignUp To Our Website</h1>

        <form action="/LoginSystem/signup.php" method="POST">
            <div class="form-group">
                <label for="username">Please Enter Username</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="username">
            </div>
            <div class="form-grou">
                <label for="password">Please Enter Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>

            <div class="form-grou">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" name="cpassword" id="cpassword">
                <small id="pass" class="form-text text-muted">Make Sure To type the same password</small>
            </div>
            <button type="submit" class="btn btn-primary col-md-12">SignUp</button>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>