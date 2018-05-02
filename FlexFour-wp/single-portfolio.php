<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MintCake_Flexible
 */

get_header(); ?>
	<div id="main" class="content-area site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if( have_rows('content') ):					
					$intRow = 1;
				    while ( have_rows('content') ) : the_row();?>
				    
				        <?php if( get_row_layout() == 'single_column' ){
				        		$graphic = get_sub_field('graphic');
				        		$graphic = $graphic['sizes']['singl-col'];
				        		$bgimg = get_sub_field('background');
				        	?>
				        	<section id="singl-col" class="<?= $bgclass; ?> animatedParent animateOnce" style="<?php if(!empty($bgimg['url'])): ?>background:url(<?php echo $bgimg['sizes']['background']; ?>); background-position: center; background-size: cover;<?php endif; ?>;  background-color:<?php the_sub_field('background_colour');?>;"  <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
				        		<div class="w-container">
				        			<div class="w-row">
				        				<div class="w-col w-col-12">
					        				<div class="centered">
					        					<div class="banner">
						        					<?php if($graphic): ?>
													<img class="animated fadeInUpShort" src="<?= $graphic; ?>" alt="" />
												<?php endif; ?>
													<?php $strHeading = get_sub_field('section_title');?>
													<?php if (!empty($strHeading)): ?>
														<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
															<?= $strHeading; ?>
															<?php if( get_sub_field('section_subtitle')  != "" ){?>
																<span class="subheading">
																	<?php the_sub_field('section_subtitle');?>
																</span>
															<?php } ?>
														<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
													<?php endif;?>
													<?php if(get_sub_field('content')):?>
														<div class="banner-content">
															<?php the_sub_field('content');?>
														</div>
													<?php endif;?>

													<?php 
													$strLink = get_sub_field('link_text');
													$strURL = get_sub_field('link_destination');
													if (!empty($strLink) && !empty($strURL)):?>
														<a class="cta animated pulse" href="<?= $strURL ;?>">
															<?= $strLink ?>
														</a>
													<?php endif;?>
												</div>
											</div>
				        	   			</div>
				        	   		</div>
				        	   	</div>
							</section>
<!-- FEATURE ICONS-->
				        <?php } elseif ( get_row_layout() == 'feature_icons' ) { ?>
				        	<?php
				        		$columns = get_sub_field('columns');
				        		if($columns == 1) {
				        			$span = 12;
				        		} else if($columns == 2) {
				        			$span = 6;
				        		} else if($columns == 3) {
				        			$span = 4;
				        		} else if($columns == 4) {
				        			$span = 3;
				        		}

				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection';
				        		} elseif($bg == 'grey') {
				        			$bgclass = 'greysection';
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
				        	?>
				        	<section id="feat-icon" class="<?= $bgclass; ?>">
								<div class="w-container overflow">
									<?php if(get_sub_field('section_title')):?>
									<div class="w-row">
										<div class="w-col">
											<div class="centered">
												<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
													<?php the_sub_field('section_title');?>
													<?php if( get_sub_field('section_subtitle')  != "" ){?>
														<span class="subheading">
															<?php the_sub_field('section_subtitle');?>
														</span>
													<?php } ?>
												<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
											</div>
										</div>
									</div>
								<?php endif;?>
									<div class="w-row animatedParent animateOnce" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>  data-sequence="500">
										<?php
										if( have_rows('features') ):
											$i = 1;
										    while ( have_rows('features') ) : the_row();
										    	$link = get_sub_field('icon_link');
										    ?>
												<div class="w-col w-col-<?= $span ?> w-col-small-6">
											        <div class="benefit benefit-<?= $span ?>">
											        	<?php if($link):?>
											        	<a class="" href="<?php echo $link ?>">
											       		<?php endif;?>
												        	<i class="fa <?php the_sub_field('icon');?> animated growIn" data-id='<?php echo $i;?>' style="color: <?php the_sub_field('icon_colour');?>"></i>
												        	<h3>
												        		<?php the_sub_field('title');?>
												        	</h3>
												        <?php if($link):?>
												        </a>
												    	<?php endif;?>
											        	<div>
											        		<?php the_sub_field('description');?>
											        	</div>
											        </div>
											    </div>
											    <?php $i++;?>
										    <?php endwhile;
										else :
										    // no rows found
										endif;
										?>
									</div>
								</div>
							</section>
<!-- GRAPHIC LINKS-->
				        <?php } elseif( get_row_layout() == 'graphic_links' ) {  ?>
				        	<?php 
	 						if(!wp_script_is('prettyPhoto-js')) wp_enqueue_script( 'prettyPhoto-js', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'), '', true );
							if(!wp_style_is('prettyPhoto-js')) wp_enqueue_style( 'prettyPhoto-css', get_template_directory_uri() . '/css/prettyPhoto.css' );
							?>
				        	<?php
				        		$columns = get_sub_field('columns');
				        		if($columns == 2) {
				        			$span = 'w-col-6';
				        		} else if($columns == 3) {
				        			$span = 'w-col-4';
				        		} else if($columns == 4) {
				        			$span = 'w-col-3';
				        		}
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection';
				        		} elseif($bg == 'grey') {
				        			$bgclass = 'greysection';
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
				        	?>
				        	<section id="graphiclinks" class="<?= $bgclass; ?> solutions animatedParent animateOnce" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?> data-sequence="500">
				        		<div class="w-container">
			        				<?php $strHeading = get_sub_field('section_title'); 
			        				if(!empty($strHeading)): ?>
					        			<div class="w-row">
					        				<div class="w-col">
						        				<div class="centered">
													<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
														<?php the_sub_field('section_title');?>
														<?php if( get_sub_field('section_subtitle')  != "" ){?>
															<span class="subheading">
																<?php the_sub_field('section_subtitle');?>
															</span>
														<?php } ?>
													<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
												</div>
											</div>
										</div>
									<?php endif; ?>
									<div class="w-row" >
										<?php
										if( have_rows('graphics') ):
											$i = 1;
										    while ( have_rows('graphics') ) : the_row();
										    	$img = get_sub_field('image');
										    	//echo '<pre>'.print_r($img,true).'</pre>';
								        		//$img = $img['sizes']['solution'];?>
												<div class="w-col <?= $span ?>">
													<div class="single_solution">
															
																<img class="single_sol_img animated fadeInUpShort" src="<?= $img['sizes']['solution'] ?>" alt="" data-id='<?= $i ?>' />
															
														<h3 class="single_sol_h3"><?php the_sub_field('title');?></h3>
														<?php
														$strText = get_sub_field('content');
														$link = get_sub_field('link_destination');
														?>
														<?php if(!empty($strText)): ?><p><?= $strText ?></p><?php endif; ?>
														<?php if($link):?>
															<a class="readmore" href="<?php echo $link;?>">
																<?php 
																$strLinkText = get_sub_field('link_text');
																echo $strLinkText;
																?>
															</a>
														<?php endif;?>
													</div>
												</div>
											    <?php $i++;?>
										    <?php endwhile;
										else :
										    // no rows found
										endif;
										?>
									</div>
								</div>
							</section>
<!-- IMAGE WITH TEXT-->
						<?php } elseif( get_row_layout() == 'image_with_text' ) {  ?>
				        	<?php
				        		$alignment = get_sub_field('image_alignment');
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection';
				        		} elseif($bg == 'grey') {
				        			$bgclass = 'greysection';
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}

				        		$img = get_sub_field('image');
								$img = $img['sizes']['sideimage'];
				        	?>
				        	<section id="img-w-txt" class="<?= $bgclass; ?> intro animatedParent animateOnce" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
				        		<div class="w-container">
				        			<div class="w-row">
				        				<div class="w-col w-col-8" style="float: <?= $alignment; ?>">
				        					<div class="sidetext">
												<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
													<?php the_sub_field('section_title');?>
												<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
												<?php the_sub_field('content');?>
											</div>
										</div>
										<div class="w-col w-col-4 sideimage animated fadeInUpShort">
											<img class="" src="<?= $img ?>" alt="" />
											<?php $caption = get_sub_field('caption');
											if($caption):?>
												<div class="caption">
														<p><?php the_sub_field('caption')?></p>
												</div>
											<?php endif;?>
										</div>
									</div>
								</div>
							</section>
<!-- TEXT ONLY-->							
						<?php } elseif( get_row_layout() == 'text_only' ) {  ?>
				        	<?php
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection';
				        		} elseif($bg == 'grey') {
				        			$bgclass = 'greysection';
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
				        		$col = get_field('colnumber');

				        	?>
				        	<section id="txt" class="<?= $bgclass; ?> animatedParent animateOnce"<?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
				        		<div class="w-container">
				        			<div class="w-row">
				        				<div class="w-col w-col-12" style="float: <?= $alignment; ?>">
											<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
												<?php the_sub_field('section_title');?>
											<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
											<?php the_sub_field('content');?>
										</div>
									</div>
								</div>
							</section>
<!-- TEXT ONLY 2 COLS-->							
						<?php } elseif( get_row_layout() == 'text_2cols' ) {  ?>
				        	<?php
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection';
				        		} elseif($bg == 'grey') {
				        			$bgclass = 'greysection';
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
				        		$col1 = get_sub_field('column_width');
							// 09-08-2017 LW: Found that if a default was set on the column field an array is returned instead of the field value. This makes it return a php error	
				        		$col2 = 12 - $col1;
				        		switch($col1){
				        			case '9':
				        				$strCol1 = 'w-col w-col-9 w-col-medium-8';
				        				$strCol2 = 'w-col w-col-3 w-col-medium-4';
				        			break;
				        			case '8':
				        				$strCol1 = 'w-col w-col-8 w-col-medium-8';
				        				$strCol2 = 'w-col w-col-4 w-col-medium-4';
				        			break;
				        			case '7':
				        				$strCol1 = 'w-col w-col-7 w-col-medium-8';
				        				$strCol2 = 'w-col w-col-5 w-col-medium-4';
				        			break;
				        			case '6':
				        				$strCol1 = 'w-col w-col-6 w-col-medium-6';
				        				$strCol2 = 'w-col w-col-6 w-col-medium-6';
				        			break;
				        			case '5':
				        				$strCol1 = 'w-col w-col-5 w-col-medium-6';
				        				$strCol2 = 'w-col w-col-7 w-col-medium-6';
				        			break;
				        			case '4':
				        				$strCol1 = 'w-col w-col-4 w-col-medium-6';
				        				$strCol2 = 'w-col w-col-8 w-col-medium-6';
				        			break;
				        			case '3':
				        				$strCol1 = 'w-col w-col-3 w-col-medium-6';
				        				$strCol2 = 'w-col w-col-9 w-col-medium-6';
				        			break;
				        		}
				        	?>
				        	<section id="txt-2col" class="<?= $bgclass; ?> " <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
				        		<div class="w-container">
				        			<div class="w-row">
				        				<div class="w-col w-col-12">
			        						<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
												<?php the_sub_field('section_title_1');?>
											<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
				        				</div>
			        					
				        			</div>
				        			<div class="w-row">
				        				<div class="w-col w-col-<?= $col1 > 0 ? $col1 : '6' ?>" style="float: <?= $alignment; ?>">
											<?php the_sub_field('content_1');?>
										</div>
										<div class="w-col w-col-<?= $col2 > 0 ? $col2 : '6' ?>" style="float: <?= $alignment; ?>">
											<?php the_sub_field('content_2');?>
										</div>
									</div>
								</div>
							</section>
<!-- CONTACT FORM-->							
						<?php } elseif( get_row_layout() == 'contact' ) {  ?>
				        	<?php
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection';
				        		} elseif($bg == 'grey') {
				        			$bgclass = 'greysection';
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
				        	?>
				        	<section id="contact" class="<?= $bgclass; ?> animatedParent animateOnce" data-appear-top-offset="-200">
				        		<div class="w-container">
				        			<div class="w-row">
		        						<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
											<?php the_sub_field('section_title');?>
										<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
			        				</div>
				        			<div class="w-row">
				        				<div class="w-col w-col-4">
											<?php the_sub_field('contact_text');?>
										</div>
										<div class="w-col w-col-8">
											<?php the_sub_field('contact_form')?>
										</div>
									</div>
								</div>
							</section>
<!-- PHOTO GALLERY-->
 						<?php } elseif( get_row_layout() == 'photo_gallery' ) {  ?>
	 						<?php 
	 						if(!wp_script_is('prettyPhoto-js')) wp_enqueue_script( 'prettyPhoto-js', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'), '', true );
							if(!wp_style_is('prettyPhoto-js')) wp_enqueue_style( 'prettyPhoto-css', get_template_directory_uri() . '/css/prettyPhoto.css' );
							?>
				        	<?php
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection';
				        		} elseif($bg == 'grey') {
				        			$bgclass = 'greysection';
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
				        	?>
							<section id="gallery"  class="<?= $bgclass; ?>" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
				        			<div class="w-row">
				        				<div class="w-col w-col-12">
				        					<div class="gallery-header">
												<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
													<?php the_sub_field('section_title');?>
													<span class="subheading">
														<?php the_sub_field('section_subheading');?>
													</span>
												<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
											</div>
										</div>
									</div>
									<div class="w-row">
									
										<div class="slick photo-gallery" data-slick='{"dots": true,"arrows": false,"autoplay":false,"infinite":true,"autoplaySpeed":1500,"slidesToShow":4,"slidesToScroll":1,"responsive": [{"breakpoint": 991,"settings": {"slidesToShow": 3,"slidesToScroll": 1,"dots": true}},{"breakpoint": 780,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}, {"breakpoint": 400,"settings": {"slidesToShow": 1, "slidesToScroll": 1}}]}'>
											<?php 
											$images = get_sub_field('photo_gallery_images');
											//echo '<pre>'.print_r($images,true).'</pre>';
											if( $images ): ?>
												<?php $i = 1; ?>
											    <?php foreach( $images as $image ): ?>
											        <div class="photo-tile">
														<a class="grid_page_box" rel="prettyPhoto[gallery]" href="<?= $image['sizes']['large']; ?>" data-id='<?= $i; ?>'>
											         		<img src="<?php echo $image['sizes']['activity']; ?>" alt="<?php echo $image['alt']; ?>" />
											         		<?php if($image['caption']):?>
													        	<div class="img_overlay">
													        		<h3><?php echo $image['caption'];?></h3>
													        	</div>
												        	<?php endif;?>
											         	</a>
											        </div>
											        <?php $i++ ;?>
											    <?php endforeach; ?>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</section>
							<?php
							if(!wp_script_is('slick-js')) wp_enqueue_script( 'slick-js', get_template_directory_uri().'/slick/slick.min.js', array('jquery'), false, true );
							if(wp_script_is('slick-js')) { 
							?>
								<script type="text/javascript">
								/*jQuery(document).ready(function(){
									jQuery('.photo-gallery').slick();
								});*/
								</script>
							<?php } ?>
<!-- VIDEO GALLERY-->
						<?php } elseif( get_row_layout() == 'video_gallery' ) { 

							$bg = get_sub_field('background');
			        		if($bg == 'white') {
			        			$bgclass = 'whitesection';
			        		} elseif($bg == 'grey') {
			        			$bgclass = 'greysection';
			        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
				        	?>
							<section id="grid" class="<?= $bgclass; ?> listsection" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
									<div class="w-row">
										<div class="w-col">
											<?php if(get_sub_field('section_title')):?>
						        				<div class="centered">
													<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
														<?php the_sub_field('section_title');?>
														<?php if( get_sub_field('section_subtitle')  != "" ){?>
														<?php } ?>
													<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
												</div>
											<?php endif;?>
											<div class="intro">
												<p><?php the_sub_field('section_intro');?></p>
											</div>
					        			</div>
					        		</div>
					        		<div class="w-row">

							        	<?php if( have_rows('video') ):
											    while ( have_rows('video') ) : the_row();?>
			        							<div class="w-col w-col-3 w-col-small-12 w-col-tiny-12">
				        							<?php $i = 1; ?>
											        <div class="video_single">
				        								<iframe
					        								width="560" height="340"
					        								allowfullscreen="allowfullscreen"
					        								mozallowfullscreen="mozallowfullscreen" 
														    msallowfullscreen="msallowfullscreen" 
														    oallowfullscreen="oallowfullscreen" 
														    webkitallowfullscreen="webkitallowfullscreen"
														    src="https://www.youtube.com/embed/<?php the_sub_field('youtubeID');?>">
													    </iframe>
				        								<div class="videotitle">
				        									<h3><?php the_sub_field('video_title');?></h3>
				        									<?php the_sub_field('video_description');?>
				        								</div>
											        </div>
											        <?php $i++ ;?>
			        							</div>
											    <?php endwhile;
											else :
										endif;?>

					        		</div>
					        	</div>				        	
							</section>
<!-- AUDIO -->
						<?php } elseif( get_row_layout() == 'audio' ) { 

							$bg = get_sub_field('background');
			        		if($bg == 'white') {
			        			$bgclass = 'whitesection';
			        		} elseif($bg == 'grey') {
			        			$bgclass = 'greysection';
			        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
				        	?>
							<section id="grid" class="<?= $bgclass; ?> listsection" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
									<div class="w-row">
										<div class="w-col">
					        				<div class="centered">
												<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
													<?php the_sub_field('section_title');?>
													<?php if( get_sub_field('section_subtitle')  != "" ){?>
													<?php } ?>
												<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
												<?php the_sub_field('short_description')?>
											</div>
					        			</div>
					        		</div>
					        		<div class="w-row">
							        	<?php if( have_rows('audio_gallery') ):
											    while ( have_rows('audio_gallery') ) : the_row();?>
			        							<div class="w-col w-col-6 w-col-small-12 w-col-tiny-12">
				        							<?php $i = 1; ?>
											        <div class="audio_single">
				        								<div class="audiotitle">
				        									<h3><?php the_sub_field('audio_title');?></h3>
				        									<?php the_sub_field('audio_description');?>
				        								</div>
				        								<?php $track = get_sub_field('audio_link'); 
														//if you use data-array instead of data-url at file return
														//$track_url = get_sub_field('track_url') ;
														//$track = $track_url['url'];

														    $attr = array(
														        'src'      => $track,
														        'loop'     => '',
														        'autoplay' => '',
														        'preload' => 'none'
														        );
														   echo wp_audio_shortcode( $attr );?>
											        </div>
											        <?php $i++ ;?>
			        							</div>
											    <?php endwhile;
											else :
										endif;?>
					        		</div>
					        	</div>				        	
							</section>
<!-- TEXT WITH SIDEBAR-->	
				        <?php } elseif( get_row_layout() == 'text_with_sidebar' ) {  ?>
				        	<?php
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection';
				        		} elseif($bg == 'grey') {
				        			$bgclass = 'greysection';
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
				        	?>
				        	<section id="txt-sidebar" class="<?= $bgclass; ?> animatedParent animateOnce" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
				        		<div class="w-container">
				        			<div class="w-row">
				        				<div class="w-col w-col-9">
											<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
												<?php the_sub_field('section_title');?>
											<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
											<?php the_sub_field('content');?>
										</div>
										<div class="w-col w-col-3">
											<?php
											if( have_rows('sidebar') ):
												$i = 1;
											    while ( have_rows('sidebar') ) : the_row(); ?>
											    	<a class="sidebar_box" href="<?php the_sub_field('link');?>">
														<h3>
															<?php the_sub_field('title');?>
														</h3>
														<div class="sidebar_box_content">
															<?php the_sub_field('content');?>
														</div>
													</a>
												<?php endwhile;
											else :
											    // no rows found
											endif;
											?>
										</div>
									</div>
								</div>
							</section>
<!-- TABS-->
						<?php } elseif( get_row_layout() == 'tabs' ) {  ?>
				        	<?php
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection';
				        		} elseif($bg == 'grey') {
				        			$bgclass = 'greysection';
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
				        	?>
				        	<section id="tab" class="<?= $bgclass; ?> animatedParent animateOnce" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
				        		<div class="w-container">
				        			<div class="w-row">
				        				<div class="w-col w-col-12">
											<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
												<?php the_sub_field('section_title');?>
											<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
											<?php the_sub_field('content');?>
										</div>
										<div class="w-col w-col-12">
											<div class="responsiveTabs">
											    <?php
												if( have_rows('responsive_tabs') ):
													$i = 1;
													?>
													<ul>
													    <?php while ( have_rows('responsive_tabs') ) : the_row(); ?>
															<li>
																<a href="#tab-<?= $i ; ?>">
																	<?php the_sub_field('tab_title');?>
																</a>
															</li>
														<?php
														$i++;
														endwhile; ?>
											    	</ul>
												<?php else :
												endif;
												?>
												<?php
												if( have_rows('responsive_tabs') ):
													$i = 1;?>
												    <?php while ( have_rows('responsive_tabs') ) : the_row(); ?>
														<div id="tab-<?= $i ; ?>">
															<?php the_sub_field('tab_content');?>
														</div>
													<?php $i++;
													endwhile; ?>
												<?php else :
												endif;
												?>			
											</div>
										</div>
									</div>
								</div>
							</section>
<!-- FEATURE LIST-->
						<?php } elseif( get_row_layout() == 'feature_list' ) {  ?>
				        	<?php
				        		$columns = get_sub_field('columns');
				        		$image = get_sub_field('image');
				        		$image = $image['sizes']['centered'];
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection';
				        		} elseif($bg == 'grey') {
				        			$bgclass = 'greysection';
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
				        	?>
				        	<section id="feat_list" class="<?= $bgclass; ?> animatedParent animateOnce" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>">
				        		<div class="w-container">
				        			<div class="w-row">
					        			<div class="w-col">
					        				<div class="centered">
					        					<?php if($image != "") { ?>
					        						<img class="animated fadeInUpShort" src="<?= $image; ?>" alt="<?php the_sub_field('section_title');?>"   />
					        					<?php } ?>
												<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
													<?php the_sub_field('section_title');?>
													<?php if( get_sub_field('section_subtitle')  != "" ){?>
														<span class="subheading">
															<?php the_sub_field('section_subtitle');?>
														</span>
													<?php } ?>
												<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
												<div>
													<?php the_sub_field('content');?>
												</div>
											</div>
					        			</div>
				        			</div>
				        			<div class="w-row">
				        				<?php if($columns == 1) { ?>
					        				<div class="w-col w-col-12">
					        					<div class="centered">
					        						<?php if( have_rows('features') ): ?>
						        						<ul class="features">
							        						<?php while ( have_rows('features') ) : the_row(); ?>
							        							<li>
							        								<?php the_sub_field('title');?>
							        							</li>
						        							<?php endwhile; ?>
														</ul>
													<?php else :
													endif;
													?>
												</div>
											</div>
										<?php } else { ?>
											<div class="centered w-clearfix">
												<div class="w-col w-col-6 w-col-medium-6 w-col-small-6 w-col-tiny-6">
					        						<?php if( have_rows('features') ): ?>
						        						<ul class="features">
							        						<?php while ( have_rows('features') ) : the_row(); ?>
							        							<li>
							        								<?php the_sub_field('title');?>
							        							</li>
						        							<?php endwhile; ?>
														</ul>
													<?php else :
														// no rows found
													endif;
													?>
												</div>
												<div class="w-col w-col-6 w-col-medium-6 w-col-small-6 w-col-tiny-6">
					        						<?php if( have_rows('features_column_2') ): ?>
						        						<ul class="features">
							        						<?php while ( have_rows('features_column_2') ) : the_row(); ?>
							        							<li>
							        								<?php the_sub_field('title');?>
							        							</li>
						        							<?php endwhile; ?>
														</ul>
													<?php else :
														// no rows found
													endif;
													?>
												</div>
											</div>
										<?php } ?>
									</div>
									<div class="w-row">
										<div class="w-col w-col-12">
											<div class="extra-text">
												<?php the_sub_field('extra_text')?>
											</div>
										</div>
									</div>

								</div>
							</section>
<!-- PORTFOLIO-->
						<?php } elseif( get_row_layout() == 'portfolio' ) {  
							$bg = get_sub_field('background_portfolio');
							
			        		if($bg == 'white') {
			        			$bgclass = 'whitesection';
			        		} elseif($bg == 'grey') {
			        			$bgclass = 'greysection';
			        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
				        	?>
				        	<section id="portfolio" class="<?= $bgclass; ?> " <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
				        		<div class="w-container">
									<div class="w-row">
										<div class="pf_title">
											<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
												<?= get_sub_field('section_title_portfolio');?>
												<span class="subheading">
													<?= get_sub_field('section_subtitle_portfolio');?>
												</span>
											<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
										</div>
									</div>
								</div>
				        		<div class="w-row">
				        			<div class="w-container">
					        			<div class="slick examples" data-slick='{"dots": true, "arrows": false, "autoplay": true, "infinite": true, "autoplaySpeed": 5000, "slidesToShow": 4, "slidesToScroll": 2, "responsive": [{"breakpoint": 1024,"settings": {"slidesToShow": 3}},{"breakpoint": 780,"settings": {"slidesToShow": 2}}, {"breakpoint": 480,"settings": {"slidesToShow": 1}}]}'>
					        				<?php
												$args = array(
												    'numberposts' => 8,
												    'orderby' => 'asc',
												    'post_type' => 'portfolio',
												    'post_status' => 'publish'
												);
												$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
												foreach( $recent_posts as $recent ){ ?>
									                <div class="example_container">
														<a class="solution" href="<?php echo get_permalink($recent["ID"]);?>">
															<?php echo get_the_post_thumbnail( $recent["ID"], 'activity' ); ?>
															<h3>
																<?php echo $recent["post_title"];?>
															</h3>
														</a>
													</div>
											<?php } ?>
					        			</div>
					        		</div>
				        		</div>
				        	</section>

				        	<?php
							if(!wp_script_is('slick-js')) wp_enqueue_script( 'slick-js', get_template_directory_uri().'/slick/slick.min.js', array('jquery'), false, true );
							if(wp_script_is('slick-js')) { 
							?>
								<script type="text/javascript">
								/*jQuery(document).ready(function(){
									jQuery('.examples').slick();
								});*/
								</script>
							<?php } ?>
<!-- GRID SECTION-->
						<?php } elseif( get_row_layout() == 'grid_section' ) { 
 						// 	if(!wp_script_is('prettyPhoto-js')) wp_enqueue_script( 'prettyPhoto-js', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'), '', true );
							// if(!wp_style_is('prettyPhoto-css')) wp_enqueue_style( 'prettyPhoto-css', get_template_directory_uri() . '/css/prettyPhoto.css' );

							$bg = get_sub_field('background');
			        		if($bg == 'white') {
			        			$bgclass = 'whitesection';
			        		} elseif($bg == 'grey') {
			        			$bgclass = 'greysection';
			        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
				        	?>
							<section id="grid" class="<?= $bgclass; ?> listsection" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
									<div class="w-row">
										<div class="w-col">
					        				<div class="centered">
												<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
													<?php the_sub_field('section_title');?>
													<?php if( get_sub_field('section_subtitle')  != "" ){?>
														<span class="subheading">
															<?php the_sub_field('section_subtitle');?>
														</span>
													<?php } ?>
												<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
											</div>
					        			</div>
					        		</div>
					        		<div class="w-row">
					        			<?php if( have_rows('grid_items') ): ?>
			        						<?php while ( have_rows('grid_items') ) : the_row(); ?>
			        							<?php
			        								$image = get_sub_field('image');
			        							?>
			        							<div class="w-col w-col-3 w-col-small-6 w-col-tiny-6">
				        							<?php $i = 1; ?>
											        <div class="grid_single">
														<a class="grid_page_box" rel="prettyPhoto[Grid]" href="<?= $image['sizes']['large']; ?>" data-id='<?= $i; ?>'>
											         		<img src="<?= $image['sizes']['gridthumb'] ; ?>" alt="" />
					        								<span class="gridtitle">
					        									<?php the_sub_field('title');?>
					        								</span>
											         	</a>
											        </div>
											        <?php $i++ ;?>
			        							</div>
		        							<?php endwhile; ?>
										<?php else :
											// no rows found
										endif;
										?>
					        		</div>
					        	</div>				        	
							</section>
<!-- TESTIMONIALS-->
						<?php } elseif( get_row_layout() == 'testimonials' ) {  
							$bg = get_sub_field('background');
			        		if($bg == 'white') {
			        			$bgclass = 'whitesection';
			        		} elseif($bg == 'grey') {
			        			$bgclass = 'greysection';
			        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
			        		$columns = get_sub_field('columns');
			        		if($columns == 1) {
			        			$span = 'w-col-12';
			        		} else if($columns == 2) {
			        			$span = 'w-col-6';
			        		} else if($columns == 3) {
			        			$span = 'w-col-4';
			        		}
				        	?>
							<section id="testimonial" class="<?= $bgclass; ?> listsection animatedParent animateOnce"<?= $intRow > 2 ? ' data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
									<div class="centered">
					        			<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
					        				<?php echo get_sub_field('section_title');?>
					        			<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
					        		</div>
									<div class="w-row">				
										<div class="w-col w-col-12">
											<div class="test-centered">
												<?php

												if( have_rows('testimonial') ):
													while ( have_rows('testimonial') ) : the_row();

														$post_object = get_sub_field('testimonial_select');
														$post = $post_object;
														setup_postdata( $post ); 
														?>

														<div class="w-col <?= $span ?> ">
															<div class="testimonial">
										                    	<?php the_field('testimonial',$post->ID )?>
								        						<?php if(get_field('name')):?>
									        						<span class="clientname">
									        							<?php the_field('name',$post->ID)?>,
									        							<span class="org">
									        								<?php the_field('organisation',$post->ID)?>
									        							</span>
									        						</span>
								        						<?php endif;?>
															</div>
														</div>
														<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

													endwhile;
												else:

													$args = array(
													    'numberposts' => 3,
													    'post_type' => 'testimonials',
													    'post_status' => 'publish',
													    'orderby' => 'rand'
													);
													$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
													foreach( $recent_posts as $recent ){ 
														?>
														<div class="w-col w-col-4">
															<div class="testimonial">
										                    	<?php the_field('testimonial',$recent["ID"]) ?>
								        						<span class="clientname">
								        							<?php the_sub_field('name',$recent["ID"])?>
								        							<span class="org">
								        								<?php the_field('organisation',$recent["ID"])?>
								        							</span>
								        						</span>
															</div>
														</div>					
													<?php }

												endif;
												?>
											</div>
										</div>
									</div>
								</div>
							</section>
<!-- REVIEWERS-->
						<?php } elseif( get_row_layout() == 'reviewers' ) {  
							$bg = get_sub_field('background');
			        		if($bg == 'white') {
			        			$bgclass = 'whitesection';
			        		} elseif($bg == 'grey') {
			        			$bgclass = 'greysection';
			        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
				        	?>
							<section id="reviewers" class="<?= $bgclass; ?> listsection animatedParent animateOnce"<?= $intRow > 2 ? ' data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
									<div class="centered">
					        			<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
					        				<?php echo get_sub_field('section_title');?>
					        			<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
					        		</div>
									<div class="w-row">				
										<div class="w-col w-col-12">
											<div class="test-centered">
					        					<?php
												$args = array(
												    'numberposts' => 8,
												    'orderby' => 'random',
												    'post_type' => 'reviewers',
												    'post_status' => 'publish'
												);
												$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
												foreach( $recent_posts as $recent ){ 
													?>
												<div class="w-col w-col-6 animated growIn">
													<div class="reviewer">											
									                    <div class="clientname">
							        						<span><?php the_field('play',$recent["ID"]) ?></span>
							        						<br>
							        						<span class="theatre"><?php the_field('theatre',$recent["ID"]) ?></span>
							        					</div>
						        					    <div class="quote">
									                    	<?php the_field('quote',$recent["ID"]) ?>
							        						<span class="critic">
							        							<?php the_field('reviewer',$recent["ID"])?>
							        						</span>
														</div>
													</div>
												</div>					
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</section>

<!-- CONTACTSECTION-->
						<?php } elseif( get_row_layout() == 'contactsection' ) {  
							$bg = get_sub_field('background');
			        		if($bg == 'white') {
			        			$bgclass = 'whitesection';
			        		} elseif($bg == 'grey') {
			        			$bgclass = 'greysection';
			        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
				        	?>
							<section id="reviewers" class="<?= $bgclass; ?> listsection animatedParent animateOnce"<?= $intRow > 2 ? ' data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
									<div class="centered">
					        			<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
					        				<?php echo get_sub_field('section_title');?>
					        			<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
					        		</div>
									<div class="w-row">				
										<div class="w-col w-col-12">
											<div class="contact-section-centered">
					        					<?php
												$args = array(
												    'numberposts' => 3,
												    'orderby' => 'random',
												    'post_type' => 'contactsection',
												    'post_status' => 'publish'
												);
												$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
												foreach( $recent_posts as $recent ){ 
													?>
												<div class="w-col w-col-4 animated growIn">												
								                    <span class="c-title">
						        						<?php the_field('contact_title',$recent["ID"]) ?>
						        					</span>
					        					    <div class="c-text">
								                    	<?php the_field('contact_text',$recent["ID"]) ?>
						        						<span class="reviewer">
						        							<?php the_field('reviewer',$recent["ID"])?>
						        						</span>
													</div>
												</div>					
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</section>
<!-- RESOURCES-->
						<?php } elseif( get_row_layout() == 'resources' ) {  
							$bg = get_sub_field('background');
				       		if($bg == 'white') {
				       			$bgclass = 'whitesection';
				       		} elseif($bg == 'grey') {
				       			$bgclass = 'greysection';
				       		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
					       	?>
							<section id="resources" class="<?= $bgclass; ?> listsection" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
									<div class="w-row">
										<div class="w-col">
				        					<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
				        						<?php the_sub_field('section_title');?>
				        						<span class="subheading">
													<?php the_sub_field('sub_title');?>
												</span>
				        					<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
					        			</div>
					        		</div>
					        		<div class="w-row">
										<div class="w-col w-col-6">
											<?php
											if( have_rows('resource_link') ):
												$i = 1;
												?>
												<?php while ( have_rows('resource_link') ) : the_row(); ?>
													<div class="single_resource">
														<h3 class="resource_title">
															<?php the_sub_field('resource_title');?>
														</h3>
														<p>
															<?php the_sub_field('resource_description');?>
														</p>
														<?php if (get_sub_field('download_link')):?>
															<a class="cta" href="<?php the_sub_field('download_link');?>" target="_blank">
																Download
															</a>
														<?php endif;?>
													</div>
												<?php $i++;
												endwhile;
											else :
											endif;?>
										</div>
										<div class="w-col w-col-6">
											<div class="resource_testimonial">
												<?php
												if( have_rows('resource_testimonial') ):
												    while ( have_rows('resource_testimonial') ) : the_row();?>
												    	<?php the_sub_field('testimonial');?>
												    	<h4><?php the_sub_field('client_name');?>, <span><?php the_sub_field('org');?></span></h4>
												    <?php endwhile;
												else :
												endif;
												?>																
											</div>
										</div>
									</div>
						
					        	</div>
							</section>
<!-- BLOG-->					
						<?php } elseif( get_row_layout() == 'blog' ) {  
							$bg = get_sub_field('background');
				       		if($bg == 'white') {
				       			$bgclass = 'whitesection';
				       		} elseif($bg == 'grey') {
				       			$bgclass = 'greysection';
				       		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
					       	?>
							<section id="blog" class="<?= $bgclass; ?> listsection" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
									<div class="w-row">
										<div class="w-col">
											<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
												<?php the_sub_field('section_title');?>
												<span class="subheading">
													<?php the_sub_field('sub_title');?>
												</span>
											<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
										</div>
									</div>
									<div class="w-row">
					                    <?php
										$args = array(
										    'numberposts' => 3
										);
										$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
										$i=1;
										foreach( $recent_posts as $recent ){ 
											if ( has_post_thumbnail() ) {
					                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blog_thumb' );
					                            $url = $thumb['0'];
					                        }
					                        else {
					                            $url = get_stylesheet_directory_uri() . '/img/placeholder.jpg';
					                        }
					                        if($i == 1) {
					                            $cols = "w-col w-col-6 w-col-medium-12";
					                        } else {
					                            $cols = "w-col w-col-3 w-col-medium-6";
					                        }?>
											<div class="<?= $cols;?>">
				                                <a class="solution" href="<?php echo get_permalink($recent["ID"]);?>">
													<?php echo get_the_post_thumbnail( $recent["ID"], 'blogthumb' ); ?>
													<h3>
														<?php echo $recent["post_title"];?>
													</h3>
												</a>
					                        </div>
					                        <?php $i++;?>
										<?php } ?>
									</div>
								</div>
							</section>
<!-- FEATURES-->
						<?php } elseif( get_row_layout() == 'features' ) {  
							$bg = get_sub_field('background');
				       		if($bg == 'white') {
				       			$bgclass = 'whitesection';
				       		} elseif($bg == 'grey') {
				       			$bgclass = 'greysection';
				       		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
					       	?>
							<section id="feature_tab" class="<?= $bgclass; ?> listsection" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
									<div class="w-row">
										<div class="w-col">
											<div class="centered">
												<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
													<?php the_sub_field('section_title');?>
													<span class="subheading">
														<?php the_sub_field('sub_title');?>
													</span>
												<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
											</div>
										</div>
									</div>
									<?php
										if( have_rows('feature_tabs') ):
											$i = 1;
											?>
											<div class="w-row">
												<div class="w-col">
													<div class="slick slider-nav" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "arrows": false, "asNavFor": ".slider-for", "dots": true, "centerMode": false, "focusOnSelect": true}'>
														<?php
														while ( have_rows('feature_tabs') ) : the_row(); ?>
															<div class="slider-nav-link">
																<div class="slider_nav_link_internal">
																	<?php the_sub_field('icon');?>
																	<span class="feature_title">
																		<?php the_sub_field('tab_title');?>
																	</span>
																</div>
															</div>
															<?php
															$i++;
														endwhile; ?>
													</div>
													<div class="slick slider-for" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "arrows": false, "fade": true, "asNavFor": ".slider-nav","responsive":[{"breakpoint":1024,"settings": {"arrows": true}},{"breakpoint":800,"settings": {"arrows": true}}]}'>
														<?php 
														while ( have_rows('feature_tabs') ) : the_row(); ?>
															<div class="feature_slide">
																<div class="w-row">
								        							<?php
								        								$image = get_sub_field('image');
														        		$image = $image['sizes']['feat'];
								        							?>
								        							<?php if(!empty($image)){?>
																	<div class="w-col w-col-7">
																	<?php }else{?>
																	<div class="w-col w-col-12">
																	<?php }?>
																		<h3><?php the_sub_field('tab_subtitle');?></h3>
																		<p><?php the_sub_field('tab_content');?></p>
																	</div>
																	<div class="w-col w-col-5">
																	<?php if(!empty($image)): ?><img class="slideimage go" src="<?= $image ?>" alt="" /><?php endif; ?>
																	</div>
																</div>
															</div>
															<?php
															$i++;
														endwhile; ?>
													</div>
												</div>
											</div>
									   	<?php else :
											// no rows found
										endif;
									?>	
								</div>
							</section>
							<?php
							if(!wp_script_is('slick-js')) wp_enqueue_script( 'slick-js', get_template_directory_uri().'/slick/slick.min.js', array('jquery'), false, true );
							if(wp_script_is('slick-js')) { 
							?>
								<script type="text/javascript">
								/*jQuery(document).ready(function(){
									jQuery('.examples').slick();
								});*/
								</script>
							<?php } ?>
<!-- GENERAL SLIDER -->
						<?php } elseif( get_row_layout() == 'gen_slider' ) {  ?>
				        	<?php
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection';
				        		} elseif($bg == 'grey') {
				        			$bgclass = 'greysection';
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection';
				        		}
				        	?>
				        	<section class="slider-section" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
				        		<div class="slick slider" data-slick='{"autoplay":false, "autoplaySpeed":4000, "fade":true, "speed":1000, "dots":true}' >
				        			<?php if( have_rows('slider') ):
				        				while ( have_rows('slider') ) : the_row();
				        					$background = get_sub_field('background_image');?>

						        			<div class="gen_slider" style="background: url(<?= $background['sizes']['slide_image']?>); background-size: cover; background-position:<?php the_sub_field('background_position');?>;">
						        				<div class="w-container">
						        					<!-- <div class="centered"> -->
						        					<div class="slider-content">
						        						<?php if(get_sub_field('slider_title')):?>	
								        					<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
								        						<?php the_sub_field('slider_title')?>
								        					<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
							        					<?php endif;?>
							        					<h2><?php the_sub_field('slider_sub_title')?></h2>
							        					<?php the_sub_field('slider_content')?>
								        				<?php if(get_sub_field('link_to_page_section') == 'Yes'):?>
									        				<a class="anchor" href="#<?php the_sub_field('section') ;?>">
									        					<i class="fa fa-chevron-down" aria-hidden="true"></i>
									        				</a>
								        				<?php endif;?>
								        				<?php if(get_sub_field('link_to_page_section') == 'No'):?>
								        					<a class="slide_link" href="<?php the_sub_field('slide_link')?>">
								        						<?php the_sub_field('slide_link_text');?>
								        					</a>
								        				<?php endif;?>
							        				</div>
						        				</div>
						        				<!-- </div> -->
						        			</div>

				        				<?php endwhile;
										else :
									endif;
									?>
				        		</div>
							</section>
							<?php
							if(!wp_script_is('slick-js')) wp_enqueue_script( 'slick-js', get_template_directory_uri().'/slick/slick.min.js', array('jquery'), false, true );
							if(wp_script_is('slick-js')) { 
							?>
								<script type="text/javascript">
								/*jQuery(document).ready(function(){
									jQuery('.examples').slick();
								});*/
								</script>
							<?php } ?>

<!-- PRICE LIST-->				
						<?php } elseif( get_row_layout() == 'price_list' ) {  
							$bg = get_sub_field('background');
				       		if($bg == 'white') {
				       			$bgclass = 'whitesection';
				       		} elseif($bg == 'grey') {
				       			$bgclass = 'greysection';
				       		}elseif($bg == 'color') {
				       			$bgclass = 'colorsection';
				       		}
					       	?>
							<section id="prices" class="<?= $bgclass; ?> listsection" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
									<div class="w-row">
										<div class="w-col">
											<div class="centered">
												<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
													<?php the_sub_field('section_title');?>
													<span class="subheading">
														<?php the_sub_field('sub_title');?>
													</span>
												<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
											</div>
										</div>
									</div>
									<div class="w-row">
										<div class="w-col">
											<div class="matrixwrapper">
												<div class="matrix">
													<table>
														<tr>
															<?php
															if( have_rows('package_titles') ):
															while ( have_rows('package_titles') ) : the_row(); ?>
																<th class="headcol empty">
																Packages
																</th>
																<?php if(get_sub_field('pkg_1')):?>
															        <th class="red">
															       		<?php the_sub_field('pkg_1');?>
															       	</th>
														       	<?php endif;?>
														       	<?php if(get_sub_field('pkg_2')):?>
															        <th class="purple">
															        	<?php the_sub_field('pkg_2');?>
															        </th>
															    <?php endif;?>
													        	<?php if(get_sub_field('pkg_3')):?>
														        	<th class="green">
														        		<?php the_sub_field('pkg_3');?>
														        	</th>
													    		<?php endif;?>
														    <?php endwhile;
																else :
																endif;
																?>
														</tr>											
														<?php
															if( have_rows('table_horizontal_column') ):
																$i = 1;
																?>
														<?php while ( have_rows('table_horizontal_column') ) : the_row(); 
															$strCol1 = get_sub_field('column_1');
															$strCol2 = get_sub_field('column_2');
															$strCol3 = get_sub_field('column_3');

														?>
													    <tr <?php if(empty($strCol1) && empty($strCol2) && empty($strCol3)): ?>class="headrow"<?php endif; ?>>
													        <td class="headcol">
													        	<?php the_sub_field('row_title');?>
													        </td>
													        <?php if(!empty($strCol1)):?>
														        <td class="red">
														        	<?php 
														        	$strCol1 = get_sub_field('column_1');
														        	switch($strCol1){
														        		case 'tick':
														        			?>
														        			<i class="fa fa-check" aria-hidden="true"></i>
														        			<?php
														        		break;
														        		case 'cross':
														        			?>
														        			<i class="fa fa-times" aria-hidden="true"></i>
														        			<?php
														        		break;
														        		default:
														        			echo $strCol1;										  
														        		break;										        		
														        	}?>
														        </td>
													        <?php else: ?>
													        	<td>&nbsp;</td>
													        <?php endif; ?>
													        <?php if(!empty($strCol2)):?>
														        <td class="purple">
														        	<?php 
														        	$strCol2 = get_sub_field('column_2');
														        	switch($strCol2){
														        		case 'tick':
														        			?>
														        			<i class="fa fa-check" aria-hidden="true"></i>
														        			<?php
														        		break;
														        		case 'cross':
														        			?>
														        			<i class="fa fa-times" aria-hidden="true"></i>
														        			<?php
														        		break;
														        		default:
														        			echo $strCol2;										  
														        		break;										        		
														        	}?>
														        </td>
													        <?php else: ?>
													        	<td>&nbsp;</td>														        
													        <?php endif;?>
													        <?php if(!empty($strCol3)): ?>
														        <td class="green">
														        	<?php 
														        	$strCol3 = get_sub_field('column_3');
														        	switch($strCol3){
														        		case 'tick':
														        			?>
														        			<i class="fa fa-check" aria-hidden="true"></i>
														        			<?php
														        		break;
														        		case 'cross':
														        			?>
														        			<i class="fa fa-times" aria-hidden="true"></i>
														        			<?php
														        		break;
														        		default:
														        			echo $strCol3;										  
														        		break;										        		
														        	}?>
														        </td>
													        <?php else: ?>
													        	<td>&nbsp;</td>														        
													    	<?php endif;?>
													    </tr>
														<?php
														$i++;
														endwhile; ?>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div class="w-row">
										<div class="w-col w-col-12">
											<div class="extra-text">
												<?php the_sub_field('extra_text')?>
											</div>
										</div>
									</div>
									   	<?php else :
											// no rows found
										endif;
										?>	
								</div>
							</section>
						<?php 
			 			}
			 			$intRow ++;
			 			$intSequence = $intSequence + 10;
		    		endwhile;
				else:
				endif;?>
			</article><!-- #post-## -->
		<?php endwhile; // End of the loop. ?>
	</div><!-- #primary -->
<?php get_footer(); ?>