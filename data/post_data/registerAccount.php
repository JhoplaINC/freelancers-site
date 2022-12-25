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
    $profile_img_name = 'profile-img-name.png';
    $profile_img_size = 7;
    $profile_img_type = 'image/png';

    if($user_password != $user_conf_password){
        $message = 'Las constraseñas no coinciden';
    } else {
        $sql = 'INSERT INTO users 
                    (user_rol_id, user_email, user_password, user_name, user_lastname, user_profile_img_name, user_profile_img_size, user_profile_img_type) 
                VALUES 
                    (:rol, :email, :password, :name, :lastname, :img_name, :img_size, :img_type)';
        $stmt = $connection->prepare($sql);
    
        $pass_hash = password_hash($user_password, PASSWORD_BCRYPT);
    
        $stmt->bindParam(':rol', $user_rol);
        $stmt->bindParam(':email', $user_email);
        $stmt->bindParam(':password', $pass_hash);
        $stmt->bindParam(':name', $user_name);
        $stmt->bindParam(':lastname', $user_lastname);
        $stmt->bindParam(':img_name', $profile_img_name);
        $stmt->bindParam(':img_size', $profile_img_size);
        $stmt->bindParam(':img_type', $profile_img_type);
        
        if($stmt->execute()){
            header("Location: http://localhost/aapruebas/freelancers-site/landing/successAccount");
        } else {
            $message = 'Este correo ya está en uso, por favor, ingrese otro';
        }
    }
}

?>