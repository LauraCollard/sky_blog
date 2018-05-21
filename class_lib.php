<?php

class Member {
    protected $member_id;
    protected $username;
    protected $password;
    protected $security_group;
    protected $registration_date;
    function __construct($member_id, $username, $password, $security_group, $registration_date) {
        $this->member_id = $member_id;
        $this->username = $username;
        $this->password = $password;
        $this->security_group = $security_group;
        $this->registration_date = $registration_date;
    }
    function getMember_id() {
        return $this->member_id;
    }
    function getUsername() {
        return $this->username;
    }
    function getPassword() {
        return $this->password;
    }
    function getSecurity_group() {
        return $this->security_group;
    }
    function getRegistration_date() {
        return $this->registration_date;
    }
    function getFavourites($pdo){
        $stmt= $pdo->prepare("SELECT * FROM posts p
                                JOIN favourites f ON f.post_id=p.post_id
                                WHERE f.member_id=:id");
        $stmt->execute(array(":id" => $_SESSION["id"]));
        $favourites= [];
        while($row= $stmt->fetch(PDO::FETCH_ASSOC)){
            $favourite= new Post($row["post_id"], $row["post_date"],$row["category_id"],$row["member_id"],
                                $row["title"], $row["post_image"],$row["post_content"]);
            array_push($favourites, $favourite);  
        }
        return $favourites;
    }
    function getFollowers($pdo){
        $stmt= $pdo->prepare("SELECT m.username FROM members m
                                JOIN follows f ON f.follower_id=m.member_id
                                WHERE f.member_id=:id");
        $stmt->execute(array(":id" => $_SESSION["id"]));
        $followers= [];
        while($row= $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($followers, $row["username"]);
        }
        return $followers;
    }
    function getFollowed($pdo){
        $stmt= $pdo->prepare("SELECT username FROM members m
                                JOIN follows f ON f.member_id=m.member_id
                                WHERE f.follower_id=:id");
        $stmt->execute(array(":id" => $_SESSION["id"]));
        $followed= [];
        while($row= $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($followed, $row["username"]);
        }
        return $followed;
    }
    function getOwnPosts($pdo){
        $stmt= $pdo->prepare("SELECT * FROM posts WHERE member_id=:id");
        $stmt->execute(array(":id" => $_SESSION["id"]));
        $own_posts= [];
        while($row= $stmt->fetch(PDO::FETCH_ASSOC)){
            $own_post= new Post($row["post_id"], $row["post_date"],$row["category_id"],$row["member_id"],
                                $row["title"], $row["post_image"],$row["post_content"]);
            array_push($own_posts, $own_post);
        }
        return $own_posts;
    }
}

class Post {
    protected $post_id;
    protected $post_date;
    protected $category_id;
    protected $member_id;
    protected $title;
    protected $post_image;
    protected $post_content;
    function __construct($post_id, $post_date, $category_id, $member_id, $title, $post_image, $post_content) {
        $this->post_id = $post_id;
        $this->post_date = $post_date;
        $this->category_id = $category_id;
        $this->member_id = $member_id;
        $this->title = $title;
        $this->post_image = $post_image;
        $this->post_content = $post_content;
    }
    function getPost_id() {
        return $this->post_id;
    }
    function getPost_date() {
        return $this->post_date;
    }
    function getCategory_id() {
        return $this->category_id;
    }
    function getMember_id() {
        return $this->member_id;
    }
    function getTitle() {
        return $this->title;
    }
    function getPost_image() {
        return $this->post_image;
    }
    function getPost_content() {
        return $this->post_content;
    }
}