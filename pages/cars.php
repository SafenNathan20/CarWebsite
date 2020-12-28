<?php
$category_id = $_GET['id'];
$Car = new Car($Conn);
$cars = $Car->getAllCars($category_id);
$Category = new Category($Conn);
$categories = $Category->getAllCategories();
?>

<div class="content">
    <div class="container text-center">
    <h1 class="mb-4 pb-2">Estate Cars</h1>
    <p>Our Range of Cars that are perfectly made for that special Customer</p>
    <div class="row">
        <?php foreach($cars as $car) { ?>
            <div class="col-md-3">
                 <div class="car-card">
                    <div class="car-card-image" style="background-image: url('./car-images/<?php echo $car['car_image']; ?>');">
                         <a href="index.php?p=car&id=<?php echo $car['car_id']; ?>"></a>
                    </div>
                    <a href="index.php?p=car&id=<?php echo $car['car_id']; ?>"><h3><?php echo $car['car_name']; ?></h3></a>
                </div>            
            </div>
        <?php } ?>
    </div>
    </div>
</div>
</body>