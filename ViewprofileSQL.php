<!-- Viewing done by Ariba !-->
<?php
session_start();
function getProfile(){
    
    
 

    $arrayResult = array(); 
    $email = $_SESSION["DM_email"];
    $db = new SQLite3('../../../NAMRC copy/NAMRC.db');
    $sql = "SELECT * FROM 'Department Managers' d INNER JOIN Address a ON a.address_id = d.address_id WHERE DM_email = :email ";
  
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row; 
    }
   
    return $arrayResult;
    
}


?>