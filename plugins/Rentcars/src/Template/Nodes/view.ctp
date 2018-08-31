
<?php
use Cake\Core\Plugin;

$this->Nodes->set($node);

?>
<div class="viewPage container">
	<div class="row">
	<header class="pageHeader col-xs-12">
	<?php 
    	$nodeType = $node['url']['type'];
    	if ($type['alias'] == 'page') {
			$this->Breadcrumbs->add(__d('croogo', $node['title'])); 
    	}
    	else{
			$this->Breadcrumbs
			    ->add(__d('croogo', $type['title']), $nodeType );
			$this->Breadcrumbs
		            ->add(__d('croogo', $node['title'])); 
    	}

        $this->append('title');
        echo $node['title'];
        $this->end();
     ?>
	</header>
	    <div class="col-xs-12">
	        <h2 class="titleBig">
	            <?php echo $node['title']; ?>
            </h2>
	            <?php if ($node['type'] != 'page' && $node['type'] != 'historia'): ?>
	            	<?php echo $node['created']?'<data>'.$node['created']->format('d.m.y').'<span>Utworzono</span></data>': ""; ?>
	            <?php endif ?>
	    </div>
	</div>
	<div class="row">
		<?php echo  $this->Element('rightLinkBar'); ?>
		<div class="col-xs-12 col-sm-12 col-md-9">
		<?php if (!empty($node['video'])): ?>
			<div class="videoWrapper">
				<iframe  src="https://www.youtube.com/embed/<?php echo $node['video']; ?>" frameborder="0" allowfullscreen></iframe>
			</div>
		<?php
			$path = "";
			elseif (isset($node['vifiles'][0]['path']) && !empty($node['vifiles'][0]['path'])):
				$path =  '<img src="'.$node['vifiles'][0]['path'].'" alt="'.$node['vifiles'][0]['path'].'" class="img-responsive">';
			echo $path;
			

		?>

		<?php endif ?>
		</div>
		<div id="node-<?php echo $this->Nodes->field('id'); ?>" class="col-xs-12 col-sm-12 col-md-9 <?php echo 'type-'.$this->Nodes->field('type'); ?>">
			<div class="excerpt">
				<?php
				    echo $node['excerpt'];
				?>
			</div>
			<div class="nodeBody">
				<?php
				    echo $node['body'];
				?>
				<div class="socialWrapper">
<!-- header=false&amp; stream=false&amp; show_border=false&amp; scrolling="no" -->
					<div class="fbBox">
						<iframe src="http://www.facebook.com/plugins/like.php?locale=pl_PL&amp;href=<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/'.$node['title'];?>&amp;layout=button_count&amp;show_faces=false&amp;header=false&amp; stream=false&amp;show_border=false&amp;action=like&amp;colorscheme=light&amp;font=" scrolling="no" frameborder="0" style="height: 30px; width: 140px; border:none; overflow:visible;" allowTransparency="true">
							
						</iframe>
					</div>
					<div class="g-plus" data-action="share"></div>
					<a href="https://twitter.com/share" class="twitter-share-button" data-via="">Twitter</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</div>
			</div>

			<?php 

			if (count($node['vifiles']) > 1): ?>
				<div class="regular slider">
				<?php 
					foreach ($node['vifiles'] as $key => $item):
						$itemBox = '<div class="slickItem">
					    				<a class="example-image-link" href="'.$item['path'].'" data-lightbox="example-set">'.$this->Html->image($this->Image2->source($item['path'])->resizeit(600, 160)->imagePath(),['class'=>'example-image']).'
									  	</a>
									 </div>';
						if (!empty($node['video'])) {
							echo $itemBox;
						} else {
							if ($key < 1) continue;
							echo $itemBox;
						}
				?>

				<?php endforeach ?>
				</div>
				<script>
					$(document).on('ready', function() {
					  $(".regular").slick({
					    dots: true,
					    infinite: true,
					    arrows:false,
					    slidesToShow: 3,
					    slidesToScroll: 1,
					    responsive: [
					       {
					         breakpoint: 792,
					         settings: {
					           slidesToShow: 2,
					           slidesToScroll: 1,
					           infinite: true,
					           dots: true,
					           centerPadding:'15px'

					         }
					       },
					       {
					         breakpoint: 530,
					         settings: {
					           slidesToShow: 1,
					           slidesToScroll: 1
					         }
					       }
					     ]
					  });
				  	});

				</script>
			<?php endif ?>
		</div>
	</div>

	

<?php if (Plugin::loaded('Croogo/Comments')): ?>
<div class="row">
	<div id="comments" class="node-comments col-xs-12">
	<?php
	    $type = $typesForLayout[$this->Nodes->field('type')];

	    if ($type->comment_status > 0 && $this->Nodes->field('comment_status') > 0) {
	        echo $this->cell('Croogo/Comments.Comments::node', [$node->id]);
	    }

	    if ($type->comment_status == 2 && $this->Nodes->field('comment_status') == 2) {
	        echo $this->cell('Croogo/Comments.Comments::commentFormNode', [
	            'mode' => $node,
	            'type' => $type
	        ]);
	    }
	?>
	</div>
</div>
<?php endif; ?>
</div>
<?php echo  $this->Element('newsletter'); ?>
