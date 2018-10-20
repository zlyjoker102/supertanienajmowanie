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
                <svg xmlns="http://www.w3.org/2000/svg" data-name="Livello 1" viewBox="0 0 128 128">
                    <path d="M64 0a64 64 0 1 0 64 64A64.1 64.1 0 0 0 64 0Zm0 122a58 58 0 1 1 58-58A58.1 58.1 0 0 1 64 122Z"/>
                    <path d="M90 61H38a3 3 0 0 0 0 6H90a3 3 0 0 0 0-6Z"/>
                    <path d="M90 74H38a3 3 0 0 0 0 6H90a3 3 0 0 0 0-6Z"/>
                    <path d="M90 48H38a3 3 0 0 0 0 6H90a3 3 0 0 0 0-6Z"/>
                </svg>

            </button>
            <?php if (!isset($contact)): ?>
                <div class="contact-block">
                    <ul>
                        <li title="Szybki kontakt">
                            <a href="/kontakt"><?php echo $phoneIcon; ?></a>
                        </li>
                        <li>
                            <a href="tel:<?php echo Configure::read('Promoted.contactPhone'); ?>" title="Telefon: <?php echo Configure::read('Promoted.contactPhone'); ?>">
                                <?php echo Configure::read('Promoted.contactPhone'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="tel:<?php echo Configure::read('Promoted.contactPhone2'); ?>"
                               title="Telefon: <?php echo Configure::read('Promoted.contactPhone2'); ?>">
                                <?php echo Configure::read('Promoted.contactPhone2'); ?>
                            </a>
                        </li>
                        <li class="tooltip-wrapper d-none">
                            <span class="tooltiptext">Zadzwoń i dowiedź się jak możemy Ci pomóc.</span>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
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
    <header class="masthead text-center text-white d-flex">
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
                       title="Wynajmij bus - <?php echo Configure::read('Promoted.websiteName'); ?>"
                       href="#contact">Wynajmij bus</a>
                </div>
            </div>
        </div>
    </header>
<?php endif; ?>