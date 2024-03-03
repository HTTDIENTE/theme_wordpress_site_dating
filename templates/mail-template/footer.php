<?php echo '</td></tr></tbody>'; ?>

<tfoot>
<tr>
	<td colspan="2" style="background: #f1f0f1; padding: 13px 30px 12px;text-align: center;">
		<a href="/" style="display: inline-block;">
			<img src="<?php echo get_stylesheet_directory_uri() . '/images/logo.png'; ?>"
				 alt="Logo: <?php esc_attr( get_option( 'blogname' ) ); ?>"
				 width="152"
				 height="35"
				 style="display: block"
			>
		</a>
	</td>
</tr>
</tfoot>

<?php echo '</table></main>'; ?>
