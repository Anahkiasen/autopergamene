<?php return array(

 /*
  |--------------------------------------------------------------------------
  | Twig options
  |--------------------------------------------------------------------------
  |
  | Available options:
  |
  |   * debug: When set to true, it automatically set "auto_reload" to true as
  |           well (default to app.debug setting).
  |
  |   * charset: The charset used by the templates (default to UTF-8).
  |
  |   * base_template_class: The base template class to use for generated
  |                         templates (default to Barryvdh\TwigBridge\TwigTemplate).
  |
  |   * cache: An absolute path where to store the compiled templates, or
  |           false to disable compilation cache. Default is $app['path.storage'].'/views/twig'
  |
  |   * auto_reload: Whether to reload the template if the original source changed.
  |                 If you don't provide the auto_reload option, it will be
  |                 determined automatically based on the debug value.
  |
  |   * strict_variables: Whether to ignore invalid variables in templates
  |                      (default to false).
  |
  |   * autoescape: Whether to enable auto-escaping (default to html):
  |                   * false: disable auto-escaping
  |                   * true: equivalent to html
  |                   * html, js: set the autoescaping to one of the supported strategies
  |                   * PHP callback: a PHP callback that returns an escaping strategy based on the template "filename"
  |
  |   * optimizations: A flag that indicates which optimizations to apply
  |                   (default to -1 which means that all optimizations are enabled;
  |                   set it to 0 to disable).
  |
  */

  'options' => array(
    'debug'      => true,
    'autoescape' => false,
  ),

  /*
   |--------------------------------------------------------------------------
   | Functions & Filters
   |--------------------------------------------------------------------------
   |
   | List of Functions & Filters that are made available to your Twig templates.
   | Supports string, array, closure or Twig_SimpleFilter / Twig_SimpleFunction .
   |
   */

  'functions' => array(),

  'filters' => array(),

  // Facades made accessible to the views
  'facades' => array(
    'HTML', 'URL', 'Lang', 'Config', 'Input', 'Form', 'Auth', 'Str', 'Session', 'View',
    'Twitter', 'Facebook', 'Former', 'Acetone',
  ),

);