<?php

include_once '../config/dbconnect.php';
require '../data/flash-messages.php';

$records = $connection->prepare('SELECT user_id, user_name, user_lastname, user_email FROM `users` WHERE user_id = :id;');
$records->bindParam(':id', $_SESSION['user_id']);
$records->execute();
$results = $records->fetchAll(PDO::FETCH_ASSOC);

$rol_query = $connection->prepare('SELECT rol_name 
                                 FROM `roles` AS r
                                 INNER JOIN `users` AS u
                                 WHERE u.user_id = :id AND u.user_rol_id=r.rol_id');
$rol_query->bindParam(':id', $_SESSION['user_id']);
$rol_query->execute();
$rol_data = $rol_query->fetch();

if(count($results) > 0){
    $user_rol = $rol_data[0];
    $user_data = $results[0];
    $name = $user_data['user_name'];
    $lastname = $user_data['user_lastname'];
    $email = $user_data['user_email'];

?>
    <?= flash('welcome-message') ?>
    <p>Welcome. <?= $name; ?></p>
    <p><?= $user_rol; ?></p>
    <a href="../data/post_data/logout">
        Logout
    </a>
    <?php
       
        // if(isset($_SESSION['welcome_message'])) {
        //     $message = $_SESSION['welcome_message'];
        //     unset($_SESSION['welcome_message']);
        //     echo $message;
        // }

    ?>

<?php } else { 
   
   header("Location: http://localhost/aapruebas/freelancers-site/views");

} ?>