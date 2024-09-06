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
        <div class="row">
            <!--<div class="col-12">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= langBaseUrl(); ?>"><?= trans("home"); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= trans("register"); ?></li>
                    </ol>
                </nav>
            </div>-->
        </div>
        <div class="auth-container">
            <div class="auth-box">
                <div class="row">
                    <div class="col-12">
                        <h1 class="title"><?= trans("register"); ?></h1>
                        <form action="<?= base_url('register-post'); ?>" method="post" id="form_validate" class="validate_terms" <?= $baseVars->recaptchaStatus ? 'onsubmit="checkRecaptchaRegisterForm(this);"' : ''; ?>>
                            <?= csrf_field(); ?>
                            <div class="social-login">
                                <?= view('auth/_social_login', ['orText' => trans("register_with_email")]); ?>
                            </div>
                            <div id="result-register">
                                <?= view('partials/_messages'); ?>
                            </div>
                            <div class="spinner display-none spinner-activation-register">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control auth-form-input" placeholder="<?= trans("first_name"); ?>" value="<?= old("first_name"); ?>" maxlength="255" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" class="form-control auth-form-input" placeholder="<?= trans("last_name"); ?>" value="<?= old("last_name"); ?>" maxlength="255" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control auth-form-input" placeholder="<?= trans("email_address"); ?>" value="<?= old("email"); ?>" maxlength="255" required>
                            </div>
                            <div class="form-group">
                                <input type="phone_number" name="phone_number" class="form-control auth-form-input" placeholder="<?= trans("phone_number"); ?>" value="<?= old("phone_number"); ?>" maxlength="255" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control auth-form-input" placeholder="<?= trans("password"); ?>" value="<?= old("password"); ?>" minlength="4" maxlength="255" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm_password" class="form-control auth-form-input" placeholder="<?= trans("password_confirm"); ?>" maxlength="255" required>
                            </div>
                            <div class="form-group m-t-5 m-b-15">
                                <div class="custom-control custom-checkbox custom-control-validate-input">
                                    <input type="checkbox" class="custom-control-input" name="terms" id="checkbox_terms" required>
                                    <label for="checkbox_terms" class="custom-control-label"><?= trans("terms_conditions_exp"); ?>&nbsp;
                                        <?php $pageTerms = getPageByDefaultName("terms_conditions", selectedLangId());
                                        if (!empty($pageTerms)): ?>
                                            <a href="<?= generateUrl($pageTerms->page_default_name); ?>" class="link-terms" target="_blank"><strong><?= esc($pageTerms->title); ?></strong></a>
                                        <?php endif; ?>
                                    </label>
                                </div>
                            </div>
                            <?php if ($baseVars->recaptchaStatus): ?>
                                <div class="form-group m-b-15">
                                    <div class="display-flex justify-content-center">
                                        <?php reCaptcha('generate'); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <button type="submit" class="btn btn-custom btn-block"><?= trans("register"); ?></button>
                            </div>
                            <p class="p-social-media m-0 m-t-15"><?= trans("have_account"); ?>&nbsp;<a href="<?= generateUrl("login"); ?>" class="link font-600"><?= trans("login"); ?></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>