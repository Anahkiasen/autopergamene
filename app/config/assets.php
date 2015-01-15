<?php return array(

    'application' => array(
        'css' => array(
            '/components/normalize-css/normalize.css',
            '/components/rainbow/themes/tomorrow-night.css',
            '/app/css/styles.css',
        ),
        'js'  => array(
            '/app/js/scripts.js',
        ),
    ),
    'modernizr'   => array(
        'js' => array(
            '/components/modernizr/modernizr.min.js',
            '/app/js/polyfill.js',
        ),
    ),
    'article'     => array(
        'js' => array(
            '/components/rainbow/js/rainbow.min.js',
            '/components/rainbow/js/language/generic.js',
            '/components/rainbow/js/language/php.js',
            '/app/js/article.js',
        ),
    ),
    'lazyload'    => array(
        'js' => array(
            '/components/jquery/dist/jquery.js',
            '/components/jquery.lazyload/jquery.lazyload.js',
            '/app/js/components/lazyload.js',
        ),
    ),
    'affixed'     => array(
        'js' => array(
            '/components/jquery/dist/jquery.js',
            '/components/bootstrap/js/affix.js',
            '/components/bootstrap/js/scrollspy.js',
            '/app/js/components/affixed.js',
        ),
    ),

);
