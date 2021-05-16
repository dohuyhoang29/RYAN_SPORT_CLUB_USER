<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "ryan_sport_club");

function db_connect(){
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    return $connection;
}

$db = db_connect();


function db_disconnect(){
    if(isset($connection)){
        mysqli_close($connection);
        return;
    }
}


function confirm_query_result($result){
    global $db;

    if(!$result){
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    } else {
        return $result;
    }
}



function find_all_picture(){
    global $db;
    // SELECT p.PictureID, p.URL, p.Name, s.Name
    // FROM pictures p INNER JOIN 
	// service s ON p.ServiceID = s.ServiceID;

    $sql = "SELECT p.PictureID, s.name,p.URL, p.Name, s.ServiceID as ServiceID, c.Name AS Category  
            FROM service s INNER JOIN  pictures p ON p.ServiceID = s.ServiceID
                           INNER JOIN categories c ON s.CategoryID = c.CategoryID;";

    $result = mysqli_query($db, $sql); 
    return confirm_query_result($result);
}

function find_all_service(){
    global $db;

    $sql = "SELECT s.ServiceID, s.name, s.Rules, s.Time, s.Famous_Players, c.Name
            FROM service s INNER JOIN categories c ON s.CategoryID = c.CategoryID; ";
    $result = mysqli_query($db, $sql);

    return confirm_query_result($result);
    
}

function find_all_outdoor(){
    global $db;

    $sql = "SELECT s.ServiceID, p.URL, c.Name, s.name 
    FROM service s  INNER JOIN pictures p ON s.ServiceID = p.ServiceID
                    INNER JOIN categories c ON c.CategoryID = s.CategoryID
    GROUP BY s.Name";

    $result = mysqli_query($db, $sql);

    return confirm_query_result($result);
}

function find_Picture_by_id($PictureID) {
    global $db;
    $sql = "SELECT * FROM Pictures ";
    $sql .= "WHERE PictureID='" .$PictureID. "'";
    $result = mysqli_query($db, $sql);

    confirm_query_result($result);

    $picture = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    return $picture; // returns an assoc. array
}

function find_service_by_id($service){
    global $db;

    $sql = "SELECT s.ServiceID, s.Famous_Players, s.Name, s.Rules, s.Time, p.URL, c.Name AS CategoryName
            FROM service s INNER JOIN pictures p ON s.ServiceID = p.ServiceID
                            INNER JOIN categories c ON c.CategoryID = s.CategoryID ";
    $sql .= "GROUP BY s.Name ";
    $sql .= "HAVING s.ServiceID = '" . $service . "';";
    $result = mysqli_query($db, $sql);

    confirm_query_result($result);

    $service = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $service;
}

function search_all($search){
    global $db;

    $sql = "SELECT p.Name, s.ServiceID, s.Famous_Players, s.Name, s.Rules, s.Time, p.URL, c.Name AS CategoryName
    FROM service s INNER JOIN pictures p ON s.ServiceID = p.ServiceID
                    INNER JOIN categories c ON c.CategoryID = s.CategoryID
    GROUP BY s.Name HAVING ";
    $sql .= "s.Name LIKE '%" . $search . "%' OR ";
    $sql .= "c.Name LIKE '%" . $search . "%' OR ";
    $sql .= "p.Name LIKE '%" . $search . "%'; ";

    $result = mysqli_query($db, $sql);

    return confirm_query_result($result);
}

function insert_search($search){
    global $db;

    $sql = "INSERT INTO search ";
    $sql .= "VALUES ('" . $search . "');";

    $result = mysqli_query($db, $sql);

    return confirm_query_result($result);
}


?>