<?php
/**
 * Футер
 */
global $svetofor_options;
?>
<footer class="main-footer">
    <div class="container">
		<?php if ( $svetofor_options['social_links']['Vkontakte'] ) { ?>
		<a href="<?php echo $svetofor_options['social_links']['Vkontakte'] ?>" class="footer-link"><?php echo $svetofor_options['vk-text'] ?></a>
		<?php } ?>
		<a href="<?php echo get_post_type_archive_link('shop') ?>" class="footer-link"><?php echo $svetofor_options['find-shop'] ?></a>
		<?php if ( $svetofor_options['phone'] ) { ?>
		<a href="mailto:<?php echo $svetofor_options['mail'] ?>" class="footer-link"><?php echo $svetofor_options['mail_text'] ?> <?php echo $svetofor_options['mail'] ?></a>
		<?php } ?>
    </div>
	<!-- VK Widget -->
	<div id="vk_community_messages"></div>
	<script type="text/javascript">
		VK.Widgets.CommunityMessages("vk_community_messages", 184771158, {disableExpandChatSound: "1",tooltipButtonText: "Есть вопрос?"});
	</script>
</footer> 
<?php wp_footer(); ?>
</body>
</html>
