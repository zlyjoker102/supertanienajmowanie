<?php
$this->append('title');
echo $node->title;
$this->end();
?>
<section class="views page-view">
    <div class="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                    $this->Breadcrumbs->templates([
                        'wrapper' => '<div aria-label="breadcrumb"><ul class="breadcrumb" {attrs}}>{{content}}</ul></div>',
                        'item' => '<li class="breadcrumb-item"{{attrs}}><a href="{{url}}"{{innerAttrs}}>{{title}}</a></li>{{separator}}',
                    ]);
                    $this->Breadcrumbs->add(
                        'Strona główna',
                        '/'
                    );
                    $this->Breadcrumbs->add(
                        $node->title, '',
                        [
                            'class' => 'breadcrumb-item active',
                            'aria-current' => 'page',
                        ]
                    );
                    echo $this->Breadcrumbs->render(
                        ['class' => 'breadcrumbs-trail'],
                        ['separator' => '<i class="fa fa-angle-right"></i>']
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <article class="col-12 mb-5">
                <header class="header">
                    <h1 class="page-title"><?php echo $node->title; ?></h1>
                </header>
                <div class="row page-body">
                    <div class="col-xs-12 col-md-5 order-1">
                        <?php
                        echo $this->Html->image($this->Image2->source($node->link)->resizeit(1100, 250)->imagePath(), [
                            'class' => 'img-fluid',
                            'alt' => $node->alt ?? '#'
                        ]);
                        ?>
                    </div>
                    <div class="col-xs-12 col-md-7">
                        <?php echo $node->body; ?>
                    </div>
                </div>
            </article>
        </div>
    </div>
    <div class="cars bg-dark text-white pt-3 pb-3">
        <div class="container">
            <div class="row mt-3 align-items-center">
                <div class="col-12 ">
                    <h2 class="section-heading brand-color mb-5">
                        Nasze auta
                        </h3>
                </div>
                <div class="col-12">
                    <div class="row car">
                        <div class="col-xs-12 col-md-5">
                            <?php
                            $buses = [
                                'http://wdobrastrone.eu/uploads/44330343_351009325643737_2859426291797458944_n.jpg',
                                'http://wdobrastrone.eu/uploads/DSC_4979.JPG',
                                'http://wdobrastrone.eu/uploads/DSC_4951.JPG',
                                'http://wdobrastrone.eu/uploads/44257926_289832701626653_8866034069247361024_n.jpg',
                            ];
                            ?>
                            <div id="cars-slider1" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <?php  foreach ($buses as $i => $bus):?>
                                        <li data-target="#cars-slider1" data-slide-to="<?php echo $i?>" class="<?php echo $i == 0 ? 'x': ''; ?>"></li>
                                    <?php endforeach; ?>
                                </ol>
                                <div class="carousel-inner">
                                    <?php  foreach ($buses as $key => $bus):?>
                                    <div class="carousel-item <?php echo $key == 0 ? 'active': ''; ?>">
                                        <a class="car-image-link"
                                           href="<?php  echo $bus; ?>"
                                           data-lightbox="car-set">
                                            <?php
                                            echo $this->Html->image($bus, [
                                                'class' => 'car-image img-fluid',
                                                'alt' => 'Zdjęcie-'.$key.'-wdobrastrone.eu'
                                            ]);
                                            ?>
                                        </a>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <a class="carousel-control-prev" href="#cars-slider1" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Poprzedni</span>
                                </a>
                                <a class="carousel-control-next" href="#cars-slider1" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Następny</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-7">
                            <h3 class="brand-color">
                                Volkswagen Caravella T5
                            </h3>
                            <ul>
                                <li>
                                    Moc Silnika: 1.9 TDI 105km
                                </li>
                                <li>
                                    Skrzynia biegów manualna! 9 osobowy układ foteli 3+3+3
                                </li>
                                <li>
                                    Pełny zakres ubezpieczenia PZU: OC, ASSISTANCE NNW
                                </li>
                                <li>
                                    Klimatyzacja
                                </li>
                                <li>
                                    Webasto
                                </li>
                                <li>
                                    <b>
                                        Koszta 200zł/doba, z limitem 300km
                                    </b>
                                </li>
                            </ul>
                            <!-- <div class="price">
                            Koszta 200zł/doba
                            </div> -->
                        </div>
                    </div>
                    <div class="row car">
                        <div class="col-xs-12 col-md-5">
                            <?php
                            $images = [
                                'http://wdobrastrone.eu/uploads/1.JPG',
                                'http://wdobrastrone.eu/uploads/2.JPG',
                                'http://wdobrastrone.eu/uploads/3.JPG',
                                'http://wdobrastrone.eu/uploads/4.JPG',
                                'http://wdobrastrone.eu/uploads/5.JPG',
                                'http://wdobrastrone.eu/uploads/6.JPG',
                                'http://wdobrastrone.eu/uploads/7.JPG',
                                'http://wdobrastrone.eu/uploads/8.JPG',
                                'http://wdobrastrone.eu/uploads/9.JPG',
                                'http://wdobrastrone.eu/uploads/10.JPG',
                            ];
                            ?>
                            <div id="cars-slider2" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <?php  foreach ($images as $x => $img):?>
                                        <li data-target="#cars-slider2" data-slide-to="<?php echo $x?>" class="<?php echo $x == 0 ? 'active': ''; ?>"></li>
                                    <?php endforeach; ?>
                                </ol>
                                <div class="carousel-inner">
                                    <?php  foreach ($images as $key => $img):?>
                                        <div class="carousel-item <?php echo $key == 0 ? 'active': ''; ?>">
                                            <a class="car-image-link-2"
                                               href="<?php  echo $img; ?>"
                                               data-lightbox="car-set-2">
                                                <?php
                                                echo $this->Html->image($img, [
                                                    'class' => 'car-image-2 img-fluid',
                                                    'alt' => 'Zdjęcie-volvo-'.$key.'-wdobrastrone.eu'
                                                ]);
                                                ?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <a class="carousel-control-prev" href="#cars-slider2" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Poprzedni</span>
                                </a>
                                <a class="carousel-control-next" href="#cars-slider2" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Następny</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-7">
                            <h3 class="brand-color">
                                Volvo XC 60, rok 2014 po liftingu
                            </h3>
                            <ul>
                                <li>
                                    Moc Silnika: 2.4 diesel 164km
                                </li>
                                <li>
                                    Auto 5 osobowe
                                </li>
                                <li>
                                    Klimatyzacja

                                </li>
                                <li>
                                    <b>Koszta 500zł/doba</b>
                                </li>
                            </ul>
                            <!-- <div class="price">
                            500zł/dobra
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
