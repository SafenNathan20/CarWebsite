<?php
    $Car = new Car($Conn);
    $car_data = $Car->getCar($_GET['id']);
?>

<div class="content">
    <div class="container text-center">
        <h1 class="mb-4 pb-2"><?php echo $car_data['car_name']; ?></h1>
        <div class="row">
            <div class="col-md-6">
                <?php if($car_data['images']) { ?>
                    <div class="row">
                        <?php foreach($car_data['images'] as $image){ ?>
                            <div class="col-md-4">
                                <div class="car-image mb-4" style="background-image: url('./car_images/<?php echo $image['car_image']; ?>');">
                                    <a href="./car_images/car_images/<?php echo $image['car_image']; ?>" data-lightbox="car-imgs"></a>
                                </div>   
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>       
            </div>
            <div class="col-md-6">
                <ul class="car-features">
                    <li><i class="far fa-clock"></i> <?php echo $car_data['car_time']; ?></li>
                    <li><i class="fas fa-users"></i> <?php echo $car_data['car_servings']; ?> Servings</li>
                    <li><i class="fas fa-pound-sign"></i> <?php echo $car_data['car_price']; ?></li>
                    <li><i class="fas fa-tags"></i> <?php echo $car_data['car_tags']; ?></li>
                </ul>

                <p><?php echo $car_data['car_description']; ?></p>

                <?php
                $Saved = new Saved($Conn);
                $is_save = $Saved->isSaved($_GET['id']);

                if($is_save) { ?>
                        <button id="removeSave" type="button" class="btn btn-primary mb-3" data-carid="<?php echo $_GET['id'];?>">Remove from Saved Cars</button>
                <?php } else { ?>
                        <button id="addSave" type="button" class="btn btn-primary mb-3" data-carid="<?php echo $_GET['id'];?>">Add to Saved Cars</button>
                <?php } ?>
            </div>
        </div> 
    </div>
</div>
</body>