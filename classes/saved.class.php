<?php
    class Saved{
        protected $Conn;
        public function __construct($Conn){
            $this->Conn = $Conn;
        }
        public function isSaved($car_id){
            $query = "SELECT * FROM user_saved_cars WHERE user_id = :user_id AND car_id = :car_id";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "user_id" => $_SESSION['user_data']['user_id'],
                "car_id" => $car_id
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function toggleSaved($car_id){
            $isSaved = $this->isSaved($car_id);

            if($isSaved){
                //Already Saved
                $query = "DELETE FROM user_saved_cars WHERE user_save_id = :user_save_id";
                $stmt = $this->Conn->prepare($query);
                $stmt->execute([
                    "user_save_id" => $isSaved['user_save_id']
                ]);
                return false;
            }else{
                //Not Saved
                $query = "INSERT INTO user_saved_cars (user_id, car_id) VALUES (:user_id, :car_id)";
                $stmt = $this->Conn->prepare($query);
                $stmt->execute([
                    "user_id" => $_SESSION['user_data']['user_id'],
                    "car_id" => $car_id
                ]);
                return true;
            } 
        }
        public function getAllSavedForUser(){
            $query = "SELECT * FROM user_saved_cars LEFT JOIN cars ON user_saved_cars.car_id = cars.car_id WHERE user_saved_cars.user_id = :user_id";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "user_id" => $_SESSION['user_data']['user_id'],
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }