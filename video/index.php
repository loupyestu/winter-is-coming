<?php
	session_start();
	include("assets/twitter/inc/twitterOAuth.php");
	include("assets/twitter/getUser.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8" />
	
	<title>WINTER IS COMING</title>
	
	<meta name="description" content="">
	<meta name="robots" content="index, follow" />
	  
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!--[if lt IE 9]>
	  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	  <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
	<![endif]-->

	<!-- STYLESHEETS -->      
	<link href="assets/styles/reset.css" rel="stylesheet" type="text/css" /> 
	<link href="assets/styles/nanoscroller.css" rel="stylesheet" type="text/css" /> 
	<link href="assets/styles/fonts.css" rel="stylesheet" type="text/css" />
	<link href="assets/styles/global.css" rel="stylesheet" type="text/css" />
    <!-- /STYLESHEETS -->

</head>
<body>
<section id="homepage" class="nano">
	<div class="content">
		<header>
			<div class="wrapper">
				<h1><img src="assets/images/template/hbo-hp.png" alt="HBO"></h1>
				<a href="#"><i class="left arrow">Arrow</i> Back to hbo.com</a>
				<div class="clear"></div>
			</div>
		</header>
		<section id="episode">
			<div class="wrapper">
				<h1><img src="assets/images/template/got-hp.png" alt="Game of thrones" /><span>Season 3 - Episode 9</span></h1>
				<h2>The Rains<br />of Castamere</h2>
				<h3>Live the real adventure. Discover the thrill.</h3>
				<a href="#" class="launch-player"><i class="play"></i>Play &quot;The Rains Of Castamere&quot;</a>
				<div id="countdown">
				</div>
			</div>
		</section>
		<div class="rain">
			<section id="unlock-badges">
				<div class="sign-in">
					<h2>Sign in to improve your experience, <span>start collecting badges!</span></h2>
					<a href="#" class="facebook"><i class="facebook"></i>Sign in with Facebook</a>
					<a href="#" class="twitter"><i class="twitter"></i>Sign in with Twitter</a>
				</div>
			</section>
			<footer>
				<p>This website is purely fictionnal.</p>
				<p>HBO and Game of Thrones logos are property of HBO.</p>
				<p>Game of Thrones is a registered trademark property of HBO.</p> 
				<p class="produced">Produced with passion by Laure Boutmy, Dorian Camilleri, Thomas Iturralde, Julien Perrière and Anthony Roux.</p>
			</footer>
		</div><!-- /sieste.rain -->
	</div><!-- /div.content -->
</section><!-- /section#homepage -->
<section id="wrapper">
	<div class="close-browser"></div>
	<section id="wrapper-rel">
		<section id="main">
			<section id="player">
				<video id="video" class="hidden" preload="none">
					<source src="assets/videos/video.mp4" type="video/mp4">
					<source src="assets/videos/video.ogv" type="video/ogg">
					
					Plz get Internet
				</video>
				<div>
					<nav>
						<h1><img src="assets/images/template/got-player-nav.png" alt="Game of Thrones" /></h1>
						<hr />
						<hr />
						<div id="play-btn">
							<img src="assets/images/template/btn-play.png" alt="Pause" />
						</div><!-- /div#play-button 
						 --><div id="progress-bar">
							<span class="progress"></span>
							<span class="buffer"></span>
						</div><!-- /div#progress-bar -->
						<div id="duration">
							<span class="current-time">22:22</span>
							<span class="duration">40:39</span>
						</div><!-- /div#duration -->
						<hr />
						<hr />
						<div id="volume">
							<img class="mute" src="assets/images/template/btn-volume.png" alt="Volume" />
							<span class="level">
								<span class="handle"> </span>
							</span>
						</div><!-- /div#volume -->
						<div id="fullscreen-btn">
							<img src="assets/images/template/btn-fullscreen.png" alt="Enter fullscreen" />
						</div><!-- /div#fullscreen-button -->
					</nav>
				</div>
			</section><!-- /section#player -->
			<section id="sidebar">
				<nav>
					<ul>
						<li><a href="timeline"><i class="current timeline">Timeline</i></a><hr /><hr /></li>
						<li><a href="feed"><i class="feed">Feed</i></a><hr /><hr /></li>
						<li><a href="badges"><i class="badges">Badges</i></a></li>
					</ul>
				</nav>

				<section id="timeline" class="nano visible">
					<div class="content">
						
					</div>
				</section><!-- /section#timeline -->

				<section id="feed">
					
					<section id="tweet-box">						
						
					    <?php if(isset($_SESSION['profile_image_url']) && !empty($_SESSION['profile_image_url'])
					    		&& isset($_SESSION['name']) && !empty($_SESSION['name']) 
					    		&& isset($_SESSION['screen_name']) && !empty($_SESSION['screen_name'])): ?>
					    	<div id="user">
					    		<img src="<?php echo $_SESSION['profile_image_url']; ?>" alt="profile_image" />
					    		<ul>
					    			<li class="name"><?php echo $_SESSION['name'] ?></li>
					    			<li class="screen_name"><a href="http://twitter.com/<?php echo $_SESSION['screen_name'] ?>" target="_blank">@<?php echo $_SESSION['screen_name'] ?></a></li>
					       		</ul>
					       		<div class="clear"></div>
					    	</div>
							<form>
								<textarea name="tweet" placeholder="Post a tweet..." maxlength="140"></textarea>
								<span class="nb-chars"></span>
								<button type="submit">Post to Twitter</button>
							</form>  
						<?php else: ?>
							<div id="twitter-connect">
						    	<a href="assets/twitter/twitterConnect.php">Se connecter avec Twitter</a> 
						    </div>
						<?php endif; ?>
					
					</section>
					<div id="tweet-feed" class="nano">
						<div class="content">
							<?php if(isset($_SESSION['access_token']['oauth_token'])
									&& isset($_SESSION['access_token']['oauth_token_secret'])): ?>
								<ul class="tweets"></ul>
							<?php endif; ?>
						</div>
					</div>
				</section><!-- /section#feed -->

				<section id="badges" class="nano">
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
						<p>Mauris tincidunt augue ut tortor commodo elementum. Nulla faucibus purus in dui vehicula tincidunt. Nullam venenatis diam id felis tempus ultricies. Ut sodales, nulla at aliquet gravida, tellus ante tempor erat, ut dictum eros ligula sed erat. Nunc posuere eu erat in rutrum. Vestibulum accumsan, ligula nec tempor iaculis, arcu arcu pretium tellus, nec lacinia eros lectus eget metus. Nulla facilisi. Nunc tempor mattis mattis. Aenean ligula nibh, cursus in eros nec, gravida mattis nunc. Suspendisse lobortis egestas massa sed rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla elit velit, tincidunt in massa vitae, lacinia blandit metus. Morbi pharetra dui vitae facilisis ornare. Morbi id felis dignissim, porttitor eros eu, feugiat sem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan at quam et rhoncus. Donec ac mi ac erat laoreet lacinia. Duis vitae sem eros. Morbi sed enim tellus. Sed vulputate ipsum cursus dui tincidunt, vel placerat ligula ultricies. Suspendisse gravida blandit libero, a blandit quam varius et. In hac habitasse platea dictumst. Cras ipsum dui, porttitor nec erat vitae, sagittis mattis lacus. Etiam vel eros in libero vulputate vestibulum sed id nibh. Nulla eu tempor nibh, eu lacinia tellus. Cras feugiat leo gravida, fringilla felis sed, elementum tellus. Proin mauris turpis, faucibus sit amet dolor vel, fermentum porta augue. Donec varius purus tellus, nec egestas lectus volutpat et. Pellentesque ac tellus et ante ornare aliquam.</p>
					
					</div>
				</section><!-- /section#badges -->
			</section><!-- /section#sidebar -->
		</section><!-- /section#main -->

		<section id="browser" class="nano">
			<i class="close-browser" aria-hidden="true">Close</i>
			<div class="content">
			</div>
		</section><!-- /section#browser -->
	</section><!-- /section#wrapper-rel -->
</section><!-- /section#wrapper -->
<!-- SCRIPTS -->
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="assets/scripts/libs/jquery.nanoscroller.min.js"></script>
<script src="assets/scripts/libs/video.js"></script>
<script src="assets/data/cards.jsonp"></script>
<script src="assets/scripts/libs/badges.js"></script>
<script src="assets/scripts/libs/timeline.js"></script>
<script src="assets/scripts/libs/tweet.js"></script>
<script src="assets/scripts/libs/jquery.tweetMachine-0.2.1.js"></script>
<script src="assets/scripts/scripts.js"></script>
<!-- /SCRIPTS -->
</body>
</html>