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

    public setId(){
        $this->id=$new_id;
    }

    public setLogin(){
        $this->login=$new_login;
    }

    public setNom(){
        $this->nom=$new_nom;
    }

    public setPrenom(){
        $this->prenom=$new_prenom;
    }

    public setPassword(){
        $this->password=$new_password;
    }

    public setCeated_on(){
        $this->created_on=$new_created_on;
    }

    function createLinkBDD (){
    $link = mysqli_connect('localhost', USER_BDD, MDP_BDD , BDD);

    /* Vérification de la connexion */
    if (mysqli_connect_errno()) {
        printf("Échec de la connexion : %s\n", mysqli_connect_error());
        exit();
    }
    return $link;
}

    public function create_user(){
        $reqUser = 'INSERT INTO users (login,nom,prenom,password) ';
        $$reqUser .= 'VALUES ("'$new_login.'","'.$new_nom.'","'.$new_prenom.'","'.$new_password.'",';
        $$resUser = mysqli_query($linkBDD, $reqUser);
    }

}
