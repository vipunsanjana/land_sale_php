
<a class="nodec" href="sale.php?id=<?php echo $cardData['sale_id'] ?>">
    <div class="card">
        <img class="card-image" src="<?php echo $cardData['cover_photo'] ?>" alt="">
        <div class="title"><?php echo $cardData['title'] ?></div>
        <div class="price"><?php echo $cardData['price'] ? 'Rs. '.$cardData['price'] : 'price negligible' ?></div>
        <div class="area"><?php echo $cardData['land_area'] .' Perch'?></div>
        <div class="date"><?php echo $cardData['create_date'] ?></div>
        <div class="place">
            <div><?php echo $cardData['city'] ?></div>
            <div><?php echo $cardData['district'] ?></div>
        </div>
    </div>
</a>