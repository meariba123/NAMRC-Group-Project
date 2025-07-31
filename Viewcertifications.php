<!-- Viewing done by Ariba !-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>View Certifications:</h2><br>

        <div class="row">
            <div class="col-5">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th style="min-width: 175px;">Certification ID</th> 
                            <th style="min-width: 175px;">Certification Name</th> 
                            <th style="min-width: 175px;">Cell ID</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'ViewcertificationsSQL.php';
                        $Certifications = getCertifications();

                        foreach ($Certifications as $certification):
                        ?>
                        <tr>
                            <td><?php echo $certification['certification_ID']?></td>
                            <td><?php echo $certification['certification_name']?></td>
                            <td><?php echo $certification['cell_ID']?></td>
                            <td>
                                <a href="DM_deletecertification.php?certification_ID=<?php echo $certification['certification_ID']; ?>">Delete</a>
                            </td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                <p>Press the "Back" icon to view the list of trainings. <a href="DM_Viewtraining.php">Back</a></p>
            </div>
        </div>
    </main>
</div>
