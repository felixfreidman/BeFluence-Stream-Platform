<?php /* Template Name: Main Page */?>
<?php get_header()?>


<?php 
    function get_all_streamers() {
        global $wpdb;
        $sql = $wpdb->prepare("SELECT * FROM wp_specialData");
        return $wpdb->get_results($sql);
    }

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

    function get_total_liked() {
        global $wpdb;
        $sql = $wpdb->prepare("SELECT * FROM wp_specialData WHERE streamer_isLiked <> 'No'");
        return $wpdb->get_results($sql);
    }

    $streamers_array = get_all_streamers();
    
?>
<main class="main mainPage">
        <div class="main__row">
            <div class="main__pageHeader">Блогеры</div>
            <label for="searchBlogger" class="mainPage__searchLabel">
                <input type="text" name="searchBlogger" id="searchBlogger" class="mainPage__searchInput"
                    placeholder="Искать...">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="mainPage__searchLabelImg">
                    <path
                        d="M7.2593 12.9446C10.5321 12.9446 13.1852 10.2915 13.1852 7.0187C13.1852 3.7459 10.5321 1.09277 7.2593 1.09277C3.9865 1.09277 1.33337 3.7459 1.33337 7.0187C1.33337 10.2915 3.9865 12.9446 7.2593 12.9446Z"
                        stroke="#AEB9E1" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M14.6666 14.4263L11.4444 11.2041" stroke="#AEB9E1" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </label>
            <div class="layout layoutContainer filterLayout">
                <div class="layoutContainer__button openFilters">
                    <svg width="718" height="618" viewBox="0 0 718 618" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M217.333 492.333C217.333 478.527 206.14 467.333 192.333 467.333H25.6666C11.8596 467.333 0.666626 478.527 0.666626 492.333C0.666626 506.14 11.8596 517.333 25.6666 517.333H192.333C206.14 517.333 217.333 506.14 217.333 492.333Z"
                            fill="#FFFFFF" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M500.667 125.667C500.667 111.86 511.86 100.667 525.667 100.667H692.333C706.14 100.667 717.333 111.86 717.333 125.667C717.333 139.474 706.14 150.667 692.333 150.667H525.667C511.86 150.667 500.667 139.474 500.667 125.667Z"
                            fill="#FFFFFF" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M717.333 492.333C717.333 478.527 706.14 467.333 692.333 467.333H392.333C378.527 467.333 367.333 478.527 367.333 492.333C367.333 506.14 378.527 517.333 392.333 517.333H692.333C706.14 517.333 717.333 506.14 717.333 492.333Z"
                            fill="#FFFFFF" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.666626 125.667C0.666626 111.86 11.8596 100.667 25.6666 100.667H325.667C339.473 100.667 350.667 111.86 350.667 125.667C350.667 139.474 339.473 150.667 325.667 150.667H25.6666C11.8596 150.667 0.666626 139.474 0.666626 125.667Z"
                            fill="#FFFFFF" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M167.333 425.667C167.333 393.45 193.45 367.333 225.667 367.333H359C391.217 367.333 417.333 393.45 417.333 425.667V559C417.333 591.217 391.217 617.333 359 617.333H225.667C193.45 617.333 167.333 591.217 167.333 559V425.667Z"
                            fill="#FFFFFF" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M550.667 59C550.667 26.7833 524.55 0.666679 492.333 0.666679H359C326.783 0.666679 300.667 26.7833 300.667 59V192.333C300.667 224.55 326.783 250.667 359 250.667H492.333C524.55 250.667 550.667 224.55 550.667 192.333V59Z"
                            fill="#FFFFFF" />
                    </svg>
                </div>
            </div>
            <div class="layout layoutContainer layoutTogglers">
                <div class="layoutContainer__button layoutContainer__buttonActive setTable">
                    <svg width="600" height="568" viewBox="0 0 600 568" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M33.3334 200.667H566.667M33.3334 367.333H566.667M200 34V534M140 534H460C497.337 534 516.007 534 530.267 526.733C542.81 520.343 553.01 510.143 559.4 497.6C566.667 483.34 566.667 464.67 566.667 427.333V140.667C566.667 103.33 566.667 84.6613 559.4 70.4007C553.01 57.8563 542.81 47.6577 530.267 41.2663C516.007 34 497.337 34 460 34H140C102.663 34 83.9947 34 69.734 41.2663C57.1897 47.6577 46.991 57.8563 40.5997 70.4007C33.3334 84.6613 33.3334 103.33 33.3334 140.667V427.333C33.3334 464.67 33.3334 483.34 40.5997 497.6C46.991 510.143 57.1897 520.343 69.734 526.733C83.9947 534 102.663 534 140 534Z"
                            stroke="#FFFFFF" stroke-width="66.6667" />
                    </svg>
                </div>
                <div class="layoutContainer__button setGrid">
                    <svg width="800" height="800" viewBox="0 0 800 800" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M685.714 0H571.429C508.314 0 457.143 51.1714 457.143 114.286V228.571C457.143 291.686 508.314 342.857 571.429 342.857H685.714C748.829 342.857 800 291.686 800 228.571V114.286C800 51.1714 748.829 0 685.714 0ZM685.714 457.143H571.429C508.314 457.143 457.143 508.314 457.143 571.429V685.714C457.143 748.829 508.314 800 571.429 800H685.714C748.829 800 800 748.829 800 685.714V571.429C800 508.314 748.829 457.143 685.714 457.143ZM228.571 457.143H114.286C51.1714 457.143 0 508.314 0 571.429V685.714C0 748.829 51.1714 800 114.286 800H228.571C291.686 800 342.857 748.829 342.857 685.714V571.429C342.857 508.314 291.686 457.143 228.571 457.143ZM228.571 0H114.286C51.1714 0 0 51.1714 0 114.286V228.571C0 291.686 51.1714 342.857 114.286 342.857H228.571C291.686 342.857 342.857 291.686 342.857 228.571V114.286C342.857 51.1714 291.686 0 228.571 0Z"
                            fill="#FFFFFF" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="mainPage__filterButtons">
            <div class="mainPage__filterButton">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/static/TotalUsers.svg'?>" alt="" class="mainPage__filterButtonImg">
                <div class="mainPage__filterButtonContainer">
                    <div class="mainPage__filterButtonContainerHeader">Всего <br>блогеров</div>
                    <div class="mainPage__filterButtonContainerValue"><?php echo count($streamers_array) ?></div>
                </div>
                <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="mainPage__filterButtonFilterOpener">
                    <path
                        d="M11.6651 10.998C11.6651 10.4797 11.2456 10.0595 10.7281 10.0595C10.2105 10.0595 9.79102 10.4797 9.79102 10.998C9.79102 11.5163 10.2105 11.9365 10.7281 11.9365C11.2456 11.9365 11.6651 11.5163 11.6651 10.998Z"
                        fill="white" />
                    <path
                        d="M11.6651 5.99411C11.6651 5.47578 11.2456 5.05559 10.7281 5.05559C10.2105 5.05559 9.79102 5.47578 9.79102 5.99411C9.79102 6.51243 10.2105 6.93262 10.7281 6.93262C11.2456 6.93262 11.6651 6.51243 11.6651 5.99411Z"
                        fill="white" />
                    <path
                        d="M11.6651 16.0058C11.6651 15.4875 11.2456 15.0673 10.7281 15.0673C10.2105 15.0673 9.79102 15.4875 9.79102 16.0058C9.79102 16.5242 10.2105 16.9443 10.7281 16.9443C11.2456 16.9443 11.6651 16.5242 11.6651 16.0058Z"
                        fill="white" />
                </svg>
            </div>
            <div class="mainPage__filterButton">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/static/locationIcon.svg'?>" alt="" class="mainPage__filterButtonImg">
                <div class="mainPage__filterButtonContainer">
                    <div class="mainPage__filterButtonContainerHeader">Страны</div>
                    <div class="mainPage__filterButtonContainerValue"><?php echo count($countriesArray) ?></div>
                </div>
                <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="mainPage__filterButtonFilterOpener">
                    <path
                        d="M11.6651 10.998C11.6651 10.4797 11.2456 10.0595 10.7281 10.0595C10.2105 10.0595 9.79102 10.4797 9.79102 10.998C9.79102 11.5163 10.2105 11.9365 10.7281 11.9365C11.2456 11.9365 11.6651 11.5163 11.6651 10.998Z"
                        fill="white" />
                    <path
                        d="M11.6651 5.99411C11.6651 5.47578 11.2456 5.05559 10.7281 5.05559C10.2105 5.05559 9.79102 5.47578 9.79102 5.99411C9.79102 6.51243 10.2105 6.93262 10.7281 6.93262C11.2456 6.93262 11.6651 6.51243 11.6651 5.99411Z"
                        fill="white" />
                    <path
                        d="M11.6651 16.0058C11.6651 15.4875 11.2456 15.0673 10.7281 15.0673C10.2105 15.0673 9.79102 15.4875 9.79102 16.0058C9.79102 16.5242 10.2105 16.9443 10.7281 16.9443C11.2456 16.9443 11.6651 16.5242 11.6651 16.0058Z"
                        fill="white" />
                </svg>
            </div>
            <div class="mainPage__filterButton">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/static/platformIcon.svg'?>" alt="" class="mainPage__filterButtonImg">
                <div class="mainPage__filterButtonContainer">
                    <div class="mainPage__filterButtonContainerHeader">Платформы</div>
                    <div class="mainPage__filterButtonContainerValue"><?php echo count($platformsArray) ?></div>
                </div>
                <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="mainPage__filterButtonFilterOpener">
                    <path
                        d="M11.6651 10.998C11.6651 10.4797 11.2456 10.0595 10.7281 10.0595C10.2105 10.0595 9.79102 10.4797 9.79102 10.998C9.79102 11.5163 10.2105 11.9365 10.7281 11.9365C11.2456 11.9365 11.6651 11.5163 11.6651 10.998Z"
                        fill="white" />
                    <path
                        d="M11.6651 5.99411C11.6651 5.47578 11.2456 5.05559 10.7281 5.05559C10.2105 5.05559 9.79102 5.47578 9.79102 5.99411C9.79102 6.51243 10.2105 6.93262 10.7281 6.93262C11.2456 6.93262 11.6651 6.51243 11.6651 5.99411Z"
                        fill="white" />
                    <path
                        d="M11.6651 16.0058C11.6651 15.4875 11.2456 15.0673 10.7281 15.0673C10.2105 15.0673 9.79102 15.4875 9.79102 16.0058C9.79102 16.5242 10.2105 16.9443 10.7281 16.9443C11.2456 16.9443 11.6651 16.5242 11.6651 16.0058Z"
                        fill="white" />
                </svg>
            </div>
            <div class="mainPage__filterButton">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/static/likedUsers.svg'?>" alt="" class="mainPage__filterButtonImg">
                <div class="mainPage__filterButtonContainer">
                    <div class="mainPage__filterButtonContainerHeader">Отмеченные <br>блогеры</div>
                    <div class="mainPage__filterButtonContainerValue"><?php echo count(get_total_liked()) ?></div>
                </div>
                <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="mainPage__filterButtonFilterOpener">
                    <path
                        d="M11.6651 10.998C11.6651 10.4797 11.2456 10.0595 10.7281 10.0595C10.2105 10.0595 9.79102 10.4797 9.79102 10.998C9.79102 11.5163 10.2105 11.9365 10.7281 11.9365C11.2456 11.9365 11.6651 11.5163 11.6651 10.998Z"
                        fill="white" />
                    <path
                        d="M11.6651 5.99411C11.6651 5.47578 11.2456 5.05559 10.7281 5.05559C10.2105 5.05559 9.79102 5.47578 9.79102 5.99411C9.79102 6.51243 10.2105 6.93262 10.7281 6.93262C11.2456 6.93262 11.6651 6.51243 11.6651 5.99411Z"
                        fill="white" />
                    <path
                        d="M11.6651 16.0058C11.6651 15.4875 11.2456 15.0673 10.7281 15.0673C10.2105 15.0673 9.79102 15.4875 9.79102 16.0058C9.79102 16.5242 10.2105 16.9443 10.7281 16.9443C11.2456 16.9443 11.6651 16.5242 11.6651 16.0058Z"
                        fill="white" />
                </svg>
            </div>
        </div>
        <div class="mainPage__layout mainPage__layoutTable">
            <div class="mainPage__bloggersTable">
                <div class="bloggersTable__mainRow">
                    <div class="bloggersTable__mainHeader">Блогеры</div>
                    <div class="bloggersTable__counter">
                        <span class="bloggersTable__counterActive">1-9</span>
                        &nbsp;из&nbsp;
                        <span><?php echo count($streamers_array) ?></span>
                    </div>
                </div>
                <div class="bloggersTable__filterRow">
                    <div class="bloggersTable__filterCell">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.36257 13.7199C3.21408 13.7199 3.07168 13.6609 2.96668 13.5559C2.86169 13.4509 2.8027 13.3085 2.8027 13.1601V10.1718C2.49555 10.3183 2.15515 10.3811 1.81594 10.3537C1.52872 10.3326 1.24969 10.2485 0.998699 10.1073C0.747707 9.96605 0.530926 9.77125 0.363785 9.53673C0.196643 9.30221 0.0832509 9.03372 0.0316773 8.75039C-0.0198963 8.46705 -0.00838304 8.17584 0.0653976 7.89746C0.139178 7.61908 0.273412 7.36039 0.458547 7.13979C0.643681 6.91919 0.875164 6.74211 1.13652 6.62116C1.39788 6.5002 1.68268 6.43834 1.97067 6.43998C2.25865 6.44161 2.54274 6.50671 2.8027 6.63063V3.64235C2.8027 3.49387 2.86169 3.35146 2.96668 3.24647C3.07168 3.14147 3.21408 3.08249 3.36257 3.08249H6.63078C6.48426 2.77534 6.42149 2.43493 6.44882 2.09573C6.46992 1.80851 6.55408 1.52948 6.69529 1.27848C6.8365 1.02749 7.0313 0.810711 7.26582 0.64357C7.50035 0.476429 7.76883 0.363036 8.05217 0.311462C8.3355 0.259889 8.62672 0.271402 8.9051 0.345183C9.18347 0.418963 9.44217 0.553198 9.66276 0.738332C9.88336 0.923466 10.0604 1.15495 10.1814 1.41631C10.3024 1.67766 10.3642 1.96247 10.3626 2.25045C10.3609 2.53844 10.2958 2.82252 10.1719 3.08249H13.4401C13.5886 3.08249 13.731 3.14147 13.836 3.24647C13.941 3.35146 14 3.49387 14 3.64235V6.63063C13.6929 6.48411 13.3524 6.42134 13.0132 6.44867C12.726 6.46978 12.447 6.55393 12.196 6.69514C11.945 6.83635 11.7282 7.03115 11.5611 7.26568C11.3939 7.5002 11.2805 7.76868 11.229 8.05202C11.1774 8.33535 11.1889 8.62657 11.2627 8.90495C11.3365 9.18333 11.4707 9.44202 11.6558 9.66262C11.841 9.88321 12.0725 10.0603 12.3338 10.1812C12.5952 10.3022 12.88 10.3641 13.168 10.3624C13.456 10.3608 13.74 10.2957 14 10.1718V13.1601C14 13.3085 13.941 13.4509 13.836 13.5559C13.731 13.6609 13.5886 13.7199 13.4401 13.7199H3.36257Z"
                                fill="#AEB9E1" />
                        </svg>
                        Категория
                    </div>
                    <div class="bloggersTable__filterCell">
                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="activeFilter">
                            <path
                                d="M0.943604 12.7391C0.943604 10.5946 2.68203 8.8562 4.8265 8.8562H9.17356C11.318 8.8562 13.0565 10.5946 13.0565 12.7391C13.0565 13.4539 12.477 14.0334 11.7622 14.0334H2.2379C1.52308 14.0334 0.943604 13.4539 0.943604 12.7391Z"
                                fill="#AEB9E1" />
                            <path
                                d="M7.00236 7.86972C8.90855 7.86972 10.4538 6.32445 10.4538 4.41826C10.4538 2.51207 8.90855 0.966797 7.00236 0.966797C5.09617 0.966797 3.5509 2.51207 3.5509 4.41826C3.5509 6.32445 5.09617 7.86972 7.00236 7.86972Z"
                                fill="#AEB9E1" />
                        </svg>
                        Имя
                    </div>
                    <div class="bloggersTable__filterCell">
                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.04152 0.427734C3.99992 0.428916 3.00132 0.843213 2.26479 1.57974C1.52827 2.31626 1.11397 3.31486 1.11279 4.35646C1.11279 7.7182 4.68436 10.2585 4.83615 10.3656C4.89698 10.4061 4.96843 10.4277 5.04152 10.4277C5.1146 10.4277 5.18605 10.4061 5.24688 10.3656C5.39867 10.2585 8.97024 7.7182 8.97024 4.35646C8.96906 3.31486 8.55476 2.31626 7.81824 1.57974C7.08172 0.843213 6.08312 0.428916 5.04152 0.427734V0.427734ZM5.04152 2.92783C5.32407 2.92783 5.60028 3.01162 5.83522 3.1686C6.07016 3.32558 6.25327 3.5487 6.3614 3.80975C6.46953 4.07079 6.49782 4.35804 6.44269 4.63517C6.38757 4.9123 6.25151 5.16685 6.05171 5.36665C5.85191 5.56645 5.59735 5.70251 5.32023 5.75763C5.0431 5.81276 4.75585 5.78447 4.4948 5.67634C4.23376 5.56821 4.01064 5.3851 3.85366 5.15016C3.69668 4.91522 3.61289 4.63901 3.61289 4.35646C3.61289 3.97756 3.76341 3.61419 4.03133 3.34627C4.29924 3.07835 4.66262 2.92783 5.04152 2.92783V2.92783Z"
                                fill="#AEB9E1" />
                        </svg>
                        Страна
                    </div>
                    <div class="bloggersTable__filterCell">
                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.0062 2.53898H8.04943C7.95687 2.00296 7.67795 1.51687 7.26188 1.16649C6.84581 0.816108 6.31934 0.623962 5.77539 0.623962C5.23144 0.623962 4.70498 0.816108 4.28891 1.16649C3.87284 1.51687 3.59391 2.00296 3.50135 2.53898H1.54462C1.34061 2.53898 1.14495 2.62002 1.00069 2.76428C0.856434 2.90854 0.775391 3.1042 0.775391 3.30821V9.46206C0.775391 9.66607 0.856434 9.86173 1.00069 10.006C1.14495 10.1502 1.34061 10.2313 1.54462 10.2313H10.0062C10.2102 10.2313 10.4058 10.1502 10.5501 10.006C10.6943 9.86173 10.7754 9.66607 10.7754 9.46206V3.30821C10.7754 3.1042 10.6943 2.90854 10.5501 2.76428C10.4058 2.62002 10.2102 2.53898 10.0062 2.53898V2.53898ZM5.77539 1.38513C6.11638 1.38579 6.44756 1.49935 6.71719 1.7081C6.98683 1.91685 7.17973 2.20902 7.26578 2.53898H4.28501C4.37105 2.20902 4.56395 1.91685 4.83359 1.7081C5.10322 1.49935 5.4344 1.38579 5.77539 1.38513V1.38513Z"
                                fill="#AEB9E1" />
                        </svg>
                        Платформа
                    </div>
                    <div class="bloggersTable__filterCell">
                        <svg width="800" height="800" viewBox="0 0 800 800" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.15"
                                d="M700 400C700 565.687 565.687 700 400 700C234.315 700 100 565.687 100 400C100 234.315 234.315 100 400 100C565.687 100 700 234.315 700 400Z"
                                fill="#AEB9E1" />
                            <path
                                d="M400 533.333H433.333C455.557 533.333 500 520 500 466.667C500 413.333 455.557 400 433.333 400H366.667C344.443 400 300 386.667 300 333.333C300 280 344.443 266.667 366.667 266.667H400M400 533.333H300M400 533.333V600M400 266.667H500M400 266.667V200M700 400C700 565.687 565.687 700 400 700C234.315 700 100 565.687 100 400C100 234.315 234.315 100 400 100C565.687 100 700 234.315 700 400Z"
                                stroke="#AEB9E1" stroke-width="50" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Гэмблинг
                    </div>
                </div>
                <div class="bloggersTable__contentRows">
                    <?php foreach ( $streamers_array as $result ) { ?>
                        <a class="bloggersTable__contentRow" href="<?php echo site_url() . '?page_id=36&streamer=' . $result->ID ?>">
                            <div class="bloggersTable__contentCell">
                                <?php echo $result->streamer_category ?>
                            </div>
                            <div class="bloggersTable__contentCell">
                                <?php if($result->streamer_img === '') { ?>
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/static/placeholder.png'?>" alt=""
                                    class="bloggersTable__contentCellImg">
                                <?php } else { ?>
                                    <img src="<?php echo $result->streamer_img?>" alt=""
                                    class="bloggersTable__contentCellImg">
                                <?php } ?>
                                
                                <div class="bloggersTable__contentCellContainer">
                                    <span class="bloggersTable__contentCellName"><?php echo $result->streamer_name ?></span>
                                    <span class="bloggersTable__contentCellContact"><?php echo $result->streamer_contact ?></span>
                                </div>
                            </div>
                            <div class="bloggersTable__contentCell"><?php echo $result->streamer_country ?></div>
                            <div class="bloggersTable__contentCell"><?php echo $result->streamer_platform ?></div>
                                <?php if($result->streamer_isGamble !== 'Yes') { ?>
                                    <div class="bloggersTable__contentCell">No</div>
                                    <?php } else { ?>
                                        <div class="bloggersTable__contentCell"><?php echo $result->streamer_isGamble ?></div>
                                <?php } ?>
                            <svg class="bloggersTable__edit" width="13" height="14" viewBox="0 0 13 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.0947 1.99892C10.9244 1.82932 10.7221 1.69516 10.4997 1.60417C10.2772 1.51318 10.0389 1.46716 9.79856 1.46879C9.55822 1.47042 9.32057 1.51965 9.09936 1.61365C8.87815 1.70764 8.67776 1.84453 8.50975 2.01642L1.64715 8.87912C1.3937 9.13258 1.21301 9.44949 1.12401 9.79671L0.542819 12.0641C0.467311 12.3586 0.735111 12.6264 1.02967 12.5508L3.29714 11.9693C3.64426 11.8802 3.96108 11.6996 4.21448 11.4462L11.0772 4.58338C11.2491 4.41545 11.386 4.2151 11.4801 3.99392C11.5741 3.77275 11.6233 3.53512 11.625 3.2948C11.6266 3.05447 11.5806 2.8162 11.4895 2.59377C11.3985 2.37134 11.2643 2.16916 11.0947 1.99892Z"
                                    fill="#BBF83B" stroke="#BBF83B" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="mainPage__layout mainPage__layoutActive mainPage__layoutGrid">
            <div class="mainPage__bloggersGrid">
            <?php foreach ( $streamers_array as $result ) { ?>
                <a class="mainPage__bloggersGridTile gridTile" href="<?php echo site_url() . '?page_id=36&streamer=' . $result->ID ?>">
                    <div class="gridTile__mainInfoContainer">
                        <div class="gridTile__personContainer">
                            <div class="gridTile__imgContainer">
                                <?php if($result->streamer_img === '') { ?>
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/static/placeholder.png'?>" alt="" class="gridTile__img">
                                <?php } else { ?>
                                    <img src="<?php echo $result->streamer_img?>" alt="" class="gridTile__img">
                                <?php } ?>
                            </div>
                            <div class="gridTile__personContainerRow">
                                <div class="gridTile__personContainerValue"><?php echo $result->streamer_name ?></div>
                            </div>
                        </div>
                        <div class="gridTile__infoContainer">
                            <div class="gridTile__infoContainerRow">
                                <span class="gridTile__infoContainerKey">
                                    <svg class="gridTile__infoContainerKeyImage" width="668" height="534"
                                        viewBox="0 0 668 534" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M667.333 144.333V467C667.333 484.681 660.31 501.638 647.807 514.14C635.305 526.643 618.348 533.667 600.667 533.667H67.3334C49.6523 533.667 32.6954 526.643 20.193 514.14C7.69053 501.638 0.666748 484.681 0.666748 467V156.667L67.3334 193L318 329.667C322.914 332.319 328.416 333.695 334 333.667C339.87 333.606 345.619 331.996 350.667 329L600.667 183.333L667.333 144.333Z"
                                            fill="#AEB9E1" />
                                        <path
                                            d="M667.333 67L600.667 106.333L334 262L67.3334 117L0.666748 80.3334V67C0.666748 49.3189 7.69053 32.362 20.193 19.8596C32.6954 7.35716 49.6523 0.333374 67.3334 0.333374H600.667C618.348 0.333374 635.305 7.35716 647.807 19.8596C660.31 32.362 667.333 49.3189 667.333 67Z"
                                            fill="#AEB9E1" />
                                    </svg>
                                    <span>Данные:</span>
                                </span>
                                <span class="gridTile__infoContainerValue">
                                    <?php echo $result->streamer_contact ?>
                                </span>
                            </div>
                            <div class="gridTile__infoContainerRow">
                                <span class="gridTile__infoContainerKey">
                                    <svg class="gridTile__infoContainerKeyImage" width="11" height="11"
                                        viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.0062 2.53898H8.04943C7.95687 2.00296 7.67795 1.51687 7.26188 1.16649C6.84581 0.816108 6.31934 0.623962 5.77539 0.623962C5.23144 0.623962 4.70498 0.816108 4.28891 1.16649C3.87284 1.51687 3.59391 2.00296 3.50135 2.53898H1.54462C1.34061 2.53898 1.14495 2.62002 1.00069 2.76428C0.856434 2.90854 0.775391 3.1042 0.775391 3.30821V9.46206C0.775391 9.66607 0.856434 9.86173 1.00069 10.006C1.14495 10.1502 1.34061 10.2313 1.54462 10.2313H10.0062C10.2102 10.2313 10.4058 10.1502 10.5501 10.006C10.6943 9.86173 10.7754 9.66607 10.7754 9.46206V3.30821C10.7754 3.1042 10.6943 2.90854 10.5501 2.76428C10.4058 2.62002 10.2102 2.53898 10.0062 2.53898V2.53898ZM5.77539 1.38513C6.11638 1.38579 6.44756 1.49935 6.71719 1.7081C6.98683 1.91685 7.17973 2.20902 7.26578 2.53898H4.28501C4.37105 2.20902 4.56395 1.91685 4.83359 1.7081C5.10322 1.49935 5.4344 1.38579 5.77539 1.38513V1.38513Z"
                                            fill="#AEB9E1" />
                                    </svg>
                                    <span>Платформа:</span>
                                </span>
                                <span class="gridTile__infoContainerValue"><?php echo $result->streamer_platform ?></span>
                            </div>
                            <div class="gridTile__infoContainerRow">
                                <span class="gridTile__infoContainerKey">
                                    <svg class="gridTile__infoContainerKeyImage" width="17" height="16"
                                        viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.33558 7.47976C5.84534 7.47976 6.31264 7.243 6.69066 6.87923C6.29416 6.16823 6.06783 5.36385 6.06783 4.592C6.06783 3.93743 6.22573 3.31999 6.50367 2.77479C6.15895 2.56341 5.75605 2.43951 5.32387 2.43951C4.06065 2.43951 3.03674 3.47826 3.03674 4.75946C3.03674 6.04084 4.07236 7.47976 5.33558 7.47976Z"
                                            fill="#AEB9E1" />
                                        <path
                                            d="M6.8738 8.58C6.65058 8.53184 6.41949 8.50519 6.18199 8.50519H4.4811C2.67116 8.50519 1.20374 9.97719 1.20374 11.7931L1.21142 12.1819C1.21142 12.6892 1.62146 13.1006 2.12719 13.1006H3.80429C3.88663 11.0803 5.12479 9.35791 6.8738 8.58Z"
                                            fill="#AEB9E1" />
                                        <path
                                            d="M10.016 7.96472C11.5822 7.96472 12.8376 6.18041 12.8376 4.59169C12.8376 3.00297 11.5678 1.71497 10.0016 1.71497C8.43534 1.71497 7.16553 3.00297 7.16553 4.59169C7.16571 6.18041 8.4498 7.96472 10.016 7.96472Z"
                                            fill="#AEB9E1" />
                                        <path
                                            d="M15.1296 13.3137C15.1296 11.0619 13.3101 9.23663 11.0658 9.23663H8.95672C6.7124 9.23663 4.89294 11.0619 4.89294 13.3137L4.90264 13.7958C4.90264 14.4248 5.41093 14.9349 6.03816 14.9349H14.004C14.631 14.9349 15.1395 14.4248 15.1395 13.7958L15.1296 13.3137Z"
                                            fill="#AEB9E1" />
                                    </svg>
                                    <span>Подписчики:</span>
                                </span>
                                <span class="gridTile__infoContainerValue"><?php echo $result->streamer_platformSubs ?></span>
                            </div>
                            <div class="gridTile__infoContainerRow">
                                <span class="gridTile__infoContainerKey">
                                    <svg class="gridTile__infoContainerKeyImage" width="11" height="11"
                                        viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.04152 0.427734C3.99992 0.428916 3.00132 0.843213 2.26479 1.57974C1.52827 2.31626 1.11397 3.31486 1.11279 4.35646C1.11279 7.7182 4.68436 10.2585 4.83615 10.3656C4.89698 10.4061 4.96843 10.4277 5.04152 10.4277C5.1146 10.4277 5.18605 10.4061 5.24688 10.3656C5.39867 10.2585 8.97024 7.7182 8.97024 4.35646C8.96906 3.31486 8.55476 2.31626 7.81824 1.57974C7.08172 0.843213 6.08312 0.428916 5.04152 0.427734V0.427734ZM5.04152 2.92783C5.32407 2.92783 5.60028 3.01162 5.83522 3.1686C6.07016 3.32558 6.25327 3.5487 6.3614 3.80975C6.46953 4.07079 6.49782 4.35804 6.44269 4.63517C6.38757 4.9123 6.25151 5.16685 6.05171 5.36665C5.85191 5.56645 5.59735 5.70251 5.32023 5.75763C5.0431 5.81276 4.75585 5.78447 4.4948 5.67634C4.23376 5.56821 4.01064 5.3851 3.85366 5.15016C3.69668 4.91522 3.61289 4.63901 3.61289 4.35646C3.61289 3.97756 3.76341 3.61419 4.03133 3.34627C4.29924 3.07835 4.66262 2.92783 5.04152 2.92783V2.92783Z"
                                            fill="#AEB9E1" />
                                    </svg>
                                    <span>Страна:</span>
                                </span>
                                <span class="gridTile__infoContainerValue"><?php echo $result->streamer_country ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="gridTile__subInfoContainer">
                        <div class="gridTile__subInfoContainerComment">
                            <span class="gridTile__subInfoContainerCommentHeader">Комментарий</span>
                            <span class="gridTile__subInfoContainerCommentContent">
                                <?php echo $result->streamer_comment ?>
                            </span>
                        </div>
                        <?php if($result->streamer_isBlocked !== 'No') { ?>
                            <div class="gridTile__subInfoContainerWarning warningLabel">
                                <svg class="warningLabel__img" width="606" height="668" viewBox="0 0 606 668" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M553.33 129L355.33 14.6667C322.997 -3.99992 282.997 -3.99992 250.33 14.6667L52.6639 129C20.3306 147.667 0.330566 182.333 0.330566 220V448C0.330566 485.333 20.3306 520 52.6639 539L250.663 653.333C282.997 672 322.997 672 355.663 653.333L553.663 539C585.997 520.333 605.997 485.667 605.997 448V220C605.663 182.333 585.663 148 553.33 129ZM277.997 192.333C277.997 178.667 289.33 167.333 302.997 167.333C316.663 167.333 327.997 178.667 327.997 192.333V367.333C327.997 381 316.663 392.333 302.997 392.333C289.33 392.333 277.997 381 277.997 367.333V192.333ZM333.663 488.333C331.997 492.333 329.663 496 326.663 499.333C320.33 505.667 311.997 509 302.997 509C298.663 509 294.33 508 290.33 506.333C285.997 504.667 282.663 502.333 279.33 499.333C276.33 496 273.997 492.333 271.997 488.333C270.33 484.333 269.663 480 269.663 475.667C269.663 467 272.997 458.333 279.33 452C282.663 449 285.997 446.667 290.33 445C302.663 439.667 317.33 442.667 326.663 452C329.663 455.333 331.997 458.667 333.663 463C335.33 467 336.33 471.333 336.33 475.667C336.33 480 335.33 484.333 333.663 488.333Z"
                                        fill="#DC2B2B" />
                                </svg>
                                <span class="warningLabel__text">в блок листе</span>
                            </div>
                        <?php } ?>
                    </div>
                    <svg class="gridTile__like" width="351" height="352" viewBox="0 0 351 352" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <?php if($result->streamer_isLiked !== 'Yes') { ?>
                            <path d="M159.484 70.64L175.5 92.056L191.516 70.64C198.74 60.9809 208.103 53.1461 218.861 47.7518C229.619 42.3577 241.478 39.5508 253.5 39.5508C274.036 39.5508 293.742 47.7313 308.281 62.3112C322.821 76.893 331 96.6823 331 117.329C331 159.097 306.872 205.29 252.133 254.682C252.131 254.683 252.129 254.685 252.127 254.687C228.463 276.021 202.788 294.993 175.469 311.338C164.164 304.637 129.521 283.157 95.5846 251.843C54.9651 214.362 20 167.045 20 117.329C20 100.991 25.1262 85.0727 34.6445 71.8292C44.1621 58.5865 57.5863 48.6921 73.0086 43.5367C88.4302 38.3815 105.076 38.2231 120.593 43.0838C136.109 47.9446 149.718 57.5815 159.484 70.64Z"
                            stroke="#BBF83B" stroke-width="40" />
                        <?php } else { ?>
                            <path d="M159.484 70.64L175.5 92.056L191.516 70.64C198.74 60.9809 208.103 53.1461 218.861 47.7518C229.619 42.3577 241.478 39.5508 253.5 39.5508C274.036 39.5508 293.742 47.7313 308.281 62.3112C322.821 76.893 331 96.6823 331 117.329C331 159.097 306.872 205.29 252.133 254.682C252.131 254.683 252.129 254.685 252.127 254.687C228.463 276.021 202.788 294.993 175.469 311.338C164.164 304.637 129.521 283.157 95.5846 251.843C54.9651 214.362 20 167.045 20 117.329C20 100.991 25.1262 85.0727 34.6445 71.8292C44.1621 58.5865 57.5863 48.6921 73.0086 43.5367C88.4302 38.3815 105.076 38.2231 120.593 43.0838C136.109 47.9446 149.718 57.5815 159.484 70.64Z"
                            stroke="#BBF83B" stroke-width="40" fill="#BBF83B" />
                        <?php } ?>
                    </svg>
                    <svg class="gridTile__edit" width="13" height="14" viewBox="0 0 13 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.0947 1.99892C10.9244 1.82932 10.7221 1.69516 10.4997 1.60417C10.2772 1.51318 10.0389 1.46716 9.79856 1.46879C9.55822 1.47042 9.32057 1.51965 9.09936 1.61365C8.87815 1.70764 8.67776 1.84453 8.50975 2.01642L1.64715 8.87912C1.3937 9.13258 1.21301 9.44949 1.12401 9.79671L0.542819 12.0641C0.467311 12.3586 0.735111 12.6264 1.02967 12.5508L3.29714 11.9693C3.64426 11.8802 3.96108 11.6996 4.21448 11.4462L11.0772 4.58338C11.2491 4.41545 11.386 4.2151 11.4801 3.99392C11.5741 3.77275 11.6233 3.53512 11.625 3.2948C11.6266 3.05447 11.5806 2.8162 11.4895 2.59377C11.3985 2.37134 11.2643 2.16916 11.0947 1.99892Z"
                            fill="#BBF83B" stroke="#BBF83B" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            <?php } ?>
            </div>
        </div>
        <div class="mainPage__tableNavigation">
            <div class="mainPage__pagination">
                <span class="mainPage__paginationItem mainPage__paginationItemActive">1</span>
                <a href="#" class="mainPage__paginationItem">2</a>
                <a href="#" class="mainPage__paginationItem">3</a>
                <span class="mainPage__paginationItem disabled">...</span>
                <a href="#" class="mainPage__paginationItem">25</a>
                <a href="#" class="mainPage__paginationItem">26</a>
            </div>
            <div class="mainPage__tableNavigationButtons">
                <div class="mainPage__tableNavigationButton disabled">
                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="mainPage__tableNavigationButtonArrow leftArrow">
                        <path d="M7.31445 2.4268L12.25 7.36231L7.31445 12.2978" stroke="#aeb9e1" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M12.2499 7.36231L1.75 7.3623" stroke="#aeb9e1" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="mainPage__tableNavigationButton">
                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="mainPage__tableNavigationButtonArrow rightArrow">
                        <path d="M7.31445 2.4268L12.25 7.36231L7.31445 12.2978" stroke="white" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M12.2499 7.36231L1.75 7.3623" stroke="white" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="mainPage__filterContainer filterContainer jsHidden">
            <div class="filterContainer__darkLayer"></div>
            <div class="filterContainer__filters">
                <div class="filterContainer__closeButton">
                    <svg width="350" height="350" viewBox="0 0 350 350" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M339.993 57.149C353.013 44.1314 353.013 23.026 339.993 10.0084C326.977 -3.00897 305.87 -3.00897 292.853 10.0084L175.003 127.86L57.1517 10.0084C44.134 -3.00897 23.0287 -3.00897 10.011 10.0084C-3.00629 23.026 -3.00629 44.1314 10.011 57.149L127.863 175L10.011 292.85C-3.00629 305.87 -3.00629 326.973 10.011 339.99C23.0287 353.01 44.134 353.01 57.1517 339.99L175.003 222.14L292.853 339.99C305.87 353.01 326.977 353.01 339.993 339.99C353.013 326.973 353.013 305.87 339.993 292.85L222.143 175L339.993 57.149Z"
                            fill="#FFFFFF" />
                    </svg>
                </div>
                <div class="filterContainer__row">
                    <label for="set_platform" class="filterContainer__selectLabel">
                        <span class="filterContainer__selectLabelHeader">Платформа</span>
                        <select name="set_platform" id="set_platform" class="filterContainer__select">
                            <?php foreach ( $platformsArray as $result ) { ?>
                                <option value="<?php echo $result?>"><?php echo $result?></option>
                            <?php } ?>
                        </select>
                    </label>
                    <label for="set_country" class="filterContainer__selectLabel">
                        <span class="filterContainer__selectLabelHeader">Страна</span>
                        <select name="set_country" id="set_country" class="filterContainer__select">
                            <?php foreach ( $countriesArray as $result ) { ?>
                                <option value="<?php echo $result?>"><?php echo $result?></option>
                            <?php } ?>
                        </select>
                    </label>
                    <label for="set_gamble" class="filterContainer__selectLabel">
                        <span class="filterContainer__selectLabelHeader">Готов к гэмблингу</span>
                        <select name="set_gamble" id="set_gamble" class="filterContainer__select">
                            <option value="yes_gamble">Готов</option>
                            <option value="no_gamble">Не готов</option>
                        </select>
                    </label>
                    <label for="set_isWorked" class="filterContainer__selectLabel">
                        <span class="filterContainer__selectLabelHeader">Работали ранее</span>
                        <select name="set_isWorked" id="set_isWorked" class="filterContainer__select">
                            <option value="yes_isWorked">Работали</option>
                            <option value="no_isWorked">Не работали</option>
                        </select>
                    </label>
                    <label for="set_isBlocked" class="filterContainer__selectLabel">
                        <span class="filterContainer__selectLabelHeader">В блоке</span>
                        <select name="set_isBlocked" id="set_isBlocked" class="filterContainer__select">
                            <option value="yes_isBlocked">В блоке</option>
                            <option value="no_isBlocked">Не в блоке</option>
                        </select>
                    </label>
                </div>
            </div>
        </div>
    </main>
<?php get_footer()?>