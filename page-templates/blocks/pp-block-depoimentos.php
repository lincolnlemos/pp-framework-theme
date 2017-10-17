<?php
	$depoimentos = get_field( 'depoimentos' );
	if ($depoimentos) {
		echo '<div id="depoimentos-wrapper" class="">';
			foreach ($depoimentos as $depoimento) { extract($depoimento);
				$imgsrc = $imagem ? $imagem['src'] : '';
				echo 	'<div class="depoimento-item d-flex">',
									($imgSrc ? '<div class="image-box"><img src="'.$imgSrc.'" class="img-fluid"></div>' : ''),
									'<div>',
										($titulo ? '<h2>'.$titulo.'</h2>' : ''),
										($subtitulo ? '<p class="small font-italic">'.$subtitulo.'</p>' : ''),
										($conteudo ? '<p>'.$conteudo.'</p>' : ''),
									'</div>',
							'</div>';
			}
		echo '</div>';
	}
?>