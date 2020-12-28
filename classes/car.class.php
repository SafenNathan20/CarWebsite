<?php

class Car {
    protected $Conn;

    public function __construct($Conn){
        $this->Conn = $Conn;
    }
    
    public function getAllCars($category_id){
        $query = "SELECT * FROM cars WHERE category_id = :category_id";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute([
            "category_id"=> $category_id
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCar($car_id){
        $query = "SELECT * FROM cars WHERE car_id = :car_id";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute([
            "car_id" => $car_id
        ]);
        $car_data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $query = "SELECT * FROM cars WHERE car_id = :car_id";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute([
            "car_id" => $car_id
        ]);
        $car_data['images'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $car_data;
    }
}

