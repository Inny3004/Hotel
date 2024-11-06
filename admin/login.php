<?php
    session_start();
	require('db_conn.php');
	
    // If form submitted, insert values into the database.
    if (isset($_POST['email'])){

		$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($conn,$email); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($conn,$password);

    
        
	//Checking is user existing in the database or not
        $query = "SELECT * FROM admin WHERE email='$email' AND password=PASSWORD('$password')";
        // $query = "SELECT * FROM aregister WHERE email='$email' AND password='$password' AND designation='Super Admin' AND `status`='Active'";
		$result = mysqli_query($conn,$query) or die (mysqli_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['email'] = $email;
			echo '<script type="text/javascript"> window.open("../app/index.php","_self");</script>'; // Redirect user to index.php
            }{
    echo "<script>alert('Invalid Admin Login Credential')
	location.href='register.php'</script>";
   }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <!-- Meta -->
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<meta name="author" content="Inny">

    <!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://cappa.com">
<meta property="og:title" content="Home || The Cappa Luxury Hotel">
<meta property="og:description" content="Five Star Hotel In Nigeria">
<meta property="og:image" content="https://wetindeycodeacademy.com.ng/cappa/img/favicon.png">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://cappa.com">
<meta property="twitter:title" content="Home || The Cappa Luxury Hotel">
<!-- <meta name="twitter:site" content="@LearnersCrib" /> -->
<meta property="twitter:description" content="Five Star Hotel In Nigeria">
<meta property="twitter:image" content="https://wetindeycodeacademy.com.ng/cappa/img/favicon.png">

    <title>Admin Login || The Cappa Luxury Hotel </title>
    <link rel="shortcut icon" href="assets/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="../npm/remixicon%402.2.0/fonts/remixicon.css" rel="stylesheet">
    <script src="jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- <script src="script.js"></script> -->
    <style>
    .loading {
        display: none;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="loginContainer">
            <div class="mainFlex">
                <div class="loginImg">
                  
                    <img src="assets/img/admin.png" style="height: 530px; border-radius: 13px;" alt="LOGO">
                </div>
                <div class="login-part">
                    <div>
                        <a href="../index.php"><img src="assets/logo.png" style="margin-left: 37%;" alt="LOGO"></a>
                    </div>
                    <div class="heading2">
                        <p style="font-weight: 700;font-size: 16px;line-height: 20px;color:black; margin-top: 48px;margin-bottom: 27px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;margin-left: 20%;">
                            Login To Admin Platform</p>
                    </div>
                    <form id="login_form" method="post">
                        <div>
                            <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color: black;">Email Address</p>
                            <input type="email" name="email" placeholder="Enter your email address" required="">
                        </div>
                        <div class="pwd">
                            <a href="#" style="font-size: 11px; float: right; ">Forgot Passord?</a>
                            <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color: black;">Password</p>
                            <input type="password" name="password" placeholder="Enter your password" id="id_password" required="">
                            <i class="ri-eye-line" id="togglePassword"></i>
                        </div>

                        <input type="submit" name="submit" id="button" value="Sign In">
                        
                    </form>
                    <a href="register.php" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; float: right; ">Sign Up</a>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="popUp success_div">
        <div class="popContainer">
            <div class="toop">
                <img src="assets/success.png" alt="">
                <p class="bod2 success_msg">Sign in successful</p>
            </div>
            <p class="bod3">You'll be redirected to your dashboard in a moment</p>
        </div>
    </div>

    <div class="popUp2 error_div">
        <div class="popContainer">
            <p style="font-size: 25px;" class="bod">Oops!</p>
            <p style="color: #666666" class="headd error_msg"></p>
            <button type="button" onclick="$('.error_div').hide()">Close</button>
        </div>
    </div>



    <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#id_password');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('ri-eye-off-line');
    });
    </script>
</body>

</html>