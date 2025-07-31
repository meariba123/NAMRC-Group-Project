<!-- Viewing done by Ariba !-->
<?php
function getCell (){
    $arrayResult = array(); 
    $db = new SQLite3('../../../NAMRC copy/NAMRC.db');
    $sql = "SELECT C.cell_ID, C.cell_name, M.MCM_fname, M.MCM_lname 
    FROM Cells c
    INNER JOIN 'Manufacturing Cell Manager'
     m ON C.MCM_ID = M.MCM_ID";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row; 
    }
    return $arrayResult;
}
?>
