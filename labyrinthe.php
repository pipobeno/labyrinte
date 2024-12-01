<?php
session_start();
$tableau = [
    ["0", "0", "0", "0", "0", "S"],
    ["0", "0", "0", "0", "0", "0"],
    ["0", "0", "0", "0", "0", "0"],
    ["0", "0", "1", "0", "0", "0"],
    ["0", "0", "0", "0", "0", "0"],
    ["1", "1", "1", "1", "1", "1"],
];
print_r($_SESSION ["positionCat"]);
if (empty ($_SESSION["positionCat"])) {
    $_SESSION["positionCat"] = ["i" => 0, "j" => 0];
}
$tableau[$_SESSION["positionCat"]["i"]][$_SESSION["positionCat"]["j"]]= "C";
$positionCat = &$_SESSION["positionCat"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['move'])) {

        $tableau[$positionCat['i']][$positionCat['j']] = "0";



        switch ($_POST['move']) {
            case 'up':
                if ($positionCat['i'] > 0) {
                    $positionCat['i']--;
                }
                break;
            case 'down':
                if ($positionCat['i'] < count($tableau) - 1) {
                    $positionCat['i']++;
                }
                break;
            case 'left':
                if ($positionCat['j'] > 0) {
                    $positionCat['j']--;
                }
                break;
            case 'right':
                if ($positionCat['j'] < count($tableau[0]) - 1) {
                    $positionCat['j']++;
                }
                break;
        }
        

        $tableau[$positionCat['i']][$positionCat['j']] = "C";
    }
}

$tableHtml = '<table border="1" style="border-collapse: collapse;">';

foreach ($tableau as $row) {
    $tableHtml .= '<tr>';
    foreach ($row as $cell) {
        $style = 'width: 50px; height: 50px; text-align: center;';

        if ($cell === "C") {
            $tableHtml .= '<td style="' . $style . '"><img src="assets/images/chat.png" alt="Chat" style="width: 100%; height: 100%;"></td>';
        } elseif ($cell === "S") {
            $tableHtml .= '<td style="' . $style . '"><img src="assets/images/souris.png" alt="Souris" style="width: 100%; height: 100%;"></td>';
        } elseif ($cell === "0") {
            $tableHtml .= '<td style="' . $style . ' background-color: pink;">0</td>';
        } elseif ($cell === "1") {
            $tableHtml .= '<td style="' . $style . ' background-color: blue; color: white;">1</td>';
        } else {
            $tableHtml .= '<td style="' . $style . '">' . $cell . '</td>';
        }
    }
    $tableHtml .= '</tr>';
}
$tableHtml .= '</table>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <button type="submit" name="move" value="up">Haut</button>
            <button type="submit" name="move" value="down">Bas</button>
            <button type="submit" name="move" value="left">Gauche</button>
            <button type="submit" name="move" value="right">Droite</button>
        </form>
    </main>
    <footer></footer>
</body>

</html>