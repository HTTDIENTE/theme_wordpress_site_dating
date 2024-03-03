<?php
echo '<main class="main" id="page-main">';
echo '<table style="width: 100%; max-width:1040px; border-collapse: collapse; margin: 0 auto">';
?>

<thead>
<tr style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/emails-templates.jpg) center / 100% 100% no-repeat">
	<td style="padding: 13px 30px 12px;">
		<a href="<?php echo get_home_url(); ?>" style="margin-right: 20px;">
			<img
				src="<?php echo get_stylesheet_directory_uri() . '/images/logo.png'; ?>"
				alt="Logo: <?php esc_attr( get_option( 'blogname' ) ); ?>"
				width="152"
				height="35"
				style="max-width: 100%; display: block;"
			>
		</a>
	</td>
	<td style="padding: 13px 30px 12px;text-align: right;">
		<span
			style="width: 115px; font-weight: 400; font-size: 10px; line-height: 14px; color: #878787;text-align: left;">
			Your place for<br>Christian dating.
		</span>
	</td>
</tr>
</thead>
<tbody>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

	* {
		font-family: 'Poppins', sans-serif;
		color: #363636;
		margin-top: 0;
	}

	h1 {
		font-size: 32px;
		line-height: 32px;
		margin-bottom: 20px;
	}

	h2 {
		font-size: 24px;
		line-height: 28px;
		margin-bottom: 15px;
	}

	h3 {
		font-size: 20px;
		line-height: 24px;
		margin-bottom: 10px;
	}

	p {
		font-size: 16px;
		line-height: 22px;
		margin-bottom: 10px;
	}

	p:last-child {
		margin-bottom: 0;
	}
</style>

<?php echo '<tr><td style="padding: 15px" colspan="2">'; ?>
