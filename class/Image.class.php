<?php
/**
 * Description of Image
 *
 * @author samirboulassel
 */
class Image 
{
    public $nom;
    public $chemin;
    public $id;
    public $caption

    public function __Construct($name, $dir, $id, $caption)
    {
        $this -> nom = $nom;
        $this -> chemin = $dir
        $this -> id = $id;
        $this -> caption = $caption;           
    }

    

    // les set
    public setNomImg($new_nom)
    {
        $this -> nom_image = $new_nom;
    }
    public setCheminImg($new_chemin)
    {
        $this -> chemin_image = $new_chemin;
    }
    public setNomImg($new_id)
    {
        $this -> id_image = $new_id;
    }


    public Ajout_Img_BDD($name, $caption)
    {
        $req_image = 'INSERT INTO images (nomImage,captionImage) ';
        $req_image .= 'VALUES ("'.$name.'","'.$caption.'",';
        

        try
        {
            $linkBDD = createLinkBDD();
            $resultat = mysqli_query($linkBDD, $req_image);
        }
        catch 
        {
            echo "erreur dans l'insertion ou la connexion de l'image dans la base";
        }

    }


    public getAllImg()
    {
        $tab_images = array();
        $linkBDD = createLinkBDD();
        $req_images = 'SELECT * FROM images';
        $resultat = mysqli_query($linkBDD, $req_images);

        if(!is_object($resultat))
        {
            return 'n\'est pas un objet valide';
        }   

        if (mysqli_num_rows($resImages) > 0) 
        {

            /* Récupère un tableau associatif */
            while ($image = mysqli_fetch_assoc($resImages)) 
            {

                //Création d'un tableau associatif image=caption                
                $tab_images[$image['idImage']]['caption'] = $image['captionImage'];
                $tab_images[$image['idImage']]['nomImage'] = $image['nomImage'];
            }
        } 
        else 
        {
            return 'Rien dans la base ...';
        }
        closeBDD($linkBDD);
                
        return $tab_images; //Renvoi le tableau
    }


    public getOneImg($id)
    {

    }

}
