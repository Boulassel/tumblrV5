<?php

/**
 * Description of PDO
 *
 * @author samirboulassel
 */
class PDO {

    private $PDO = NULL;

    public static function __construct() {
        try {
            $this->PDO = new PDO(DNS_BDD, USER_BDD, MDP_BDD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public static function getPDO() {
        return $this->PDO;
    }

}
