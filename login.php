<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(191, 191, 220);
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        #user,
        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px;
            border: none;
            border-radius: 4px;
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body bgcolor="lightskyblue">

    <div class="container">
        <h2>Student Information System</h2>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="username" required>
            <input type="password" name="password" placeholder="password" required>
            <input type="submit" value="Login">
        </form>
        <?php
        include "connection.php";
        // Check if login form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            // Query to check if username and password match
            $sql = "SELECT * FROM user WHERE username='".$username."' AND password='".$password."' ";
            $result = mysqli_query($conn,$sql);
            if ($result) {
                // Check if any rows were returned
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $subject="Login Message !!";
                    $msg="You have been logged in.";
                    $from="aryarajput210211072@gmail.com";
                    $to= $row['email'];
                    $headers="From: $from";
                    mail($to,$subject,$msg,$headers);
                    if($row["usertype"]=="student")
                    {
                        session_start();
                        $_SESSION['username']=$username;    
                        header("Location: studenthome.php");
                        exit;
                    }
                    elseif($row["usertype"]=="admin")
                    {
                        session_start();
                        $_SESSION['username']=$username;
                        header("Location: adminhome.php");
                        exit;
                    }
                    elseif($row["usertype"]=="teacher")
                    {
                        session_start();
                        $_SESSION['username']=$username;
                        header("Location: teacherhome.php");
                        exit;
                    }
                } else {
                    echo "<p style='color: red'> Invalid username or password </p>";
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        ?>
    </div>
</body>
</html>