<?php

use Cake\Core\Configure;

$navSpecialClass = ($this->request->params['action'] != 'promoted') ? 'navbar-primary' : '';
$phoneIcon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 139 139">
    <path d="M67.3 82c-9.3-7.6-15.5-17.1-18.7-22.4l-2.4-4.6c0.9-0.9 7.3-7.9 10.1-11.6 3.5-4.7-1.6-9-1.6-9S40.3 19.9 37 17.1c-3.3-2.9-7.1-1.3-7.1-1.3 -6.9 4.5-14 8.3-14.5 27C15.5 60.2 28.7 78.2 43 92.1c14.3 15.7 34 31.5 53.1 31.5 18.6-0.4 22.5-7.6 27-14.5 0 0 1.6-3.8-1.3-7.1 -2.9-3.3-17.3-17.7-17.3-17.7s-4.3-5.1-9-1.6c-3.5 2.6-9.9 8.5-11.4 9.9C84.2 92.7 73.6 87.1 67.3 82z"/>
</svg>';
?>

    <nav class="navbar navbar-expand-lg fixed-top <?php echo $navSpecialClass; ?>"
         id="main-menu">
        <div class="container position-relative">
            <a class="navbar-brand js-scroll-trigger"
               title="Wynajem busów -  <?php echo Configure::read('Promoted.websiteName'); ?>"
               href="/"> <?php echo Configure::read('Promoted.websiteName'); ?></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <?php
                echo $this->Menus->menu('main', ['dropdown' => true, 'dropdownClass' => 'navbar-nav']);
                ?>
                <?php if (!isset($contact)):?>
                    <div class="contact-block">
                        <ul>
                            <li title="Szybki kontakt">
                                <?php echo $phoneIcon; ?>
                                Zadźwoń teraz
                            </li>
                            <li>
                                <a href="/kontakt" title="Telefon: <?php echo Configure::read('Promoted.contactPhone'); ?>">
                                    <?php echo Configure::read('Promoted.contactPhone'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="/kontakt" title="Telefon: <?php echo Configure::read('Promoted.contactPhone2'); ?>">
                                    <?php echo Configure::read('Promoted.contactPhone2'); ?>
                                </a>
                            </li>
                            <li class="tooltip-wrapper">
                                <span class="tooltiptext">Zadzwoń i dowiedz się jak możemy Ci pomóc.</span>
                            </li>
                        </ul>
                    </div>
                <?php endif;?>
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
                    <a class="btn btn-primary btn-xl js-scroll-trigger"
                       title="Wynajmij bus - <?php echo Configure::read('Promoted.websiteName'); ?>"
                       href="#contact">Wynajmij bus</a>
                </div>
            </div>
        </div>
    </header>
<?php endif; ?>