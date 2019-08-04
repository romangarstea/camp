<?php
/**
 * Nom: Garstea Roman
 * Groupe: 15628
 * Projet: Projet Web 1
 * Thématique : Camps de jour
 * REMISE: 02 02 2018
 *
 *
 *
 *
 *
 *
 * Affichage de information
 * ------------------------
 * $a_camp["nom_camp"]
 * $a_camp["group_age"]
 * $a_camp["prix"]
 * $a_camp["cote"]  (round(($a_camp["cote"]*10)))/10
 *
 * $s_activites
 *
 * $a_camp["nom_arrondissement"]
 * $a_camp["lieu"]
 * $a_camp["addresse"]
 * $a_camp["sit_web"]
 * $a_camp["description"]
 *
 *
 *
 * Affichage des commentaires
 * --------------------------
 * changer_couleurDuFond(note) -> dépendamment de note
 *
 * $a_commentaire["adresse_courriel"]
 * $a_commentaire["commentaire"]
 * $a_commentaire["note"]
 *
 *
 *
 * Ajouter un commentaire
 * ----------------------
 * $a_camp["id_camp"]
 *
 *
 */
?>



<!------------------------------------------>
<!-- ARTICLE -->
<!------------------------------------------>
<article>




    <!---------------------------->
    <!--Affichage d'information-->
    <!---------------------------->
    <div class="inf">
        <div class="infRow"><h1><?php echo $a_camp["nom_camp"]; ?></h1></div>
        <div class="infRow mb_20 mt_m10">
            <div class="inf_elAgePrixCote">Age<span class="ml_5"><?php echo $a_camp["group_age"]; ?></span></div>
            <div class="inf_elAgePrixCote">Prix<span class="ml_5"><?php echo $a_camp["prix"]; ?></span></div>
            <div class="inf_elAgePrixCote">Cote<span class="ml_5"><?php echo (round(($a_camp["cote"]*10)))/10; ?><i class="fa fa-star ml_5" aria-hidden="true"></i></span></div>
        </div>
        <div class="infRow">
            <div class="inf_elNom">Activite(s)</div>
            <div class="inf_elValeur"><?php echo $s_activites; ?></div>
        </div>
        <div class="infRow">
            <div class="inf_elNom">Arrondissement</div>
            <div class="inf_elValeur"><?php echo $a_camp["nom_arrondissement"]; ?></div>
        </div>
        <div class="infRow">
            <div class="inf_elNom">Lieu</div>
            <div class="inf_elValeur"><?php echo $a_camp["lieu"]; ?></div>
        </div>
        <div class="infRow">
            <div class="inf_elNom">Adresse</div>
            <div class="inf_elValeur"><?php echo $a_camp["addresse"]; ?></div>
        </div>
        <div class="infRow">
            <div class="inf_elNom">Sit Web</div>
            <div class="inf_elValeur mb_50"><a href="<?php echo $a_camp["sit_web"]; ?>"><?php echo $a_camp["sit_web"]; ?></a></div>
        </div>
        <div class="infRow"><img src="images/<?php echo $a_camp["id_camp"]; ?>.jpg" height="130" width="880"/></div>
        <div class="infRow_txt"><p><?php echo $a_camp["description"]; ?></p></div>
    </div>




    <!------------------------------>
    <!--Affichage des commentaires-->
    <!------------------------------>
    <div class="com">
        <div class="comRow"><h2>Commentaires</h2></div>

        <?php
        while($a_commentaire = mysqli_fetch_assoc($o_commentaires)) {
            ?>

            <div class="comRow">
                <div class="com_colCouleaur <?php echo changer_couleurDuFond($a_commentaire["note"]); ?> "></div>
                <div class="com_colTxt">
                    <div class="com_elMail"> <?php echo $a_commentaire["adresse_courriel"]; ?> </div>
                    <div class="com_elTxt">  <?php echo $a_commentaire["commentaire"]; ?></div>
                    <div class="com_elNote">Note: <span class="txt_Rouge"><?php echo $a_commentaire["note"]; ?></span></div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>





    <!-------------------------->
    <!--Ajouter un commentaire-->
    <!-------------------------->
    <div class="comAjouter">
        <form name="form_comAjouter" action="index.php" onsubmit="return validateForm()" method="POST">
            <div class="comAjouter_row"><h2>Ajouter un commentaire</h2></div>
            <div class="comAjouter_row">
                <input type="email" name="email" maxlength="35" placeholder="email@mail.com" required>
            </div>
            <div class="comAjouter_row">
                <textarea  name="commentaire" placeholder="Commentaire" required></textarea>
            </div>
            <div class="comAjouter_row">
                <input type="text" name="note" placeholder="Note" required>
                <input type="submit" value="Ajouter">
                <input type="hidden" name="action" value="commentaire_ecriture">
                <input type="hidden" name="id_camp" value="<?php echo $a_camp["id_camp"] ?>">
            </div>
        </form>
    </div>




</article>