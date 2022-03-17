<?php
include_once('./dbConnection.php');

if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = "SELECT * FROM course WHERE course_name LIKE '%$inpText%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['course_name'] . '</a>';
        }
    } else {
        echo '<p class="list-group-item border-1">No Record</p>';
    }
}
