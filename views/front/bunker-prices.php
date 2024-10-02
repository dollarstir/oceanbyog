
<?php
$app  = Settings::appData();
?>
<div id="top" class=" opage">
<div id="header" class="section-header">
	<div class="section-header__menuicon">
		<img src="<?=BASE_URL;?>assets/media/images/icon-menu.svg" alt="Menu">
		<br>Menu
	</div>

	<div class="section-header__logo">
		<a href="home"><img src="<?=BASE_URL.$app->logo;?>" alt="<?=$app->title;?>"></a>
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
		<a itemprop="item" href="bunker-prices" class="nav-active"><span itemprop="name">Bunker Prices</span></a>
		<meta itemprop="position" content="2" />
	</li>
</ol>

<div class="section-newscnt opage-cnt">
	<div class="wrapper">
		<div class="section-newscnt__gap1"></div>

		<div class="section-newscnt__img-area">
			<div class="section-newscnt__img section-newscnt__img-bunker-prices"></div>
		</div>

		<div class="section-newscnt__title">
			<h1>Bunker Prices</h1>
			<p>Daily Indicative <br> Bunker Prices in USD/MT&nbsp; Worldwide&nbsp;</p>
		</div>

		<div class="section-newscnt__date">
			<?=date("jS F, Y");?>
		</div>

		<div class="section-newscnt__gap2"></div>

		<div class="section-newscnt__tables-context-single">
			<div class="section-newscnt__table">
				<div class="section-newscnt__tbody">
					<div class="section-newscnt__row section-newscnt__header">
						<div class="section-newscnt__cell section-newscnt__cell-header">PORTS</div>
						<div class="section-newscnt__cell">IFO 380</div>
						<div class="section-newscnt__cell">IFO 180</div>
						<div class="section-newscnt__cell">VLSFO</div>
						<div class="section-newscnt__cell">MGO-0.1%, L.S.</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-header">PIRAEUS</div>
						<div class="section-newscnt__cell">441.00</div>
						<div class="section-newscnt__cell">0.00</div>
						<div class="section-newscnt__cell">583.00</div>
						<div class="section-newscnt__cell">692.00</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-header">ISTANBUL</div>
						<div class="section-newscnt__cell">535.00</div>
						<div class="section-newscnt__cell">0.00</div>
						<div class="section-newscnt__cell">591.00</div>
						<div class="section-newscnt__cell">695.00</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-header">FUJAIRAH</div>
						<div class="section-newscnt__cell">458.00</div>
						<div class="section-newscnt__cell">0.00</div>
						<div class="section-newscnt__cell">568.00</div>
						<div class="section-newscnt__cell">769.00</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-header">SINGAPORE</div>
						<div class="section-newscnt__cell">433.00</div>
						<div class="section-newscnt__cell">0.00</div>
						<div class="section-newscnt__cell">573.00</div>
						<div class="section-newscnt__cell">619.00</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-header">ROTTERDAM</div>
						<div class="section-newscnt__cell">404.00</div>
						<div class="section-newscnt__cell">0.00</div>
						<div class="section-newscnt__cell">501.00</div>
						<div class="section-newscnt__cell">608.00</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-header">HOUSTON</div>
						<div class="section-newscnt__cell">409.00</div>
						<div class="section-newscnt__cell">0.00</div>
						<div class="section-newscnt__cell">499.00</div>
						<div class="section-newscnt__cell">626.00</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-header">SANTOS</div>
						<div class="section-newscnt__cell">0.00</div>
						<div class="section-newscnt__cell">0.00</div>
						<div class="section-newscnt__cell">608.00</div>
						<div class="section-newscnt__cell">808.00</div>
					</div>
				</div>
			</div>
		</div>


	</div>

	<div class="section-newscnt__gap3"></div>

<div id="market-news" class="section-newsmenu">
	<div class="section-newsmenu__gap"></div>

	<div class="section-newsmenu__item section-newsmenu__item--active">
		<span class="section-newsmenu__img section-newsmenu__img-bunker-prices"></span>
		<div class="section-newsmenu__descr">
			<span>Bunker Prices</span>
			Daily Indicative <br> Bunker Prices in USD/MT&nbsp; Worldwide&nbsp;
		</div>
	</div>

	<div class="section-newsmenu__item">
		<a href="currency-exchange-rates"><span class="section-newsmenu__img section-newsmenu__img-currency-exchange-rates"></span></a>
		<div class="section-newsmenu__descr">
			<a href="currency-exchange-rates">Exchange Rates</a>
			Daily Updated <br> Currency Exchange Rates
		</div>
	</div>

	<div class="section-newsmenu__item">
		<a href="demolition-market"><span class="section-newsmenu__img section-newsmenu__img-demolition-market"></span></a>
		<div class="section-newsmenu__descr">
			<a href="demolition-market">Demolition Market</a>
			Weekly Indicative Scrap <br> Price Levels Worldwide
		</div>
	</div>

<!--	<div class="section-newsmenu__item">-->
<!--		<a href="news.html"><span class="section-newsmenu__img section-newsmenu__img-news"></span></a>-->
<!--		<div class="section-newsmenu__descr">-->
<!--			<a href="news.html">Go Shipping News</a>-->
<!--			Our latest news &amp; announcements-->
<!--		</div>-->
<!--	</div>-->

	<div class="section-newsmenu__gap"></div>
</div>

	<div class="section-newscnt__gap4"></div>
</div>

