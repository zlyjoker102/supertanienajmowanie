<div class="container">
	<div class="row">
	        <header class="pageHeader col-xs-12 ">
	            <?php 
	                $this->Breadcrumbs
	                    ->add(__d('croogo', 'Mecze live'), $this->request->url); 
	                $this->append('title');
	                echo 'Mecze live';
	                $this->end();
	             ?>
	        </header>
	</div>
	<div class="row liveMatchWrapper">
	<div class="col-xs-12 ">
		<p>Strona nie wymaga odświeżania, wyniki aktualizowane są na bieżąco.</p>
	</div>
		<div class="col-xs-12 ">
			<div class="iframeWrapper">
				
				<iframe id="live" style="padding:0px;" width="100%" height="2400px" frameborder="0" src="http://www.epmfutsalekstraklasa.pl/liveservice.php"></iframe>
			</div>
			<div class="moreLiveMatch">
				<?php 
					  echo $this->Html->link('Futsal w TV',
					    array(
					        'plugin' => 'Croogo/nodes',
					        'controller' => 'nodes',
					        'action' => 'view',
					        'type'=>'page',
					        'slug'=>'futsal-w-tv'
					    ),
					    array(
					       'class'=>'btn btn-default',
					       'title'=>'Futsal w TV'
					       )
					);
					    echo $this->Html->link('Futsal w internecie',
					      array(
					          'plugin' => 'Croogo/nodes',
					          'controller' => 'nodes',
					          'action' => 'view',
					          'type'=>'page',
					          'slug'=>'futsal-w-internecie'
					      ),
					      array(
					         'class'=>'btn btn-default',
					         'title'=>'Futsal w internecie'
					         )
					  );
				 ?>

			</div>
		</div>
	</div>
</div>
<script type=text/javascript>
    window.onload = function() {
        var frameRefreshInterval = setInterval(5000, function() {
            document.getElementById("live").src = document.getElementById("live").src
        });
    }
</script>