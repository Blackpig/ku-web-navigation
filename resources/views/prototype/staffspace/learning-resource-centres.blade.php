@extends('layouts.master')

@section('navbar')
<nav class="top-bar" data-topbar role="navigation">
	<ul class="title-area">
		<li class="name">
			<h1><a href="/staffspace">StaffSpace</a></h1>
			<h1><a href="/staffspace/library-learning-services">Library & Learning Services</a></h1>		
			<h1><a href="/staffspace/learning-resource-centres" class="current">Learning Resource Centres</a></h1>
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
					<li><a href="/my-kinston/my-studies">My Studies</a></li>
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

	<div class="tile endpoint orange">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Library & Learning Services"><i class="fa fa-book"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-comment-o"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Feedback</a>
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

	<div class="tile endpoint blue">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Library & Learning Services"><i class="fa fa-book"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-link"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Learning Caf&eacute;s</a>
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

	<div class="tile endpoint green">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Library & Learning Services"><i class="fa fa-book"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-link"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">LRC Opening Hours</a>
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

	<div class="tile endpoint yellow">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Library & Learning Services"><i class="fa fa-book"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-link"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">How to Find LRCs</a>
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
		
	<div class="tile service-group-wide purple">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Library & Learning Services"><i class="fa fa-book"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">LRC PC Resources</a>
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

	<div class="tile service-group-tall blue">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Library & Learning Services"><i class="fa fa-book"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="/staffspace/lrc-print-resources"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="/staffspace/lrc-print-resources">LRC Print Resources</a>
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

	<div class="tile endpoint yellow">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Library & Learning Services"><i class="fa fa-book"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-comment-o"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Contact the LRC</a>
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
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Library & Learning Services"><i class="fa fa-book"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">LRC Presentation Resources</a>
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

	<div class="tile service-group-wide pink">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Library & Learning Services"><i class="fa fa-book"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Zones & Study Rooms</a>
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