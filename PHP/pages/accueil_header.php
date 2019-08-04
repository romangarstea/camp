<?php

//initialisation des variables pour création de formulaire dynamique
$tabPrix = array("Prix", ".....-50$", "50$-60$", "60$-70$", "70$-80$", "80$-...");
$tabCote = array("Cote min.", "6.0*", "7.0*", "8.0*", "9.0*");
$tabGroupDage = array("Groupe d'âge", "5-6 ans", "7-8 ans", "9-10 ans", "11-12 ans", "13-15 ans");
$tabActivites = array("", "", "", "", "", "", "", "");

$tabArrondissement = array( "Tous Arrondissements",
                            "Ahuntsic-Cartierville",
                            "Anjou",
                            "Côte-des-Neiges–Notre-Dame-de-Grâce",
                            "Lachine",
                            "LaSalle",
                            "L’Île-Bizard–Sainte-Geneviève",
                            "Mercier–Hochelaga-Maisonneuve",
                            "Montréal-Nord",
                            "Outremont",
                            "Pierrefonds-Roxboro",
                            "Le Plateau-Mont-Royal",
                            "Rivière-des-Prairies–Pointe-aux-Trembles",
                            "Rosemont–La Petite-Patrie",
                            "Saint-Laurent",
                            "Saint-Léonard",
                            "Le Sud-Ouest",
                            "Verdun",
                            "Ville-Marie",
                            "Villeray–Saint-Michel–Parc-Extension");



?>

<!DOCTYPE html>

<!--Nom: Garstea Roman-->
<!--Groupe: 15628-->
<!--Projet: Projet Web 1-->
<!--Thématique : Camps de jour-->
<!--REMISE: 02 02 2018-->

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CampsDeJourMontréal</title>

    <!--Style-->
    <link rel="stylesheet" href="styles/main.css">
    <!--Font-->
    <link rel="stylesheet" href="styles/font-awesome.min.css">
    <!--Scripts-->
    <script src="scripts/table_camps.js"></script>

</head>
<body>
<section>


    <!------------------------------------------>
    <!-- HEADER -->
    <!------------------------------------------>
    <header>
        <!--Ligne red-->
        <div class="ligne"></div>
        <!--LOGO-->
        <div class="logo"><a href="index.php"><img class="logo_img" src="images/logo.png" height="154" width="564"/></a></div>
        <!--Ilustration-->
        <div class="header_img"><img src="images/enfents.jpg" height="131" width="992"/></div>
        <!--Form-->
        <form action="index.php" method="post">
            <div class="form_box">
                <!--col 1 debut-->
                <div class="form_box_col">
                    <!--row 1 -->
                    <div class="form_box_col_row">
                        <div class="select_box">


                            <!-------->
                            <!--Prix-->
                            <!-------->
                            <select name="prix">
                                <?php
                                $i=0;
                                foreach($tabPrix as $prix)
                                {
                                    if(isset($_POST["prix"]) && $_POST["prix"] == $i)
                                        echo "<option value='$i' selected>$prix</option>";
                                    else
                                        echo "<option value='$i'>$prix</option>";
                                    $i++;
                                }
                                ?>
<!--                                <option value="0">Prix</option>-->
<!--                                <option value="1">.....-50$</option>-->
<!--                                <option value="2" selected>50$-60$</option>-->
<!--                                <option value="3">60$-70$</option>-->
<!--                                <option value="4">70$-80$</option>-->
<!--                                <option value="5">80$-...</option>-->
                            </select>


                            <!-------->
                            <!--Cote-->
                            <!-------->
                            <select name="cote">
                                <?php
                                $e=0;
                                foreach($tabCote as $cote)
                                {
                                    if(isset($_POST["cote"]) && $_POST["cote"] == $e)
                                        echo "<option value='$e' selected>$cote</option>";
                                    else
                                        echo "<option value='$e'>$cote</option>";
                                    $e++;
                                }
                                ?>
<!--                                <option value="0">Cote min.</option>-->
<!--                                <option value="1">6.0*</option>-->
<!--                                <option value="2">7.0*</option>-->
<!--                                <option value="3">8.0*</option>-->
<!--                                <option value="4">9.0*</option>-->

                            </select>


                            <!--------------->
                            <!--Group d'age-->
                            <!--------------->
                            <select name="group_dage">
                                <?php
                                $q=0;
                                foreach($tabGroupDage as $group_dage)
                                {
                                    if(isset($_POST["group_dage"]) && $_POST["group_dage"] == $q)
                                        echo "<option value='$q' selected>$group_dage</option>";
                                    else
                                        echo "<option value='$q'>$group_dage</option>";
                                    $q++;
                                }
                                ?>
<!--                                <option value="0">Groupe d'âge</option>-->
<!--                                <option value="1">5-6 ans</option>-->
<!--                                <option value="2">7-8 ans</option>-->
<!--                                <option value="3">9-10 ans</option>-->
<!--                                <option value="4">11-12 ans</option>-->
<!--                                <option value="5">13-15 ans</option>-->
                            </select>


                        </div>
                    </div>
                    <!--row 2 -->
                    <div class="form_box_col_row">


                        <!------------->
                        <!--Activites-->
                        <!------------->
                        <div class="checkbox_box">
                            <?php
                            if ( !empty($_POST["activites"]) ){
                                $post_array = $_POST["activites"];
                                for ($p=1; $p<count($tabActivites)+1; $p++){
                                    for ($l=0; $l<count($post_array); $l++){
                                        if( $p == $post_array[$l]){
                                            $tabActivites[$p-1] = "checked";
                                        }
                                    }
                                }
                            }

                            echo "<label class=\"container\">Jeux>        <input type=\"checkbox\" name=\"activites[]\" value=\"1\" $tabActivites[0]><span class=\"checkmark\"></span></label>";
                            echo "<label class=\"container\">Baignade     <input type=\"checkbox\" name=\"activites[]\" value=\"2\" $tabActivites[1]><span class=\"checkmark\"></span></label>";
                            echo "<label class=\"container\">Pique-niques <input type=\"checkbox\" name=\"activites[]\" value=\"3\" $tabActivites[2]><span class=\"checkmark\"></span></label>";
                            echo "<label class=\"container\">Sports       <input type=\"checkbox\" name=\"activites[]\" value=\"4\" $tabActivites[3]><span class=\"checkmark\"></span></label>";

                            ?>
<!--                            <label class="container">Jeux         <input type="checkbox" name="activites[]" value="1"><span class="checkmark"></span></label>-->
<!--                            <label class="container">Baignade     <input type="checkbox" name="activites[]" value="2"><span class="checkmark"></span></label>-->
<!--                            <label class="container">Pique-niques <input type="checkbox" name="activites[]" value="3"><span class="checkmark"></span></label>-->
<!--                            <label class="container">Sports       <input type="checkbox" name="activites[]" value="4"><span class="checkmark"></span></label>-->
                        </div>


                    </div>
                    <!--row 3 -->
                    <div class="form_box_col_row">


                        <!-------->
                        <!--Activites-->
                        <!-------->
                        <div class="checkbox_box">

                            <?php
                            echo "<label class=\"container\">Scientifiques<input type=\"checkbox\" name=\"activites[]\" value=\"5\" $tabActivites[4]><span class=\"checkmark\"></span></label>";
                            echo "<label class=\"container\">Ateliers     <input type=\"checkbox\" name=\"activites[]\" value=\"6\" $tabActivites[5]><span class=\"checkmark\"></span></label>";
                            echo "<label class=\"container\">Loisirs      <input type=\"checkbox\" name=\"activites[]\" value=\"7\" $tabActivites[6]><span class=\"checkmark\"></span></label>";
                            echo "<label class=\"container\">Cuisiner     <input type=\"checkbox\" name=\"activites[]\" value=\"8\" $tabActivites[7]><span class=\"checkmark\"></span></label>";
                            ?>
<!--                            <label class="container">Scientifiques<input type="checkbox" name="activites[]" value="5"><span class="checkmark"></span></label>-->
<!--                            <label class="container">Ateliers     <input type="checkbox" name="activites[]" value="6"><span class="checkmark"></span></label>-->
<!--                            <label class="container">Loisirs      <input type="checkbox" name="activites[]" value="7"><span class="checkmark"></span></label>-->
<!--                            <label class="container">Cuisiner     <input type="checkbox" name="activites[]" value="8"><span class="checkmark"></span></label>-->
                        </div>


                    </div>
                </div>
                <!--col 1 fin-->

                <!--col 2 debut-->
                <div class="form_box_col">
                    <!--row 1 -->
                    <div class="form_box_col_row">


                        <!------------------>
                        <!--Arrondissement-->
                        <!------------------>
                        <select name="arrondissement" size="5" class="select_arrondissement">
                            <?php
                            $w=0;
                            foreach($tabArrondissement as $arrondissement)
                            {
                                if(isset($_POST["arrondissement"]) && $_POST["arrondissement"] == $w)
                                    echo "<option value='$w' selected>$arrondissement</option>";
                                else
                                    echo "<option value='$w'>$arrondissement</option>";
                                $w++;
                            }
                            ?>
<!--                            <option value="0">Tous Arrondissements</option>-->
<!--                            <option value="1">Ahuntsic-Cartierville</option>-->
<!--                            <option value="2">Anjou</option>-->
<!--                            <option value="3">Côte-des-Neiges–Notre-Dame-de-Grâce</option>-->
<!--                            <option value="4">Lachine</option>-->
<!--                            <option value="5">LaSalle</option>-->
<!--                            <option value="6">L’Île-Bizard–Sainte-Geneviève</option>-->
<!--                            <option value="7">Mercier–Hochelaga-Maisonneuve</option>-->
<!--                            <option value="8">Montréal-Nord</option>-->
<!--                            <option value="9">Outremont</option>-->
<!--                            <option value="10">Pierrefonds-Roxboro</option>-->
<!--                            <option value="11">Le Plateau-Mont-Royal</option>-->
<!--                            <option value="12">Rivière-des-Prairies–Pointe-aux-Trembles</option>-->
<!--                            <option value="13">Rosemont–La Petite-Patrie</option>-->
<!--                            <option value="14">Saint-Laurent</option>-->
<!--                            <option value="15">Saint-Léonard</option>-->
<!--                            <option value="16">Le Sud-Ouest</option>-->
<!--                            <option value="17">Verdun</option>-->
<!--                            <option value="18">Ville-Marie</option>-->
<!--                            <option value="19">Villeray–Saint-Michel–Parc-Extension</option>-->
                        </select>


                    </div>
                    <!--row 2 -->
                    <div class="form_box_col_row">
                        <div class="form_box_submit">


                            <!---------->
                            <!--Submit-->
                            <!---------->
                            <input type="submit" value="Filtrer">
                            <input type="hidden" name="action" value="accueil">


                        </div>
                    </div>
                </div>
                <!--col 2 fin-->
            </div>
            <!--form_box fin-->
        </form>
    </header>

















