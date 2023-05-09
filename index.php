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
    <input type="submit" value="Ajouter le produit">
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
        require_once('app.php');

		$conn = new mysqli("localhost", "root", "", "gestion_achats");

        $result = $conn->query("SELECT * FROM produits");

        if ($result->num_rows > 0)
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['idProduit'] . '</td>';
                echo '<td>' . $row['nomProduit'] . '</td>';
                echo '<td>' . $row['prixProduit'] . '</td>';
                echo '<td>' . $row['datePreemption'] . '</td>';
                echo '<td>' . $row['nomFournisseur'] . '</td>';
                echo '</tr>';
            }

        $conn->close();
    ?>
</table>

</body>
</html>
