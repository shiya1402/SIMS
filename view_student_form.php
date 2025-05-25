<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Student</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: rgb(191, 191, 220);
    }

    .form-container {
        background-color: white;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        margin: auto;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"] {
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
    h2{
        text-align:center;
    }
    .logout-button {
        background-color: #ff4b5c;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .logout-button-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
    .logout-button:hover {
        background-color: #ff1f3a;
    }
</style>
</head>
<body>

<h2>View Student</h2>
<div class="form-container">
    <form action="" method="POST">
        <label for="studentname">Student Username:</label>
        <input type="text" id="studentname" name="studentname" required>

        <input type="submit" value="Submit">
    </form>
    <div class="logout-button-container">
        <button id="logoutButton" class="logout-button">Exit</button>
    </div>
    <?php
        include "connection.php";
        // Check if login form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $studentname = $_POST['studentname'];
            
            // Query to check if username and password match
            $sql = "SELECT * FROM user WHERE username='".$studentname."' ";
            $result = mysqli_query($conn,$sql);
            if ($result) {
                // Check if any rows were returned
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    if($row['usertype']=='student')
                    {
                        session_start();
                        $_SESSION['studentname']=$studentname;
                        header("Location: display_info_window.php");
                        exit;
                    }
                    else
                    {
                        echo "<p style='color: red'> Invalid username </p>";
                    }
                } else {
                    echo "<p style='color: red'> Invalid username </p>";
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        ?>
</div>
<script>
document.getElementById('logoutButton').addEventListener('click', function() {
    // Clear any authentication tokens, session data, etc.
    // For example, you might clear a JWT token from local storage:
    localStorage.removeItem('authToken');
    
    // Redirect the user to the logout endpoint or login page
    window.location.href = 'adminhome.php'; // Change '/logout' to your actual logout URL or login page
});
</script>
</body>
</html>