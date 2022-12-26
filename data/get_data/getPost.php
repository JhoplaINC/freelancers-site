<?php

include_once '../config/dbconnect.php';

$post = $connection->prepare('SELECT 
                                   p.post_id, p.post_title, p.post_body, p.post_footer, u.user_name
                               FROM `posts` AS p
                               INNER JOIN `users` AS u
                               ON p.post_author_id=u.user_id
                               WHERE p.post_id=:id
                               AND u.user_name=:name');

$post->bindParam(':id', $_POST['post_id']);
$post->bindParam(':name', $_POST['user_name']);
$post->execute();
$post_result = $post->fetch(PDO::FETCH_ASSOC);


return $post = $post_result;
?>