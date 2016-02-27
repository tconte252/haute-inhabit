		<footer id="footer">
			<div class="wrapper clear">
				<h6><a href="<?php echo site_url(); ?>">Haute Inhabit</a></h6>
				<nav>
					<ul class="clear">
						<li><a href="<?php echo site_url(); ?>/contact">Contact</a></li>
						<li><a href="<?php echo site_url(); ?>/about">About</a></li>
						<li><a href="<?php echo site_url(); ?>/press">Press</a></li>
						<li><a href="<?php echo site_url(); ?>/terms">Terms &amp; Privacy</a></li>
					</ul>
					<ul class="sn">
					
						<?php
							$sn = new Pod('social_network');
							$sn->findRecords('order ASC');
						?>
						<?php while ($sn->fetchRecord()) { ?>
							<li><a rel="external" href="<?php echo $sn->get_field('social_network_address'); ?>"><?php echo $sn->get_field('social_network_name'); ?></a></li>
						<? } ?>
						
					</ul>
				</nav>
			</div>
			<p class="copyright">&copy; Haute Inhabit, LLC  2013 All rights reserved.</p>
		</footer>
		<?php wp_footer(); ?>
		
		<script src="<?php echo get_template_directory_uri(); ?>/hauteinhabit-files/js/plugins.js" type="text/javascript"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/hauteinhabit-files/js/base.js" type="text/javascript"></script>
		
		<script>
			var numFonts = 0;
            WebFont.load({
                monotype: {
                    projectId: 'd0e50962-4eb7-4821-a218-4a51aa3152e6'///this is your Fonts.com Web Fonts projectId
                },
				fontactive: function () {
					numFonts++;
					if (numFonts === 2) {
						window.haute.controllers.Site.init();
					}
				}
            });
        </script>
        <style>
				
#mti_wfs_colophon img {
    width: 0;
}
</style>
	</body>
</html>