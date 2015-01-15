<?php return array(

    // Locales
    ////////////////////////////////////////////////////////////////////

    // The default locale if none is provided in the URL
    // Leave empty to force the use of locales prefixes in URLs
    'default'       => 'fr',
    // The fallback locale for translations
    // If null, the default locale is used
    'fallback'      => null,
    // The available locales
    'locales'       => array('fr', 'en'),
    // Gettext
    ////////////////////////////////////////////////////////////////////

    // The domain of your translations, for gettext use
    'domain'        => 'autopergamene',
    // Where the PO/MO files reside
    'folder'        => app_path('lang'),
    // Database
    ////////////////////////////////////////////////////////////////////

    // The pattern Polyglot should follow to find the Lang classes
    // Examples are "Lang\{model}", "{model}Lang", where {model}
    // will be replaced by the model's name
    'model_pattern' => 'Autopergamene\Entities\Lang\{model}',

);
