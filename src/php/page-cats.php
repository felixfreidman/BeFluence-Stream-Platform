<?php /* Template Name: Categories Page */ ?>
<?php get_header(); ?>

<?php
    $isCountries = $_GET['showCountries'];
    $isPlatforms = $_GET['showPlatforms'];

    function get_total_countries() {
        global $wpdb;
        $sql = $wpdb->prepare("SELECT streamer_country FROM wp_specialData");
        $result = $wpdb->get_results($sql);
        $arrayResult = json_decode(json_encode($result), true);
        return $arrayResult;
    }
    $countries =  get_total_countries();

    $countriesArray = [];

    foreach($countries as $key => $value) {
        $innerArray = array_values($value);
        foreach ($innerArray as $key_inner => $value_inner) {
            $countriesArray[] = $value_inner;
        }
    }

    $countriesArray = array_unique($countriesArray);

    function get_total_platforms() {
        global $wpdb;
        $sql = $wpdb->prepare("SELECT streamer_platform FROM wp_specialData");
        $result = $wpdb->get_results($sql);
        $arrayResult = json_decode(json_encode($result), true);
        return $arrayResult;
    }

    $platforms =  get_total_platforms();
    $platformsArray = [];

    foreach($platforms as $key => $value) {
        $innerArray = array_values($value);
        foreach ($innerArray as $key_inner => $value_inner) {
            $platformsArray[] = $value_inner;
        }
    }
    $platformsArray = array_unique($platformsArray);

    $categoryPageHeader = '';
    $categoryPageArray = '';
    $categoryPageQuery = '';

    if($isCountries === 'true') {
        $categoryPageHeader = 'Страны';
        $categoryPageArray = $countriesArray;
        $categoryPageQuery = '/search?showLiked=false&searchName=false&platform=all&isGamble=all&isWorked=all&isBlocked=all&country=';
    } else if ($isPlatforms === 'true') {
        $categoryPageHeader = 'Платформы';
        $categoryPageArray = $platformsArray;
        $categoryPageQuery = '/search?showLiked=false&searchName=false&country=all&isGamble=all&isWorked=all&isBlocked=all&platform=';
    }
?>

<main class="main catsPage">
    <div class="main__row">
        <div class="main__pageHeader"><?php echo $categoryPageHeader ?></div>
        <?php get_template_part('template/template-input') ?>
    </div>
    <div class="catsPage__layout catsPage__layoutTable">
        <div class="catsPage__bloggersTable">
            <div class="bloggersTable__mainRow">
                <div class="bloggersTable__mainHeader"><?php echo $categoryPageHeader ?></div>
                <div class="bloggersTable__counter">
                    <span class="bloggersTable__counterActive">1-<?php echo count($categoryPageArray) ?></span>
                    &nbsp;из&nbsp;
                    <span><?php echo count($categoryPageArray) ?></span>
                </div>
            </div>
            <div class="bloggersTable__contentRows">
                <?php foreach ( $categoryPageArray as $result ) { ?>
                    <a class="bloggersTable__contentRow" href="<?php echo site_url() . $categoryPageQuery .  $result ?>">
                        <div class="bloggersTable__contentCell"><?php echo $result?></div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>