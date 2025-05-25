<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Teacher_home</title>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .container {
        display: flex;
        height: 100vh;
    }

    .left-panel {
        width: 20%;
        background-color: #b991b8;
        overflow-y: auto; /* Enable scrolling if the content exceeds the height */
    }

    .right-panel {
        width: 80%;
        background-color: #e0e0e0;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* Ensure space between content and logout button */
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        padding: 10px;
        cursor: pointer;
        border-bottom: 1px solid #ccc;
    }

    li:hover {
        background-color: #d6ccd6;
    }

    a {
        text-decoration: none;
        color: inherit;
        display: block;
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
        align-self: flex-end; /* Align the button to the bottom-right corner */
        margin-top: 20px;
    }

    .logout-button:hover {
        background-color: #ff1f3a;
    }
</style>
</head>
<body>

<div class="container">
    <div class="left-panel">
        <ul>
            <li><a href="update_marks.php">Update Marks</a></li>
            <li><a href="update_attendance.php">Update Attendance</a></li>
        </ul>
    </div>
    <div class="right-panel" style="height: 100vh;">
    <h2>Welcome Teacher!</h2>
    <iframe id="iframe" src="profile.php" frameborder="0" style="height: 80%; width: 100%;"></iframe>
    <button id="logoutButton" class="logout-button">Logout</button>
</div>

</div>

<script>
document.getElementById('logoutButton').addEventListener('click', function() {
    localStorage.removeItem('authToken');
    window.location.href = 'logout.php'; 
});
</script>

</body>
</html>