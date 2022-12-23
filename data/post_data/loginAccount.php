<?php

    // session_start();

    if (isset($_SESSION['user_id'])) {
        header('Location: http://localhost/aapruebas/freelancers-site/views/index/');
    }

    require_once '../../config/dbconnect.php';

    if (!empty($_POST['user_email']) && !empty($_POST['user_password'])) {
        $records = $connection->prepare('SELECT user_id, user_email, user_password FROM users WHERE user_email = :email');
        $records->bindParam(':email', $_POST['user_email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (is_countable($results) > 0 && password_verify($_POST['user_password'], $results['user_password'])) {
            $_SESSION['user_id'] = $results['user_id'];
            header("Location: http://localhost/aapruebas/freelancers-site/landing/successLogin");
        } else {
            $message = 'Lo sentimos, tus credenciales no coinciden con nuestros datos';
        }
    }

?>