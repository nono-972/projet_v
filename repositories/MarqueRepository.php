<?php

class MarqueRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAll(): array
    {
        $sql = "
            SELECT * FROM marque;
        ";

        $stmt = $this->pdo->query($sql);

        $marques = [];

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $marques[] = new Marque(
                $row["id"],
                $row["nom"],
                );
        }
        return $marques;
    }

     public function findById(int $id)
    {
        $sql = "
            SELECT * FROM marque WHERE id=:id;
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            "id" => $id
        ]);

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $marque = new Marque(
                $row["id"],
                $row["nom"],

            );
        }
        return $marque;
    }

    public function create(Marque $marque)
    {
        $sql = "INSERT INTO marque (nom) VALUES (:nom);";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            "nom" => $marque->nom
        ]);
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM marque WHERE id = :id;";
        $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                "id" => $id,
            ]);
    }

        public function edit(Marque $marque)
    {
        $sql = "UPDATE marque SET nom=:n  WHERE id=:id;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            "id"=>$marque->id,
            "n"=>$marque->nom,
           
        ]);
    }

}