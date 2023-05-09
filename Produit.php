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

    public function afficherProduit($file) {

        echo "<h2>liste produits</h2>";
    
        if (file_exists($file)) {
            $produits = unserialize(file_get_contents($file));
            
            if (!empty($produits)) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Nom</th><th>Prix</th><th>Date de préemption</th><th>Nom du fournisseur</th><th>Remise</th><th>Actions</th></tr>";
                foreach ($produits as $produit) {
                    $id = $produit->getIdProduit();
                    $nom = $produit->getNomProduit();
                    $prix = $produit->getPrixProduit();
                    $datePreemption = $produit->getDatePreemption();
                    $nomFournisseur = $produit->getNomFournisseur();
                    $remise = $produit->getRemise();
    
                    echo "<tr>";
                    echo "<td>$id</td><td>$nom</td><td>$prix</td><td>$datePreemption</td><td>$nomFournisseur</td><td>$remise%</td>";
                    echo "<td><a href='modifier.php?id=$id'><i class='fas fa-edit'></i></a> <a href='supprimer.php?id=$id'><i class='fas fa-trash'></i></a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Aucun produit</p>";
            }
        } else {
            echo "<p>Aucun fichier de produits trouvé</p>";
        }
    }
    

    //ajouter un produit
    public function ajouterProduit() {

        $sql = "INSERT INTO produits (nomProduit, prixProduit, datePreemption, nomFournisseur) 
                VALUES ('$this->nomProduit', $this->prixProduit, '$this->datePreemption', '$this->nomFournisseur')";

        if ($this->conn->query($sql) === TRUE)
            echo "produit ajouté";
        else
            echo "Erreur: " . $sql . "<br>" . $this->conn->error;
    }


    //modifier produit method
    public function modifierProduit($idProduit, $nomProduit, $prixProduit, $datePreemption, $nomFournisseur) {

        $sql = "UPDATE produits 
                SET nomProduit = '$nomProduit', prixProduit = $prixProduit, datePreemption = '$datePreemption', nomFournisseur = '$nomFournisseur' 
                WHERE idProduit = $idProduit";

        if ($this->conn->query($sql))
            echo "produit modifié";
        else
            echo "error: " . $sql . "<br>" . $this->conn->error;
    }

    public function __destruct() {
        $this->conn->close();
    }
}

