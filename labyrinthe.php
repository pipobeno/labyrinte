<?php
session_start();
$tableau = [
    ["0", "0", "0", "0", "0", "1"],
    ["1", "1", "0", "1", "0", "0"],
    ["0", "0", "0", "1", "1", "1"],
    ["1", "0", "1", "0", "0", "0"],
    ["1", "0", "1", "0", "1", "S"],
    ["0", "0", "0", "0", "1", "0"],
];


if (empty($_SESSION["positionCat"])) {
    $_SESSION["positionCat"] = ["i" => 0, "j" => 0];
}
$tableau[$_SESSION["positionCat"]["i"]][$_SESSION["positionCat"]["j"]] = "C";
$positionCat = &$_SESSION["positionCat"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['move'])) {

        $tableau[$positionCat['i']][$positionCat['j']] = "0";



        switch ($_POST['move']) {
            case 'up':
                if ($positionCat['i'] > 0 && $tableau[$positionCat['i'] - 1][$positionCat['j']] !== "1") {
                    $positionCat['i']--;
                }
                break;
            case 'down':
                if ($positionCat['i'] < count($tableau) - 1 && $tableau[$positionCat['i'] + 1][$positionCat['j']] !== "1") {
                    $positionCat['i']++;
                }
                break;
            case 'left':
                if ($positionCat['j'] > 0 && $tableau[$positionCat['i']][$positionCat['j'] - 1] !== "1") {
                    $positionCat['j']--;
                }
                break;
            case 'right':
                if ($positionCat['j'] < count($tableau[0]) - 1 && $tableau[$positionCat['i']][$positionCat['j'] + 1] !== "1") {
                    $positionCat['j']++;
                }
                break;
        }
        if ($tableau[$positionCat['i']][$positionCat['j']] === "S") {
            echo "<p>BRAVO VOUS AVEZ GAGNÉ !</p>";
        }

        $tableau[$positionCat['i']][$positionCat['j']] = "C";
    }
}

$tableHtml = '<table border="1" style="border-collapse: collapse;">';

foreach ($tableau as $row) {
    $tableHtml .= '<tr>';
    foreach ($row as $cell) {
        $style = 'width: 80px; height: 80px; text-align: center; background-color: pink;';

        if ($cell === "C") {
            $tableHtml .= '<td style="' . $style . '"><img src="assets/images/chat.png" alt="Chat" style="width: 60%;"></td>';
        } elseif ($cell === "S") {
            $tableHtml .= '<td style="' . $style . '"><img src="assets/images/souris.png" alt="Souris" style="width: 60%;"></td>';
        } elseif ($cell === "0") {
            $tableHtml .= '<td style="' . $style . '">&nbsp;</td>';
        } elseif ($cell === "1") {
            $tableHtml .= '<td style="width: 80px; height: 80px; text-align: center; background-color: #4b2d00;">&nbsp;</td>';
        } else {
            $tableHtml .= '<td style="width: 80px; height: 80px; text-align: center;">' . $cell . '</td>';
        }
    }
    $tableHtml .= '</tr>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/laby.css">
    <title>Labyrinthe</title>
</head>

<body>
    <header>
        <h1>Labyrinthe</h1>
        <p>Vous contrôlez un chat qui doit se déplacer dans un labyrinthe jusqu’à trouver la souris</p>
    </header>
    <main>
        <form action="" method="POST">
            <?php echo $tableHtml; ?>
            <div class="grid-controls">
                <button type="submit" name="move" value="up">
                    <img src="assets/images/haut.svg" alt="haut">
                </button>
                <button type="submit" name="move" value="left">
                    <img src="assets/images/gauche.svg" alt="gauche">
                </button>
                <button type="submit" name="move" value="down">
                    <img src="assets/images/bas.svg" alt="bas">
                </button>
                <button type="submit" name="move" value="right">
                    <img src="assets/images/droite.svg" alt="droite">
                </button>
            </div>
        </form>

    </main>
    <footer></footer>
</body>

</html>