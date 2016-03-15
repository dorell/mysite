<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('css/bootstrap-responsive.css') ?>" rel="stylesheet">
        <link href="<?= base_url('css/micss.css') ?>" rel="stylesheet">
        <title> Mi Sitio </title>
    </head>

    <body>

        <!-- Fixed menu nav -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"> <?= $title ?> </a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <?= my_menu_ppal(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content, a righ vertical menu, main content -->
        <div class="container-fluid">
            <div class="row-fluid">
                <!-- System menu -->
                <div class="span3">
                    <div class="well sidebar-nav">
                        <ul class="nav nav-list">
                            <li class="nav-header"> Menú Usuario </li>
                        </ul>
                    </div>
                </div>

                <!-- Aplication Content -->
                <div class="span9">
                    <?php $this->load->view($content) ?>
                </div>
            </div>

            <hr>

            <footer>
                <p> <?=$this->session->userdata('user'); ?> &copy; miSitio 2013 - <?= date('d-m-Y H:i') ?> </p>
            </footer>
        </div>

        <script src="<?php base_url('js/jquery.js') ?>"></script>
        <script src="<?php base_url('js/bootstrap.min.js') ?>"></script>

    </body>
</html>