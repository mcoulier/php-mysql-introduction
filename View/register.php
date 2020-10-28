<!doctype html>
<html lang="en">
<head>
    <title>Homepage</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<form method="post">
    First Name: <input type="text" name="first_name" value="<?php echo $_SESSION['first_name'];?>"><br>
    <span class="bg-danger text-white"><?php echo $fNameError;?></span><br>
    Last Name: <input type="text" name="last_name" value="<?php echo $_SESSION['last_name'];?>"><br>
    <span class="bg-danger text-white"><?php echo $lNameError;?></span><br>
    E-mail: <input type="text" name="email" value="<?php echo $_SESSION['email'];?>"><br>
    <span class="bg-danger text-white"><?php echo $emailError;?></span><br>

    <div class="form-group">
        <label for="formGroupExampleInput2">Password</label>
        <input type="password" name="register_password" class="form-control" id="formGroupExampleInput2" placeholder="Enter password">
        <span class="bg-danger text-white"><?php echo $regPassError;?></span><br>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Confirm password</label>
        <input type="password" name="confirm_password" class="form-control" id="formGroupExampleInput2" placeholder="Confirm password">
        <span class="bg-danger text-white"><?php echo $confPassError;?></span><br>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<form method="post">
    <a class="btn btn-primary" href="?page=overview" role="button">All students</a>
</form>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>