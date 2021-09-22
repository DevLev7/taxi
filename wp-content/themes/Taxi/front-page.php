

<?php get_header(); ?>

<div class="wrapper">

<?php get_template_part('blocks-custom/block','block_1'); ?>
<?php get_template_part('blocks-custom/block','block_2'); ?>
<?php get_template_part('blocks-custom/block','block_3'); ?>

<?php get_template_part('blocks-custom/block','block_4'); ?>
<?php get_template_part('blocks-custom/block','block_5'); ?>


<?php get_template_part('blocks-custom/block','block_6'); ?>
<?php get_template_part('blocks-custom/block','block_7'); ?>
<div class="bg_grey">

<div id="block_8">	

		<?php echo get_field('partners-header','option'); ?>

		<?php get_template_part('modules/section','partners'); ?>
</div>

<div id="block_9">
		<?php echo get_field('clients-header','option'); ?>

		<?php get_template_part('modules/section','clients'); ?>
		
</div> 

</div>
<?php get_template_part('blocks-custom/block','block_10'); ?>
<?php get_template_part('blocks/block','manager'); ?>



   

 <?php get_footer(); ?>