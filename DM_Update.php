<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nuclear AMRC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../site.css"/>
</head>
<body>
<div class="container">
    <header class="header">
        <div class="logo">
            <img class="logo-img" src="logo.png" alt="Nuclear AMRC Logo">
        </div>
        <nav class="navigation">
            <ul class="left-options">
            <li><a href="DM_View.php">View employees</a></li>
            <li><a href="DM_Viewtraining.php">View Training/Certifications</a></li>
            <li><a href = "DM_Profile.php">View Profile</a></li>
            <li><a href="DM_Home.php">Back</a></li>
            <li class="right-link"><a href="../Home.html">Logout</a></li>
            </ul>
        </nav>
    </header>
</div>

<?php
include '../db_connection.php';

if (isset($_GET['tech_ID'])) {
    $staff_id = $_GET['tech_ID'];

    try {
        $stmt_staff = $db->prepare("SELECT * FROM \"Technical Staff\" t INNER JOIN 'Operator Certification' o ON t.tech_ID = o.tech_id WHERE t.tech_ID = :tech_ID  ORDER BY 
        t.tech_ID");
        $stmt_staff->bindValue(':tech_ID', $staff_id, SQLITE3_TEXT);
        $result_staff = $stmt_staff->execute();
        $staffData = $result_staff->fetchArray(SQLITE3_ASSOC);

        if ($staffData) {
            if (isset($_POST['submit'])) {
                $update_staff = $db->prepare("UPDATE `Technical Staff` 
                SET 
                    tech_fname = :tech_fname, 
                    tech_mname = :tech_mname, 
                    tech_lname = :tech_lname, 
                    tech_email = :tech_email, 
                    tech_password = :tech_password, 
                    tech_dob = :tech_dob, 
                    DEP_ID = :DEP_ID
                WHERE 
                    tech_ID = :tech_ID
            ");

            $update_staff->bindValue(':tech_fname', $_POST['UPDATEFNAME'], SQLITE3_TEXT);
            $update_staff->bindValue(':tech_mname', $_POST['UPDATEMNAME'], SQLITE3_TEXT);
            $update_staff->bindValue(':tech_lname', $_POST['UPDATELNAME'], SQLITE3_TEXT);
            $update_staff->bindValue(':tech_email', $_POST['UPDATEEMAIL'], SQLITE3_TEXT);
            $update_staff->bindValue(':tech_password', $_POST['UPDATEPASSWORD'], SQLITE3_TEXT);
            $update_staff->bindValue(':tech_dob', $_POST['UPDATEDOB'], SQLITE3_TEXT);
            $update_staff->bindValue(':DEP_ID', $_POST['UPDATEDEP_ID'], SQLITE3_TEXT);
            $update_staff->bindValue(':tech_ID', $staff_id, SQLITE3_TEXT);
            $update_staff->execute();

            $update_certification = $db->prepare("
            UPDATE `Operator Certification` 
            SET 
                certification_ID = :certification_ID, 
                expiry_date = :expiry_date 
            WHERE 
                tech_id = :tech_ID
            ");
        
            // Bind values and execute for Operator Certification
            $update_certification->bindValue(':certification_ID', $_POST['UPDATECERT_ID'], SQLITE3_TEXT);
            $update_certification->bindValue(':expiry_date', $_POST['UPDATEED'], SQLITE3_TEXT);
            $update_certification->bindValue(':tech_ID', $staff_id, SQLITE3_TEXT);
            $update_certification->execute();


                echo "<br><br><br><br><br> Staff information updated successfully.";
            } else {
                ?>
                <form method="post"> 
                <h2 class="formTitle">Employee Update</h2>
                    <label for="UPDATEFNAME">First Name:</label> 
                    <input type="text" id="UPDATEFNAME" name="UPDATEFNAME" value="<?php echo $staffData['tech_fname']; ?>" required> 

                    <label for="UPDATEMNAME">Middle Name:</label> 
                    <input type="text" id="UPDATEMNAME" name="UPDATEMNAME" value="<?php echo $staffData['tech_mname']; ?>"> 

                    <label for="UPDATELNAME">Last Name:</label> 
                    <input type="text" id="UPDATELNAME" name="UPDATELNAME" value="<?php echo $staffData['tech_lname']; ?>" required> 

                    <br><br><br>

                    <label for="UPDATEEMAIL">Email:</label> 
                    <input type="text" id="UPDATEEMAIL" name="UPDATEEMAIL" value="<?php echo $staffData['tech_email']; ?>" required> 

                    <label for="UPDATEPASSWORD">Password:</label> 
                    <input type="text" id="UPDATEPASSWORD" name="UPDATEPASSWORD" value="<?php echo $staffData['tech_password']; ?>" required> 

                    <label for="UPDATEDOB">DOB:</label> 
                    <input type="text" id="UPDATEDOB" name="UPDATEDOB" value="<?php echo $staffData['tech_dob']; ?>" required> 

                    <label for="UPDATEDEP_ID">Department ID:</label> 
                    <input type="text" id="UPDATEDEP_ID" name="UPDATEDEP_ID" value="<?php echo $staffData['DEP_ID']; ?>" required>

                    <label for="UPDATECERT_ID">Certicate ID:</label> 
                    <input type="text" id="UPDATECERT_ID" name="UPDATECERT_ID" value="<?php echo $staffData['certification_ID']; ?>" required>

                    <label for="UPDATEED">Expiry Date:</label> 
                    <input type="text" id="UPDATEED" name="UPDATEED" value="<?php echo $staffData['expiry_date']; ?>" required>


                    <input type="submit" name="submit" value="Submit" class="button"> 
                </form> 
                <?php
            }
        } else {
            echo "Employee data not found.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<footer class="footer">
        <div class="container">
            <div class="contact-info">
                <h3>Contact</h3>
                <p>+44 (0)114 222 9900</p>
                <p>enquiries@namrc.co.uk</p>
            </div>
            <div class="links">
                <h3>Links</h3>
                <a href="https://www.linkedin.com/company/nuclear-amrc/">LinkedIn</a>
            </div>
            <div class="rights">
                <h3>© 2024 Nuclear AMRC. All Rights Reserved.</h3>
            </div>
        </div>
    </footer>
</body>
</html>