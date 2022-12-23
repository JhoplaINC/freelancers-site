<?php require_once '../blocks/head.php'; ?>

<form action="../data/post_data/loginAccount.php" method="POST">
    <ul>
        <li>
            <label for="user_email"></label>
            <input name="user_email" type="text" placeholder="Ingresa tu email">           
        </li>
        <li>
            <label for="user_password"></label>
            <input name="user_password" type="password" placeholder="Ingresa tu contraseña">
        </li>
        <li>
            <input type="submit" value="Ingresar">
        </li>
    </ul>
    
    
    
</form>

<?php if(!empty($message)): ?>
    <p> <?= $message ?></p>
<?php endif; ?>

<p>Aún no tienes una cuenta? <a href="register">Crea una!</a></p>

<?php require_once '../blocks/footer.php'; ?>
