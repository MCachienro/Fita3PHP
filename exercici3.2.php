<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari separat</title>
</head>
<body>
    <h1>FORMULARI AMB SEPARADOR</h1>

    <form method="POST">
        <p>
            <label for="comentari">Comentari:</label><br>
            <textarea name="comentari" id="comentari" rows="4" cols="40"></textarea>
        </p>
        <p>
            <label for="separador">Separador:</label><br>
            <input type="text" name="separador" id="separador">
        </p>
        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_POST) {
        $comentari = trim($_POST['comentari'] ?? "");
        $sep = trim($_POST['separador'] ?? "");

        if ($comentari === "" || $sep === "") {
            echo "<p style='color:red;'>Cal escriure un comentari i un separador.</p>";
        } else {
            $processat = str_replace(" ", $sep, $comentari);
            $fitxer = "comentaris.txt";

            if (file_put_contents($fitxer, $processat . "\n", FILE_APPEND)) {
                echo "<p style='color:green;'>Comentari desat a <strong>$fitxer</strong>.</p>";
            } else {
                echo "<p style='color:red;'>No s'ha pogut desar el comentari.</p>";
            }
        }
    }
    ?>
</body>
</html>
