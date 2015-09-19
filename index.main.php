<?php
/**
 * This is the main/default page template for the "custom" skin.
 *
 * This skin only uses one single template which includes most of its features.
 * It will also rely on default includes for specific dispays (like the comment form).
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
 * @version $Id: index.main.php,v 1.11.2.2 2008/04/26 22:28:53 fplanque Exp $
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
// -------------------------- HTML HEADER INCLUDED HERE --------------------------
skin_include( '_body_header.inc.php' );
// Note: You can customize the default HTML header by copying the generic
// /skins/_html_header.inc.php file into the current skin folder.
// -------------------------------- END OF HEADER --------------------------------
?>

<div id="bwrapper">
<div class="bloglist">
<?php
 $Blog->dget( 'name' ); ?>
	<?php
		// ------------------------- "Page Top" CONTAINER EMBEDDED HERE --------------------------
		// Display container and contents:
		skin_container( NT_('Page Top'), array(
				// The following params will be used as defaults for widgets included in this container:
				'block_start'         => '<div class="$wi_class$">',
				'block_end'           => '</div>',
				'block_display_title' => false,
				'list_start'          => '<ul>',
				'list_end'            => '</ul>',
				'item_start'          => '<li>',
				'item_end'            => '</li>',
			) );
		// ----------------------------- END OF "Page Top" CONTAINER -----------------------------
	?>

 <img src="img/bloglist-top-left-corner.gif" class="tl" alt="tlc" />

</div><!-- end of bloglist-->
</div><!-- end of b(loglist)wrapper-->
</div> <!--end of header-->

<div id="wrapper">

<div id="inner_wrapper">

<?php
// -------------------------- sidebar INCLUDED HERE --------------------------
skin_include( '_sidebar.inc.php' );
// Note: You can customize the default HTML header by copying the generic
// /skins/_html_header.inc.php file into the current skin folder.
// -------------------------------- END OF HEADER --------------------------------
?>
<!-- =================================== START OF MAIN AREA =================================== -->
<div id="contentwrap">
<div class="Content">

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
		// ------------------------ TITLE FOR THE CURRENT REQUEST ------------------------
		request_title( array(
				'title_before'=> '<h2>',
				'title_after' => '</h2>',
				'title_none'  => '',
				'glue'        => ' - ',
				'title_single_disp' => true,
				'format'      => 'htmlbody',
			) );
		// ----------------------------- END OF REQUEST TITLE ----------------------------
	?>




	<?php
		// --------------------------------- START OF POSTS -------------------------------------
		// Display message if no post:
		display_if_empty();

		while( $Item = & mainlist_get_item() )
		{	// For each blog post, do everything below up to the closing curly brace "}"
		?>



		<div id="<?php $Item->anchor_id() ?>" class="Post Post<?php $Item->status_raw() ?>" lang="<?php $Item->lang() ?>">

			<?php
				$Item->locale_temp_switch(); // Temporarily switch to post locale (useful for multilingual blogs)
			?>



			<h2 class="bTitle"><?php $Item->title(); ?></h2>

			<?php
				// ---------------------- POST CONTENT INCLUDED HERE ----------------------
				skin_include( '_item_content.inc.php', array(
						'image_size'	=>	'fit-400x320',
					) );
				// Note: You can customize the default item feedback by copying the generic
				// /skins/_item_feedback.inc.php file into the current skin folder.
				// -------------------------- END OF POST CONTENT -------------------------
			?>
<div class="postinfo"> <ul>

		<li>		<?php
					// Link to comments, trackbacks, etc.:
					$Item->feedback_link( array(
									'type' => 'comments',
									'link_before' => '<img src="img/comment.gif" alt="comment" align="left" />&nbsp;',
									'link_after' => '',
									'link_text_zero' => '#',
									'link_text_one' => '#',
									'link_text_more' => '#',
									'link_title' => '#',
									'use_popup' => false,
								) );

					// Link to comments, trackbacks, etc.:
					$Item->feedback_link( array(
									'type' => 'trackbacks',
									'link_before' => '&nbsp;',
									'link_after' => '',
									'link_text_zero' => '#',
									'link_text_one' => '#',
									'link_text_more' => '#',
									'link_title' => '#',
									'use_popup' => false,
								) );	?></li>

			<li><?php
				// List all tags attached to this post:
				$Item->tags( array(
						'before' =>         '<img src="img/tag.gif" alt="tag" align="left" />'.T_('Tags').': ',
						'after' =>          '',
						'separator' =>      ', ',
					) );
			?></li>


			<li><?php
				$Item->categories( array(
					'before'          => '<img src="img/cats.gif" alt="categories" align="left" />'.T_('Categories').': ',
					'after'           => ' ',
					'include_main'    => true,
					'include_other'   => true,
					'include_external'=> true,
					'link_categories' => true,
				) );
			?></li>


		
        			<li><?php
				// Permalink:
				$Item->permanent_link( array(
						'text' => '#icon#',
					) );

				$Item->issue_time( array(
						'before'    => ' ',
						'after'     => '',
					));

				$Item->author( array(
						'before'    => ', '.T_('by').' <strong>',
						'after'     => '</strong>',
					) );

				$Item->msgform_link();

			?></li>
        
        <li>		<?php
					$Item->edit_link( array( // Link to backoffice for editing
							'before'    => '',
							'after'     => '',
						) );
				?></li></ul>
</div>

			<?php
				// ------------------ FEEDBACK (COMMENTS/TRACKBACKS) INCLUDED HERE ------------------
				skin_include( '_item_feedback.inc.php', array(
						'before_section_title' => '<h4>',
						'after_section_title'  => '</h4>',
					) );
				// Note: You can customize the default item feedback by copying the generic
				// /skins/_item_feedback.inc.php file into the current skin folder.
				// ---------------------- END OF FEEDBACK (COMMENTS/TRACKBACKS) ---------------------
			?>

			<?php
				locale_restore_previous();	// Restore previous locale (Blog locale)
			?>
		</div>
		<?php
		} // ---------------------------------- END OF POSTS ------------------------------------
	?>

	<?php
		// -------------------- PREV/NEXT PAGE LINKS (POST LIST MODE) --------------------
		mainlist_page_links( array(
				'block_start' => '<p class="center"><strong>',
				'block_end' => '</strong></p>',
   			'prev_text' => '&lt;&lt;',
   			'next_text' => '&gt;&gt;',
			) );
		// ------------------------- END OF PREV/NEXT PAGE LINKS -------------------------
	?>


	<?php
		// -------------- MAIN CONTENT TEMPLATE INCLUDED HERE (Based on $disp) --------------
		skin_include( '$disp$', array(
				'disp_posts'  => '',		// We already handled this case above
				'disp_single' => '',		// We already handled this case above
				'disp_page'   => '',		// We already handled this case above
			) );
		// Note: you can customize any of the sub templates included here by
		// copying the matching php file into your skin directory.
		// ------------------------- END OF MAIN CONTENT TEMPLATE ---------------------------
	?>

</div>



</div><!-- end of inner wrapper-->
</div><!-- end of wrapper-->
<div class="corners"><div class="sidebarleftcorner">&nbsp;</div></div>

<?php
// ------------------------- HTML FOOTER INCLUDED HERE --------------------------
skin_include( '_body_footer.inc.php' );
// Note: You can customize the default HTML footer by copying the
// _html_footer.inc.php file into the current skin folder.
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