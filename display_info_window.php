<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .right-panel {
        width: 100%;
        background-color: #e0e0e0;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* Ensure space between content and logout button */
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
<div class="right-panel" style="height: 100vh;">
    <iframe id="iframe" src="profile.php" frameborder="0" style="height: 80%; width: 100%;"></iframe>
    <button id="logoutButton" class="logout-button">Exit</button>
</div>

<script>
document.getElementById('logoutButton').addEventListener('click', function() {
    // Clear any authentication tokens, session data, etc.
    // For example, you might clear a JWT token from local storage:
    localStorage.removeItem('authToken');
    
    // Redirect the user to the logout endpoint or login page
    window.location.href = 'admin_subsession_logout.php'; // Change '/logout' to your actual logout URL or login page
});
</script>

</body>
</html>