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
            <li><a href="DM_Viewtraining.php">View Training/Certifications</a></li>
            <li><a href="DM_Home.php">Back</a></li>
            <li class="right-link"><a href="../Home.html">Logout</a></li>
            </ul>
        </nav>
    </header>
</div>

<?php

$db = new SQLite3('../../../NAMRC copy/NAMRC.db');

if (isset($_GET['training_ID']) && is_numeric($_GET['training_ID'])) {
    $training_ID = $_GET['training_ID'];

    $sql = "SELECT training_ID, training_name FROM Training WHERE training_ID=:training_ID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':training_ID', $training_ID, SQLITE3_INTEGER);
    $result = $stmt->execute();
    $arrayResult = [];

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $arrayResult[] = $row;
        
    }

    if (isset($_POST['delete'])) {
        $stmt = $db->prepare("DELETE FROM Training WHERE training_ID = :training_ID");
        $stmt->bindParam(':training_ID', $training_ID, SQLITE3_INTEGER);
        $stmt->execute();
        header("Location: DM_Viewtraining.php");
        exit();
    }
} else {
    echo "Invalid training ID.";
    exit();
}

?>

<div class="game-container">
    <div class="title-container">
        <h2>Delete Training For <?php echo $training_ID; ?></h2>
    </div>
    <div class="subtitle-container">
        <h4 style="color: red;">Are you sure want to delete this training?</h4>
    </div>
</div>



<div class="row">
    <div class="col-11">
        <?php if (!empty($arrayResult)): ?>
            <form method="post">
                <?php foreach ($arrayResult as $row): ?>
                    <input type="hidden" name="training_ID" value="<?php echo $row['training_ID']; ?>">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">Training Name</label>
                        <input class="form-control" type="text" name="training_name" value="<?php echo $row['training_name']; ?>">
                    </div>
                <?php endforeach; ?>
                <input type="submit" name="delete" value="Delete Training" class="btn btn-primary">
            </form>
        <?php else: ?>
            <p>Can not delete the training you have selected.</p>
        <?php endif; ?>
    </div>
</div>


<div class="game-container">
    <div class="centered-paragraph">
        <p>Press the "Back" icon to view the list of trainings.</p>
        <div class="form-group col-md-3">
            <a href="DM_Viewtraining.php">Back</a>
        </div>
    </div>
</div>

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
