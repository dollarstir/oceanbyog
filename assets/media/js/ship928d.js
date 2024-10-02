
var super_gallery = {

	image_path: "",
	move_threshold: 30,

	$win: null,
	$body: null,
	$widget: null,
	$title: null,
	$thumbs: null,
	data: {},
	win_y: -1,
	image_x: 0,
	current_id: 0,
	current_img_idx: -1,
	size_class: "",
	pointer_x0: null,
	pointer_x1: null,

	$loader_box: null,
	$loader_image: null,
	loader_previous_img_idx: -1,
	loader_timer: 0,

	clear_selection: function () {
		if (window.getSelection && window.getSelection().empty) {
			window.getSelection().empty();
		}
		else if (window.getSelection && window.getSelection().removeAllRanges) {
			window.getSelection().removeAllRanges();
		}
		else if (document.selection) {
			document.selection.empty();
		}
	},

	update_main_image_size: function () {
		var pos = this.$main_frame.offset();
		this.image_x = pos.left;
		this.$main_image.css({
			left: pos.left + "px",
			top: pos.top + "px",
			width: this.$main_frame.width(),
			height: this.$main_frame.height()
		});
	},

	on_image_load: function (img) {
		if (this.loader_timer != 0) {
			clearTimeout(this.loader_timer);
		}

		this.$main_frame.removeClass("shipview__gallery__main__content--loading");
		this.$main_image.css({backgroundImage: "url(" + img.src + ")"});
		this.$loader_image.remove();
		this.$loader_image = null;

		if (this.loader_timer != 0 && this.loader_previous_img_idx > -1) {
			if (this.current_img_idx > this.loader_previous_img_idx) {
				this.$main_image.stop().css({left: (this.image_x + 200) + "px", opacity: 0.5}).animate({left: this.image_x + "px", opacity: 1})
			}
			else {
				this.$main_image.stop().css({left: (this.image_x - 200) + "px", opacity: 0.5}).animate({left: this.image_x + "px", opacity: 1})
			}
		}

		this.loader_timer = 0;
		this.loader_previous_img_idx = -1;
	},

	update_main_image: function () {
		if (this.current_id > 0 && this.current_img_idx > -1) {
			if (this.$loader_image !== null) {
				this.$loader_image.remove();
			}

			if (this.loader_timer != 0) {
				clearTimeout(this.loader_timer);
			}

			this.$main_image.css({backgroundImage: "url()"});
			this.update_main_image_size();

			var self = this;
			this.loader_timer = setTimeout(function () {
				self.loader_timer = 0;
				self.$main_frame.addClass("shipview__gallery__main__content--loading");
			}, 100);

			this.$loader_image = $("<img>")
				.appendTo(this.$loader_box)
				.bind("load", function () { self.on_image_load(this); })
				.attr("src", this.image_path + "/" + this.current_id + "-" + (this.current_img_idx < 9 ? "0" : "") + (this.current_img_idx + 1) + "-" + this.size_class + ".jpg");
		}
	},

	open_image: function (img_idx) {
		if (img_idx != this.current_img_idx) {
			this.loader_previous_img_idx = this.current_img_idx;
			if (this.loader_previous_img_idx > -1) {
				this.data["gallery" + this.current_id].$thumbs[this.current_img_idx].removeClass("selected");
			}

			this.current_img_idx = img_idx;
			this.data["gallery" + this.current_id].$thumbs[this.current_img_idx].addClass("selected");
			this.update_main_image();

			if (this.loader_previous_img_idx > -1) {
				if (this.current_img_idx > this.loader_previous_img_idx) {
					this.$main_image.stop().css({left: (this.image_x + 200) + "px", opacity: 0.5}).animate({left: this.image_x + "px", opacity: 1})
				}
				else {
					this.$main_image.stop().css({left: (this.image_x - 200) + "px", opacity: 0.5}).animate({left: this.image_x + "px", opacity: 1})
				}
			}
		}
	},

	open_gallery: function (id, img_idx) {
		this.win_y = this.$win.scrollTop();
		this.$body.css({overflow: "hidden"});
		this.$widget.fadeIn();
		this.$main_image.css({display: "block", backgroundImage: "url()"});
		var self = this;

		if (id != this.current_id) {
			// load thumbs

			var data_item = this.data["gallery" + id];
			this.$thumbs.empty();

			this.current_id = id;
			this.current_img_idx = -1;
			data_item.$thumbs = [];
			this.$title.html(data_item.title_html);

			for (var i = 0; i < data_item.image_count; i++) {
				var $img = $("<img>")
					.appendTo(this.$thumbs)
					.attr("src", this.image_path + "/" + id + "-" + (i < 9 ? "0" : "") + (i + 1) + "-listThumb.jpg")
					.attr("img_idx", i)
					.click(function (e) {
						e.stopPropagation();
						self.clear_selection();

						self.open_image(parseInt(this.getAttribute("img_idx"), 10));
					});

				if (i == img_idx) {
					$img.addClass("selected");
				}

				data_item.$thumbs.push($img);
			}
		}

		this.open_image(img_idx);
	},

	nextPrevious_gallery: function (go_next) {
		var gallery_idx = -1, keys = [], idx = -1;
		for (var k in this.data) {
			if (this.data.hasOwnProperty(k)) {
				keys.push(k);

				idx++;
				if (this.data[k].id == this.current_id) {
					gallery_idx = idx;
				}
			}
		}

		if (go_next) {
			if (gallery_idx < keys.length - 1) {
				this.open_gallery(this.data[keys[gallery_idx + 1]].id, 0);
			}
		}
		else {
			if (gallery_idx > 0) {
				this.open_gallery(this.data[keys[gallery_idx - 1]].id, 0);
			}
		}
	},

	nextPrevious_image: function (go_next) {
		if (go_next) {
			if (this.current_img_idx < this.data["gallery" + this.current_id].image_count - 1) {
				this.open_image(this.current_img_idx + 1);
				return true;
			}
		}
		else {
			if (this.current_img_idx > 0) {
				this.open_image(this.current_img_idx - 1);
				return true;
			}
		}

		return false;
	},

	close_gallery: function () {
		if (this.win_y == -1 || this.pointer_x0 !== null) {
			return;
		}

		this.win_y = -1;
		this.current_id = 0;
		this.current_img_idx = -1;

		this.$main_image.fadeOut();
		this.$widget.fadeOut();
		this.$body.css({overflow: "visible"});
	},

	on_resize: function () {
		this.update_main_image_size();

		var win_w = this.$win.width(), new_size_class;

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

		if (new_size_class != this.size_class) {
			this.size_class = new_size_class;
			this.update_main_image();
		}
	},

	init: function () {
		var self = this;
		this.$win = $(window);
		this.$body = $("body");

		this.$widget = $(".shipview__gallery");
		this.$title = $(".shipview__gallery__header__title");
		this.$thumbs = $(".shipview__gallery__thumbs");
		this.$main_frame = $(".shipview__gallery__main__content");

		this.$loader_box = $("<div>").appendTo(this.$body)
			.css({position: "absolute", left: "5px", top: "5px", width: "1px", height: "1px", overflow: "hidden", visibility: "hidden"});

		this.$main_image = $("<div>")
			.appendTo(this.$body)
			.css({
				position: "absolute",
				display: "none",
				backgroundRepeat: "no-repeat",
				backgroundPosition: "center center",
				backgroundSize: "contain",
			})
			.on("mousedown", function (e) {
				self.pointer_x0 = e.pageX;
				self.pointer_x1 = self.pointer_x0;
			})
			.on("touchstart", function (e) {
				self.pointer_x0 = e.originalEvent.touches[0].pageX;
				self.pointer_x1 = self.pointer_x0;
			});

		this.$win
			.on("mousemove", function (e) {
				if (self.pointer_x0 !== null) {
					self.pointer_x1 = e.pageX
					self.$main_image.css({left: self.image_x + self.pointer_x1 - self.pointer_x0});
				}
			})
			.on("touchmove", function (e) {
				if (self.pointer_x0 !== null) {
					self.pointer_x1 = e.originalEvent.touches[0].pageX;
					self.$main_image.css({left: self.image_x + self.pointer_x1 - self.pointer_x0});
				}
			})
			.on("touchend mouseup", function (e) {
				if (self.pointer_x0 !== null) {
					var diff = self.pointer_x1 - self.pointer_x0;
					self.pointer_x0 = null;
					self.pointer_x1 = null;

					var handled = false;
					if (diff < -self.move_threshold) {
						handled = self.nextPrevious_image(true);
					}
					else if (diff > self.move_threshold) {
						handled = self.nextPrevious_image(false);
					}

					if (!handled) {
						self.$main_image.animate({left: self.image_x});
					}
				}
			})
			.on("touchcancel", function (e) {
				if (self.pointer_x0 !== null) {
					self.$main_image.animate({left: self.image_x});
					self.pointer_x0 = null;
					self.pointer_x1 = null;
				}
			});


		// load content and set up open image events

		$(".shipview__ship").each(function (idx, obj) {
			var $obj = $(obj);

			var data_item = {
				id: parseInt(obj.getAttribute("data-id"), 10),
				image_count: parseInt(obj.getAttribute("data-images"), 10),
				title_html: $obj.find("h2 a").html()
			};

			if (data_item.image_count > 0) {
				$obj.find(".shipview__ship__main-img")
					.attr("id", data_item.id)
					.attr("img_idx", 0)
					.click(function () {
						self.clear_selection();
						self.open_gallery(parseInt(this.getAttribute("id"), 10), parseInt(this.getAttribute("img_idx"), 10));
					});

				$obj.find(".shipview__ship__content__gallery__img").each(function (idx, obj) {
					obj.setAttribute("id", data_item.id);
					obj.setAttribute("img_idx", idx + 1);
					$(obj).click(function () {
						self.clear_selection();
						self.open_gallery(parseInt(this.getAttribute("id"), 10), parseInt(this.getAttribute("img_idx"), 10));
					});
				});
			}

			self.data["gallery" + data_item.id] = data_item;
		});


		// miscellaneous settings

		this.image_path = this.$widget.attr("data-image-path");

		this.$win.resize(function () {
			self.on_resize();
		});

		$(".shipview__gallery__header__previous").click(function (e) {
			e.stopPropagation();
			self.clear_selection();
			self.nextPrevious_gallery(false);
		});

		$(".shipview__gallery__header__next").click(function (e) {
			e.stopPropagation();
			self.clear_selection();
			self.nextPrevious_gallery(true);
		});

		$(".shipview__gallery__main__previous").click(function (e) {
			e.stopPropagation();
			self.clear_selection();
			self.nextPrevious_image(false);
		});

		$(".shipview__gallery__main__next").click(function (e) {
			e.stopPropagation();
			self.clear_selection();
			self.nextPrevious_image(true);
		});

		$(".shipview__gallery__header__close").click(function () {
			self.clear_selection();
			self.close_gallery();
		});

		$(document).keyup(function(e) {
			if (e.keyCode == 27) {
				self.close_gallery();
			}
		});

		this.$win.scroll(function () {
			if (self.win_y > -1) {
				self.$win.scrollTop(self.win_y);
			}
		});

		this.on_resize();
	}

};


var thumbs_gallery = {

	$win: null,
	$viewports: null,
	$stages: null,
	stage_count: 0,
	$images: null,
	stage_images: [],
	stage_images_count: [],
	stage_gaps: [],
	stage_current_idx: [],
	stage_gap_width: [],
	max_images: 0,
	img_width: 0,

	on_resize: function () {
		this.$stages.css({display: "none"});
		this.$viewports.css({width: "auto"});
		var viewport_width = $(this.$viewports[0]).width();
		this.$viewports.css({width: viewport_width + "px"});
		this.$stages.css({display: "block"});

		this.img_width = $(this.$images[0]).outerWidth();
		var min_gap_width = 4;
		this.max_images = Math.floor(viewport_width / (this.img_width + min_gap_width));

		for (var i_stage = 0; i_stage < this.$stages.length; i_stage++) {
			this.stage_gaps[i_stage].css({marginLeft: 0});

			var image_count = this.stage_images_count[i_stage];
			if (image_count <= this.max_images) {
				// case: few images - center thumbs

				this.stage_gaps[i_stage].css({width: min_gap_width + "px"});
				var left_gap = (viewport_width - this.img_width * image_count - min_gap_width * (image_count + 1)) / 2;
				$(this.stage_gaps[i_stage][0]).css({marginLeft: left_gap + "px"});
				this.stage_current_idx[i_stage] = -1;
			}
			else {
				// case: many images

				this.stage_gap_width[i_stage] = (viewport_width - this.img_width * this.max_images) / (this.max_images + 1);
				this.stage_gaps[i_stage].css({width: this.stage_gap_width[i_stage] + "px"});

				if (this.stage_current_idx[i_stage] == -1) {
					this.stage_current_idx[i_stage] = 0;
				}
	
				if (this.stage_current_idx[i_stage] > this.stage_images_count[i_stage] - this.max_images) {
					this.stage_current_idx[i_stage] = this.stage_images_count[i_stage] - this.max_images;
				}

				$(this.$stages[i_stage]).stop().animate({marginLeft: "-" + (this.stage_current_idx[i_stage] * (this.img_width + this.stage_gap_width[i_stage])) + "px"});
			}
		}
	},

	move_left: function (i_stage) {
		if (this.stage_current_idx[i_stage] > 0) {
			var new_idx = this.stage_current_idx[i_stage] - this.max_images;
			if (new_idx < 0) {
				new_idx = 0;
			}
			this.stage_current_idx[i_stage] = new_idx;
			$(this.$stages[i_stage]).stop().animate({marginLeft: "-" + (new_idx * (this.img_width + this.stage_gap_width[i_stage])) + "px"});
		}
	},

	move_right: function (i_stage) {
		if (this.stage_current_idx[i_stage] > -1 && this.stage_current_idx[i_stage] < this.stage_images_count[i_stage] - this.max_images) {
			var new_idx = this.stage_current_idx[i_stage] + this.max_images;
			if (new_idx > this.stage_images_count[i_stage] - this.max_images) {
				new_idx = this.stage_images_count[i_stage] - this.max_images;
			}
			this.stage_current_idx[i_stage] = new_idx;
			$(this.$stages[i_stage]).stop().animate({marginLeft: "-" + (new_idx * (this.img_width + this.stage_gap_width[i_stage])) + "px"});
		}
	},

	init: function () {
		var self = this;
		this.$win = $(window);
		this.$viewports = $(".shipview__ship__content__gallery__images-viewport");
		this.$stages = $(".shipview__ship__content__gallery__images-stage");
		this.stage_count = this.$stages.length;
		this.$images = $(".shipview__ship__content__gallery__img");

		if (this.$images.length == 0) {
			return;
		}

		// remove text nodes
		this.$stages.contents().filter(function() { return this.nodeType === Node.TEXT_NODE; }).remove();

		// count how many images are in each stage
		this.$stages.each(function () {
			var $images = $(this).find(".shipview__ship__content__gallery__img");
			self.stage_images.push($images);
			self.stage_images_count.push($images.length);
			self.stage_gaps.push($(this).find(".shipview__ship__content__gallery__img-gap"));
			self.stage_current_idx.push(-1);
			self.stage_gap_width.push(0);
		})

		$(".shipview__ship__content__gallery__previous").each(function (idx) {
			$(this).attr("idx", idx).click(function () {
				self.move_left(parseInt(this.getAttribute("idx"), 10));
			});
		});

		$(".shipview__ship__content__gallery__next").each(function (idx) {
			$(this).attr("idx", idx).click(function () {
				self.move_right(parseInt(this.getAttribute("idx"), 10));
			});
		});

		this.$win.resize(function () {
			self.on_resize();
		});

		this.on_resize();
	}

}


var filters = {

	$tag: null,
	$stage: null,
	$viewport: null,
	$list: null,
	$win: null,
	$body: null,

	tag_width: 0,

	is_open: false,

	open_stage: function () {
		this.is_open = true;
		var win_w = this.$win.width();
		var tag_pos = this.$tag.offset();

		this.$stage.appendTo(this.$body).css({display: "block", position: "absolute", visibility: "hidden"});
		var stage_w = this.$stage.outerWidth(), stage_h = this.$stage.outerHeight();

		this.$tag.removeClass("shipview__filters__tag--close")
			.css({left: win_w - this.tag_width}).animate({left: win_w - stage_w - this.tag_width});

		this.$viewport
			//.css({left: win_w, top: this.tag_top, width: 0, height: stage_h, display: "block"})
			.css({left: win_w, width: 0, height: stage_h, display: "block"})
			.animate({left: win_w - stage_w, width: stage_w});

		this.$stage.appendTo(this.$viewport).css({display: "block", position: "static", visibility: "visible"});
	},

	close_stage: function (animate) {
		this.is_open = false;
		var win_w = this.$win.width();
		var css_viewport = {left: win_w + "px", width: 0};

		this.$tag.addClass("shipview__filters__tag--close");

		if (animate) {
			var self = this;
			this.$viewport.animate(css_viewport);
			this.$tag.animate({left: win_w - this.tag_width}, 400, "swing", function () { self.$tag.css({left: ""}); });
		}
		else {
			this.$viewport.css(css_viewport);
			this.$tag.css({left: ""});
		}
	},

	on_resize: function () {
		if (this.is_open) {
			this.close_stage(false);
		}
	},

	on_submit: function () {
		var href = window.location.href, href_hash = "", href_vars = [];


		// identify URL query and hash

		var i = href.indexOf("#");
		if (i > -1) {
			href_hash = href.substr(i);
			href = href.substr(0, i);
		}

		i = href.indexOf("?");
		if (i > -1) {
			var vars = href.substr(i + 1).split("&");
			for (var k = 0; k < vars.length; k++) {
				var m = vars[k].indexOf("=");
				if (m == -1) {
					href_vars[vars[k]] = "";
				}
				else {
					href_vars[vars[k].substr(0, m)] = vars[k].substr(m + 1);
				}
			}

			href = href.substr(0, i);
		}


		// validate and store new filters

		var $elements = $(".shipview__filters__text");
		for (var i = 0; i < $elements.length; i++) {
			var val = $elements[i].value.replace(/^\s+|\s+$/g, "");
			if (val != "" && !val.match(/^\d+$/)) {
				alert("Error: Values in text fields must be regular numbers");
				return;
			}

			if (val == "") {
				if (href_vars.hasOwnProperty($elements[i].name)) {
					delete href_vars[$elements[i].name];
				}
			}
			else {
				href_vars[$elements[i].name] = val;
			}
		}


		// identify base pathname and active category

		var active_category = window.location.pathname;
		if (active_category != "" && active_category.substr(active_category.length - 1) == "/") {
			active_category = active_category.substr(0, active_category.length - 1);
		}
		var i = active_category.lastIndexOf("/");
		if (i > -1) {
			active_category = active_category.substr(i + 1);
		}
		var base_pathname = window.location.pathname.substr(0, window.location.pathname.length - active_category.length);


		// validate and store new categories

		var categories = [];
		var $elements = $(".shipview__filters__cb");
		for (var i = 0; i < $elements.length; i++) {
			if ($elements[i].checked) {
				categories.push($elements[i].name.substr(3)); // strip prefix cb_
			}
		}

		if (categories.length == 0) {
			alert("Error: One or more categories must be selected");
			return;
		}

		if (categories.length == 1) {
			if (href_vars.hasOwnProperty("categories")) {
				delete href_vars["categories"];
			}

			base_pathname += categories[0];
		}
		else {
			base_pathname += active_category;
			href_vars["categories"] = categories.join(",");
		}


		// build URL and go to it

		var query = "";
		for (var k in href_vars) {
			if (href_vars.hasOwnProperty(k) && k != "page") {
				if (query != "") {
					query += "&";
				}

				query += k + "=" + href_vars[k];
			}
		}

		if (query != "") {
			base_pathname += "?" + query;
		}

		window.location = base_pathname + href_hash;
	},

	init: function () {
		var self = this;

		this.$tag = $(".shipview__filters__tag").click(function () {
			if (self.is_open) {
				self.close_stage(true);
			}
			else {
				self.open_stage();
			}
		});

		this.tag_width = this.$tag.width();

		this.$stage = $(".shipview__filters__stage");

		this.$viewport = $("<div>").appendTo($("body")).addClass("shipview__filters__viewport");

		this.$list = $(".shipview__list");
		this.$win = $(window);
		this.$body = $("body");

		this.$win.resize(function () {
			self.on_resize();
		});

		$(".shipview__filters__stage input").keyup(function (e) {
			if (e.target.type == "text") {
				var st = e.target.value.replace(/^\s+|\s+$/g, "");
				$(e.target).css({borderColor: st == "" || st.match(/^\d+$/) ? "" : "#f00"});
			}
		});

		$(".shipview__filters__stage form").submit(function () { self.on_submit(); return false; });

		this.on_resize();
	}

}


$(document).ready(function () {

	super_gallery.init();

	thumbs_gallery.init();

	filters.init();

	$(".ship-url").each(function () {
		$t = $(this);
		$t.attr("data-url", $t.attr("href"));
		$t.attr("href", "javascript:void(0)");
		$t.click(function () {
			window.open(this.getAttribute("data-url"), "", "toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550");
		});
	});

});
