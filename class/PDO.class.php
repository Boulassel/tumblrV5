<?php

/**
 * Description of PDOp
 *
 * @author samirboulassel
 */
class PDOp {

    private $PDOp = NULL;

    public function __construct() {
        try {
             $this->PDOp = new PDO(DNS_BDD, USER_BDD, MDP_BDD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getPDO() {
        return $this->PDOp;
    }

}
