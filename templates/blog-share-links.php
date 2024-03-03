<?php
$url   = rawurlencode( get_the_permalink() );
$title = rawurlencode( get_the_title() );

// todo: Twitter URL
// https://twitter.com/share?text=<?php echo $title; ? >&amp;url=<?php echo $url; ? >
?>
<?php wld_the( 'wld_blog_share_title', 'title' ); ?>
<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>">
	<img src="<?php echo esc_url( get_theme_file_uri( 'images/social-icons/facebook.svg' ) ); ?>" alt="Facebook">
	<span class="text">Facebook</span>
</a>
<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&amp;title=<?php echo $title; ?>">
	<img src="<?php echo esc_url( get_theme_file_uri( 'images/social-icons/linkedin.svg' ) ); ?>" alt="LinkedIn">
	<span class="text">LinkedIn</span>
</a>
