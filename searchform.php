<?php
/**
 * Search Form Template 
 */
?>
<form method="get" class="form-search" action="<?php echo home_url( '/' ); ?>">
	<div class="row">
		<div class="col-lg-12">
			<div class="input-group">
				<input type="text" class="form-control search-query" name="s" placeholder="<?php esc_attr_e('search here &hellip;', 'WPBoot3'); ?>" />
				<span class="input-group-btn">
					<button type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'WPBoot3'); ?>"><?php _e('Search', 'WPBoot3'); ?></button>
				</span>
			</div>
		</div>
	</div>
</form>