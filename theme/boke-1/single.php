<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package boke-1
 */

get_header(); 

$img_path = plugins_url().'/txt2img/img/p-'.get_the_ID().'.png';

if ( function_exists( 'boke_1_set_post_views' ) ) :
	boke_1_set_post_views(get_the_ID());
endif;
?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main" >

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			// the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
<div id="jump">
    手机打开
<img  src="http://bshare.optimix.asia/barCode?site=weixin&url=<?php echo the_permalink(); ?>" alt="<?php the_title(); ?>"/>
    <button id="kuaixun">点击生成快讯</button>
</div>
<div id="popup">
<div class="title">
  <p data-title="快讯"></p>
  <span>x</span>
</div>
<div class="cont">
    <img src="<?php echo $img_path; ?>" >
    </div>
</div>
<div id="mask_shadow"></div> 
<style>
#jump{position:fixed;top:300px;right:30px;width:80px;z-index:400;}
*html #jump{position:absolute;top:expression(documentElement.scrollTop + "px");margin:300px 0 0 0;}
#jump li{height:50px;overflow:hidden;}

    * { margin: 0; padding: 0; }
body { font-family: "Microsoft Yahei"; font-size: 16px; }

#mask_shadow {
  display: none;
  opacity: 0;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
}
#popup {
  display: none;
  opacity: 0; 
  position: absolute;
  z-index: 2;
  top: 150px;
  width: 600px;
  height: 190px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
}
#popup .title {
  position: relative;
  width: 100%;
  height: 55px;
  background-color: #5bc0de;
  cursor: move;
}
#popup .title p {
  padding-left: 14px;
  line-height: 55px;
  color: #fff;
}
#popup .title span {
  position: absolute;
  top: 12px;
  right: 20px;
  width: 30px;
  height: 30px;
  color: #000;
  opacity: .2;
  font-size: 21px;
  cursor: pointer;
  text-align: center;
  border: 1px solid #333;
}
#popup .title span:hover {
  opacity: .8;
}
#popup .cont { width: 100%; height: 135px; background-color: #EDEDED;    }
#btn1 {
  margin: 30px;
}
</style>
<script>
 $(function () {

  /**
	  ifDrag: 是否拖拽
	  dragLimit: 拖拽限制范围
   */
  $('#popup').popup({ifDrag: true, dragLimit: true});
  
});
    !(function ($, window, document, undefined) {

  var Plugin = function (elem, options) {
    this.$elem = elem;
    this.$btn = $('#kuaixun');
    this.$oMask = $('#mask_shadow');
    this.$oTitle = this.$elem.find('.title');
    this.$title_text = this.$oTitle.find('p');
    this.$close = this.$oTitle.find('span');

    this.b_stop = true; // 防止重复点击
    this.page_w = $(window).width();
    this.page_h = $(window).height();

    this.defaults = {
      ifDrag: false,
      dragLimit: false
    };

    this.opts = $.extend({}, this.defaults, options);
  };

  Plugin.prototype = {
    inital: function () { // 初始化
      var self = this;

      this.$title_text.text(this.$title_text.attr('data-title'));
      this.$elem.css({left: (this.page_w - this.$elem.width()) / 2});

      this.$elem.on('click', function () {
        return false;
      });

      this.$btn.on('click', function () {
        self.popbox();

        self.b_stop = false;

        return false;
      });

      this.$close.on('click', function () {
        self.closePopbox();

        return false;
      });

      $(document.body).on('click', function () {
        self.closePopbox();
      });

      // 拖拽事件
      this.$oTitle.on('mousedown', function (ev) {
        if (self.opts.ifDrag) {
          self.drag(ev);
        }

        return false;
      });
    },

    popbox: function () { // 显示弹窗
      var self = this;

      this.$oMask.show().animate({opacity: 1});;
      this.$elem.show().animate({opacity: 1, top: 260}, function () {
        self.b_stop = true;
      });
    },

    closePopbox: function () { // 关闭弹窗
      var self = this;

      if (this.b_stop) {
        this.$oMask.animate({opacity: 0}, function () {
          $(this).hide();
        });;
        this.$elem.animate({opacity: 0, top: 150}, function () {
          $(this).hide();
        });
      }
    },

    drag: function (ev) { // 拖拽事件
      var self = this;
      var oEvent = ev || window.event;
      var disX = oEvent.clientX - this.$elem.offset().left;
      var disY = oEvent.clientY - this.$elem.offset().top;
      var _move = true;

      $(document).mousemove(function (ev) {
        if (_move) {
          var oEvent = ev || window.event;
          var offset_l = oEvent.clientX - disX;
          var offset_t = oEvent.clientY - disY;

          if (self.opts.dragLimit) {
            if (offset_l <= 0) {
              offset_l = 0;
            } else if (offset_l >= self.page_w - self.$elem.width()) {
              offset_l = self.page_w - self.$elem.width();
            }

            if (offset_t <= 0) {
              offset_t = 0;
            } else if (offset_t >= self.page_h - self.$elem.height()) {
              offset_t = self.page_h - self.$elem.height();
            }
          }

          self.$elem.css({left: offset_l, top: offset_t});
        }
      }).mouseup(function () {
        _move = false;
      });
    },

    constructor: Plugin
  };

  $.fn.popup = function (options) {
    var plugin = new Plugin(this, options);

    return plugin.inital();
  };

})(window.jQuery, window, document);
</script>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
