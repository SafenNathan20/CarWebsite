<?php
$Category = new Category($Conn);
$categories = $Category->getAllCategories();
?>

<div class="content">
    <h1 class="mb-4 pb-2">Recipe Categories</h1>
    <div class="row">
        <?php foreach($categories as $category) { ?>
            <div class="col-md-3">
                <div class="recipe-card">
                    <div class="recipe-card-image" style="background-image: url('./category-images/<?php echo $category['category_image']; ?>');">
                         <a href="index.php?p=recipes&id=<?php echo $category['category_id']; ?>"></a>
                    </div>
                    <a href="index.php?p=recipes&id=<?php echo $category['category_id']; ?>"><h3><?php echo $category['category_name']; ?></h3></a>
                </div>      
            </div>
        <?php } ?>
    </div>
</div>