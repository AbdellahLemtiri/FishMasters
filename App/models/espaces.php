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


    public function __construct($db)
    {
        $this->db = $db;
    }


    public function getIdEspece(): int
    {
        return $this->idEspece;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getNomScientifique(): string
    {
        return $this->nomScientifique;
    }

    public function getDescription(): string
    {
        return $this->description;
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
