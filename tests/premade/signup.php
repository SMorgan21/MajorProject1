<?php
session_start();
// If user is logged in, header them away
if(isset($_SESSION["username"])){
	header("location: message.php?msg=NO to that weenis");
    exit();
}
?><?php
// Ajax calls this NAME CHECK code to execute
if(isset($_POST["usernamecheck"])){
	include_once("tests/connect.php");
	$userName = preg_replace('#[^a-z0-9]#i', '', $_POST['usernamecheck']);
	$sql = "SELECT id FROM users WHERE userName='$userName' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
    $uname_check = mysqli_num_rows($query);
    if (strlen($userName) < 3 || strlen($userName) > 16) {
	    echo '<strong style="color:#F00;">3 - 16 characters please</strong>';
	    exit();
    }
	if (is_numeric($userName[0])) {
	    echo '<strong style="color:#F00;">Usernames must begin with a letter</strong>';
	    exit();
    }
    if ($uname_check < 1) {
	    echo '<strong style="color:#009900;">' . $userName . ' is OK</strong>';
	    exit();
    } else {
	    echo '<strong style="color:#F00;">' . $userName . ' is taken</strong>';
	    exit();
    }
}
?><?php
// Ajax calls this REGISTRATION code to execute
if(isset($_POST["u"])){
	// CONNECT TO THE DATABASE
	include_once("test/connect.php");
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES
	$userName = preg_replace('#[^a-z0-9]#i', '', $_POST['u']);
	$email = mysqli_real_escape_string($db_conx, $_POST['e']);
	$passWord = $_POST['p'];
	$g = preg_replace('#[^a-z]#', '', $_POST['g']);
	$c = preg_replace('#[^a-z ]#i', '', $_POST['c']);
	// GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	// DUPLICATE DATA CHECKS FOR USERNAME AND EMAIL
	$sql = "SELECT id FROM users WHERE username='$u' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
	$u_check = mysqli_num_rows($query);
	// -------------------------------------------
	$sql = "SELECT id FROM users WHERE email='$e' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
	$e_check = mysqli_num_rows($query);
	// FORM DATA ERROR HANDLING
	if($u == "" || $e == "" || $p == "" || $g == "" || $c == ""){
		echo "The form submission is missing values.";
        exit();
	} else if ($u_check > 0){
        echo "The username you entered is alreay taken";
        exit();
	} else if ($e_check > 0){
        echo "That email address is already in use in the system";
        exit();
	} else if (strlen($u) < 3 || strlen($u) > 16) {
        echo "Username must be between 3 and 16 characters";
        exit();
    } else if (is_numeric($u[0])) {
        echo 'Username cannot begin with a number';
        exit();
    } else {
	// END FORM DATA ERROR HANDLING
	    // Begin Insertion of data into the database
		// Hash the password and apply your own mysterious unique salt
		$cryptpass = crypt($p);
		include_once ("php_includes/randStrGen.php");
		$p_hash = randStrGen(20)."$cryptpass".randStrGen(20);
		// Add user info into the database table for the main site table
		$sql = "INSERT INTO users (username, email, password, gender, country, ip, signup, lastlogin, notescheck)
		        VALUES('$u','$e','$p_hash','$g','$c','$ip',now(),now(),now())";
		$query = mysqli_query($db_conx, $sql);
		$uid = mysqli_insert_id($db_conx);
		// Establish their row in the useroptions table
		$sql = "INSERT INTO useroptions (id, username, background) VALUES ('$uid','$u','original')";
		$query = mysqli_query($db_conx, $sql);
		// Create directory(folder) to hold each user's files(pics, MP3s, etc.)
		if (!file_exists("user/$u")) {
			mkdir("user/$u", 0755);
		}
		// Email the user their activation link
		$to = "$e";
		$from = "auto_responder@yoursitename.com";
		$subject = 'yoursitename Account Activation';
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>yoursitename Message</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;"><a href="http://www.yoursitename.com"><img src="http://www.yoursitename.com/images/logo.png" width="36" height="30" alt="yoursitename" style="border:none; float:left;"></a>yoursitename Account Activation</div><div style="padding:24px; font-size:17px;">Hello '.$u.',<br /><br />Click the link below to activate your account when ready:<br /><br /><a href="http://www.yoursitename.com/activation.php?id='.$uid.'&u='.$u.'&e='.$e.'&p='.$p_hash.'">Click here to activate your account now</a><br /><br />Login after successful activation using your:<br />* E-mail Address: <b>'.$e.'</b></div></body></html>';
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		mail($to, $subject, $message, $headers);
		echo "signup_success";
		exit();
	}
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sign Up</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="style/style.css">
<style type="text/css">
#signupform{
	margin-top:24px;
}
#signupform > div {
	margin-top: 12px;
}
#signupform > input,select {
	width: 200px;
	padding: 3px;
	background: #F3F9DD;
}
#signupbtn {
	font-size:18px;
	padding: 12px;
}
#terms {
	border:#CCC 1px solid;
	background: #F5F5F5;
	padding: 12px;
}
</style>
<script src="js/main.js"></script>
<script src="js/ajax.js"></script>
<script>
function restrict(elem){
	var tf = _(elem);
	var rx = new RegExp;
	if(elem == "email"){
		rx = /[' "]/gi;
	} else if(elem == "userName"){
		rx = /[^a-z0-9]/gi;
	}
	tf.value = tf.value.replace(rx, "");
}
function emptyElement(x){
	_(x).innerHTML = "";
}
function checkusername(){
	var u = _("userName").value;
	if(u != ""){
		_("unamestatus").innerHTML = 'checking ...';
		var ajax = ajaxObj("POST", "signup.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            _("unamestatus").innerHTML = ajax.responseText;
	        }
        }
        ajax.send("usernamecheck="+u);
	}
}
function signup(){
	var u = _("userName").value;
	var e = _("email").value;
	var p1 = _("pass1").value;
	var p2 = _("pass2").value;
	var c = _("country").value;
	var g = _("gender").value;
	var status = _("status");
	if(u == "" || e == "" || p1 == "" || p2 == "" || c == "" || g == ""){
		status.innerHTML = "Fill out all of the form data";
	} else if(p1 != p2){
		status.innerHTML = "Your password fields do not match";
	} else if( _("terms").style.display == "none"){
		status.innerHTML = "Please view the terms of use";
	} else {
		_("signupbtn").style.display = "none";
		status.innerHTML = 'please wait ...';
		var ajax = ajaxObj("POST", "signup.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText != "signup_success"){
					status.innerHTML = ajax.responseText;
					_("signupbtn").style.display = "block";
				} else {
					window.scrollTo(0,0);
					_("signupform").innerHTML = "OK "+u+", check your email inbox and junk mail box at <u>"+e+"</u> in a moment to complete the sign up process by activating your account. You will not be able to do anything on the site until you successfully activate your account.";
				}
	        }
        }
        ajax.send("u="+u+"&e="+e+"&p="+p1+"&c="+c+"&g="+g);
	}
}
/* function addEvents(){
	_("elemID").addEventListener("click", func, false);
}
window.onload = addEvents; */
</script>
</head>
<body>
<?php include_once("template_pageTop.php"); ?>
<div id="registration">
  <h3>Sign Up Here</h3>
  <form name="regForm" id="regForm" onsubmit="return false;">
    <input id="username" type="text" placeholder="Please Enter a Username" onblur="checkusername()" onkeyup="restrict('username')" maxlength="16"><br><br>
    <span id="unamestatus"></span>
    <input id="email" type="email" placeholder="Please Enter Your Email Address" onfocus="emptyElement('status')" onkeyup="restrict('email')" maxlength="88"><br><br>
    <input id="pass1" type="password" placeholder="Please Enter a Password" onfocus="emptyElement('status')" maxlength="16"><br><br>
    <input id="pass2" type="password" placeholder="Please Confirm Your Password" onfocus="emptyElement('status')" maxlength="16"><br><br>
    <select id="gender" title="Please Choose your Gender" onfocus="emptyElement('status')">
      <option value=""></option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select>
    <input id="firstName" type="text" placeholder="Please Enter Your First Name" onfocus="emptyElement('status')" autocomplete="given-name"><br><br>
    <input id="secondName" type="text" placeholder="Please Enter Your Second Name" onfocus="emptyElement('status')" autocomplete="family-name"><br><br>
    <input id="telephoneNo" type="number" placeholder="Please Enter Your Telephone Number" onfocus="emptyElement('status')" autocomplete="tel"><br><br>
    <select id="grade" title="Please Select Your Grade" onfocus="emptyElement('status')">
      <option value=""></option>
      <option value="1A"></option>
      <option value="1B"></option>
      <option value="F"></option>
      <option value="F-1A"></option>
      <option value="F-1B"></option>
      <option value="2"></option>
      <option value="F-2A"></option>
      <option value="F-2B"></option>
      <option value="3A"></option>
      <option value="3B"></option>
      <option value="4A"></option>
      <option value="4B"></option>
      <option value="4C"></option>
      <option value="4D"></option>
      <option value="4E"></option>
    </select>
    <br /><br />
    <button id="signupbtn" onclick="signup()">Create Account</button>
    <span id="status"></span>
  </form>
</div>
</body>
</html>
