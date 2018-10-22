<?php
// default setting (home page)        
$meta = array(
    'lang' => 'en',
    'title' => 'InsanityMeetsHH Universe',
    'baseUrl' => $baseUrl,
    'currentUrl' => ($_SERVER['SERVER_PORT'] == '80' ? 'http' : 'https') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
    'keywords' => '',
    'description' => '',
    'robots' => 'index,follow',
    'author' => 'InsanityMeetsHH',
    'fbAppId' => '',
    'fbAdmins' => '',
    'publisher' => '',
    'type' => 'website',
    'socialMediaImage' => '',
    'siteName' => 'InsanityMeetsHH Universe',
    'twitterSite' => 'InsanityMeetsHH',
    'twitterUrl' => 'https://twitter.com/InsanityMeetsHH',
    'rssUrl' => '',
    'locale' => 'de_DE',
    'themeColor' => '#212121',
);
?>

<!DOCTYPE html>
<html lang="<?php echo $meta['lang']; ?>">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $meta['title']; ?></title>
        <base href="<?php echo $meta['baseUrl']; ?>">
        <meta name="keywords" content="<?php echo $meta['keywords']; ?>"/>
        <meta name="description" content="<?php echo $meta['description']; ?>">
        <meta name='robots' content="<?php echo $meta['robots']; ?>">
        <meta name="author" content="<?php echo $meta['author']; ?>">
        <meta property="fb:admins" content="<?php echo $meta['fbAdmins']; ?>"/>
        <meta property="fb:app_id" content="<?php echo $meta['fbAppId']; ?>"/>
        <meta property="og:type" content="<?php echo $meta['type']; ?>"/>
        <meta property="og:title" content="<?php echo $meta['title']; ?>"/>
        <meta property="og:description" content="<?php echo $meta['description']; ?>"/>
        <meta property="og:image" content="<?php echo $meta['socialMediaImage']; ?>"/>
        <meta property="og:site_name" content="<?php echo $meta['siteName']; ?>"/>
        <meta property="og:url" content="<?php echo $meta['currentUrl']; ?>"/>
        <meta property="og:locale" content="<?php echo $meta['locale']; ?>"/>
        <meta property="article:publisher" content="<?php echo $meta['publisher']; ?>"/>
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="<?php echo $meta['twitterSite']; ?>">
        <meta name="twitter:title" content="<?php echo $meta['title']; ?>">
        <meta name="twitter:description" content="<?php echo $meta['description']; ?>">
        <meta name="twitter:image" content="<?php echo $meta['socialMediaImage']; ?>">
        <link rel="me" href="<?php echo $meta['twitterUrl']; ?>">
        <link rel="canonical" href="<?php echo $meta['currentUrl']; ?>"/>
        <link rel="alternate" hreflang="x-default" href="<?php echo $meta['currentUrl']; ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="apple-touch-icon" href="img/favicons/favicon-180x180.png" sizes="180x180">
        <link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="img/favicons/favicon-192x192.png" sizes="192x192">
        <link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="img/favicons/manifest.json">
        <link rel="mask-icon" href="img/favicons/favicon.svg" color="<?php echo $meta['themeColor']; ?>">
        <meta name="msapplication-TileColor" content="<?php echo $meta['themeColor']; ?>">
        <meta name="msapplication-TileImage" content="img/favicons/favicon-144x144.png">
        <meta name="msapplication-config" content="img/favicons/browserconfig.xml">
        <meta name="theme-color" content="<?php echo $meta['themeColor']; ?>">
        <link rel="shortcut icon" href="img/favicons/favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css?v=2018-10-22">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center my-5">InsanityMeetsHH Universe</h1>
                </div>
                <div class="col-sm-8 offset-sm-2">
                    <div class="row">
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://youtube.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-youtube" aria-hidden="true"></i>
                                <div class="pt-2">YouTube</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://twitter.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-twitter" aria-hidden="true"></i>
                                <div class="pt-2">Twitter</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://twitch.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-twitch" aria-hidden="true"></i>
                                <div class="pt-2">Twitch</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://github.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-github" aria-hidden="true"></i>
                                <div class="pt-2">GitHub</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://packagist.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-dropbox" aria-hidden="true"></i>
                                <div class="pt-2">Packagist</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://npm.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-npm" aria-hidden="true"></i>
                                <div class="pt-2">NPM</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://steam.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-steam-symbol" aria-hidden="true"></i>
                                <div class="pt-2">Steam</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="https://stackoverflow.com/users/10384360/insanitymeetshh" target="_blank">
                                <i class="fab fa-5x fa-stack-overflow" aria-hidden="true"></i>
                                <div class="pt-2">Stackoverflow</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center mt-5 mb-2">Software</h3>
                </div>
                <div class="col-sm-8 offset-sm-2">
                    <div class="row">
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="https://slim3.insanitymeetshh.net/" target="_blank">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-code-branch"></i>
                                    <i class="fab fa-php" data-fa-transform="shrink-8 down-5 right-2.5"></i>
                                </span>
                                <div class="pt-2">Slim Skeleton Fork</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="https://gulp.insanitymeetshh.net/" target="_blank">
                                <i class="fab fa-5x fa-gulp" aria-hidden="true"></i>
                                <div class="pt-2">Gulp Templating</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://ca.insanitymeetshh.net/" target="_blank">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-puzzle-piece"></i>
                                    <span class="fa-layers-text" data-fa-transform="shrink-13 left-1.5" style="font-weight:900">jQuery</span>
                                </span>
                                <div class="pt-2">jQuery Plugin - Canvas Animation</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="https://github.com/InsanityMeetsHH/bootstrap-breakpoint" target="_blank">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-puzzle-piece"></i>
                                    <span class="fa-layers-text" data-fa-transform="shrink-13.75 left-1.5" style="font-weight:900">JavaScript</span>
                                </span>
                                <div class="pt-2">JavaScript Plugin - Bootstrap Breakpoint</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="https://github.com/InsanityMeetsHH/file-sharing" target="_blank">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-share-alt" data-fa-mask="fas fa-file" data-fa-transform="shrink-7 down-2.5"></i>
                                    <i class="fab fa-php" data-fa-transform="shrink-11 up-5.5 left-4.5" style="color:#212121;"></i>
                                </span>
                                <div class="pt-2">File Sharing</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="https://fa47.insanitymeetshh.net/" target="_blank">
                                <i class="fab fa-5x fa-font-awesome-alt" aria-hidden="true"></i>
                                <div class="pt-2">FontAwesome 4.7 CheatSheet</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center mt-5 mb-2">Miscellaneous</h3>
                </div>
                <div class="col-sm-8 offset-sm-2">
                    <div class="row">
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="https://stream.insanitymeetshh.net/" target="_blank">
                                <i class="fas fa-5x fa-gamepad" aria-hidden="true"></i>
                                <div class="pt-2">Stream Information</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="https://devbook.insanitymeetshh.net/" target="_blank">
                                <i class="fas fa-5x fa-book" aria-hidden="true"></i>
                                <div class="pt-2">Developer Bookmark</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/fa-all.min.js?v=5.4.1"></script>
    </body>
</html>