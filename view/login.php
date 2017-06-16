<?php
    include_once ("../model/Customer.php");
    include_once ("../controller/Controller_Customer.php");
?>

<html>

<head>

    <title>Login page</title>

    <link href="../css/login.css" type="text/css" rel="stylesheet"/>

</head>

<body>

<?php
$message = "";

    if (isset($_POST['login'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $c = new Customer();
        $c -> setUsername($username);
        $c -> setPassword($password);

        $customer = new Controller_Customer();
        $res = $customer -> login($c);

        if ($res) {
            header("location: ../index.php");
        } else {
            $message = "invalid username or password";
        }

    } elseif(isset($_POST['create'])) {
        header("location: signup.php");
    }


?>

<div class="first">
    <center>  <h1> <p><u>Welcome to Hostel Reservation System</u> </p> </h1>  </center>

    <div class="css">

        <form method="post" action="#">

            <legend> <h2>Login to continue </h2> </legend>

            <div class="form">

                <b> Username </b>  <input type="text" name="user" class="text" placeholder="Username" required="required"/>
                <br> <br>
                <?php echo $message; ?><br>

                <b> Password &nbsp; </b>  <input type ="password" name="pass" class="text" placeholder="Password" required="required"/>


                <center> <p><input type="checkbox" name="radio"><b>Keep logged in</b></p> </center>

                <p><input type="submit" name="login"  class="loginbtn" value="Login"/> </p>  <br>

        </form>
        <form method="POST" action="signup.php">
            <input type="submit" name="create" class="loginbtn" value="Create new account." />
        </form>
    </div>
</body>
</html>