<?php
include("./server/serverconnection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data fetch from Database</title>
  <link rel="stylesheet" href="style2.css" />
</head>

<body>
<div class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="datatable.php">Data Table</a></li>
        </ul>
    </div>
  <h2>Database Table</h2>

  <div class="container">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Phone Number</th>
          <th>Email</th>
          <th>Password</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $queryGet = "SELECT * FROM user_signup_info";
        $fetchAuthors = mysqli_query($conn, $queryGet);

        if (mysqli_num_rows($fetchAuthors) > 0) {
          while ($dataAsRow = mysqli_fetch_assoc($fetchAuthors)) {

            $id = $dataAsRow['id'];
            $name = $dataAsRow['name'];
            $phone_number = $dataAsRow['phone_number'];
            $email = $dataAsRow['email'];
            $password = $dataAsRow['password'];

            echo
            "<tr>
            <td>" . $id . "</td>
            <td>" . $name . "</td>
            <td>" . $phone_number . "</td>
            <td>" . $email . "</td>
            <td>" . $password . "</td>
          </tr>";
          }
          echo "</tbody>";
        }
        ?>
    </table>
  </div>
</body>

</html>