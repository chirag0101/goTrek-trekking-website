<?php 
session_start();
if(!isset($_SESSION['useremail'])) // If session is not set then redirect to Login Page
       {
        echo "<script type='text/javascript'>alert('Login First');location='login.php';</script>";  
       }

error_reporting(0);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/paystyle.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

<?php
include 'connection.php';


if(isset($_POST['submit'])) {
    $fname= mysqli_real_escape_string($con,($_POST['firstname']));
    $lname= mysqli_real_escape_string($con,$_POST['lastname']);
    $email= $_SESSION['useremail'];
    $trek=mysqli_real_escape_string($con,$_POST['select']);
    $card= mysqli_real_escape_string($con,$_POST['pay']);
    $cardnumber=mysqli_real_escape_string($con,$_POST['cardnumber']);
    $month= mysqli_real_escape_string($con,ucfirst($_POST['month']));
    $year= mysqli_real_escape_string($con,ucfirst($_POST['year']));
    $cvv= mysqli_real_escape_string($con,($_POST['cvv']));

    $insertquery= " insert into trekbooking(firstname,lastname,email,trekname,cardtype,cardnumber,expirymonth,expiryyear,cvv) values('$fname','$lname','$email','$trek','$card','$cardnumber','$month','$year','$cvv')";
	$iquery=mysqli_query($con,$insertquery);

		if ($iquery){
			echo "<script type='text/javascript'>alert('Booking Successfull');location='index.php';</script>"; 
		}


}



?>

    <div class="wrapper">
        <h2>Payment Form</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
        <h4>Account</h4>
        <div class="input-group">
            <div class="input-box">
                <input type="text" placeholder="First Name" required class="name" name="firstname">
                <i class="fa fa-user icon"></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Last Name" required class="name" name="lastname">
                <i class="fa fa-user icon"></i>
            </div>
        </div>
        <div class="input-group">
            <div class="input-box">
                <!-- <input type="tel" placeholder="Card Number" required class="name">
                <i class="fa fa-credit-card icon"></i> -->
                <select name="select" class="name sbox2" >
                    <option value="----Select----" id="item">---------------Select Trek---------------</option>
                    <option value="gorakhgad trek" class="item">Gorakhgad Trek</option>
                    <option value="harihar fort trek" class="item">Harihar Fort Trek</option>
                    <option value="kalsubai trek" class="item">Kalsubai Trek</option>
                    <option value="lohagad fort trek" class="item">Lohagad Fort Trek</option>
                    <option value="torna fort trek" class="item">Torna Fort Trek</option>
                    <option value="raigad fort trek" class="item">Raigad Fort Trek</option>
                    <option value="takmak fort trek" class="item">Takmak Fort Trek</option>
                    <option value="garbett point trek" class="item">Garbett Point Trek</option>
                    <option value="vikatgad/peb fort trek" class="item">Vikatgad/Peb Fort Trek</option>
                    <option value="goechala trek" class="item">Goechala Trek</option>
                </select>
            </div>
        </div>
    <div class="input-group">
        <div class="input-box">
            <h4>Payment Details</h4>
            <input type="radio" name="pay" id="bc1" checked class="radio" value="DebitCard">
            <label for="bc1"><span><i class="fa fa-cc-visa"></i> Debit Card</span></label>
            <input type="radio" name="pay" id="bc2" class="radio" value="CreditCard">
            <label for="bc2"><span><i class="fa fa-cc-visa"></i> Credit Card</span></label>
        </div>
    </div>
    <div class="input-group">
        <div class="input-box">
            <input type="text" placeholder="Card Number" required class="name" name="cardnumber" maxlength="16">
            <i class="fa fa-credit-card icon"></i>
        </div>
    </div>
    <div class="input-group">
        <div class="input-box">
            <select class="sbox" name="month">
                <option>Jan</option>
                <option>Feb</option>
                <option>March</option>
                <option>April</option>
                <option>May</option>
                <option>June</option>
                <option>July</option>
                <option>Aug</option>
                <option>Sept</option>
                <option>Oct</option>
                <option>Nov</option>
                <option>Dec</option>
            </select>
            <select class="sbox" name="year">
                <option>2022</option>
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
                <option>2026</option>
                <option>2027</option>
                <option>2028</option>
                <option>2029</option>
                <option>2030</option>
            </select>
        </div>
        <div class="input-box">
            <input type="tel" placeholder="CVV" name="cvv" required class="name" maxlength="3">
            <i class="fa fa-user icon"></i>
        </div>
    </div>
    <div class="input-group">
        <div class="input-box">
            <button type="submit" name="submit" onclick="return confirm('Are you sure you want to Book?');">PAY NOW</button>
        </div>
    </div>
</form>
</div>
</body>
</html>