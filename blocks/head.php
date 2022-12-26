<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once 'header.php'; ?>
</head>
<body>
    <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= $server_path; ?>">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php session_start(); ?>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <?php if (isset($_SESSION['user_id'])) { ?>
                <ul class="navbar-nav w-50">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $views_path; ?>posts">Publicaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $views_path; ?>create-post">Crear publicación</a>
                    </li>
                </ul>
                <ul class="navbar-nav w-50 justify-content-end" style="padding-right: 5%;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">Mi cuenta</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= $views_path; ?>profile">Perfil</a></li>
                            <li><a class="dropdown-item right" href="<?= $post_data_path; ?>logout">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
                <?php } else { ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $views_path; ?>login">Iniciar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $views_path; ?>register">Crear cuenta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $views_path; ?>posts">Publicaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $views_path; ?>create-post">Crear publicación</a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </nav>