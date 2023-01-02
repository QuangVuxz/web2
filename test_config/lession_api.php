<?php
    //connect to db connection
    $conn = mysqli_connect('localhost','root','','user_db') or die('connection failed');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connect okay!\n";
    header('Content-Type: application/json; charset-utf-8');
    $response = [];
    /*check authentication
    if($_GET["key"] != "LESSION"){
        $response["status"] = false;
        $response["data"] = [];
        $response["msg"] = "failed!";
        echo json_encode($response, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        http_response_code(403);
        die();
    }
    */
    $sql = "SELECT * FROM lession_db";

    // Execute the query and retrieve the results
    $result = $conn->query($sql);

    // Build an array to return through the API
    $data = array();
    if ($result->num_rows > 0) {
        // Iterate over the results and build the array
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    // Convert the data to a JSON string
    $json = json_encode($data);
    
    // Return the JSON string to the client
    echo $json;  
    http_response_code(200);
?>