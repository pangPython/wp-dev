<?php
/**
*	123Template 123Name:123 h5moban
*
**/
get_header();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Meteor HTML CSS Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

   
        <link rel="stylesheet" href="<?php echo get_template_directory_uri()."/h5moban/"?>css/fontAwesome.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri()."/h5moban/"?>css/hero-slider.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri()."/h5moban/"?>css/tooplate-style.css">
        <style>
            .col-md-3.col-sm-6.col-xs-12.my-block {
    			float: right;
    			width: 25%;
                height:200px;
                padding:0 6px
			}
        </style>
        <script src="<?php echo get_template_directory_uri()."/h5moban/"?>js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>


    <section class="cd-hero">
        <ul class="cd-hero-slider autoplay">  
        <!-- 
            <ul class="cd-hero-slider autoplay"> for slider auto play 
            <ul class="cd-hero-slider"> for disabled auto play
        -->
            <li class="selected first-slide">
                <div class="cd-full-width">
                    <div class="tm-slide-content-div slide-caption">
                        <span>区块链创新研究院</span>
                        <h2>区块大学</h2>
                        <p>区块链如何落地?区块链变现法宝?都在区块大学。</p>                           
                    </div>                   
                </div> <!-- .cd-full-width -->
            </li>

            <li class="second-slide">
                <div class="cd-full-width">
                    <div class="tm-slide-content-div slide-caption">
                        <span>区块链创新研究院</span>
                        <h2>培训中心</h2>
                        <p>    课程将会走向系统化、专业化、精细化；

    服务主体将走向机构化、品牌化；

    教学将走向线下线上结合——理论线上授课，实训线下授课；

    区块链技术将可能成为国内部分大学开设的常设专业。</p>
                        <!--<div class="primary-button">
                            <a href="#">Read More</a>
                        </div>-->                        
                    </div>                     
                </div> <!-- .cd-full-width -->
            </li>

            <li class="third-slide">
                <div class="cd-full-width">
                    <div class="tm-slide-content-div slide-caption">
                        <span>区块链创新研究院</span>
                        <h2>名师指导</h2>
                        <p>区块链的核心是一种基于互联网分布式信任系统的社会关系和商业模式的改变，而这种改变以去中心化为典型特征。</p>
                        <!--<div class="primary-button">
                            <a href="#">View Details</a>
                        </div>-->                           
                    </div>                         
                </div> <!-- .cd-full-width -->
            </li>
        </ul> <!-- .cd-hero-slider -->

        <div class="cd-slider-nav">
            <nav>
                <span class="cd-marker item-1"></span>
                
                <ul>
                    <li class="selected"><a href="#0"></a></li>
                    <li><a href="#0"></a></li>
                    <li><a href="#0"></a></li>                        
                </ul>
            </nav> 
        </div> <!-- .cd-slider-nav -->
    </section> <!-- .cd-hero -->

    <div id="about" class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h4>What We Do</h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 my-block">
                    <div class="service-item first-service">
                        <div class="icon"></div>
                        <h4>初识区块链</h4>
                        <p>区块链概念介绍、技术阐述、区块链应用场景分析、案例分享；</p>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-6 col-xs-12 my-block">
                    <div class="service-item second-service">
                        <div class="icon"></div>
                        <h4>数字币交易指导</h4>
                        <p>数字货币交易策略指导、投资趋势解析、价值币推荐<br /><br /></p>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-6 col-xs-12 my-block">
                    <div class="service-item third-service">
                        <div class="icon"></div>
                        <h4>区块链技术培训</h4>
                        <p>国家级证书认证、技术开发培训、实战演练<br /><br /></p>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-6 col-xs-12 my-block">
                    <div class="service-item fourth-service">
                        <div class="icon"></div>
                        <h4>区块链推动计划</h4>
                        <p>聚集行业顶级大咖，为地方政府、产业园区等进行区块链共识普及，为地方几行业峰会提供大咖引荐服务</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="what-we-do" style="margin:10px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-text" style="text-align:center;">
                        <h4 style="color:#fff;">添加微信，报名区块大学</h4>
                        <img src="http://bcinstitute.applinzi.com/wp-content/uploads/2018/07/图片1.png" width="100px" height="100px" />
                    </div>
                </div>
                
            </div>
        </div>
    </div>



<!--    <div id="fun-facts">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="fact-item">
                        <div class="counter" data-count="926">0</div>
                        <span>已报名</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="fact-item">
                        <div class="counter" data-count="214">0</div>
                        <span>往届会员</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="fact-item">
                        <div class="counter" data-count="118">0</div>
                        <span>正在咨询</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="fact-item">
                        <div class="counter" data-count="16">0</div>
                        <span>意向报名</span>
                    </div>
                </div>
            </div>
        </div>
    </div>-->


    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri()."/h5moban/"?>js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="<?php echo get_template_directory_uri()."/h5moban/"?>js/vendor/bootstrap.min.js"></script>

    <script src="<?php echo get_template_directory_uri()."/h5moban/"?>js/plugins.js"></script>
    <script src="<?php echo get_template_directory_uri()."/h5moban/"?>js/main.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 50;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>
</body>
</html>
<?php get_footer(); ?>