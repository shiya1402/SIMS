
<?php
include "connection.php";
session_start();
$username = $_SESSION['username'];
$sql="SELECT * from attendance where username='$username'";
$result=mysqli_query($conn,$sql);
$sql_total="SELECT * from total_class ";
$res=mysqli_query($conn,$sql_total);

if(mysqli_num_rows($result)>0 && mysqli_num_rows($res)>0)
{
    $row = mysqli_fetch_array($result);
    echo '
    <title>Attendance Details</title>
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
            <th>Classes Attended</th>
            <th>Total Classes</th>
            <th>Attendance</th>
        </tr>';
        $sum=0;
        $count=0;
        while($total = mysqli_fetch_array($res)){
            echo '<tr>
            <td>' . htmlspecialchars($total["Subject"]) . '</td>
            <td>' . htmlspecialchars($row[$total["Subject"]]) . '</td>
            <td>' . htmlspecialchars($total["Total classes"]) . '</td>
            <td>' . round(($row[$total["Subject"]]/$total["Total classes"])*100, 2) .'%</td>
            </tr>';
            $sum=$sum+round(($row[$total["Subject"]]/$total["Total classes"])*100, 2);
            $count++;
        }
    echo '</table>
    <h3> Total attendance percentage is : '. $sum/$count .'%</h3> 
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
    