<?php
require_once __DIR__ . '/../src/db.php';
require_once __DIR__ . '/../src/produits.php';

/* Traitement formulaire */
if (isset($_POST['add'])) {
    ajouterProduit($db, $_POST);
    $message = "Produit ajouté avec succès";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 3 - Application</title>
</head>
<body>

<h1>Mini application – Catalogue</h1>

<?php if (isset($message)) echo "<p style='color:green'>$message</p>"; ?>

<!-- Navigation par catégorie -->
<h2>Catalogue par catégorie</h2>

<form method="get">
    <select name="categorie">
        <option value="">-- choisir --</option>
        <option value="Pizzas">Pizzas</option>
        <option value="Boissons">Boissons</option>
        <option value="Salades">Salades</option>
        <option value="Desserts">Desserts</option>
    </select>
    <button type="submit">Afficher</button>
</form>

<?php
if (!empty($_GET['categorie'])) {
    $produits = getProduitsParCategorie($db, $_GET['categorie']);

    foreach ($produits as $p) {
        echo "<hr>";
        echo "<strong>{$p['libelle']}</strong><br>";
        echo "{$p['description']}<br>";

        if (isset($p['tarifs'])) {
            foreach ($p['tarifs'] as $t) {
                echo "- {$t['taille']} : {$t['tarif']} €<br>";
            }
        }
    }
}
?>

<!-- Ajout produit -->
<h2>Ajouter un produit</h2>

<form method="post">
    <input name="numero" placeholder="Numéro" required><br>
    <input name="libelle" placeholder="Libellé" required><br>
    <textarea name="description" placeholder="Description"></textarea><br>

    <select name="categorie">
        <option>Pizzas</option>
        <option>Boissons</option>
        <option>Salades</option>
        <option>Desserts</option>
    </select><br>

    <select name="taille">
        <option>grande</option>
        <option>normale</option>
    </select><br>

    <input name="tarif" type="number" step="0.01" placeholder="Tarif"><br>

    <button type="submit" name="add">Ajouter</button>
</form>

</body>
</html>
