<?php
$app = Settings::appData();
?>

<div id="top" class=" opage">
<div id="header" class="section-header">
	<div class="section-header__menuicon">
		<img src="<?=BASE_URL;?>assets/media/images/icon-menu.svg" alt="Menu">
		<br>Menu
	</div>

	<div class="section-header__logo">
		<a href="home"><img src="<?=BASE_URL.$app->logo;?>" alt="<?=$app->name;?>"></a>
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
		<a itemprop="item" href="currency-exchange-rates" class="nav-active"><span itemprop="name">Exchange Rates</span></a>
		<meta itemprop="position" content="2" />
	</li>
</ol>

<div class="section-newscnt opage-cnt">
	<div class="wrapper">
		<div class="section-newscnt__gap1"></div>

		<div class="section-newscnt__img-area">
			<div class="section-newscnt__img section-newscnt__img-currency-exchange-rates"></div>
		</div>

		<div class="section-newscnt__title">
			<h1>Exchange Rates</h1>
			<p>Daily Updated <br> Currency Exchange Rates</p>
		</div>

		<div class="section-newscnt__date">
			<?=date("jS F, Y");?>
		</div>

		<div class="section-newscnt__gap2"></div>

		<div class="section-newscnt__tables-context-single">
			<div class="section-newscnt__table">
				<div class="section-newscnt__tbody">
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell">&nbsp;</div>
						<div class="section-newscnt__cell section-newscnt__header">EUR <br><img src="<?=BASE_URL;?>assets/media/images/icon-flag-eur.png" alt="EUR" class="section-newscnt__flag-top"></div>
						<div class="section-newscnt__cell section-newscnt__header">USD <br><img src="<?=BASE_URL;?>assets/media/images/icon-flag-usd.png" alt="USD" class="section-newscnt__flag-top"></div>
						<div class="section-newscnt__cell section-newscnt__header">GBP <br><img src="<?=BASE_URL;?>assets/media/images/icon-flag-gbp.png" alt="GBP" class="section-newscnt__flag-top"></div>
						<div class="section-newscnt__cell section-newscnt__header">JPY <br><img src="<?=BASE_URL;?>assets/media/images/icon-flag-jpy.png" alt="JPY" class="section-newscnt__flag-top"></div>
						<div class="section-newscnt__cell section-newscnt__header">CNY <br><img src="<?=BASE_URL;?>assets/media/images/icon-flag-cny.png" alt="CNY" class="section-newscnt__flag-top"></div>
						<div class="section-newscnt__cell section-newscnt__header">NOK <br><img src="<?=BASE_URL;?>assets/media/images/icon-flag-nok.png" alt="NOK" class="section-newscnt__flag-top"></div>
						<div class="section-newscnt__cell section-newscnt__header">SEK <br><img src="<?=BASE_URL;?>assets/media/images/icon-flag-sek.png" alt="SEK" class="section-newscnt__flag-top"></div>
						<div class="section-newscnt__cell section-newscnt__header">SGD <br><img src="<?=BASE_URL;?>assets/media/images/icon-flag-sgd.png" alt="SGD" class="section-newscnt__flag-top"></div>
						<div class="section-newscnt__cell section-newscnt__header">AED <br><img src="<?=BASE_URL;?>assets/media/images/icon-flag-aed.png" alt="AED" class="section-newscnt__flag-top"></div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__header">EUR <img src="<?=BASE_URL;?>assets/media/images/icon-flag-eur.png" alt="EUR" class="section-newscnt__flag-side"></div>
						<div class="section-newscnt__cell section-newscnt__cell-faded section-newscnt__cell-small">1.00000</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">1.11362</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.83259</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">160.30380</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">7.83299</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">11.61257</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">11.28802</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">1.43423</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">4.10525</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__header">USD <img src="<?=BASE_URL;?>assets/media/images/icon-flag-usd.png" alt="USD" class="section-newscnt__flag-side"></div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.89797</div>
						<div class="section-newscnt__cell section-newscnt__cell-faded section-newscnt__cell-small">1.00000</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.74764</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">143.94826</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">7.03381</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">10.42776</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">10.13632</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">1.28790</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">3.68640</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__header">GBP <img src="<?=BASE_URL;?>assets/media/images/icon-flag-gbp.png" alt="GBP" class="section-newscnt__flag-side"></div>
						<div class="section-newscnt__cell section-newscnt__cell-small">1.20108</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">1.33754</div>
						<div class="section-newscnt__cell section-newscnt__cell-faded section-newscnt__cell-small">1.00000</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">192.53693</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">9.40802</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">13.94757</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">13.55776</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">1.72262</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">4.93071</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__header">JPY <img src="<?=BASE_URL;?>assets/media/images/icon-flag-jpy.png" alt="JPY" class="section-newscnt__flag-side"></div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.00624</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.00695</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.00519</div>
						<div class="section-newscnt__cell section-newscnt__cell-faded section-newscnt__cell-small">1.00000</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.04886</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.07244</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.07042</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.00895</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.02561</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__header">CNY <img src="<?=BASE_URL;?>assets/media/images/icon-flag-cny.png" alt="CNY" class="section-newscnt__flag-side"></div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.12767</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.14217</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.10629</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">20.46520</div>
						<div class="section-newscnt__cell section-newscnt__cell-faded section-newscnt__cell-small">1.00000</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">1.48252</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">1.44109</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.18310</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.52410</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__header">NOK <img src="<?=BASE_URL;?>assets/media/images/icon-flag-nok.png" alt="NOK" class="section-newscnt__flag-side"></div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.08611</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.09590</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.07170</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">13.80433</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.67453</div>
						<div class="section-newscnt__cell section-newscnt__cell-faded section-newscnt__cell-small">1.00000</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.97205</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.12351</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.35352</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__header">SEK <img src="<?=BASE_URL;?>assets/media/images/icon-flag-sek.png" alt="SEK" class="section-newscnt__flag-side"></div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.08859</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.09866</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.07376</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">14.20124</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.69392</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">1.02875</div>
						<div class="section-newscnt__cell section-newscnt__cell-faded section-newscnt__cell-small">1.00000</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.12706</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.36368</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__header">SGD <img src="<?=BASE_URL;?>assets/media/images/icon-flag-sgd.png" alt="SGD" class="section-newscnt__flag-side"></div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.69724</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.77646</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.58051</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">111.76998</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">5.46146</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">8.09673</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">7.87044</div>
						<div class="section-newscnt__cell section-newscnt__cell-faded section-newscnt__cell-small">1.00000</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">2.86234</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__header">AED <img src="<?=BASE_URL;?>assets/media/images/icon-flag-aed.png" alt="AED" class="section-newscnt__flag-side"></div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.24359</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.27127</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.20281</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">39.04852</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">1.90804</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">2.82871</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">2.74966</div>
						<div class="section-newscnt__cell section-newscnt__cell-small">0.34936</div>
						<div class="section-newscnt__cell section-newscnt__cell-faded section-newscnt__cell-small">1.00000</div>
					</div>
				</div>
			</div>
		</div>


	</div>

	<div class="section-newscnt__gap3"></div>

<div id="market-news" class="section-newsmenu">
	<div class="section-newsmenu__gap"></div>

	<div class="section-newsmenu__item">
		<a href="bunker-prices"><span class="section-newsmenu__img section-newsmenu__img-bunker-prices"></span></a>
		<div class="section-newsmenu__descr">
			<a href="bunker-prices">Bunker Prices</a>
			Daily Indicative <br> Bunker Prices in USD/MT&nbsp; Worldwide&nbsp;
		</div>
	</div>

	<div class="section-newsmenu__item section-newsmenu__item--active">
		<span class="section-newsmenu__img section-newsmenu__img-currency-exchange-rates"></span>
		<div class="section-newsmenu__descr">
			<span>Exchange Rates</span>
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


	<div class="section-newsmenu__gap"></div>
</div>

	<div class="section-newscnt__gap4"></div>
</div>
