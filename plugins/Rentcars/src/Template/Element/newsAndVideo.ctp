<?php// debug($futsalTV[0]); ?>
<div class="row">
    <div class="col-xs-12 col-sm-6 ">
    
        <div class="newsBox">
            <h3><small>Informacje</small> z życia klubów</h3>
            <?php if (isset($fomClubLife[0])): //debug($fomClubLife); ?>
            	
          
            <article class="newsWrapper">
                <div class="imageBox">
                <?php
                    $path = '/uploads/logo.png';
                    if (isset($fomClubLife[0]['vifiles'][0]['path']) && !empty($fomClubLife[0]['vifiles'][0]['path'])) {
                        $path  = $fomClubLife[0]['vifiles'][0]['path'];
                    }
                    echo $this->Html->image($this->Image2->source($path)->crop(600, 415)->imagePath());
                ?>
                
                    <a href="/z-zycia-klubow/<?php echo $fomClubLife[0]['slug']; ?>"></a>
                </div>
                <header>
                    <h6>
                    <a href="/z-zycia-klubow/<?php echo $fomClubLife[0]['slug']; ?>"><?php echo $fomClubLife[0]['title'] ?></a>

                    </h6>
                </header>
                <p>
	                <?php echo $this->Text->truncate(
						    $fomClubLife[0]['excerpt'],
						    250,
						    [
						        'ellipsis' => '...',
						        'exact' => false
						    ]
						); 
					?>		
				</p>
            </article>
            <div class="olderNews">
            <?php  	
        		foreach ($fomClubLife as $x => $club) {
        			if ($x < 1) continue;
                    // debug($club);

        		?>
        			<div class="news">
        			    <div>
                            <?php
                                $pathClub = '/uploads/logo.png';
                                if (isset($club['vifiles'][0]['path']) && !empty($club['vifiles'][0]['path'])) {
                                    $pathClub  = $club['vifiles'][0]['path'];
                                     
                                }
                                
                                echo $this->Html->image($this->Image2->source($pathClub)->resizeit(900, 200,true)->imagePath());
                            ?>
        			        <a href="/z-zycia-klubow/<?php echo $club['slug']; ?>"></a>
        			    </div>
        			    <h6><a href="/z-zycia-klubow/<?php echo $club['slug']; ?>"> <?php echo $club['title']; ?></a></h6>
        			</div>
        		<?php 
        		}
            ?>
            </div>
            <div class="showAll">
            <a href="/z-zycia-klubow">Zobacz wszystkie</a>
            <?php 
     //        		echo $this->Html->link(
					// 	    'Zobacz wszystkie',
					// 	    ['/pages/home']
					// );  
			?>
            </div>
            <!--  -->
        	<?php else: ?>
            	<p class="empty">Obecnie brak artykułów w tej kategorii</p>
            <?php endif ;?>
            <!--  -->
            </div>
    </div>
    <div class="col-xs-12 col-sm-6 videoBox">
        <div class="newsBox">
            <h3><small>futsal tv</small> magazyn futsal</h3>
            <?php if (isset( $futsalTV[0])): ?>
            	
           
            <article class="newsWrapper">
                <div class="imageBox">
                <?php

                    $futsalTVPath = '/uploads/logo.png';
                    // debug($futsalTV);
                    if (isset($futsalTV[0]['video']) && !empty($futsalTV[0]['video'])) {
                       $futsalTVPath =  '<img class="img-responsive" src="https://i1.ytimg.com/vi/'.$futsalTV[0]['video'].'/hqdefault.jpg" alt="'.htmlentities($futsalTV[0]['title']).'">';
                      $emptyPostImage = '';
                    } elseif(isset($futsalTV[0]['vifiles'][0]['path']) && !empty($futsalTV[0]['vifiles'][0]['path'])) {
                       $futsalTVPath =  '<img src="'.$this->Image2->source($futsalTV[0]['vifiles'][0]['path'])->resizeit(300, 173)->imagePath().'" alt="'.$futsalTV[0]['title'].'" class="img-responsive">';
                       $emptyPostImage = '';
                    }
                   
                    echo $futsalTVPath;
                     
                    echo $this->Html->link('',
                      array(
                          'plugin' => 'Croogo/nodes',
                          'controller' => 'nodes',
                          'action' => 'view',
                          'type'=>'magazyn-futsal',
                          'slug'=>$futsalTV[0]['slug']
                      ),
                      array(
                         'escape'=>false,
                         'title'=>htmlentities($futsalTV[0]['title'])
                         )
                  );

                   ?>
                </div>
                <header>
                    <h6><a href="/magazyn-futsal/<?php echo $futsalTV[0]['slug']; ?>"><?php echo $futsalTV[0]['title']; ?></a></h6>
                </header>
                <p>
                <?php echo $this->Text->truncate(
					    $futsalTV[0]['excerpt'],
					    250,
					    [
					        'ellipsis' => '...',
					        'exact' => false
					    ]
					); 
				?>
								
				</p>
            </article>

            <div class="olderNews">
            <?php  	
            		foreach ($futsalTV as $key => $futsal) {
            			if ($key < 1) continue;

            		?>
            			<div class="news">
            			    <div>
                            <?php

                                $newsPath = '/uploads/logo-szare.png';
                                if (isset($futsal['video']) && !empty($futsal['video'])) {
                                   $newsPath =  '<img class="img-responsive" src="https://i1.ytimg.com/vi/'.$futsal['video'].'/mqdefault.jpg" alt="'.$futsal['title'].'">';
                                  $emptyPostImage = '';
                                } elseif(isset($futsal['vifiles'][0]['path']) && !empty($futsal['vifiles'][0]['path'])) {
                                   $newsPath =  '<img src="'.$this->Image2->source($futsal['vifiles'][0]['path'])->resizeit(300, 173)->imagePath().'" alt="'.$futsal['title'].'" class="img-responsive">';
                                   $emptyPostImage = '';
                                }
                               
                                echo $newsPath;
                                 
                            ?>
            			
            			    </div>
            			    <h6><a href="/magazyn-futsal/<?php echo $futsal['slug']; ?>"><?php echo $futsal['title']; ?></a></h6>
            			</div>
            		<?php 
            		}
            ?>
            </div>
            <div class="showAll">
                <a href="/magazyn-futsal">Zobacz wszystkie</a>

            </div>
        <?php else: ?>
        	<p class="empty">Obecnie brak artykułów w tej kategorii</p>
            <?php endif ;?>
        </div>
    </div>
</div>