<?php

namespace lecturer\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
          'css/site.css',
          "https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css",
          "https://use.fontawesome.com/releases/v5.3.1/css/all.css",
          "https://use.fontawesome.com/releases/v5.3.1/css/all.css",
    ];
    public $js = [
        "https://use.fontawesome.com/releases/v5.3.1/js/all.js",
        "https://use.fontawesome.com/releases/v5.3.1/js/all.js",
    ];
    public $depends = [
         'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
