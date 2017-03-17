<!DOCTYPE html>

<html lang="en-us">
	<head class="asdf">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title> Calendar - Hans C - Reservio - Free Online Appointment Scheduling Software</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Styles -->
		<link href="/css/app.min.css?v=13032017" rel="stylesheet">

		<link href="/css/ui+en.css" type="text/css" rel="stylesheet">
		<link href="/css/style.css" type="text/css" rel="stylesheet">

		<link rel="stylesheet" href="/css/jQuery.ui.css">

		<!-- Google Analytics tracking code -->

		<!-- Favicon and touch icons -->
		<link rel="shortcut icon" href="https://localhost/img/favicon.ico">
		<link rel="chrome-webstore-item" href="https://chrome.google.com/webstore/detail/dcplnjefdiofhkgfbinbafljcehmacaa">
        <script src="/js/jquery-2.1.1.js"></script>
        <script src="/js/jQuery.ui.js"></script>
		<!--  <script type="text/javascript" charset="UTF-8" src="./js/common.js"></script>
		<script type="text/javascript" charset="UTF-8" src="./js/util.js"></script>
		<script type="text/javascript" charset="UTF-8" src="./js/stats.js"></script> -->
		<!-- <script type="text/javascript" src="./js/app.en.js"></script>
		<script type="text/javascript" src="./js/common.en.js"></script>
		<script type="text/javascript" src="./js/build.min.js"></script> -->
	</head>


	<body data-bind="css: $root.layout()" class="timeformat-12-hours full">
		<head>adsfasdf</head>
		<div id="fb-root"></div>
		<noscript>
			&lt;style type="text/css"&gt;
			body &gt; div {display:none;}
			&lt;/style&gt;
			&lt;div id="no-javascript"&gt;
			You don't have javascript enabled.
			&lt;/div&gt;
		</noscript>
		<div id="browser-not-supported">
			Your browser isn't supported.
		</div>

		<!-- ko stopBinding: true -->
		<div id="notification-canvas" data-bind="style: {display: messages().length &gt; 0 ? &#39;block&#39; : &#39;none&#39;}, foreach: messages" style="display: none;"></div>
		<!-- /ko -->

		<div class="header">
			<div id="logo">
				<a href="{{ url('/home') }}"><img src="/img/logo.png"></a>
			</div>
			<ul class="menu">
				<li>
					<a <?php echo isset($active) && $active == "home" ? "class='selected'" : "" ?> href="{{ url('/home') }}" > Calendar <span id="menu-calendar-notifications" style="display: none;">0</span> </a>
				</li>
				<li>
					<a <?php echo isset($active) && $active == "client" ? "class='selected'" : "" ?> href="{{url('/clients')}}">Clients</a>
				</li>
				<li>
					<a <?php echo isset($active) && $active == "business" ? "class='selected'" : "" ?> href="{{url('/business/dashboard')}}">Business</a>
				</li>
				<li>
					<a <?php echo isset($active) && $active == "promote" ? "class='selected'" : "" ?> href="{{url('/promote/overview')}}">Promote</a>
				</li>
				<li class="dropdown right">
					<a href="#" class="dropdown">Hans C <i class="icon icon-dropdown white"></i></a>
					<ul>
						<li>
							<a href="{{url('/business/settings')}}">Settings</a>
						</li>
						<li>
							<a href="{{url('/business/orders')}}">Premium services</a>
						</li>
						<li>
							<a href="#" target="_blank">Help</a>
						</li>
						<li>
							<a href="#" data-bind="click: $root.supportClicked">Support</a>
						</li>
						<li>
							<a href="{{url('/logout=ture')}}">Logout</a>
						</li>
					</ul>
				</li>
				<li class="right menu-upgrade">
					Trial version expires in 13 days
					<a href="#" class="upgrade-button" data-bind="click: menuUpgradeClicked">Upgrade</a>
				</li>
			</ul>
		</div>
		@yield('content')

	</body>
	<script src="/js/jquery-2.1.1.js"></script>
	<script src="/js/jQuery.ui.js"></script>
</html>

