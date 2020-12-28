<?php
    if($_POST['rating']) {
        $Review = new Review($Conn);
        $Review->createReview([
            "recipe_id" => (int) $_GET['id'],
            "review_rating" => $_POST['rating']
        ]);
    }
    $Recipe = new Recipe($Conn);
    $recipe_data = $Recipe->getRecipe($_GET['id']);
?>

<div class="content">
    <div class="container text-center">
    <h1 class="mb-4 pb-2"><?php echo $recipe_data['recipe_name']; ?></h1>
    <div class="row">
        <div class="col-md-6">
            <?php if($recipe_data['images']) { ?>
                <div class="row">
                    <?php foreach($recipe_data['images'] as $image){ ?>
                        <div class="col-md-4">
                            <div class="recipe-image mb-4" style="background-image: url('./recipe_images/recipe_images/<?php echo $image['recipe_image']; ?>');">
                                <a href="./recipe_images/recipe_images/<?php echo $image['recipe_image']; ?>" data-lightbox="recipe-imgs"></a>
                            </div>   
                        </div>
                    <?php}?>
                </div>
            <?php}?>       
        </div>
        <div class="col-md-6">
            <ul class="recipe-features">
                <li>
                    <?php
                        $Review = new Review($Conn);
                        $avg_rating = $Review->calculateRating($_GET['id']);
                        $avg_rating = round($avg_rating['avg_rating'], 1);
                    ?>
                    <li><i class="fas fa-star-half-alt"></i> <?php echo $avg_rating; ?> Stars</li>
                </li>
                <li><i class="far fa-clock"></i> <?php echo $recipe_data['recipe_time']; ?></li>
                <li><i class="fas fa-users"></i> <?php echo $recipe_data['recipe_servings']; ?> Servings</li>
                <li><i class="fas fa-pound-sign"></i> <?php echo $recipe_data['recipe_price']; ?></li>
                <li><i class="fas fa-tags"></i> <?php echo $recipe_data['recipe_tags']; ?></li>
            </ul>

            <p><?php echo $recipe_data['recipe_instructions']; ?></p>

            <?php
            $Favourite = new Favourite($Conn);
            $is_fav = $Favourite->isFavourite($_GET['id']);

            if($is_fav){?>
                    <button id="removeFav" type="button" class="btn btn-primary mb-3" data-recipeid="<?php echo $_GET['id'];?>">Remove from Favourites</button>
            <?php}else{?>
                    <button id="addFav" type="button" class="btn btn-primary mb-3" data-recipeid="<?php echo $_GET['id'];?>">Add from Favourites</button>
            <?php}?>
        </div>
    </div> 
    <h3 class="review">Leave an interesting Review for other Students</h3>
        <?php if(!$_SESSION['is_logged_in']){ ?>
            <p>Unfortunately, you are not logged in. You cannot leave a review.</p>
        <?php}else{?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <select class="form-control" id="rating" name="rating">
                        <option value="1">1 Star (Super Bad)</option>
                        <option value="2">2 Star (Bad)</option>
                        <option value="3">3 Star (Middle)</option>
                        <option value="4">4 Star (Good)</option>
                        <option value="5">5 Star (Super Good)</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php}?>
    </div>
</div>