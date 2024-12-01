<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header></header>
    <main>
        <form action="" method="POST">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom"><br>
            <label for="nom">Nom</label>
            <input type="text" id="nom"><br>
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email"><br>
            <label for="password">Mot de passe</label>
            <input type="text" id="password">
            <button type="submit" >Envoyer</button>
        </form>
    </main>
    <footer></footer>
</body>
</html>


<?php
if (isset($_POST['prenom'])) {
    echo (htmlspecialchars($_POST['prenom']));
}

if (isset($_POST['nom'])) {
    echo (htmlspecialchars($_POST['nom']));
}

if (isset($_POST['email'])) {
    echo (htmlspecialchars($_POST['email']));
}

if (isset($_POST['password'])) {
    echo (htmlspecialchars($_POST['password']));
}
?>


<?php
// $couleur = "";
// $vals = [];

// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     if (!empty($_POST["couleur"])) {
//         $couleur = $_POST["couleur"];
//  // Validation : vérifier si la couleur est un hexadécimal valide (6 caractères 0-9, A-F)
//         if (preg_match('/^[0-9a-fA-F]{6}$/', $couleur)) {
//             echo color_mkwebsafe($couleur);
//         } else {
//             echo "<p>Veuillez entrer une couleur hexadécimale valide (6 caractères entre 0-9 et A-F)</p>";
//         }
//     } else {
//         echo "<p>Veuillez entrer une couleur hexadécimale</p>";
//     }
// }

// function color_mkwebsafe($in)
// {
//     global $vals;
//     $vals['r'] = hexdec(substr($in, 0, 2));
//     $vals['g'] = hexdec(substr($in, 2, 2));
//     $vals['b'] = hexdec(substr($in, 4, 2));
// }
// ?>

<!-- 
// <!DOCTYPE html>
// <html lang="en">

// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>Color Picker</title>
// </head>

// <body style="background-color: <?php echo htmlspecialchars($couleur); ?>;">

//     <main>
//         <section>
//             <h1>Color picker</h1>
//             <form action="" method="POST">
//                 <div>
//                     <label for="couleur">Ajouter une couleur hexadécimale :</label>
//                     <input type="text" name="couleur" value="<?php echo htmlspecialchars($couleur); ?>"
//                         placeholder="000000">
//                 </div>
//                 <div>
//                     <button type="submit">Enregistrer</button>
//                 </div>
//                 <div>
//                     <p>Le RGB ici : 
//                     <?php
//                     if (!empty($vals)) {
//                         echo "(". $vals['r'] . ")(" . $vals['g'] . ")(" . $vals['b'] . ")";
//                     } else {
//                         echo "<p>Valeurs non définies</p>";
//                     }
//                     ?>
//                     </p>
//                 </div>
//             </form>
//         </section>
//     </main>

// </body>

// </html> -->