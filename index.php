<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    // HOME
    case '/' :
        require __DIR__ ."/home/home.php";
        break;
    case '/history':
        require __DIR__ .'/home/history.php';
        break;

    // AUTH
    case '/login' :
        require __DIR__ ."/auth/sign-in.php";
        break;
    case '/logout' :
        require __DIR__ ."/auth/logout.php";
        break;
    case '/register' :
        require __DIR__ ."/auth/sign-up.php";
        break;
    case '/account' :
        require __DIR__ ."/auth/account.php";
        break;
    case '/delete' :
        require __DIR__ ."/auth/delete.php";
        break;

    // CONNECTION
    case '/conn.php' :
        require __DIR__ ."/conn.php";
        break;

    // GAMES
    case '/free-fire':
        require __DIR__ ."/game/free-fire.php";
        break;
    case '/genshin':
        require __DIR__ ."/game/genshin.php";
        break;
    case '/pubg':
        require __DIR__ ."/game/pubg.php";
        break;
    case '/ml':
        require __DIR__ ."/game/ml.php";
        break;

    // PEMBAYARAN
    case '/payment/checkout':
        require __DIR__ ."/payment/checkout.php";
        break;
    case '/payment/dana':
        require __DIR__ ."/payment/dana.php";
        break;
    case '/payment/gopay':
        require __DIR__ ."/payment/gopay.php";
        break;
    case '/payment/linkaja':
        require __DIR__ ."/payment/linkaja.php";
        break;
    case '/payment/ovo':
        require __DIR__ ."/payment/ovo.php";
        break;
    case '/payment/spay':
        require __DIR__ ."/payment/spay.php";
        break;

    // ADMIN
    case '/admin/':
        require __DIR__ ."/admin/index.php";
        break;
    case '/admin/customer':
        require __DIR__ ."/admin/customer.php";
        break;
    case '/admin/item-ff':
        require __DIR__ ."/admin/item-ff.php";
        break;
    case '/admin/item-genshin':
        require __DIR__ ."/admin/item-genshin.php";
        break;
    case '/admin/item-ml':
        require __DIR__ ."/admin/item-ml.php";
        break;
    case '/admin/item-pubg':
        require __DIR__ ."/admin/item-pubg.php";
        break;
    case '/admin/pembayaran':
        require __DIR__ ."/admin/pembayaran.php";
        break;
    case '/admin/pesanan-ff':
        require __DIR__ ."/admin/pesanan-ff.php";
        break;
    case '/admin/pesanan-ml':
        require __DIR__ ."/admin/pesanan-ml.php";
        break;
    case '/admin/pesanan-pubg':
        require __DIR__ ."/admin/pesanan-pubg.php";
        break;
    case '/admin/pesanan-genshin':
        require __DIR__ ."/admin/pesanan-genshin.php";
        break;
    case '/admin/user':
        require __DIR__ ."/admin/user.php";
        break;

    default:
        http_response_code(404);
        break;
}
?>