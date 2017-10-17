<?php
	$depoimentos = $depoimentos ? $depoimentos : get_field( 'depoimentos' );
	if ($depoimentos) {
		
		echo '<div id="depoimentos-wrapper" class="">';
			
			foreach ($depoimentos as $depoimento) { 
				
				extract($depoimento);
				$imgsrc = $imagem ? $imagem['src'] : '';
				
				echo 	'<div class="depoimento-item d-flex">',
									($imgSrc ? '<div class="image-box"><img src="'.$imgSrc.'" class="img-fluid"></div>' : ''),
									'<div>',
										($titulo ? '<h2 class="title">'.$titulo.'</h2>' : ''),
										($subtitulo ? '<p class="subtitle">'.$subtitulo.'</p>' : ''),
										($conteudo ? '<p class="description">'.$conteudo.'</p>' : ''),
									'</div>',
							'</div>';

			}

		echo '</div>';
	}
?>

<?php 
/*
		
		<script>
			(function ($, root, undefined) {
				$(function () {			
					'use strict';

					$('.slick-depoimentos').slick({
					  dots: true,
					  arrows: false,
					  speed: 500,
					});
					
			})(jQuery, this);	
		</script>
		
		== ACF JSON START ==
		[
		    {
		        "key": "group_59dd6c389948a",
		        "title": "[BLOCK] - Depoimentos",
		        "fields": [
		            {
		                "key": "field_59dd6c442739b",
		                "label": "Depoimentos",
		                "name": "depoimentos",
		                "type": "repeater",
		                "value": null,
		                "instructions": "",
		                "required": 0,
		                "conditional_logic": 0,
		                "wrapper": {
		                    "width": "",
		                    "class": "",
		                    "id": ""
		                },
		                "collapsed": "",
		                "min": 0,
		                "max": 0,
		                "layout": "block",
		                "button_label": "Adicionar Depoimento",
		                "sub_fields": [
		                    {
		                        "key": "field_59dd6c672739c",
		                        "label": "Título",
		                        "name": "titulo",
		                        "type": "text",
		                        "value": null,
		                        "instructions": "",
		                        "required": 0,
		                        "conditional_logic": 0,
		                        "wrapper": {
		                            "width": "50",
		                            "class": "",
		                            "id": ""
		                        },
		                        "default_value": "",
		                        "placeholder": "",
		                        "prepend": "",
		                        "append": "",
		                        "maxlength": ""
		                    },
		                    {
		                        "key": "field_59dd6c932739e",
		                        "label": "Subtítulo",
		                        "name": "subtitulo",
		                        "type": "text",
		                        "value": null,
		                        "instructions": "",
		                        "required": 0,
		                        "conditional_logic": 0,
		                        "wrapper": {
		                            "width": "50",
		                            "class": "",
		                            "id": ""
		                        },
		                        "default_value": "",
		                        "placeholder": "",
		                        "prepend": "",
		                        "append": "",
		                        "maxlength": ""
		                    },
		                    {
		                        "key": "field_59dd6c9b2739f",
		                        "label": "Conteúdo",
		                        "name": "conteudo",
		                        "type": "textarea",
		                        "value": null,
		                        "instructions": "",
		                        "required": 0,
		                        "conditional_logic": 0,
		                        "wrapper": {
		                            "width": "50",
		                            "class": "",
		                            "id": ""
		                        },
		                        "default_value": "",
		                        "placeholder": "",
		                        "maxlength": "",
		                        "rows": 4,
		                        "new_lines": "br"
		                    },
		                    {
		                        "key": "field_59dd6cb0273a0",
		                        "label": "Foto",
		                        "name": "foto",
		                        "type": "image",
		                        "value": null,
		                        "instructions": "",
		                        "required": 0,
		                        "conditional_logic": 0,
		                        "wrapper": {
		                            "width": "50",
		                            "class": "",
		                            "id": ""
		                        },
		                        "return_format": "array",
		                        "preview_size": "thumbnail",
		                        "library": "all",
		                        "min_width": "",
		                        "min_height": "",
		                        "min_size": "",
		                        "max_width": "",
		                        "max_height": "",
		                        "max_size": "",
		                        "mime_types": ""
		                    },
		                    {
		                        "key": "field_59dd6cbe273a1",
		                        "label": "Link",
		                        "name": "link",
		                        "type": "link",
		                        "value": null,
		                        "instructions": "",
		                        "required": 0,
		                        "conditional_logic": 0,
		                        "wrapper": {
		                            "width": "",
		                            "class": "",
		                            "id": ""
		                        },
		                        "return_format": "array"
		                    }
		                ]
		            }
		        ],
		        "location": [
		            [
		                {
		                    "param": "page",
		                    "operator": "==",
		                    "value": "136"
		                }
		            ]
		        ],
		        "menu_order": 0,
		        "position": "normal",
		        "style": "default",
		        "label_placement": "top",
		        "instruction_placement": "label",
		        "hide_on_screen": "",
		        "active": 1,
		        "description": ""
		    }
		]
		== ACF JSON END ==

*/
?>