<!DOCTYPE html>
<html>
    <head>
        <title>Ceci est une page de test avec des balises PHP</title>
        <meta charset="utf-8" />
    </head>
    <body>
       <?php
        include 'header.php'
      ?>



        <h2>Page de test</h2>

        <p>
            Cette page contient du code HTML avec des balises PHP.<br />
            <?php /* Insérer du code PHP ici */ ?>
            Voici quelques petits tests :
        </p>

        <ul>
        <li style="color: blue;">Texte en bleu</li>
        <li style="color: red;">Texte en rouge</li>
        <li style="color: green;">Texte en vert</li>
        </ul>

        <?php
        include 'db.php';
        ?>





        <a href="inscription.php"> Inscription </a>
        <p>
        </p>
        <a href="connexion.php"> connexion </a>

        <?php
        include 'footer.php'
        ?>

    </body>
</html>
