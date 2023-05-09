<?php

require_once('Produit.class.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomProduit = $_POST['nomProduit'];
    $prixProduit = $_POST['prixProduit'];
    $datePreemption = $_POST['datePreemption'];
    $nomFournisseur = $_POST['nomFournisseur'];

    $produit = new Produit($nomProduit, $prixProduit, $datePreemption, $nomFournisseur);
    $produit->enregistrer_produit();
}
 