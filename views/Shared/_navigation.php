<header>
	  <nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
	    <ul class="navbar-nav">

	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo Routes::getBaseUrl(); ?>home">HOME<!--<i class="fas fa-home"></i>--></a>
	      </li>

	      <li class="nav-item nav-parent">
	        <a class="nav-link" href="<?php echo Routes::getBaseUrl(); ?>ticket_booking">BUY TICKETS</a>
	      </li>


				<li class="nav-item nav-parent">
	        <a class="nav-link" href="#">VISIT <i class="fas fa-angle-down"></i></a>
	        <div class="nav-child">
	          <div class="row">
	            <div class="col-lg-4 nav-child-link">
	              <a href="<?php echo Routes::getBaseUrl(); ?>events"><span>Event Calendar</i></span>
	              <img class='hidden-nav' src="<?php echo Routes::getBaseUrl(); ?>images/nav4.png"/></a>
	              <p class='hidden-nav'>Check out our event calendar to register for new activities at the park.</p>
	            </div>
	            <div class="col-lg-4 nav-child-link">
	              <a href="<?php echo Routes::getBaseUrl(); ?>mascot"><span>Meet our Mascot</i></span>
	              <img class='hidden-nav' src="<?php echo Routes::getBaseUrl(); ?>images/nav5.png"/></a>
	              <p class='hidden-nav'>Excited to meet Captain Slothonaut? Here, sign-up quickly!</p>
	            </div>
	            <div class="col-lg-4 nav-child-link">
	              <a href="<?php echo Routes::getBaseUrl(); ?>dining"><span>Dining</i></span>
	              <img class='hidden-nav' src="<?php echo Routes::getBaseUrl(); ?>images/nav6.png"/></a>
	              <p class='hidden-nav'>Hungry so soon? Now place an order online at pick from the counter.</p>
	            </div>
	          </div>
	        </div>
	      </li>


				<li class="nav-item nav-parent">
					<a class="nav-link" href="#">EXPLORE <i class="fas fa-angle-down"></i></a>
					<div class="nav-child">
						<div class="row">
							<div class="col-lg-4 nav-child-link">
								<a href="<?php echo Routes::getBaseUrl(); ?>polls"><span>Polls & Votes</i></span>
								<img class='hidden-nav' src="<?php echo Routes::getBaseUrl(); ?>images/nav7.png"/></a>
								<p class='hidden-nav'>Cast in your votes and lets us know what you love about dazzlin.</p>
							</div>
							<div class="col-lg-4 nav-child-link">
								<a href="<?php echo Routes::getBaseUrl(); ?>giftshop"><span>Gift Shop</i></span>
								<img class='hidden-nav' src="<?php echo Routes::getBaseUrl(); ?>images/nav8.png"/></a>
								<p class='hidden-nav'>Take some love back home from Dazzlin Star Island Gift Shop.</p>
							</div>
							<div class="col-lg-4 nav-child-link">
								<a href="<?php echo Routes::getBaseUrl(); ?>gcard"><span>Gift Card & Voucher</i></span>
								<img class='hidden-nav' src="<?php echo Routes::getBaseUrl(); ?>images/nav9.png"/></a>
								<p class='hidden-nav'>Send your friends and family some love in the form of a free ticket or gift card.</p>
							</div>
						</div>
					</div>
				</li>



	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo Routes::getBaseUrl(); ?>game">CONTEST</a>
	      </li>

				<li class="nav-item nav-parent">
					<a class="nav-link" href="#">SUPPORT <i class="fas fa-angle-down"></i></a>
					<div class="nav-child">
						<div class="row">
							<div class="col-lg-4 nav-child-link">
								<a href="<?php echo Routes::getBaseUrl(); ?>parking"><span>Parking</i></span>
								<img class='hidden-nav' src="<?php echo Routes::getBaseUrl(); ?>images/nav10.png"/></a>
								<p class='hidden-nav'>Book your spot before reaching the park and avoid standing in queue!</p>
							</div>
							<div class="col-lg-4 nav-child-link">
								<a target="_blank" href="<?php echo Routes::getBaseUrl(); ?>docs/dazzlin-hw.pdf"><span>Height & Safety</i></span>
								<img class='hidden-nav' src="<?php echo Routes::getBaseUrl(); ?>images/nav11.png"/></a>
								<p class='hidden-nav'>A perfect guide to ensure the safety of all children visiting the park.</p>
							</div>
							<div class="col-lg-4 nav-child-link">
								<a href="<?php echo Routes::getBaseUrl(); ?>faq"><span>FAQs</i></span>
								<img class='hidden-nav' src="<?php echo Routes::getBaseUrl(); ?>images/nav12.png"/></a>
								<p class='hidden-nav'>Have questions about the park? Check out answers to some of the most commonly asked questions.</p>
							</div>
							<div class="col-lg-4 nav-child-link">
								<a href="<?php echo Routes::getBaseUrl(); ?>feedback"><span>Feedback</i></span>
								<img class='hidden-nav' src="<?php echo Routes::getBaseUrl(); ?>images/nav13.png"/></a>
								<p class='hidden-nav'>Share some love/ constructive advice with us through our feedback channel.</p>
							</div>
							<div class="col-lg-4 nav-child-link">
								<a href="<?php echo Routes::getBaseUrl(); ?>career"><span>Careers</i></span>
								<img class='hidden-nav' src="<?php echo Routes::getBaseUrl(); ?>images/nav14.png"/></a>
								<p class='hidden-nav'>Check out part-time, full-time and volunteering opportunities at the park.</p>
							</div>
							<div class="col-lg-4 nav-child-link">
								<a href="<?php echo Routes::getBaseUrl(); ?>contact"><span>Contact</i></span>
								<img class='hidden-nav' src="<?php echo Routes::getBaseUrl(); ?>images/nav15.png"/></a>
								<p class='hidden-nav'>Have trouble reaching us? Get the right contact information and address here.</p>
							</div>
						</div>
					</div>
				</li>

	    </ul>
	  </div>
	</nav>
	<div class="ticket-drawer">
		<a href="<?php echo Routes::getBaseUrl(); ?>ticket_booking">
			<h2>Buy Tickets & Passes</h2>
			<img src="<?php echo Routes::getBaseUrl(); ?>images/tickets.png"/>
		</a>
	</div>
	<div class="top-box container-fluid">
			<div class="logo"><a class="nav-link" href="<?php echo Routes::getBaseUrl(); ?>home"><img src="<?php echo Routes::getBaseUrl(); ?>images/logo.jpg" class="img-fluid"/></a></div>
			<div class="second-navbar">
				<ul>
					<li><a href="<?php echo Routes::getBaseUrl(); ?>admin_portal"><i class="fas fa-sign-in-alt"></i><br> <span class='hidden-nav'>Login</span></a></li>
					<li><a href="<?php echo Routes::getBaseUrl(); ?>checkout"><i class="fas fa-shopping-basket"></i>
					(<?php echo count($_SESSION['shopping_carts']); ?>)<br>
					<span class='hidden-nav'>Cart</span></a></li>
                    <li><a href="<?php echo Routes::getBaseUrl(); ?>search"><i class="fas fa-search"></i><br> <span class='hidden-nav'>Search</span></a></li>				</ul>
			</div>
	</div>

	</header>
