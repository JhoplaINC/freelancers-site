<?php

include_once '../config/dbconnect.php';

$records = $connection->prepare('SELECT user_id, user_name, user_lastname, user_email FROM `users` WHERE user_id = :id;');
$records->bindParam(':id', $_SESSION['user_id']);
$records->execute();
$results = $records->fetchAll(PDO::FETCH_ASSOC);

if(count($results) > 0){
    
    $user_data = $results[0];
    $name = $user_data['user_name'];
    $lastname = $user_data['user_lastname'];
    $email = $user_data['user_email'];

?>
    <br> Welcome. <?= $name; ?>
    <a href="../data/post_data/logout">
        Logout
    </a>

<?php } else { ?>
    
    xd

<?php } ?>