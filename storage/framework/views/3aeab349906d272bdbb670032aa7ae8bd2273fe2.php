<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/waypoints.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/waypoints.min.js')); ?>" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/waypoints.css')); ?>" rel="stylesheet">
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-sm navbis">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?php echo e(url('/')); ?>" class="navbar-brand">HolyShirt
                        </a>
                    </li>
                </ul>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">The Joy of Fashion is an Art</li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>


                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>

                                    <a class="dropdown-item" href="<?php echo e(route('users.edit', ['id'=>Auth::user()->id])); ?>">Profile</a>
                                    <?php if(Auth::user()->roles == "[\"ADMIN\"]" || Auth::user()->roles == "[\"STAFF\"]"): ?>
                                      <?php if(Auth::user()->roles== "[\"ADMIN\"]"): ?>
                                        <a href="<?php echo e(route('users.index')); ?>"class="dropdown-item">Manage users</a>
                                      <?php endif; ?>
                                      <a href="<?php echo e(route('products.index')); ?>"class="dropdown-item">Manage products</a>
                                      <a href="<?php echo e(route('orders.index')); ?>" class="dropdown-item">Manage orders</a>

                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
        </nav>

        <main class="container-fluid" style="padding:0;margin:0;">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        <div class="container-fluid" id="anjing" style="margin-top:0%;">
            <div class="container-fluid" id="footer" style="margin-top: 100px">
                <div class="row" style="background-color: #202020">
                    <div class="col-sm-3" >
                        <ul class="ulfoot" style="list-style: none; padding-left: 10%">
                            <li style="color: grey; font-size: 100%">Learn More</li>
                            <li><a href="/aboutus">About Us</a></li>
                            <li><a href="/clothing">Clothing</a></li>
                            <li><a href="/customsize">Size Chart</a></li>
                            <li><a href="/collection">Collection</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <ul class="ulfoot" style="list-style: none">
                            <li style="color: grey; font-size: 100%">Help + Info</li>
                            <li><a href="">FAQ</a></li>
                            <li><a href="">Privacy Policy</a></li>
                            <li><a href="/admin/register">Register as Convection</a></li>
                            <li><a href="/contactus" style="color: white">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <div class="footer navbar-expand-sm">
                            <ul style="list-style: none">

                            </ul>
                        </div>
                    </div>
                    <div class="garis">
                        <p><a href="/" class="navbar-brand" style="color: #bf9b30;border-top: 0;">HolyShirt</a>Copyright©HolyShirt Inc. All Right Reserved.</p>
                    </div>
                </div>
            </div>
            <div class="contaier-fluid" id="garis"></div>
        </div>
    </div>
      <?php echo $__env->yieldContent('footer-scripts'); ?>
</body>
</html>
