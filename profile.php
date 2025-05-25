<?php
include "connection.php";
session_start();

// if(isset($_SESSION['username'])) {
//     header("Location: login.html");
//     exit;
// }
if(isset($_SESSION['studentname']))
{
    $username = $_SESSION['studentname'];
}
elseif(isset($_SESSION['teachername']))
{
    $username = $_SESSION['teachername'];
}
elseif(isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
}
// Query to fetch user information based on username
$sql = "SELECT * FROM user WHERE username='".$username."' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the user
    $row = $result->fetch_assoc();
    echo '
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        table {
            width: 50%;
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
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Field</th>
            <th>Details</th>
        </tr>
        <tr>
            <td>Username</td>
            <td>' . htmlspecialchars($row["username"]) . '</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>' . htmlspecialchars($row["name"]) . '</td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td>' . htmlspecialchars($row["phone"]) . '</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>' . htmlspecialchars($row["email"]) . '</td>
        </tr>
        <tr>
            <td>Role</td>
            <td>' . htmlspecialchars($row["usertype"]) . '</td>
        </tr>
    </table>
</body>';
} else {
    echo "User not found";
}

?>