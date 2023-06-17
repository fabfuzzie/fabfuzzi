<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <style>
    .container {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background: #f2f2f2;
  border-radius: 5px;
}

h2 {
  text-align: center;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 10px;
}

input[type="email"],
input[type="submit"] {
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

input[type="submit"] {
  background: #4CAF50;
  color: white;
  cursor: pointer;
}

input[type="submit"]:hover {
  background: #45a049;
}
</style>
<?php include'connect.php' ?>
</head>
<?php
   
if(isset($_POST['submit'])){
    $email = $_POST['nemail'];
  
    $email_search="select * from signup where email = '$email'";
    $query = mysqli_query($conn,$email_search);

    $email_count = mysqli_num_rows($query);
   
   
    if($email_count==1){
        
        // $pass = mysqli_fetch_assoc($query);
        // $db_pass = $pass['Password'];
        $newPassword = substr(md5(uniqid(mt_rand(), true)), 0, 8);
        $hashedPassword = md5($newPassword);
        $sql = "UPDATE signup SET password = '$hashedPassword', cpassword = '$hashedPassword' WHERE email = '$email'";
        if(mysqli_query($conn,$sql))
        {
            ?>
            <script>
                alert("Successful");
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Failed");
            </script>
            <?php
        }
        ?>
        <script>
         var variableData = "<?php echo $newPassword; ?>";
         alert(variableData);
        </script>
        <?php
      
    }
        else{
            ?>
            <script>
                alert("Invalid email")
            </script>
            <?php
        }
    }
    
?>
<body>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
  <div class="container">
    <h2>Forgot Password</h2>
    <form>
      <label for="email">Email:</label>
      <input type="email" name="nemail" id="email" required>

      <input type="submit" name ="submit" value="Reset Password">
    </form>
  </div>
</body>
  </form>
</html>
