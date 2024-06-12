<?php
include("serverconnection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data fetch from Database</title>
  <link rel="stylesheet" href="../allstyles/style2.css" />
</head>

<body>
  <div class="navbar">
    <ul>
      <li><a href="../index.php">Home</a></li>
      <li><a href="datatable.php">Data Table</a></li>
    </ul>
  </div>
  <h2>Edit Database Table</h2>

  <div class="container">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Phone Number</th>
          <th>Email</th>
          <th>Password</th>
          <th style="background-color: #25c41f;">Change Action</th>
          <th style="background-color: #cc1f47;">Remove Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM user_signup_info";
        $fetchAuthors = mysqli_query($conn, $query);
        if (mysqli_num_rows($fetchAuthors) > 0) {
          while ($dataAsRow = mysqli_fetch_assoc($fetchAuthors)) {

            $id = htmlspecialchars($dataAsRow['id']);
            $name = htmlspecialchars($dataAsRow['name']);
            $phone_number = htmlspecialchars($dataAsRow['phone_number']);
            $email = htmlspecialchars($dataAsRow['email']);
            $password = htmlspecialchars($dataAsRow['password']);

            echo
            "<tr>
              <td id='action'><input class='edit_fields fs' type='text' name='id' value='" . $id . "' readonly /></td>
              <td id='action'><input class='edit_fields fs' type='text' name='name' value='" . $name . "' /></td>
              <td id='action'><input class='edit_fields fs' type='text' name='phone_number' value='" . $phone_number . "' /></td>
              <td id='action'><input class='edit_fields fs' type='email' name='email' value='" . $email . "' /></td>
              <td id='action'><input class='edit_fields fs' type='text' name='password' value='" . $password . "' /></td>
              <td id='action'>
                <form method='post' action='edit.php'>
                  <input type='hidden' name='id' value='" . $id . "'/>
                  <button type='submit' class='edit_btn' name='edit'>Edit</button>
                </form>
              </td>
              <td id='action'>
                <form method='post' action='delete.php'>
                  <input type='hidden' name='id' value='" . $id . "'/>
                  <button type='submit' class='del_btn' name='delete'>Delete</button>
                </form>
              </td>
            </tr>";
          }
        } else {
          echo "<tr><td colspan='7'>No records found!</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <form action="#" method="post">
    <div class="container">
      <button class="save-btn" type="submit" name="save">Save Changes</button>
    </div>
  </form>
</body>

</html>
<?php

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["submit"])) {
  $full_name = $_POST["name"];
  $phone_number = $_POST["p-number"];
  $email = $_POST["mail"];
  $passwordCheck = $_POST["password"];



  $query = "UPDATE user_signup_info SET name = '$full_name', phone_number = '$phone_number', email = '$email', password = '' WHERE id = $id";;

  $sendData = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($sendData) {
    header("Location: index.php");
  } else {
    echo "Failed! to send Data";
    die();
  }
}
?>