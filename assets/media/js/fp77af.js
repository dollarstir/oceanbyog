
var fpgallery = {

	current_idx: 0,
	running: true,

	ani_css_node: null,
	ani_oversize: 1.1,
	ani_bgsize_duration: "5s",
	ani_bgopacity_duration: "3s", // 1s -*
	ani_bg_type: 1,
	ani_title_start_opacity: 0,
	ani_title_distance: "20px",
	ani_title_duration: "1s",
	ani_title_type: 1,
	last_bg_size: "",

	size_class: "",
	size_classes: ["wLarge", "w1400", "w840", "w480"],

	$win: null,
	$backdrop: null,
	$stage: null,
	$image_loader: null,
	image_sets: [],
	thumbs: [],
	$title: null,
	$subtitle: null,

	image_css_classes: "",

	auto_rotation_timeout: 0,
	auto_rotation_interval: 8000,

	STATE_IDLE: 0,
	STATE_QUEUE: 1,
	STATE_LOADING: 2,
	STATE_LOADED: 3,

	titles: [
		["Large Network", "Exposure to worldwide clientele"],
		["Professional Service", "Highly qualified SNP & Charter brokers/team"],
		["Experience & Reliability", "Vast number of closed deals"],
		["It's Free", "Commission remitted only after successful sale"],
		["Turn-Key Services", "Customized to your needs"]
	],

	set_running: function (value) {
		this.running = value;

		if (this.running) {
			if (this.auto_rotation_timeout > 0) {
				this.auto_rotation_timeout = (new Date()).getTime() + this.auto_rotation_interval;
			}
		}
	},

	on_user_activity: function () {
		if (this.auto_rotation_timeout > 0) {
			this.auto_rotation_timeout = (new Date()).getTime() + this.auto_rotation_interval;
		}
	},

	on_image_load: function (img) {
		var size_class = img.getAttribute("data-size-class");
		var idx = parseInt(img.getAttribute("data-idx"), 10);

		this.image_sets[idx][size_class].$loader.remove();
		this.image_sets[idx][size_class].width = img.width;
		this.image_sets[idx][size_class].height = img.height;
		this.image_sets[idx][size_class].state = this.STATE_LOADED;

		if (size_class == this.size_class) {
			this.thumbs[idx].removeClass("section-home__thumb--loading");
		}

		this.load_next_image();
	},

	load_next_image: function () {
		// if another image is loading, wait
		for (var i = 0; i < this.image_sets.length; i++) {
			if (this.image_sets[i][this.size_class].state == this.STATE_LOADING) {
				return;
			}
		}

		var load_idx = -1;

		if (this.image_sets[this.current_idx][this.size_class].state == this.STATE_QUEUE) {
			// load current image
			load_idx = this.current_idx;
		}
		else {
			// load next image in queue
			for (var i = 0; i < this.image_sets.length; i++) {
				if (this.image_sets[i][this.size_class].state == this.STATE_QUEUE) {
					load_idx = i;
					break;
				}
			}
		}

		if (load_idx > -1) {
			var self = this;
			this.image_sets[load_idx][this.size_class].state = this.STATE_LOADING;
			this.image_sets[load_idx][this.size_class].$loader = $("<img>")
				.appendTo(this.$image_loader)
				.attr("data-size-class", this.size_class)
				.attr("data-idx", load_idx)
				.bind("load", function () { self.on_image_load(this); })
				.attr("src", this.image_sets[load_idx][this.size_class].src);
		}
	},

	on_resize: function () {
		var win_w = this.$win.width(), win_h = this.$win.height();

/*
		var new_size_class;
		if (win_w <= 480) {
			new_size_class = "w480";
		}
		else if (win_w <= 840) {
			new_size_class = "w840";
		}
		else if (win_w <= 1400) {
			new_size_class = "w1400";
		}
		else {
			new_size_class = "wLarge";
		}
*/
		var size_classes = ["w480", "w840", "w1400", "wLarge"];
		var new_size_class;
		if (win_w <= 480) {
			new_size_class = 0;
		}
		else if (win_w <= 840) {
			new_size_class = 1;
		}
		else if (win_w <= 1400) {
			new_size_class = 2;
		}
		else {
			new_size_class = 3;
		}
		//new_size_class = new_size_class < 3 ? new_size_class + 1 : new_size_class - 1;
		new_size_class = size_classes[new_size_class];

		if (new_size_class != this.size_class) {
			this.size_class = new_size_class;

			var self = this;

			// load images
			for (var i = 0; i < this.image_sets.length; i++) {
				if (this.image_sets[i][this.size_class].state == this.STATE_IDLE) {
					this.image_sets[i][this.size_class].state = this.STATE_QUEUE;
				}

				this.thumbs[i].removeClass("section-home__thumb--loading");
				if (this.image_sets[i][this.size_class].state < this.STATE_LOADED) {
					this.thumbs[i].addClass("section-home__thumb--loading");
				}
			}

			this.load_next_image();
		}

		this.last_bg_size = "cover";
		this.$stage.removeClass("section-home__ani-step1 section-home__ani-step2");

		this.on_user_activity();
	},

	open_image: function (idx) {
		if (idx != this.current_idx && this.image_sets[idx][this.size_class].state == this.STATE_LOADED) {
			var previous_idx = this.current_idx;
			this.$stage.removeClass("section-home-image" + this.current_idx);
			this.thumbs[this.current_idx].removeClass("section-home__thumb--selected");

			this.current_idx = idx;

			this.$stage.addClass("section-home-image" + this.current_idx);
			this.thumbs[this.current_idx].addClass("section-home__thumb--selected");

			this.$title.text(idx < this.titles.length ? this.titles[idx][0] : "--");
			this.$subtitle.text(idx < this.titles.length ? this.titles[idx][1] : "--");


			var ani_css_content = "";

			var win_w = this.$win.width(), win_h = this.$win.height();
			var img_w = this.image_sets[this.current_idx][this.size_class].width;
			var img_h = this.image_sets[this.current_idx][this.size_class].height;

			var sz_h = win_h;
			var sz_w = img_w * win_h / img_h;
			if (sz_w < win_w) {
				sz_h = win_w * img_h / img_w;
				sz_w = win_w;
			}

			this.ani_bg_type++;
			if (this.ani_bg_type > 2) {
				this.ani_bg_type = 1;
			}

			if (this.ani_bg_type == 1) {
				var sz1_w = sz_w, sz1_h = sz_h, sz2_w = sz_w * this.ani_oversize, sz2_h = sz_h * this.ani_oversize
			}
			else {
				var sz1_w = sz_w * this.ani_oversize, sz1_h = sz_h * this.ani_oversize, sz2_w = sz_w, sz2_h = sz_h
			}

			this.ani_title_type++;
			if (this.ani_title_type > 3) {
				this.ani_title_type = 1;
			}

			if (this.ani_title_type == 1) {
				ani_css_content +=
					  ".section-home__title-step1 {\n"
					+ "    left: -" + this.ani_title_distance + ";\n"
					+ "    opacity: " + this.ani_title_start_opacity + "\n"
					+ "}\n"
					+ ".section-home__subtitle-step1 {\n"
					+ "    left: " + this.ani_title_distance + ";\n"
					+ "    opacity: " + this.ani_title_start_opacity + "\n"
					+ "}\n";
			}
			else if (this.ani_title_type == 2) {
				ani_css_content +=
					  ".section-home__title-step1 {\n"
					+ "    left: " + this.ani_title_distance + ";\n"
					+ "    opacity: " + this.ani_title_start_opacity + "\n"
					+ "}\n"
					+ ".section-home__subtitle-step1 {\n"
					+ "    left: -" + this.ani_title_distance + ";\n"
					+ "    opacity: " + this.ani_title_start_opacity + "\n"
					+ "}\n";
			}
			else if (this.ani_title_type == 3) {
				ani_css_content +=
					  ".section-home__title-step1 {\n"
					+ "}\n"
					+ ".section-home__subtitle-step1 {\n"
					+ "    top: " + this.ani_title_distance + ";\n"
					+ "    opacity: " + this.ani_title_start_opacity + "\n"
					+ "}\n";
			}

			this.$backdrop.removeClass(this.image_css_classes).addClass("section-home-image" + previous_idx);
			if (this.last_bg_size != "") {
				ani_css_content +=
					  ".section-home {\n"
					+ "    background-size: " + this.last_bg_size + ";\n"
					+ "}\n";
			}

			this.last_bg_size = Math.round(sz2_w) + "px " + Math.round(sz2_h) + "px";
			ani_css_content +=
				  ".section-home__title-step2 {\n"
				+ "    left: 0;\n"
				+ "    top: 0;\n"
				+ "    opacity: 1;\n"
				+ "    transition: left " + this.ani_title_duration + " ease-out, top " + this.ani_title_duration + " ease-out, opacity " + this.ani_title_duration + " ease-out;\n"
				+ "}\n"
				+ ".section-home__subtitle-step2 {\n"
				+ "    left: 0;\n"
				+ "    top: 0;\n"
				+ "    opacity: 1;\n"
				+ "    transition: left " + this.ani_title_duration + " ease-out, top " + this.ani_title_duration + " ease-out, opacity " + this.ani_title_duration + " ease-out;\n"
				+ "}\n"
				+ ".section-home__ani-step1 {\n"
				+ "    opacity: 0;\n"
				+ "    background-size: " + Math.round(sz1_w) + "px " + Math.round(sz1_h) + "px;\n"
				+ "}\n"
				+ ".section-home__ani-step2 {\n"
				+ "    opacity: 1;\n"
				+ "    background-size: " + this.last_bg_size + ";\n"
				+ "    transition: background-size " + this.ani_bgsize_duration + ", opacity " + this.ani_bgopacity_duration + ";\n"
				+ "}\n";

			if (this.ani_css_node !== null) {
				this.ani_css_node.parentNode.removeChild(this.ani_css_node);
			}
			this.ani_css_node = document.createElement("style");
			this.ani_css_node.type = "text/css";
			document.getElementsByTagName("head")[0].appendChild(this.ani_css_node);
			this.ani_css_node.appendChild(document.createTextNode(ani_css_content));

			this.$stage.removeClass("section-home__ani-step1 section-home__ani-step2").addClass("section-home__ani-step1");
			this.$title.removeClass("section-home__title-step1 section-home__title-step2").addClass("section-home__title-step1");
			this.$subtitle.removeClass("section-home__subtitle-step1 section-home__subtitle-step2").addClass("section-home__subtitle-step1");

			var self = this;
			setTimeout(function () {
				self.$stage.removeClass("section-home__ani-step1").addClass("section-home__ani-step2");
				self.$title.removeClass("section-home__title-step1").addClass("section-home__title-step2");
				self.$subtitle.removeClass("section-home__subtitle-step1").addClass("section-home__subtitle-step2");
			}, 10);
		}
	},

	on_timer: function () {
		var now = (new Date()).getTime();

		if (this.auto_rotation_timeout > 0 && now >= this.auto_rotation_timeout && this.running) {
			var idx = this.current_idx + 1;
			if (idx >= this.image_sets.length) {
				idx = 0;
			}

			if (this.image_sets[idx][this.size_class].state == this.STATE_LOADED) {
				this.auto_rotation_timeout = (new Date()).getTime() + this.auto_rotation_interval;
				this.open_image(idx);
			}
		}
	},

	init: function () {
		if (typeof window.fp_image_sources != "object" || window.fp_image_sources.length <= 1) {
			return;
		}

		this.$win = $(window);
		var self = this;
		this.$backdrop = $(".section-home-backdrop");
		this.$stage = $(".section-home-bg");
		this.$image_loader = $("#image-loader");
		var $thumbs_box = $(".section-home__thumbs").empty();
		this.$title = $(".section-home__title");
		this.$subtitle = $(".section-home__subtitle");

		for (var i = 0; i < window.fp_image_sources.length; i++) {
			this.image_css_classes += "section-home-image" + i + " ";

			var image_set = {};

			for (var k = 0; k < this.size_classes.length; k++) {
				image_set[this.size_classes[k]] = {
					state: this.STATE_IDLE,
					$loader: null,
					width: 0,
					height: 0,
					src: window.fp_image_sources[i][this.size_classes[k]]
				};
			}

			this.image_sets.push(image_set);

			var $thumb = $("<span>")
				.appendTo($thumbs_box)
				.addClass("section-home__thumb")
				.addClass("section-home__thumb--loading")
				.attr("idx", i)
				.click(function () {
					self.open_image(parseInt(this.getAttribute("idx"), 10));
				});
			this.thumbs.push($thumb);
		}

		this.thumbs[0].addClass("section-home__thumb--selected");

		this.auto_rotation_timeout = (new Date()).getTime() + this.auto_rotation_interval;

		this.on_user_activity();
		this.timer = setInterval(function () { self.on_timer(); }, 100);

		this.$win.mousemove(function (e) {
			self.on_user_activity();
		});

		this.$win.resize(function () {
			self.on_resize();
		});

		this.on_resize();
	}

};


var promo_gallery = {

	$frame: null,
	$box: null,
	css_node: null,
	items: [],
	separators: [],

	visible_count: 0,
	first_rotation: true,
	rotation_enabled: false,

	ani_duration: "2s", // css transition time
	show_duration: 8000, // msec
	show_timeout: 0,

	on_user_activity: function () {
		if (this.rotation_enabled) {
			this.show_timeout = (new Date()).getTime() + this.show_duration;
		}
	},

	on_timer: function () {
		if (this.rotation_enabled) {
			var now = (new Date()).getTime();

			if (this.show_timeout > 0 && now > this.show_timeout) {
				// time to move the frame to the next image set

				this.show_timeout = now + this.show_duration;

				if (this.first_rotation) {
					this.first_rotation = false;
				}
				else {
					// reset from the previous rotation

					this.$box.removeClass("promo_move_position");

					for (var i = 0; i < this.visible_count; i++) {
						var item = this.separators.shift();
						this.separators.push(item);
						item.parentNode.appendChild(item);

						var item = this.items.shift();
						this.items.push(item);
						item.parentNode.appendChild(item);
					}
				}

				var self = this;
				setTimeout(function () { self.$box.addClass("promo_move_position"); }, 50);
			}
		}
	},

	on_resize: function () {
		if (this.css_node !== null) {
			this.css_node.parentNode.removeChild(this.css_node);
		}
		this.first_rotation = true;
		this.$box.removeClass("promo_move_position");

		var frame_w = this.$frame.width();
		var item_w = $(this.items[0]).width();
		this.visible_count = Math.floor(frame_w / item_w);

		if (this.items.length < this.visible_count) {
			this.visible_count = this.items.length;
		}

		if (this.visible_count == 0) {
			this.visible_count = 1;
		}

		var gap_w = (frame_w - this.visible_count * item_w) / (this.visible_count + 1);
		for (var i = 0; i < this.separators.length; i++) {
			$(this.separators[i]).css({width: gap_w + "px"});
		}

		this.css_node = document.createElement("style");
		this.css_node.type = "text/css";
		document.getElementsByTagName("head")[0].appendChild(this.css_node);
		this.css_node.appendChild(document.createTextNode(".promo_move_position { margin-left: -" + (frame_w - gap_w) + "px; transition: margin-left " + this.ani_duration + "; }"));

		this.rotation_enabled = this.items.length * item_w > frame_w;
		this.on_user_activity();
	},

	init: function () {
		this.$frame = $(".section-home-promotions__items-frame");
		this.$box = $(".section-home-promotions__items");
		var $items = $(".section-home-promotions__item");
		var $separators = $(".section-home-promotions__item__separator");
		if (this.$frame.length == 0 || this.$box.length == 0 || $items.length == 0) {
			return;
		}

		this.$box.contents().filter(function() { return this.nodeType === Node.TEXT_NODE; }).remove(); // remove gaps (text nodes)

		var self = this;

		for (var i = 0; i < $items.length; i++) {
			this.items.push($items[i]);
			this.separators.push($separators[i]);
		}

		$(".section-home-promotions__item a").each(function () {
			$(this.parentNode)
				.attr("data-url", this.href)
				.click(function () { window.location = this.getAttribute("data-url"); });
		});

		$(window).resize(function () {
			self.on_resize();
		});

		setInterval(function () { self.on_timer(); }, 100);
		this.on_resize();
	}

};


$(window).on("load", function (e) {
	fpgallery.init();
	promo_gallery.init();
});
