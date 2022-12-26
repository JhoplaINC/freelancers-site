<?php 
include '../blocks/head.php'; 
include_once '../data/get_data/getPost.php';
?>

<h1>Post view</h1>

<div class="post-container">
    <div class="post-header">
        <p class="post-title">
            <?= $post['post_title']; ?>
        </p>
        <p class="post-author">
            <?= $post['user_name']; ?>
        </p>
    </div>
    <div class="post-body">
        <?= $post['post_body']; ?>
    </div>
    <div class="post-footer">
        <?= $post['post_footer']; ?>
    </div>
</div>

<?php include_once 'components/comments.php'; ?>
<?php include '../blocks/footer.php'; ?>