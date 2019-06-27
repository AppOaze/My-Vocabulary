<?php

// Start a Session
if( !session_id() ) @session_start();

require __DIR__ . '/vendor/autoload.php';

$logged = false;

$db = new \PDO('mysql:dbname=my-vocabulary;host=localhost;charset=utf8mb4', 'my-vocabulary', 'n5B3*sn7');

$auth = new \Delight\Auth\Auth($db);

if ($auth->isLoggedIn()) {
    $logged = true;
    $body_class = 'wt-login';
}
else {
    $body_class = '';
}
?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Vocabulary</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="icon" href="/public/assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/assets/css/normalize.css">
    <link rel="stylesheet" href="/public/assets/css/scrollbar.css">
    <link rel="stylesheet" href="/public/assets/css/fontawesome/fontawesome-all.css">
    <link rel="stylesheet" href="/public/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/assets/css/linearicons.css">
    <link rel="stylesheet" href="/public/assets/css/jquery-ui.css">
    <link rel="stylesheet" href="/public/assets/css/main.css">
    <link rel="stylesheet" href="/public/assets/css/color.css">
    <link rel="stylesheet" href="/public/assets/css/transitions.css">
    <link rel="stylesheet" href="/public/assets/css/responsive.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>
<body class="<?php echo $body_class;?>">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Preloader Start -->
<div class="preloader-outer">
    <div class="loader"></div>
</div>
<!-- Preloader End -->
<!-- Wrapper Start -->
<div id="wt-wrapper" class="wt-wrapper wt-haslayout">
    <!-- Content Wrapper Start -->
    <div class="wt-contentwrapper">
        <?php include('inc/head.inc.php'); ?>

        <!--Home Banner Start-->
        <div class="wt-haslayout wt-bannerholder">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                        <div class="wt-bannerimages">
                            <figure class="wt-bannermanimg" data-tilt>
                                <img src="/public/assets/images/bannerimg/img-01.png" alt="img description">
                                <img src="/public/assets/images/bannerimg/img-02.png" class="wt-bannermanimgone" alt="img description">
                                <img src="/public/assets/images/bannerimg/img-03.png" class="wt-bannermanimgtwo" alt="img description">
                            </figure>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                        <div class="wt-bannercontent">
                            <div class="wt-bannerhead">
                                <div class="wt-title">
                                    <h1><span>Learn more vocabulary </span> Everyday</h1>
                                </div>
                            </div>
                            <div class="wt-formtheme wt-formbanner">
                                <div class="stacked-cards"></div>
                                <div class="wt-btnarea mt-3 text-center">
                                    <a href="javascript:void(0);" class="wt-btn" id="js-remove-card">Next Word</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Home Banner End-->

        <?php include('inc/foot.inc.php'); ?>
    </div>
    <!--Content Wrapper End-->
</div>
<!--Wrapper End-->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="/public/assets/js/main.js"></script>

<script>


    let $stackedCards = $('.stacked-cards');

    function addCard(word_name, language_name, name_translated) {
        let $newCard = $('<div class="wt-card card">' +
            '<div class="card-body">\n' +
            '<h1 class="card-title">'+word_name+'</h1>\n' +
            '<h6 class="card-subtitle mb-2 text-muted">Language : '+language_name+'</h6>\n' +
            '<h2 class="card-title text-success card-translation d-none">'+name_translated+'</h2>\n' +
            '<a href="#" class="card-link">See Answer</a>\n' +
            '</div>\n' +
            '</div>');
        $stackedCards.append($newCard);
        setTimeout(() => {
            requestAnimationFrame(() => {
                $newCard.addClass('wt-card--added');
            });
        }, 10);
    }

    $.ajax({
        url: 'lists.php?start=0&length=30',
        type : "GET",
        processData: false,
        contentType: false,
        responseType : 'json'
    }).done(function(response){

        $.each(response.data, function(i, word) {
            addCard(word['0'], word['1'], word['2'])
        })

        $(".wt-card .card-link").on('click', function(e){
            e.preventDefault();

            var $translation = $(this).parent().find('.card-translation');
            $translation.removeClass("d-none");
            $(this).parent().find('.card-link').remove();

        });
    });

    $('#js-remove-card').on('click', () => {
        let $activeCard = $stackedCards.children().slice(-1);
        $activeCard.removeClass('wt-card--added');
        setTimeout(() => {
            requestAnimationFrame(() => {
                $activeCard.remove();
            });
        }, 400); // Match CSS transition time
    });
</script>
</body>
</html>