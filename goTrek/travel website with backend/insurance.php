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
    <div class="wrapper">
        <h2>Insurance Details</h2>
        <form action="payment.html" method="POST">
        <h4>Account</h4>
        <div class="input-group">
            <div class="input-box">
                <input type="text" placeholder="First Name" required class="name">
                <i class="fa fa-user icon"></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Last Name" required class="name">
                <i class="fa fa-user icon"></i>
            </div>
        </div>
        <div class="input-group">
            <div class="input-box">
                <input type="email" placeholder="Email Adress" required class="name">
                <i class="fa fa-envelope icon"></i>
            </div>
        </div>
        <div class="input-group">
            <div class="input-box">
                <h4>Date of Birth</h4>
                <input type="text" placeholder="DD" class="dob">
                <input type="text" placeholder="MM" class="dob">
                <input type="text" placeholder="YYYY" class="dob">
            </div>
            <div class="input-box">
                <h4>Gender</h4>
                <input type="radio" id="b1" name="gendar" checked class="radio">
                <label for="b1">Male</label>
                <input type="radio" id="b2" name="gendar" class="radio">
                <label for="b2">Female</label>
            </div>
        </div>
    <div class="input-group">
        <div class="input-box">
            <h4>Address</h4>
            <div class="input-box">
                <input type="textarea" placeholder="Address" required class="name">
                <i class="fa fa-home icon"></i>
            </div>
        </div>
    </div>
    <div class="input-group">
        <div class="input-box">
            <div class="input-box">
                <input type="text" placeholder="Pincode" required class="name">
                <i class="fa fa-map-pin icon"></i>
            </div>
        </div>
    </div>
    
    <div class="input-group">
        <div class="input-box">
            <button type="submit">PAY NOW</button>
        </div>
    </div>
</form>
</div>
</body>
</html>