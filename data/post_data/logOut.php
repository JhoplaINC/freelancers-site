<?php require_once '../../blocks/head.php'; 

session_start();

session_unset();

session_destroy();

header('Location: http://localhost/aapruebas/freelancers-site/views/login');

require_once '../../blocks/footer.php'; ?>