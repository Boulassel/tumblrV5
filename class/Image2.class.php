<?php

/**
 * Description of Image2
 * @class Image2 : une classe
 * @author samirboulassel
 */
class Image2 {

    private $id;
    private $nom_image;
    private $caption_image; //$caption est un commentaire
    private $idUser;
                function __construct($id, $nom_image, $caption_image) {
        $this->id = $id;
        $this->nom_image = $nom_image;
        $this->caption_image = $caption_image;
    }

    function getId() {
        return $this->id;
    }

    function getNom_image() {
        return $this->nom_image;
    }

    function getCaption_image() {
        return $this->caption_image;
    }
    function getIdUser() {
        return $this->idUser;
    }

        function setId($id) {
        $this->id = $id;
    }

    function setNom_image($nom_image) {
        $this->nom_image = $nom_image;
    }

    function setCaption_image($caption_image) {
        $this->caption_image = $caption_image;
    }
    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

        /*
     * @function getImages : une méthode qui retourne un tableau assossiatif d'images
     */
    public static function getImages() {
        $tabImages = array();
        $pdo = new PDOp;
        $link = $pdo->getPDO();
        //var_dump($link);
        if (1) {
            foreach ($link->query('SELECT * FROM images') as $image) {
                //Création d'un tableau associatif image=caption

                $tabImages[$image['id']]['caption'] = $image['caption_image'];
                $tabImages[$image['id']]['nom_image'] = $image['nom_image'];
                var_dump($tabImages);
                    $tabImages[$image['id']]['path'] = $image['nom_image'];
                    $tabImages[$image['id']]['idUser'] = $image['idUser'];
               
            }
            //var_dump($image);
        } else {
            return 'Rien dans la base ...';
        }
        return $tabImages; //Renvoi le tableau
    }

}
