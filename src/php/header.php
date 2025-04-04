
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_bloginfo('name'); ?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/assets/images/static/logo.png' ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
</head>

<body class="wrapperZoom">
    <header class="header">
        <a href="<?php echo site_url() ?>" class="header__logo">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/static/logo.png'?>" alt="" class="header__logoImg">
            <span class="header__logoText">BeFluence Platform</span>
        </a>
        <div class="header__list">
            <a href="<?php echo site_url() ?>" class="header__listItem">
                <div class="header__listItemContainer">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="header__listItemImg">
                        <path d="M0.0683594 6.83355C0.0683594 6.41283 0.249846 6.01216 0.567115 5.73244L6.07891
                        0.872996C6.643 0.375668 7.49372 0.375668 8.05781 0.872995L13.5696 5.73244C13.8869 6.01216
                        14.0684 6.41283 14.0684 6.83355V13.0259C14.0684 13.84 13.4021 14.5 12.5802 14.5H1.55656C0.73465
                        14.5 0.0683594 13.84 0.0683594 13.0259V6.83355Z" fill="#AEB9E1" />
                    </svg>
                    <span class="header__listItemContent">Блогеры</span>
                </div>
            </a>
            <div class="header__listDivider"></div>
            <span class="header__listItem">
                <div class="header__listItemContainer">
                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="header__listItemImg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.25563 0.5C4.97949 0.5 4.75563 0.723857 4.75563 1V3.61548L2.49258 2.30863C2.25344 2.17054 1.94767 2.25247 1.80962 2.49163L0.0674686 5.50976C-0.0705809 5.74892 0.011364 6.05475 0.250498 6.19284L2.51356 7.49969L0.250389 8.8066C0.011255 8.94469 -0.0706902 9.25052 0.0673594 9.48968L1.80952 12.5078C1.94757 12.747 2.25333 12.8289 2.49247 12.6908L4.75563 11.3839V14C4.75563 14.2761 4.97949 14.5 5.25563 14.5H8.73978C9.01593 14.5 9.23978 14.2761 9.23978 14V11.3839L11.5063 12.6928C11.7455 12.8309 12.0512 12.7489 12.1893 12.5098L13.9314 9.49163C14.0695 9.25247 13.9876 8.94665 13.7484 8.80855L11.4819 7.49969L13.7483 6.19088C13.9874 6.05279 14.0694 5.74697 13.9313 5.50781L12.1892 2.48968C12.0511 2.25052 11.7454 2.16859 11.5062 2.30668L9.23978 3.61549V1C9.23978 0.723858 9.01593 0.5 8.73979 0.5H5.25563ZM6.99914 9.37256C8.03324 9.37256 8.87155 8.53408 8.87155 7.49976C8.87155 6.46544 8.03324 5.62695 6.99914 5.62695C5.96503 5.62695 5.12672 6.46544 5.12672 7.49976C5.12672 8.53408 5.96503 9.37256 6.99914 9.37256Z"
                            fill="#AEB9E1" />
                    </svg>
                    <a class="header__listItemContent" href="<?php echo site_url() .'/wp-admin'?>" target="_blank">Настройки</a>
                </div>
            </span>
        </div>
    </header>