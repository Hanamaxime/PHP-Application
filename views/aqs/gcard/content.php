<div class="container-fluid">
  <div class="gcard-banner">
    <div class="headliner">
      <div class="headliner-content">
        <h1>Surprise your friends and families</h1>
        <p class="related">
          Send a gift card to your loved ones and brighten their day today. You
          can now custom select a design of your choice.
            <a class="gold-btn" href="#desc">VIEW MORE
              &nbsp;<i class="fas fa-angle-right arrow"></i></a>
          </p>
        </div>
      </div>
  </div>
    <div class="gcard-block">
      <div class="container">
            <div class="gcard-content">
              <span><i class="fas fa-home"></i> / explore / giftcard</span>
              <h2 id="desc" class="feature_event_title">Gift Cards & Vouchers</h2>
                <p>Dazzlin Star Island Amusment Park has a number of facilities
                  where the gift cards can be redeemed for toys, accessories and
                  even passes.
                </p>


                <div class="row">

                  <div class="col-lg-6">
                    <h3>Step 1: Select a custom gift card template</h3>
                    <p>Click on the gift card template you like!
                    </p>
                    <div class="row">
                      <div class="col-lg-12">
                        <div data="Giftcard Template 1" data-img="images/gc/template_gc/gcard1.png" class="gc-div">
                          <img class="img-fluid gc-thumb" src="images/gc/template_gc/gcard1.png">
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div data="Giftcard Template 2" data-img="images/gc/template_gc/gcard2.png" class="gc-div">
                          <img class="img-fluid gc-thumb" src="images/gc/template_gc/gcard2.png">
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div data="Giftcard Template 3" data-img="images/gc/template_gc/gcard3.png" class="gc-div">
                          <img class="img-fluid gc-thumb" src="images/gc/template_gc/gcard3.png">
                        </div>
                      </div>

                       </div>
                  </div>

                  <div class="col-lg-6">
                    <h3>Step 2: Enter details for gift card</h3>
                    <p>Please enter all details carefully and submit the gift card
                      request. You will be guided to the payment portal after clicking
                      on "PAY NOW".
                    </p>
                    <form id="gcard-form" action="<?php echo Routes::getBaseUrl() ?>add_to_cart" method="post">

                        <input type='hidden' name='payment_from_page' id='payment_from_page' value='Gift card' />
                        <input type="hidden" name="customised_gcard" id="customised_gcard" value='' />
                        <input type="hidden" name="product_name" id="product_name" value='' />
                        <input type="hidden" name="product_quantity" value='1' />

                        <div class="form-group">
                          <input type="text" class="form-control" name="sender_name" id="sender_name" placeholder="Enter your name (required)" />
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" name="receipt_name" id="receipt_name" placeholder="Enter recipient name (required)" />
                        </div>
                        <div class="form-group">
                          <input type="number" class="form-control" name="product_price" id="product_price" name="amount" placeholder="Enter Amount (Min. $50)" />
                        </div>

                        <div class="text-center">
                          <input type="button" id="generate-gcard-temp" class="btn btn-success" value="Generate" />
                        </div>

                        <!--DISPLAY CUSTOMER TEMPLATE GIFTCARD HERE -->
                        <div class="text-center">
                          <br/>
                          <h3 class="gcard-inform text-center">Your custom gift card is ready!</h3>
                          <canvas id="giftcard-temp" width="500" height="300"></canvas>
                          <input type="submit" name="giftcardBtnSubmit" id="add-to-cart-btn" class="btn btn-success" value="Add to Cart" />
                        </div>
                    </form>
                  </div>

                </div>

                <div>
                  <p class="alert alert-success">
                    The park is open 7 days a week and is operational between
                    08:00 AM to 09:00 PM, but the timing of rides and restaurants might vary.
                  </p>
                </div>
        </div>

  </div>
</div>
</div>
