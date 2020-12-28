<?php

class Recipe {
    protected $Conn;

    public function __construct($Conn){
        $this->Conn = $Conn;
    }
    
    public function getAllRecipes($category_id){
        $query = "SELECT * FROM recipes WHERE category_id = :category_id";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute([
            "category_id"=> $category_id
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRecipe($recipe_id){
        $query = "SELECT * FROM recipes WHERE recipe_id = :recipe_id";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute([
            "recipe_id" => $recipe_id
        ]);
        $recipe_data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $query = "SELECT * FROM recipe_images WHERE recipe_id = :recipe_id";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute([
            "recipe_id" => $recipe_id
        ]);
        $recipe_data['images'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $recipe_data;
    }
}

