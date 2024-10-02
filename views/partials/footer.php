
<?php
$app = Settings::appData();

?>
<div class="section-footer">
    <div class="section-footer__top"></div>
    <div class="section-footer__logo">
        <a href="home"><img src="<?=BASE_URL;?><?=$app->logo;?>" alt="Go Shipping"></a>
    </div>
    <div class="section-footer__cols">
        <div class="section-footer__col section-footer__company">
            <div class="section-footer__goshipping"><?=$app->title;?></div>

            <div class="section-footer__info">
                <div><?=$app->address;?>

                </div>
                <div>T: <a href="tel:<?=$app->phone;?>"><?=$app->phone;?></a>
<!--                    <span class="section-footer__info__separator section-footer__info__separator-fax">|</span>-->
<!--                    <span class="section-footer__info__fax">F: <a href="tel:00302104293212">+30 210 429 3212</a></span>-->
                </div>
                <div>E: <a href="mailto:<?=$app->email;?>" class=""><?=$app->email;?></a></div>
            </div>

<!--            <div class="section-footer__social-icons">-->
<!--                <a href="https://www.linkedin.com/company/17992115/" target="_blank"><img src="--><?php //=BASE_URL;?><!--assets/media/images/icon-linkedin-ft.svg" alt="LinkedIn" class="section-footer__social-icon section-footer__social-icon-linkedin"></a>-->
<!---->
<!--                <a href="https://www.youtube.com/channel/UCY7ffVJ1RfnpnDUPHrRbcKw" target="_blank"><img src="--><?php //=BASE_URL;?><!--assets/media/images/icon-youtube-ft.svg" alt="YouTube" class="section-footer__social-icon section-footer__social-icon-youtube"></a>-->
<!--            </div>-->
<!---->
<!--            <div class="section-footer__apps">-->
<!--                <a href="https://play.google.com/store/apps/details?id=com.go_shipping.goshipping" target="_blank" rel="noopener"><img alt="Get it on Google Play" src="--><?php //=BASE_URL;?><!--assets/media/images/icon-app-google-play.png" /></a>-->
<!---->
<!--                <a href="https://itunes.apple.com/us/app/go-shipping/id1435606488?mt=8" target="_blank" rel="noopener"><img alt="Get it on App Store" src="--><?php //=BASE_URL;?><!--assets/media/images/icon-app-app-store.svg" /></a>-->
<!--            </div>-->

<!--            <div class="section-footer__lang">-->
<!--                <span class="section-footer__lang--active">EN</span>-->
<!--                <span class="section-footer__lang__separator">|</span>-->
<!--                <a href="french.html">FR</a>-->
<!--                <span class="section-footer__lang__separator">|</span>-->
<!--                <a href="spanish.html">ES</a>-->
<!--                <span class="section-footer__lang__separator">|</span>-->
<!--                <a href="turkish.html">TR</a>-->
<!--            </div>-->
        </div>

        <div class="section-footer__col section-footer__col-gap"></div>

        <div class="section-footer__col section-footer__newsletter">
            <div class="section-footer__newsletter-title">Subscribe to our news</div>

            <p class="section-footer__newsletter-message">Please enter your email address to have news,
                special offers and listing announcements delivered directly to your inbox.</p>

            <form name="" method="post" onsubmit="return false">
                <input type="hidden" name="key" value="">
                <div class="section-footer__newsletter-form">
                    <input type="email" name="email" placeholder="Email" value="">
                    <input type="image" src="<?=BASE_URL;?>assets/media/images/icon-newsletter.svg">
                </div>
            </form>
        </div>

        <div class="section-footer__col section-footer__col-gap"></div>

        <div class="section-footer__col section-footer__associations">
            <p>Member of <br>
                <a href="https://www.wima.gr/el/" target="_blank" rel="noopener nofollow"><img src="<?=BASE_URL;?>assets/media/images/wima.svg" alt="WIMA" class="section-footer__wima-img"></a>
            </p>
            <p>Visit <br>
                <a href="https://www.go-yachting.com/" target="_blank"><img src="<?=BASE_URL;?>assets/media/images/go-yachting.svg" alt="Go Yachting" class="section-footer__goyachting-img"></a>
            </p>
        </div>
    </div>
    <div class="section-footer__bottom"></div>
</div>

<!--<a href="https://www.google.com/maps/d/viewer?mid=1xPaZAwo_c77VuFnZEwHKOW01Muo&amp;z=16" target="_blank"><span id="map" class="section-map">&nbsp;</span></a>-->

<div class="section-bottom">
    <div>
        &copy; 2002-<?=date("Y").' '.$app->title;?>
<!--        &nbsp; &ndash; &nbsp;-->
<!--        <a href="privacy.html">Privacy Policy</a>-->
    </div>
    <div><a href="#top"><img src="<?=BASE_URL;?>assets/media/images/icon-top.svg" alt="Go to top"></a></div>
</div>

</div>

<div id="image-loader"></div>

<div class="site-menu" style="display:none">

    <div class="site-menu__sideicon site-menu__sideicon-back">
        <img src="<?=BASE_URL;?>assets/media/images/site-menu-icon-back.svg" alt="Back">
        <br>Back
    </div>
    <div class="site-menu__sideicon site-menu__sideicon-contact">
        <img src="<?=BASE_URL;?>assets/media/images/site-menu-icon-contact.svg" alt="Contact">
        <br>Contact
    </div>

    <div class="site-menu__main">
        <div class="site-menu__main-l1">
            <div class="site-menu__main-l2">
                <a class="site-menu__item site-menu__item__ships" href="<?=BASE_URL;?>ships">
                    <img src="<?=BASE_URL;?>assets/media/images/site-menu-icon-ships.svg" alt="Ships for Sale">
                    <span class="site-menu__item__caption">Ships for Sale</span>
                    <span class="site-menu__item__decor"></span>
                </a>
                <a class="site-menu__item site-menu__item__addyourvessel" href="<?=BASE_URL;?>add-your-vessel">
                    <img src="<?=BASE_URL;?>assets/media/images/site-menu-icon-addyourvessel.svg" alt="Add your Vessel">
                    <span class="site-menu__item__caption">Add your Vessel</span>
                    <span class="site-menu__item__decor"></span>
                </a>
            </div>
            <div class="site-menu__main-l2">
                <a class="site-menu__item site-menu__item__snp" href="<?=BASE_URL;?>home#snp">
                    <img src="<?=BASE_URL;?>assets/media/images/site-menu-icon-snp.svg" alt="Sale &amp; Purchase">
                    <span class="site-menu__item__caption">Sale &amp; Purchase</span>
                    <span class="site-menu__item__decor"></span>
                </a>
                <a class="site-menu__item site-menu__item__chartering" href="<?=BASE_URL;?>home#chartering">
                    <img src="<?=BASE_URL;?>assets/media/images/site-menu-icon-chartering.svg" alt="Chartering">
                    <span class="site-menu__item__caption">Chartering</span>
                    <span class="site-menu__item__decor"></span>
                </a>
            </div>
        </div>
        <div class="site-menu__main-l1">
            <div class="site-menu__main-l2">
                <a class="site-menu__item site-menu__item__shipmanagement" href="<?=BASE_URL;?>home#ship-management">
                    <img src="<?=BASE_URL;?>assets/media/images/site-menu-icon-shipmanagement.svg" alt="Ship Management">
                    <span class="site-menu__item__caption">Ship Management</span>
                    <span class="site-menu__item__decor"></span>
                </a>
                <a class="site-menu__item site-menu__item__people" href="<?=BASE_URL;?>home#contact">
                    <img src="<?=BASE_URL;?>assets/media/images/site-menu-icon-people.svg" alt="Our People">
                    <span class="site-menu__item__caption">Our People</span>
                    <span class="site-menu__item__decor"></span>
                </a>
            </div>
<!--            <div class="site-menu__main-l2">-->
<!--                <a class="site-menu__item site-menu__item__news" href="news.html">-->
<!--                    <img src="--><?php //=BASE_URL;?><!--assets/media/images/site-menu-icon-news.svg" alt="Go Shipping News">-->
<!--                    <span class="site-menu__item__caption">Go Shipping News</span>-->
<!--                    <span class="site-menu__item__decor"></span>-->
<!--                </a>-->
<!--                <a class="site-menu__item site-menu__item__marketnews" href="#market-news">-->
<!--                    <img src="--><?php //=BASE_URL;?><!--assets/media/images/site-menu-icon-marketnews.svg" alt="Market News">-->
<!--                    <span class="site-menu__item__caption">Market News</span>-->
<!--                    <span class="site-menu__item__decor"></span>-->
<!--                </a>-->
<!--            </div>-->
        </div>
    </div>

    <img src="<?=BASE_URL.$app->logo;?>" alt="<?=$app->name;?>" class="site-menu__logo">
</div>

<div class="newsletter__backdrop" style="display:none"></div>

<div class="newsletter-container" style="display:none">

    <div class="newsletter-wait">
        Please wait ...
    </div>

    <div class="newsletter-msg newsletter-success">
        <div>Thank you!</div>
        <p>You have successfully subscribed to our newsletter.</p>
        <button>Close</button>
    </div>

    <div class="newsletter-msg newsletter-error">
        <div>Error</div>
        <p>...</p>
        <button>Close</button>
    </div>

    <div class="newsletter-ui">
        <div class="newsletter-ui__close">
            <img src="<?=BASE_URL;?>assets/media/images/icon-newsletter-close.svg" alt="Close">
        </div>

        <div class="newsletter-ui__inner">
            <form name="frm_newsletter_popup" method="post">
                <div class="newsletter-ui__title">
                    <img src="<?=BASE_URL;?>assets/media/images/icon-newsletter-title.svg" alt="Close">
                    <div>Subscribe <br>to our newsletter</div>
                </div>

                <div class="newsletter-ui__form">
                    <div class="newsletter-ui__form__item newsletter-ui__form__item-left">
                        Name *
                        <div class="newsletter-ui__form__item__input-box newsletter-ui__form__item__input-box--name">
                            <input type="text" name="name" value="" placeholder="your name">
                        </div>
                    </div>

                    <div class="newsletter-ui__form__item newsletter-ui__form__item-right">
                        Company Name
                        <div class="newsletter-ui__form__item__input-box newsletter-ui__form__item__input-box--company-name">
                            <input type="text" name="company_name" value="" placeholder="your company name">
                        </div>
                    </div>

                    <div class="newsletter-ui__form__item-separator"></div>

                    <div class="newsletter-ui__form__item newsletter-ui__form__item-left">
                        Email *
                        <div class="newsletter-ui__form__item__input-box newsletter-ui__form__item__input-box--email">
                            <input type="email" name="email" value="" placeholder="your email">
                        </div>
                    </div>

                    <div class="newsletter-ui__form__item newsletter-ui__form__item-right">
                        Contact number *
                        <div class="newsletter-ui__form__item__input-box newsletter-ui__form__item__input-box--contact-number">
                            <input type="text" name="contact_number" value="" placeholder="your contact number">
                        </div>
                    </div>

                    <div class="newsletter-ui__form__item-separator"></div>
                </div>

                <div class="newsletter-ui__ctrl-btns">
                    <div class="newsletter-ui__ctrl-btns__notice">
                        Fields marked with * are compulsory
                        <br>
                        <br>By clicking &quot;Subscribe&quot; you agree that you have read <br>and consent to our <a href="privacy">privacy policy</a>
                    </div>
                    <input type="button" value="Clear Form">
                    <input type="submit" value="Subscribe">
                </div>

                <div class="newsletter-ui__end"></div>
            </form>
        </div>
    </div>
</div>
<script scr="<?=BASE_URL;?>assets/media/js/ship928d.js?1507670911"></script>

</body>


</html>
