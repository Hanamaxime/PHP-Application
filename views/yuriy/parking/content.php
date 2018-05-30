<?php
require_once 'config.php';

?>
<div class="container-fluid">
  <div class="parking-banner">
    <div class="headliner">
      <div class="headliner-content">
        <h1>Get your parking pass</h1>
        <p class="related">
          Literally move ahead of others are park your vehicle like a pro!
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
              <span><i class="fas fa-home"></i> / support / parking</span>
              <h2 id="desc">Parking</h2>
                <p>
                  Dazzlin Star Island is a 210-acre theme park located in Woodbine
                  Racetrack, Toronto, which supports a multi-level parking. You
                  can now purchase a vehicle parking pass before coming to the park
                  and avoid getting turned down in case parking is full.
                </p>
                <div class="row">
                  <div class="col-lg-7 text-center">
                      <img class="img-fluid ticket-banner" src="images/parking-pass-banner.png" />
                        <figcaption class="ticket-banner-caption">
                          Note: This is not the actual parking pass.
                          Just a sample version.
                        </figcaption>
                        <p>
                        Depending on the vehicle you have, the prices vary. Check out
                        the available options below to see the parking pass price for
                        various vehicles.
                        </p>
                    </div>
                  <div class="col-lg-5">
                  <form name="charge" action="charge" method="post" class="contact-form">
                    <fieldset>
                        <span id="err"></span>
                      <div class="form-group">
                        <label for="type">Vehicle Type</label>
                        <select name="type" class="form-control">
                          <option value="500">Bicycle ($5/day)</option>
                          <option value="1000">Motorcycle ($10/day)</option>
                          <option value="2000">Car ($20/day)</option>
                          <option value="3000">SUV ($30/day)</option>
                          <option value="5000">Bus ($50/day)</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="plate">Licence plate</label>
                        <input class="form-control" type="text" name="plate" id="plate"/>
                      </div>
                      <div class="form-group">
                        <label for="date">Date of Visit</label>
                        <input class="form-control" type="date" name="date" id="date"/>
                      </div>
                      <div class="form-group text-center">
                          <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                  data-key="<?php echo $stripe['publishable_key']; ?>"
                                  data-description="Parking pass"
                                  data-amount="<?php echo $_POST['type']; ?>"
                                  data-currency="cad"
                                  data-locale="auto">
                          </script>
                      </div>
                    </fieldset>
                  </form>
                  </div>
                      <br />
                      <div class="row">
                          <div class="col-lg-4 text-center">
                            <img class="img-fluid parking-icon" src="images/parking-icon1.png" /><br />
                            <span>BICYCLE</span>
                            <p class="text-center">
                            $5 per day, including GST/HST
                            </p>
                          </div>
                          <div class="col-lg-4 text-center">
                            <img class="img-fluid parking-icon" src="images/parking-icon2.png" /><br />
                            <span>MOTORCYCLE</span>
                            <p class="text-center">
                            $10 per day, including GST/HST
                            </p>
                          </div>
                          <div class="col-lg-4 text-center">
                            <img class="img-fluid parking-icon" src="images/parking-icon3.png" /><br />
                            <span>CAR</span>
                            <p class="text-center">
                            $20 per day, including GST/HST
                            </p>
                          </div>
                          <div class="col-lg-4 text-center">
                            <img class="img-fluid parking-icon" src="images/parking-icon4.png" /><br />
                            <span>SUV</span>
                            <p class="text-center">
                            $30 per day, including GST/HST
                            </p>
                          </div>
                          <div class="col-lg-4 text-center">
                            <img class="img-fluid parking-icon" src="images/stripe-payment.png" /><br />
                          </div>
                          <div class="col-lg-4 text-center">
                            <img class="img-fluid parking-icon" src="images/parking-icon5.png" /><br />
                            <span>BUS/ RV</span>
                            <p class="text-center">
                            $50 per day, including GST/HST
                            </p>
                          </div>
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