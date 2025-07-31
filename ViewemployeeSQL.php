<!-- Viewing done by Ariba !-->

<?php
function getEmployee($dm_id) {
    $arrayResult = array(); 
    $db = new SQLite3('../../NAMRC.db');
    // get the value from Departments (DEP_ID) thats value matches up with the dm_id
    $dep_id_query = "SELECT DEP_ID FROM Departments WHERE DM_ID = :dm_id";
    $stmt_dep_id = $db->prepare($dep_id_query);
    $stmt_dep_id->bindValue(':dm_id', $dm_id, SQLITE3_INTEGER);
    $result_dep_id = $stmt_dep_id->execute();
    $dep_id_row = $result_dep_id->fetchArray();
    $dep_id = $dep_id_row['DEP_ID'];

    // get technical staff belonging to the same department as the logged-in DM
    $sql = "SELECT * FROM 'Technical Staff' t INNER JOIN 'Operator Certification' o ON t.tech_ID = o.tech_id WHERE DEP_ID = :dep_id  ORDER BY 
    t.tech_ID";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':dep_id', $dep_id, SQLITE3_INTEGER);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()) { 
        $arrayResult[] = $row; 
    }
    return $arrayResult;
}

function getMCM($dm_id) {
    $arrayResult = array(); 
    $db = new SQLite3('../../NAMRC.db');
    
    // get the value from Departments (DEP_ID) thats value matches up with the dm_id
    $dep_id_query = "SELECT DEP_ID FROM Departments WHERE DM_ID = :dm_id";
    $stmt_dep_id = $db->prepare($dep_id_query);
    $stmt_dep_id->bindValue(':dm_id', $dm_id, SQLITE3_INTEGER);
    $result_dep_id = $stmt_dep_id->execute();
    $dep_id_row = $result_dep_id->fetchArray();
    $dep_id = $dep_id_row['DEP_ID'];

    // get Manufacturing Cell Managers with the same DEP_ID
    $sql = "SELECT * FROM 'Manufacturing Cell Manager' WHERE DEP_ID = :dep_id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':dep_id', $dep_id, SQLITE3_INTEGER);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()) { 
        $arrayResult[] = $row; 
    }
    return $arrayResult;
}

function getDM($logged_in_dm_id) {
    // only show logged in DM
    $arrayResult = array(); 
    $db = new SQLite3('../../NAMRC.db');
    $sql = "SELECT * FROM 'Department Managers' WHERE dm_id = :logged_in_dm_id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':logged_in_dm_id', $logged_in_dm_id, SQLITE3_INTEGER);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()) { 
        $arrayResult[] = $row; 
    }
    return $arrayResult;
}
?>




