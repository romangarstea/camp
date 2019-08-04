<?php
/**
 * Nom: Garstea Roman
 * Groupe: 15628
 * Projet: Projet Web 1
 * Thématique : Camps de jour
 * REMISE: 02 02 2018
 */



require_once("model/m_function_bd.php");
if(isset($_REQUEST["action"]))
    $action = $_REQUEST["action"];
else
    $action = "accueil";


switch($action){
    case "accueil":

        require_once("pages/accueil_header.php");

        require_once("model/m_requete_pageAccueil.php");
        // Donnees pour affiche des camps
        $s_campsJSON = transformer_a_JSON(get_BD(creationReq_pageAccueil("camps")));
        $s_activitesJSON = transformer_a_JSON(get_BD(creationReq_pageAccueil("activites")));

        require_once("view/v_accueil.php");
        require_once("pages/footer.php");
        break;

    case "commentaires_lire":

        require_once("pages/commentaires_header.php");

        require_once("model/m_requete_pageComm.php");
        // 1. Donnees pour affichage d'information d'un camp
        $o_camp = get_BD(creationReq_pageComm_lecture("camp"));
        $a_camp = mysqli_fetch_assoc($o_camp);
        $o_activites = get_BD(creationReq_pageComm_lecture("activites"));
        $s_activites = activites_a_chaine($o_activites);

        // 2. Donnees pour affichage des commentaires
        $o_commentaires = get_BD(creationReq_pageComm_lecture("commentaires"));

        require_once("view/v_commentaires.php");
        require_once("pages/footer.php");
        break;

    case "commentaire_ecriture":

        // 3. Ecriture: d'un commentaire
        require_once("model/m_requete_pageComm.php");
        get_BD(creationReq_pageComm_ecriture());
        header('Location: index.php?action=commentaires_lire&id_camp=' . $_POST["id_camp"] );
        break;

    default:
        break;
}