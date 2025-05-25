<?php
        include "connection.php";
        $id=$_GET['updateid'];
        $sql="SELECT * from attendance where username='$id' ";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);

        if(isset($_POST['submit']))
        {
            $username=$_POST['username'];
            $dsa=$_POST['data_structures'];
            $wd=$_POST['web_development'];
            $se=$_POST['software_engg'];
            $ds=$_POST['data_science'];
            $dev=$_POST['devops'];

            $sql = "UPDATE `attendance` SET `Data Structures` ='$dsa', `Web Development`='$wd', `Software Engg.`='$se', `Data Science`='$ds', `DevOps`='$dev' WHERE `username`='$id' ";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                header('location:update_attendance.php');
            }
            else{
                echo "Error: " . mysqli_error($conn);
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Attendance Form</title>
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

    input[type="text"],
    input[type="text"]{
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
<h2>Update Attendance</h2>
<div class="form-container">
    <form action="" method="POST">

        <label for="username">Username:</label>
        <input type="text" value=<?php echo $id?> name="username" readonly>

        <label for="data-structures">Data Structures:</label>
        <input type="text" value=<?php echo $row['Data Structures']?> name="data_structures">
        <label for="web-development">Web Development:</label>
        <input type="text" value=<?php echo $row['Web Development']?> name="web_development">
        <label for="software-engg">Software Engineering:</label>
        <input type="text" value=<?php echo $row['Software Engg.']?> name="software_engg">
        <label for="data-science">Data Science:</label>
        <input type="text" value=<?php echo $row['Data Science']?> name="data_science">
        <label for="devops">DevOps:</label>
        <input type="text" value=<?php echo $row['DevOps']?> name="devops">
        <input type="submit" name="submit" value="Update Attendance">

    </form>
    <div class="logout-button-container">
        <button id="logoutButton" class="logout-button">Exit</button>
    </div>
</div>
<script>
document.getElementById('logoutButton').addEventListener('click', function() {
    // Clear any authentication tokens, session data, etc.
    // For example, you might clear a JWT token from local storage:
    localStorage.removeItem('authToken');
    
    // Redirect the user to the logout endpoint or login page
    window.location.href = 'update_attendance.php'; // Change '/logout' to your actual logout URL or login page
});
</script>
</body>
</html>