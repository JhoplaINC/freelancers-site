<?php require_once '../blocks/head.php'; ?>

<form action="../data/post_data/registerAccount.php" method="POST">
	
	<h1>¡Crea tu cuenta!</h1>

    <ul>
        <li>
            <label for="user_name"></label>
            <input type="text" name="user_name" placeholder="Enter your name" required />
        </li>
        <li>
            <label for="user_lastname"></label>
            <input type="text" name="user_lastname" placeholder="Enter your lastname" required />
        </li>
        <li>
            <label for="user_email"></label>
            <input type="email" name="user_email" placeholder="Enter your email" required />
        </li>
        <li>
            <label for="user_password"></label>
            <input type="password" name="user_password" placeholder="Enter your password" required />
        </li>
        <li>
            <label for="user_confirm_password"></label>
            <input type="password" name="user_confirm_password" placeholder="Confirm your password"  />
        </li>
        <li>
            <label for="user_rol"></label>
            <select name="user_rol" id="user_rol">
                <option value="1">Desarrollador</option>
                <option value="2">Empresa</option>
            </select>
        </li>
        <li>
            <input type="submit" name="register-btn" value="Crear cuenta" />
        </li>
    </ul>

		<?php if(!empty($message)): ?>
			<p><?= $message; ?></p>
		<?php endif; ?>

	<p>
		Ya tienes una cuenta? <a href="login">Ingresa aquí</a>
	</p>
</form>

<?php require_once '../blocks/footer.php'; ?>