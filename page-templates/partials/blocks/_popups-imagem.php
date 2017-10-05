<?php 
  global $post;

  if ($popupContent) {
    $img = $popupContent['imagem'];

    $caption = $img['caption'] ? '"caption" : "'. $img['caption'].'" ' : '';

    echo '<a data-fancybox class="sr-only pp-popup-imagem" data-src="'.$img['url'].'" data-options=\'{ '.$caption.' }\' href="javascript:;"></a>';

    // Se existir css adicional adicional
    if ($cssAdicional) { echo '<style type="text/css" media="screen">'.$cssAdicional.'</style>'; }    
    
    // Carrega o modal automaticamente
    echo '<script type="text/javascript">',
            'jQuery(document).ready(function(){',
              'jQuery(\'.pp-popup-imagem\').trigger(\'click\');',
            '});',
          '</script>';
  }
?>