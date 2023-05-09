<?php

class Produit {
    protected $idProduit;
    protected $nomProduit;
    protected $prixProduit;
    protected $datePreemption;
    protected $nomFournisseur;
    protected $conn;

    public function __construct($nomProduit, $prixProduit, $datePreemption, $nomFournisseur) {
        $this->nomProduit = $nomProduit;
        $this->prixProduit = $prixProduit;
        $this->datePreemption = $datePreemption;
        $this->nomFournisseur = $nomFournisseur;
        $this->conn = new mysqli("localhost", "root", "", "gestion_achats");
    }

    //ajouter un produit
    public function ajouter_produit() {
        $sql = "INSERT INTO produits (nomProduit, prixProduit, datePreemption, nomFournisseur) 
                VALUES ('$this->nomProduit', $this->prixProduit, '$this->datePreemption', '$this->nomFournisseur')";

        if ($this->conn->query($sql) === TRUE)
            echo "Produit ajouté avec succes";
        else
            echo "Erreur: " . $sql . "<br>" . $this->conn->error;
    }


    //modifier produit method
    public function modifier_produit($idProduit, $nomProduit, $prixProduit, $datePreemption, $nomFournisseur) {

        $sql = "UPDATE produits 
                SET nomProduit = '$nomProduit', prixProduit = $prixProduit, datePreemption = '$datePreemption', nomFournisseur = '$nomFournisseur' 
                WHERE idProduit = $idProduit";

        if ($this->conn->query($sql))
            echo "Produit modifié avec succès";
        else
            echo "Erreur: " . $sql . "<br>" . $this->conn->error;
    }

    // close the connection when the object is destroyed
    public function __destruct() {
        $this->conn->close();
    }
}
