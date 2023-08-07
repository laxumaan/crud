
<?php
include "config.php";

$first_name = "";
$last_name = "";
$email = "";
$gender = "";

if (isset($_POST['submit'])) {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    
    $sql = "INSERT INTO users (firstname, lastname, email, password, gender) VALUES
    ('$first_name', '$last_name', '$email', '$password', '$gender')";

    $result = $conn->query($sql);
    if ($result === TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id='$user_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $first_name = $row['firstname'];
        $last_name = $row['lastname'];
        $email = $row['email'];
        $gender = $row['gender'];
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Update Form</title>
</head>
<body>
    <h2>User Update Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Personal Information:</legend>
            First name:<br>
            <input type="text" name="firstname" value="<?php echo $first_name; ?>"><br>
            Last name:<br>
            <input type="text" name="lastname" value="<?php echo $last_name; ?>"><br>
            Email:<br>
            <input type="email" name="email" value="<?php echo $email; ?>"><br>
            Password:<br>
            <input type="password" name="password"><br>
            Gender:<br>
            <input type="radio" name="gender" value="Male" <?php if($gender == 'Male'){ echo "checked";} ?>>Male
            <input type="radio" name="gender" value="Female" <?php if($gender == 'Female'){ echo "checked";} ?>>Female<br><br>
            <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>
</body>
</html>