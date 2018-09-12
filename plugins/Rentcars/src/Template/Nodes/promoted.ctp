<?php
use Cake\Core\Configure;

$this->append('title');
echo 'Supertanienajmowanie';
$this->end();

$pages = $nodes->toArray();
$email = Configure::read('Promoted.contactEmail');
$phone = Configure::read('Promoted.contactPhone');
?>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading brand-color">Nasz oferta</h2>
                <hr class="my-4">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php echo $this->Regions->blocks('co-oferujemy-naszym-klientom');  ?>
        </div>
    </div>
</section>
<section class="bg-dark text-white p-0">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 p-0 home-about-left">
                <?php echo $this->Html->image('/img/1.jpg', ['alt' => '#', 'class' => 'img-fluid']); ?>
            </div>
            <div class="col-lg-6 home-about">
                <h2 class="section-heading brand-color">
                    <?php echo $pages[0]->title;?>
                </h2>
                <p>
                    <?php echo $pages[0]->excerpt;?>
                </p>
                <div class="button-wrapper">
                    <a class="text-uppercase primary-btn show-more" href="#">Zobacz szczegóły</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="reviews">
    <div class="container text-center">
        <h2 class="section-heading brand-color">opinie naszych klientów</h2>
        <div id="reviews" class="mx-auto col-md-8 col-lg-10 text-center">
            <?php echo $this->Regions->blocks('opinie-naszych-klientow');?>
        </div>

    </div>
</section>
<section class="p-0" id="portfolio">
    <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="/img/1.jpg">
                    <?php echo $this->Html->image('1.jpg', ['alt' => '#', 'class' => 'img-fluid']); ?>
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Category
                            </div>
                            <div class="project-name">
                                Project Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="img/2.jpg">
                    <?php echo $this->Html->image('2.jpg', ['alt' => '#', 'class' => 'img-fluid']); ?>
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Category
                            </div>
                            <div class="project-name">
                                Project Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="img/3.jpg">
                    <?php echo $this->Html->image('3.jpg', ['alt' => '#', 'class' => 'img-fluid']); ?>
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Category
                            </div>
                            <div class="project-name">
                                Project Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="img/4.jpg">
                    <?php echo $this->Html->image('4.jpg', ['alt' => '#', 'class' => 'img-fluid']); ?>
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Category
                            </div>
                            <div class="project-name">
                                Project Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="img/5.jpg">
                    <?php echo $this->Html->image('5.jpg', ['alt' => '#', 'class' => 'img-fluid']); ?>
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Category
                            </div>
                            <div class="project-name">
                                Project Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="img/6.jpg">
                    <?php echo $this->Html->image('6.jpg', ['alt' => '#', 'class' => 'img-fluid']); ?>
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Category
                            </div>
                            <div class="project-name">
                                Project Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
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
                <p><?php echo $phone; ?></p>
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

<!--    --><?php //echo  $this->Element('newsletter'); ?>
<!--                --><?php //echo $this->Regions->blocks('sponsorzy-gora');?><!--</div>-->

