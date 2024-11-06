
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

    <title> Admin Signup || The Cappa Luxury Hotel </title>
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
                  
                    <img src="assets/img/admin.png" style="height: 660px; border-radius: 23px;" alt="LOGO">
                </div>
                <div class="login-part" style="height: 610px;">
                    <div>
                        <a href="../index.php"><img src="assets/logo.png" style="margin-left: 37%; margin-top: -5px;" alt="LOGO" ></a>
                    </div>
                    <div class="heading2">
                        <p style="font-weight: 700;font-size: 18px;line-height: 20px;color:black; margin-top: 1px;margin-bottom: 27px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-left: 29%;">
                           Admin Signup</p>
                    </div>

                  
                    <form id="login_form" method="post" enctype="multipart/form-data">
                    <?php
          include('db_conn.php');
           $rand=rand(1000,9999).date('His');
           error_reporting(E_ALL);
             if(isset($_REQUEST["submit"])){
              $uin=trim(addslashes($_REQUEST['uin']));
              $name=trim(addslashes($_REQUEST['name']));
              $number=trim(addslashes($_REQUEST['number']));
              $emailreg=trim(addslashes($_REQUEST['email']));
              $passwordreg=trim(addslashes($_REQUEST['password']));
             
      
              $passport=$rand.$_FILES["passport"]['name'];
              $targetpassport="../apassport/";
              $targetpassport=$targetpassport.$rand.$_FILES["passport"]['name'];

              $check=mysqli_query($conn, "SELECT * FROM `admin` WHERE email='$emailreg' OR number='$number'");
              $checkrows=mysqli_num_rows($check);
              if($checkrows>0){
                echo "<script>alert('user already exist in database')</script>";
              } else{ 
                if(move_uploaded_file($_FILES["passport"]['tmp_name'], $targetpassport)>0){

                
                $sql="INSERT INTO `admin` (uin, name, number, email, passport, password, status) VALUES ('$uin','$name','$number','$emailreg','$passport',PASSWORD('$passwordreg'),'Inactive')";
    
               
      
                mysqli_query($conn,$sql) or die (mysqli_error($conn));
                $num=mysqli_insert_id($conn);
                if(mysqli_affected_rows($conn)!=1){
                  $message1="Error Inserting Record Into Database";
                }

                echo "<script>alert('Admin Successfully Added')
                location.href='login.php';
                </script>";
            }}}
            ?>

                        <div hidden>
                            <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color: black;">Fullname</p>
                            <input type="text" name="uin" value="<?php echo $rand ?>" required="">
                        </div>
                        <div>
                            <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color: black;">Fullname</p>
                            <input type="text" name="name" placeholder="Enter your fullname" required="">
                        </div>
                        <div>
                            <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color: black;">Phone Number</p>
                            <input type="number" name="number" placeholder="Enter your phone number" required="">
                        </div>
                        <div>
                            <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color: black;">Email Address</p>
                            <input type="email" name="email" placeholder="Enter your email address" required="">
                        </div>

                        <div>
                            <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color: black;">Passport</p>
                            <input type="file" name="passport" title="Upload Passport" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.png" required  style="text-transform: capitalize;">
                        </div>

                        <div class="pwd">
                            <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color: black;">Password</p>
                            <input type="password" name="password" placeholder="Enter your password" id="id_password" required="">
                            <i class="ri-eye-line" id="togglePassword"></i>
                        </div>

                        <input type="submit" name="submit" id="button" value="Signup" style="width: 40%;">
                    </form>
                    <a href="login.php" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; float: right; margin-top: -45px;">Login</a>
                   
                       
                        
                   

                    
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