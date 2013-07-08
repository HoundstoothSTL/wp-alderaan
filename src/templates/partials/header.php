<body <?php body_class(); ?>>
	<header id="header" class="primary-header" role="banner">
		<div class="container">
		    <div id="logo">
		        <a href="#"><img src="<?php echo bloginfo('stylesheet_directory'); ?>/assets/img/logo.png" class="custom" alt="Company Logo"></a>
		    </div>
		    
		    <nav id="nav" class="primary-navigation row-nav" role="navigation">
	            <div class="animate-block">
		            <ul>
		            	<li><a href="<?php echo bloginfo('url'); ?>">Homepage</a></li>
		                <li><a href="<?php echo bloginfo('url'); ?>/about">About Us</a></li>
						<li><a href="<?php echo bloginfo('url'); ?>/blog">Blog</a></li>
						<li><a href="<?php echo bloginfo('url'); ?>/contact">Contact</a></li>
		            </ul>
		        </div>
		    </nav>
		    <a href="#nav" class="nav-btn" id="nav-open-btn">Navigation</a>
		</div>
	</header>