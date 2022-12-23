<?php require_once '../../config/dbconnect.php';

$message = '';

if(!empty($_POST['user_name']) &&
   !empty($_POST['user_lastname']) &&
   !empty($_POST['user_email']) && 
   !empty($_POST['user_password']) && 
   !empty($_POST['user_confirm_password']) && 
   !empty($_POST['user_rol'])){
    $user_name = $_POST['user_name'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_conf_password = $_POST['user_confirm_password'];
    $user_rol = $_POST['user_rol'];

    if($user_password != $user_conf_password){
        $message = 'Las constraseñas no coinciden';
    } else {
        $sql = 'INSERT INTO users (user_rol_id, user_email, user_password, user_name, user_lastname) VALUES (:rol, :email, :password, :name, :lastname)';
        $stmt = $connection->prepare($sql);
    
        $pass_hash = password_hash($user_password, PASSWORD_BCRYPT);
    
        $stmt->bindParam(':rol', $user_rol);
        $stmt->bindParam(':email', $user_email);
        $stmt->bindParam(':password', $pass_hash);
        $stmt->bindParam(':name', $user_name);
        $stmt->bindParam(':lastname', $user_lastname);
        
        if($stmt->execute()){
            header("Location: http://localhost/aapruebas/freelancers-site/landing/successAccount");
        } else {
            $message = 'Este correo ya está en uso, por favor, ingrese otro';
        }
    }
}

?>