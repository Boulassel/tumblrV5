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


    public function Ajout_Img_BDD($name, $caption)
    {
        try // on tente la connexion
        {
            $oPDO = new PDO('mysql:host=localhost;dbname=twitr', 'root', '');
        }
        catch(PDOException $ex) //si ça ne marche pas on affiche l'erreur
        {
            echo '</br>';
            echo "Echec lors de la connexion à mysql : (".$ex->getCode().")" ;
            echo $ex->getMessage();
            exit();
        }
           

        $req_image = 'INSERT INTO images (nomImage,captionImage) ';
        $req_image .= 'VALUES ("'.$name.'","'.$caption.'",';
        
        try
        {
            $data = $oPDO->prepare($req_image);    
            $data->execute();
            echo "image enregistrée avec succès ! WAZZAAAAAA"
        }
        catch(PDOException $ex) //si ça ne marche pas on affiche l'erreur
        {
            echo '</br>';
            echo "Echec lors de l'insertion dans la base : (".$ex->getCode().")" ;
            echo $ex->getMessage();
            exit();
        }

    }


    public function getAllImg()
    {

        try // on tente la connexion
        {
            $oPDO = new PDO('mysql:host=localhost;dbname=twitr', 'root', '');
        }
        catch(PDOException $ex) //si ça ne marche pas on affiche l'erreur
        {
            echo '</br>';
            echo "Echec lors de la connexion à mysql : (".$ex->getCode().")" ;
            echo $ex->getMessage();
            exit();
        }

        $tab_images = array();
        $req_images = 'SELECT * FROM images';
        
        $data = $oPDO->prepare($req_image);    
        $data->execute();
        $result= $data->fetchAll(PDO::FETCH_BOTH);

        if(!is_object($result))
        {
            return 'n\'est pas un objet valide';
        }   

        if (fbsql_rows_fetched($resImages) > 0) 
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
               
        return $tab_images; //Renvoi le tableau
    }


    public getOneImg($id)
    {

    }


// try // on tente la connexion
//     {
//         $oPDO = new PDO('mysql:host=localhost;dbname=twitr', 'root', '');
//     }
//     catch(PDOException $ex) //si ça ne marche pas on affiche l'erreur
//     {
//         echo '</br>';
//         echo "Echec lors de la connexion à mysql : (".$ex->getCode().")" ;
//         echo $ex->getMessage();
//         exit();
//     }

    // $data2 = $oPDO->prepare($query2);    
    //                 $data2->execute();

    //                 $result2= $data2->fetchAll(PDO::FETCH_BOTH);
}
