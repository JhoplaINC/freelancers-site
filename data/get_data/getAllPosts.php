<?php

include_once '../config/dbconnect.php';

$posts = $connection->prepare('SELECT 
                                    p.post_id, p.post_title, p.post_body, p.post_footer, u.user_name
                               FROM `posts` AS p
                               INNER JOIN `users` AS u
                               ON p.post_author_id=u.user_id');

$posts->execute();
$posts_result = $posts->fetchAll(PDO::FETCH_ASSOC);


if(count($posts_result) > 0){
    return $posts_result;
}
?>