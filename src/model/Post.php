<?php


namespace model;
use system\Model\Model;

class Post extends Model
{
    public function getPosts() {
        $result = $this->db->row('SELECT `title`, `desc` FROM posts');
        return $result;
    }

}