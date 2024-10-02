
<?php

$app = Settings::appData();
?>
<div id="top" class=" opage">
    <div id="header" class="section-header">
        <div class="section-header__menuicon">
            <img src="<?=BASE_URL;?>/assets/media/images/icon-menu.svg" alt="Menu">
            <br>Menu
        </div>

        <div class="section-header__logo">
            <a href="<?=BASE_URL;?>home"><img src="<?=BASE_URL.$app->logo;?>" alt="<?=$app->title;?>"></a>
        </div>

        <div class="section-header__main-menu">
            <div class="main-menu-item">
                <a href="<?=BASE_URL;?>home#snp">S&amp;P</a>
                <div class="main-menu-item__undeline"></div>
            </div>
            <div class="main-menu-item">
                <a href="<?=BASE_URL;?>home#chartering">Chartering</a>
                <div class="main-menu-item__undeline"></div>
            </div>
            <div class="main-menu-item">
                <a href="<?=BASE_URL;?>home#ship-management">Ship Management</a>
                <div class="main-menu-item__undeline"></div>
            </div>
            <div class="main-menu-item">
                <a href="<?=BASE_URL;?>ships">Ships for Sale</a>
                <div class="main-menu-item__undeline"></div>
            </div>
        </div>

        <div class="section-header__add-your-vessel">
            <a href="<?=BASE_URL;?>add-your-vessel" class="section-header__addvessel-link"><span>Add your Vessel</span></a>
        </div>
    </div>
    <ol itemscope itemtype="https://schema.org/BreadcrumbList" class="nav">
        <li>You are here:</li>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemprop="item" href="<?=BASE_URL;?>home"><span itemprop="name">Home</span></a>
            <meta itemprop="position" content="1" />
        </li>
        <li>/</li>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemprop="item" href="<?=BASE_URL;?>ships"><span itemprop="name">Ship for Sale</span></a>
            <meta itemprop="position" content="2" />
        </li>
        <li>/</li>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemprop="item" href=<?=BASE_URL;?>"home" class="nav-active"><span itemprop="name"><?=$ships[0]->subcategory_name;?></span></a>
            <meta itemprop="position" content="3" />
        </li>
    </ol>

    <div class="opage-cnt shipview__subcats"><div class="wrapper">

            <div class="shipview__subcats__gap-top"></div>

            <div class="shipview__subcats__back">&larr; <a href="<?=BASE_URL;?>ships">Back</a></div>

            <h1 class="shipview__subcats__title"><?=$ships[0]->subcategory_name;?></h1>

            <div class="shipview__subcats__content">
                <div class="shipview__subcats__content__links">
                    <?php
// Sample array of related categories from the database (for demonstration purposes)


// Assuming $result[0]->main_category contains the main category name
$mainCategory = $ships[0]->subcategory_name;



// Start generating the HTML with a loop
foreach ($relatedCategories as $index =>  $category) {
    // Check if the category matches the main category
    if ($category->name === $mainCategory) {
        echo "<strong>$category->name</strong>";
    } else {
        echo "<a href=\"$category->id\">$category->name</a>";
    }

    // Add a separator if it's not the last category
    if ($index < count($relatedCategories) - 1) {
        echo "<span>|</span>";
    }
}
?>


                </div>
            </div>

            <div class="shipview__subcats__gap-bottom"></div>
        </div></div>

    <div class="shipview__list"><div class="wrapper">

            <div class="shipview__list__gap1"></div>

            <div class="shipview__list__stats">
                <span><strong><?=count($ships);?></strong> ships found</span>
                <span>in Category Double Ended Ferries</span>
            </div>

<!--            <div class="shipview__list__order">-->
<!--                Order-->
<!--                <select onchange="window.location = this.value">-->
<!--                    <option value="?sort=reference-number&order=ascending" selected>Reference number</option>-->
<!--                    <option value="?sort=year-of-blt&order=ascending">Year of Blt</option>-->
<!--                    <option value="?sort=length&order=ascending">Length</option>-->
<!--                </select>-->
<!--                <a href=""><img src="--><?php //=BASE_URL;?><!--/assets/media/images/icon-sort-asc.svg" alt="Sort ascending"></a>-->
<!--            </div>-->


            <div class="shipview__list__gap2"></div>


            <?php foreach ($ships as $ship): ?>
                <div class="shipview__ship" id="OWP-<?= htmlspecialchars($ship->id ?? 'unknown'); ?>" data-id="<?= htmlspecialchars($ship->id ?? 'unknown'); ?>">
                    <div class="shipview__ship__main-img" style="background-image:url('<?= BASE_URL . htmlspecialchars($ship->thumbnail ?? 'assets/media/images/default-ship.jpg'); ?>')"></div>
                    <div class="shipview__ship__main">
                        <div class="shipview__ship__content">
                            <h2>
                                <a href="ships/double-end-ferries/go-<?= htmlspecialchars($ship->id ?? 'unknown'); ?>.html" class="ship-url">
                                    OWP <?= htmlspecialchars($ship->id ?? 'Unknown Ship'); ?> - <?= htmlspecialchars($ship->name ?? 'No name'); ?> - <?= htmlspecialchars($ship->length ?? 'N/A'); ?>m
                                </a>
                            </h2>
                            <div class="shipview__ship__content__categories">
                                Category: <span><?= htmlspecialchars($ship->main_category_name ?? 'No Main Category'); ?></span> / <span><?= htmlspecialchars($ship->subcategory_name ?? 'No Subcategory'); ?></span>
                            </div>
                            <div class="shipview__ship__content__description">
                                <p><?= htmlspecialchars($ship->description ?? 'No description available.'); ?></p>
                            </div>
                            <?php $shipImages = Ship::getShipImages($ship->id); ?>
                            <?php if (!empty($shipImages)): ?>
                                <div class="shipview__ship__content__gallery">
                                    <div class="shipview__ship__content__gallery__previous"></div>
                                    <div class="shipview__ship__content__gallery__images-viewport">
                                        <div class="shipview__ship__content__gallery__images-stage">
                                            <?php foreach ($shipImages as $image): ?>
                                                <div class="shipview__ship__content__gallery__img-gap"></div>
                                                <img src="<?= BASE_URL; ?><?= htmlspecialchars($image->url); ?>" alt="<?= htmlspecialchars($ship->name ?? 'Ship Image'); ?>" class="shipview__ship__content__gallery__img">
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="shipview__ship__content__gallery__next"></div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="shipview__ship__separator"></div>
                        <div class="shipview__ship__side">
                            <div class="shipview__ship__side__top">
                                <div class="shipview__ship__side__item shipview__ship__side__item-location">
                                    <span>Location:</span>
                                    <?= htmlspecialchars($ship->location ?? 'Not Specified'); ?>
                                </div>
                                <div class="shipview__ship__side__item shipview__ship__side__item-price">
                                    <span>Price:</span>
                                    <?= htmlspecialchars($ship->price ?? 'On Request'); ?>
                                </div>
                                <div class="shipview__ship__side__item shipview__ship__side__item-print">
                                    <a href="<?= BASE_URL; ?>ship/<?= htmlspecialchars($ship->id ?? 'unknown'); ?>" class="ship-url">Print</a>
                                </div>

                                <div class="shipview__ship__side__item shipview__ship__side__item-video">
                                    <a href="<?= htmlspecialchars($ship->video ?? '#'); ?>" target="_blank">Video</a>
                                </div>
                            </div>
                            <div class="shipview__ship__request-details">
                                <a href="javascript:void(0)" data-extra="?subject=Details%20about%20vessel%20<?= urlencode($ship->name ?? 'Unknown Ship'); ?>&amp;body=Please%20send%20me%20more%20information%20about%20vessel%20<?= urlencode($ship->name ?? 'Unknown Ship'); ?>" data-ship-title="<?= htmlspecialchars($ship->name ?? 'Unknown Ship'); ?>" class="cnt-sp">Request Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>









            <div class="shipview__list__footer">
                <div class="shipview__list__pagination pagination">
                    <span>&laquo;</span>
                    <span class="active">1</span>
                    <a href="ships/double-end-ferries4658.html?page=2">2</a>
                    <a href="ships/double-end-ferries9ba9.html?page=3">3</a>
                    <a href="ships/double-end-ferries4658.html?page=2">&raquo;</a>
                </div>

                <div class="shipview__list__footer-end"></div>
            </div>

        </div></div>

    <div class="shipview__filters__tag shipview__filters__tag--close"></div>
    <div class="shipview__filters__stage">
        <form method="get" name="filters">
            <div class="shipview__filters__stage__title1">Filters:</div>
            <div class="shipview__filters__stage__notice">* Length is measured in meters</div>
            <div class="shipview__filters__stage__table1">
                <div class="shipview__filters__stage__table1-row">
                    <div class="shipview__filters__stage__table1-cell">Length:</div>
                    <div class="shipview__filters__stage__table1-cell">
                        <span>From</span> <input type="text" name="length-from" value="" class="shipview__filters__text">
                        <span>to</span> <input type="text" name="length-to" value="" class="shipview__filters__text">
                    </div>
                </div>
                <div class="shipview__filters__stage__table1-row">
                    <div class="shipview__filters__stage__table1-cell">DWT:</div>
                    <div class="shipview__filters__stage__table1-cell">
                        <span>From</span> <input type="text" name="dwt-from" value="" class="shipview__filters__text">
                        <span>to</span> <input type="text" name="dwt-to" value="" class="shipview__filters__text">
                    </div>
                </div>
                <div class="shipview__filters__stage__table1-row">
                    <div class="shipview__filters__stage__table1-cell">Year of Blt:</div>
                    <div class="shipview__filters__stage__table1-cell">
                        <span>From</span> <input type="text" name="built-from" value="" class="shipview__filters__text">
                        <span>to</span> <input type="text" name="built-to" value="" class="shipview__filters__text">
                    </div>
                </div>
                <div class="shipview__filters__stage__table1-row">
                    <div class="shipview__filters__stage__table1-cell">BHP:</div>
                    <div class="shipview__filters__stage__table1-cell">
                        <span>From</span> <input type="text" name="bhp-from" value="" class="shipview__filters__text">
                        <span>to</span> <input type="text" name="bhp-to" value="" class="shipview__filters__text">
                    </div>
                </div>
            </div>
            <div class="shipview__filters__stage__title2">Select categories of RoPax Ferries</div>
            <div class="shipview__filters__stage__table2">
                <div class="shipview__filters__stage__table2-row">
                    <label class="shipview__filters__stage__table2-cell">
                        <input type="checkbox" name="cb_landing-crafts" value="1" class="shipview__filters__cb">
                        Landing Crafts
                    </label>
                    <label class="shipview__filters__stage__table2-cell">
                        <input type="checkbox" name="cb_double-end-ferries" value="1" checked class="shipview__filters__cb">
                        Double Ended Ferries
                    </label>
                </div>
                <div class="shipview__filters__stage__table2-row">
                    <label class="shipview__filters__stage__table2-cell">
                        <input type="checkbox" name="cb_day-ro-pax-ferries" value="1" class="shipview__filters__cb">
                        Day RoPax Ferries
                    </label>
                    <label class="shipview__filters__stage__table2-cell">
                        <input type="checkbox" name="cb_night-ro-pax-ferries" value="1" class="shipview__filters__cb">
                        Night RoPax Ferries
                    </label>
                </div>
                <div class="shipview__filters__stage__table2-row">
                    <label class="shipview__filters__stage__table2-cell">
                        <input type="checkbox" name="cb_day-pax-boats" value="1" class="shipview__filters__cb">
                        Day Pax Boats
                    </label>
                    <label class="shipview__filters__stage__table2-cell">
                        <input type="checkbox" name="cb_catamaran" value="1" class="shipview__filters__cb">
                        Catamarans
                    </label>
                </div>
                <div class="shipview__filters__stage__table2-row">
                    <label class="shipview__filters__stage__table2-cell">
                        <input type="checkbox" name="cb_hydrofoils" value="1" class="shipview__filters__cb">
                        Hydrofoils
                    </label>
                    <label class="shipview__filters__stage__table2-cell">
                        <input type="checkbox" name="cb_cruisers" value="1" class="shipview__filters__cb">
                        Cruisers
                    </label>
                </div>
            </div>
            <div class="shipview__filters__stage__submit"><input type="submit" value="Apply Filters"></div>
        </form>
    </div>

    <div class="shipview__gallery" style="display:none" data-image-path="/media/images/ships">
        <div class="shipview__gallery__header">
            <div class="shipview__gallery__header__flowerpot"></div>
            <div class="shipview__gallery__header__close"></div>
            <div class="shipview__gallery__header__previous"></div>
            <div class="shipview__gallery__header__title">-</div>
            <div class="shipview__gallery__header__next"></div>
        </div>
        <div class="shipview__gallery__main">
            <div class="shipview__gallery__main__previous"><div></div></div>
            <div class="shipview__gallery__main__content"></div>
            <div class="shipview__gallery__main__next"><div></div></div>
        </div>
        <div class="shipview__gallery__thumbs"></div>
    </div>


