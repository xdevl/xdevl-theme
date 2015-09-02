			<?php wp_footer(); ?>
			<div id="footer">
				XdevL &#64; 2015 All rights Reserved.
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
