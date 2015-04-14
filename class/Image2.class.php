<?php

/**
 * Description of Image2
 *
 * @author samirboulassel
 */
//include '../PDO.class.php';
class Image2 {

    private $id;
    private $nom_image;
    private $caption_image; //commentaire

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

    function setId($id) {
        $this->id = $id;
    }

    function setNom_image($nom_image) {
        $this->nom_image = $nom_image;
    }

    function setCaption_image($caption_image) {
        $this->caption_image = $caption_image;
    }

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

                if (empty($image['real_path'])) {
                    $tabImages[$image['id']]['path'] = $image['nom_image'];
                } else {
                    $tabImages[$image['id']]['path'] = $image['real_path'];
                }
            }
            var_dump($image);
        } else {
            return 'Rien dans la base ...';
        }
        return $tabImages; //Renvoi le tableau
    }

}
