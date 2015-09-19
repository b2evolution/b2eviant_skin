<?php
/**
 * This is the main/default page template.
 *
 * For a quick explanation of b2evo 2.0 skins, please start here:
 * {@link http://manual.b2evolution.net/Skins_2.0}
 *
 * The main page template is used to display the blog when no specific page template is available
 * to handle the request (based on $disp).
 *
 * @package evoskins
 * @subpackage b2eviant
 *
 * @version $Id: single.main.php,v 1.10.2.1 2008/04/26 22:28:54 fplanque Exp $
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

if( version_compare( $app_version, '2.4.1' ) < 0 )
{ // Older 2.x skins work on newer 2.x b2evo versions, but newer 2.x skins may not work on older 2.x b2evo versions.
	die( 'This skin is designed for b2evolution 2.4.1 and above. Please <a href="http://b2evolution.net/downloads/index.html">upgrade your b2evolution</a>.' );
}

// This is the main template; it may be used to display very different things.
// Do inits depending on current $disp:
skin_init( $disp );

// -------------------------- HTML HEADER INCLUDED HERE --------------------------
skin_include( '_html_header.inc.php' );
// Note: You can customize the default HTML header by copying the generic
// /skins/_html_header.inc.php file into the current skin folder.
// -------------------------------- END OF HEADER --------------------------------

// ---------------------------- SITE HEADER INCLUDED HERE ----------------------------
// If site headers are enabled, they will be included here:
siteskin_include( '_site_body_header.inc.php' );
// ------------------------------- END OF SITE HEADER --------------------------------
?>


<?php
// ------------------------- BODY HEADER INCLUDED HERE --------------------------
skin_include( '_body_header.inc.php' );
// Note: You can customize the default BODY header by copying the generic
// /skins/_body_footer.inc.php file into the current skin folder.
// ------------------------------- END OF FOOTER --------------------------------
?>
<div id="swrapper">
<div class="sbloglist">
       <img src="img/bloglist-top-left-corner.gif" class="tl" alt="tlc" />

   
   		<span class="blog_logo"><img src="img/your_logo.gif" alt="logo" /></span><div class="singletitle">
		<div class="titel"><h2><?php $Item->title(); ?></h2></div>
    	<span class="author"><?php $Item->author( array(
						'before'    => 'by'.T_('&nbsp;~').' <strong>',
						'after'     => '</strong>',
					) ); ?></span></div>
    	
		
		<span class="cats">
		<?php
					$Item->categories( array(
						'before'          => ''.T_('Categories&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;').' ',
						'after'           => '',
						'include_main'    => true,
						'include_other'   => true,
						'include_external'=> true,
						'link_categories' => true,
						'separator' =>      '&nbsp;>&nbsp;',
					) );
				?></span>


</div><!-- end of bloglist-->
</div><!-- end of swrapper-->
</div><!-- end of header-->

<div id="wrapper">

<div id="s_inner_wrapper">


<?php
// -------------------------- sidebar INCLUDED HERE --------------------------
skin_include( 'singlebar.php' );
// Note: You can customize the default HTML header by copying the generic
// /skins/_html_header.inc.php file into the current skin folder.
// -------------------------------- END OF HEADER --------------------------------
?>
<div id="s_contentwrap">
<div class="s_Content">
<?php
	// ------------------------- MESSAGES GENERATED FROM ACTIONS -------------------------
	messages( array(
			'block_start' => '<div class="action_messages">',
			'block_end'   => '</div>',
		) );
	// --------------------------------- END OF MESSAGES ---------------------------------
?>


<?php
	// ------------------- PREV/NEXT POST LINKS (SINGLE POST MODE) -------------------
	item_prevnext_links( array(
			'block_start' => '<table class="prevnext_post"><tr>',
			'prev_start'  => '<td>',
			'prev_end'    => '</td>',
			'next_start'  => '<td class="right">',
			'next_end'    => '</td>',
			'block_end'   => '</tr></table>',
		) );
	// ------------------------- END OF PREV/NEXT POST LINKS -------------------------
?>


<?php
// Display message if no post:
display_if_empty();

while( $Item = & mainlist_get_item() )
{	// For each blog post, do everything below up to the closing curly brace "}"
	?>

	<?php
		$Item->locale_temp_switch(); // Temporarily switch to post locale (useful for multilingual blogs)
	?>

	<div id="<?php $Item->anchor_id() ?>" class="post post<?php $Item->status_raw() ?>" lang="<?php $Item->lang() ?>">


		<?php
			// ---------------------- POST CONTENT INCLUDED HERE ----------------------
			skin_include( '_item_content.inc.php', array(
					'image_size'	=>	'fit-400x320',
				) );
			// Note: You can customize the default item feedback by copying the generic
			// /skins/_item_feedback.inc.php file into the current skin folder.
			// -------------------------- END OF POST CONTENT -------------------------
		?>

		<p class="postmetadata alt">
			<small>
				<?php
					$Item->issue_time( array(
							'before'      => /* TRANS: date */ T_('This entry was posted on '),
							'time_format' => 'F jS, Y',
						) );
				?>
				<?php
					$Item->issue_time( array(
							'before'      => /* TRANS: time */ T_('at '),
						) );
				?>
				<?php
					$Item->categories( array(
						'before'          => ' '.T_('and is filed under').' ',
						'after'           => '.',
						'include_main'    => true,
						'include_other'   => true,
						'include_external'=> true,
						'link_categories' => true,
					) );
				?>

				<?php
					// List all tags attached to this post:
					$Item->tags( array(
							'before' =>         ' '.T_('Tags').': ',
							'after' =>          ' ',
							'separator' =>      ', ',
						) );
				?>

				<!-- You can follow any responses to this entry through the RSS feed. -->
				<?php
					$Item->edit_link( array( // Link to backoffice for editing
							'before'    => '',
							'after'     => '',
						) );
				?>
                
                				<?php
					$Item->issue_time( array(
							'before'      => /* TRANS: time */ T_('at '),
						) );
				?>
			</small>
		</p>

	</div>


	<?php
		// ------------------ FEEDBACK (COMMENTS/TRACKBACKS) INCLUDED HERE ------------------
		skin_include( '_item_feedback.inc.php', array(
				'before_section_title' => '<h3>',
				'after_section_title'  => '</h3>',
			) );
		// Note: You can customize the default item feedback by copying the generic
		// /skins/_item_feedback.inc.php file into the current skin folder.
		// ---------------------- END OF FEEDBACK (COMMENTS/TRACKBACKS) ---------------------
	?>

	<?php
	locale_restore_previous();	// Restore previous locale (Blog locale)
}
?>
</div>
</div>

</div>

<div class="corners"><div class="singlebottomleft">&nbsp;</div></div>

<?php
// ------------------------- BODY FOOTER INCLUDED HERE --------------------------
skin_include( '_body_footer.inc.php' );
// Note: You can customize the default BODY footer by copying the
// _body_footer.inc.php file into the current skin folder.
// ------------------------------- END OF FOOTER --------------------------------
?>
</div>

<?php
// ------------------------- HTML FOOTER INCLUDED HERE --------------------------
skin_include( '_html_footer.inc.php' );
// Note: You can customize the default HTML footer by copying the
// _html_footer.inc.php file into the current skin folder.
// ------------------------------- END OF FOOTER --------------------------------
?>
