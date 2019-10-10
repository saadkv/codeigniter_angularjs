<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" ng-app="CIAPP">
<head>
    <base href="/codeigniter/">
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to First Website Codeigniter</title>
    
    <link rel="stylesheet" href="<?php echo $SQFrontend->get_stylesheet_url('style.css'); ?>" type="text/css" media="all" />
    <!-- <script type="text/javascript" src="<?php $SQFrontend->node_modules_url('jquery/dist/jquery.min.js'); ?>" ></script> -->
    <script type="text/javascript" src="<?php $SQFrontend->node_modules_url('angular/angular.min.js'); ?>" ></script>
    <script type="text/javascript" src="<?php $SQFrontend->node_modules_url('@uirouter/angularjs/release/angular-ui-router.min.js'); ?>" ></script>
    <?php /*?><script type="text/javascript" src="<?php $SQFrontend->node_modules_url('angular-route/angular-route.min.js'); ?>" ></script><?php */?>
    <script><?php echo "var ci_main = {};ci_main.base_url = '" . json_encode( $SQFrontend->get_root_url() ) . "';"; ?></script>
    <?php // echo $SQFrontend->get_ngurl_states(); ?>
    <?php echo $SQFrontend->routing_builds(); ?>
    <script type="text/javascript" src="<?php echo $SQFrontend->get_root_url('app.js');?>" ></script>
</head>
<body>
<img src="https://kingdom-vision.com/wp-content/uploads/2018/05/logo.png" alt="logo">