<?php
$this->append('title');
echo 'megatanienajmowanie';
$this->end();

//        echo  $this->Element('slider');
?>
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Co oferujemy naszym klientom</h2>
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
<section class="bg-dark text-white">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 no-padding home-about-left">
                <img class="img-fluid" src="img/about-img.jpg" alt="">
            </div>
            <div class="col-lg-6 no-padding home-about-right">
                <h2 class="section-heading">WYNAJMIJ AUTO
                    NA EVENTY</h2>
                <p>
                    Targi, festyny, pikniki, eventy dla partnerów biznesowych oraz klientów.
                    Wykorzystaj ekskluzywny samochód Tesla Model S jako nośnik reklamowych
                    i pokaż się z klasą.

                    Niech Twoi goście odpoczną i rozkoszują się najcichszą jazdą na świecie. A Twoja impreza firmowa z
                    Teslą pozostawi każdemu niezapomniane wspomnienia,
                    a marka Twojej firmy zabrzmi dużo lepiej w jej towarzystwie.
                </p>
                <a class="text-uppercase primary-btn" href="#">Zobacz szczegóły</a>
            </div>
        </div>
    </div>
</section>
<section class="reviews">
    <div class="container text-center">
        <h2 class="section-heading">opinie naszych klientów</h2>
        <div id="reviews">
            <blockquote>
                <p>Auto nieziemskie, ekskluzywne, bardzo komfortowe. Polecam wszystkim którzy chcą by dzień ślubu,
                    impreza
                    firmowa itp była wyjątkowa, na pewno z
                    Teslą tak będzie.</p>

            </blockquote>
            <blockquote>
                <p>Auto nieziemskie, ekskluzywne, bardzo komfortowe. Polecam wszystkim którzy chcą by dzień ślubu,
                    impreza
                    firmowa itp była wyjątkowa, na pewno z
                    Teslą tak będzie.</p>

            </blockquote>
        </div>

    </div>
</section>
<section class="p-0" id="portfolio">
    <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="/img/1.jpg">
                    <?php echo $this->Html->image('1.jpg', ['alt' => 'CakePHP', 'class' => 'img-fluid']); ?>
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
                    <?php echo $this->Html->image('2.jpg', ['alt' => 'CakePHP', 'class' => 'img-fluid']); ?>
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
                    <?php echo $this->Html->image('3.jpg', ['alt' => 'CakePHP', 'class' => 'img-fluid']); ?>
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
                    <?php echo $this->Html->image('4.jpg', ['alt' => 'CakePHP', 'class' => 'img-fluid']); ?>
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
                    <?php echo $this->Html->image('5.jpg', ['alt' => 'CakePHP', 'class' => 'img-fluid']); ?>
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
                    <?php echo $this->Html->image('6.jpg', ['alt' => 'CakePHP', 'class' => 'img-fluid']); ?>
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
                <h2 class="section-heading">Kontakt</h2>
                <hr class="my-4">
                <p class="mb-5">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet illum modi quam quis quisquam
                    sint!
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 ml-auto text-center">
                <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
                <p>123-456-6789</p>
            </div>
            <div class="col-lg-4 mr-auto text-center">
                <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
                <p>
                    <a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!--    --><?php //echo  $this->Element('newsletter'); ?>
<!--                --><?php //echo $this->Regions->blocks('sponsorzy-gora');?><!--</div>-->

