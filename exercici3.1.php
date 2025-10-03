<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactes Explode</title>
</head>
<body>
    <h1>PROCESSA CONTACTES</h1>

    <?php
    $entrada = "contactes31.txt";
    $sortida = "contactes31b.txt";

    // Comprovar si existeix l'arxiu d'entrada
    if (!file_exists($entrada)) {
        die("<p style='color:red;'>No s'ha trobat l'arxiu <strong>$entrada</strong>.</p>");
    }

    // Llegir línies
    $linies = file($entrada, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Nom</th><th>Cognom1</th><th>Cognom2</th><th>Telèfon</th></tr>";

    $liniesSortida = [];

    foreach ($linies as $linia) {
        $dades = explode(",", $linia);

        // Afegir valors buits si falten
        while (count($dades) < 4) $dades[] = "";

        list($nom, $cognom1, $cognom2, $telefon) = $dades;

        echo "<tr>
                <td>$nom</td>
                <td>$cognom1</td>
                <td>$cognom2</td>
                <td>$telefon</td>
              </tr>";

        $liniesSortida[] = implode("#", $dades);
    }

    echo "</table>";

    // Escriure arxiu de sortida
    file_put_contents($sortida, implode("\n", $liniesSortida));

    echo "<p>S'ha creat l'arxiu <strong>$sortida</strong> amb ".count($liniesSortida)." contactes.</p>";
    ?>
</body>
</html>
