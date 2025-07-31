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
    <form id = 'myForm' method="POST" action="ChangepasswordSQL.php">
            <div>
        
                <div class="Log">Enter New Password</div>
                <div class="passwordlabel">
                    <input type="password" id="Newpassword" name="Newpassword">
                </div>
                <input type="submit" name="submit" value="Submit" class="loginsubmit">
            </div>
        </form>
      
</div>




<div class="game-container">
    <div class="centered-paragraph">
        <p>Press the "Back" icon to view your profile.</p>
        <div class="form-group col-md-3">
            <a href="DM_profile.php">Back</a>
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
