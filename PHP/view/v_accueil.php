<?php
/**
 * Nom: Garstea Roman
 * Groupe: 15628
 * Projet: Projet Web 1
 * Thématique : Camps de jour
 * REMISE: 02 02 2018
 */
?>

    <!------------------------------------------>
    <!-- ARTICLE -->
    <!------------------------------------------>
    <article>

        <!--Photo-->
<!--        <div class="publiciter_img"><img src="images/cdj.png"/></div>-->

        <!--Title-->
        <h1>List de camps de jour</h1>

        <!--Table-->
        <div class="tbl">
            <!--Table title-->
            <div class="tblRow trierRow">

                <!--1. colNr-->
                <div class="tblRow_colNr trierBckCol">
                    <div class="el_nr"></div>
                </div>

                <!--2. colDonnees-->
                <div class="tblRow_colDonnees">
                    <div class="tblRow_colDonnees_row height_donnees">
                        <div class="el_nom trier_hover" id="trierNom"><i class="fa fa-sort-desc trierPaddingNom" aria-hidden="true"></i></div>
                        <div class="el_age trier_hover" id="trierAge"><i class="fa fa-sort-desc" aria-hidden="true" ></i></div>
                        <div class="el_prix trier_hover" id="trierPrix"><i class="fa fa-sort-desc" aria-hidden="true"></i></div>
                    </div>
                </div>

                <!--3. colCote-->
                <div class="tblRow_colCote">
                    <div class="el_cote trier trier_hover" id="trierCote"><i class="fa fa-sort-desc" aria-hidden="true"></i></div>
                </div>

            </div>
            <!--Table ligne-->
            <div id="tblLigne">

                    <!--                                     -->
                    <!--        Insertion de la table        -->
                    <!--                                     -->

            </div>
        </div>

    </article>

    <!-------------------------------------------------------------------------------->
    <!-- JSON pour trier les données du côté client -->
    <!-------------------------------------------------------------------------------->
    <script>
        var camps = JSON.parse('<?php echo($s_campsJSON); ?>');
        var activites = JSON.parse('<?php echo($s_activitesJSON); ?>');
    </script>