<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("includes.html");
    $conn = mysqli_connect('localhost', 'root', '', 'appointment', 4306);

    if(isset($_POST['signup'])){
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $dob = isset($_POST['DOB']) ? $_POST['DOB'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $contact = isset($_POST['contact']) ? $_POST['contact'] : '';
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['pwd']) ? $_POST['pwd'] : '';
        $passwordr = isset($_POST['pwdr']) ? $_POST['pwdr'] : '';

        if (!empty($email)) {
            $query = "SELECT * FROM PATIENT WHERE EMAIL='$email'";
            $data = mysqli_query($conn, $query);
            $num = mysqli_num_rows($data);

            if ($num == 1) {
                echo "<script>
                        swal({ 
                            title: 'Email already exists!',
                            text: 'Please register using a different email ID',
                            type: 'error' 
                            },
                            function(){
                                window.location.href = 'signup.php';
                            });
                        </script>";
            } else {
                $sql = "INSERT INTO patient(name,gender,dob,phone,username,password,email) VALUES ('$name','$gender','$dob','$contact','$username','$password','$email')";
                $data = mysqli_query($conn, $sql);
                if ($data) {
                    echo "<script>
                            swal({ 
                                title: 'Sign Up Successful!',
                                text: 'Welcome!',
                                type: 'success' 
                                },
                                function(){
                                    window.location.href = 'Login.php';
                                });
                            </script>";
                }
            }
        }
    }
}
?>
