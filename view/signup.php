<?php
    include_once ("../model/Customer.php");
    include_once ("../controller/Controller_Customer.php");



if (isset($_POST['create1'])) {
    $fname = $_POST['fn'];
    $lname = $_POST['ln'];
    $uname = $_POST['un'];
    $phone = $_POST['no'];
    $address = $_POST['add'];
    $gender = $_POST['gen'];
    $pass = $_POST['pw'];
    $repass = $_POST['rpw'];

    $c = new Customer();
    $c -> setCustomerId(NULL);
    $c -> setFirstName($fname);
    $c -> setLastName($lname);
    $c -> setUsername($uname);
    $c -> setPhoneNo($phone);
    $c -> setAddress($address);
    $c -> setGender($gender);
    $c -> setPassword($pass);

    $customer = new Controller_Customer();
    $res = $customer->register($c);

    if ($res > 0) {
        header("location: ../index.php");
    } else {
        echo "Something went wrong";
    }
}
?>


<html>
<head>
    <title>Hostel Reservation System</title>
</head>
<link href="../css/signup.css" type="text/css" rel="stylesheet"/>
<body>



<div class="account">

    <h1>  <b> Create new Account</b> </h1>
    <br> <br>


    <form action="#" method="post">

    <table>
        <tr>
            <td><b>  First Name: </b></td>
            <td><input type="text" name="fn" placeholder="First Name" class="text" required="required"/></td>
        </tr>
        <tr>
            <td> <b>Last Name : </b></td>
            <td><input type="text" name="ln" placeholder="Last Name"class="text" required="required"  /></td>
        </tr>
        <tr>
            <td> <b> Username: </b> </td>
            <td><input type="text"  name="un" placeholder="Username" class="text" required="required" /></td>
        </tr>
        <tr>
            <td><b>Phone No : </b></td>
            <td><input type="text" name="no" placeholder="Phone No" class="text" required="required" /></td>
        </tr>
        <tr>
            <td><b> Address: </b> </td>
            <td><input type="text"  name="add" placeholder="Address" class="text" required="required" /></td>
        </tr>
        <tr>
            <td><b> Gender: </b></td>
            <td><input type="text"  name="gen" placeholder="Gender" class="text" required="required" /></td>
        </tr>
        <tr>
            <td><b>Password: </b> </td>
            <td><input type="password"  name="pw" placeholder="Password" class="text" required="required"/></td>
        </tr>
        <tr>
            <td><b>Re-Type Password: </b></td>
            <td><input type="password"  name="rpw" placeholder="Re-Type Password" class="text" required="required"/></td>
        </tr>
        <tr>
            <td><input type="submit"  name="create1" class="btn" value="Create Account"/></td>
            <td><input type="submit" name="close" class="btn" value="Close" /></td>
        </tr>
    </table>
    </form>

</div>
</body>
</html>

