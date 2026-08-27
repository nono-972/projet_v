<?php

class VoitureRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAll(): array
    {
        $sql = "
            SELECT 
                voiture.id,
                voiture.nom,
                voiture.puissance,
                voiture.prix,
                voiture.marque_id
            FROM voiture;
        ";

        //   this->pdo représente la connexion actuelle : on applique dessus la methode query()  qui va lancer la requête et je récupère le résultat de ce traitement dans la variable $stmt. $stmt représente donc un objet PDOStatement : ca regroupe la requête et son résultat
            $stmt = $this->pdo->query($sql);

            // En l'état $stmt n'est pas exploitable :on va le manipuler pour en faire un tableau qui contiendra des objets de type Voiture (grâce à la classe Voiture)

        $voitures = [];

        // var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
        // La méthode fetch

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $voitures[] = new Voiture(
                $row["id"],
                $row["nom"],
                $row["puissance"],
                $row["prix"],
                $row["marque_id"],
                );
        }
        return $voitures;
    }

    public function findById(int $id)
    {
        $sql = "SELECT * FROM voiture WHERE id=:id;";
        $stmt = $this ->pdo->prepare($sql);
        $stmt->execute([
            "id" => $id,
        ]);

        $row =$stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }

     $voiture = new Voiture(
        $row["id"],
        $row["nom"],
        $row["puissance"],
        $row["prix"],
        $row["marque_id"],
        ); 
        return $voiture;
    }

    public function findByMarqueId(int $marqueId): array
    {
        $sql = "
            SELECT * FROM voiture WHERE voiture.marque_id = :marqueId;
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            "marqueId" => $marqueId,
        ]);

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $voitures[] = new Voiture(
                $row["id"],
                $row["nom"],
                $row["puissance"],
                $row["prix"],
                $row["marque_id"],
            );
        }
        return $voitures;
    }

    public function create(Voiture $voiture): int
    {
        $sql = "
         INSERT INTO voiture (nom, puissance, prix, marque_id)
         VALUES (:nom, :puissance, :prix, :marque_id)
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt ->execute([
            "nom"=> $voiture->nom,
            "puissance"=> $voiture->puissance,
            "prix"=> $voiture->prix,
            "marque_id"=> $voiture->marque_id
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    /**
     * Cette va envoyer une requête de suppressionvers la table voiture
     */
    public function delete(int $id)
    {
        $sql = "DELETE FROM voiture WHERE id = :id;";
        $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                "id" => $id,
            ]);
    }

    public function edit(Voiture $voiture)
    {
        $sql = "UPDATE voiture SET (nom=:n, puissance=:p, prix=:pr, marque_id=:m) WHERE id=:;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            "id"=>$voiture->id,
            "n"=>$voiture->nom,
            "p"=>$voiture->puissance,
            "pr"=>$voiture->prix,
            "m"=>$voiture->marque_id
        ]);
    }


}
