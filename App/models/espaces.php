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


    public function getIdEspece(): int
    {
        $stmt = $this->db->prepare("INSERT INTO especes (nom, nomScientifique, description) VALUES (:nom, :nomScientifique, :description)");
        return $stmt->execute([
            'nom' => $data['nom'],
            'nomScientifique' => $data['nomScientifique'],
            'description' => $data['description']
        ]);
    }

    public function getNom(): string
    {
        $stmt = $this->db->prepare("UPDATE especes SET nom = :nom, nomScientifique = :nomScientifique, description = :description WHERE idEspece = :idEspece");
        return $stmt->execute([
            'nom' => $data['nom'],
            'nomScientifique' => $data['nomScientifique'],
            'description' => $data['description'],
            'idEspece' => $id
        ]);
    }

    public function getNomScientifique(): string
    {
        $stmt = $this->db->prepare("DELETE FROM especes WHERE idEspece = :idEspece");
        return $stmt->execute(['idEspece' => $id]);
    }

    public function getDescription(): string
    {
        $stmt = $this->db->query("SELECT * FROM especes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setIdEspece(int $idEspece): void
    {
        $this->idEspece = $idEspece;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setNomScientifique(string $nomScientifique): void
    {
        $this->nomScientifique = $nomScientifique;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function createSpecies()
    {
        $sql = "INSERT INTO especes (idEspece , nom ,nomScientifique , description ) 
        VALUES (:idEspece ,:nom ,:nomScientifique , :description ) ";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':idEspece', $this->idEspece);
        $stmt->bindValue(':nom', $this->nom);
        $stmt->bindValue(':nomScientifique', $this->nomScientifique);
        $stmt->bindValue(':description', $this->description);

        return $stmt->execute();
    }

    public function updateSpecies()
    {
        $sql = "UPDATE especes SET nom = :nom ,
        nomScientifique = :nomScientifique ,
        description = :description
        WHERE idEspece = :id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nom' => $this->nom,
            ':nomScientifique' => $this->nomScientifique,
            ':description' => $this->description,
            ':id' => $this->idEspece
        ]) ? true : false;
    }

    public function deleteSpecies()
    {
        $sql = "DELETE FROM especes WHERE idEspece = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':id' => $this->idEspece
        ]) ? true : false;
    }

    public static function getSpeciesById($db, $id)
    {
        $sql = "SELECT * FROM species WHERE idspecies = ?";

        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public static function getAllSpecies($db)
    {
        $sql = "SELECT * FROM species";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setMinSize() {}

    public function setPointCoefficient() {}
}
