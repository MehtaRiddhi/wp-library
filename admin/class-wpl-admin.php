<?php

class wpl_admin_class {

	/**
	 * Initializes WordPress hooks
	 *
	 * Author: Riddhi Mehta
	 * Since: 1.0.0
	 */
	function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'wpl_mata_box' ) );
		add_action( 'save_post',      array( $this, 'save_posttitle' ) );
	}	


	/**
	 * function for custom mata box to the custom posttype
	 * @author Riddhi
	 * @since 1.0.0
	 * @param array screens
	 * 
	 */
	public function wpl_mata_box() {

		$screens = array( 'product' );
		foreach ( $screens as $screen ) {
			add_meta_box( "wpl-library", esc_html_e( 'Custom Mata Box', 'wp-library' ), "custommatabox", $screen, "side", "low" );
		}

		/**
		 * function for custom mata box seetings HTML
		 * 
		 * @since 1.0.0
		 * 
		 */
		function custommatabox() {

			global $post;
			ob_start();
			$get_title = get_post_meta( $post->ID, 'text-title', true );
		 	$get_title = !empty($get_title) ? $get_title : '';
			?>
			<table width="100%">
				<?php 
				do_action('wpl_mata_box_html_before',$post);
				?>
				<tr>
					<td><?php esc_html_e( 'Post Title', 'wp-library' ); ?></td>
					<td>
						<input type="text" name="add-title" value="<?php esc_attr($get_title); ?>" style="width:100%;"/>
					</td>
				</tr>
				<?php do_action('wpl_mata_box_html_after',$post);?>

			</table>
	
		<?php
		}

		$out_put = ob_get_clean();

		/**
		 * Filter for Metabox HTML.
		 * 
		 * @param string $out_put
		 * 
		 * @return string $out_put
		 */
		$out_put = apply_filters('wpl_mata_box_html',$out_put, $post);

		echo $out_put;

	}

	/**
	 * function for save custom mata box settings
	 * 
	 * @since 1.0.0
	 * 
	 */
	public function save_posttitle() {
		global $post;

		if ( $post->post_type == 'product' ) {
			$title = $_POST['add-title'];
			update_post_meta( $post->ID, 'text-title', $title );
		}

	}
	
}