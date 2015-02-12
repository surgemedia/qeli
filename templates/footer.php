<footer class="col-xs-12" role="contentinfo">
     <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <a id="back-to-top" href="#" class="back-to-top"><span class="graphic nav-back-to-top"></span> Back to top</a>
            </div>
             <div class="col-xs-3 pull-right">
                <a href="http://www.facebook.com/pages/Queensland-Education-Leadership-Institute-QELi/361682403908834" target="_blank" class="graphic icon-facebook"></a>
                <a href="http://twitter.com/QELIedu" target="_blank" class="graphic icon-twitter"></a>
                <a href="https://www.linkedin.com/company/2774541" target="_blank" class="graphic icon-linkedin"></a>
            </div>
        </div>
        <div class="row">
            <?php
                    wp_nav_menu(array('theme_location' => 'footer',
                                    'container' => false,
                                    'menu'=> 'footer',
                                    'menu_id' => 'footer-nav',
                                    'menu_class' => 'footer',
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'walker' => new QELi_Footer_Menu()
                                )
                            );
                    ?>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
            <span class="hero-overlay"></span>
            <span class="graphic footer-logo"></span>
            ©2014 QELi. All rights reserved  |  credits / breadcrumb digital (build) /  volt (design)
            </div>
        </div>
    </div>
</footer>