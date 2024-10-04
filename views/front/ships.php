
<?php
$app = Settings::appData();
;?>
<div id="top" class=" opage">
<div id="header" class="section-header">
	<div class="section-header__menuicon">
		<img src="<?=BASE_URL;?>assets/media/images/icon-menu.svg" alt="Menu">
		<br>Menu
	</div>

	<div class="section-header__logo">
		<a href="home"><img src="<?=BASE_URL.$app->logo;?>" alt="Go Shipping"></a>
	</div>

	<div class="section-header__main-menu">
		<div class="main-menu-item">
			<a href="home#snp">S&amp;P</a>
			<div class="main-menu-item__undeline"></div>
		</div>
		<div class="main-menu-item">
			<a href="home#chartering">Chartering</a>
			<div class="main-menu-item__undeline"></div>
		</div>
		<div class="main-menu-item">
			<a href="home#ship-management">Ship Management</a>
			<div class="main-menu-item__undeline"></div>
		</div>
		<div class="main-menu-item">
			<a href="ships">Ships for Sale</a>
			<div class="main-menu-item__undeline"></div>
		</div>
	</div>

	<div class="section-header__add-your-vessel">
		<a href="add-your-vessel" class="section-header__addvessel-link"><span>Add your Vessel</span></a>
	</div>
</div>
<ol itemscope itemtype="https://schema.org/BreadcrumbList" class="nav">
	<li>You are here:</li>
	<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
		<a itemprop="item" href="home"><span itemprop="name">Home</span></a>
		<meta itemprop="position" content="1" />
	</li>
	<li>/</li>
	<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
		<a itemprop="item" href="ships" class="nav-active"><span itemprop="name">Ship for Sale</span></a>
		<meta itemprop="position" content="2" />
	</li>
</ol>

<div class="opage-cnt shipcats-title">
	<h1>Ships and Commercial <span>Vessels for Sale</span></h1>
	<div><?=Ship::countALlShips();?> Vessels Available for Sale</div>
</div>

<div class="shipcats-items">

<!--	<div class="shipcats__item">-->
<!--		<div class="opage-cnt shipcats__item__header">-->
<!--			<a href="ships/wet-tonnage.html"><img src="assets/media/images/ship-categories/wet-tonnage.jpg" alt="Wet Tonnage" class="shipcats__item__img"></a>-->
<!--			<h2><a href="ships/wet-tonnage.html">Wet Tonnage</a></h2>-->
<!--			<div class="shipcats__item__arrow-area"><div class="shipcats__item__arrow"></div></div>-->
<!--		</div>-->
<!--		<div class="shipcats__item__cnt">-->
<!--			<div><a href="ships/Tanker-Vsls.html">Tanker Vsls</a></div>-->
<!--			<div><a href="ships/tanker-barges.html">Tanker Barges</a></div>-->
<!--			<div><a href="ships/LPG-LNG-Carriers.html">LPG/LNG Carriers</a></div>-->
<!---->
<!--		</div>-->
<!--	</div>-->

    <?php foreach ($main_categories as $category): ?>
        <div class="shipcats__item">
            <div class="opage-cnt shipcats__item__header">
                <a href="<?=BASE_URL;?>ships"><img src="<?= BASE_URL.$category->main_category_image ?>" alt="<?= $category->main_category_name ?>" class="shipcats__item__img"></a>
                <h2><a href="<?=BASE_URL;?>ships"><?= $category->main_category_name ?></a></h2>
                <div class="shipcats__item__arrow-area"><div class="shipcats__item__arrow"></div></div>
            </div>
            <div class="shipcats__item__cnt">
                <?php
                // Split the concatenated category string into individual categories
                $subcategories = explode(',', $category->categories);
                foreach ($subcategories as $subcategory):
                    // Separate ID and Name for each subcategory
                    list($subcat_id, $subcat_name) = explode(':', $subcategory);

                    ?>
                    <div><a href="ships/<?= $subcat_id ?>"><?= $subcat_name ?></a></div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>





</div>
<div class="shipcats__bottom-gap"></div>

