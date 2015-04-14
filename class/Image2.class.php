<?php

/**
 * Description of Image2
 *
 * @author samirboulassel
 */
include './PDO.class.php';
class Image2 {

    private $id;
    private $nom_image;
    private $caption_image; //

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

    function getImages() {
        $tabImages = array();
	$linkBDD = new p;
	$reqImages = 'SELECT * FROM images';
	$resImages = mysqli_query($linkBDD, $reqImages);
        
        if(!is_object($resImages)){
            return 'n\'est pas un objet valide';
        }    
        
        if (mysqli_num_rows($resImages) > 0) {

            /* Récupère un tableau associatif */
            while ($image = mysqli_fetch_assoc($resImages)) {

                //Création d'un tableau associatif image=caption
                
                $tabImages[$image['idImage']]['caption'] = $image['captionImage'];
                $tabImages[$image['idImage']]['nomImage'] = $image['nomImage'];

                if(empty($image['real_path'])) {
                    $tabImages[$image['idImage']]['path'] = $image['nomImage'];
                } else {
                    $tabImages[$image['idImage']]['path'] = $image['real_path'];
                }
                
             
            }

        } else {
            return 'Rien dans la base ...';
        }
	closeBDD($linkBDD);
                
        return $tabImages; //Renvoi le tableau
}
}
