<?php
    class Favourite{
        protected $Conn;
        public function __construct($Conn){
            $this->Conn = $Conn;
        }
        public function isFavourite($recipe_id){
            $query = "SELECT * FROM user_favourites WHERE user_id = :user_id AND recipe_id = :recipe_id";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "user_id" => $_SESSION['user_data']['user_id'],
                "recipe_id" => $recipe_id
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function toggleFavourite($recipe_id){
            $isFavourite = $this->isFavourite($recipe_id);

            if($isFavourite){
                //Already Favourite
                $query = "DELETE FROM user_favourites WHERE user_fav_id = :user_fav_id";
                $stmt = $this->Conn->prepare($query);
                $stmt->execute([
                    "user_fav_id" => $isFavourite['user_fav_id']
                ]);
                return false;
            }else{
                //Not Favourite
                $query = "INSERT INTO user_favourites (user_id, recipe_id) VALUES (:user_id, :recipe_id)";
                $stmt = $this->Conn->prepare($query);
                $stmt->execute([
                    "user_id" => $_SESSION['user_data']['user_id'],
                    "recipe_id" => $recipe_id
                ]);
                return true;
            } 
        }
        public function getAllFavouritesForUser(){
            $query = "SELECT * FROM user_favourites LEFT JOIN recipes ON user_favourites.recipe_id = recipes.recipe_id WHERE user_favourites.user_id = :user_id";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "user_id" => $_SESSION['user_data']['user_id'],
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }