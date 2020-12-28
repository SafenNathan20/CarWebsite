<?php
$category_id = $_GET['id'];
$Recipe = new Recipe($Conn);
$recipes = $Recipe->getAllRecipes($category_id);
$Category = new Category($Conn);
$categories = $Category->getAllCategories();
?>

<div class="content">
    <div class="container text-center">
    <h1><?php echo $category['category_name'];?></h1>
    <p>Visit our vast database full of unique recipes to follow that are quick, simple and cheap to make!!!</p>
    <div class="row">
        <?php foreach($recipes as $recipe) { ?>
            <div class="col-md-3">
                 <div class="recipe-card">
                    <div class="recipe-card-image" style="background-image: url('./recipe_images/<?php echo $recipe['recipe_image']; ?>');">
                         <a href="index.php?p=recipe&id=<?php echo $recipe['recipe_id']; ?>"></a>
                    </div>
                    <a href="index.php?p=recipe&id=<?php echo $recipe['recipe_id']; ?>"><h3><?php echo $recipe['recipe_name']; ?></h3></a>
                </div>            
            </div>
        <?php } ?>
    </div>
    </div>
</div>