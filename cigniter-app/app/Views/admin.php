<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Twenty by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

		<!-- Social Media Buttons -->

		<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6644d8a76c912d0019965c3e&product=inline-share-buttons&source=platform" async="async"></script>
	
		<style>
        	canvas {
        	    border: 1px solid black;
        	}
        	svg {
        	    border: 1px solid black;
        	    width: 200px;
        	    height: 200px;
        	}
    	</style>
	
	</head>
	<body class="index is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<h1 id="logo"><a href="index.php">Twenty <span>by HTML5 UP</span></a></h1>
<nav id="nav">
						<ul>
							<li class="current"><a href="<?php echo base_url('/'); ?>">Welcome</a></li>
							<li class="submenu">
								<a href="#">Layouts</a>
								<ul>
									<li><a href="left-sidebar.php">Left Sidebar</a></li>
									<li><a href="right-sidebar.php">Right Sidebar</a></li>
									<li><a href="no-sidebar.php">No Sidebar</a></li>
									<li><a href="<?php echo base_url('/seed'); ?>">Seed Photos</a></li>
									<li class="submenu">
										<a href="#">Submenu</a>
										<ul>
											<li><a href="#">Dolore Sed</a></li>
											<li><a href="#">Consequat</a></li>
											<li><a href="#">Lorem Magna</a></li>
											<li><a href="#">Sed Magna</a></li>
											<li><a href="#">Ipsum Nisl</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<?php
								if(isset($_COOKIE['username']) && $_COOKIE['username']=="admin") {
							?>
							<li><a href="<?php echo base_url('/admin'); ?>" class="button primary">Admin</a></li>
							<?php
								}
							?>
							<?php
								if(!isset($_COOKIE['username']) && !isset($_COOKIE['password'])) {
							?>
							<li><a href="<?php echo base_url('/signup'); ?>" class="button primary">Sign Up</a></li>
							<li><a href="<?php echo base_url('/login'); ?>" class="button primary">Log In</a></li>
							<?php
								} elseif (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
							?>
							<li><a href="<?php echo base_url('/logout'); ?>" class="button primary">Log Out</a></li>
							<?php
								}
							?>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">

					<!--
						".inner" is set up as an inline-block so it automatically expands
						in both directions to fit whatever's inside it. This means it won't
						automatically wrap lines, so be sure to use line breaks where
						appropriate (<br />).
					-->
					<div class="inner">

						<header>
							<h2>Admin Page</h2>
						</header>
                        <p>
                            <?php echo "Bun venit"?>
                        </p>
					
						<footer>
							<ul class="buttons stacked">
								<li><a href="index.php" class="button fit scrolly">Back To Index</a></li>
							</ul>
						</footer>

					</div>

				</section>
            <!-- Main -->
			    <article id="main">

                    <header class="special container">

						<table>
    					    <tr>
    					        <td><strong>Nume</strong></td>
    					        <td><strong>Imagine</strong></td>
    					        <td colspan="3" align="center"><strong>Actions</strong></td>
    					    </tr>
    					    <?php foreach($images as $var) { ?> 
    					        <tr>
    					            <td><?php echo $var['title'];?></td>
    					            <td><img src="<?php echo base_url($var['image']);?>" width="100" height="100"></td>
    					            <td align="center">
    					                <?php echo anchor(array('/view/',$var['id']), 'View'); ?>
    					                <?php echo anchor(array('/edit/',$var['id']), 'Edit');?>
    					                <?php echo anchor(array('/delete/',$var['id']), 'Delete', array('onclick'=> "return confirm('Vrei sa stergi aceasta poza?')"));?>
							
    					            </td>
    					        </tr>
    					    <?php }?>
    					</table>
							
    					<?php echo anchor(array('/upload/'), 'Upload another image', ['style' => 'color: black;']); ?>

                    </header>

                        
                    <!-- Two -->
                        <section class="wrapper style1 container special">
                            <div class="row">
                                <div class="col-4 col-12-narrower">
                        
                                    <section>
                                        <span class="icon solid featured fa-check"></span>
                                        <header>
                                            <h3>This is Something</h3>
                                        </header>
                                        <p>Sed tristique purus vitae volutpat ultrices. Aliquam eu elit eget arcu commodo suscipit dolor nec nibh. Proin a ullamcorper elit, et sagittis turpis. Integer ut fermentum.</p>
                                    </section>
                        
                                </div>
                                <div class="col-4 col-12-narrower">
                        
                                    <section>
                                        <span class="icon solid featured fa-check"></span>
                                        <header>
                                            <h3>Also Something</h3>
                                        </header>
                                        <p>Sed tristique purus vitae volutpat ultrices. Aliquam eu elit eget arcu commodo suscipit dolor nec nibh. Proin a ullamcorper elit, et sagittis turpis. Integer ut fermentum.</p>
                                    </section>
                        
                                </div>
                                <div class="col-4 col-12-narrower">
                        
                                    <section>
                                        <span class="icon solid featured fa-check"></span>
                                        <header>
                                            <h3>Probably Something</h3>
                                        </header>
                                        <p>Sed tristique purus vitae volutpat ultrices. Aliquam eu elit eget arcu commodo suscipit dolor nec nibh. Proin a ullamcorper elit, et sagittis turpis. Integer ut fermentum.</p>
                                    </section>
                        
                                </div>
                            </div>
                        </section>
                        
                     </article>



				<footer id="footer">

					<div class="sharethis-inline-share-buttons"></div>

					<ul class="copyright">
						<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>

				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>