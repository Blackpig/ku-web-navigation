@extends('layouts.master')

@section('navbar')
<nav class="top-bar" data-topbar role="navigation">
	<ul class="title-area">
		<li class="name">
			<h1><a href="/staffspace">StaffSpace</a></h1>
			<h1><a href="/staffspace/library-learning-services">Library & Learning Services</a></h1>
		</l1>
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
					<a href="#"><i class="fa fa-file-pdf-o"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Welcome Presentation</a>
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
						<a href="#">My Library Account</a>
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
						<a href="#">Ask a Librarian</a>
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

	<div class="tile endpoint orange">
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
						<a href="#">Library Membership & Services</a>
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

	<div class="tile endpoint pink">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Library & Learning Services"><i class="fa fa-book"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-sign-in"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">iCat Library Services</a>
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
					<a href="/staffspace/borrowing-renewing"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="/staffspace/borrowing-renewing">Borrowing & Renewing</a>
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
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Library & Learning Services"><i class="fa fa-book"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Library Help & Training</a>
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
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Library & Learning Services"><i class="fa fa-book"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Disability Support</a>
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
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Library & Learning Services"><i class="fa fa-book"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="/staffspace/learning-resource-centres"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="/staffspace/learning-resource-centres">Learning Resource Centres</a>
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
						<a href="#">Help on LRC Floors</a>
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

	<div class="tile endpoint purple">
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
						<a href="#">Students With Disabilities</a>
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