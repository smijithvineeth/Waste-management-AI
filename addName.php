<?php


header("Content-Type: application/json");


$data = json_decode(file_get_contents("php://input"));

session_start();

if (isset($_SESSION["full_name"])) {
    $username = $_SESSION["full_name"];
} else {
    $username = "default_username"; 
}

if (isset($data->scheduletime)) {
    $scheduletime = $data->scheduletime;

   
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=waste_management_db", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO users_base (schedule_time, username) VALUES (:scheduletime, :username)");
        $stmt->bindParam(':scheduletime', $scheduletime);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $response = ["message" => "time changed successfully"];
        echo json_encode($response);
    } catch (PDOException $e) {
        $response = ["message" => "Error inserting into the database: " . $e->getMessage()];
        echo json_encode($response);
    }
} else {
    $response = ["message" => "Invalid request"];
    echo json_encode($response);
}
?>