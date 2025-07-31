<?php
  
  
session_start();

// Check if the new password is submitted
if(isset($_POST['Newpassword'])) {
    // Retrieve the new password from the form
    $newPassword = $_POST['Newpassword'];

    // Store the new password in a session variable
    $_SESSION['Newpassword'] = $newPassword;

    $db = new SQLite3('../../../NAMRC copy/NAMRC.db');

    $email = $_SESSION["DM_email"];
    $sql = "UPDATE 'Department Managers' SET DM_password = :npassword WHERE DM_email =:email";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':npassword', $newPassword, SQLITE3_TEXT);
    $stmt->bindParam(':email', $email, SQLITE3_TEXT);
    $result = $stmt->execute();
    $db->exec('COMMIT');


    if ($result) {

        echo "Password updated successfully";
    
        //header("Location: DM_Profile.php");
    } else {
        echo "Error updating password: " . $db->lastErrorMsg();
    }

}


else{
    echo "help";
}
?>





