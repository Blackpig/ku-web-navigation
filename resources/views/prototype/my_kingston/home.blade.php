@extends('layouts.master')

@section('navbar')
<nav class="top-bar" data-topbar role="navigation">
	<ul class="title-area">
		<li class="name">
			<h1><a href="/my-kingston" class="current">My Kingston</a></h1>
		</li>
		<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	</ul>

	<section class="top-bar-section">
		<!-- Right Nav Section -->
		<ul class="right">
			<li class="has-dropdown">
				<a href="#">My Favourites</a>
				<ul class="dropdown">
					<li><a href="/staffspace/lrc-print-resources">LRC Print Resources</a></li>
					<li><a href="/my-kingston/my-studies">My Studies</a></li>
				</ul>

			</li>
			<li class="has-dropdown">
				<a href="#">Switch View</a>
				<ul class="dropdown">
					<li><a href="/staffspace">StaffSpace - Staff View</a></li>
					<li><a href="/my-kingston">My Kingston - Student View</a></li>
				</ul>
			</li>
		</ul>

	</section>
</nav>
@stop

@section('content')
<div class="wall">
	<div class="tile logo">		
	</div>
	<div class="tile my-status">
		<div class="tile-body">
			<div class="avatar left">
				<a href="#"><img src="../assets/images/avatar.jpg"></a>
			</div>
			<div class="details left">
				<a href="#">My Status</a>
				<p>Welcome back Stuart</p>
			</div>
			<div class="ticker">
				<ul>
					<li><i class="fa fa-thumbs-o-up"></i> Student Husting in the SU bar 17/05/2015 @ 16:00</li>
					<li><i class="fa fa-money"></i> Student loan application deadline 31/05/2015</li>
					<li><i class="fa fa-pencil"></i> Open day 28/05/2015</li> 
				</ul>
			</div>
		</div>
	</div>

	<div class="tile image">
		<img src="/assets/images/fass.jpg" />
	</div>

	<div class="tile service-group-wide blue">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="My University"><i class="fa fa-university"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">My University</a>
					</div>
				</div>
				<div class="tile-back">
					<div class="tile-content">
						<p>Long text description of this organisation</p>
					</div>
				</div>
			</div>
			<div class="tile-footer">
				<div class="icon favourite left">
					<a href="#" class="bookmark" data-tooltip aria-haspopup="true" class="has-tip" title="Add to My favourites"><i class="fa fa-star"></i></a>
				</div>
				<div class="icon info right">
					<a href="#"><i class="fa fa-info"></i></a>
				</div>
			</div>
		</div>
	</div>

	<div class="tile service-group-wide green">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="My Faculty Support"><i class="fa fa-compass"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">My Faculty Support</a>
					</div>
				</div>
				<div class="tile-back">
					<div class="tile-content">
						<p>Long text description of this organisation</p>
					</div>
				</div>
			</div>
			<div class="tile-footer">
				<div class="icon favourite left">
					<a href="#" class="bookmark" data-tooltip aria-haspopup="true" class="has-tip" title="Add to My favourites"><i class="fa fa-star"></i></a>
				</div>
				<div class="icon info right">
					<a href="#"><i class="fa fa-info"></i></a>
				</div>
			</div>
		</div>
	</div>

	<div class="tile service-group-tall orange">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="My Studies"><i class="fa fa-graduation-cap"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="/my-kingston/my-studies"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="/my-kingston/my-studies">My Studies</a>
					</div>
				</div>
				<div class="tile-back">
					<div class="tile-content">
						<p>Long text description of this organisation</p>
					</div>
				</div>
			</div>
			<div class="tile-footer">
				<div class="icon favourite left">
					<a href="#" class="bookmark" data-tooltip aria-haspopup="true" class="has-tip" title="Add to My favourites"><i class="fa fa-star"></i></a>
				</div>
				<div class="icon info right">
					<a href="#"><i class="fa fa-info"></i></a>
				</div>
			</div>
		</div>
	</div>

	<div class="tile image">
		<img src="/assets/images/fbl.jpg" />
	</div>

	<div class="tile service-group-wide pink">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="My Campus"><i class="fa fa-building-o"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">My Campus</a>
					</div>
				</div>
				<div class="tile-back">
					<div class="tile-content">
						<p>Long text description of this organisation</p>
					</div>
				</div>
			</div>
			<div class="tile-footer">
				<div class="icon favourite left">
					<a href="#" class="bookmark" data-tooltip aria-haspopup="true" class="has-tip" title="Add to My favourites"><i class="fa fa-star"></i></a>
				</div>
				<div class="icon info right">
					<a href="#"><i class="fa fa-info"></i></a>
				</div>
			</div>
		</div>
	</div>

	<div class="tile image">
		<img src="/assets/images/fsec.jpg" />
	</div>

	<div class="tile service-group-wide pink">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="My Home"><i class="fa fa-home"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">My Home</a>
					</div>
				</div>
				<div class="tile-back">
					<div class="tile-content">
						<p>Long text description of this organisation</p>
					</div>
				</div>
			</div>
			<div class="tile-footer">
				<div class="icon favourite left">
					<a href="#" class="bookmark" data-tooltip aria-haspopup="true" class="has-tip" title="Add to My favourites"><i class="fa fa-star"></i></a>
				</div>
				<div class="icon info right">
					<a href="#"><i class="fa fa-info"></i></a>
				</div>
			</div>
		</div>
	</div>

	<div class="tile service-group-tall purple">
		<div class="tile-wrapper">
			<div class="tile-header clearfix">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="My Money"><i class="fa fa-gbp"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">My Money</a>
					</div>
				</div>
				<div class="tile-back">
					<div class="tile-content">
						<p>Long text description of this organisation</p>
					</div>
				</div>
			</div>
			<div class="tile-footer">
				<div class="icon favourite left">
					<a href="#" class="bookmark" data-tooltip aria-haspopup="true" class="has-tip" title="Add to My favourites"><i class="fa fa-star"></i></a>
				</div>
				<div class="icon info right">
					<a href="#"><i class="fa fa-info"></i></a>
				</div>
			</div>
		</div>
	</div>

	<div class="tile service-group-tall yellow">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="My Wellbeing"><i class="fa fa-heartbeat"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">My Wellbeing</a>
					</div>
				</div>
				<div class="tile-back">
					<div class="tile-content">
						<p>Long text description of this organisation</p>
					</div>
				</div>
			</div>
			<div class="tile-footer">
				<div class="icon favourite left">
					<a href="#" class="bookmark" data-tooltip aria-haspopup="true" class="has-tip" title="Add to My favourites"><i class="fa fa-star"></i></a>
				</div>
				<div class="icon info right">
					<a href="#"><i class="fa fa-info"></i></a>
				</div>
			</div>
		</div>
	</div>

	<div class="tile image">
		<img src="/assets/images/fhsec.jpg" />
	</div>

	<div class="tile service-group-tall blue">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="My Participation"><i class="fa fa-user-plus"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">My Participation</a>
					</div>
				</div>
				<div class="tile-back">
					<div class="tile-content">
						<p>Long text description of this organisation</p>
					</div>
				</div>
			</div>
			<div class="tile-footer">
				<div class="icon favourite left">
					<a href="#" class="bookmark" data-tooltip aria-haspopup="true" class="has-tip" title="Add to My favourites"><i class="fa fa-star"></i></a>
				</div>
				<div class="icon info right">
					<a href="#"><i class="fa fa-info"></i></a>
				</div>
			</div>
		</div>
	</div>

	<div class="tile service-group-wide green">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="My Career Development"><i class="fa fa-line-chart"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">My Career Development</a>
					</div>
				</div>
				<div class="tile-back">
					<div class="tile-content">
						<p>Long text description of this organisation</p>
					</div>
				</div>
			</div>
			<div class="tile-footer">
				<div class="icon favourite left">
					<a href="#" class="bookmark" data-tooltip aria-haspopup="true" class="has-tip" title="Add to My favourites"><i class="fa fa-star"></i></a>
				</div>
				<div class="icon info right">
					<a href="#"><i class="fa fa-info"></i></a>
				</div>
			</div>
		</div>
	</div>

	<div class="tile service-group-tall orange">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="My Passport to UK Study"><i class="fa fa-plane"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">My Passport to UK Study</a>
					</div>
				</div>
				<div class="tile-back">
					<div class="tile-content">
						<p>Long text description of this organisation</p>
					</div>
				</div>
			</div>
			<div class="tile-footer">
				<div class="icon favourite left">
					<a href="#" class="bookmark" data-tooltip aria-haspopup="true" class="has-tip" title="Add to My favourites"><i class="fa fa-star"></i></a>
				</div>
				<div class="icon info right">
					<a href="#"><i class="fa fa-info"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>
@stop