<?php

use Cake\Core\Configure;

$this->append('title');
echo Configure::read('Promoted.websiteName');
$this->end();

$pages = $nodes->toArray();
$email = Configure::read('Promoted.contactEmail');
$phone = Configure::read('Promoted.contactPhone');
$phone2 = Configure::read('Promoted.contactPhone2');
?>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading brand-color"> <?php echo __('Nasza oferta'); ?> </h2>
                <hr class="my-4">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php echo $this->Regions->blocks('co-oferujemy-naszym-klientom'); ?>
        </div>
    </div>
</section>

<section class="bg-dark text-white p-0">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 p-0 home-about-left">

            <?php
                echo $this->Html->image($this->Image2->source($pages[0]->link)->resizeit(5000, 600)->imagePath(), [
                    'class' => 'img-fluid',
                    'alt' => $node->alt ?? '#',
                ]);
            ?>
            </div>
            <div class="col-lg-6 home-about">
                <div class="about">
                    <h2 class="section-heading brand-color">
                        <?php echo $pages[0]->title; ?>
                    </h2>
                    <p>
                        <?php echo $pages[0]->excerpt; ?>
                    </p>
                </div>
                <div class="button-wrapper">
                    <a class="text-uppercase primary-btn show-more" href="/strona/wynajmij-auto-na-eventy"><?php echo __('Zobacz szczegóły'); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="reviews">
    <div class="container text-center">
        <h2 class="section-heading brand-color">opinie naszych klientów</h2>
        <hr>
        <div id="reviews" class="mx-auto col-md-8 col-lg-10 text-center">
            <?php echo $this->Regions->blocks('opinie-naszych-klientow'); ?>
        </div>

    </div>
</section>
<section class="p-0" id="portfolio">
    <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">

            <?php foreach ($news as $article): ?>
                <div class="col-lg-4 col-sm-6 col-xs-12 news-box">
                    <?php
$imgSrc = $article['link'] ?? '/uploads/1.jpg';
if ($imgSrc === 'value') {
    $imgSrc = '/uploads/trip.jpg';
}
?>
                    <a class="portfolio-box" href="<?php echo '/aktualnosci/' . $article['slug']; ?>"
                       style="background: url('<?php echo $this->Image2->source($imgSrc)->resizeit(3000, 450)->imagePath(); ?>')no-repeat center center; background-size: cover;">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Zobacz
                                </div>
                                <div class="project-name">
                                    <?php echo $article['title']; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-heading brand-color">
                    <?php echo Configure::read('Promoted.contactTitle'); ?>
                </h2>
                <hr class="my-4">
                <p class="mb-5">
                    <?php echo Configure::read('Promoted.contactBody'); ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 ml-auto text-center">
                <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
                <p><?php echo $phone; ?> <br> <?php echo $phone2; ?></p>
            </div>
            <div class="col-lg-4 mr-auto text-center">
                <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
                <p>
                    <a href="mailto:<?php echo $email; ?>" class="mail-to brand-color">
                        <?php echo $email; ?>
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>

