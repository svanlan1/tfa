<?php require('dialogs.php'); ?>
<header>
	<div role="presentation" id="socialMedia">
		<span>
			Welcome TFA Executives!
		</span>
	</div>
	<div role="banner" id="mainBanner" aria-label="Main banner">
		<h1>
			<a href="/index.php">
				<img src="/images/tfalogoweb_new.png" alt="Tacoma Film Alliance" />
			</a>
		</h1>
	</div>
	<nav>
	    <ul>    	
			<li>
				<a href="/index.php">Home</a>
			</li>
			<li>
				<a href="/a/">Admin home</a>
			</li>
	        <li class="hasSubmenu">
	        	<a aria-expanded="false" href="javascript:;">Content <img src="/images/down-arrow.svg" alt="Submenu, collapsed" /></a>
	        	<ul class="submenu">
					<li><a href="/a/ticker/">Ticker</a></li>
	        		<li><a href="/a/homepage/">Homepage</a></li>
					<li><a href="/a/reviews/">Film court</a></li>
					<li><a href="/a/minutes/">Minutes</a></li>
				</ul>	        	
	        </li>
			<li>
				<a href="/a/events/">Events</a>
			</li>
	        <li><a href="/a/messages/">Messages</a></li>     
	        <li class="bordered"><a href="/logout/">Logout</a></li>
	    </ul>
	</nav>
</header>