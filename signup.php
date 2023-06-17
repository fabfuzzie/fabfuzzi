<?php
session_start();
?>
<!DOCTYPE html>
<!---Coding By Coding Lab | www.codinglabweb.com--->
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="x-UA-compatible" content="ie=edge" />
        <!--<title>Registration Form in HTML CSS</title>-->
        <title>Signup Form</title>
        <?php include 'connect.php' ?>
        <!---Custom CSS File--->
        <style>
            /* Import Google Font - poppins */
            @import url("http://fonts.googleapis.com/css2?family=poppins:wght@200;300;400;500;600;700&display=swap");
            *{
                
                margin:0;
                padding:0;
                box-sizing:border-box;
                font-family: "poppins", sans-serif;
            
            }
            body{
                min-height:100vh;
                display:flex;
                align-items:center;
                justify-content: center;
                padding:20px;
                background-image:url('images/img8.jpeg');
            }
            .container{
                position:relative;
                max-width:700px;
                width:100%;
                background:#fff;
                padding:25px;
                border-radius:8px;
                box-shadow:0 0 15px rgba(0,0,0,0.1);
            }
        .container header{
        font-size: 1.5rem;
        color:#333;
        font-weight:500;
        text-align:center;
        }
        .container .form{
            margin-top:30px;
        }
        .form .input-box{
            width:100%;
            margin-top:20px;
        }
        .input-box label {
            color:#333;
        }
        .form :where(.input-box input, .select-box) {
            position:relative;
            height:50px;
            width:100%;
            outline:none;
            font-size:1rem;
            color:#707070;
            margin-top:8px;
            border:1px solid #ddd;
            border-radius:6px;
            padding:0 15px;
        }
        .input-box input:focus{
            box-shadow: 0 1px 0 rgba(0,0,0,0.1);
        }
        .form .column{
            display:flex;
            column-gap: 15px;
        }
        .form gender-box {
            margin-top:20px;
        }
        .gender-box h3{
            color:#333;
            font-size: 1rem;
            margin-bottom:8px;
        }
        .form :where(.gender-option, .gender) {
            display:flex;
            align-items:center;
            column-gap:50px;
            flex-wrap:wrap;
        }
        .form .gender{
            column-gap:5px;
        }ss 
        .gender input{
            accent-color:rgb(130,106,251);
        }
        .form :where(.gender input, .gender label) {
            cursor:pointer;
        }
        .gender label {
            color:#707070;
        }
        .address :where(input, .select-box) {
            margin-top15px;

        }
        .select-box select {
            height:100%;
            width:100%;
            outline:none;
            border:none;
            color:#707070;
            font-size:1rem;
        }
        .form button {
            height:55px;
            width:100%;
            color:#fff;
            font-size: 1rem;
            font-weight:400px;
            margin-top:30px;
            border:none;
            cursor:pointer;
            transition: all 0.25 ease;
            background: rgb(130, 106,251);
        }
        .form button:hover {
            background:rgb(88,56,250);
        }
        /Responsive/
    @media screen and(max-width:50px) {
        .form .column {
            flex-wrap:wrap;
        }
        .form :where(.gender-option, .gender) {
            row-gap:15px;
        }
    }
    </style>
    </head>
    <body class="bb">
        <?php
        if(isset($_POST["submit"])) {
            $name=mysqli_real_escape_string($conn,$_POST['name']);
            $email=mysqli_real_escape_string($conn,$_POST['email']);
            $phone=mysqli_real_escape_string($conn,$_POST['phone']);
            $password=mysqli_real_escape_string($conn,$_POST['password']);
            $cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);

            $pass = md5($password);
            $cpass = md5($cpassword);

            $emailquery="select * from signup where email ='$email'";
            $query=mysqli_query($conn,$emailquery);
            $emailcount=mysqli_num_rows($query);

            if($emailcount>0){
                ?>
                <script>
                    alert("email already exists")
                    </script>
                    <?php
            }else{
                if($password === $cpassword) {
                    $insertquery="insert into signup(name, email, phone, password,cpassword) 
                    values('$username','$email','$phone','$pass','$cpass')";
                    $iquery=mysqli_query($conn,$insertquery);
                    if($iquery)
                    {
                        ?>
                        <script>
                            alert("insert successful")
                            </script>
                            <?php
                    }else{
                        ?>
                        <script>
                            alert("failed")
                            </script>
                            <?php
                    }
            }
            else {
                ?>
                <script>
                    alert("password not matching")
                    </script>
                    <?php
            }
            }
        }
        ?>
        <section class="container">
            <header>WELCOME TO ANGELA RAIN INTERIORS</header>
            <form method="post" action="#" class="form">

                
    <div class="input-box">
                    <label>UserName</label>
                    <input type="text" name="name" placeholder="enter name" required />
    </div>
    <div class="input-box">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="enter email" required />
    </div>
    <div class="input-box">
                    <label>Mobile Number</label>
                    <input type="Number" name="phone" placeholder="enter mobilenumber" required />
    </div>
    <div class="input-box">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="enter password" required />
    </div>
    <div class="input-box">
                    <label>Confirm Password</label>
                    <input type="password" name="cpassword" placeholder="enter confirm password" required />
    </div>
    <button type="submit" name ="submit">Submit</button>
    </form>
    </section>
    </body>
    </html>