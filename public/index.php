<?php
$baseUrl = ($_SERVER['SERVER_PORT'] == '80' ? 'http' : 'https') . '://www.' . $_SERVER['SERVER_NAME'] . str_replace('index.php', '', $_SERVER['PHP_SELF']);

if (isset($_ENV['docker']) && $_ENV['docker']) {
    $baseUrl = 'http://localhost:7700/';
}

// default setting (home page)
$meta = array(
    'lang' => 'en',
    'title' => 'InsanityMeetsHH Universe',
    'baseUrl' => $baseUrl,
    'currentUrl' => ($_SERVER['SERVER_PORT'] == '80' ? 'http' : 'https') . '://www.' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
    'keywords' => '',
    'description' => '',
    'robots' => 'index,follow',
    'author' => 'InsanityMeetsHH',
    'fbAppId' => '',
    'fbAdmins' => '',
    'publisher' => '',
    'type' => 'website',
    'socialMediaImage' => $baseUrl . 'img/general-ci.jpg',
    'siteName' => 'InsanityMeetsHH Universe',
    'twitterSite' => 'InsanityMeetsHH',
    'twitterUrl' => 'https://twitter.com/InsanityMeetsHH',
    'rssUrl' => '',
    'locale' => 'en_US',
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
        <link rel="stylesheet" href="css/bootstrap.min.css?v=4.3.1">
        <link rel="stylesheet" href="css/styles.css?v=2019-10-05">
        <link rel="stylesheet" href="css/glitch.css?v=2022-11-13">
        <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "name": "InsanityMeetsHH Universe",
            "url": "https://insanitymeetshh.net",
            "copyrightYear": 2018,
            "creator": {
                "@type": "Organization",
                "name": "InsanityMeetsHH",
                "url": "https://insanitymeetshh.net",
                "sameAs": [
                    "https://www.youtube.com/channel/UCQhN04sk-qPWMo9cn6g_DRw",
                    "https://twitter.com/InsanityMeetsHH",
                    "https://www.twitch.tv/insanitymeetshh",
                    "https://github.com/InsanityMeetsHH",
                    "https://packagist.org/users/InsanityMeetsHH/",
                    "https://www.npmjs.com/~insanitymeetshh",
                    "https://steamcommunity.com/id/insanity_meets_hamburg",
                    "https://stackoverflow.com/users/10384360/insanitymeetshh"
                ]
            }
        }
        </script>
    </head>
    <body id="the-body" class="">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-2 text-right">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="glitch-style" onchange="javascript:document.getElementById('the-body').classList.toggle('glitch');">
                        <label class="custom-control-label" for="glitch-style">Glitch Style</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center mb-5 glitch-text" data-text="InsanityMeetsHH Universe">InsanityMeetsHH Universe</h1>
                </div>
                <div class="col-sm-8 offset-sm-2">
                    <div class="row">
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://twitter.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-twitter" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="Twitter">Twitter</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://instagram.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-instagram" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="Instagram">Instagram</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://twitch.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-twitch" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="Twitch">Twitch</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://youtube.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-youtube" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="YouTube">YouTube</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://github.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-github" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="GitHub">GitHub</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://packagist.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-dropbox" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="Packagist">Packagist</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://npm.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-npm" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="NPM">NPM</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://steam.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-steam-symbol" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="Steam">Steam</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="https://stackoverflow.com/users/10384360/insanitymeetshh" target="_blank">
                                <i class="fab fa-5x fa-stack-overflow" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="Stackoverflow">Stackoverflow</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center mt-5 mb-2 glitch-text" data-text="Software">Software</h3>
                </div>
                <div class="col-sm-8 offset-sm-2">
                    <div class="row">
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://packagist.org/packages/insanitymeetshh/slim-skeleton" />
                            <link itemprop="codeRepository" href="https://github.com/InsanityMeetsHH/Slim-Skeleton" />
                            <meta itemprop="programmingLanguage" content="PHP" />
                            <meta itemprop="programmingLanguage" content="HTML" />
                            <meta itemprop="programmingLanguage" content="CSS" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="description" content="Slim Skeleton with Twig, Doctrine, Google reCAPTCHA, Two Factor Auth and Localisation">
                            <meta itemprop="copyrightYear" content="2018" />
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0">
                                <meta itemprop="priceCurrency" content="EUR">
                            </div>
                            <a href="https://slim3.insanitymeetshh.net" target="_blank">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-code-branch"></i>
                                    <i class="fab fa-php" data-fa-transform="shrink-8 down-5 right-2.5"></i>
                                </span>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="Slim Skeleton">Slim Skeleton</span>
                            </a>
                        </div>
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://github.com/InsanityMeetsHH/gulp-skeleton" />
                            <link itemprop="codeRepository" href="https://github.com/InsanityMeetsHH/gulp-skeleton" />
                            <meta itemprop="programmingLanguage" content="HTML" />
                            <meta itemprop="programmingLanguage" content="CSS" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="description" content="Skeleton to create templates with gulp" />
                            <meta itemprop="copyrightYear" content="2018" />
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0">
                                <meta itemprop="priceCurrency" content="EUR">
                            </div>
                            <a href="https://gulp.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-gulp" aria-hidden="true"></i>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="Gulp Skeleton">Gulp Skeleton</span>
                            </a>
                        </div>
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://github.com/InsanityMeetsHH/vue-skeleton" />
                            <link itemprop="codeRepository" href="https://github.com/InsanityMeetsHH/vue-skeleton" />
                            <meta itemprop="programmingLanguage" content="HTML" />
                            <meta itemprop="programmingLanguage" content="CSS" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="description" content="Vue.js Skeleton with Gulp" />
                            <meta itemprop="copyrightYear" content="2020" />
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0">
                                <meta itemprop="priceCurrency" content="EUR">
                            </div>
                            <a href="https://vue.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-vuejs" aria-hidden="true"></i>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="Vue Skeleton">Vue Skeleton</span>
                            </a>
                        </div>
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://packagist.org/packages/insanitymeetshh/file-sharing" />
                            <link itemprop="codeRepository" href="https://github.com/InsanityMeetsHH/file-sharing" />
                            <meta itemprop="programmingLanguage" content="PHP" />
                            <meta itemprop="programmingLanguage" content="HTML" />
                            <meta itemprop="programmingLanguage" content="CSS" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="description" content="Platform to upload, download and share files">
                            <meta itemprop="copyrightYear" content="2018" />
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0" />
                                <meta itemprop="priceCurrency" content="EUR" />
                            </div>
                            <a href="https://packagist.org/packages/insanitymeetshh/file-sharing" target="_blank">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-share-alt" data-fa-mask="fas fa-file" data-fa-transform="shrink-7 down-2.5"></i>
                                    <i class="fab fa-php" data-fa-transform="shrink-11 up-5.5 left-4.5" style="color:#212121;"></i>
                                </span>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="File Sharing">File Sharing</span>
                            </a>
                        </div>
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://github.com/InsanityMeetsHH/twitch-chatbot" />
                            <link itemprop="codeRepository" href="https://github.com/InsanityMeetsHH/twitch-chatbot" />
                            <meta itemprop="programmingLanguage" content="HTML" />
                            <meta itemprop="programmingLanguage" content="CSS" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="programmingLanguage" content="NodeJs" />
                            <meta itemprop="description" content="Twitch Chatbot made with Vue Skeleton">
                            <meta itemprop="copyrightYear" content="2020" />
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0" />
                                <meta itemprop="priceCurrency" content="EUR" />
                            </div>
                            <a href="https://github.com/InsanityMeetsHH/twitch-chatbot" target="_blank">
                                <span class="fa-layers fa-5x">
                                    <i class="fab fa-twitch" style="color:#c9c9c9;"></i>
                                    <i class="fas fa-robot" data-fa-transform="shrink-12 down-5.5 right-4.5"></i>
                                </span>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="File Sharing">Twitch Chatbot</span>
                            </a>
                        </div>
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://www.npmjs.com/package/jquery-canvas-animation" />
                            <link itemprop="codeRepository" href="https://github.com/InsanityMeetsHH/jquery-canvas-animation" />
                            <meta itemprop="programmingLanguage" content="jQuery" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="description" content="A jQuery Plugin to create JavaScript step in mix with CSS3 animation / transition" />
                            <meta itemprop="copyrightYear" content="2018" />
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0">
                                <meta itemprop="priceCurrency" content="EUR">
                            </div>
                            <a href="http://ca.insanitymeetshh.net" target="_blank">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-puzzle-piece"></i>
                                    <span class="fa-layers-text" data-fa-transform="shrink-13 left-1.5" style="font-weight:900">jQuery</span>
                                </span>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="jQuery Plugin - Canvas Animation">jQuery Plugin - Canvas Animation</span>
                            </a>
                        </div>
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://www.npmjs.com/package/bootstrap-breakpoint" />
                            <link itemprop="codeRepository" href="https://github.com/InsanityMeetsHH/bootstrap-breakpoint" />
                            <meta itemprop="programmingLanguage" content="jQuery" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="description" content="Write JavaScript conditions depending on the Bootstrap breakpoint" />
                            <meta itemprop="copyrightYear" content="2018" />
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0" />
                                <meta itemprop="priceCurrency" content="EUR" />
                            </div>
                            <a href="https://www.npmjs.com/package/bootstrap-breakpoint" target="_blank">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-puzzle-piece"></i>
                                    <span class="fa-layers-text" data-fa-transform="shrink-13.75 left-1.5" style="font-weight:900">JavaScript</span>
                                </span>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="JavaScript Plugin - Bootstrap Breakpoint">JavaScript Plugin - Bootstrap Breakpoint</span>
                            </a>
                        </div>
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://packagist.org/packages/insanitymeetshh/typo3-skeleton" />
                            <link itemprop="codeRepository" href="https://github.com/InsanityMeetsHH/typo3-skeleton" />
                            <meta itemprop="programmingLanguage" content="PHP" />
                            <meta itemprop="programmingLanguage" content="HTML" />
                            <meta itemprop="programmingLanguage" content="CSS" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="description" content="TYPO3 8.7 Skeleton - InsanityMeetsHH" />
                            <meta itemprop="copyrightYear" content="2018" />
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0" />
                                <meta itemprop="priceCurrency" content="EUR" />
                            </div>
                            <a href="https://github.com/InsanityMeetsHH/typo3-skeleton" target="_blank">
                                <i class="fab fa-5x fa-typo3" aria-hidden="true"></i>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="TYPO3 8.7 Skeleton (DEV)">TYPO3 8.7 Skeleton (DEV)</span>
                            </a>
                        </div>
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://packagist.org/packages/insanitymeetshh/imhh-t3base" />
                            <link itemprop="codeRepository" href="https://github.com/InsanityMeetsHH/typo3-base-ext" />
                            <meta itemprop="programmingLanguage" content="PHP" />
                            <meta itemprop="programmingLanguage" content="HTML" />
                            <meta itemprop="programmingLanguage" content="CSS" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="programmingLanguage" content="TypoScript" />
                            <meta itemprop="description" content="TYPO3 Base Extension - InsanityMeetsHH" />
                            <meta itemprop="copyrightYear" content="2018" />
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0" />
                                <meta itemprop="priceCurrency" content="EUR" />
                            </div>
                            <a href="https://github.com/InsanityMeetsHH/typo3-base-ext" target="_blank">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-puzzle-piece"></i>
                                    <span class="fa-layers-text" data-fa-transform="shrink-13 left-1.5" style="font-weight:900">TYPO3</span>
                                </span>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="TYPO3 Base Extension (DEV)">TYPO3 Base Extension (DEV)</span>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://gist.insanitymeetshh.net" target="_blank">
                                <i class="fab fa-5x fa-github" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="GitHub Gist">Code Snippets</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center mt-5 mb-2 glitch-text" data-text="Miscellaneous">Miscellaneous</h3>
                </div>
                <div class="col-sm-8 offset-sm-2">
                    <div class="row">
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="https://stream.insanitymeetshh.net/" target="_blank">
                                <i class="fas fa-5x fa-gamepad" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="Stream Information">Stream Information</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="https://devbook.insanitymeetshh.net/" target="_blank">
                                <i class="fas fa-5x fa-book" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="Developer Bookmark">Developer Bookmark</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/fa-all.min.js?v=5.7.2"></script>
    </body>
</html>