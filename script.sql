CREATE Database Nikon;

CREATE TABLE Clients
(
    mail VARCHAR(50),
    prenom VARCHAR(50),
    nom VARCHAR(50),
    mdp VARCHAR(255),
    PRIMARY KEY (mail)
);

CREATE TABLE Produits
(
    id INT AUTO_INCREMENT,
    nom VARCHAR (100),
    prix FLOAT,
    presentation VARCHAR (255),
    image VARCHAR (100),
    description VARCHAR(1000),
    PRIMARY KEY(id)
);

CREATE TABLE Panier (
    id INT AUTO_INCREMENT,
    qte INT,
    mail VARCHAR (50),
    FOREIGN KEY (mail) REFERENCES Clients (mail),
    FOREIGN KEY (id) REFERENCES Produits (id)
);

CREATE TABLE Messages (
    prenom VARCHAR(50),
    nom VARCHAR(50),
    mail VARCHAR(50),
    sujet VARCHAR(100),
    msg VARCHAR(300)
);

INSERT INTO Produits
        (id, nom, presentation, prix, image, description)
VALUES
            (1, "Nikon D5", "Conçu pour la vidéo et la photo", 6299.00, "images/d5.jpg", "Surmontez les obstacles et photographiez au-delà du visible grâce à la puissance et à la précision du D5.
            Intégrant le système Nikon AF 153 points de nouvelle génération, le D5 est votre partenaire idéal, que vous souhaitiez immortaliser les concurrents d’une course ou des stars sur un tapis rouge. 
            Il offre une très large couverture et sa nouvelle mémoire tampon vous permet de photographier jusqu’à 200 images au format NEF (RAW) lors d’une seule prise de vue en rafale. 
            Les tout nouveaux capteurs d’image et de mesure offrent une détection des sujets et un niveau de détail d’une précision incroyable. Grâce à la plage de sensibilités la plus étendue jamais proposée par Nikon, vous pouvez désormais photographier dans toutes les conditions d'éclairage (du plein soleil au crépuscule astronomique).)"),
            (2, "Nikon d500", "La souplesse du format DX", 1799.00, "images/d500.jpg", "Doté du même système AF que le D5, l'appareil de référence au format FX de Nikon, le D500 permet
            d'effectuer des mises au point d'une extrême précision, même lorsqu'il fait très sombre.
            Avec 153 points AF dont 99 capteurs en croix, ce système AF exceptionnel offre une
            couverture ultra-large couvrant pratiquement la largeur totale du cadre du viseur.
            La sensibilité de l'AF, qui atteint -4 IL dans la zone centrale et -3 IL (100 ISO, 20 °C) dans les autres,
            garantit des performances incroyables dans des conditions de faible luminosité.
            Vous pouvez désormais suivre les petits sujets qui se déplacent à grande vitesse avec un degré de
            précision supplémentaire, et les sujets situés sur les bords de l'image sont facilement détectés.
            Le système est configurable en 153, 72 ou 25 points en mode AF continu."),
            (3, "Nikon d7500", "De nouvelles perspectives", 1099.00, "images/d7500.jpg", "Ici. Ou là. Dans l’obscurité ou en pleine lumière. Le plus beau cliché de votre vie est à portée de main.
            Capteur DX de 20,9 millions de pixels. EXPEED 5. Capteur de mesure RVB 180 000 photosites.
            Le D7500 permet d'obtenir des images haute définition nettes avec des dégradés riches.
            Vous apprécierez la détection des sujets d’une précision incroyable et les performances exceptionnelles à
            des sensibilités élevées. Vous serez ébloui par la qualité des séquences vidéo 4K/UHD. Grâce au système
            Picture Control intégré, créez et appliquez votre propre style en toute simplicité, que ce soit pour des
            photos ou des vidéos."),
            (4, "Nikon AF-S NIKKOR 20mm f/1.8G ED", "Objectif ultra grand-angle le plus rapide", 829.00, "images/lens1.jpg", "
            Objectif lumineux au format FX avec focale fixe ultra grand-angle 20 mm et grande ouverture maximale de
            f/1.8. Idéal pour les photographes créatifs qui souhaitent accentuer les perspectives.
            Doté d’optiques de qualité supérieure, cet objectif compact, léger et polyvalent convient
            parfaitement aux scènes d’intérieur, à la photographie urbaine et aux reportages, aux vastes paysages, aux
            scènes sous-marines et aux vidéos immersives.
            Grâce à l’ouverture maximale lumineuse de f/1.8, la profondeur de champ est faible, le flou
            d’arrière-plan (« bokeh ») est subtil et les prises de vue en faible luminosité sont claires. L’optique de
            qualité supérieure garantit une netteté parfaite sur tout le champ et une distorsion minimale."),
            (5, "AF-P NIKKOR 70-300mm f/4.5-5.6E ED VR", "Un téléobjectif doté de la mise au point la plus rapide qui soit", 679.00, "images/lens2.jpg", "Sports, nature, voyages... Que vous saisissiez l'expression du vainqueur ou des oiseaux en vol,
            ce téléobjectif au format FX offre une mise au point rapide qui vous aidera à réaliser des photos et des
            films exceptionnels.
            Sa plage de focales de 70 à 300 mm (105 à 450 mm lorsqu'il est utilisé avec un reflex Nikon
            au format DX) vous place au cœur de l'action.
            Grâce à une distance minimale de mise au point de 1,2 m sur toute la plage de focales et à un rapport de
            reproduction maximal de 0,25x, vous êtes au plus près de votre sujet et remplissez le cadre.
            Le système de mise au point interne (IF) empêche la lentille frontale de pivoter pendant la mise au point,
            une fonction pratique si vous utilisez un filtre."),
            (6, "AF-S DX Micro NIKKOR 40mm f/2.8G", "Approchez-vous encore plus près que vous ne l'auriez imaginé", 299.00, "images/lens3.jpg", "Avec la macrophotographie, vous pouvez saisir ce qui vous fascine le plus de manière ludique
            et unique.
            L’objectif AF-S DX Micro NIKKOR 40mm f/2.8G offre une résolution et un contraste élevés de l’infini à la
            grandeur nature (rapport de reproduction 1:1),
            pour vous permettre de vous rapprocher au plus près de vos sujets. Faites le test avec un pétale de fleur,
            l’œil d’un insecte ou les petits orteils d’un nouveau-né.
            Plongez dans les plus petits détails de la vie."),
            (7, "Filtre polarisant circulaire II 62 mm", "Réduit considérablement les reflets produits par l’eau et les vitres", 138.00, "images/filter_polarisant.png", "Réduit considérablement les reflets produits par l’eau et les vitres, et obscurcit le rendu des ciels
            bleus. Améliore également l’aspect des ciels bleus.
            Ce filtre permet de photographier à travers des fenêtres vitrées et réduit les reflets produits par les
            surfaces réfléchissantes telles que l’eau et les vitres.
            Compatible aussi bien avec la photographie couleur que monochrome.
            Disponible en diamètres 52/58/62/67/72/77 mm."),
            (8, "Filtre Soft Focus 62 mm", "Contribue à réduire la lumière parasite et l’image fantôme", 44.90, "images/filtre_neutre.png", "Confère à vos images un léger effet de flou doux de toute beauté.
            Adapté aux portraits et tout autres prises de vue.
            Disponible en diamètres 52/62/67/72/77 mm."),
            (9, "Filtre couleur neutre 62 mm", "Contribue à réduire la lumière parasite et l’image fantôme", 84.36, "images/filtre_soft.png", "Filtre multicouche neutre (NC) qui contribue à réduire la lumière parasite et l’image fantôme tout en
            protégeant la surface de la lentille des intempéries.</p>
            Le traitement multicouche diminue les reflets internes et améliore le rendu des couleurs.</p>
            Ce filtre protège l’objectif sans affecter l’équilibre colorimétrique.</p>
            Disponible en diamètres 52/58/62/72/77 mm."),
            (10, "Accumulateur EN-EL12", "Accumulateur de grande capacité pour un fonctionnement longue durée", 44.99, "images/accu.png", "Accumulateur lithium-ion compact de grande capacité pour un fonctionnement longue durée.</p>
            Pour en savoir plus sur la compatibilité de cet accessoire avec d'autres produits Nikon, reportez-vous à
            la section « Produits associés » ci-dessous."),
            (11, "Flash SB-5000", "Maîtrisez l'art de l'éclairage avec le premier flash radiocommandé SB-5000", 659.00, "images/flash.png", "Rapide, fiable et polyvalent, le SB-5000 offre des performances d’éclairage inégalées, que
            ce soit sur le terrain ou en studio.
            Les signaux radio d'une portée de 30 m et les configurations complexes de flashes principal et asservis
            vous permettent de travailler dans n'importe quelles conditions,
            même en présence d’obstacles ou lorsque le signal optique risque d'être affaibli par la luminosité du
            soleil.
            Le nouveau système de refroidissement intégré permet de prendre plus de 100 clichés en rafale avec le
            flash fonctionnant à pleine puissance.
            Les commandes épurées du flash SB-5000 offrent un fonctionnement intuitif aux photographes qui ont pour
            mission de capter l'intensité du moment en une fraction de seconde."),
            (12, "Parasoleil HB-64", "Parasoleil à baïonnette, qui réduit la lumière parasite (flare)", 38.90, "images/parasoleil.png", "Parasoleil à baïonnette, qui réduit la lumière parasite (flare).");
