
<section class="container">

    <div class="row">
        
        <header class="breadcrumbstList pageHeader col-xs-12">

        
        <?php
        $breadcrumbsTitle = $type['title'];
        $this->Breadcrumbs
            ->add(__d('croogo', $breadcrumbsTitle)); ?>
        <?php 
            $this->append('title');
            echo $breadcrumbsTitle;
            $this->end();
         ?>
        </header>
        <div class="col-xs-12">
            <h6 class="titleBig">
             <?php echo   $breadcrumbsTitle;?>
            </h6>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?php
                if (count($nodes) == 0) {
                    echo '<p class="empty">'.__d('croogo', 'OBECNIE BRAK ARTYKUŁÓW W TEJ KATEGORII').'</p>';
                }
            ?>
        </div>
        <?php
             echo $this->Element('rightLinkBar');
            foreach ($nodes as $node):
              // debug($node);
                $this->Nodes->set($node);
           
        ?>

        <article id="node-<?php echo $this->Nodes->field('id'); ?>" class="col-xs-12  col-sm-12 col-md-9 postWrapper">
            <?php 
                $emptyPostImage = 'empty';
                $path = '';
                if (isset($node['video']) && !empty($node['video'])) {
                   $path =  '<img class="img-responsive" 
                    src="https://i1.ytimg.com/vi/'.$node['video'].'/mqdefault.jpg" alt="'.$node['title'].'"
                    

                    >';
                  $emptyPostImage = '';
                } elseif(isset($node['vifiles'][0]['path']) && !empty($node['vifiles'][0]['path'])) {
                   $path =  '<img src="'.$this->Image2->source($node['vifiles'][0]['path'])->crop(300, 173)->imagePath().'" alt="'.$node['vifiles'][0]['path'].'" class="img-responsive">';
                   $emptyPostImage = '';
                }
             ?>
            <div class="postImage <?php echo $emptyPostImage; ?>">
                <?php 
                    echo $path;
                 ?>
            </div>
            

            <div class="postBody">
                <header>
                    <?php if ($type['alias'] != 'komunikaty'): ?>
                        <?php echo $node['created']? '<data>'.$node['created']->format('d.m.y').'<span>Utworzono</span></data>': ""; ?>
                       
                    <?php endif ?>
                    <h6><?php echo $this->Html->link($this->Nodes->field('title'), $this->Nodes->field('url')->getUrl()); ?></h6>
                </header>
                <?php

                    // echo $this->Nodes->info();
                    // echo $this->Nodes->body();
                    // echo $this->Nodes->moreInfo();
                ?>
                <div class="excerpt">
                    <?php echo $this->Text->truncate(
                            $node['excerpt'],
                            250,
                            [
                                'ellipsis' => '...',
                                'exact' => false
                            ]
                        ); 
                    ?>
                    <div>
                        <?php echo $this->Html->link('Zobacz więcej &#x000BB;', $this->Nodes->field('url')->getUrl(),array('escape'=>false,'class'=>'goToNews')); ?>
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
            <?php
                echo $this->Paginator->options([
                    'url' => [ 'type' => $this->request->params['type'] ]
                ]);
            ?>
            <?php echo $this->Paginator->first('&#171;',['class'=>'first fastPagin','title'=>'Pierwszy','escape'=>false]); ?>
            <?php echo $this->Paginator->numbers(); ?>
            <?php echo $this->Paginator->last('&#187;',['class'=>'last fastPagin','title'=>'Ostatni','escape'=>false]); ?>
        </ul>
    </div>
    

</section>
<?php echo  $this->Element('newsletter'); ?>