<section class="container">
    <div class="row">
        <header class="breadcrumbstList pageHeader col-xs-12">
            <?php
                $this->Breadcrumbs->add('Galerie');

                $this->append('title');
                    echo 'Galerie';
                $this->end();
            ?>
        </header>
        <div class="col-xs-12">
            <h6 class="titleBig">
                <?php echo 'Galerie';?>
            </h6>
        </div>
    </div>
    <div class="row">
        <?php
            echo $this->Element('Futsal.rightLinkBar');

            if (count($galleries) == 0) {
                echo '<div class="col-xs-12 col-sm-12 col-md-9 postWrapper"><p class="empty">' . __d('croogo', 'WKRÓTCE POJAWIĄ SIĘ TUTAJ NOWE ALBUMY') . '</p></div>';
            }
            $i = 0;
            foreach ($galleries as $gallery):
                $i++;
                debug( $gallery );
        ?>
            <article id="gallery-<?php echo $gallery->id; ?>" class="col-xs-12 col-sm-12 col-md-9 postWrapper">
                <div class="postImage">
                <?php
                    if( isset( $gallery['photos'][0] )) {
                        echo '<img src="'.$this->Image2->source($gallery['photos'][0]->path)->crop(300, 173)->imagePath().'" alt="' . $gallery->title . '" class="img-responsive">'; ;
                    }
                ?>
                </div>
                <div class="postBody">
                    <header>
                        <?php echo $gallery['created'] ? '<data>' . $gallery['created']->format('d.m.y') . '<span>Utworzono</span></data>' : ""; ?>
                        <h6><?php 
                            $photos = $gallery['photos'];

                             if(isset($photos) && !empty($photos)){
                                if($photos[0]){
                                    echo $this->Html->link($gallery->title, '#', array(
                                        'onclick' => 'document.getElementById("GalleryButton'.$i.'").click()'
                                        ));
                                }
                             }
                             
                            

                        // echo $this->Html->link($gallery->title, '#', array(
                        //     'onclick' => 'document.getElementById("GalleryButton").click()'
                        //     ));

                         ?></h6>
                    </header>
                    <div class="excerpt">
                    <?php
                        echo $this->Text->truncate(
                            $gallery->description,
                            250,
                            [
                                'ellipsis' => '...',
                                'exact' => false
                            ]
                        );
                    ?>
                        <div>
                            <!-- <?php //echo $this->Html->link('Zobacz galerię &#x000BB;', '#', array('escape' => false, 'class' => 'goToNews')); ?> -->
                            <?php 

                            $photos = $gallery['photos'];
                            $first_img = 0;

                             if(isset($photos) && !empty($photos)){

                                if($photos[0]){
                                    echo $this->Html->link('Zobacz galerię &#x000BB;', $photos[0]['path'], array(
                                        'escape' => false, 
                                        'class' => 'goToNews', 
                                        'id' => 'GalleryButton'.$i,
                                        'data-lightbox'=>'gallery'.$i
                                    ));
                                }
                             }
                             
                            foreach ($photos as $photo){
                               if($first_img == 1){
                                    echo $this->Html->link('', $photo['path'], array(
                                        'escape' => false,
                                        'data-lightbox'=>'gallery'.$i
                                    ));
                                }
                                $first_img = 1;

                            }

                             ?>
                            <!-- <a class="goToNews" href="images/image-1.jpg" data-lightbox="image-1" data-title="My caption">Zobacz galerię</a> -->
                        </div>
                    </div>
                </div>
            </article>
        <?php
        endforeach;
        ?>
    </div>
    <div class="row">
        <ul class="paging col-xs-12">
            <?php echo $this->Paginator->first('&#171;', ['class' => 'first fastPagin', 'title' => 'Pierwszy', 'escape' => false]); ?>
            <?php echo $this->Paginator->numbers(); ?>
            <?php echo $this->Paginator->last('&#187;', ['class' => 'last fastPagin', 'title' => 'Ostatni', 'escape' => false]); ?>
        </ul>
    </div>
</section>