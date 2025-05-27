<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-sscale=1.0">
    <title>Payment Management</title> <!-- Page Title  -->
    <link rel="stylesheet" href="admin.css"> <!-- CSS Link  -->
</head>
<body>
    <h2>Payments</h2> <!-- Table Title  -->
    <table>
        <tr> <!-- Table Column  -->
            <th>No.</th>
            <th>Name.</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Card Number</th>
            <th>Expiry Month</th>
            <th>Expiry Year</th>
            <th>CVV</th>
        </tr>

<!-- Retrieve table data from existing database  -->
        <?php
        $servername = "localhost";
        $username = "root";
        $password = ""; 
        $dbname = "sneakerstore"; // Database name

        $conn = new mysqli($servername,$username,$password,$dbname); //Connection with the server

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT name, phone, address , card_number, expiry_month, expiry_year, cvv FROM payments"; //Select from Database
        $result = $conn->query($sql);

        if (!$result) {
            die("Query failed: " . $conn->error); //Error Message
        }
        $serialNumber = 1; //Checking presence of row

        if ($result->num_rows > 0) { // ----------------------------|   
            while($row = $result->fetch_assoc()) { //               |
                echo "<tr>";                       //               |
                echo "<td>".$serialNumber."</td>"; //               |
                echo "<td>".$row["name"]."</td>";  //               |
                echo "<td>".$row["phone"]."</td>"; //               |----> Diplaying data in HTML table
                echo "<td>".$row["address"]."</td>"; //             |
                echo "<td>".$row["card_number"]."</td>"; //         |
                echo "<td>".$row["expiry_month"]."</td>"; //        |
                echo "<td>".$row["expiry_year"]."</td>"; //         |
                echo "</tr>"; // -----------------------------------|
                $serialNumber++; //Display number of each row in table
            }
        } else { //Handling if no table found
            echo "<tr><td colspan='8'>No payments found</td></tr>";
        }
        $conn->close(); //Closing database connection
    ?>
    </table>
</body>
</html>
