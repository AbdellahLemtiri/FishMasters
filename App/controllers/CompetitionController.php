<?php

use App\Models ;
class CompetitionController
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    
    public function getall()
    {
        $competitions = Competition::getall($this->db);
        require __DIR__ . '/../views/competition/index.php';
    }

    
    

    
    public function create()
    {
        Competition::createComp();
        header('Location: /competitions');
        exit;
    }

    
    public function getid($id)
    {
        $competition = Competition::getbyId($this->db, $id);
        require __DIR__ . '/../views/competition/edit.php';
    }

    
    public function update($id)
    {
        Competition::updateComp();
        header('Location: /competitions');
        exit;
    }

    
    public function delete($id)
    {
        Competition::deleteComp($this->db, $id);
        header('Location: /competitions');
        exit;
    }
}
?>