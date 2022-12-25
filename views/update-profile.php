<?php require_once '../blocks/head.php';

include_once '../config/dbconnect.php';
require '../data/flash-messages.php';

if(isset($_POST['update-btn'])){
    $user_email = $_POST['user_email'];
    $user_name = $_POST['user_name'];
    $user_sec_name = $_POST['user_second_name'];
    $user_lastname = $_POST['user_lastname'];
    $user_sec_lastname = $_POST['user_second_lastname'];
    $user_nick = $_POST['user_nick'];
    $uid = $_POST['uid'];
    
    $query = "UPDATE `users`
                SET user_email=:email,
                user_name=:name,
                user_second_name=:second_name,
                user_lastname=:lastname,
                user_second_lastname=:second_lastname,
                user_nick=:nick
                WHERE user_id=:id";
    
    $records = $connection->prepare($query);
    
    $records->bindParam(':email', $user_email);
    $records->bindParam(':name', $user_name);
    $records->bindParam(':second_name', $user_sec_name);
    $records->bindParam(':lastname', $user_lastname);
    $records->bindParam(':second_lastname', $user_sec_lastname);
    $records->bindParam(':nick', $user_nick);
    $records->bindParam(':id', $uid);
    $records->execute();

    flash('updated-account', '¡Muy bien!', 'Tu cuenta ha sido actualizada correctamente! ', FLASH_SUCCESS);
    
    header('Location: http://localhost/aapruebas/freelancers-site/views/profile');  
}

$records = $connection->prepare('SELECT 
                                    user_id, 
                                    user_email,
                                    user_name,
                                    user_second_name,
                                    user_lastname,
                                    user_second_lastname,
                                    user_nick 
                                 FROM `users` 
                                 WHERE user_id = :id;');

$records->bindParam(':id', $_SESSION['user_id']);
$records->execute();
$results = $records->fetchAll(PDO::FETCH_ASSOC);

$email = $results[0]['user_email'];
$name = $results[0]['user_name'];
$scnd_name = $results[0]['user_second_name'];
$lastname = $results[0]['user_lastname'];
$scnd_lastname = $results[0]['user_second_lastname'];
$nick = $results[0]['user_nick'];

?>

<p class="back-to">
    Volver al <a href="<?=$views_path;?>profile">Perfil</a>
</p>

<form action="update-profile" method="POST" enctype="multipart/form-data">
	
	<h1>Actualizar cuenta</h1>

    <ul>
        <li>
            <label for="user_name"></label>
            <input type="text" name="user_name" placeholder="Ingrese su nombre" 
                   value="<?= $name ? $name : "" ?>" required />
        </li>
        <li>
            <label for="user_second_name"></label>
            <input type="text" name="user_second_name" placeholder="Ingrese su segundo nombre"
                   value="<?= $scnd_name ? $scnd_name : "" ?>" /> 
        </li>
        <li>
            <label for="user_nick"></label>
            <input type="text" name="user_nick" placeholder="Ingrese su Nick" 
                   value="<?= $nick ? $nick : "" ?>" />
        </li>
        <li>
            <label for="user_lastname"></label>
            <input type="text" name="user_lastname" placeholder="Ingrese su apellido" 
                   value="<?= $lastname ? $lastname : "" ?>" required />
        </li>
        <li>
            <label for="user_second_lastname"></label>
            <input type="text" name="user_second_lastname" placeholder="Ingrese su segundo apellido" 
                   value="<?= $scnd_lastname ? $scnd_lastname : "" ?>" />
        </li>
        <li>
            <label for="user_email"></label>
            <input type="email" name="user_email" placeholder="Ingrese su email" 
                   value="<?= $email ? $email : "" ?>" required />
        </li>
        <li>
            <input type="submit" name="update-btn" value="Actualizar cuenta" />
            <input type="text" name="uid" value="<?= $_SESSION['user_id']; ?>" class="d-none">
        </li>
    </ul>
</form>

<?php require_once '../blocks/footer.php'; ?>