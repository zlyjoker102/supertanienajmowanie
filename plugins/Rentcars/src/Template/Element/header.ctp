<?php

use Cake\Core\Configure;
$topSectionImage = Configure::read('Promoted.topSectionImage');
$phone1 = Configure::read('Promoted.contactPhone');
$phone2 = Configure::read('Promoted.contactPhone2');
$navSpecialClass = ($this->request->params['action'] != 'promoted') ? 'navbar-primary' : '';
$phoneIcon = '<svg height="30" viewBox="0 0 40 40" width="40"><path d="M20 2c9.9 0 18 8.1 18 18s-8.1 18-18 18c-9.9 0-18-8.1-18-18S10.1 2 20 2M20 0C9 0 0 9 0 20c0 11 9 20 20 20 11 0 20-9 20-20C40 9 31 0 20 0L20 0z" class="a"/><path d="M14.4 9.8c1.2-0.2 2 1.1 2.6 2.1 0.6 0.9 1.3 2 1 3.2 -0.2 0.7-0.8 1-1.2 1.4 -0.4 0.4-1.1 0.7-1.3 1.3 -0.3 1 0.3 2 0.7 2.6 0.8 1.3 1.8 2.5 3.1 3.5 0.6 0.5 1.5 1.2 2.4 1 1.3-0.3 1.6-1.9 3-2.1 1.3-0.2 2.3 0.8 3 1.4 0.7 0.6 1.9 1.4 1.8 2.5 0 0.6-0.5 1-1 1.4 -0.4 0.4-0.8 0.8-1.3 1.1 -1.1 0.7-2.3 1-3.8 1 -1.5 0-2.6-0.5-3.7-1.1 -2.1-1.1-3.7-2.6-5.2-4.3 -1.5-1.7-2.9-3.7-3.7-5.9 -1-2.8-0.5-5.6 1.1-7.4 0.3-0.3 0.7-0.6 1.1-0.9C13.5 10.3 13.8 9.9 14.4 9.8z" class="a"/></svg>';
?>

    <nav class="navbar-expand-lg fixed-top <?php echo $navSpecialClass; ?>" id="main-menu">
         <div class="social-bar">
            <div class="container">
                <div class="row">
                    <ul class="col-12">
                        <li>

                        </li>
                        <li>
                            <a href="tel:<?php echo $phone1; ?>"><?php echo $phoneIcon . "" . $phone1; ?></a>
                        </li>
                        <li>
                        <a href="tel:<?php echo $phone2; ?>"><?php echo $phoneIcon . "" . $phone2; ?></a>
                        </li>
                    </ul>
                </div>
            </div>
         </div>
        <div class="container navbar">
            <a class="navbar-brand js-scroll-trigger"
               title="Wynajem busów -  <?php echo Configure::read('Promoted.websiteName'); ?>"
               href="/"> <?php echo Configure::read('Promoted.websiteName'); ?></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" data-name="Livello 1" viewBox="0 0 128 128">
                    <path d="M64 0a64 64 0 1 0 64 64A64.1 64.1 0 0 0 64 0Zm0 122a58 58 0 1 1 58-58A58.1 58.1 0 0 1 64 122Z"/>
                    <path d="M90 61H38a3 3 0 0 0 0 6H90a3 3 0 0 0 0-6Z"/>
                    <path d="M90 74H38a3 3 0 0 0 0 6H90a3 3 0 0 0 0-6Z"/>
                    <path d="M90 48H38a3 3 0 0 0 0 6H90a3 3 0 0 0 0-6Z"/>
                </svg>

            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <?php
                echo $this->Menus->menu('main', ['dropdown' => true, 'dropdownClass' => 'navbar-nav']);
                ?>
            </div>
        </div>
    </nav>

<?php
if ($this->request->params['action'] == 'promoted'):
?>
    <header class="masthead text-center text-white d-flex" style="background: url(<?php echo $topSectionImage;?>) no-repeat bottom center; background-size: cover;">
        <div class="overlay overlay-bg"></div>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <h1 class="header text-center">
                        <?php echo Configure::read('Promoted.title'); ?>
                    </h1>
                    <hr>
                </div>
                <div class="col-lg-8 mx-auto">
                    <p class="text-faded mb-5">
                        <?php echo Configure::read('Promoted.topSectionBody'); ?>
                    </p>
                    <a class="btn btn-primary btn-xl js-scroll-trigger"
                       title="Wynajmij busa - <?php echo Configure::read('Promoted.websiteName'); ?>"
                       href="#contact">Wynajmij busa</a>
                </div>
            </div>
        </div>
    </header>
<?php endif;?>