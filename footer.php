<?
/**
 * @author 		   Flurin Dürst
 * @version 	   1.05
 * @since          WPegg 0.1
 */
?>

		</div><!--/.wrapper-->

		<? include 'templates/str-footer.php' ?>

		<? wp_footer() ?>
		<!-- GOOGLE MAPS API -->
		<? if (is_page('contact'))  : ?>
		<script src="https://maps.googleapis.com/maps/api/js"></script>
		<? endif; ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="<? bloginfo('template_url') ?>/dist/scripts/main.js"></script>
	</body>
</html>
