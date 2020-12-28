<?php

class Review {
    protected $Conn;

    public function __construct($Conn){
        $this->Conn = $Conn;
    } 

    public function createReview($review_data){
        $query = "INSERT INTO reviews (user_id, recipe_id, review_rating) VALUES (:user_id, :recipe_id, :review_rating)";
        $stmt = $this->Conn->prepare($query);
        return $stmt->execute(array(
            'user_id' => $_SESSION['user_data']['user_id'],
            'recipe_id' => $review_data['recipe_id'],
            'review_rating' => $review_data['review_rating']
        ));
    }    
    public function calculateRating($recipe_id){
        $query = "SELECT AVG(review_rating) AS avg_rating FROM reviews WHERE recipe_id = :recipe_id";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute(array(
            'recipe_id' => $recipe_id,
        ));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }    
}
