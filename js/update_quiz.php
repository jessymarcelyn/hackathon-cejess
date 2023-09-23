<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['userId'])) {
        $userId = $_POST['userId'];
        // Now you have the userId, you can use it in your PHP logic.
        echo 'Received userId: ' . $userId;
        $query = "UPDATE quiz SET menang = 1 WHERE id = $userId"; 
        // Add your code to update the quiz or perform any action with the userId.
    } else {
        echo 'userId not set in POST request.';
    }
} else {
    echo 'This endpoint only supports POST requests.';
}
?>
