<?php include_once '../data/get_data/getAllComments.php'; ?>

<div class="comment-section">
    <div class="post-comment">
        <form action="post_data/postComment.php" methhod="POST">
            <ul>
                <li>
                    <label for="comment"></label>
                    <textarea name="comment" placeholder="Escribe un comentario"></textarea>
                </li>
                <li>
                    <input type="submit" value="Postear comentario">
                </li>
            </ul>
        </form>
    </div>
    <?php 
    foreach ($comments_result as $comment) { ?>
        <div class="comment-container">
            <div class="comment-header">
                <p>
                    Comentario de <?=$comment['user_name']; ?>
                </p>
                <p>
                    <?= $comment['comment_at']; ?>
                </p>
            </div>
            <div class="comment-body">
                <p>
                    <?= $comment['comment_content']; ?>
                </p>
            </div>
            <div class="comment-footer">
                <div class="likes-section">
                    <span>
                        <i class="fa-solid fa-thumbs-up"></i> 
                        <?= $comment['comment_likes']; ?>
                    </span>
                    <span>
                        <i class="fa-solid fa-thumbs-down"></i>
                        <?= $comment['comment_dislikes']; ?> 
                    </span>
                </div>
                <p>
                    <i class="fa-solid fa-ban"></i>
                    Reportar
                </p>
            </div>
        </div>
    <?php } ?>
</div>