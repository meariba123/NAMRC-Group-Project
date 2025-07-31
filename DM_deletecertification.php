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
            <li><a href="DM_Viewcell.php">View cells</a></li>
            <li><a href="DM_Viewtraining.php">View available training/certifications</a></li>
            <li><a href="DM_Addcertification.php">Add certification & training</a></li>
            <li><a href="DM_Home.php">Back</a></li>
            <li class="right-link"><a href="../Home.html">Logout</a></li>
            </ul>
        </nav>
    </header>
</div>

<?php

$db = new SQLite3('../../../NAMRC copy/NAMRC.db');

if (isset($_GET['certification_ID']) && is_numeric($_GET['certification_ID'])) {
    $certification_ID = $_GET['certification_ID'];

    $sql = "SELECT certification_ID, certification_name, cell_ID FROM Certifications WHERE certification_ID=:certification_ID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':certification_ID', $certification_ID, SQLITE3_INTEGER);
    $result = $stmt->execute();
    $arrayResult = [];

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $arrayResult[] = $row;
    }

    if (isset($_POST['delete'])) {
        $stmt = $db->prepare("DELETE FROM Certifications WHERE certification_ID = :certification_ID");
        $stmt->bindParam(':certification_ID', $certification_ID, SQLITE3_INTEGER);
        $stmt->execute();
        header("Location: DM_Viewcertificate.php");
        exit();
    }
    } else {
        echo "Invalid certification ID.";
        exit();
    }
    ?>

<h2>Delete Certification For <?php echo $certification_ID; ?></h2><br>
<h4 style="color: red;">Are you sure want to delete this certification?</h4><br>

<div class="row">
    <div class="col-11">
        <?php if (!empty($arrayResult)): ?>
            <form method="post">
                <?php foreach ($arrayResult as $row): ?>
                    <input type="hidden" name="certification_ID" value="<?php echo $row['certification_ID']; ?>">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">Certification Name</label>
                        <input class="form-control" type="text" name="certification_name" value="<?php echo $row['certification_name']; ?>">
                    </div>

                    <input type="hidden" name="certification_ID" value="<?php echo $row['certification_ID']; ?>">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">Cell ID</label>
                        <input class="form-control" type="integer" name="cell_ID" value="<?php echo $row['cell_ID']; ?>">
                    </div>

                <?php endforeach; ?>
                <input type="submit" name="delete" value="Delete Certification" class="btn btn-primary">
            </form>
        <?php else: ?>
            <p>Can not delete the certification you have selected.</p>
        <?php endif; ?>
    </div>
</div>
<p>Press the "Back" icon to view the list of certifications. <div class="form-group col-md-3"><a href="DM_Viewcertificate.php">Back</a></div></p>