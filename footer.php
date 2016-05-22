			<?php wp_footer(); ?>
			<div id="footer">
				<?php xdevl\theme\copyright_text(); ?>
			</div>
		</div> <!-- End wrapper -->
		<script>
			jQuery(document).foundation() ;
			<?php if(xdevl\theme\display_login_modal()): ?>
				jQuery('#loginModal').foundation('reveal','open') ;
			<?php endif; ?>
		</script>
	</body>
</html>
