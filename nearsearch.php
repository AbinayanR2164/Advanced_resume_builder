    <!DOCTYPE html>
<html lang="en">
<head>

    <?php
$name=$_REQUEST['id'];
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Data Table</title> <br><br>

    <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn {
            border: none;
            border-radius: 9px;
            width: 90px;
            height: 30px;
            color: white;
            cursor: pointer;
            margin-right: 5px;
        }

        .btn-delete {
            background-color: red;
        }

        .btn-update {
            background-color: blue;
        }
    </style>
</head>
<body>

<h2>Users Data Table</h2>   

<a href="register.php"><button  style="color: white;background-color: green;border-radius: 80px;width: 150px;"  >New Register</button>
</a> 
<br>




<table>
    <tr>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>Action</th>
    </tr>

    <?php
    require "registerdbcon.php";

    // Execute the query
    $sql = "SELECT * FROM register WHERE name='$name'";
    $result = $conn->query($sql);

    // Check if there are results
    if ($result->num_rows > 0) {
        // Fetch each row and display it in the table
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['mobilenumber']); ?></td>
                <td><?php echo htmlspecialchars($row['emailid']); ?></td>
                <td>

                    <form action="edit.php" method="POST" style="display:inline;">
                        <input type="hidden" name="name" value="<?php echo htmlspecialchars($row['name']); ?>">
                        <input type="hidden" name="phonenumber" value="<?php echo htmlspecialchars($row['mobilenumber']); ?>">
                        <input type="hidden" name="emailid" value="<?php echo htmlspecialchars($row['emailid']); ?>">
                        <button type="submit" name="action" value="update" class="btn btn-update">Update</button>
                    </form>

<a href="Personal/index.php?id=<?php echo htmlspecialchars($row['name']); ?>">                        <button type="submit" name="action" value="update" class="btn btn-update" style="width: 170px;">View Resume Website</button></a>

<a     href="education.php?id=<?php echo htmlspecialchars($row['name']); ?>">                        <button type="submit" name="action" value="update"   style="width: 150px;  " class="btn btn-update">Add Education details</button></a>

<a href="personal.php?id=<?php echo htmlspecialchars($row['name']); ?>">                        <button type="submit" name="action" value="update" style="width: 150px; "class="btn btn-update">Add personal details</button></a>

<a href="workexp.php?id=<?php echo htmlspecialchars($row['name']); ?>">                        <button type="submit" name="action" value="update" style="width: 180px;  "class="btn btn-update">Add workexperience details</button></a>
<br><br>
<a href="skill.php?id=<?php echo htmlspecialchars($row['name']); ?>">                        <button type="submit" name="action" value="update" style="width: 150px;  "class="btn btn-update">Add skill details</button></a>







                
                </td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='4'>No data found</td></tr>";
    }

    $conn->close();
    ?>

</table>

</body>
</html>
