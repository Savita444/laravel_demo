<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<title>YOM- Multipurpose HTML Theme</title>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="{{ asset('files/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('files/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('files/css/simple-line-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('files/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('files/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('files/rs-plugin/css/settings.css') }}">
</head>
<body>

	<div class="sidebar-menu-container" id="sidebar-menu-container">
		<div class="sidebar-menu-push">
			<div class="sidebar-menu-overlay"></div>
			<div class="sidebar-menu-inner">

				<header class="site-header">
					<div id="main-header" class="main-header header-sticky">
						<div class="inner-header clearfix">
							<div class="logo">
								<a href="{{ route('home') }}">YOM</a>
							</div>
							<div class="header-right-toggle pull-right hidden-md hidden-lg">
								<a href="javascript:void(0)" class="side-menu-button"><i class="fa fa-bars"></i></a>
							</div>
							<nav class="main-navigation pull-right hidden-xs hidden-sm">
								<ul>
									<li><a href="{{ route('home') }}">Home</a></li>
									<li><a href="#" class="has-submenu">Pages</a>
										<ul class="sub-menu">
											<li><a href="{{ route('services') }}">Services</a></li>
											<li><a href="{{ route('clients') }}">Clients</a></li>
										</ul>
									</li>
									<li><a href="#" class="has-submenu">Blog</a>
										<ul class="sub-menu">
											<li><a href="{{ route('blog') }}">Blog Classic</a></li>
											<li><a href="{{ route('blog.single') }}">Single Post</a></li>
										</ul>
									</li>
									<li><a href="{{ route('about') }}">About</a></li>
									<li><a href="#" class="has-submenu">Work</a>
										<ul class="sub-menu">
											<li><a href="{{ route('work.3columns') }}">Three Columns</a></li>
										</ul>
									</li>
									<li><a href="{{ route('contact') }}">Contact</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</header>
