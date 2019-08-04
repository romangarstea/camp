








window.addEventListener("load", function(){

    //Création de table des camps des jour
    aff_table_camps();

    //Création des événements pour triage des données
    document.getElementById("trierNom").addEventListener("click",function () { trierNom(camps)});
    document.getElementById("trierAge").addEventListener("click",function () { trierAge(camps)});
    document.getElementById("trierPrix").addEventListener("click",function () { trierPrix(camps)});
    document.getElementById("trierCote").addEventListener("click",function () { trierCote(camps)});

}, false);



/**
 * Création de table des camps des jour
 * Injection du cod dans html
 */
function aff_table_camps() {
    var row = "";
    for (var i=0; i<camps.length; i++){
        row +=
            ' <div class="tblRow">\n' +
            '\n' +
            '            <!--1. colone Nr-->\n' +
            '            <div class="tblRow_colNr ' + change_couleurDuFond(camps[i]["cote"]) +'">\n' +
            '            </div>\n' +
            '\n' +
            '            <!--2. colone Donnees-->\n' +
            '            <div class="tblRow_colDonnees">\n' +
            '                <!--2.1 -->\n' +
            '                <div class="tblRow_colDonnees_row">\n' +
            '                    <div class="el_nom"><a href="index.php?action=commentaires_lire&id_camp='+ camps[i]["id_camp"] +'">' + camps[i]["nom_camp"] + '</a></div>\n' +
            '                    <div class="el_age">' + camps[i]["group_age"] + '</div>\n' +
            '                    <div class="el_prix">' + camps[i]["prix"] + '$' + '</div>\n' +
            '                </div>\n' +
            '                <!--2.2 -->\n' +
            '                <div class="tblRow_colDonnees_row">\n' +
            '                    <div class="el_arrondissement">' + camps[i]["nom_arrondissement"] + '</div>\n' +
            '                </div>\n' +
            '                <!--2.3 -->\n' +
            '                <div class="tblRow_colDonnees_row">\n' +
            '                    <div class="el_activites">'+ concatene_activites(camps[i]["id_camp"]) +'</div>\n' +
            '                </div>\n' +
            '            </div>\n' +
            '\n' +
            '            <!--3. colone Cote-->\n' +
            '            <div class="tblRow_colCote">\n' +
            '                <div class="el_cote">' + (Math.round(10*camps[i]["cote"]))/10 + '</div>\n' +
            '            </div>\n' +
            '\n' +
            '            </div>'
    }
    document.getElementById("tblLigne").innerHTML = row;
}


/**
 * Concatène tous les activités d'un camps
 * @param camp_id {number}
 * @returns {string}
 */
function concatene_activites(camp_id){
    var chaine_activites = "";
    for (var i=0; i<activites.length; i++){
        if ( activites[i]["camp_ref"] == camp_id ){
            if ( i==0 | chaine_activites == "" ){
                chaine_activites+= activites[i]["nom_activite"];
            }
            else{
                chaine_activites+= " | " + activites[i]["nom_activite"];
            }
        }
    }
    return chaine_activites;
}



/**
 * Change le couleur du fond dépendamment du cote
 * @param coteIn {number}
 * @returns {string}
 */
function change_couleurDuFond(coteIn){
    var cote = parseFloat(coteIn);
    var aStyle_bckColor = ["colFondVert", "colFondJeun", "colFondRouge"];
    if (cote>=9){
        return aStyle_bckColor[0];
    }
    if (cote<9 & cote>=7 ){
        return aStyle_bckColor[1];
    }
    if(cote<8){
        return aStyle_bckColor[2];
    }
}



/**
 * Triage des données
 * @param data {array} donnees pour table camps de jour qui sont trier
 */
function trierNom (data){
    if ( data[0].nom_camp > data[data.length-1].nom_camp)
    {
        data.sort(function(a,b){
            var a = a.nom_camp.toLowerCase();
            var b = b.nom_camp.toLowerCase();
            if (a<b)
                return -1;
            if (a>b)
                return 1;
            return 0;
        });
        aff_table_camps();
    }
    else
    {
        data.sort(function(a,b){
            var a = a.nom_camp.toLowerCase();
            var b = b.nom_camp.toLowerCase();
            if (a<b)
                return 1;
            if (a>b)
                return -1;
            return 0;
        });
        aff_table_camps();
    }
}
// https://developer.mozilla.org/ru/docs/Web/JavaScript/Reference/Global_Objects/parseInt
function trierAge(data){
    if ( parseInt(data[0].group_age,10) > parseInt(data[data.length-1].group_age,10))
    {
        data.sort(function(a,b){
            var a = parseInt(a.group_age,10);
            var b = parseInt(b.group_age,10);
            if (a<b)
                return -1;
            if (a>b)
                return 1;
            return 0;
        });
        aff_table_camps();
    }
    else
    {
        data.sort(function(a,b){
            var a = parseInt(a.group_age,10);
            var b = parseInt(b.group_age,10);
            if (a<b)
                return 1;
            if (a>b)
                return -1;
            return 0;
        });
        aff_table_camps();
    }
}

function trierPrix (data){
    if ( data[0].prix > data[data.length-1].prix)
    {
        data.sort(function(a,b){
            var a = a.prix;
            var b = b.prix;
            if (a<b)
                return -1;
            if (a>b)
                return 1;
            return 0;
        });
        aff_table_camps();
    }
    else
    {
        data.sort(function(a,b){
            var a = a.prix;
            var b = b.prix;
            if (a<b)
                return 1;
            if (a>b)
                return -1;
            return 0;
        });
        aff_table_camps();
    }
}

function trierCote (data){
    if ( data[0].cote > data[data.length-1].cote)
    {
        data.sort(function(a,b){
            var a = a.cote;
            var b = b.cote;
            if (a<b)
                return -1;
            if (a>b)
                return 1;
            return 0;
        });
        aff_table_camps();
    }
    else
    {
        data.sort(function(a,b){
            var a = a.cote;
            var b = b.cote;
            if (a<b)
                return 1;
            if (a>b)
                return -1;
            return 0;
        });
        aff_table_camps();
    }
}























