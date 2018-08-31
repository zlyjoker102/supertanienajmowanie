<!---->
<!--<div id="myCarousel" class="carousel slide" data-ride="carousel">-->
<!---->
<!--    <!-- Indicators -->-->
<!--    <!-- Wrapper for slides -->-->
<!--    <div class="carousel-inner">-->
<!--        <div class="indicatorsWrapper">-->
<!--            <ol class="carousel-indicators">-->
<!--            --><?php //foreach ($promotedPosts as $key => $item):
//            $activeItem = "";
//            if ($key == 0) {
//                $activeItem = "active";
//
//            }
//            ?>
<!--                <li data-target="#myCarousel" data-slide-to="--><?php //echo $key;?><!--" class="--><?php //echo $activeItem; ?><!--"></li>-->
<!--                -->
<!--            --><?php //endforeach ?>
<!--            </ol>-->
<!--        </div>-->
<!--        --><?php //
//
//        foreach ($promotedPosts as $key => $slide):  //debug($slide);
//            $path = '/img/slider.png';
//            $active = "";
//            if ($key == 0) {
//                $active = "active";
//
//            }
//            if (isset($slide['vifiles'][0]['path'])) {
//                $path =$slide['vifiles'][0]['path'];
//            }
//        ?>
<!---->
<!--            <div class="item --><?php //echo $active; ?><!--" style="background: url(--><?php //echo str_replace( ' ', '%20', $path);  ?>/*) no-repeat center center ;-webkit-background-size: cover;*/
/*            background-size: cover;">*/
/**/
/*                <div class="carousel-caption">*/
/*                    <data>*/<?php //echo $slide['created']->format('d.m.y'); ?><!--</data>-->
<!--                    <h6>-->
<!--                    --><?php //
//                        echo $this->Html->link(
//                            $slide['title'],
//                            array(
//                                'plugin' => 'Croogo/nodes',
//                                'controller' => 'nodes',
//                                'action' => 'view',
//                                'type'=>'aktualnosci',
//                                'slug'=>$slide['slug']
//                            )
//                        );
//
//                     ?>
<!--                   -->
<!--                    </h6>-->
<!--                    <p>                -->
<!--                    --><?php //
//                        echo $this->Text->truncate(
//                            $slide['excerpt'],
//                            250,
//                            [
//                                'ellipsis' => '...',
//                                'exact' => false
//                            ]
//                        );
//                    ?>
<!--                    -->
<!--                </p>-->
<!--                </div>-->
<!--            </div>-->
<!--        --><?php //endforeach ?>
<!---->
<!---->
<!---->
<!--        -->
<!--    </div>-->
<!--    --><?php //if (isset($posts) && !empty($posts)):
//      $centralArtBg = '';
//      if (isset($posts[0]['vifiles'][0]['path']) && !empty($posts[0]['vifiles'][0]['path'])) {
//          $centralArtBg = $this->Image2->source($posts[0]['vifiles'][0]['path'])->crop(400, 160)->imagePath();
//      }
//    ?>
<!--        -->
<!-- -->
<!--    <div class="container olderArticlesWrap">-->
<!--        <div class="row">-->
<!--            <div class="olderArticles" >-->
<!--                <div class="centralArt" style="background:  url(--><?php //echo $centralArtBg; ?>/*)no-repeat center center; -webkit-background-size: cover;background-size: cover;">*/
/*                */<?php
//                    // debug($posts);
//
//                     echo $this->Html->link('<data>'.$posts[0]['created']->format('d.m').'<small>'.$posts[0]['created']->format('Y').'</small></data><h5 class="with-background">'.$posts[0]['title'].'</h5>',
//                         array(
//                             'plugin' => 'Croogo/nodes',
//                             'controller' => 'nodes',
//                             'action' => 'view',
//                             'type'=>'aktualnosci',
//                             'slug'=>$posts[0]['slug']
//                         ),
//                         array(
//                            'escape'=>false,
//                            'title'=>$posts[0]['title']
//                            )
//                     );
//
//                  ?>
<!--                </div>-->
<!--                <ul class="nav">-->
<!--                    --><?php //
//                        foreach ($posts as $key => $post) {
//                            if ($key < 1) continue;// debug($post['Vifiles']);
//                     ?>
<!--                    <li>-->
<!--                        --><?php //
//                           echo $this->Html->link('<data>'.$post['created']->format('d.m').'<small>'.$post['created']->format('Y').'</small></data><h5>'.$post['title'].'</h5>',
//                               array(
//                                   'plugin' => 'Croogo/nodes',
//                                   'controller' => 'nodes',
//                                   'action' => 'view',
//                                   'type'=>'aktualnosci',
//                                   'slug'=>$post['slug']
//                               ),
//                               array(
//                                  'escape'=>false,
//                                  'title'=>htmlentities($post['title'])
//                                  )
//                           );
//
//                        ?>
<!---->
<!--                    </li>-->
<!--                    --><?php //} ?>
<!--                    <li>-->
<!--                    --><?php //
//                       echo $this->Html->link('Zobacz wszystkie',
//                           array(
//                               'plugin' => 'Croogo/nodes',
//                               'controller' => 'nodes',
//                               'action' => 'index',
//                               'type'=>'aktualnosci'
//                           ),
//                           array(
//                              'escape'=>false,
//                                'title'=>'Zobacz wszystkie'
//                              )
//                       );
//
//                    ?>
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--       --><?php //endif ?>
<!---->
<!--</div>-->