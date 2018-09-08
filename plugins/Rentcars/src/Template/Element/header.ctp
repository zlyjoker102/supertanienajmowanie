<?php

use Cake\Core\Configure;

$navSpecialClass = ($this->request->params['action'] != 'promoted') ? 'navbar-primary' : '';
?>

    <nav class="main-menu navbar navbar-expand-lg navbar-light fixed-top <?php echo $navSpecialClass; ?>"
         id="main-menu">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger"
               title="Wynajem busów -  <?php echo Configure::read('Promoted.menu'); ?>"
               href="/"> <?php echo Configure::read('Promoted.menu'); ?></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <?php
                echo $this->Menus->menu('main', ['dropdown' => true, 'dropdownClass' => 'navbar-nav ml-auto']);
                ?>
            </div>
        </div>
    </nav>

<?php
if ($this->request->params['action'] == 'promoted'):
    ?>
    <header class="masthead text-center text-white d-flex">
        <div class="overlay overlay-bg"></div>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <h1 class="header">
                        <?php echo Configure::read('Promoted.title'); ?>
                    </h1>
                    <hr>
                </div>
                <div class="col-lg-8 mx-auto">
                    <p class="text-faded mb-5">
                        <?php echo Configure::read('Promoted.topSectionBody'); ?>
                    </p>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" title="Wynajmij bus - Supertaniewynajmowanie"
                       href="#contact">Wynajmij bus</a>
                </div>
            </div>
        </div>
    </header>
<?php endif; ?>