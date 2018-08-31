<aside class="hidden-xs hidden-sm col-md-3  pull-right linkBar ">
    <div class="box ">
        <h4>
        	<?php 
        	    echo $this->Html->link(
        	        'newsy','/aktualnosci'
        	    );
        	 ?>
        </h4>
    
        	<?php 
        	    echo $this->Html->link(
        	        '','/aktualnosci'
        	    );
        	 ?>
     

    </div>
    <div class="box futsalTv">
        <h4><a href="/magazyn-futsal">Futsal tv</a></h4>
        <a href="/magazyn-futsal"></a>
        <?php 
            // echo $this->Html->link(
            //     'Zarejestruj się',
            //     array(
            //         'controller' => 'users',
            //         'action' => 'add',
            //         'full_base' => true
            //     )
            // );
         ?>
    </div>
    <div class="box camera">
        <h4>
            <?php 
                echo $this->Html->link(
                    'galerie',
                    array(
                        'plugin' => 'gallery',

                        'controller' => 'gallery',
                        'action' => 'index'
                    )
                );
             ?>
        </h4>
        <?php 
            echo $this->Html->link(
                '',
                array(
                    'plugin' => 'gallery',

                    'controller' => 'gallery',
                    'action' => 'index'
                )
            );
         ?>
    </div>
</aside>
