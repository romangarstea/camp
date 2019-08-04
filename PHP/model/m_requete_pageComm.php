<?php
/**
 * Nom: Garstea Roman
 * Groupe: 15628
 * Projet: Projet Web 1
 * Thématique : Camps de jour
 * REMISE: 02 02 2018
 */






/**
 * S’utilise pour création des requetés simple dans la page des commentaires
 * @param $req {string} reçoit ou "camps" ou "activites" ou "commentaires"
 * @return string
 */
function creationReq_pageComm_lecture($req){


    //------------------------------------------------
    // Requetes
    //------------------------------------------------
    $camp = " SELECT  id_camp, nom_camp, arrondissements.nom_arrondissement, sit_web,
					  arrondissements.id_arrondissement, group_age, prix, note.cote, addresse, 
					  description, lieu
              FROM    camps_de_jour 
              JOIN    arrondissements ON camps_de_jour.arrondissement_ref = arrondissements.id_arrondissement 
              JOIN    (SELECT camp_ref, AVG(note) AS cote
					   FROM commentaires
					   WHERE id_commentaire IN (SELECT MAX(id_commentaire) 
				     							FROM commentaires 
				     							GROUP BY adresse_courriel, camp_ref) 
					   GROUP BY camp_ref) AS note ON camps_de_jour.id_camp = note.camp_ref               
                       WHERE id_camp = ";

    $activites = " SELECT  camp_ref, activite_ref, activite.nom_activite
                   FROM    camp_activite
                   JOIN    activite ON camp_activite.activite_ref = activite.id_activite
                   WHERE   camp_ref = ";

    $commentaires = "   SELECT   commentaire, note, adresse_courriel
                        FROM     commentaires 
                        WHERE   camp_ref = ";

    $aRequetes = array("camp"=>$camp, "activites"=>$activites, "commentaires"=>$commentaires);


    //------------------------------------------------
    // Retourn requete requis
    //------------------------------------------------
    if ( isset($_GET["id_camp"])){
        return  $aRequetes[$req] . $_GET["id_camp"];
    }
}



/**
 * S’utilise pour création des requetés simple pour écriture de commentaire
 * @return string
 */
function creationReq_pageComm_ecriture(){

    if ( isset($_POST["email"]) && $_POST["commentaire"] && $_POST["note"] && $_POST["id_camp"]){

        $req = 'INSERT  INTO commentaires (adresse_courriel, commentaire, note, camp_ref)
                VALUES  ("'.filtrer($_POST["email"]).'", "'.filtrer($_POST["commentaire"]). '", '.$_POST["note"]. ', '.$_POST["id_camp"].' )';

        return $req;
    }
}
