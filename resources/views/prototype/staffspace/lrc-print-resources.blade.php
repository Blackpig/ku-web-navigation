@extends('layouts.master')

@section('navbar')
<nav class="top-bar" data-topbar role="navigation">
	<ul class="title-area">
		<li class="name">
			<h1><a href="/staffspace">StaffSpace</a></h1> 
			<h1><a href="/staffspace/library-learning-services">Library & Learning Services</a></h1>		
			<h1><a href="/staffspace/learning-resource-centres">Learning Resource Centres</a></h1>			
			<h1><a href="/staffspace/lrc-print-resources" class="current">LRC Print Resources</a></h1>
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
						<a href="#">Print, Copy & Scan in the LRCs</a>
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
						<a href="#">Wide Format Print in the LRCs</a>
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