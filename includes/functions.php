<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
* Etablissement de la connexion à la base de données
*/

function createLinkBDD (){
	$link = mysqli_connect('localhost', USER_BDD, MDP_BDD , BDD);

	/* Vérification de la connexion */
	if (mysqli_connect_errno()) {
	    printf("Échec de la connexion : %s\n", mysqli_connect_error());
	    exit();
	}
	return $link;
}

function closeBDD($link) {
    
    /* Fermeture de la connexion */
    mysqli_close($link);

}

function createImage($fileImage,$captionImage) {
    
        //récupération de l'extension du fichier
        /*
         * strrchr — Trouve la dernière occurrence d'un caractère dans une chaîne, ici le . 
         * la fonction va renvoyer .extension ex : .png
         * substr — Retourne un segment de chaîne, dans .extenstion on va partir du 
         * premier caractère (1) jusqu'à la fin de la chaine (pas de paramère)
         * strtolower - Renvoie une chaîne en minuscules
         */
        
        //Extensions autorisées
        $tabExtensions = array('jpg','png', 'gif');
    
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $realType = finfo_file($finfo, $fileImage['tmp_name']);
        
        $extensionFichier = mb_strtolower(mb_substr(mb_strrchr($realType,'/'),1));
        if(!in_array($extensionFichier, $tabExtensions) ) {

            return 'Extension non valide';
        }
    
        $real_path = md5($fileImage['name'].time());
    
        $uploadResult = move_uploaded_file($fileImage['tmp_name'], 
               __DIR__.DIRECTORY_SEPARATOR.'img/'.$fileImage['name']
                );
        
        if(!$uploadResult) {
            return 'Problème lors de l\'upload';
        }
        
	$linkBDD = createLinkBDD();
        // Création de la requête
	$reqImage = 'INSERT INTO images (nomImage,captionImage,real_path,created_on) ';
	$reqImage .= 'VALUES ("'.$fileImage['name'].'","'.$captionImage.'",';
        $reqImage .= '"'.$real_path.'.'.$extensionFichier.'", NOW() )';
        $resImages = mysqli_query($linkBDD, $reqImage);
        
        if(mysqli_errno($linkBDD) != 0) {
            closeBDD($linkBDD);
            return 'Problème insertion dans la base ...';
        }
        
        //echo $resImages;
	//echo $resImages;
}



/*
 * Fonction qui n'est plus utilisée 
 */

function createfigure($lienimage,$commentaire) {
    $string = '';
    $string .= '<figure>';
    $string .= '<div class="blocimg">';
    $string .= '<img src="'.DIR_IMG.'/'.$lienimage.'" alt="'.$lienimage.'">';
    $string .= '</div>';
    $string .= '<figcaption>'.$commentaire.'</figcaption>';
    $string .= '</figure>';
    return $string;
}