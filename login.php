<?php
include 'header.php';
$logginError = '';
if (isset($_POST['login'])) {
    $email = getValue('email');
    $password =getValue('password');

    $result = $connection->query("SELECT * FROM lecturerer WHERE email = '$email' LIMIT 1");
    if ($result->num_rows) {
   $lecturer = $result->fetch_assoc();
            $hashedPassword = $lecturer['password'];
            if (password_verify($password, $hashedPassword) === true) {
                $_SESSION['email'] = $lecturer['email'];
                $_SESSION['fullname'] = $lecturer['fullname'];
                $_SESSION['id'] = $lecturer['id'];
                header('Location: index.php');
            } else {
                $logginError = 'Invalid username or password';
            }
    } else {
        $logginError = 'Invalid username or password';
    }
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
            <form method="post" action="login.php">
                <?php
                if (strlen($logginError) > 1) {
                    echo "<strong style='color: red'>".$logginError."</strong>";
                }
                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary" name="login">Submit</button>
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