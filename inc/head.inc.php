<!-- Header Start -->
<header id="wt-header" class="wt-header wt-haslayout">
    <div class="wt-navigationarea">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="wt-logo"><a href="/"><img src="/public/assets/images/logo.png" alt="company logo here"></a></strong>
                    <div class="wt-rightarea">
                        <?php if(!$logged): ?>
                            <div class="wt-loginarea">
                                <figure class="wt-userimg">
                                    <img src="/public/assets/images/user-login.png" alt="img description">
                                </figure>
                                <div class="wt-loginoption">
                                    <a href="javascript:void(0);" id="wt-loginbtn" class="wt-loginbtn">Login</a>
                                    <div class="wt-loginformhold">
                                        <div class="alert-login-form d-none m-3">
                                        </div>
                                        <div class="wt-loginheader">
                                            <span>Login</span>
                                            <a href="javascript:;"><i class="fa fa-times"></i></a>
                                        </div>
                                        <form class="wt-formtheme wt-loginform do-login-form" id="login-form" method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <input type="text" name="email" class="form-control" placeholder="Email" value="test@test.com">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control" placeholder="Password" value="test">
                                                </div>
                                                <div class="wt-logininfo">
                                                    <button type="submit" class="wt-btn do-login-button">Login</button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="wt-userlogedin">
                                <figure class="wt-userimg">
                                    <img src="/public/assets/images/user-img.jpg" alt="">
                                </figure>
                                <div class="wt-username">
                                    <h3><?php echo $auth->getUsername(); ?></h3>
                                    <span><?php echo $auth->getEmail(); ?></span>
                                </div>
                                <nav class="wt-usernav">
                                    <ul>
                                        <li>
                                            <a href="words.php">
                                                <span>Add new word</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="logout.php">
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--Header End-->