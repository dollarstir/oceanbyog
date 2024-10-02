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
		<a href="home"><img src="<?=BASE_URL.$app->logo;?>" alt="$app->logo"></a>
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
			<a href=<?=BASE_URL;?>ships">Ships for Sale</a>
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
		<a itemprop="item" href="demolition-market" class="nav-active"><span itemprop="name">Demolition Market</span></a>
		<meta itemprop="position" content="2" />
	</li>
</ol>

<div class="section-newscnt opage-cnt">
	<div class="wrapper">
		<div class="section-newscnt__gap1"></div>

		<div class="section-newscnt__img-area">
			<div class="section-newscnt__img section-newscnt__img-demolition-market"></div>
		</div>

		<div class="section-newscnt__title">
			<h1>Demolition Market</h1>
			<p>Weekly Indicative Scrap <br> Price Levels Worldwide</p>
		</div>

		<div class="section-newscnt__date">
			<?=date("jS F Y");?>
		</div>

		<div class="section-newscnt__gap2"></div>

Week 37: 'approx' demo price levels for each breaking nation is as follows and depends on age, size and description:
<br>
<br>		<div class="section-newscnt__price-level__area">
			<div class="section-newscnt__price-level">
				<div class="section-newscnt__price-level__title">Bangladesh</div>
				<p class="section-newscnt__price-level__descr">Wet - USD$ 515/525 per LDT
<br>Dry - USD$ 495/505 per LDT
<br>Container - USD$ 525/535 per LDT
<br>Market Sentiment: Improving</p>
			</div>
			<div class="section-newscnt__price-level">
				<div class="section-newscnt__price-level__title">Pakistan</div>
				<p class="section-newscnt__price-level__descr">Wet - USD$ 495/505 per LDT
<br>Dry - USD$ 475/485 per LDT
<br>Container - USD$ 505/515 per LDT
<br>Market Sentiment: Improving</p>
			</div>
			<div class="section-newscnt__price-level">
				<div class="section-newscnt__price-level__title">India</div>
				<p class="section-newscnt__price-level__descr">Wet - USD$ 505/515 per LDT
<br>Dry - USD$ 485/495 per LDT
<br>Container - USD$ 515/525 per LDT
<br>Market Sentiment: Weak</p>
			</div>
			<div class="section-newscnt__price-level__separator"></div>
			<div class="section-newscnt__price-level">
				<div class="section-newscnt__price-level__title">Turkey</div>
				<p class="section-newscnt__price-level__descr">Wet - USD$ 350/360 per LDT
<br>Dry - USD$ 340/350 per LDT
<br>Container - USD$ 360/370 per LDT
<br>Market Sentiment: Weak</p>
			</div>
		</div>
		<div class="section-chart">
			<span>Demolition Market Chart
				&nbsp;&mdash;&nbsp; Last update: 25 Jul 2024
				&nbsp;&mdash;&nbsp; Click to enlarge</span>
			<br>
			<a href="<?=BASE_URL;?>assets/media/images/news/demolition-market.jpg" target="_blank"><img src="<?=BASE_URL;?>assets/media/images/news/demolition-market5eaf.jpg?1721897796" alt="Demolition Market Chart"></a>
		</div>
		<p>Annual Demolition Sales</p>
		<div class="section-newscnt__tables-context-single">
			<div class="section-newscnt__table">
				<div class="section-newscnt__tbody">
					<div class="section-newscnt__row section-newscnt__header">
						<div class="section-newscnt__cell section-newscnt__cell-strong">Year/Month</div>
						<div class="section-newscnt__cell">Jan</div>
						<div class="section-newscnt__cell">Feb</div>
						<div class="section-newscnt__cell">Mar</div>
						<div class="section-newscnt__cell">Apr</div>
						<div class="section-newscnt__cell">May</div>
						<div class="section-newscnt__cell">Jun</div>
						<div class="section-newscnt__cell">Jul</div>
						<div class="section-newscnt__cell">Aug</div>
						<div class="section-newscnt__cell">Sep</div>
						<div class="section-newscnt__cell">Oct</div>
						<div class="section-newscnt__cell">Nov</div>
						<div class="section-newscnt__cell">Dec</div>
						<div class="section-newscnt__cell section-newscnt__cell-strong">Total</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-strong">2024</div>
						<div class="section-newscnt__cell">39</div>
						<div class="section-newscnt__cell">5</div>
						<div class="section-newscnt__cell"></div>
						<div class="section-newscnt__cell"></div>
						<div class="section-newscnt__cell"></div>
						<div class="section-newscnt__cell"></div>
						<div class="section-newscnt__cell"></div>
						<div class="section-newscnt__cell"></div>
						<div class="section-newscnt__cell"></div>
						<div class="section-newscnt__cell"></div>
						<div class="section-newscnt__cell"></div>
						<div class="section-newscnt__cell">16</div>
						<div class="section-newscnt__cell section-newscnt__cell-strong">&nbsp;</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-strong">2023</div>
						<div class="section-newscnt__cell">79</div>
						<div class="section-newscnt__cell">50</div>
						<div class="section-newscnt__cell">68</div>
						<div class="section-newscnt__cell">40</div>
						<div class="section-newscnt__cell">41</div>
						<div class="section-newscnt__cell">39</div>
						<div class="section-newscnt__cell">37</div>
						<div class="section-newscnt__cell">45</div>
						<div class="section-newscnt__cell">53</div>
						<div class="section-newscnt__cell">28</div>
						<div class="section-newscnt__cell">32</div>
						<div class="section-newscnt__cell">19</div>
						<div class="section-newscnt__cell section-newscnt__cell-strong">531</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-strong">2022</div>
						<div class="section-newscnt__cell">79</div>
						<div class="section-newscnt__cell">51</div>
						<div class="section-newscnt__cell">66</div>
						<div class="section-newscnt__cell">71</div>
						<div class="section-newscnt__cell">70</div>
						<div class="section-newscnt__cell">50</div>
						<div class="section-newscnt__cell">33</div>
						<div class="section-newscnt__cell">35</div>
						<div class="section-newscnt__cell">45</div>
						<div class="section-newscnt__cell">27</div>
						<div class="section-newscnt__cell">24</div>
						<div class="section-newscnt__cell">35</div>
						<div class="section-newscnt__cell section-newscnt__cell-strong">577</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-strong">2021</div>
						<div class="section-newscnt__cell">99</div>
						<div class="section-newscnt__cell">80</div>
						<div class="section-newscnt__cell">90</div>
						<div class="section-newscnt__cell">94</div>
						<div class="section-newscnt__cell">107</div>
						<div class="section-newscnt__cell">82</div>
						<div class="section-newscnt__cell">78</div>
						<div class="section-newscnt__cell">83</div>
						<div class="section-newscnt__cell">90</div>
						<div class="section-newscnt__cell">75</div>
						<div class="section-newscnt__cell">82</div>
						<div class="section-newscnt__cell">58</div>
						<div class="section-newscnt__cell section-newscnt__cell-strong">1018</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-strong">2020</div>
						<div class="section-newscnt__cell">67</div>
						<div class="section-newscnt__cell">78</div>
						<div class="section-newscnt__cell">53</div>
						<div class="section-newscnt__cell">32</div>
						<div class="section-newscnt__cell">36</div>
						<div class="section-newscnt__cell">101</div>
						<div class="section-newscnt__cell">60</div>
						<div class="section-newscnt__cell">57</div>
						<div class="section-newscnt__cell">78</div>
						<div class="section-newscnt__cell">65</div>
						<div class="section-newscnt__cell">74</div>
						<div class="section-newscnt__cell">63</div>
						<div class="section-newscnt__cell section-newscnt__cell-strong">764</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-strong">2019</div>
						<div class="section-newscnt__cell">108</div>
						<div class="section-newscnt__cell">60</div>
						<div class="section-newscnt__cell">71</div>
						<div class="section-newscnt__cell">83</div>
						<div class="section-newscnt__cell">95</div>
						<div class="section-newscnt__cell">66</div>
						<div class="section-newscnt__cell">72</div>
						<div class="section-newscnt__cell">50</div>
						<div class="section-newscnt__cell">47</div>
						<div class="section-newscnt__cell">43</div>
						<div class="section-newscnt__cell">59</div>
						<div class="section-newscnt__cell">77</div>
						<div class="section-newscnt__cell section-newscnt__cell-strong">831</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-strong">2018</div>
						<div class="section-newscnt__cell">82</div>
						<div class="section-newscnt__cell">83</div>
						<div class="section-newscnt__cell">89</div>
						<div class="section-newscnt__cell">68</div>
						<div class="section-newscnt__cell">74</div>
						<div class="section-newscnt__cell">70</div>
						<div class="section-newscnt__cell">37</div>
						<div class="section-newscnt__cell">56</div>
						<div class="section-newscnt__cell">48</div>
						<div class="section-newscnt__cell">75</div>
						<div class="section-newscnt__cell">66</div>
						<div class="section-newscnt__cell">61</div>
						<div class="section-newscnt__cell section-newscnt__cell-strong">809</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-strong">2017</div>
						<div class="section-newscnt__cell">102</div>
						<div class="section-newscnt__cell">75</div>
						<div class="section-newscnt__cell">101</div>
						<div class="section-newscnt__cell">81</div>
						<div class="section-newscnt__cell">69</div>
						<div class="section-newscnt__cell">76</div>
						<div class="section-newscnt__cell">77</div>
						<div class="section-newscnt__cell">104</div>
						<div class="section-newscnt__cell">84</div>
						<div class="section-newscnt__cell">71</div>
						<div class="section-newscnt__cell">80</div>
						<div class="section-newscnt__cell">63</div>
						<div class="section-newscnt__cell section-newscnt__cell-strong">983</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-strong">2016</div>
						<div class="section-newscnt__cell">100</div>
						<div class="section-newscnt__cell">92</div>
						<div class="section-newscnt__cell">115</div>
						<div class="section-newscnt__cell">114</div>
						<div class="section-newscnt__cell">89</div>
						<div class="section-newscnt__cell">70</div>
						<div class="section-newscnt__cell">48</div>
						<div class="section-newscnt__cell">57</div>
						<div class="section-newscnt__cell">86</div>
						<div class="section-newscnt__cell">68</div>
						<div class="section-newscnt__cell">93</div>
						<div class="section-newscnt__cell">81</div>
						<div class="section-newscnt__cell section-newscnt__cell-strong">1013</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-strong">2015</div>
						<div class="section-newscnt__cell">60</div>
						<div class="section-newscnt__cell">101</div>
						<div class="section-newscnt__cell">107</div>
						<div class="section-newscnt__cell">100</div>
						<div class="section-newscnt__cell">74</div>
						<div class="section-newscnt__cell">78</div>
						<div class="section-newscnt__cell">46</div>
						<div class="section-newscnt__cell">54</div>
						<div class="section-newscnt__cell">42</div>
						<div class="section-newscnt__cell">49</div>
						<div class="section-newscnt__cell">53</div>
						<div class="section-newscnt__cell">89</div>
						<div class="section-newscnt__cell section-newscnt__cell-strong">853</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-strong">2014</div>
						<div class="section-newscnt__cell">96</div>
						<div class="section-newscnt__cell">80</div>
						<div class="section-newscnt__cell">71</div>
						<div class="section-newscnt__cell">83</div>
						<div class="section-newscnt__cell">105</div>
						<div class="section-newscnt__cell">81</div>
						<div class="section-newscnt__cell">89</div>
						<div class="section-newscnt__cell">83</div>
						<div class="section-newscnt__cell">55</div>
						<div class="section-newscnt__cell">66</div>
						<div class="section-newscnt__cell">82</div>
						<div class="section-newscnt__cell">64</div>
						<div class="section-newscnt__cell section-newscnt__cell-strong">955</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-strong">2013</div>
						<div class="section-newscnt__cell">134</div>
						<div class="section-newscnt__cell">100</div>
						<div class="section-newscnt__cell">101</div>
						<div class="section-newscnt__cell">91</div>
						<div class="section-newscnt__cell">94</div>
						<div class="section-newscnt__cell">80</div>
						<div class="section-newscnt__cell">90</div>
						<div class="section-newscnt__cell">83</div>
						<div class="section-newscnt__cell">86</div>
						<div class="section-newscnt__cell">87</div>
						<div class="section-newscnt__cell">104</div>
						<div class="section-newscnt__cell">84</div>
						<div class="section-newscnt__cell section-newscnt__cell-strong">1134</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-strong">2012</div>
						<div class="section-newscnt__cell">101</div>
						<div class="section-newscnt__cell">119</div>
						<div class="section-newscnt__cell">167</div>
						<div class="section-newscnt__cell">123</div>
						<div class="section-newscnt__cell">142</div>
						<div class="section-newscnt__cell">112</div>
						<div class="section-newscnt__cell">101</div>
						<div class="section-newscnt__cell">104</div>
						<div class="section-newscnt__cell">89</div>
						<div class="section-newscnt__cell">91</div>
						<div class="section-newscnt__cell">119</div>
						<div class="section-newscnt__cell">104</div>
						<div class="section-newscnt__cell section-newscnt__cell-strong">1372</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-strong">2011</div>
						<div class="section-newscnt__cell">85</div>
						<div class="section-newscnt__cell">66</div>
						<div class="section-newscnt__cell">102</div>
						<div class="section-newscnt__cell">99</div>
						<div class="section-newscnt__cell">125</div>
						<div class="section-newscnt__cell">96</div>
						<div class="section-newscnt__cell">93</div>
						<div class="section-newscnt__cell">82</div>
						<div class="section-newscnt__cell">101</div>
						<div class="section-newscnt__cell">72</div>
						<div class="section-newscnt__cell">73</div>
						<div class="section-newscnt__cell">87</div>
						<div class="section-newscnt__cell section-newscnt__cell-strong">1081</div>
					</div>
					<div class="section-newscnt__row">
						<div class="section-newscnt__cell section-newscnt__cell-strong">2010</div>
						<div class="section-newscnt__cell">100</div>
						<div class="section-newscnt__cell">75</div>
						<div class="section-newscnt__cell">79</div>
						<div class="section-newscnt__cell">111</div>
						<div class="section-newscnt__cell">75</div>
						<div class="section-newscnt__cell">72</div>
						<div class="section-newscnt__cell">72</div>
						<div class="section-newscnt__cell">54</div>
						<div class="section-newscnt__cell">52</div>
						<div class="section-newscnt__cell">56</div>
						<div class="section-newscnt__cell">85</div>
						<div class="section-newscnt__cell">84</div>
						<div class="section-newscnt__cell section-newscnt__cell-strong">915</div>
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

	<div class="section-newsmenu__item">
		<a href="currency-exchange-rates"><span class="section-newsmenu__img section-newsmenu__img-currency-exchange-rates"></span></a>
		<div class="section-newsmenu__descr">
			<a href="currency-exchange-rates">Exchange Rates</a>
			Daily Updated <br> Currency Exchange Rates
		</div>
	</div>

	<div class="section-newsmenu__item section-newsmenu__item--active">
		<span class="section-newsmenu__img section-newsmenu__img-demolition-market"></span>
		<div class="section-newsmenu__descr">
			<span>Demolition Market</span>
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
