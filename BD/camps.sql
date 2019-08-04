





CREATE TABLE arrondissements (
  id_arrondissement INT UNSIGNED AUTO_INCREMENT,
  nom_arrondissement varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_arrondissement)
)


CREATE TABLE camps_de_jour
(
    id_camp INT UNSIGNED AUTO_INCREMENT,
	nom_camp VARCHAR(50) NOT NULL,
	addresse VARCHAR(50) NOT NULL,
    lieu VARCHAR(30) NOT NULL,
    sit_web VARCHAR(30) NOT NULL,
    description MEDIUMTEXT NOT NULL,
    group_age VARCHAR(9) NOT NULL,
    prix INT NOT NULL,
    arrondissement_ref INT UNSIGNED,
    
	PRIMARY KEY(id_camp),
    FOREIGN KEY(arrondissement_ref) REFERENCES arrondissements(id_arrondissement)
	ON DELETE CASCADE
    ON UPDATE CASCADE
);


CREATE TABLE commentaires
(
	id_commentaire INT UNSIGNED AUTO_INCREMENT,
	adresse_courriel VARCHAR(20)  NOT NULL,
	commentaire MEDIUMTEXT NOT NULL,
	note INT UNSIGNED,
    camp_ref INT UNSIGNED,
	PRIMARY KEY(id_commentaire),
	FOREIGN KEY(camp_ref) REFERENCES camps_de_jour(id_camp)
	ON DELETE CASCADE
    ON UPDATE CASCADE
);


CREATE TABLE activite
(
	id_activite INT UNSIGNED AUTO_INCREMENT,
	nom_activite VARCHAR(20) NOT NULL,
	PRIMARY KEY(id_activite)
);
 

CREATE TABLE camp_activite
(
	camp_ref INT UNSIGNED,
	activite_ref INT UNSIGNED,
	PRIMARY KEY(camp_ref, activite_ref),
	FOREIGN KEY(camp_ref) REFERENCES camps_de_jour(id_camp)
	ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY(activite_ref) REFERENCES activite(id_activite)
	ON DELETE CASCADE
    ON UPDATE CASCADE
);




INSERT INTO `arrondissements` (`id_arrondissement`, `nom_arrondissement`) VALUES
(1, 'Ahuntsic-Cartierville'),
(2, 'Anjou'),
(3, 'Côte-des-Neiges–Notre-Dame-de-Grâce'),
(4, 'Lachine'),
(5, 'LaSalle'),
(6, 'L’Île-Bizard–Sainte-Geneviève'),
(7, 'Mercier–Hochelaga-Maisonneuve'),
(8, 'Montréal-Nord'),
(9, 'Outremont'),
(10, 'Pierrefonds-Roxboro'),
(11, 'Le Plateau-Mont-Royal'),
(12, 'Rivière-des-Prairies–Pointe-aux-Trembles'),
(13, 'Rosemont–La Petite-Patrie'),
(14, 'Saint-Laurent'),
(15, 'Saint-Léonard'),
(16, 'Le Sud-Ouest'),
(17, 'Verdun'),
(18, 'Ville-Marie'),
(19, 'Villeray–Saint-Michel–Parc-Extension');


INSERT  INTO camps_de_jour (id_camp, nom_camp, addresse, lieu, sit_web, description, group_age, prix, arrondissement_ref)
    VALUES 
    (1, "Loisirs de lAcadie de Montreal", '1405 Boul. Henri-Bourassa, Montréal, Qc H3M 3B2', 'Camp de jour l\'Acadie', 'http://loisirsdelacadie.ca/', 
     'Aenean sem libero, suscipit sit amet sapien et, sodales convallis nulla. Praesent in rhoncus nulla. Sed vulputate tempus sapien ultricies viverra. Integer et auctor ante. Curabitur ultricies finibus velit, id tincidunt lorem molestie sit amet. In et feugiat metus. Nullam pharetra magna id rutrum sagittis. Fusce at pharetra massa, a rhoncus nulla. Nullam vel sollicitudin mauris, eu faucibus metus. Donec varius pretium mi a aliquet', '5-6 ans', 75, 1),
    (2, "Loisirs Saints-Martyrs-Canadiens", '9485 rue Berri, Montréal, Qc, H2M 1R3', 'Camp de jour Saints-Martyrs-Canadiens', 'https://www.loisirsstsmartyrs.com/', 
     'Praesent euismod maximus placerat. Curabitur id accumsan nunc. Nulla euismod tortor vel enim cursus iaculis vel a lorem. Ut varius velit quis turpis gravida blandit. Nunc mattis ante eget placerat commodo. Pellentesque rhoncus ultrices condimentum. Fusce placerat mi tellus, quis consequat massa dapibus at.', '7-8 ans',70, 1),
    (3, 'Loisir Christ-Roi', '7652 rue Henri, Montréal, Qc, H2N 3O1', 'Camp de jour Henri-Julien', 'https://loisirschristroi.com/contact/', 
     'Maecenas mauris odio, fringilla ut malesuada facilisis, tincidunt vitae felis. Aliquam tincidunt eros in diam eleifend ultrices. Suspendisse a volutpat enim. Nulla rhoncus lectus sit amet magna pulvinar maximus.', '13-15 ans',65, 1),
    (4, "Madcdonald", '5389 rue Earnscliffe, Montreal, QC H3X 2P8', 'Camp de jour Macdonald', 'http://macdonalddaycamp.com/', 
     'Fusce et ultrices urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed quis mattis mauris. Nulla mollis odio vel dignissim aliquam. Sed vestibulum turpis quis quam lobortis, placerat auctor augue egestas. Sed tempus laoreet ullamcorper.', '9-10 ans', 60, 3),
    (5, "Loasirs Sportifs Côte-des-Neiges", '4880, avenue Van Horne, Montreal, H3W 1J3', 'Camp de jour Simonne-Monet', 'http://www.loisirssportifscdn-ndg.com/', 
     'Fusce quis ex auctor, bibendum felis eget, sollicitudin mi. Integer nec vestibulum est. Etiam id diam blandit, iaculis velit non, vulputate lectus. Nulla id dui vel turpis eleifend faucibus et in dui. Ut lacus sem, volutpat quis fermentum tempus, consequat a mauris. Integer purus lacus, auctor nec venenatis vitae, gravida eu ante.', '7-8 ans', 80, 3);
    

INSERT  INTO commentaires (id_commentaire, adresse_courriel, commentaire, note, camp_ref)
    VALUES 
    (1, "esther@gmail.com", "Pellentesque et magna vitae neque laoreet congue. Nunc venenatis bibendum elit ut bibendum.", 9, 5),
    (2, "alice@yahoo.com", "Fusce et ultrices urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.", 7, 2),
    (3, "helene@gmail.com", "Nulla id dui vel turpis eleifend faucibus et in dui. Ut lacus sem, volutpat quis fermentum tempus, consequat a mauris.", 8, 2),
    (4, "joseph@gmail.com", "Sed vestibulum augue tempor tellus porttitor volutpat. Vestibulum laoreet luctus tristique.", 9, 2),
    (5, "marie@yahoo.com", "Aliquam in tempus leo. Aliquam id orci finibus, eleifend est, mattis purus. Praesent euismod maximus. Curabitur id accumsan nunc", 10, 5),
    (6, "esther@gmail.com", "Curabitur ultricies finibus velit, id tincidunt lorem molestie sit amet.", 10, 3),
    (7, "helene@gmail.com", "Pellentesque et magna vitae neque laoreet congue. Nunc venenatis bibendum elit ut bibendum.", 9, 3),
    (8, "helene@gmail.com", "Fusce et ultrices urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.", 7, 3),
    (9, "helene@gmail.com", "Nulla id dui vel turpis eleifend faucibus et in dui. Ut lacus sem, volutpat quis fermentum tempus, consequat a mauris.", 8, 3),
    (10, "joseph@gmail.com", "Sed vestibulum augue tempor tellus porttitor volutpat. Vestibulum laoreet luctus tristique.", 9, 3),
    (11, "marie@yahoo.com", "Aliquam in tempus leo. Aliquam id orci finibus, eleifend est nec, mattis purus. Praesent maximus. Curabitur id accumsan nunc", 10, 3),
    (12, "esther@gmail.com", "Curabitur ultricies finibus velit, id tincidunt lorem molestie sit amet.", 5, 4),
    (13, "esther@gmail.com", "Pellentesque et magna vitae neque laoreet congue. Nunc venenatis bibendum elit ut bibendum.", 3, 4),
    (14, "joseph@gmail.com", "Fusce et ultrices urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.", 6, 4),
    (15, "joseph@gmail.com", "Nulla id dui vel turpis eleifend faucibus et in dui. Ut lacus sem, volutpat quis fermentum tempus, consequat a mauris.", 7, 4),
    (16, "joseph@gmail.com", "Sed vestibulum augue tempor tellus porttitor volutpat. Vestibulum laoreet luctus tristique.", 6, 4),
    (17, "marie@yahoo.com", "Aliquam in tempus leo. Aliquam id orci finibus, eleifend est, mattis purus. Praesent euismod maximus. Curabitur id accumsan nunc", 7, 4),
    (18, "esther@gmail.com", "Pellentesque et magna vitae neque laoreet congue. Nunc venenatis bibendum elit ut bibendum.", 9, 1),
    (19, "joseph@gmail.com", "Fusce et ultrices urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.", 7, 1),
    (20, "joseph@gmail.com", "Nulla id dui vel turpis eleifend faucibus et in dui. Ut lacus sem, volutpat quis fermentum tempus, consequat a mauris.", 8, 1);


INSERT  INTO activite (id_activite, nom_activite)
    VALUES 
    (1, "Jeux"),
    (2, "Baignade"),
    (3, "Pique-niques"),
    (4, "Sports collectifs"),
    (5, "Scientifiques"),
    (6, "Ateliers"),
    (7, "Loisirs"),
    (8, "Cuisiner");


INSERT  INTO camp_activite (camp_ref, activite_ref)
    VALUES 
    (1, 1),
    (1, 2),
    (1, 3),
    (2, 1),
    (2, 3),
    (2, 4),
    (2, 5),
    (3, 2),
    (3, 3),
    (3, 5),
    (3, 6),
    (3, 7),
    (4, 2),
    (4, 3),
    (4, 4),
    (4, 5),
    (4, 6),
    (5, 1),
    (5, 6),
    (5, 7),
    (5, 8);
 




