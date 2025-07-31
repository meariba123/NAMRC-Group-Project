<!-- Viewing done by Ariba !-->
<?php
function getCertifications (){
    $arrayResult = array(); 
    $db = new SQLite3('../../../NAMRC copy/NAMRC.db');
    $sql = "SELECT * FROM Certifications";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row; 
    }
    return $arrayResult;
}
?>