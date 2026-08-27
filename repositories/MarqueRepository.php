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

    public function create(Marque $marque)
    {
        $sql = "INSERT INTO marque (nom) VALUES (:nom);";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            "nom" => $marque->nom
        ]);
    }

}