

<div id="top" class=" opage">
<div id="header" class="section-header">
	<div class="section-header__menuicon">
		<img src="<?=BASE_URL;?>assets/media/images/icon-menu.svg" alt="Menu">
		<br>Menu
	</div>
    <?php
    $app = Settings::appData();


    ?>

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
		<a itemprop="item" href="add-your-vessel" class="nav-active"><span itemprop="name">Add your Vessel</span></a>
		<meta itemprop="position" content="2" />
	</li>
</ol>

<div class="section-addvessel"><div class="wrapper form-ctrls__wrapper">
	<div class="section-addvessel__limit"></div>

	<h1>Add your Vessel</h1>
	<div class="section-addvessel__separator section-addvessel__separator1"></div>

	<form name="frm_addvessel" method="post" enctype="multipart/form-data">
		<input type="hidden" name="hfrm_addvessel" value="0.65277900 1727275557">
		<input type="hidden" name="id" value="20240925174557765980">
		<input type="hidden" name="key" value="c297b8e3e392b5b6e431d3c7f607a26f3cec70c9">

		<div class="section-addvessel__intro">
			<div class="section-addvessel__input-title">Why advertise your vessel <br>with Go Shipping &amp; Management</div>

			<div class="section-addvessel__intro__title">&bull; Large Network</div>
			<div class="section-addvessel__intro__description">Your vessel will be immediately
				introduced to our worldwide clientele maximizing your exposure.</div>

			<div class="section-addvessel__intro__title">&bull; Professional Service</div>
			<div class="section-addvessel__intro__description">Our highly qualified S&amp;P &amp; Charter brokers/team
				is constantly available offering their know-how and contacts to assure that you will
				be offered the best deal for your vessel.</div>

			<div class="section-addvessel__intro__title">&bull; Experience &amp; Reliability</div>
			<div class="section-addvessel__intro__description">Having concluded a vast number of deals for our clients
				throughout these years, we can guide you accurately protecting your interests.</div>

			<div class="section-addvessel__intro__title">&bull; It's Free</div>
			<div class="section-addvessel__intro__description">Commission will be remitted only
				when your vessel is sold or chartered via our contacts.</div>
		</div>

		<div class="section-addvessel__input-ctrl">

			<div class="section-addvessel__input-title">Personal Information</div>
			<div class="section-addvessel__input-asterisk section-addvessel__text">Fields marked with * are compulsory</div>

			<div class="section-addvessel__gap section-addvessel__gap1"></div>

			<div class="form-ctrls__cell section-addvessel__input-col1">
				<span>Name *</span>
				<input type="text" name="name" value="" required>
			</div>

			<div class="form-ctrls__cell section-addvessel__input-col2">
				<span>Company name</span>
				<input type="text" name="company_name" value="">
			</div>

			<div class="section-addvessel__gap section-addvessel__gap2"></div>

			<div class="form-ctrls__cell section-addvessel__input-col1">
				<span>Email *</span>
				<input type="email" name="email" value="" required>
			</div>

			<div class="form-ctrls__cell section-addvessel__input-col2">
				<span>Contact number *</span>
				<input type="tel" name="telephone" value="" required>
			</div>

			<div class="section-addvessel__gap section-addvessel__gap3"></div>

			<div class="form-ctrls__cell section-addvessel__input-message">
				<span>Message: *</span>
				<textarea name="message" required></textarea>
			</div>


			<div class="section-addvessel__upload-ctrl">
				<span class="section-addvessel__upload-label section-addvessel__text">Files</span>
				<input type="file" name="files[]">
				<input type="submit" value="Upload">
				<div class="section-addvessel__upload-hint section-addvessel__text">Notice: The total size of the uploaded files can be up to 20MB</div>
			</div>
		</div>

		<div class="section-addvessel__separator section-addvessel__separator2"></div>

		<div class="section-addvessel__buttons">
			<input type="submit" value="Submit" class="section-addvessel__btn_send" name="btn_submit">
			<input type="submit" value="Clear" class="section-addvessel__btn_clear" name="btn_clear">
			<div style="clear:both"></div>
		</div>

	</form>

	<div class="section-addvessel__limit"></div>
</div></div>

