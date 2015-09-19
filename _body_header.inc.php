<?php
/**
 * This is the BODY header include template.
 *
 * For a quick explanation of b2evo 2.0 skins, please start here:
 * {@link http://manual.b2evolution.net/Skins_2.0}
 *
 * This is meant to be included in a page template.
 *
 * @package evoskins
 * @subpackage b2eviant
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

?>
<div id="header">
<div class="top_menu">    <ul> <li>   <img src="img/top_menu-left.jpg" class="ltm" alt="topmenuleftbottomcorner" /></li>



</ul>


<ul>
	<?php
		// ------------------------- "Menu" CONTAINER EMBEDDED HERE --------------------------
		// Display container and contents:
		// Note: this container is designed to be a single <ul> list
		skin_container( NT_('Menu'), array(
				// The following params will be used as defaults for widgets included in this container:
				'block_start'         => '',
				'block_end'           => '',
				'block_display_title' => false,
				'list_start'          => '<li>',
				'list_end'            => '&nbsp;|</li>',
				'item_start'          => '',
				'item_end'            => '',
				
			) );
		// ----------------------------- END OF "Menu" CONTAINER -----------------------------
	?>   </ul>
</div><!-- end of top_menu-->
<ul><li><img src="img/top_menu-right.jpg" class="rtm" alt="topmenurbottomcorner" /></li> </ul>
<div class="pageHeader">    

            <div class="shadow">   <h1>				
<?php
 $short_btitle = $Blog->dget( 'name' ); 
 echo $short_btitle;
 ?></h1> &nbsp;</div>
 
	<?php
		// ------------------------- "Header" CONTAINER EMBEDDED HERE --------------------------
		// Display container and contents:
		skin_container( NT_('Header'), array(
				// The following params will be used as defaults for widgets included in this container:
				'block_start'       => '<div class="$wi_class$">',
				'block_end'         => '</div>',
				'block_title_start' => '<h1>',
				'block_title_end'   => '</h1>',
			) );
		// ----------------------------- END OF "Header" CONTAINER -----------------------------
	?>      
    <div class="search_box">
     	  <?php 
	  skin_widget( array(
		// CODE for the widget:
		'widget' => 'coll_search_form',
		// Optional display params
		'block_start' => '',
		'block_end' => '',
		'block_display_title' => false,
		'disp_search_options' => 0,
		'search_class' => 'extended_search_form',
		'use_search_disp' => 0,
	) );
	?></div>
</div> <!-- end of pageheader-->

