<?php
/**
 * Nom: Garstea Roman
 * Groupe: 15628
 * Projet: Projet Web 1
 * Thématique : Camps de jour
 * REMISE: 02 02 2018
 */






$connexion = connexionBD();



/**
 * établit le connexion à la base de données
 * @return mysqli {objet}
 */
function connexionBD()
{
    $c = mysqli_connect("ro2000master59896.ipagemysql.com", "ro2000master_", "AhLchenal", "camp");
    if(!$c)
        trigger_error("Erreur de connexion : " . mysqli_connect_error());

    mysqli_query($c, "SET NAMES 'utf8'");
    return $c;
}



/**
 * C’utilise pour reçoit le données de la base de données
 * @param $requete {string} - requete
 * @return bool|mysqli_result {bool/objet}
 */
function get_BD ($requete){
    //-------------------------------------------------------------------------------------
    // 1. Requete
    //-------------------------------------------------------------------------------------
    global $connexion;
    $donnees_req = mysqli_query($connexion, $requete);

    return $donnees_req;
}



/**
 * Transforme le résultat de requête en JSON
 * @param $mysqli_result {objet} résultat de requête a la bd
 * @return {string} - JSON
 */
function transformer_a_JSON($mysqli_result){

    //-------------------------------------------------------------------------------------
    // 1. donnees -> JSON
    // https://stackoverflow.com/questions/383631/json-encode-mysql-results
    //-------------------------------------------------------------------------------------
    $rows = array();
    while($r = mysqli_fetch_assoc($mysqli_result)) {
        $rows[] = $r;
    }
    $donneesJSON = json_encode($rows);


    //-------------------------------------------------------------------------------------
    // 2. return -> JSON
    //-------------------------------------------------------------------------------------
    return $donneesJSON;
}



/**
 * Concatène tous activités dans un chaine
 * @param $mysqli_result {objet} résultat de requête a la bd
 * @return {string}
 */
function activites_a_chaine($activites){

    $chaine_activites = "";
    $count=0;
    while($rangee = mysqli_fetch_assoc($activites))
    {
        if ($count==0){
            $chaine_activites = $rangee["nom_activite"];
            $count++;
        }
        else{
            $chaine_activites = $chaine_activites . ' | ' . $rangee["nom_activite"];
        }
    }
    return $chaine_activites;
}



/**
 *  S’utilise pour changer le couleur du fond dépendamment de la note
 *  @param  {number} note d'un commentaire
 *  @return {string} return le nom d'un class css
 */
function changer_couleurDuFond($note){
    $bckCouleur = array("bckCouleurVert", "bckCouleurJeune", "bckCouleurRouge" );
    if ($note>=9){
        return $bckCouleur[0];
    }

    if ($note<9 && $note>=7){
        return $bckCouleur[1];
    }

    if ($note<7){
        return $bckCouleur[2];
    }
}



/**
 * Enlever toutes les balises HTML et des scripts qui peut être infiltré dans un requête
 * @param $req {string} - requete
 * @return {string}
 */
function filtrer($req)
{
    global $connexion;

    // mysqli_real_escape_string() fonction qui ne permet pas d'exécuter des scripts
    $varFiltre = mysqli_real_escape_string($connexion, $req);

    // strip_tags() fonction pour enlever toutes les balises HTML
    $varFiltre = strip_tags($varFiltre);

    return $varFiltre;
}