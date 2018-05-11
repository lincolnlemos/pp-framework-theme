<?php 
  global $post;

  if ($popupContent) {    
    
    $videoUrl = $popupContent['url'];    
    echo '<a data-fancybox class="sr-only pp-popup-video" data-src="'.$videoUrl.'" data-options=\'{ buttons: {"close"}, "type" : "iframe"}\' href="javascript:;"></a>';

    // Se existir css adicional adiciona
    if ($cssAdicional) { echo '<style type="text/css" media="screen">'.$cssAdicional.'</style>'; }    
    
    echo '<script type="text/javascript">',
            'jQuery(document).ready(function(){',
              'jQuery(\'.pp-popup-video\').trigger(\'click\');',
            '});',
          '</script>';
  }
?>