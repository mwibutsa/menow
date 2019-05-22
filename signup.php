<?php
include 'header.php';
if (isset($_POST['register'])) {
 $fullname = getValue('fullname');
 $email = getValue('email');
 $password = password_hash(getValue($password), PASSWORD_DEFAULT);

 $result = $connection->query("INSERT INTO  lecturerer (fullname, email, password) VALUES ('$fullname', '$email', '$password')");
 header('Location: login.php');
}
?>
    <div class="container">
        <div class="row">
        <br>
        <br>
            <div class="col-md-6 offset-3">
            <br>
            <br>
            <h1 class="text-center">Please Log into your Account</h1>
            <hr>
            <form method="post" action="signup.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input  required name="fullname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full Name, eg: Ngirimana Schadrac">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input required  name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input required  name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary" name="register"r>Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php
include 'footer.php';
function getValue($index) {
    global  $connection;
    $value = $_POST[$index];
    $value = htmlspecialchars($value);
    $value = strip_tags(($value));
    $value = stripslashes($value);

    $value = $connection->real_escape_string($value);
    return $value;
}
?>