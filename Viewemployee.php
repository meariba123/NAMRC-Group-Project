<!-- Viewing done by Ariba !-->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container pb-5">
        <main role="main" class="pb-3">
            <h2>View Technical Staff:</h2><br>
            <?php
session_start();
require_once 'ViewemployeeSQL.php';

// gets the logged in MCM's ID value
if (isset($_SESSION['dm_id'])) {
    $logged_in_dm_id = $_SESSION['dm_id'];
    $DM = getDM($logged_in_dm_id);
} else {
    header("Location: DM_Login.php");
    exit;
}

// Fetches the employees who are in the Cell managed by the logged-in MCM
$dm_id = $_SESSION['dm_id'];
$Employee = getEmployee($dm_id);

?>
            <div class="row">
                <div class="col-5">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th style="min-width: 75px;">Tech ID</th> 
                                <th style="min-width: 75px;">First Name</th>
                                <th style="min-width: 75px;">Middle Name</th>  
                                <th style="min-width: 75px;">Last Name</th> 
                                <th style="min-width: 175px;">Email</th> 
                                <th style="min-width: 75px;">Password</th>
                                <th style="min-width: 75px;">Address ID</th>  
                                <th style="min-width: 75px;">Dob</th> 
                                <th style="min-width: 75px;">Cell ID</th> 
                                <th style="min-width: 75px;">Department ID</th> 
                                <th style="min-width: 75px;">Certificate ID</th>
                                <th style="min-width: 75px;">Expiry Date</th> 
                                <th style="min-width: 75px;">Update</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Employee as $employee): ?>
                                <tr>
                                    <td><?php echo $employee['tech_ID']?></td>
                                    <td><?php echo $employee['tech_fname']?></td>
                                    <td><?php echo $employee['tech_mname']?></td>
                                    <td><?php echo $employee['tech_lname']?></td>
                                    <td><?php echo $employee['tech_email']?></td>
                                    <td><?php echo $employee['tech_password']?></td>
                                    <td><?php echo $employee['address_id']?></td>
                                    <td><?php echo $employee['tech_dob']?></td>
                                    <td><?php echo $employee['cell_ID']?></td>
                                    <td><?php echo $employee['DEP_ID']?></td>
                                    <td><?php echo $employee['certification_ID']?></td>
                                    <td><?php echo $employee['expiry_date']?></td>
                                    <td><a href="DM_Update.php?tech_ID=<?php echo $employee['tech_ID'];?>">Update</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        
        
            <div class="row">
            <div class="col-5">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th style="min-width: 75px;">MCM ID</th> 
                            <th style="min-width: 75px;">First Name</th>
                            <th style="min-width: 75px;">Middle Name</th>  
                            <th style="min-width: 75px;">Last Name</th> 
                            <th style="min-width: 175px;">Email</th> 
                            <th style="min-width: 75px;">Password</th>
                            <th style="min-width: 75px;">Address ID</th>  
                            <th style="min-width: 75px;">Dob</th> 
                            <th style="min-width: 75px;">Dep ID</th> 
                            <th style="min-width: 75px;">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $MCM = getMCM($dm_id);

                        for ($i=0; $i<count($MCM); $i++):
                        ?>
                        <tr>
                            <td><?php echo $MCM[$i]['MCM_ID']?></td>
                            <td><?php echo $MCM[$i]['MCM_fname']?></td>
                            <td><?php echo $MCM[$i]['MCM_mname']?></td>
                            <td><?php echo $MCM[$i]['MCM_lname']?></td>
                            <td><?php echo $MCM[$i]['MCM_email']?></td>
                            <td><?php echo $MCM[$i]['MCM_password']?></td>
                            <td><?php echo $MCM[$i]['address_id']?></td>
                            <td><?php echo $MCM[$i]['MCM_dob']?></td>
                            <td><?php echo $MCM[$i]['DEP_ID']?></td>
                            <td><a href="DM_UpdateMCM.php?MCM_ID=<?php echo $MCM[$i]['MCM_ID'];?>">Update</a></td>


                        </tr>
                        <?php
                        endfor;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>




            <h2>View Department Managers:</h2><br>

        <div class="row">
            <div class="col-5">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th style="min-width: 75px;">DM ID</th> 
                            <th style="min-width: 75px;">First Name</th>
                            <th style="min-width: 75px;">Middle Name</th>  
                            <th style="min-width: 75px;">Last Name</th> 
                            <th style="min-width: 175px;">Email</th> 
                            <th style="min-width: 75px;">Password</th>
                            <th style="min-width: 75px;">Address ID</th>  
                            <th style="min-width: 75px;">Dob</th> 
                            <th style="min-width: 75px;">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $DM = getDM($logged_in_dm_id);

                        for ($i=0; $i<count($DM); $i++):
                        ?>
                        <tr>
                            <td><?php echo $DM[$i]['DM_ID']?></td>
                            <td><?php echo $DM[$i]['DM_fname']?></td>
                            <td><?php echo $DM[$i]['DM_mname']?></td>
                            <td><?php echo $DM[$i]['DM_lname']?></td>
                            <td><?php echo $DM[$i]['DM_email']?></td>
                            <td><?php echo $DM[$i]['DM_password']?></td>
                            <td><?php echo $DM[$i]['address_id']?></td>
                            <td><?php echo $DM[$i]['DM_dob']?></td>
                            <td><a href="DM_UpdateDM.php?DM_ID=<?php echo $DM[$i]['DM_ID'];?>">Update</a></td>


                        </tr>
                        <?php
                        endfor;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        </main>
    </div>
</body>
</html>
