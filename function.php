<?php
ob_start();
session_start();

require_once('conn.php');

global $conn;


//registeration block    
if(isset($_POST['phone'])){
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];

    $check_mail_query =  mysqli_query($conn, "SELECT * FROM register WHERE email = '$email' ");
    
    if(!$check_mail_query){
        die('Error occured... '. mysqli_error($conn));
    }

    $count_rows = mysqli_num_rows($check_mail_query);
    if($count_rows > 0){
        echo "<span class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a> Email exists! Try again ):</span>";
        ?>
        <script>
         $('.register_interface').fadeIn('slow'); 
         $('.login_interface').css('display','none');
        </script>
        <?php
    }else{
    $hash_password = password_hash($pass, PASSWORD_BCRYPT, array('cost'=>12));

    $insert_fields_query = mysqli_query($conn, "INSERT INTO register(email, phone, pass) VALUES('$email', '$phone', '$hash_password')");
    if(!$insert_fields_query){
        die('Error occured... '. mysqli_error($conn));
    }else{
        echo "<span class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a> Account Registered successfully :)</span>";
        ?>
        <script>
         $('.login_interface').fadeIn('slow');  
         $('.register_interface').css('display','none');
        </script>
        <?php
    }

    }  
}
//




//login blocks
if(isset($_POST['login_email'])){

    $email = $_POST['login_email'];
    $pass = $_POST['pass'];


    $check_email_entry = mysqli_query($conn, "SELECT * FROM register WHERE email = '$email' ");
    if(!$check_email_entry){
        die('Error occured....' . mysqli_error($conn));
    }

    $email_count = mysqli_num_rows($check_email_entry);
    if($email_count < 1){
        echo "<span class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a> Email doesn't exist</span>";
    }else{
        while($row = mysqli_fetch_array($check_email_entry)){
            $id = $row['id'];
            $db_pass= $row['pass'];
        }

        if(password_verify($pass, $db_pass)){
            //session shits and redirects to dashboard
            echo "Logged in.....";
        }else{
            echo "<span class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a> Password mismatch....</span>";
        }

    }
}




// forgot
if(isset($_POST['forgot_email'])){
    $email = $_POST['forgot_email'];

    $check_email = mysqli_query($conn, "SELECT * FROM register WHERE email = '$email' ");
    if(!$check_email){
        die('Error occured...' . mysqli_error(($conn)));
    }

    $mail_count = mysqli_num_rows($check_email);
    if($mail_count < 1){
        echo "<span class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a> Email doesn't exist</span>";
    }else{
        //perform mail stuffs, token update, blablabla
        // send mail shits
        $length = 50;
		$token = bin2hex(openssl_random_pseudo_bytes($length));

        $update_token = mysqli_query($conn, "UPDATE register SET token = '{$token}' WHERE email = '$email' ");
        if(!$update_token){
            die('Error occured...'. mysqli_error($conn));
        }

         $to = $check_email;
         $from = 'help@userAuth.online';
         $subject = "Retrieve your password";
         $message = 'Hello, you can now change your password using this link:  http://localhost/UserAuth_Php?Email='. $check_email .'&Token='. $token .' , click to reset now';
         $headers = "From: $from" . "\r\n" . "Reply-To: $from" . "\r\n" ;

         mail($to,$subject,$message,$headers,$from); // am not sure if this is correct

         echo "<span class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a> Password reset link has been sent to your mail.</span>";

        ?>
        <script>
            $('.forgot_interface').fadeIn('slow');  
            $('.login_interface').css('display','none');
            $('.register_interace').css('display', 'none');
        <?php

    }
}



// reset
if(isset($_GET['Email'])){
    
    ?>
    <style>
    .register_interface{display:none}
    .forgot_interface{display:none}
    .login_interface{display:none}
    .reset_interface{display:block}
    </style>
    <?php 

}


if(isset($_POST['reset_pass'])){

    $email = $_POST['email'];
    $pass = $_POST['reset_pass'];
    $hashed_pass = password_hash($pass, PASSWORD_BCRYPT, array('cost'=> 12));

    $reset_query = mysqli_query($conn, "UPDATE register SET pass = '$hashed_pass', token = '' WHERE email = '$email' " );
    if(!$reset_query){
        die('Error occured...'. mysqli_error($conn));
    }

}

