<?php
$baseUrl = ($_SERVER['SERVER_PORT'] == '80' ? 'http' : 'https') . '://www.' . $_SERVER['SERVER_NAME'] . str_replace('index.php', '', $_SERVER['PHP_SELF']);

if (isset($_ENV['docker']) && $_ENV['docker']) {
    $baseUrl = 'http://localhost:7700/';
}

// default setting (home page)
$meta = array(
    'lang' => 'en',
    'title' => 'CodelineRed Universe',
    'baseUrl' => $baseUrl,
    'currentUrl' => ($_SERVER['SERVER_PORT'] == '80' ? 'http' : 'https') . '://www.' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
    'keywords' => 'twitter, instagram, twitch, youtube, github, packagist, npm, steam, stackoverflow, gulp, vue, php, fontawesome, bootstrap, docker',
    'description' => 'Hub Page',
    'robots' => 'index,follow',
    'author' => 'CodelineRed',
    'fbAppId' => '',
    'fbAdmins' => '',
    'publisher' => '',
    'type' => 'website',
    'socialMediaImage' => $baseUrl . 'img/general-ci.jpg',
    'siteName' => 'CodelineRed Universe',
    'twitterSite' => 'CodelineRed',
    'twitterUrl' => 'http://twitter.com/CodelineRed',
    'rssUrl' => '',
    'locale' => 'en_US',
    'themeColor' => '#000',
);

$repos = [
    'bootstrap-breakpoint' => 'https://raw.githubusercontent.com/CodelineRed/bootstrap-breakpoint/master/package.json',
    'file-sharing' => 'https://raw.githubusercontent.com/CodelineRed/file-sharing/main/composer.json',
    'gulp-skeleton' => 'https://raw.githubusercontent.com/CodelineRed/gulp-skeleton/main/composer.json',
    'jquery-canvas-animation' => 'https://raw.githubusercontent.com/CodelineRed/jquery-canvas-animation/master/package.json',
    'pdf-image' => 'https://raw.githubusercontent.com/CodelineRed/pdf-image/main/composer.json',
    'slim-skeleton' => 'https://raw.githubusercontent.com/CodelineRed/Slim-Skeleton/master/composer.json',
    'twitch-chatbot' => 'https://raw.githubusercontent.com/CodelineRed/twitch-chatbot/main/composer.json',
    'vue-skeleton' => 'https://raw.githubusercontent.com/CodelineRed/vue-skeleton/main/composer.json',
];

function downloadSoftwareJson($software, $path, $repos) {
    if (isset($repos[$software])) {
        $json = file_get_contents($repos[$software]);

        if (is_string($json) && strlen($json)) {
            file_put_contents($path, $json);
        }
    }
}

function getSoftwareJson($path) {
    $result = [];

    if (is_readable($path)) {
        $json = file_get_contents($path);

        if (is_string($json) && strlen($json)) {
            $json = json_decode($json, true);

            if (is_array($json) && count($json)) {
                $result = $json;
            }
        }
    }

    return $result;
}

function getSoftwareVersion($software, $repos) {
    $result = '';
    $path = '../data/' . $software . '.json';

    if (isset($repos[$software])) {
        if (is_readable($path)) {
            if (time() - filemtime($path) > 86400) {
                // file older than 24 hours
                downloadSoftwareJson($software, $path, $repos);
            }

            $result = getSoftwareJson($path);
        } else {
            downloadSoftwareJson($software, $path, $repos);
            $result = getSoftwareJson($path);
        }
    }

    return isset($result['version']) ? $result['version'] : '';
}

function getSoftwareVersionBadge($software, $repos) {
    $result = '';
    $version = getSoftwareVersion($software, $repos);

    if (strlen($version)) {
        $result = ' <span class="badge badge-secondary">' . $version . '</span>';
    }

    return $result;
}

function getSoftwareVersionMeta($software, $repos) {
    $result = '';
    $version = getSoftwareVersion($software, $repos);

    if (strlen($version)) {
        $result = '<meta itemprop="version" content="' . $version . '" />';
    }

    return $result;
}
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
        <link rel="shortcut icon" href="img/favicons/favicon.ico">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/favicon-16x16.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="48x48" href="img/favicons/favicon-48x48.png">
        <link rel="manifest" href="img/favicons/manifest.json">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#000">
        <meta name="application-name" content="<?php echo $meta['title']; ?>">
        <link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/favicons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="img/favicons/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/favicons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="img/favicons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="img/favicons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="img/favicons/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="167x167" href="img/favicons/apple-touch-icon-167x167.png">
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon-180x180.png">
        <link rel="apple-touch-icon" sizes="1024x1024" href="img/favicons/apple-touch-icon-1024x1024.png">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="apple-mobile-web-app-title" content="<?php echo $meta['title']; ?>">
        <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="img/favicons/apple-touch-startup-image-640x1136.png">
        <link rel="apple-touch-startup-image" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="img/favicons/apple-touch-startup-image-750x1334.png">
        <link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="img/favicons/apple-touch-startup-image-828x1792.png">
        <link rel="apple-touch-startup-image" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" href="img/favicons/apple-touch-startup-image-1125x2436.png">
        <link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" href="img/favicons/apple-touch-startup-image-1242x2208.png">
        <link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" href="img/favicons/apple-touch-startup-image-1242x2688.png">
        <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="img/favicons/apple-touch-startup-image-1536x2048.png">
        <link rel="apple-touch-startup-image" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="img/favicons/apple-touch-startup-image-1668x2224.png">
        <link rel="apple-touch-startup-image" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="img/favicons/apple-touch-startup-image-1668x2388.png">
        <link rel="apple-touch-startup-image" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="img/favicons/apple-touch-startup-image-2048x2732.png">
        <link rel="apple-touch-startup-image" media="(device-width: 810px) and (device-height: 1080px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="img/favicons/apple-touch-startup-image-1620x2160.png">
        <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="img/favicons/apple-touch-startup-image-1136x640.png">
        <link rel="apple-touch-startup-image" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="img/favicons/apple-touch-startup-image-1334x750.png">
        <link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="img/favicons/apple-touch-startup-image-1792x828.png">
        <link rel="apple-touch-startup-image" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)" href="img/favicons/apple-touch-startup-image-2436x1125.png">
        <link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)" href="img/favicons/apple-touch-startup-image-2208x1242.png">
        <link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)" href="img/favicons/apple-touch-startup-image-2688x1242.png">
        <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="img/favicons/apple-touch-startup-image-2048x1536.png">
        <link rel="apple-touch-startup-image" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="img/favicons/apple-touch-startup-image-2224x1668.png">
        <link rel="apple-touch-startup-image" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="img/favicons/apple-touch-startup-image-2388x1668.png">
        <link rel="apple-touch-startup-image" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="img/favicons/apple-touch-startup-image-2732x2048.png">
        <link rel="apple-touch-startup-image" media="(device-width: 810px) and (device-height: 1080px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="img/favicons/apple-touch-startup-image-2160x1620.png">
        <link rel="icon" type="image/png" sizes="228x228" href="img/favicons/coast-228x228.png">
        <meta name="msapplication-TileColor" content="<?php echo $meta['themeColor']; ?>">
        <meta name="msapplication-TileImage" content="img/favicons/mstile-144x144.png">
        <meta name="msapplication-config" content="img/favicons/browserconfig.xml">
        <link rel="yandex-tableau-widget" href="img/favicons/yandex-browser-manifest.json">
        <link rel="stylesheet" href="css/bootstrap.min.css?v=4.3.1">
        <link rel="stylesheet" href="css/styles.css?v=2024-04-14">
        <link rel="stylesheet" href="css/glitch.css?v=2022-12-21">
        <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "name": "CodelineRed Universe",
            "url": "https://www.codelinered.net",
            "copyrightYear": 2022,
            "creator": {
                "@type": "Organization",
                "name": "CodelineRed",
                "url": "https://www.codelinered.net",
                "sameAs": [
                    "https://www.youtube.com/@codelinered",
                    "https://twitter.com/codelinered",
                    "https://www.twitch.tv/codelinered",
                    "https://github.com/codelinered",
                    "https://packagist.org/users/codelinered/",
                    "https://www.npmjs.com/~codelinered",
                    "https://steamcommunity.com/id/codelinered",
                    "https://stackoverflow.com/users/10384360/codelinered",
                    "https://codepen.io/CodelineRed"
                ]
            }
        }
        </script>
    </head>
    <body id="the-body" class="">
        <svg height="0" width="0">
            <defs>
                <linearGradient id="lgrad-github" gradientTransform="rotate(90)">
                    <stop offset="20%" stop-color="#216AFF"></stop>
                    <stop offset="100%" stop-color="#C025FF"></stop>
                </linearGradient>
                <linearGradient id="lgrad-steam" gradientTransform="rotate(90)">
                    <stop offset="0%" stop-color="#08172A"></stop>
                    <stop offset="50%" stop-color="#0B2F67"></stop>
                    <stop offset="100%" stop-color="#0B88B9"></stop>
                </linearGradient>
                <linearGradient id="lgrad-instagram" gradientTransform="rotate(120)">
                    <stop offset="0%" stop-color="#5740D6"></stop>
                    <stop offset="10%" stop-color="#BB27A2"></stop>
                    <stop offset="40%" stop-color="#F4333C"></stop>
                    <stop offset="100%" stop-color="#FAC253"></stop>
                </linearGradient>
                <linearGradient id="lgrad-php" gradientTransform="rotate(90)">
                    <stop offset="0%" stop-color="#3c4771"></stop>
                    <stop offset="75%" stop-color="#6477ba"></stop>
                    <stop offset="100%" stop-color="#6477ba"></stop>
                </linearGradient>
                <linearGradient id="lgrad-typo3" gradientTransform="rotate(90)">
                    <stop offset="0%" stop-color="#F88401"></stop>
                    <stop offset="75%" stop-color="#f7af62"></stop>
                    <stop offset="100%" stop-color="#f7af62"></stop>
                </linearGradient>
                <linearGradient id="lgrad-javascript" gradientTransform="rotate(90)">
                    <stop offset="0%" stop-color="#f0d81f"></stop>
                    <stop offset="75%" stop-color="#efe599"></stop>
                    <stop offset="100%" stop-color="#efe599"></stop>
                </linearGradient>
                <linearGradient id="lgrad-slim" gradientTransform="rotate(90)">
                    <stop offset="0%" stop-color="#649e3d"></stop>
                    <stop offset="75%" stop-color="#85ce50"></stop>
                    <stop offset="100%" stop-color="#85ce50"></stop>
                </linearGradient>
                <linearGradient id="lgrad-jquery" gradientTransform="rotate(90)">
                    <stop offset="0%" stop-color="#21a8dc"></stop>
                    <stop offset="75%" stop-color="#7ac1db"></stop>
                    <stop offset="100%" stop-color="#7ac1db"></stop>
                </linearGradient>
            </defs>
        </svg>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="text-center mb-lg-3 glitch-text" data-text="CodelineRed Universe">CodelineRed Universe</h1>
                </div>
                <div class="col-sm-10 col-md-12 col-lg-8 col-xl-6">
                    <div class="row">
                        <div class="col-6 col-sm-4 col-md-3 text-center py-4">
                            <a href="http://twitter.codelinered.net" target="_blank" aria-label="CodelineRed on Twitter">
                                <i class="fab fa-5x fa-x-twitter" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="X">X</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 text-center py-4">
                            <a href="http://instagram.codelinered.net" target="_blank" aria-label="CodelineRed on Instagram">
                                <i class="fab fa-5x fa-instagram" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="Instagram">Instagram</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 text-center py-4">
                            <a href="http://twitch.codelinered.net" target="_blank" aria-label="CodelineRed on Twitch">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-square-full" data-fa-transform="shrink-8 up-3"></i>
                                    <i class="fas fa-square-full" data-fa-transform="shrink-8 left-2"></i>
                                    <i class="fas fa-square-full" data-fa-transform="shrink-8 up-0.75 right-0.5 rotate--45"></i>
                                    <i class="fas fa-square-full" data-fa-transform="shrink-9 up-3.5 right-3.3"></i>
                                    <i class="fab fa-twitch"></i>
                                </span>
                                <div class="mt-2 glitch-text" data-text="Twitch">Twitch</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 text-center py-4">
                            <a href="http://youtube.codelinered.net" target="_blank" aria-label="CodelineRed on YouTube">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-square-full" data-fa-transform="shrink-10"></i>
                                    <i class="fab fa-youtube" data-fa-transform="left-1"></i>
                                </span>
                                <div class="mt-2 glitch-text" data-text="YouTube">YouTube</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 text-center py-4">
                            <a href="http://github.codelinered.net" target="_blank" aria-label="CodelineRed on GitHub">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-circle" data-fa-transform="shrink-0.75"></i>
                                    <i class="fab fa-github"></i>
                                </span>
                                <div class="mt-2 glitch-text" data-text="GitHub">GitHub</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 text-center py-4">
                            <a href="http://packagist.codelinered.net" target="_blank" aria-label="CodelineRed on Packagist">
                                <i class="fab fa-5x fa-dropbox" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="Packagist">Packagist</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 text-center py-4">
                            <a href="http://npm.codelinered.net" target="_blank" aria-label="CodelineRed on NPM">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-square-full" data-fa-transform="shrink-11 left-6"></i>
                                    <i class="fas fa-square-full" data-fa-transform="shrink-11 left-1"></i>
                                    <i class="fas fa-square-full" data-fa-transform="shrink-11 right-4"></i>
                                    <i class="fas fa-square-full" data-fa-transform="shrink-11 right-6"></i>
                                    <i class="fas fa-square-full" data-fa-transform="shrink-20 left-2 down-1"></i>
                                    <i class="fab fa-npm" data-fa-transform="left-1"></i>
                                </span>
                                <div class="mt-2 glitch-text" data-text="NPM">NPM</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 text-center py-4">
                            <a href="https://codepen.io/CodelineRed" target="_blank" aria-label="CodelineRed on CodePen">
                                <i class="fab fa-5x fa-codepen" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="CodePen">CodePen</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 text-center py-4">
                            <a href="http://stackoverflow.codelinered.net/" target="_blank" aria-label="CodelineRed on Stackoverflow">
                                <i class="fab fa-5x fa-stack-overflow" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="Stackoverflow">Stackoverflow</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 text-center py-4">
                            <a href="http://steam.codelinered.net" target="_blank" aria-label="CodelineRed on Steam">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-circle" data-fa-transform="shrink-0.95"></i>
                                    <i class="fab fa-steam"></i>
                                </span>
                                <div class="mt-2 glitch-text" data-text="Steam">Steam</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <h3 class="text-center mt-5 mb-2 glitch-text" data-text="Software">Software</h3>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://packagist.org/packages/codelinered/slim-skeleton" />
                            <link itemprop="codeRepository" href="https://github.com/CodelineRed/Slim-Skeleton" />
                            <meta itemprop="programmingLanguage" content="PHP" />
                            <meta itemprop="programmingLanguage" content="HTML" />
                            <meta itemprop="programmingLanguage" content="CSS" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="description" content="Slim Skeleton with Twig, Doctrine, Google reCAPTCHA, Two Factor Auth and Localisation">
                            <meta itemprop="copyrightYear" content="2018" />
                            <?= getSoftwareVersionMeta('slim-skeleton', $repos); ?>
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0">
                                <meta itemprop="priceCurrency" content="EUR">
                            </div>
                            <a href="https://slim3.codelinered.net" target="_blank" aria-label="Slim Skeleton demo page">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-box slim-gradient"></i>
                                    <i class="fab fa-php" data-fa-transform="shrink-5.5 down-2.5 left-2" style="fill:#212121;"></i>
                                </span>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="Slim Skeleton">Slim Skeleton<?= getSoftwareVersionBadge('slim-skeleton', $repos); ?></span>
                            </a>
                        </div>
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://github.com/CodelineRed/gulp-skeleton" />
                            <link itemprop="codeRepository" href="https://github.com/CodelineRed/gulp-skeleton" />
                            <meta itemprop="programmingLanguage" content="HTML" />
                            <meta itemprop="programmingLanguage" content="CSS" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="description" content="Skeleton to create templates with gulp" />
                            <meta itemprop="copyrightYear" content="2018" />
                            <?= getSoftwareVersionMeta('gulp-skeleton', $repos); ?>
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0">
                                <meta itemprop="priceCurrency" content="EUR">
                            </div>
                            <a href="https://gulp.codelinered.net" target="_blank" aria-label="Gulp Skeleton demo page">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-square-full" data-fa-transform="shrink-11"></i>
                                    <i class="fas fa-square-full" data-fa-transform="shrink-11 left-0.65 rotate--6"></i>
                                    <i class="fas fa-square-full" data-fa-transform="shrink-11 right-0.625 rotate-6"></i>
                                    <i class="fab fa-gulp"></i>
                                </span>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="Gulp Skeleton">Gulp Skeleton<?= getSoftwareVersionBadge('gulp-skeleton', $repos); ?></span>
                            </a>
                        </div>
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://github.com/CodelineRed/vue-skeleton" />
                            <link itemprop="codeRepository" href="https://github.com/CodelineRed/vue-skeleton" />
                            <meta itemprop="programmingLanguage" content="Vue" />
                            <meta itemprop="programmingLanguage" content="HTML" />
                            <meta itemprop="programmingLanguage" content="CSS" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="description" content="Vue.js Skeleton with Gulp" />
                            <meta itemprop="copyrightYear" content="2020" />
                            <?= getSoftwareVersionMeta('vue-skeleton', $repos); ?>
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0">
                                <meta itemprop="priceCurrency" content="EUR">
                            </div>
                            <a href="https://vue.codelinered.net" target="_blank" aria-label="Vue Skeleton demo page">
                                <i class="fab fa-5x fa-vuejs" aria-hidden="true"></i>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="Vue Skeleton">Vue Skeleton<?= getSoftwareVersionBadge('vue-skeleton', $repos); ?></span>
                            </a>
                        </div>
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://github.com/CodelineRed/twitch-chatbot" />
                            <link itemprop="codeRepository" href="https://github.com/CodelineRed/twitch-chatbot" />
                            <meta itemprop="programmingLanguage" content="HTML" />
                            <meta itemprop="programmingLanguage" content="CSS" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="programmingLanguage" content="NodeJs" />
                            <meta itemprop="description" content="Twitch Chatbot made with Vue Skeleton">
                            <meta itemprop="copyrightYear" content="2020" />
                            <?= getSoftwareVersionMeta('twitch-chatbot', $repos); ?>
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0" />
                                <meta itemprop="priceCurrency" content="EUR" />
                            </div>
                            <a href="https://github.com/CodelineRed/twitch-chatbot" target="_blank" aria-label="Twitch Chatbot on GitHub">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-square-full" data-fa-transform="shrink-8 up-3"></i>
                                    <i class="fas fa-square-full" data-fa-transform="shrink-8 left-2"></i>
                                    <i class="fas fa-square-full" data-fa-transform="shrink-8 up-0.75 right-0.5 rotate--45"></i>
                                    <i class="fas fa-square-full" data-fa-transform="shrink-9 up-3.5 right-3.3"></i>
                                    <i class="fab fa-twitch"></i>
                                    <i class="fas fa-robot" data-fa-transform="shrink-12 down-5.5 right-4.5"></i>
                                </span>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="Twitch Chatbot">Twitch Chatbot<?= getSoftwareVersionBadge('twitch-chatbot', $repos); ?></span>
                            </a>
                        </div>
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://packagist.org/packages/codelinered/file-sharing" />
                            <link itemprop="codeRepository" href="https://github.com/CodelineRed/file-sharing" />
                            <meta itemprop="programmingLanguage" content="PHP" />
                            <meta itemprop="programmingLanguage" content="HTML" />
                            <meta itemprop="programmingLanguage" content="CSS" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="description" content="Platform to upload, download and share files">
                            <meta itemprop="copyrightYear" content="2018" />
                            <?= getSoftwareVersionMeta('file-sharing', $repos); ?>
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0" />
                                <meta itemprop="priceCurrency" content="EUR" />
                            </div>
                            <a href="https://packagist.org/packages/codelinered/file-sharing" target="_blank" aria-label="File Sharing on Packagist">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-share-alt php-gradient" data-fa-mask="fas fa-file" data-fa-transform="shrink-7 down-2.5"></i>
                                    <i class="fab fa-php" data-fa-transform="shrink-11 up-5.5 left-4.5" style="fill:#212121;"></i>
                                </span>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="File Sharing">File Sharing<?= getSoftwareVersionBadge('file-sharing', $repos); ?></span>
                            </a>
                        </div>
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://packagist.org/packages/codelinered/pdf-image" />
                            <link itemprop="codeRepository" href="https://github.com/CodelineRed/pdf-image" />
                            <meta itemprop="programmingLanguage" content="PHP" />
                            <meta itemprop="programmingLanguage" content="HTML" />
                            <meta itemprop="programmingLanguage" content="CSS" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="description" content="Converts uploaded images to PDF, merges 2 PDF files to 1 or converts PDF to images." />
                            <meta itemprop="copyrightYear" content="2023" />
                            <?= getSoftwareVersionMeta('pdf-image', $repos); ?>
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0">
                                <meta itemprop="priceCurrency" content="EUR">
                            </div>
                            <a href="https://packagist.org/packages/codelinered/pdf-image" target="_blank" aria-label="PDF Image on Packagist">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-image php-gradient" data-fa-mask="fas fa-file" data-fa-transform="shrink-7 down-2.5"></i>
                                    <span class="fa-layers-text" data-fa-transform="shrink-13 up-5.5 left-2.5" style="font-weight:900">PDF</span>
                                </span>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="PDF Image">PDF Image<?= getSoftwareVersionBadge('pdf-image', $repos); ?></span>
                            </a>
                        </div>
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://www.npmjs.com/package/jquery-canvas-animation" />
                            <link itemprop="codeRepository" href="https://github.com/CodelineRed/jquery-canvas-animation" />
                            <meta itemprop="programmingLanguage" content="jQuery" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="description" content="A jQuery Plugin to create JavaScript step in mix with CSS3 animation / transition" />
                            <meta itemprop="copyrightYear" content="2018" />
                            <?= getSoftwareVersionMeta('jquery-canvas-animation', $repos); ?>
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0">
                                <meta itemprop="priceCurrency" content="EUR">
                            </div>
                            <a href="https://ca.codelinered.net" target="_blank" aria-label="Canvas Animation demo page">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-puzzle-piece jquery-gradient"></i>
                                    <span class="fa-layers-text" data-fa-transform="shrink-13 down-0.5 rotate-45" style="font-weight:900">jQuery</span>
                                </span>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="jQuery Plugin - Canvas Animation">Canvas Animation<?= getSoftwareVersionBadge('jquery-canvas-animation', $repos); ?></span>
                            </a>
                        </div>
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://www.npmjs.com/package/bootstrap-breakpoint" />
                            <link itemprop="codeRepository" href="https://github.com/CodelineRed/bootstrap-breakpoint" />
                            <meta itemprop="programmingLanguage" content="jQuery" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="description" content="Write JavaScript conditions depending on the Bootstrap breakpoint" />
                            <meta itemprop="copyrightYear" content="2018" />
                            <?= getSoftwareVersionMeta('bootstrap-breakpoint', $repos); ?>
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0" />
                                <meta itemprop="priceCurrency" content="EUR" />
                            </div>
                            <a href="https://www.npmjs.com/package/bootstrap-breakpoint" target="_blank" aria-label="Bootstrap Breakpoint on NPM">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-puzzle-piece javascript-gradient"></i>
                                    <span class="fa-layers-text" data-fa-transform="shrink-13.75 left-1 down-0.5 rotate-45" style="font-weight:900">JavaScript</span>
                                </span>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="JS Plugin - Bootstrap Breakpoint">Bootstrap Breakpoint<?= getSoftwareVersionBadge('bootstrap-breakpoint', $repos); ?></span>
                            </a>
                        </div>
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://github.com/CodelineRed/typo3-skeleton" />
                            <link itemprop="codeRepository" href="https://github.com/CodelineRed/typo3-skeleton" />
                            <meta itemprop="programmingLanguage" content="PHP" />
                            <meta itemprop="programmingLanguage" content="HTML" />
                            <meta itemprop="programmingLanguage" content="CSS" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="description" content="TYPO3 8.7 Skeleton - CodelineRed" />
                            <meta itemprop="copyrightYear" content="2018" />
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0" />
                                <meta itemprop="priceCurrency" content="EUR" />
                            </div>
                            <a href="https://github.com/CodelineRed/typo3-skeleton" target="_blank" aria-label="TYPO3 8.7 Skeleton on GitHub">
                                <i class="fab fa-5x fa-typo3" aria-hidden="true"></i>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="TYPO3 8.7 Skeleton (DEV)">TYPO3 8.7 Skeleton <span class="badge badge-secondary">DEV</span></span>
                            </a>
                        </div>
                        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="col-6 col-sm-4 text-center py-4">
                            <link itemprop="url" href="https://github.com/CodelineRed/typo3-base-ext" />
                            <link itemprop="codeRepository" href="https://github.com/CodelineRed/typo3-base-ext" />
                            <meta itemprop="programmingLanguage" content="PHP" />
                            <meta itemprop="programmingLanguage" content="HTML" />
                            <meta itemprop="programmingLanguage" content="CSS" />
                            <meta itemprop="programmingLanguage" content="JavaScript" />
                            <meta itemprop="programmingLanguage" content="TypoScript" />
                            <meta itemprop="description" content="TYPO3 Base Extension - CodelineRed" />
                            <meta itemprop="copyrightYear" content="2018" />
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <meta itemprop="price" content="0" />
                                <meta itemprop="priceCurrency" content="EUR" />
                            </div>
                            <a href="https://github.com/CodelineRed/typo3-base-ext" target="_blank" aria-label="TYPO3 Base Extension on GitHub">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-puzzle-piece typo3-gradient"></i>
                                    <span class="fa-layers-text" data-fa-transform="shrink-13 left-0.75 down-0.5 rotate-45" style="font-weight:900">TYPO3</span>
                                </span>
                                <span itemprop="name" class="mt-2 d-block glitch-text" data-text="TYPO3 Base Extension (DEV)">TYPO3 Base Extension <span class="badge badge-secondary">DEV</span></span>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="http://gist.codelinered.net" target="_blank" aria-label="Code Snippets on Gist">
                                <span class="fa-layers fa-5x">
                                    <i class="fas fa-circle" data-fa-transform="shrink-0.75"></i>
                                    <i class="fab fa-github"></i>
                                </span>
                                <div class="mt-2 glitch-text" data-text="Code Snippets">Code Snippets</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <h3 class="text-center mt-5 mb-2 glitch-text" data-text="Miscellaneous">Miscellaneous</h3>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="https://stream.codelinered.net/" target="_blank" aria-label="Stream Information">
                                <i class="fas fa-5x fa-gamepad" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="Stream Information">Stream Information</div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 text-center py-4">
                            <a href="https://devbook.codelinered.net/" target="_blank" aria-label="Developer Bookmark">
                                <i class="fas fa-5x fa-book" aria-hidden="true"></i>
                                <div class="mt-2 glitch-text" data-text="Developer Bookmark">Developer Bookmark</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-6 col-sm-4 text-center my-4">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="glitch-style" onchange="javascript:document.getElementById('the-body').classList.toggle('glitch');">
                                <label class="custom-control-label" for="glitch-style">Glitch Style</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/fa-all.min.js?v=6.5.1"></script>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                let fillInterval = setInterval(function() {
                    //console.log('wait');
                    if (!document.querySelectorAll('i[class*="fa-"]').length) {
                        //console.log('now');
                        clearInterval(fillInterval);
                        let a = document.querySelectorAll('[fill="currentColor"]');

                        for (let i in a) if (a.hasOwnProperty(i)) {
                            a[i].setAttribute('fill', '');
                        }
                    }
                }, 100);
            });
        </script>
    </body>
</html>