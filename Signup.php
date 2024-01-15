<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="main.css">
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-image: url('Images/Pic13.jpg');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-attachment: fixed;
            
           
        }
       /* .full_body{
            background-image: url('Images/Pic13.jpg');
            background-size: cover;
            
        }*/

        .header ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #808080;
        }

        .header li {
            float: left;
            border-right: none;
            padding: 10px 20px;
        }

        .centre {
            
            text-align: center;
            position: absolute;
            top: 30%;
            left: 25%;
            width: 50%;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
        }

        .centre form label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
            color: black;
            font-weight: bold;
        }

        .centre form input {
            width: 100%;
            padding: 12px 20px;
            margin-bottom: 20px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .centre form button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .footer ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: black;
        }

        .footer li {
            /*display: inline;*/
            padding: 10px;
        }

        .footer li a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body  class="full-body">
    <div class="header">
        <ul>
            <li style="float: left; border-right: none;"> <a href="Home.php" class="logo"> <img src="Images/Pic9.png" width="70px" height="60px"> <strong style="color: white;"> BookWell </strong> Online Appointment System </a> </li>
        </ul>
    </div>

    <div class="centre">
        <h2 style="text-align:left;">Connect With Us</h2><br>
        <form action="InsertSgnup.php" method="post">
            <label for="name" style="color: black; font-weight: bold;">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="DOB" style="color: black; font-weight: bold;">Date of Birth:</label>
            <input type="date" id="DOB" name="DOB" required><br>

            <label for="gender" style="color: black; font-weight: bold;">Gender:</label>
            <input type="text" id="gender" name="gender" required><br>

            <label for="contact" style="color: black; font-weight: bold;">Contact:</label>
            <input type="text" id="contact" name="contact" required><br>

            <label for="username" style="color: black; font-weight: bold;">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="email" style="color: black; font-weight: bold;">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="pwd" style="color: black; font-weight: bold;">Password:</label>
            <input type="password" id="pwd" name="pwd" required><br>

            <label for="pwdr" style="color: black; font-weight: bold;">Confirm Password:</label>
            <input type="password" id="pwdr" name="pwdr" required><br>

            <button type="submit" name="signup">Sign Up</button>
        </form>
    </div>

    <div class="footer">
        <ul style="position: absolute;top:5%; left: 80%;background-color:black;">
            <li> <a href="adminlogin.php">Admin Login </a> </li>
        </ul>
    </div>
</body>
</html>
