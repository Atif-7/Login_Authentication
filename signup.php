<?php
    session_start();
    if (array_key_exists('loggedin',$_SESSION)) {
		header('Location: secured_page.php');
	}

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $dblink = mysqli_connect("localhost","root","","loginauth");

        if ($dblink->connect_error) {
            die("connection failed". $dblink->connect_error);

        }else{

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $error = "";
            if (!$name) {
                $error .= "<p>Name field is requied</p>";
            }
            if (!$email) {
                $error .= "<p>an email address is requied</p>";
            }
            if ($email && filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $error .= "Enter a valid email address";
            }
            if (!$password) {
                $error .= "<p>please enter a password<P/>";
            }
            if ($error != "") {
                $error	= "<div class='alert alert-danger' role='alert'><strong><p>There were some errors</p></strong>".$error."</div>";
                
            }else{
                $query = "SELECT id FROM `users` WHERE email = '".mysqli_real_escape_string($dblink,$_POST['email'])."' LIMIT 1";
                    $result = mysqli_query($dblink,$query);

                if (mysqli_num_rows($result) > 0) {
                    $error = "<div class='alert alert-danger' role='alert'><strong><p>That email address is already taken.</p></strong></div>";
                }else {
                    $hashed = password_hash($password, PASSWORD_DEFAULT);
                    $query = "INSERT INTO `users` (Name, Email, Password) VALUES('$name','$email','$hashed')";
                    $result = mysqli_query($dblink,$query);
                    if($result){

                        $_SESSION['id'] = mysqli_insert_id($dblink);
                        session_start();
                        $_SESSION['name'] = $name;
                        $_SESSION['loggedin']=true;
                        header("location: secured_page.php");
                    }else{
                        $error = "could not sign up at the moment, please try later!";
                    }                                 
                }    
            }
        }

    }
  
    require_once('header.php'); 

?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <!-- signup form -->
        <form action="signup.php" method="post" id="signup">
            <legend class="my-4 text-center">
            Sign up <i class="fa fa-sign-in" aria-hidden="true"></i>
            </legend>
            <div id="errorMsg">
                <?php	
                if (array_key_exists("signup",$_POST)) {
                echo $error;
                }
                ?>	
            </div>
            
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Full Name">
            
            <label for="email">Email address</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Provide email">
        
            <label for="Password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password">
            
            <div class="my-4">
            <button type="submit" name="signup" id="submit" class="btn btn-success me-4">Sign up</button>
            <small>Already have an account?</small>
            <a href="login.php" class="fs-5 mx-2"> Login </a>
            </div>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>