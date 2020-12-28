<?php
$category_id = $_GET['id'];
$Recipe = new Recipe($Conn);
$recipes = $Recipe->getAllRecipes($category_id);
$Category = new Category($Conn);
$categories = $Category->getAllCategories();
?>

<div class="content">
    <div class="container text-center">
    <h1 class="mb-4 pb-2">My Account</h1>
    <p>This is where all your Favourites will be listed for you to look back on.</p>
    <h2>My Favourites</h2>
    <ul class="user-favs" style="list-style-type:none;">
        <div class="row">
        <?php
            $Favourite = new Favourite($Conn);
            $user_favs = $Favourite->getAllFavouritesForUser();
                if($user_favs){
                    foreach($user_favs as $fav){
                    ?>
                    <div class="col-md-3">
                        <div class="recipe-card-fav">
                            <div class="recipe-card-image" style="background-image: url('./recipe_images/<?php echo $fav['recipe_image']; ?>');">
                                <a href="index.php?p=recipe&id=<?php echo $fav['recipe_id']; ?>"></a>
                            </div>
                            <a href="index.php?p=recipe&id=<?php echo $fav['recipe_id']; ?>"><h3><?php echo $fav['recipe_name']; ?></h3></a>
                        </div>
                    </div>
                <?php }
                }?>
        </div>
    </ul>
    </div>
</div>
                    
                    