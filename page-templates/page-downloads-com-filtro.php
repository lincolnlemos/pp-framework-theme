<?php
/**
 * Template Name: Downloads com Filtro
 *
 * A custom page template beneficios.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>
	
	<main id="content" class="content-pages" role="main">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?> >
				<header class="default">
					<div class="container">
						<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>								
					</div>
				</header>

				<div class="content">
					<div class="container">
						
						<?php the_content(); ?>
						
						<div class="clearfix"></div>
						
						<?php if ( have_rows( 'categorias' ) ) : ?>
							<h3 class="color-seg"><strong>CATEGORIA</strong></h3>
							<form action="<?php echo get_permalink(); ?>" class="form-inline" method="GET">
								<div class="form-group">
									<select name="categoria">
										<option value="">TODAS</option>
										<?php 
											$cats = get_field( 'categorias' ); 
											$current = isset($_GET['categoria']) ? $_GET['categoria'] : 0 ;
											for ($i=0; $i < count($cats); $i++) { 
												$title = $cats[$i]['titulo_categoria'];
												$val = sanitize_title($title);
												echo '<option '. ($val == $current ? 'selected' : '') .' value="'. $val .'">'.$title.'</option>';
											}											
										?>
									</select>
								</div>
								<button type="submit" class="btn btn-primary">Filtrar</button>
							</form>
							<div class="row itens-download">
								<?php
									if ($current) {										
										foreach ($cats as $cat) {
											if (sanitize_title($cat['titulo_categoria']) == $current) {
												$images = $cat['itens'];
											}
										}
									} else {
										$images = array_reduce(array_column($cats, 'itens'), 'array_merge', []);	
									}
									
				
									/* Páginação ACF */
									/* ----------------------------------------- */
										$page = get_query_var( 'page' ) ? get_query_var('page') : 1;

										// Variables
										$row              = 0;
										$images_per_page  = 6; // How many images to display on each page										
										$total            = count( $images );
										$pages            = ceil( $total / $images_per_page );
										$min              = ( ( $page * $images_per_page ) - $images_per_page ) + 1;
										$max              = ( $min + $images_per_page ) - 1;
										
									/* ----------------------------------------- Páginação ACF */		
									
									$i=0; 
									foreach ($images as $image) { 
									
										$row++;
										// Ignore this image if $row is lower than $min
										if($row < $min) { continue; }

										// Stop loop completely if $row is higher than $max
										if($row > $max) { break; }

										$capa = $image['capa'];
										$arquivo = $image['arquivo'];
										
										$desc = '<h4>'.$arquivo['title'].'</h4>';
										$desc .= $arquivo['caption'] ? '<p>'.$arquivo['caption'].'</p>' : '';
										$desc .= '<a href="'.$arquivo['url'].'" title="Clique para fazer o download" class="btn btn-classic seg" download target="_blank">Download</a>';

										$imgSrc = $capa ? $capa['url'] : get_images_url('icon-default-download.png');
										if ($i % 2 == 0) { echo '<div class="clearfix visible-sm visible-md"></div>';}
										if ($i % 3 == 0) { echo '<div class="clearfix visible-lg"></div>';}
								?>									
									<div class="col-sm-6 col-lg-4">
										<article >											
												<figure>													
														<img src="<?php echo $imgSrc; ?>" alt="Capa <?php echo $arquivo['title']; ?>" class="img-responsive" />													
												</figure>											
											<div class="desc">
												<?php echo $desc; ?>
											</div>
										</article>
									</div>
								<?php $i++; }; ?>
							</div>


							<div class="row paginacao text-right">
				        <?php 
				            // Pagination
				              echo paginate_links( array(
				                'base' => get_permalink() . '%#%' . '/',
				                'format' => '?page=%#%',
				                'current' => $page,
				                'total' => $pages,
				                // 'type' => 'list',
				                'next_text' => 'Próximo',
				                'prev_text' => 'Anterior',
				              ) );
				         ?>               
							</div>

						<?php else: ?>
							<h3>Ainda não temos nenhum item cadastrado <br> Volte em breve :)</h3>
							<br><br>
						<?php endif; ?>
						
					</div>
				</div>
				
			</article>
		<?php endwhile; // end of the loop. ?>
	</main> <!-- #content -->
<?php get_footer(); ?>
