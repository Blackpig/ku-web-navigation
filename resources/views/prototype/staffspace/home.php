<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StaffSpace</title>
        <link rel="stylesheet" href="/assets/vendor/foundation/css/foundation.min.css">
        <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/css/app.css">
        <script src="/assets/vendor/foundation/js/vendor/modernizr.js"></script>
    </head>
    <body>
        <header class="fixed">
           <div ng-controller="navBarCtrl">
			  <top-bar>
			    <ul class="title-area">
			      <li class="name">
			        <h1><a href="#">My Site</a></h1>
			      </li>
			      <li toggle-top-bar class="menu-icon"><a href="#">Menu</a></li>
			    </ul>

			    <top-bar-section>
			      <!-- Right Nav Section -->
			      <ul class="right">
			        <li class="active"><a href="#">Active</a></li>
			        <li has-dropdown>
			          <a href="#">Dropdown</a>
			          <ul top-bar-dropdown>
			            <li><a href="#">First link in dropdown</a></li>
			          </ul>
			        </li>
			      </ul>

			      <!-- Left Nav Section -->
			      <ul class="left">
			        <li><a href="#">Left</a></li>
			      </ul>
			    </top-bar-section>
			  </top-bar>
			</div>
        </header>
        

        <div class="container">
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

	<div class="tile service-group-tall blue">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Estates"><i class="fa fa-key"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Estates</a>
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
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Faculty of Art, Design & Architecture"><i class="fa fa-pencil"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Faculty of Art, Design & Architecture</a>
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

	<div class="tile service-group-wide orange">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Faculty of Arts and Social Sciences"><i class="fa fa-paint-brush"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Faculty of Arts and Social Sciences</a>
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
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Faculty of Business & Law"><i class="fa fa-legal"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Faculty of Business & Law</a>
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
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Faculty of Healthcare, Social Science & Education"><i class="fa fa-stethoscope"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Faculty of Healthcare, Social Science & Education</a>
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

	<div class="tile service-group-wide purple">
		<div class="tile-wrapper">
			<div class="tile-header clearfix">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Faculty of Science, Engineering & Computing"><i class="fa fa-cogs"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Faculty of Science, Engineering & Computing</a>
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
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Finance"><i class="fa fa-money"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Finance</a>
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
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Human Resources"><i class="fa fa-group"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Human Resources</a>
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
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Information Services"><i class="fa fa-desktop"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Information Services</a>
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
					<span data-tooltip aria-haspopup="true" class="has-tip" title="KUSCO"><i class="fa fa-wrench"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">KUSCO</a>
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

	<div class="tile service-group-wide pink">
		<div class="tile-wrapper">
			<div class="tile-header">
				<div class="icon organisation left">
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Library & Learning Services"><i class="fa fa-book"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="/staffspace/library-learning-services"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="/staffspace/library-learning-services">Library & Learning Services</a>
					</div>
				</div>
				<div class="tile-back">
					<div class="tile-content">
						<p>This department covers all aspects of the Unversity library. It is also responible for website and intranet content provision.</p>
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
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Student Services & Adminstration"><i class="fa fa-comments-o"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Student Services & Adminstration</a>
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
					<span data-tooltip aria-haspopup="true" class="has-tip" title="Student Union"><i class="fa fa-thumbs-o-up"></i></span>
				</div>
				<div class="icon link-type right">
					<a href="#"><i class="fa fa-th"></i></a>
				</div>
			</div>
			<div class="tile-body row">
				<div class="tile-front">
					<div class="tile-content">
						<a href="#">Student Union</a>
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
        </div>

    </body>
    <script src="/assets/vendor/jquery/jquery-1.11.2.min.js"></script>
    <script src="/assets/vendor/foundation/js/vendor/fastclick.js"></script>
    <script src="/assets/vendor/foundation/js/foundation.min.js"></script>
    <script src="/assets/vendor/foundation/js/foundation/foundation.topbar.js"></script>    
    <script src="/assets/vendor/foundation/js/foundation/foundation.tooltip.js"></script>
    <script src="/assets/vendor/metafizzy/packery.pkgd.min.js"></script>
    <script src="/assets/js/app.js"></script>
</html>