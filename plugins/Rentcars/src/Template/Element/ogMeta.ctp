<?php
	if (isset($node['vifiles'][0]['path']) && !empty($node['vifiles'][0]['path'])) {
	    $imgFb = $node['vifiles'][0]['path'];
	}
	elseif (isset($team['vifile']['path']) && !empty($team['vifile']['path'])) {
		$imgFb = $team['vifile']['path'];
	}
	elseif(isset($node['video']) && !empty($node['video'])){
		$imgFb = 'https://i1.ytimg.com/vi/'.$node['video'].'/mqdefault.jpg"';
	}
	else {
		$imgFb = 'http://'.$_SERVER['SERVER_NAME'].'/img/logo-circle.png';
	 
	}

	if (isset($node['excerpt']) && !empty($node['excerpt'])) {
	    $fbDesc = $this->Text->truncate( strip_tags($node['excerpt']), 200 );
	} elseif( isset($node['body'] ) && !empty($node['body'] ) ) {
	   $fbDesc = $this->Text->truncate( strip_tags($node['body']), 200 );
	} 
	else {
	    $fbDesc = 'Futsal Ekstraklasa';
	}?>
	
	<meta property="og:url" content="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$this->request->here; ?>" />
	<meta property="og:type"  content="website" />
	<?php 
		if ($this->request->params['controller'] == 'Teams' && $this->request->params['action'] == 'view') {
			$title_for_layout = $team['name'];
		} else {
            $title_for_layout = $this->fetch('title');
        }
        if (isset($node['video']) && !empty($node['video'])){
        	echo '<meta property="og:image" content="'.$imgFb.'" />';
        }
        else{
        	echo '<meta property="og:image" content="'.$imgFb.'" />';

        }
	 ?>
	<meta property="og:title" content="<?php echo $title_for_layout.' - Futsal Ekstraklasa'; ?>" />
	<meta property="og:description" content="<?php echo preg_replace('/\s+/', ' ', str_replace(PHP_EOL, ' ', $fbDesc) ); ?>" />	
