@extends('layouts.master')

@section('navbar')
<nav class="top-bar" data-topbar role="navigation">
	<ul class="title-area">
		<li class="name">
			<h1><a href="/my-kingston">My Kingston</a></h1>
			<h1><a href="/my-kingston/my-studies">My Studies</a></h1>	
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
	
	<div class="tile service-group-wide purple">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="My Studies"><i class="fa fa-graduation-cap"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="/my-kingston/my-it-support"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="/my-kingston/my-it-support">My IT Support</a>
					</div>
				</div>
				<div class="tile-back">
					<div class="tile-content">
						<p></p>
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

	<div class="tile service-group-wide blue">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="My Studies"><i class="fa fa-graduation-cap"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="/my-kingston/my-library-support"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="/my-kingston/my-library-support">My Library Support</a>
					</div>
				</div>
				<div class="tile-back">
					<div class="tile-content">
						<p></p>
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

	<div class="tile service-group-tall pink">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="My Studies"><i class="fa fa-graduation-cap"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">My Academic Support</a>
					</div>
				</div>
				<div class="tile-back">
					<div class="tile-content">
						<p></p>
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

	<div class="tile service-group-wide yellow">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="My Studies"><i class="fa fa-graduation-cap"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="/my-kingston/learning-resource-centres"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="/my-kingston/learning-resource-centres">My Mitigating Circumstances</a>
					</div>
				</div>
				<div class="tile-back">
					<div class="tile-content">
						<p></p>
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


	<div class="tile service-group-tall pink">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="My Studies"><i class="fa fa-graduation-cap"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">My Timetable</a>
					</div>
				</div>
				<div class="tile-back">
					<div class="tile-content">
						<p></p>
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
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="My Studies"><i class="fa fa-graduation-cap"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="/my-kingston/learning-resource-centres"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="/my-kingston/learning-resource-centres">My Study Support</a>
					</div>
				</div>
				<div class="tile-back">
					<div class="tile-content">
						<p></p>
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