<?php

include_once '../config/dbconnect.php';
include_once 'getPost.php';

$comments = $connection->prepare("SELECT c.comment_id, c.comment_content, c.comment_at, c.comment_likes, c.comment_dislikes, u.user_name, p.post_id
                               FROM `comments` AS c
                               LEFT JOIN `users` AS u
                               ON c.comment_author_id = u.user_id
                               LEFT JOIN `posts` AS p
                               ON c.comment_post_id = p.post_id
                               WHERE p.post_id = ".$_POST['post_id']."
                               ORDER BY c.comment_at ASC");

$comments->execute();
$comments_result = $comments->fetchAll(PDO::FETCH_ASSOC);

if(count($comments_result) > 0){
    return $comments_result;
}
?>