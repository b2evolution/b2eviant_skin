<?php
/**
 * This is the sidebar include template.
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

?><div id="singlebarwrapper">
<div class="singlebar">

<ul>
<li>
	<span class="lpostdate">			<?php
					$Item->issue_time( array(
							'before'      => /* TRANS: date */ T_('<acronym title="Publish date">D:&nbsp;</acronym>'),
							'time_format' => 'd/M/y',
						) );
				?>
</span></li>
<li>	<span class="lcats">				<?php
					$Item->categories( array(
						'before'          => ' '.T_('<acronym title="Categories">C:</acronym>').' ',
						'after'           => '',
						'include_main'    => true,
						'include_other'   => false,
						'include_external'=> false,
						'link_categories' => true,
					) );
				?></span></li>
                
<li>	<span class="lfeedlink">				<?php
				// Link to comments, trackbacks, etc.:
				$Item->feedback_link( array(
						'type' => 'feedbacks',
						'link_before' => '<acronym title="Feedbacks/Comments">F:&nbsp;&nbsp;</acronym>',
						'link_after' => '',
						'link_text_zero' => 'Make comment',
						'link_text_one' => '#',
						'link_text_more' => '#',
						'link_title' => '#',
						'use_popup' => false,
					) );
			?></span></li>			
			
			
	<li>	<span class="lauthor">			<?php
      	$Item->author( array(
					'before'       => T_('<acronym title="Author / posted by">A:&nbsp;</acronym>').' ',
					'after'        => ' ',
				) );
				$Item->msgform_link();
			?>      </span>   </li>   

  	<li>	<span class="lwords">         <?php  
	echo '<acronym title="Word count">W:&nbsp;</acronym>'.T_('');
		$Item->wordcount();
	
					echo ' '.T_('words');

 ?> </span></li>
                     
   	<li>	<span class="lviews">        		  <?php 
					echo '<acronym title="View count">V:&nbsp;</acronym>'.T_('');
					 $Item->views(); ?> </span></li>
			
	     

           	  	<li>	<span class="ltags">	<?php	// List all tags attached to this post:
					$Item->tags( array(
							'before' =>         ' '.T_('<acronym title="Tags">T:&nbsp;</acronym>').'',
							'after' =>          '',
							'separator' =>      ', ',
						) );
				?></span></li>          
                  
                  
                           <li>   <span class="llocale">                    <?php
                    				$Item->locale_flag ( array(
						'before'    => '',
						'after'     => '<acronym title="Locale / language">L:&nbsp;</acronym>',
					) );
					$Item->locale();
			?> </span></li>
                    
          <li>   <span class="lfeedpost">          	<?php	// Display link for comments feed:
	$Item->feedback_feed_link(	'_rss2', '', '' );?></span></li>
    
    

                 
    		
	  	<li>	<span class="ledit">		<?php
				$Item->edit_link( array( // Link to backoffice for editing
						'before'    => '<img src="img/edit.gif" alt="editicon" />',
						'after'     => '',
					) );			?></span></li>

                    
</ul>
</div>
</div>