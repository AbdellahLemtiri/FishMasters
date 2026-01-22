<?php
class Category
{
    private $idCategory;
    private $nameCategory;
    private $statutCategory;
    private $competitionType;
    private $scorCategory;


    public function __construct($idCategory, $nameCategory, $statutCategory, $competitionType, $scorCategory)
    {
        $this->idCategory = $idCategory;
        $this->nameCategory = $nameCategory;
        $this->statutCategory = $statutCategory;
        $this->competitionType = $competitionType;
        $this->scorCategory = $scorCategory;
    }

    public function getIdCategory()
    {
        return $this->idCategory;
    }

    public function getNameCategory()
    {
        return $this->nameCategory;
    }

    public function getStatutCategory()
    {
        return $this->statutCategory;
    }

    public function getCompetitionType()
    {
        return $this->competitionType;
    }

    public function getScorCategory()
    {
        return $this->scorCategory;
    }

    // Setters
    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;
    }

    public function setNameCategory($nameCategory)
    {
        $this->nameCategory = $nameCategory;
    }

    public function setStatutCategory($statutCategory)
    {
        $this->statutCategory = $statutCategory;
    }

    public function setCompetitionType($competitionType)
    {
        $this->competitionType = $competitionType;
    }

    public function setScorCategory($scorCategory)
    {
        $this->scorCategory = $scorCategory;
    }

    public  function addCategory($pdo)
    {
        $stmt = $pdo->prepare(
            "INSERT INTO categories (name, statut, competition_type, scor) 
         VALUES (:name, :statut, :competitionType, :scor)"
        );

        return $stmt->execute([
            'name' => $this->nameCategory,
            'statut' => $this->statutCategory,
            'competitionType' => $this->competitionType,
            'level' => $this->scorCategory
        ]);
    }


    public function listCategories($pdo)
    {
        $stmt = $pdo->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
