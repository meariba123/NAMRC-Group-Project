<?php
session_start();

$db = new SQLite3('../../../NAMRC copy/NAMRC.db');

if (!$db) {
    die("Connection failed: " . $db->lastErrorMsg());
}

if (isset($_POST["DMemail"]) && isset($_POST["DMpassword"])) {
   
    $email = $_POST["DMemail"];
    $password = $_POST["DMpassword"];

    $stmt = $db->prepare("SELECT * FROM 'Department Managers' WHERE DM_email = :email");
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $result = $stmt->execute();

    if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        if ($row['DM_password'] === $password) {
            $_SESSION["DM_email"] = $email;
            
            $_SESSION['logged_in'] = true;
            $_SESSION['dm_id'] = $row['DM_ID'];
            header("Location: DM_Home.php");
            exit();
        } else {
            echo "<h2>Invalid username or password</h2>";
        }
    } else {
        echo "<h2>Email not recognized as a Department Manager</h2>";
    }
} else {
    echo "<h2>Email and/or password not provided</h2>";
}

$db->close();
?>
