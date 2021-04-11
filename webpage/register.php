<?php  
@$password= '';
@$confPass='';
include('connection.php');
$db = new PDO("mysql:dbname=blog","root","555555" );
$insert_stmt= $db->prepare("INSERT INTO users(username,email,password,fullname,dob) VALUES(?,?,?,?,?)");

if($_SERVER["REQUEST_METHOD"]=="POST");
{


    @$username = $_REQUEST["username"];
    @$fullname = $_REQUEST["fullname"];
    @$email = $_REQUEST["email"];
    @$password = $_REQUEST["pwd"];
    @$dob = $_REQUEST["dob"];
    @$confPass = $_REQUEST["confirm_pwd"];



    if($confPass == $password) {   @$passValid = true; }

    $toProceed = !empty($username) && !empty($fullname) && !empty($email) && !empty($password) && @$passValid && !empty($dob);


}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>My Blog - Registration Form</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<?php include('header.php'); ?>

		<h2>User Details Form</h2>
		<h4>Please, fill below fields correctly</h4>
		<form action="register.php" method="post">
				<ul class="form">
					<li>
						<label for="username">Username</label>
						<input type="text" name="username" id="username" required/>
					</li>
					<li>
						<label for="fullname">Full Name</label>
						<input type="text" name="fullname" id="fullname" required/>
					</li>
					<li>
						<label for="email">Email</label>
						<input type="email" name="email" id="email" />
					</li>
					<li>
						<label for="pwd">Password</label>
						<input type="password" name="pwd" ,id="pwd" required/>
					</li>


                    <li>
                        <label for="dob">Date of birth(YYYY/MM/DD)</label>
                        <input type="text" name="dob" id="dob" required/>
                    </li>
					<li>
						<label for="confirm_pwd">Confirm Password</label>
						<input type="password" name="confirm_pwd" id="confirm_pwd" required />
					</li>

                    <?php
                        if($toProceed ==1)
                        {

                            // send data to data base
                            $insert_stmt->bindParam(1,$username);
                            $insert_stmt->bindParam(2,$email);
                            $insert_stmt->bindParam(3,$password);
                            $insert_stmt->bindParam(4,$fullname);
                            $insert_stmt->bindParam(5,$dob);
                            $insert_stmt->execute();
                        }


                    ?>


					<li>
						<input type="submit" value="Submit" /> <?php  if($toProceed==1) { header('Location:index.php');}  ?> Already registered? <a href="index.php">Login</a>
					</li>
				</ul>
		</form>
	</body>
</html>