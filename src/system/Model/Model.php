<?php


namespace system\Model;

use system\Library\Db;

abstract class Model {
    public $db;

    public function __construct() {
        $this->db = new Db;
    }
}