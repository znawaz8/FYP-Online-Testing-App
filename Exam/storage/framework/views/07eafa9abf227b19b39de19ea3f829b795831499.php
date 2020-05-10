<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Admin page after logged -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Leed City Council</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/all.css')); ?>" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/sweetalert.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/flipclock.css')); ?>">
    <?php /* <link href="<?php echo e(elixir('css/app.css')); ?>" rel="stylesheet"> */ ?>

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <span class="glyphicon glyphicon-home"></span> Home
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->

                <ul class="nav navbar-nav">
                    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('admin')): ?>
                    <li class="dropdown">
                        <a href="<?php echo e(url('/home')); ?>" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add Exam  <span class="caret"></span></a>
                        <ul class="dropdown-menu" id="manager-menu">
                            <li><span class="glyphicon glyphicon-cog"></span> <a href="<?php echo e(action('CategoryController@getIndex')); ?>">Manage Category</a></li>
                            <li><span class="glyphicon glyphicon-plus"></span> <a href="<?php echo e(action('CategoryController@getNew')); ?>">Add Category</a></li>
                            <li role="separator" class="divider"></li>
                            <li><span class="glyphicon glyphicon-cog"></span> <a href="<?php echo e(/*action('SubjectController@getIndex')*/route('admin.subject.index')); ?>">Manage Subjects</a></li>
                            <li><span class="glyphicon glyphicon-plus"></span> <a href="<?php echo e(route('subject.new')/*action('SubjectController@getNew')*/); ?>">Add Subjects</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo e(action('UserController@getIndex')); ?>">Users</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('subjects.results')); ?>">Exams Results</a>
                    </li>

                    <?php endif; ?>
                    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('guest')): ?>
                    <!--li>
                        <a href="<?php echo e(action('SubjectController@getStartTest',1)); ?>">Start Test</a>
                    </li-->
                    <li class="dropdown">
                        <a href="<?php echo e(url('/home')); ?>" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Choose exams <span class="caret"></span></a>
                        <ul class="dropdown-menu" id="manager-menu">

                            <?php foreach(App\Subject::all() as $cat): ?>
                                <?php if($cat->hasQuestions() && $cat->isExamined()): ?>
                                    <li><a href="<?php echo e(action('SubjectController@getBeforeStartTest',$cat->id)); ?>"><?php echo e($cat->name); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                    <?php endif; ?>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                        <li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">

                                <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>


    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/flipclock.min.js')); ?>"></script>
    <?php /* <script src="<?php echo e(elixir('js/app.js')); ?>"></script> */ ?>
    <script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>
    <script>

        $('div.alert-success').delay(3000).slideUp(400);

        $(function(){
        $('a#btn-delete').on('click', function(e){
            e.preventDefault();
            e.stopPropagation();
            var $a = this;

            swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this category!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Yes, delete it!',
                        closeOnConfirm: false
                    },
                    function(){
                        //console.log($($a).attr('href'));
                        document.location.href=$($a).attr('href');
                    });
        });
        });

        $('#add-new-question').hide();
        $('#btn-add-new-question').on('click', function(){
            $('#add-new-question').slideDown();
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
            }
        });
        <?php echo $__env->yieldContent('script_clock'); ?>
        <?php echo $__env->yieldContent('script_form'); ?>
    </script>
</body>
</html>
