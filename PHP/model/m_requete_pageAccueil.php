<?php
/**
 * Nom: Garstea Roman
 * Groupe: 15628
 * Projet: Projet Web 1
 * Thématique : Camps de jour
 * REMISE: 02 02 2018
 */






/**
 * S’utilise pour création des requetés simple ou dynamique dans la page d'accueil
 * @param $req {string} reçoit ou "camps" ou "activites"
 * @return {string}
 */
function creationReq_pageAccueil($req="camps"){

    $plusieurs_filtres = false;

    //------------------------------------------------
    // Requete de base
    //------------------------------------------------
    $camps = "SELECT  id_camp, nom_camp, arrondissements.nom_arrondissement, 
					    arrondissements.id_arrondissement, group_age, prix, note.cote 
                FROM    camps_de_jour 
                JOIN    arrondissements ON camps_de_jour.arrondissement_ref = arrondissements.id_arrondissement 
                JOIN    ( SELECT camp_ref, AVG(note) AS cote
					      FROM commentaires
					      WHERE id_commentaire IN ( SELECT MAX(id_commentaire) 
				                                    FROM commentaires 
				                                    GROUP BY adresse_courriel, camp_ref) 
					      GROUP BY camp_ref) AS note ON camps_de_jour.id_camp = note.camp_ref ";

    $activites = "SELECT  camp_ref, activite_ref, activite.nom_activite
                  FROM    camp_activite
                  JOIN    activite ON camp_activite.activite_ref = activite.id_activite ";

    //------------------------------------------------
    // Retourn requete pour activites
    //------------------------------------------------
    if ( $req == "activites"){
        return $activites;
    }

    //------------------------------------------------
    // Retourn requete pour camps (plusieurs filtres)
    //------------------------------------------------
    if ( $req == "camps" && $_SERVER['REQUEST_METHOD'] == 'POST'){

        //Cote
        if ( isset($_POST["cote"]) && $_POST["cote"] != 0 ){

            $cote=0;
            switch ($_POST["cote"]){
                case "1":
                    $cote=6;
                    break;
                case "2":
                    $cote=7;
                    break;
                case "3":
                    $cote=8;
                    break;
                case "4":
                    $cote=9;
                    break;
                default:
                    $cote=9;
                    break;
            }

            $camps =' SELECT id_camp, nom_camp, arrondissements.nom_arrondissement, 
					      arrondissements.id_arrondissement, group_age, prix, note.cote 
                    FROM camps_de_jour 
                    JOIN arrondissements ON camps_de_jour.arrondissement_ref = arrondissements.id_arrondissement 
                    JOIN      (SELECT camp_ref, AVG(note) AS cote
					          FROM commentaires
					          WHERE id_commentaire IN (SELECT MAX(id_commentaire) 
				     		  FROM commentaires 
				     		  GROUP BY adresse_courriel, camp_ref) 
					          GROUP BY camp_ref
						      HAVING AVG(note)>' . $cote . ') 
						      AS note ON camps_de_jour.id_camp = note.camp_ref';
        }

        //Arrondissement
        if ( isset($_POST["arrondissement"]) && $_POST["arrondissement"] != 0 ){
            $camps = $camps .  ' WHERE camps_de_jour.arrondissement_ref ='. $_POST["arrondissement"];
            $plusieurs_filtres = true;
        }

        //Group d'age
        if ( isset($_POST["group_dage"]) && $_POST["group_dage"] != 0 ){
            $group_dage = "";

            switch ($_POST["group_dage"]){
                case "1":
                    $group_dage = "5-6 ans";
                    break;
                case "2":
                    $group_dage = "7-8 ans";
                    break;
                case "3":
                    $group_dage = "9-10 ans";
                    break;
                case "4":
                    $group_dage = "11-12 ans";
                    break;
                case "5":
                    $group_dage = "13-15 ans";
                    break;
                default:
                    break;
            }

            if ( $plusieurs_filtres ){
                $camps = $camps .  ' AND group_age ='.'"'. $group_dage. '"';
            }
            else{
                $camps = $camps .  ' WHERE group_age ='.'"'. $group_dage. '"';
                $plusieurs_filtres = true;
            }
        }

        //Prix
        if ( isset($_POST["prix"]) && $_POST["prix"] != 0 ){

            $prix1=0;
            $prix2=0;

            switch ($_POST["prix"]){
                case "1":
                    $prix1=0;
                    $prix2=50;
                    break;
                case "2":
                    $prix1=50;
                    $prix2=60;
                    break;
                case "3":
                    $prix1=60;
                    $prix2=70;
                    break;
                case "4":
                    $prix1=70;
                    $prix2=80;
                    break;
                case "5":
                    $prix1=80;
                    $prix2=100;
                    break;
                default:
                    $prix1=0;
                    $prix2=100;
                    break;
            }

            if ( $plusieurs_filtres ){
                $camps = $camps . ' AND prix BETWEEN '. $prix1 . ' AND ' . $prix2 ;
            }
            else{
                $camps = $camps . ' WHERE prix BETWEEN '. $prix1 . ' AND ' . $prix2 ;
                $plusieurs_filtres = true;
            }
        }

        //Activite(s)  aide: https://stackoverflow.com/questions/14781270/post-checkbox-value
        if ( !empty($_POST["activites"]) ){

            $array_activites = $_POST["activites"];
            $chaine_activites="";
            for ($i=0; $i<count($array_activites); $i++){
                if ( $i == 0){
                    $chaine_activites = $array_activites[$i];
                }
                else{
                    $chaine_activites = $chaine_activites . ", " . $array_activites[$i];
                }
            }


            if ( $plusieurs_filtres ){
                $camps = $camps . ' AND camps_de_jour.id_camp IN (SELECT camp_ref FROM camp_activite 
			                    WHERE activite_ref IN ('. $chaine_activites .')
			                    GROUP BY camp_ref
			                    HAVING COUNT(camp_ref) = ' . count($array_activites) . ')';
            }
            else{
                $camps = $camps . ' WHERE camps_de_jour.id_camp IN (SELECT camp_ref FROM camp_activite 
			                    WHERE activite_ref IN ('. $chaine_activites .')
			                    GROUP BY camp_ref
			                    HAVING COUNT(camp_ref) = ' . count($array_activites) . ')';
                $plusieurs_filtres = true;
            }
        }

        return $camps;
    }

    //------------------------------------------------
    // Retourn requete pour camps (sans filtres)
    //------------------------------------------------
    else{
        return $camps;
    }
}



