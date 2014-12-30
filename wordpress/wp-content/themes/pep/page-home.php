<?php
/*
Template Name: Static home page
*/
get_header(); ?>

	<div class="content-area">
		<main id="main" class="site-main" role="main">

	
			<div id="home-page" class="box" >
			<div class="col1">
			<?php if (of_get_option('example_editor')): ?>
				<?php echo '<p>'.of_get_option( 'example_editor', 'no entry'). '</p>'; ?>
			<?php else : ?>
			
			 
			<h1>Fully Responsive Pep!</h1> 
			<h2>Easy to use theme options menu</h2>
			<ul>
				<li>Fully responsive design!</li>
				<li>Theme options menu in admin panel!</li>
				<li>Easy to add your social network links!</li>
			</ul> 
			<p>You can change the text here from Admin Panel -> Appearance -> Theme Options -> Front Page -> Front page introduction text. You can upload your own image on right from Admin Panel -> Appearance -> Theme Options -> Front Page -> Front page image uploader! Use HTML tags for better stylization!</p>
			<?php endif ?>
			</div>

			
			<div class="col2">
			<?php if (of_get_option('example_uploader')): ?>
				<img src="<?php echo of_get_option('example_uploader');?>">
			<?php else : ?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/pep-responsive.jpg" alt="Responsive Pepw">
			<?php endif ?>
			</div>
			</div>
			<div id="home-widgets">
			<div class="col3 box">
		<?php if (of_get_option('widget_one')) : ?>
			<?php echo of_get_option('widget_one');?>
		<?php else :?>
			<h1>Text area 1</h1> 
			<p>Add your own text here from Admin Panel -> Appearance -> Theme Options -> Front Page -> Text area 1. Use &lt;h1&gt; and &lt;p&gt; and other HTML5 tags for better stylyzation.</p>
			<?php endif ?>
			</div>
			<div class="col4 box">
			<?php if (of_get_option('widget_two')) : ?>
			<?php echo of_get_option('widget_two');?>
		<?php else :?>
			<h1>Text area 2</h1>
			<p>Add your own text here from Admin Panel -> Appearance -> Theme Options -> Front Page ->  Text area 2. Use &lt;h1&gt; and &lt;p&gt; and other HTML5 tags for better stylyzation.</p>
		<?php endif ?>
			</div>
			<div class="col5 box">
			<?php if (of_get_option('widget_three')) : ?>
			<?php echo of_get_option('widget_three');?>
		<?php else :?>
			<h1>Text area 3</h1>
			<p>Add your own text here from Admin Panel -> Appearance -> Theme Options -> Front Page -> Text area 3. Use &lt;h1&gt; and &lt;p&gt; and other HTML5 tags for better stylyzation.</p>
			<?php endif ?>
			</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>