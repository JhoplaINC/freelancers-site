<?php 
include '../blocks/head.php'; 
include_once '../data/get_data/getAllPosts.php';
?>

<div class="posts-container">
<?php
foreach ($posts_result as $post) { ?>
    <div class="post-container-preview">
        <div class="post-header-preview">
            <p class="post-title">
                <?= $post['post_title']; ?>
            </p>
        </div>
        <div class="post-body-preview">
            <p class="post-body">
                <?= $post['post_body']; ?>
            </p>
        </div>
        <div class="post-footer-preview">
            <p class="post-footer">
                <?= $post['post_footer']; ?>
            </p>
        </div>
        <div class="preview-footer">
            <form action="<?= $views_path; ?>post" method="POST">
                <input type="text" name="user_name" value="<?= $post['user_name'] ?>" hidden>
                <input type="text" name="post_id" value="<?= $post['post_id'] ?>" hidden>
                <input type="submit" value="Ir a la publicación">
            </form>
        </div>
    </div>
<?php } ?>
</div>

<?php include '../blocks/footer.php'; ?>