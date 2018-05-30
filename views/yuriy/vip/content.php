<?php
require_once 'config.php';
?>
<div class="container-fluid">
  <div class="home-banner">
    <div class="headliner">
      <div class="headliner-content">
        <h1>Get your VIP tour</h1>
        <p class="related">
            The VIP Tour at Dazzlin is the best, and most exclusive, way to experience all the Park has to offer.
            <a class="gold-btn" href="#desc">VIEW MORE
              &nbsp;<i class="fas fa-angle-right arrow"></i></a>
          </p>
        </div>
      </div>
  </div>
    <div class="container">
      <div class="feature-event">
        <div class="row">
          <div class="col-regular">
            <div class="feature-content">
              <span><i class="fas fa-home"></i> / vip tour</span>
              <h2 id="desc">VIP Tour</h2>
              <p>
                Attention all DSI Super Fans!<br/>
                We are introducing a special VIP Pass just for the month of April
                and May 2018. This pass is loaded with amazing features.
              </p>
              <div class="col-lg-12 text-center">
                  <img class="img-fluid ticket-banner" alt="Dazzlin Star Island VIP Pass" src="images/vip-banner.png" />
                    <figcaption class="ticket-banner-caption">
                      Note: This is not the actual VIP tour pass.
                      Just a sample version.
                    </figcaption>
                </div>
                <div class="row mt-3">
                  <div class="col-lg-7">
                    <p>A VIP Tour at Canada's Wonderland will include these exclusive benefits:</p>
                    <ul>
                        <li>A Personal Dazzlin Tour Guide who will facilitate your entire visit</li>
                        <li>Exclusive Front-of-the-Line Ride Access</li>
                        <li>Preferred Parking</li>
                        <li>VIP Admission</li>
                        <li>A Single Day FunPix Photo Pass that includes unlimited digital photo downloads</li>
                        <li>Lunch or Dinner at The Marketplace International Buffet</li>
                        <li>Souvenir Bottle with Unlimited Soft Drinks</li>
                        <li>Priority Live Show Seating</li>
                    </ul>
                    </div>
                <div class="col-lg-5">
                <form name="charge" action="pay" method="post" class="contact-form">
                  <fieldset>
                      <span id="err"></span>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input class="form-control" type="text" name="name" />
                    </div>
                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input class="form-control" type="text" name="phone" id="phone"/>
                    </div>
                    <div class="form-group">
                      <label for="date">Date of Visit</label>
                      <input class="form-control" type="date" name="date" id="date"/>
                    </div>
                      <div>
                          <input hidden name="price" value="350">
                      </div>
                    <div class="form-group text-center">
                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="<?php echo $stripe['publishable_key']; ?>"
                                data-description="Parking pass"
                                data-amount="35000"
                                data-currency="cad"
                                data-locale="auto">
                        </script>
                    </div>
                  </fieldset>
                </form>
                  </div>
              </div>
              <br />
              <p class="alert alert-success">
                The park is open 7 days a week and is operational between
                08:00 AM to 09:00 PM, but the timing of rides and restaurants might vary.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
