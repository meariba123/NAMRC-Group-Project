<!-- Viewing done by Ariba !-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>View Cells:</h2><br>

<div class="row">
    <div class="col-5">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <th style="min-width: 175px;">Cell ID</th> 
                <th style="min-width: 175px;">Cell Name</th> 
                <th style="min-width: 175px;">Manager First Name</th> 
                <th style="min-width: 175px;">Manager Last Name</th> 
                </thead>
           
                
           
            <?php
            include 'ViewcellSQL.php';
            $Cell = getCell();

                for ($i=0; $i<count($Cell); $i++):
            ?>
            <tr>
                <td><?php echo $Cell[$i]['cell_ID']?></td>
                <td><?php echo $Cell[$i]['cell_name']?></td>
                <td><?php echo $Cell[$i]['MCM_fname']?></td>
                <td><?php echo $Cell[$i]['MCM_lname']?></td>
                
                </body>
                </tr>

                    <?php
                    endfor;
                    ?>
                </table>
            </div>
        </div>
    </main>
</div>
