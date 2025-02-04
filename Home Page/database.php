<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h1>User Details</h1><br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Created At</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "user1_registration"; // The name of your database

            // Create a connection
            $connection = new mysqli($servername, $username, $password, $database);

            // Check the connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            // Read all rows from the 'users' table
            $sql = "SELECT id, CONCAT(firstName, ' ', lastName) AS fullName, email, number, created_at FROM users"; 
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }

            // Fetch and display the data
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["fullName"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["number"] . "</td>
                        <td>" . $row["created_at"] . "</td>
                    </tr>";
            }

            $connection->close();
            ?>
        </tbody>
    </table>
</body>
</html>
