<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$app->title;?></title>
    <link rel="stylesheet" href="<?=BASE_URL;?>assets/media/css/print4031.css?1507670909" type="text/css">
    <link rel="canonical" href="home">
</head>

<body>

<div class="main-section">
    <div class="main-section__gap"></div>

    <div class="header">
        <img src="<?=BASE_URL;?><?=$app->logo;?>" alt="Oceanwide Premier">
        <button onclick="window.close()">Close</button>
        <button onclick="window.print()">Print</button>
        <div style="clear:both"></div>
    </div>

<!--    <div class="breadcrumbs">-->
<!--        You are here: Home / Ships for Sale-->
<!--        / Tanker Vsls-->
<!--        / <span>Go 1006 - Bunkering Tanker - 23m</span>-->
<!--    </div>-->

    <div class="title">
        <h1><?=$ship->name;?> - <?=$ship->length;?>m</h1>
    </div>

    <div class="main-image">
        <img src="<?=BASE_URL;?><?=$ship->thumbnail;?>" alt="OWP <?=$ship->id;?> - <?=$ship->name;?> - <?=$ship->length;?>m">
    </div>

    <?php if (!empty($shipImages)): ?>
        <div class="more-images">
            <?php foreach ($shipImages as $image): ?>
                <div>
                    <img src="<?= BASE_URL;?><?=$image->url;?>" alt="<?= $ship->name; ?>">
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <div class="category">
        <img src="<?=BASE_URL;?>assets/media/images/icon-ship-category.svg" alt="">
        Category: <?=$ship->main_category_name;?> / <span><?=$ship->category;?></span>
    </div>

    <div class="description">
        <p><?=$ship->description;?></p>
        <div style="clear:both"></div>
    </div>

    <div class="info">
        <div class="info__item info__item-location">
            <img src="<?=BASE_URL;?>assets/media/images/icon-ship-location.svg" alt="">
            <span>Location:</span>
            <?=$ship->location;?>
        </div>

        <div class="info__item info__item-price">
            <img src="<?=BASE_URL;?>assets/media/images/icon-ship-price.svg" alt="">
            <span>Price:</span>
            <?=$ship->price;?>
        </div>

    </div>

    <div class="main-section__gap"></div>
</div>

<div class="stats">
    <?=$ship->count;?> Vessels Available for Sale
</div>

<div class="footer">
   <?=$app->title;?>
    <span class="footer-separator">|</span> <?=$app->address;?>

    <br>T: <?=$app->phone;?>
<!--    <span class="footer-separator">|</span> F: +30 210 429 3212-->
    <span class="footer-separator">|</span> E: <span id=""><?=$app->email;?></span>
<!--    <span id="e"></span>-->
    <span class="footer-separator">|</span> W: www.oceanwidepremier.com
</div>

<script type="text/javascript">
    // document.getElementById("e").innerHTML = "snp" + "\u0040go" + String.fromCharCode(45) + "\u0073hi" + "\u0070p" + "in" + "g." + "\u0063o" + String.fromCharCode(109);

    window.onload = function() {
        window.print();
    };
</script>

</body>


</html>
