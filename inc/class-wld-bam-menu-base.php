<?php

class WLD_BAM_Menu_Base {
	public static function init(): void {
		add_filter(
			'wp_nav_menu_args',
			array( static::class, 'args' )
		);
		add_filter(
			'nav_menu_submenu_css_class',
			array( static::class, 'sub_menu_class' ),
			10,
			3
		);
		add_filter(
			'nav_menu_css_class',
			array( static::class, 'item_class' ),
			10,
			4
		);
		add_filter(
			'nav_menu_link_attributes',
			array( static::class, 'link_class' ),
			10,
			4
		);
		add_filter(
			'nav_menu_item_id',
			array( static::class, 'item_id' ),
			10,
			3
		);
		add_filter(
			'wp_nav_menu_objects',
			array( static::class, 'add_has_children' ),
			10,
			2
		);
	}

	public static function args( array $args ): array {
		if ( isset( $args['bam_block_name'] ) ) {
			if ( 'menu' === $args['menu_class'] ) {
				$args['menu_class'] = '';
			}

			$args['container_class'] = trim( $args['bam_block_name'] . ' ' . $args['container_class'] );
			$args['menu_class']      = trim( $args['bam_block_name'] . '__items  ' . $args['menu_class'] );
		}

		return $args;
	}

	public static function sub_menu_class( array $classes, stdClass $args, int $depth ): array {
		if ( static::check( $args ) ) {
			$sub_menu = array_search( 'sub-menu', $classes, true );
			if ( false !== $sub_menu ) {
				unset( $classes[ $sub_menu ] );
			}

			$classes[] = $args->bam_block_name . '__sub-items';
			$classes[] = $args->bam_block_name . '__sub-items_level_' . ( ++ $depth );
		}

		return $classes;
	}

	/** @noinspection PhpUndefinedFieldInspection */
	public static function item_class( array $classes, WP_Post $menu_item, stdClass $args, int $depth ): array {
		if ( static::check( $args ) ) {
			$bam_classes = array();
			$active      = array( 'current_page_item', 'current-menu-item' );
			$ancestor    = array( 'current-menu-ancestor', 'current-menu-parent', 'current_page_parent' );
			$is_current  = false;
			$is_ancestor = false;

			foreach ( $classes as $i => $class ) {
				if ( 'page_item' === $class || str_starts_with( $class, 'page-item' ) || str_starts_with( $class,
						'menu-item' ) ) {
					unset( $classes[ $i ] );
				} elseif ( in_array( $class, $active, true ) ) {
					$is_current = true;
					unset( $classes[ $i ] );
				} elseif ( in_array( $class, $ancestor, true ) ) {
					$is_ancestor = true;
					unset( $classes[ $i ] );
				}
			}
			if ( $menu_item->current ) {
				$is_current = true;
			} elseif ( $menu_item->current_item_ancestor || $menu_item->current_item_parent ) {
				$is_ancestor = true;
			}

			$bam_classes[] = $args->bam_block_name . '__item';
			$bam_classes[] = $args->bam_block_name . '__item_level_' . ( ++ $depth );

			if ( $is_current ) {
				$bam_classes[] = $args->bam_block_name . '__item_current';
			}

			if ( $is_ancestor ) {
				$bam_classes[] = $args->bam_block_name . '__item_ancestor';
			}

			if ( $menu_item->has_children ) {
				$bam_classes[] = $args->bam_block_name . '__item_has-sub-items';
			}

			foreach ( $classes as $i => $class ) {
				if ( preg_match_all( '/\b(?=\w)_\w+/m', $class, $matches, PREG_SET_ORDER ) ) {
					foreach ( $matches as $match ) {
						$classes[ $i ] = $args->bam_block_name . '__link' . $match[0];
					}
				} else {
					$classes[ $i ] = $class;
				}
			}

			$classes = array_merge( $bam_classes, $classes );
		}

		return $classes;
	}

	/** @noinspection PhpUndefinedFieldInspection */
	public static function link_class( array $atts, WP_Post $menu_item, stdClass $args, int $depth ): array {
		if ( static::check( $args ) ) {
			if ( ! isset( $atts['class'] ) ) {
				$atts['class'] = '';
			}

			$atts['class'] .= ' ' . $args->bam_block_name . '__link';
			$atts['class'] .= ' ' . $args->bam_block_name . '__link_level_' . ( ++ $depth );

			$is_current  = false;
			$is_ancestor = false;
			if ( $menu_item->current ) {
				$is_current = true;
			} elseif ( $menu_item->current_item_ancestor || $menu_item->current_item_parent ) {
				$is_ancestor = true;
			}

			if ( $is_current ) {
				$atts['class'] .= ' ' . $args->bam_block_name . '__link_current';
			}

			if ( $is_ancestor ) {
				$atts['class'] .= ' ' . $args->bam_block_name . '__link_ancestor';
			}

			if ( $menu_item->has_children ) {
				$atts['class'] .= ' ' . $args->bam_block_name . '__link_has-sub-items';
			}

			$classes = get_post_meta( $menu_item->ID, '_menu_item_classes', true );
			if ( $classes ) {
				foreach ( $classes as $class ) {
					if ( preg_match_all( '/\b(?=\w)_\w+/m', $class, $matches, PREG_SET_ORDER ) ) {
						foreach ( $matches as $match ) {
							$atts['class'] .= ' ' . $args->bam_block_name . '__link' . $match[0];
						}
					} else {
						$atts['class'] .= ' ' . $class;
					}
				}
			}

			$atts['class'] = trim( $atts['class'] );
		}

		return $atts;
	}

	public static function item_id( string $id, WP_Post $menu_item, stdClass $args ): string {
		if ( 'menu-item-' . $menu_item->ID === $id && static::check( $args ) ) {
			$id = '';
		}

		return $id;
	}

	public static function add_has_children( array $items, object $args ): array {
		if ( ! empty( $args->bam_block_name ) ) {
			foreach ( $items as $item ) {
				$item->has_children = in_array( 'menu-item-has-children', $item->classes, true );
			}
		}

		return $items;
	}

	protected static function check( $args ): bool {
		return isset( $args->bam_block_name );
	}
}
