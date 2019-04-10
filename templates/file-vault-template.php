<?php
/*
 * Template Name: File Vault
 */
	$userId = get_current_user_id();
	$userGroup = get_field('group_access', 'user_' . $userId);
	get_header();
?>

<div id="<?php echo $pluginSlug; ?>" class="x-container max width">
	<?php
		// logged out
		if (!is_user_logged_in()) {
			echo '<strong>You must be logged in to access the files.</strong>';
			wp_login_form();
		}
		// logged in
		else { ?>
			<a href="<?php echo wp_logout_url(get_permalink()); ?>" class="<?php echo $pluginSlug; ?>-logout">Logout</a>

			<div class="<?php echo $pluginSlug; ?>-container">
				<?php
				/*
				 * COMMON FILES (_common)
				 */
				if( have_rows('common_files', 'option') ):
					while( have_rows('common_files', 'option') ): the_row();
						$file = get_sub_field('file');
						$name = get_sub_field('name');
						$desc = get_sub_field('common_file_description');
					?>
						<div class="<?php echo $pluginSlug; ?>-file-card">
							<?php if($file): ?>
								<?php if( $name ): ?>
									<div>
										<img src="<?php echo plugins_url( '/../images/download-icon.svg',  __FILE__ ) ?>" class="download-icon" alt="download icon" />
										<h5 class="<?php echo $pluginSlug; ?>-file-card-title"><?php echo $name; ?></h5>
									</div>

									<p class="<?php echo $pluginSlug; ?>-file-card-desc"><?php echo $desc; ?></p>
								<?php endif; ?>
								<a href="<?php echo $file['url']; ?>" class="<?php echo $pluginSlug; ?>-file-card-download-button" download>Download</a>
							<?php endif; ?>
						</div>
					<?php endwhile;
				else: ?>
					<p>No common files found.</p>
				<?php endif;



				/*
				 * Group-SPECIFIC FILES
				 */
				if( have_rows('group_specific_files', 'option') ):
					while( have_rows('group_specific_files', 'option') ): the_row();
					  $fileGroupArr = get_sub_field('select_group_access'); // array
						$file = get_sub_field('file');
						$name = get_sub_field('name');
						$desc = get_sub_field('group_file_description');
						// determine if user's group is fount in the $fileGroupArr
						$key = array_search($userGroup, $fileGroupArr, true);

						// check permissions
						if ( $fileGroupArr &&
								$userGroup === $fileGroupArr[$key] ||
								current_user_can('administrator') ):
							?>

							<div class="<?php echo $pluginSlug; ?>-file-card">
								<?php // For Admin debugging
									if (current_user_can('administrator') ):
										echo '<small>';
										echo '<strong>Assigned File permission: </strong>';
										echo $fileGroupArr[$key];
										echo '</small>';
									endif;
								?>
								<?php if($file): ?>
									<?php if( $name ): ?>
										<div>
											<img src="<?php echo plugins_url( '/../images/download-icon.svg',  __FILE__ ) ?>" class="download-icon" alt="download icon" />
											<h5 class="<?php echo $pluginSlug; ?>-file-card-title"><?php echo $name; ?></h5>
										</div>
										<p class="<?php echo $pluginSlug; ?>-file-card-desc"><?php echo $desc; ?></p>
									<?php endif; ?>
									<a href="<?php echo $file['url']; ?>" class="<?php echo $pluginSlug; ?>-file-card-download-button" download>Download</a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					<?php endwhile;
				else: ?>
					<p><strong><?php echo $userGroup; ?></strong>: No files found.</p>
		    <?php endif; ?>
			</div><!-- .<?php echo $pluginSlug; ?>-container -->
		<?php } ?>
</div><!-- #<?php echo $pluginSlug; ?> -->

<?php get_footer(); ?>
