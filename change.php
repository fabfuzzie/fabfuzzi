<!DOCTYPE html>
<html>
    <head>
    <title>Change Password</title>
      <style>
      .container {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f4f4f4;
  border-radius: 5px;
}

h2 {
  text-align: center;
}

.form-group {
  margin-bottom: 10px;
}

label {
  display: block;
  font-weight: bold;
}

input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="email"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #4caf50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #45a049;
}
  </style>        
            <?php include'connect.php' ?>
            

    </head>

    <?php
if(isset($_POST['submit'])){
    $email = $_POST['nemail'];
    $oldpassword = $_POST['nopassword'];
    $newpassword = $_POST['nnpassword'];
    $cpassword = $_POST['ncpassword'];

    $sql="select * from signup where email = '$email' AND password = '".md5($oldpassword)."'";
    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result); 

    if($count == 1){
        // $pass = mysqli_fetch_assoc($query);
        if($newpassword == $cpassword){
        $sql = "UPDATE signup SET Password = '".md5($newpassword)."' WHERE email = '$email'";
        // $db_pass = $pass['Password'];

        // $pass_decode = password_verify($noldpassword,$db_pass);
        $result=mysqli_query($conn,$sql);
        
        if ($result){
            ?>
            <script>
                alert("Successful");
            </script>
            <?php
          
        }
        else{
            ?>
    <script>
        alert("Password do not match");
    </script>
    <?php
        }
      }
        else{
            ?>
            <script>
                alert("Error")
            </script>
            <?php
        }
    }
    else{
        ?>
            <script>
                alert("old password do not match");
            </script>
            <?php
    }
}
?>
<body>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
  <div class="container">
    <h2>Change Password</h2>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="form-group">
        <label for="email">Email-ID</label>
        <input type="email" id="email" name="nemail" required>
      </div>
      <div class="form-group">
        <label for="current-password">Current Password</label>
        <input type="password" id="current-password" name="nopassword" required>
      </div>
      <div class="form-group">
        <label for="new-password">New Password</label>
        <input type="password" id="new-password" name="nnpassword" required>
      </div>
      <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="ncpassword" required>
      </div>
      <button type="submit" name= "submit">Change Password</button>
    </form>
  </div>
</body>
</html>


    