<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>Your Profile:</h2><br>
        
        <?php
        include "ViewprofileSQL.php";
        $Profile = getProfile();

        // Loop through each profile entry
        foreach ($Profile as $profile):
        ?>
        <div class="row">
            <div class="col-5">
                <p><strong>Your ID:</strong> <?php echo $profile['DM_ID']; ?></p>
                <p><strong>First Name:</strong> <?php echo $profile['DM_fname']; ?></p>
                <p><strong>Middle Name:</strong> <?php echo $profile['DM_mname']; ?></p>
                <p><strong>Last Name:</strong> <?php echo $profile['DM_lname']; ?></p>
                <p><strong>Your House number:</strong> <?php echo $profile['house_num']; ?></p>
                <p><strong>Your Postcode:</strong> <?php echo $profile['postcode']; ?></p>
                <p><strong>Your Email:</strong> <?php echo $profile['DM_email']; ?></p>
                <p><strong>Your Password:</strong> <?php echo $profile['DM_password']; ?></p>

            </div>
        </div>
        <?php
        endforeach;
        ?>

        <div class="tablelink"><a href="Changepassword.php">Change Password</a></div>
    </main>
</div>
