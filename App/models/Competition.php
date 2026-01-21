<?php

class Competition
{
    private int $id;
    private string $name;
    private string $location;
    private string $date;
    private string $environment;   
    private string $category;      
    private string $scor;   

    public function __construct($id ,$name ,$location ,$date ,$environment ,$category ,$scor ){
        $this->id = $id ;
        $this->name = $name ;
        $this->location = $location ;
        $this->date = $date ;
        $this->environment = $environment ;
        $this->category = $category ;
        $this->scor = $scor ;

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getEnvironment(): string
    {
        return $this->environment;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getScoringType(): string
    {
        return $this->scor;
    }

    

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function setEnvironment(string $environment): void
    {
        $this->environment = $environment;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function setScoringType(string $scor): void
    {
        $this->scor = $scor;
    }
}




?>