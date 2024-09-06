<!DOCTYPE html>
<html lang="<?= $activeLang->short_form; ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?= esc($title); ?> - <?= esc($baseSettings->site_title); ?></title>
<meta name="description" content="<?= esc($description); ?>"/>
<meta name="keywords" content="<?= esc($keywords); ?>"/>
<meta name="author" content="<?= esc($generalSettings->application_name); ?>"/>
<link rel="shortcut icon" type="image/png" href="<?= getFavicon(); ?>"/>
<meta property="og:locale" content="en-US"/>
<meta property="og:site_name" content="<?= esc($generalSettings->application_name); ?>"/>
<?php if (isset($showOgTags)): ?>
<meta property="og:type" content="<?= !empty($ogType) ? $ogType : 'website'; ?>"/>
<meta property="og:title" content="<?= !empty($ogTitle) ? $ogTitle : 'index'; ?>"/>
<meta property="og:description" content="<?= $ogDescription; ?>"/>
<meta property="og:url" content="<?= $ogUrl; ?>"/>
<meta property="og:image" content="<?= $ogImage; ?>"/>
<meta property="og:image:width" content="<?= !empty($ogWidth) ? $ogWidth : 250; ?>"/>
<meta property="og:image:height" content="<?= !empty($ogHeight) ? $ogHeight : 250; ?>"/>
<meta property="article:author" content="<?= !empty($ogAuthor) ? $ogAuthor : ''; ?>"/>
<meta property="fb:app_id" content="<?= esc($generalSettings->facebook_app_id); ?>"/>
<?php if (!empty($ogTags)):foreach ($ogTags as $tag): ?>
<meta property="article:tag" content="<?= esc($tag->tag); ?>"/>
<?php endforeach; endif; ?>
<meta property="article:published_time" content="<?= !empty($ogPublishedTime) ? $ogPublishedTime : ''; ?>"/>
<meta property="article:modified_time" content="<?= !empty($ogModifiedTime) ? $ogModifiedTime : ''; ?>"/>
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:site" content="@<?= esc($generalSettings->application_name); ?>"/>
<meta name="twitter:creator" content="@<?= esc($ogCreator); ?>"/>
<meta name="twitter:title" content="<?= esc($ogTitle); ?>"/>
<meta name="twitter:description" content="<?= esc($ogDescription); ?>"/>
<meta name="twitter:image" content="<?= $ogImage; ?>"/>
<?php else: ?>
<meta property="og:image" content="<?= getLogo(); ?>"/>
<meta property="og:image:width" content="160"/>
<meta property="og:image:height" content="60"/>
<meta property="og:type" content="website"/>
<meta property="og:title" content="<?= esc($title); ?> - <?= esc($baseSettings->site_title); ?>"/>
<meta property="og:description" content="<?= esc($description); ?>"/>
<meta property="og:url" content="<?= base_url(); ?>"/>
<meta property="fb:app_id" content="<?= esc($generalSettings->facebook_app_id); ?>"/>
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:site" content="@<?= esc($generalSettings->application_name); ?>"/>
<meta name="twitter:title" content="<?= esc($title); ?> - <?= esc($baseSettings->site_title); ?>"/>
<meta name="twitter:description" content="<?= esc($description); ?>"/>
<?php endif;
if ($generalSettings->pwa_status == 1): ?>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="<?= esc($generalSettings->application_name); ?>">
<meta name="msapplication-TileImage" content="<?= base_url('assets/img/pwa/144x144.png'); ?>">
<meta name="msapplication-TileColor" content="#2F3BA2">
<link rel="manifest" href="<?= base_url('manifest.json'); ?>">
<link rel="apple-touch-icon" href="<?= base_url('assets/img/pwa/144x144.png'); ?>">
<?php endif; ?>
<link rel="canonical" href="<?= getCurrentUrl(); ?>"/>
<?= csrf_meta(); ?>
<?php if ($generalSettings->multilingual_system == 1):
foreach ($activeLanguages as $language):?>
<link rel="alternate" href="<?= convertUrlByLanguage($language); ?>" hreflang="<?= esc($language->language_code); ?>"/>
<?php endforeach; endif; ?>
<link rel="stylesheet" href="<?= base_url('assets/vendor/font-icons/css/mds-icons-2.4.min.css'); ?>"/>
<?= view('partials/_fonts'); ?>
<link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>"/>
<link rel="stylesheet" href="<?= base_url('assets/css/style-2.4.min.css'); ?>"/>
<link rel="stylesheet" href="<?= base_url('assets/css/plugins-2.4.css'); ?>"/>
<?= view('partials/_css_js_header');
if ($baseVars->rtl == true): ?>
<link rel="stylesheet" href="<?= base_url('assets/css/rtl-2.4.min.css'); ?>">
<?php endif; ?>
<?= $generalSettings->google_adsense_code; ?>
<?= $generalSettings->custom_header_codes; ?>
</head>
<body>
    <div id="wrapper">
    <div class="container">
        <div class="auth-container">
            <div class="auth-box">
                <div class="row">
                    <div class="col-12">
                        <h1 class="title"><?= trans("reset_password"); ?></h1>
                        <form action="<?= base_url('reset-password-post'); ?>" method="post" id="form_validate">
                            <?= csrf_field(); ?>
                            <?= view('partials/_messages'); ?>
                            <?php if (!empty($user)): ?>
                                <input type="hidden" name="token" value="<?= esc($user->token); ?>">
                            <?php endif;
                            if (!empty($success)): ?>
                                <div class="form-group m-t-30">
                                    <a href="<?= langBaseUrl(); ?>" class="btn btn-md btn-custom btn-block"><?= trans("goto_home"); ?></a>
                                </div>
                            <?php else: ?>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-input" value="<?= old("password"); ?>" placeholder="<?= trans("new_password"); ?>" minlength="4" maxlength="255" required>
                                </div>
                                <div class="form-group m-b-30">
                                    <input type="password" name="password_confirm" class="form-control form-input" value="<?= old("password_confirm"); ?>" placeholder="<?= trans("password_confirm"); ?>" maxlength="255" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-custom btn-block"><?= trans("submit"); ?></button>
                                    
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>