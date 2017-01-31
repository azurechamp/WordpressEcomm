<?php 
	$blog_type = (isset($_GET['blog_type']) ? htmlspecialchars($_GET['blog_type']) : ot_get_option('blog_style', 'style1')); 
?>
<aside class="post-meta cf">
	<ul>
		<?php if($blog_type == 'style1') { ?>
		<li><i class="fa fa-user"></i> <?php the_author_posts_link(); ?></li>
		<?php } ?>
		<li><i class="fa fa-calendar"></i> <?php the_time(get_option('date_format')); ?></li>
		<li><?php comments_popup_link('<i class="fa fa-comment"></i> 0 Comments', '<i class="fa fa-comment"></i> 1 Comment', '<i class="fa fa-comment"></i> % Comments', 'postcommentcount', '<i class="fa fa-comment"></i> Comments Disabled'); ?></li>
		<?php if($blog_type == 'style1' && has_category()) { ?>
		<li><i class="fa fa-folder-open"></i> <?php the_category(', '); ?></li>
		<?php } ?>
	</ul>
</aside>