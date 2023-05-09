<?php


class ProduitSolde extends Produit {

    private $remise;
    
    
    public function __construct($nomProduit, $prixProduit, $datePreemption, $nomFournisseur, $remise) {
        parent::__construct($nomProduit, $prixProduit, $datePreemption, $nomFournisseur);
        $this->remise = $remise;
    }
    
    
    public function afficherProduit() {
        $pers = $this->remise * 100;
    
        $produit = parent::afficherProduit();
        return $produit . "pourcentage : $pers %";
    }
    
    
    public function modifierProduit($nomProduit, $prixProduit, $datePreemption, $nomFournisseur, $remise) {
    
        parent::modifierProduit($nomProduit, $prixProduit, $datePreemption, $nomFournisseur);
        $this->remise = $remise;
        echo "produit soldé modifié";
    
    }
    
    
    public function calculerRemise() {
    
        $prixRemise = $this->prixProduit - ($this->prixProduit * $this->remise / 100);
        echo "prix: {$this->nomProduit}, remise: {$this->remise}% = {$prixRemise}DHs<br>";
    
    }
    
    
    public function appliquerSolde($pr) {
    
        $now = new DateTime();
        $datePreemption = new DateTime($this->datePreemption);
    
        $diff = $now->diff($datePreemption);
        $nbMois = $diff->m + ($diff->y * 12);
    
        if ($nbMois < 6)
        {
            $this->remise = $pr;
            $this->prixProduit -= ($pr / 100) * $this->prixProduit;
            echo "remise: ".$pr."% prix: ".$this->prixProduit;
        }
        else
            echo "pas de remise";
    }
    
    }
    
    