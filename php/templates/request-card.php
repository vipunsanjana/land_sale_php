

<a class="nodec" href="request.php?id=<?php echo $cardData['request_id'] ?>">
    <div class="card">
        <img class="card-image" src="<?php echo $cardData['cover_photo'] ?>" alt="">
        <div class="title"><?php echo $cardData['title'] ?></div>
        <div class="price"><?php echo $cardData['min_price'] ? 'Rs. '.$cardData['min_price'].' - '.$cardData['max_price'] : 'price negligible' ?></div>
        <div class="area"><?php echo $cardData['min_area'] ? $cardData['min_area'].' - '.$cardData['max_area'].' Perch' : 'price negligible' ?></div>
        <div class="date"><?php echo $cardData['create_date'] ?></div>
        <div class="place">
            <div><?php echo $cardData['city'] ?></div>
            <div><?php echo $cardData['district'] ?></div>
        </div>
    </div>
</a>