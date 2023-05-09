<?php
    require_once('./Produit.php');
    require_once('./ProduitSold.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des achats</title>
</head>
<body>

<h1>Gestion des achats</h1>

<h2>Ajouter un produit</h2>

<form method="post" action='./app.php'>
    <label>Nom du produit : </label>
    <input type="text" name="nomProduit" required><br><br>
    <label>Prix du produit : </label>
    <input type="number" name="prixProduit" required><br><br>
    <label>Date de péremption : </label>
    <input type="date" name="datePreemption" required><br><br>
    <label>Nom du fournisseur : </label>
    <input type="text" name="nomFournisseur" required><br><br>
    <input type="submit" value="Ajouter">
</form>

<h2>Liste des produits</h2>

<table>
    <tr>
        <th>Produit ID</th>
        <th>Nom du produit</th>
        <th>Prix du produit</th>
        <th>Date de péremption</th>
        <th>Nom du fournisseur</th>
    </tr>
    <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $produit = new Produit($_POST['nomProduit'], $_POST['prixProduit'], $_POST['datePreemption'], $_POST['nomFournisseur']);
            $produit->ajouterProduit('produits.txt');
        }

        Produit::afficherProduits('produits.txt');
    ?>
</table>

</body>
</html>
