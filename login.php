<?php
session_start();
?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login Form | CodingLab </title>
    <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
   <style>
    *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
.container {
  background-image: url("img1.jpg");
  background-size: cover;
  background-position: center;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.container h1, .container p {
  color: white;
  font-size: 24px;
}
html,body{
  display: grid;
  height: 100vh;
  place-items:center;
  background: #be2edd;
}
.main_div{
  width: 365px;
  background: #fff;
  padding: 30px;
  border-radius: 5px;
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.15);
}
.main_div .title{
  text-align: center;
  font-size: 30px;
  font-weight: 600;
}
.main_div .social_icons{
  margin-top: 20px;
  display: flex;
  justify-content: center;
}
.social_icons a{
  display: block;
  height: 45px;
  width: 100%;
  line-height: 45px;
  text-align: center;
  border-radius: 5px;
  font-size: 20px;
  color: #fff;
  text-decoration: none;
  transition: all 0.3s linear;
}
.social_icons a span{
  margin-left: 5px;
  font-size: 18px;
}
.social_icons a:first-child{
  margin-right: 5px;
  background: #4267B2;
}
.social_icons a:first-child:hover{
  background: #375695;
}
.social_icons a:last-child{
  margin-left: 5px;
  background: #1DA1F2;
}
.social_icons a:last-child:hover{
  background: #0d8bd9;
}
form {
  margin-top: 25px;
}
form .input_box{
  height: 50px;
  width: 100%;
  position: relative;
  margin-top: 15px;
}
.input_box input{
  height: 100%;
  width: 100%;
  outline: none;
  border: 1px solid lightgrey;
  border-radius: 5px;
  padding-left: 45px;
  font-size: 17px;
  transition: all 0.3s ease;
}
.input_box input:focus{
  border-color: #be2edd;
}
.input_box .icon{
  position: absolute;
  top: 50%;
  left: 20px;
  transform: translateY(-50%);
  color: grey;
}
form .option_div{
  margin-top: 5px;
  display: flex;
  justify-content: space-between;
}
.option_div .check_box{
  display: flex;
  align-items: center;
}
.option_div span{
  margin-left: 5px;
  font-size: 16px;
  color: #333;
}
.option_div .forget_div a{
  font-size: 16px;
  color: #be2edd;
}
.button input{
  padding-left: 0;
  background: #be2edd;
  color: #fff;
  border: none;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s linear;
}
.button input:hover{
  background: #a720c5;
}
form .sign_up{
  text-align: center;
  margin-top: 25px;
}
.sign_up a{
  color: #be2edd;
}
form a{
  text-decoration: none;
}
form a:hover{
  text-decoration: underline;
}
</style>
<?php include'connect.php' ?>
   </head>
   <?php
if(isset($_POST['submit'])){
    $email = $_POST['nemail'];
    $password = $_POST['npassword'];

    $email_search="select * from signup where email = '$email'";
    $query = mysqli_query($conn,$email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count){
        $pass = mysqli_fetch_assoc($query);

        // $db_pass = $pass['Password'];

        // $pass_decode = password_verify($password,$db_pass);
        if (md5($password) === $pass["password"]) {
        // if($pass_decode){
            ?>
            <script>
                alert("Successful")
            </script>
            <?php
             header("Location: index.php");
        }
        else{
            ?>
    <script>
        alert("invalid password")
    </script>
    <?php
        }
      }
        else{
            ?>
            <script>
                alert("Invalid Email")
            </script>
            <?php
        }
    }

?>
<body>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
  <div class="main_div">
    <div class="title">Login Form</div>
    <div class="social_icons">
      <a href="#"><i class="fab fa-facebook-f"></i> <span>Facebook</span></a>
      <a href="#"><i class="fab fa-twitter"></i><span>Twitter</span></a>
    </div>
    <form action="#">
      <div class="input_box">
        <input type="text" name="nemail" placeholder="Email" required>
        <div class="icon"><i class="fas fa-user"></i></div>
      </div>
      <div class="input_box">
        <input type="password" name="npassword" placeholder="Password" required>
        <div class="icon"><i class="fas fa-lock"></i></div>
      </div>
      <div class="option_div">
        <div class="forget_div">
          <a href="forgott.php">Forgot password?</a>
        </div>
        <div class="forget_div">
          <a href="change.php">Change password?</a>
        </div>
      </div>
      <div class="input_box button">
        <input type="submit" name="submit" value="Login">
      </div>
      <div class="sign_up">
        Not a member? <a href="signup.php">Signup now</a>
      </div>
    </form>
  </div>
  </form>
</body>
</html>
