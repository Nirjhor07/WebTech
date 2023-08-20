<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
     <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f2f5;
        }
        .dashboard {
            background-color: #555;
            color: white;
            width: 300px;
            padding: 20px;
            box-shadow: 5px 0 10px rgba(0, 0, 0, 0.2);
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }
        .dashboard.active {
            transform: translateX(0);
        }
        .dashboard h1 {
            margin-top: 0;
            font-weight: bold;
        }
        .dashboard-table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .dashboard-table th,
        .dashboard-table td {
            padding: 10px;
            text-align: left;
        }
        .dashboard-table th {
            background-color: #f2f2f2;
        }
        .dashboard-links {
            text-decoration: none;
            color: #3498db;
            display: block;
            padding: 8px 10px;
            transition: background-color 0.2s ease-in-out;
        }
        .dashboard-links:hover {
            background-color: #f2f2f2;
            color: #333;
        }
        .toggle-dashboard {
            position: fixed;
            top: 20px;
            right: 20px;
            cursor: pointer;
            background-color: #555;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 998;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_SESSION['user_id'])) { // Check if user is logged in
        echo '<div class="dashboard" id="dashboard">
                  <h1>Dashboard</h1>
                  <table class="dashboard-table">
                      <tr>
                          <th>Tabs</th>
                      </tr>
                      <tr>
                          <td><a class="dashboard-links" href="../UpdateUserInformation.php">Edit Profile</a></td>
                      </tr>
                      <tr>
                          <td><a class="dashboard-links" href="../showUserinfo.php">View Profile</a></td>
                      </tr>
                      <tr>
                          <td><a class="dashboard-links" href="changePassword.php">Change Password</a></td>
                      </tr>
                      <tr>
                          <td><a class="dashboard-links" href="../HomePage.php?activate_session=true">Home Page</a></td>

                      </tr>
                         <tr>
                          <td><a class="dashboard-links" href="logout.php">Log Out</a></td>
                      </tr>
                      

                  </table>
              </div>';
    } else {
        echo "Please log in to access the dashboard.";
    }
    ?>

    <div class="toggle-dashboard" id="toggleDashboard">View Dashboard Content</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#toggleDashboard").click(function() {
                $("#dashboard").toggleClass("active");
            });
        });
    </script>
</body>
</html>


