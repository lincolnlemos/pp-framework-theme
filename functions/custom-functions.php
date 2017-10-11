<?php

/**
 * Valida CNPJ
 *
 * @author Luiz Otávio Miranda <contato@todoespacoonline.com/w>
 * @param string $cnpj 
 * @return bool true para CNPJ correto
 *
 */
function valida_cnpj ( $cnpj ) {
    // Deixa o CNPJ com apenas números
    $cnpj = preg_replace( '/[^0-9]/', '', $cnpj );
    
    // Garante que o CNPJ é uma string
    $cnpj = (string)$cnpj;
    
    // O valor original
    $cnpj_original = $cnpj;
    
    // Captura os primeiros 12 números do CNPJ
    $primeiros_numeros_cnpj = substr( $cnpj, 0, 12 );
    
    /**
     * Multiplicação do CNPJ
     *
     * @param string $cnpj Os digitos do CNPJ
     * @param int $posicoes A posição que vai iniciar a regressão
     * @return int O
     *
     */
    if ( ! function_exists('multiplica_cnpj') ) {
        function multiplica_cnpj( $cnpj, $posicao = 5 ) {
            // Variável para o cálculo
            $calculo = 0;
            
            // Laço para percorrer os item do cnpj
            for ( $i = 0; $i < strlen( $cnpj ); $i++ ) {
                // Cálculo mais posição do CNPJ * a posição
                $calculo = $calculo + ( $cnpj[$i] * $posicao );
                
                // Decrementa a posição a cada volta do laço
                $posicao--;
                
                // Se a posição for menor que 2, ela se torna 9
                if ( $posicao < 2 ) {
                    $posicao = 9;
                }
            }
            // Retorna o cálculo
            return $calculo;
        }
    }
    
    // Faz o primeiro cálculo
    $primeiro_calculo = multiplica_cnpj( $primeiros_numeros_cnpj );
    
    // Se o resto da divisão entre o primeiro cálculo e 11 for menor que 2, o primeiro
    // Dígito é zero (0), caso contrário é 11 - o resto da divisão entre o cálculo e 11
    $primeiro_digito = ( $primeiro_calculo % 11 ) < 2 ? 0 :  11 - ( $primeiro_calculo % 11 );
    
    // Concatena o primeiro dígito nos 12 primeiros números do CNPJ
    // Agora temos 13 números aqui
    $primeiros_numeros_cnpj .= $primeiro_digito;
 
    // O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6
    $segundo_calculo = multiplica_cnpj( $primeiros_numeros_cnpj, 6 );
    $segundo_digito = ( $segundo_calculo % 11 ) < 2 ? 0 :  11 - ( $segundo_calculo % 11 );
    
    // Concatena o segundo dígito ao CNPJ
    $cnpj = $primeiros_numeros_cnpj . $segundo_digito;
    
    // Verifica se o CNPJ gerado é idêntico ao enviado
    if ( $cnpj === $cnpj_original ) {
        return true;
    }
}


/**
 * Valida CPF
 *
 * @author Luiz Otávio Miranda <contato@todoespacoonline.com/w>
 * @param string $cpf O CPF com ou sem pontos e traço
 * @return bool True para CPF correto - False para CPF incorreto
 *
 */
function valida_cpf( $cpf = false ) {
    // Exemplo de CPF: 025.462.884-23
    
    /**
     * Multiplica dígitos vezes posições 
     *
     * @param string $digitos Os digitos desejados
     * @param int $posicoes A posição que vai iniciar a regressão
     * @param int $soma_digitos A soma das multiplicações entre posições e dígitos
     * @return int Os dígitos enviados concatenados com o último dígito
     *
     */
    if ( ! function_exists('calc_digitos_posicoes') ) {
        function calc_digitos_posicoes( $digitos, $posicoes = 10, $soma_digitos = 0 ) {
            // Faz a soma dos dígitos com a posição
            // Ex. para 10 posições: 
            //   0    2    5    4    6    2    8    8   4
            // x10   x9   x8   x7   x6   x5   x4   x3  x2
            //   0 + 18 + 40 + 28 + 36 + 10 + 32 + 24 + 8 = 196
            for ( $i = 0; $i < strlen( $digitos ); $i++  ) {
                $soma_digitos = $soma_digitos + ( $digitos[$i] * $posicoes );
                $posicoes--;
            }
     
            // Captura o resto da divisão entre $soma_digitos dividido por 11
            // Ex.: 196 % 11 = 9
            $soma_digitos = $soma_digitos % 11;
     
            // Verifica se $soma_digitos é menor que 2
            if ( $soma_digitos < 2 ) {
                // $soma_digitos agora será zero
                $soma_digitos = 0;
            } else {
                // Se for maior que 2, o resultado é 11 menos $soma_digitos
                // Ex.: 11 - 9 = 2
                // Nosso dígito procurado é 2
                $soma_digitos = 11 - $soma_digitos;
            }
     
            // Concatena mais um dígito aos primeiro nove dígitos
            // Ex.: 025462884 + 2 = 0254628842
            $cpf = $digitos . $soma_digitos;
            
            // Retorna
            return $cpf;
        }
    }
    
    // Verifica se o CPF foi enviado
    if ( ! $cpf ) {
        return false;
    }
 
    // Remove tudo que não é número do CPF
    // Ex.: 025.462.884-23 = 02546288423
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
 
    // Verifica se o CPF tem 11 caracteres
    // Ex.: 02546288423 = 11 números
    if ( strlen( $cpf ) != 11 ) {
        return false;
    }   
 
    // Captura os 9 primeiros dígitos do CPF
    // Ex.: 02546288423 = 025462884
    $digitos = substr($cpf, 0, 9);
    
    // Faz o cálculo dos 9 primeiros dígitos do CPF para obter o primeiro dígito
    $novo_cpf = calc_digitos_posicoes( $digitos );
    
    // Faz o cálculo dos 10 dígitos do CPF para obter o último dígito
    $novo_cpf = calc_digitos_posicoes( $novo_cpf, 11 );
    
    // Verifica se o novo CPF gerado é idêntico ao CPF enviado
    if ( $novo_cpf === $cpf ) {
        // CPF válido
        return true;
    } else {
        // CPF inválido
        return false;
    }
}


/* Modo de uso <section id="topo" <?php thumbnail_bg( 'paginas-destaque' ); ?>> */
function thumbnail_bg ( $tamanho = 'full' ) {
    global $post;
    $get_post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $tamanho, false, '' );
    if ($get_post_thumbnail) {
      echo 'style="background-image: url('.$get_post_thumbnail[0].' );"';  
    } else if ($post->post_parent > 0 ) {
      $get_post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->post_parent), $tamanho, false, '' );
      echo 'style="background-image: url('.$get_post_thumbnail[0].' );"';  
    } {
      echo "no-bg";
    }    
}

function get_thumbnail_bg ( $tamanho = 'full' ) {
    global $post;
    $get_post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $tamanho, false, '' );
    if ($get_post_thumbnail) {
      return 'style="background-image: url('.$get_post_thumbnail[0].' );"';  
    } else if ($post->post_parent > 0 ) {
      $get_post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->post_parent), $tamanho, false, '' );
      return 'style="background-image: url('.$get_post_thumbnail[0].' );"';  
    } {
      return "no-bg";
    }    
}

function taxonomy_thumbnail_bg ( $nomeField ) {
  global $post;
  $queried_object = get_queried_object(); 
  $taxonomy = $queried_object->taxonomy;
  $term_id = $queried_object->term_id;  

    if (get_field($nomeField, $queried_object)) {
      $src = get_field($nomeField, $queried_object);
    } else {
      return;
    }      
    echo 'style="background-image: url('. $src .' );"';
}



/* É preciso setar o ACF para retornar apenas a URL. */
/* ----------------------------------------- */
  function acf_thumbnail_bg ( $nomeField ) {
    echo get_acf_thumbnail_bg($nomeField);
  }

  function get_acf_thumbnail_bg ( $nomeField ) {
    global $post;      
      if (get_field($nomeField)) {
        $src = get_field($nomeField);  
      } else {
        return;
      }      
      return 'style="background-image: url('. $src .' );"';
  }
/* ----------------------------------------- É preciso setar o ACF para retornar apenas a URL. */    

function mascara_string($mascara,$string) {
   $string = str_replace(" ","",$string);
   for($i=0;$i<strlen($string);$i++)
   {
      $mascara[strpos($mascara,"#")] = $string[$i];
   }
   return $mascara;
}


function clear_url($input) {
  // in case scheme relative URI is passed, e.g., //www.google.com/
  $input = trim($input, '/');

  // If scheme not included, prepend it
  if (!preg_match('#^http(s)?://#', $input)) {
      $input = 'http://' . $input;
  }

  $urlParts = parse_url($input);

  // remove www
  $domain = preg_replace('/^www\./', '', $urlParts['host']);

  return $domain;

}

function get_partial($file) {  
  include get_template_directory() . '/page-templates/partials/'.$file.'.php';
}

function get_block($file) {
  include (PP_BLOCK_PATH . $file.'.php');
}


function images_url($file) {
  echo get_images_url($file);
}

function get_images_url($file) {
  return get_stylesheet_directory_uri() . '/assets/img/'. $file;
}


/* Posts Relacionados */
/* ----------------------------------------- */
function pp_related() { 
  global $post;

  $categories = get_the_category($post->ID);    
  if ($categories) {  
    
    $category_ids = array();
    foreach($categories as $individual_category) {
      $category_ids[] = $individual_category->term_id;
    } // foreach categories

    $args = array(       
      'post__not_in' => array($post->ID), 
      'showposts' => 4, // Number of related posts that will be shown. 
    ); 
    
    if ($category_ids) {
      $args['category__in'] = $category_ids;
    }

    $my_query = new WP_Query($args); 
    if( $my_query->have_posts() ) {
      echo  '<div id="post-relacionados">',
              '<div class="container">',
                '<h4>Leia Também:</h4>',
                '<div class="items">';                      
                  while ( $my_query->have_posts() ) : $my_query->the_post();
                    echo get_partial('_loop-blog' );
                  endwhile;
      echo      '</div>',
              '</div>',
            '</div>';
    } // endif

  } // if categories

  wp_reset_query(); 

}
/* ----------------------------------------- posts relacionados */


/* PP Default Gallery */
/* ----------------------------------------- */
  remove_shortcode('gallery');
  add_shortcode('gallery', 'pp_default_gallery');

  function pp_default_gallery($atts) {
    
    global $post;
    $pid = $post->ID;
    $gallery = '<div class="gallery">';

    if (empty($pid)) {$pid = $post['ID'];}

    extract(shortcode_atts(array('ids' => ''), $atts));    

    $args = array(
      'post_type' => 'attachment', 
      'post__in' => explode(",",$ids),
      'post_mime_type' => 'image', 
      'numberposts' => -1
    );  

    $images = get_posts($args);
    
    foreach ( $images as $image ) {
      //print_r($image); /*see available fields*/
      // echo '<pre>'. print_r($image, 1) . '</pre>';
      
      $thumbnail = wp_get_attachment_image_src($image->ID, 'post-gallery');
      $thumbnail = $thumbnail[0];
      $gallery .= "
        <figure href='".$image->guid."' data-caption='".$image->post_title."' data-fancybox='galeria-".$ids."'>
          <img class='img-responsive' src='".$thumbnail."'>
          <figcaption>
            <p class='img-title'>".$image->post_title." <br> <small>".$image->post_excerpt."</small></p>          
          </figcaption>
        </figure>";
    }
    $gallery .= '</div>';
    return $gallery;
  }

/* ----------------------------------------- PP Default Gallery */    
