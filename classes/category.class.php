<?php

class Category {
    protected $Conn;

    public function __construct($Conn){
        $this->Conn = $Conn;
    }
    
    public function getAllCategories(){
        $query = "SELECT * FROM car_categories";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }        
}

