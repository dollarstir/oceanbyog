
var goshipping = {

	$win: null,
	timer_resize: 0,

	$site_menu: null,
	$site_menu_items: null,
	site_menu_sizes: {
		"wLarge": [1441, 900],
		"w1400": [1400, 874],
		"w840": [840, 524],
		"w480": [480, 299]
	},

	reposition_menu_bg: function () {
		var win_w = this.$win.width(), win_h = this.$win.height(), img_sz;

		if (win_w <= 480) {
			img_sz = this.site_menu_sizes["w480"];
		}
		else if (win_w <= 840) {
			img_sz = this.site_menu_sizes["w840"];
		}
		else if (win_w <= 1400) {
			img_sz = this.site_menu_sizes["w1400"];
		}
		else {
			img_sz = this.site_menu_sizes["wLarge"];
		}

		var rsz_h = win_h;
		var rsz_w = Math.floor(img_sz[0] * win_h / img_sz[1]);
		if (rsz_w < win_w) {
			rsz_h = Math.floor(win_w * img_sz[1] / img_sz[0]);
			rsz_w = win_w;
		}

		var pos_x = Math.floor((win_w - rsz_w) / 2);
		var pos_y = Math.floor((win_h - rsz_h) / 2);

		this.$site_menu.css({
			backgroundSize: rsz_w + "px " + rsz_h + "px",
			backgroundPosition: pos_x + "px " + pos_y + "px"
		});

		for (var i = 0, len = this.$site_menu_items.length; i < len; i++) {
			var $item = $(this.$site_menu_items[i]);
			var pos = $item.offset();
			$item.css({
				backgroundSize: rsz_w + "px " + rsz_h + "px",
				backgroundPosition: (pos_x - pos.left) + "px " + (pos_y - pos.top) + "px"
			});
		}
	},

	on_resize: function () {
		this.timer_resize = (new Date()).getTime() + 100;
		this.reposition_menu_bg();
	},

	on_timer: function () {
		if (this.timer_resize > 0 && (new Date()).getTime() > this.timer_resize) {
			this.timer_resize = 0;
		}
	},

	scroll_to: function (element) {
		var pos = $("#" + element).offset();
		$("html, body").animate({scrollTop: pos.top}, 600);
	},

	menu_open: function () {
		this.$site_menu.fadeIn();
		this.reposition_menu_bg();
	},

	menu_close: function (animate) {
		if (this.$site_menu.is(":visible")) {
			if (animate) {
				this.$site_menu.fadeOut();
			}
			else {
				this.$site_menu.css({display: "none"});
			}
		}
	},

	init: function () {
		var self = this;
		this.$win = $(window);

		this.$site_menu = $(".site-menu");
		this.$site_menu_items = $(".site-menu__item");


		// set up in-page link animations

		$("a").each(function (idx, item) {
			var href = item.getAttribute("href");
			if (href && href.length > 1 && href.substr(0, 1) == "#") {
				item.setAttribute("data-link", href.substr(1));
				item.href = "javascript:void(0)";
				item.onclick = function () {
					this.blur();
					self.menu_close(false);
					self.scroll_to(this.getAttribute("data-link"));
				}
			}
		});

		$(".section-home__menuicon-menu, .section-header__menuicon").click(function () {
			self.menu_open();
		});

		$(".site-menu__sideicon-back").click(function () {
			self.menu_close(true);
		});

		$(".section-home__menuicon-contact, .site-menu__sideicon-contact").click(function () {
			this.blur();
			self.menu_close(false);
			self.scroll_to("contact");
		});


		// miscellaneous adjustments

		setInterval(function () { self.on_timer(); }, 200);

		this.$win.resize(function () {
			self.on_resize();
		});

		$(document).keyup(function(e) {
			if (e.keyCode == 27) {
				self.menu_close(true);
			}
		});

		if (document.nk) {
			for (var k in document.forms) {
				if (document.forms.hasOwnProperty(k) && document.forms[k].hasOwnProperty("key")) {
					document.forms[k].key.value = document.nk;
				}
			}
		}

		this.on_resize();
	}

}

var newsletter = {

	clear_form: function (email) {
		document.forms.frm_newsletter_popup.name.value = "";
		document.forms.frm_newsletter_popup.company_name.value = "";
		document.forms.frm_newsletter_popup.email.value = email;
		document.forms.frm_newsletter_popup.contact_number.value = "";
	},

	open_form: function (email) {
		this.clear_form(email);

		this.$body.addClass("newsletter__body-hide");

		this.$panel_wait.hide();
		this.$panel_success.hide();
		this.$panel_error.hide();
		this.$panel_ui.show();

		this.$backdrop.css({display: "block", opacity: 0}).animate({opacity: 1}, 100);
		this.$panel.css({display: "flex", opacity: 0}).animate({opacity: 1}, 300);

		document.forms.frm_newsletter_popup.name.focus();
	},

	close_form: function () {
		if (this.$panel.is(":visible")) {
			this.$panel.fadeOut(100);
			this.$backdrop.fadeOut(300);
		}

		this.$body.removeClass("newsletter__body-hide");
	},

	process_form: function () {
		var name = document.forms.frm_newsletter_popup.name.value.replace(/^\s+|\s+$/g, "");
		var company_name = document.forms.frm_newsletter_popup.company_name.value.replace(/^\s+|\s+$/g, "");
		var email = document.forms.frm_newsletter_popup.email.value.replace(/^\s+|\s+$/g, "");
		var contact_number = document.forms.frm_newsletter_popup.contact_number.value.replace(/^\s+|\s+$/g, "");

		var error = "";

		if (name == "") {
			error = "Please enter a name and try again";
		}
		else if (email == "") {
			error = "Please enter an email and try again";
		}
		else if (contact_number == "") {
			error = "Please enter a contact number and try again";
		}

		if (error == "") {
			if (document.pct) {
				setTimeout(function() { gtag('event', 'conversion', {'send_to': 'AW-798371384/NnHFCKXwps8BELjc2PwC'}) }, 10)
			}

			var self = this;
			this.$panel_ui.hide();
			this.$panel_wait.show();

			$.ajax({
				url: "/gate/newsletter-subscription.php",
				method: "POST",
				data: {
					key: document.forms.frm_newsletter_static.key.value,
					name: name,
					company_name: company_name,
					email: email,
					contact_number: contact_number
				}
			})
			.then(function (data) {
				if (data == "OK") {
					self.$panel_wait.hide();
					self.$panel_success.show();
				}
				else if (data.substr(0, 6) == "ERROR ") {
					self.$panel_wait.hide();
					self.$panel_error.show();
					self.$panel_error_msg.text("Server error: " + data.substr(6));
				}
				else {
					self.$panel_wait.hide();
					self.$panel_error.show();
					self.$panel_error_msg.text("Unknown error while trying to communicate with server");
				}
			})
			.catch(function (arg) {
				self.$panel_wait.hide();
				self.$panel_error.show();
				self.$panel_error_msg.text("Unable to communicate with server");
				console.log(arg);
			});
		}
		else {
			alert("Error: " + error);
		}

		return false;
	},

	init: function () {
		var self = this;

		this.$backdrop = $(".newsletter__backdrop");
		this.$panel = $(".newsletter-container");

		this.$body = $("body");
		this.$panel_wait = $(".newsletter-wait");
		this.$panel_success = $(".newsletter-success");
		this.$panel_error = $(".newsletter-error");
		this.$panel_error_msg = $(".newsletter-error p");
		this.$panel_ui = $(".newsletter-ui");

		$(document.forms.frm_newsletter_static).submit(function () {
			self.open_form(document.forms.frm_newsletter_static.email.value.replace(/^\s+|\s+$/g, ""));
			return false;
		});

		$(document.forms.frm_newsletter_popup).submit(function () {
			self.process_form();
			return false;
		});

		$(".newsletter-ui__ctrl-btns input[type=button]").click(function () {
			self.clear_form("");
		});

		$(".newsletter-ui__close img, .newsletter-container, .newsletter-msg button").click(function () {
			self.close_form();
		});

		$(".newsletter-ui").click(function (e) {
			e.stopPropagation();
		});

		$(document).keyup(function(e) {
			if (e.keyCode == 27) {
				self.close_form();
			}
		});
	}

}

$(document).ready(function () {
	if (document.cookie.indexOf("privp_aware") == -1) {
		let body = document.querySelector("body")
		let div = document.createElement("div")
		body.appendChild(div)
		div.className = "privp_notice"
		div.innerHTML = 'We have updated our Privacy &amp; Cookie policy. <span><a href="/privacy">Learn more</a> <button>I AGREE</button></span>'

		document.querySelector(".privp_notice button").onclick = function () {
			document.cookie = "privp_aware=true; path=/; expires=Fri, 31 Dec 9999 23:59:59 GMT"
			document.querySelector(".privp_notice").className += " privp_notice--hidden"

			gtag("consent", "update", {
				"ad_storage": "granted",
				"ad_user_data": "granted",
				"ad_personalization": "granted",
				"analytics_storage": "granted"
			});
		}
	}

	$("a.cnt-sp").each(function () {
		// ship / contact us
		var shipTitle = this.getAttribute("data-ship-title")
		if (shipTitle && document.pct) {
			setTimeout(function() { gtag('event', 'conversion', {'send_to': 'AW-798371384/n5zlCLmruIUBELjc2PwC'}) }, 10)
		}

		var st = 'snp' + '\u0040go' + String.fromCharCode(45) + '\u0073hi' + '\u0070p' + 'in' + 'g.' + '\u0063o' + String.fromCharCode(109);
		var d = this.getAttribute("data-extra");
		if (d) this.setAttribute("href", '\u006d' + 'ail' + String.fromCharCode(116) + '\u006f' + '\u003a' + st + d);
		else { this.innerHTML = st; this.setAttribute("href", 'mai' + 'lt' + String.fromCharCode(111) + '\u003a' + st); }
	});
	$("a.cnt-ch").each(function () {
		var st = '\u0063h' + '\u0061r' + 't' + 'e\u0072' + 'in' + 'g@' + 'g' + String.fromCharCode(111) + '\u002ds' + 'hip' + String.fromCharCode(112) + 'i\u006eg' + '\u002e' + 'co\u006d';
		var d = this.getAttribute("data-extra");
		if (d) this.setAttribute("href", String.fromCharCode(109) + 'a\u0069' + '\u006ct' + String.fromCharCode(111) + '\u003a' + st + d);
		else { this.innerHTML = st; this.setAttribute("href", '\u006da' + '\u0069l' + 'to' + ':' + st); }
	});
	$("a.cnt-nf").each(function () {
		var st = 'i' + 'n\u0066o' + String.fromCharCode(64) + String.fromCharCode(103) + String.fromCharCode(111) + '-s\u0068' + '\u0069' + '\u0070pi' + String.fromCharCode(110) + 'g' + '\u002e' + String.fromCharCode(99) + String.fromCharCode(111) + '\u006d';
		var d = this.getAttribute("data-extra");
		if (d) this.setAttribute("href", String.fromCharCode(109) + String.fromCharCode(97) + String.fromCharCode(105) + '\u006cto' + '\u003a' + st + d);
		else { this.innerHTML = st; this.setAttribute("href", String.fromCharCode(109) + String.fromCharCode(97) + 'i\u006c' + '\u0074o' + '\u003a' + st); }
	});
	$("a.cnt-op").each(function () {
		var st = String.fromCharCode(111) + '\u0070' + 's\u0040g' + 'o-' + 'sh' + String.fromCharCode(105) + '\u0070p' + String.fromCharCode(105) + 'n\u0067' + '\u002ec' + String.fromCharCode(111) + '\u006d';
		var d = this.getAttribute("data-extra");
		if (d) this.setAttribute("href", 'mai' + 'l' + 'to:' + st + d);
		else { this.innerHTML = st; this.setAttribute("href", '\u006d' + String.fromCharCode(97) + String.fromCharCode(105) + 'lto' + '\u003a' + st); }
	});

	newsletter.init();
});

$(window).on("load", function (e) {
	goshipping.init();
});
