<?php
/**
 * Description of User
 *
 * @author samirboulassel
 */
class User {
    
    private $id;
    private $login;
    private $nom;
    private $prenom;
    private $password;
    private $created_on;

    function __construct($log, $nom, $prenom, $mdp)
    {
        $this->login = $log;
        $this->nom = $nom;
        $this->prenom= $prenom;
        $this->password= $mdp;

    }

//Méthodes Get
    public function getId(){
        return $this->id;
    }

    public function getLogin(){
        return $this->login;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getCreated_on(){
        return $this->created_on;
    }


//Méthodes set
    public function setId($new_id){
        $this->id=$new_id;
    }

    public function setLogin($new_login){
        $this->login=$new_login;
    }

    public function setNom($new_nom){
        $this->nom=$new_nom;
    }

    public function setPrenom($new_prenom){
        $this->prenom=$new_prenom;
    }

    public function setPassword($new_password){
        $this->password=$new_password;
    }

    public function setCreated_on($new_created_on){
        $this->created_on=$new_created_on;
    }

    function newPDO() {
    try {
        $oPDO = new PDO('mysql:host=localhost;dbname='.BDD, USER_BDD, MDP_BDD);
    } catch (PDOException $ex) {
        echo '<br/>';
        echo "Echec lors de la connexion à MySQL : (" . $ex->getCode() . ") "; 
        echo $ex->getMessage();
        exit();
    }
}

    public function create_user($new_login,$new_nom, $new_prenom, $new_password){
        $reqUser = 'INSERT INTO users (login,nom,prenom,password) ';
        $$reqUser .= 'VALUES ("'$new_login.'","'.$new_nom.'","'.$new_prenom.'","'.$new_password.'",';
        $$resUser = mysqli_query($linkBDD, $reqUser);
    }

}
