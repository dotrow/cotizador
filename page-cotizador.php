<?php
/*
Template Name: Contact Page
*/
get_header(); ?>
<?php
global $timthumb,$kaya_readmore;
$sidebar_layout=get_post_meta($post->ID,'kaya_pagesidebar',true);
//sidebar class
$aside_class=($sidebar_layout== "leftsidebar" ) ?  'one_third' : 'one_third_last';
$content_class="content_wide";
?>
<div class="content">
<?php
	// Page Title
    echo custom_pagetitle($post->ID);
?>
   <?php $kaya_google_map = get_option('kaya_google_map') ;
   if($kaya_google_map){
    echo '<div id="google_code">';
	echo $kaya_google_map;
	echo '</div>';
 }

	?>
<div class="<?php echo $content_class; ?>">

<!--Start Middle Section  -->
	<div <?php echo page_layout($post->ID); ?>>


    	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
        	<?php the_content(); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'Globex' ), 'after' => '</div>' ) ); ?>
            <?php edit_post_link( __( 'Edit', 'Globex' ), '<span class="edit-link">', '</span>' ); ?>
        </div>
                <!-- .entry-content -->
	</div>
            <!-- #post-## -->
    <?php endwhile; ?>
	   <form method="post" action="sendEmail.php" name="contact-form" id="contact-form">
            <div id="main">
            <div id="response" /></div>
            <div class="one_third">
            <label for="name">Nombre:</label>
             <p><input type="text" name="name" id="name" size="23" /></p>
            </div>


            <div class="one_third">
            <label for="email">Correo:</label>
             <p><input type="text" name="email" id="email" size="23" /></p>
            </div>

            <div class="one_third_last">
            <label for="web">Asunto:</label>
             <p><select name="subject" id="subject">
<option>Diseño Web</option>
<option>Desarrollo para iOS</option>
<option>Desarrollo para Android</option>
<option>Desarrollo para Windows 8</option>
<option>Desarrollo para Linux</option>
<option>Desarrollo para Mac</option>
<option>Desarrollo de Portales Web</option>
<option>Cloud Computing (Amazon, Google, Azure)</option>
</select></p>
            </div>

            <label class="message" for="message">Detalles:</label>
             <p><textarea name="message" id="message" cols="30" rows="10"></textarea></p>

            <p><input  class="contact_button button" type="submit" name="submit" id="submit" value="Enviar!" /></p>
            </div>
		</form>
    </div>
<!--StartSidebar Section -->
<?php if($sidebar_layout !="full") { ?>
<div class="<?php echo $aside_class;?>">
    <?php get_sidebar();?>
</div>
<div class="clear"></div>
<?php } ?>

<div class="clear"></div>
</div>

    <!--End content Section -->
<?php get_footer(); ?>
