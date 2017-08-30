<?php
require_once('include/connect.php');
require_once('include/config.php');
if(isset($_POST) && !empty($_POST))
{
    print_r($_POST);
    $username =mysqli_real_escape_string($conn,$_POST['Username']);
    $verification_key = md5($username);

    $email =mysqli_real_escape_string($conn,$_POST['email']);
    $password =md5($_POST['Password']);
    $passwordagain = md5($_POST['passwordagain']);
    $fmsg = "";
    if($password == $passwordagain)
    {
        
            $sql = "INSERT INTO `registration` (username, email, password) VALUES ('$username', '$email', '$password')";
            $usernamesql = "SELECT * FROM `registration` WHERE username='$username'";
            $usernameres = $conn->query($usernamesql);
            $count = $usernameres->num_rows;
            if($count == 1)
            {
                $fmsg.="<br>Username exists in Database, please try different user name.";
            }
            
            $emailsql = "SELECT * FROM `registration` WHERE email='$email'";
            $emailres = $conn->query($emailsql);
            $emailcount = $emailres->num_rows;
            if($emailcount == 1)
            {
                $fmsg .= "<br>Email exists in Database, please reset your password.";
            }
            
            $sql = "INSERT INTO `registration` (username, email, password,verification_key) VALUES ('$username', '$email', '$password', '$verification_key')";
            $result = $conn->query($sql);
            echo "key:<br>".$result;
            if($result)
            {
                $smsg = "User Registered succesfully";
                $id = mysqli_insert_id($conn);
                require 'PHPMailer/PHPMailerAutoload.php';

                $mail = new PHPMailer;

                $mail->isSMTP();
                //$mail->SMTPDebug = 2;
                $mail->Host = $smtphost;
                $mail->SMTPAuth = true;
                $mail->Username = $smtpuser;
                $mail->Password = $smtppass;
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->IsHTML(true);
                $mail->setFrom('patelayman6@gmail.com', 'Ayman');
                $mail->addAddress('ayman.patel97@gmail.com', 'Ayman Arif'); 

                $mail->Subject = 'Verify Your Email';
                $mail->Body    = "http://localhost/version_2/register/verify.php?key=$verification_key&id=$id";//change this dir
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if(!$mail->send()) 
                {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }else 
                {
                    echo 'Message has been sent';
                }

            }
            
        else{
                $fmsg.="<br>Fail to register user";
            }
    }
    else
    $fmsg.="<br>Password doesn't match!";



    
}
?>
<html>
<head>
<title>User registration script in PHPs</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="css/styles.css" >
<script   src="https://code.jquery.com/jquery-3.1.1.js" ></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
$('#usernameLoading').hide();
$('#username').keyup(function(){
 $('#usernameLoading').show();
      $.post("check.php", {
        Username: $('#username').val()
      }, function(response){
        $('#usernameResult').fadeOut();
        setTimeout("finishAjax('usernameResult', '"+escape(response)+"')", 400);
      });
    return false;
});
});

function finishAjax(id, response) {
  $('#usernameLoading').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
} //finishAjax
</script>

</head>

<body>
<div class="container">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Please Register</h2>
        <div class="input-group">
	        <span class="input-group-addon" id="basic-addon1">@</span>
	        <input type="text" name="Username" id="username" class="form-control" placeholder="Username" value="<?php if(isset($username) & !empty($username)){ echo $username; } ?>" required>
	        <span id="usernameLoading" class="input-group-addon"><img src="include/loading.gif" height="30px" alt="Ajax Indicator" /></span>
        </div>
        <span id="usernameResult"></span> 
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" value="<?php if(isset($email) & !empty($username)){ echo $email; } ?>" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="Password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword" class="sr-only">Password again</label>
        <input type="password" name="passwordagain" id="inputPassword" class="form-control" placeholder="Password Again" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <a class="btn btn-lg btn-default btn-block" href="../userlogin/Login.php">User Login</a>
        <a class="btn btn-lg btn-default btn-block" href="../Blog/Login.php">Administrator Login</a><hr style=" height: 32px;
    border-style: solid;
    border-color: black;
    border-width: 1px 0 0 0;
    border-radius: 20px;margin-top:10px;margin-bottom:0px;">
        <a class="btn btn-lg btn-success btn-block" href="../Blog/Blog.php">Blog as Viewer</a>
      </form>
</div>
</body>
</html>