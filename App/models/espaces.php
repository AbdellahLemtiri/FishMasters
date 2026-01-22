<?php
//CREATE TABLE especes (
//     idEspece SERIAL PRIMARY KEY,
//     nom VARCHAR(100) UNIQUE NOT NULL,
//     nomScientifique VARCHAR(150),
//     description TEXT
// );
class Especes
{
    private int $idEspece;
    private string $nom;
    private string $nomScientifique;
    private string $description;
    private $db;

// 
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addSpecies($data)
    {
        $stmt = $this->db->prepare("INSERT INTO especes (nom, nomScientifique, description) VALUES (:nom, :nomScientifique, :description)");
        return $stmt->execute([
            'nom' => $data['nom'],
            'nomScientifique' => $data['nomScientifique'],
            'description' => $data['description']
        ]);
    }

    public function updateSpecies($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE especes SET nom = :nom, nomScientifique = :nomScientifique, description = :description WHERE idEspece = :idEspece");
        return $stmt->execute([
            'nom' => $data['nom'],
            'nomScientifique' => $data['nomScientifique'],
            'description' => $data['description'],
            'idEspece' => $id
        ]);
    }

    public function deleteSpecies($id)
    {
        $stmt = $this->db->prepare("DELETE FROM especes WHERE idEspece = :idEspece");
        return $stmt->execute(['idEspece' => $id]);
    }

    public function listSpecies()
    {
        $stmt = $this->db->query("SELECT * FROM especes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
