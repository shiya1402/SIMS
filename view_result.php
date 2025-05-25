
<?php
include "connection.php";
session_start();
$username = $_SESSION['username'];
$sql="SELECT * from marks where username='$username'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
    $row = mysqli_fetch_array($result);
    echo '
    <title>Marks Details</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f4f4f4;
    }
    .container {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        height: 100vh;
    }
    .tbl{
        width: 60%;
        height: 60%
        display: flex;
        justify-content: flex-end;
        align-items: flex-end;
    }
    .btn{
        width: 60%;
        height: 30%;
        display: flex;
        justify-content: flex-end;
        align-items: flex-start;
    }
    table {
        width: 100%;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: rgb(191, 191, 220);
        font-weight: bold;
    }
    tr:hover {
        background-color: #f1f1f1;
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

    .logout-button:hover {
        background-color: #ff1f3a;
    }
</style>
</head>
<body>
<div class="container">
    <div class="tbl">
    <table>
        <tr>
            <th>Subject</th>
            <th>Marks</th>
        </tr>
        <tr>
            <td>Data Structures</td>
            <td>' . htmlspecialchars($row["Data Structures"]) . '</td>
        </tr>
        <tr>
            <td>Web Development</td>
            <td>' . htmlspecialchars($row["Web Development"]) . '</td>
        </tr>
        <tr>
            <td>Software Engg.</td>
            <td>' . htmlspecialchars($row["Software Engg."]) . '</td>
        </tr>
        <tr>
            <td>Data Science</td>
            <td>' . htmlspecialchars($row["Data Science"]) . '</td>
        </tr>
        <tr>
            <td>DevOps</td>
            <td>' . htmlspecialchars($row["DevOps"]) . '</td>
        </tr>
    </table>
    </div>
    <div class="btn">
    <button id="logoutButton" class="logout-button">Exit</button>
    </div>
</div>
<script>
    document.getElementById("logoutButton").addEventListener("click", function() {
        window.location.href = "studenthome.php";
    });
</script>
</body>
';
} else {
    echo "User not found";
}
?>
    