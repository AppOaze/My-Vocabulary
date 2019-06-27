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
    header('Location: /');
}

$database = new Medoo\Medoo([
    'database_type' => 'mysql',
    'database_name' => 'my-vocabulary',
    'server' => 'localhost',
    'username' => 'my-vocabulary',
    'password' => 'n5B3*sn7'
]);

$query = $db->query("SELECT * FROM languages");

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
    <link rel="stylesheet" href="/public/assets/css/manage.css">
    <link rel="stylesheet" href="/public/assets/css/transitions.css">
    <link rel="stylesheet" href="/public/assets/css/responsive.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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

        <!--Main Start-->
        <main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
            <!--Categories Start-->
            <div class="wt-haslayout wt-main-section">
                <div class="wt-contentwrappers">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                                <div class="wt-howitwork-hold wt-bgwhite wt-haslayout">
                                    <div class="tab-content wt-haslayout">
                                        <div class="wt-contentarticle tab-pane active fade show" id="forhiring">
                                            <div class="row">
                                                <div class="wt-starthiringhold wt-innerspace wt-haslayout">
                                                    <div class="col-12">
                                                        <div class="wt-starthiringcontent">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-8">
                                                                    <div class="wt-sectionhead">
                                                                        <div class="wt-sectiontitle">
                                                                            <h2>My words</h2>
                                                                            <span>Manage all my words</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-4">
                                                                    <div class="btn-add-word m-3 text-center">
                                                                        <a href="javascript:void(0);" class="wt-btn" data-toggle="modal" data-target="#addWord">Add New Word</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <table id="words-table" class="display" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Word</th>
                                                                        <th>Language</th>
                                                                        <th>Translation</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Word</th>
                                                                        <th>Language</th>
                                                                        <th>Translation</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Limitless Experience End-->
        </main>
        <!--Main End-->

        <?php include('inc/foot.inc.php'); ?>
    </div>
    <!--Content Wrapper End-->
</div>
<!--Wrapper End-->

<!-- Modal -->
<div class="modal fade add-word" id="addWord" tabindex="-1" role="dialog" aria-labelledby="addWordLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Word</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="wt-jobdescription wt-tabsinfo">
                    <div class="alert-add-form d-none m-3">
                    </div>
                    <form class="wt-formtheme wt-userform wt-userformvtwo" id="add-word-form">
                        <fieldset>
                            <div class="form-group">
                                <input type="text" name="word" class="form-control" placeholder="Word">
                            </div>
                            <div class="form-group wt-formwithlabel">
                                <span class="wt-select">
                                    <label for="language">Language:</label>
                                    <select name="language">
                                        <?php foreach($query as $language): ?>
                                            <option value="<?php echo $language['id']?>"><?php echo $language['name']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="text" name="translation" class="form-control" placeholder="Translation">
                            </div>
                        </fieldset>
                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-submit">Save</button>
            </div>
        </div>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="/public/assets/js/main.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#words-table').DataTable( {
            "searching": false,
            "processing": true,
            "serverSide": true,
            "ajax": "lists.php"
        } );

        $(".add-word").on('click', ".btn-submit", function(e){
            e.preventDefault();

            var that = this;

            var form = document.getElementById('add-word-form');
            var formData = new FormData(form);

            $.ajax({
                url: 'add.php',
                type : "POST",
                processData: false,
                contentType: false,
                responseType : 'json',
                data : formData
            }).done(function(response){
                if(response.status){
                    $(".alert-add-form").html('<div class="alert alert-success" role="alert">'+response.message+'</div>').removeClass("d-none");
                    $('#addWord').modal('hide')
                    $('#words-table').DataTable().ajax.reload();
                    $(".alert-add-form").addClass('d-none');
                    $(".alert-add-form").addClass('d-none');
                } else {
                    $(".alert-add-form").html('<div class="alert alert-danger" role="alert">'+response.message+'</div>').removeClass("d-none")
                }
            });
        });
    } );
</script>
</body>
</html>