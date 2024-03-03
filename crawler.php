<?php

    $getList = file_get_contents('https://raw.githubusercontent.com/ippscan/ippscanTEAM/main/Montervpn?v1.'.time());
    $strings = explode("\n", $getList);

    $warp = "//profile-title: base64:RnJlZVdBUlAgKENvbm5lY3Q5OCk=\n";
    $warp .= "//profile-update-interval: 24\n";
    $warp .= "//subscription-userinfo: upload=0; download=0; total=10737418240000000; expire=0\n";
    $warp .= "//support-url: https://t.me/Connect98News\n";
    $warp .= "//profile-web-page-url: https://azardata.net\n\n";
    $warp .= "warp://auto#Server01&&detour=warp://auto#Server02";

    $i = 1;
    $pattern = '/^warp:\/\/.*$/';
    foreach ($strings as $val) {
        if ( $i > 2) {
            break;
        }
        if ( preg_match($pattern, $val) /*&& !str_contains($val, '&&detour=')*/ ) {
            $warp .= "\n".str_replace(['🇮🇷', '🛡', '✔️', '⭐️', '✅'], '', $val);
            $i++;
        }
    }

    file_put_contents("export/warp", $warp);
