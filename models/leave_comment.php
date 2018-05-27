<?php
session_start();
include "../pdo.php";
include "class_lib.php";

$post_id= 2;

if(!empty($_REQUEST["leave_comment"])){
    $stmt= $pdo->prepare("INSERT INTO comments (post_id, member_id, comment_content) 
                            VALUES (:post_id, :member_id, :comment_content)");

    $stmt->execute(array(":post_id" => $post_id,
                        ":member_id" => $_REQUEST["member_id"],
                        ":comment_content" => $_REQUEST["leave_comment"]));   
}

header("Location: ../views/post_page.php");
return;