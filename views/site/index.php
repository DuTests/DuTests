<?php
/* @var $this yii\web\View */

?>
<html>

<head>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>

<body>

<style>
    .zoom_icon i{
    margin:20px;

    -moz-transition:-moz-transform 0.5s ease-in; 
    -webkit-transition:-webkit-transform 0.5s ease-in; 
    -o-transition:-o-transform 0.5s ease-in;
    }
    .zoom_icon i:hover{
    -moz-transform:scale(2); 
    -webkit-transform:scale(2);
    -o-transform:scale(2);
    }
</style>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Menu</h2>
                <p>
                    <div class="zoom_icon" >
                        <i class="fa fa-book fa-3x" ></i>
                    </div>
                    <div class="zoom_icon" >
                        <i class="fa fa-graduation-cap fa-3x" ></i>
                    </div>
                </p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            
        </div>

    </div>
</div>