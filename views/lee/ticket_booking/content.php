<div class="container-fluid">
  <div class="gcard-banner">
    <div class="headliner">
      <div class="headliner-content">
        <h1>Get your Passes Now</h1>
        <p class="related">
          Buy your entry ticket, fast pass or season pass online to beat the long-line at the park.
            <a class="gold-btn" href="#desc">KNOW MORE
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
              <span><a href="<?= Routes::getBaseUrl() . "home"; ?>"><i class="fas fa-home"></i></a> / <a href="<?= Routes::getBaseUrl() . "ticket_booking"; ?>">buy tickets</a></span>
              <h2 id="desc">Buy Tickets</h2>
                <p>
                  Dazzlin Star Island Amusment Park has 3 types of entry tickets
                  or passes - Single Day, Fast and Season. Based on your preference
                  and need, you can purchase as many passes as you want to.
                </p>
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <?php
                  $count = 0;
                 foreach(LeeController::$viewBag['list_tickets'] as $item) :
                   $count++;
                   ?>
                    <?php if($count == 1): ?>
                    <li data-type="<?php echo $item->id; ?>" data-name="<?php echo $item->ticket_title; ?>" data-price="<?php echo $item->ticket_price; ?>" data-thumbnail="<?php echo $item->ticket_thumbnail; ?>" class="nav-item ticket-item">
                      <a class="nav-link active" id="<?php echo "pass-tab-".$count; ?>" data-toggle="tab" href="<?php echo "#pass-".$count ?>" role="tab" aria-controls="<?php echo "pass-".$count ?>" aria-selected="true">
                        <h3 class="text-center"><?php echo $item->ticket_title; ?></h3>
                      </a>
                    </li>

                  <?php else: ?>
                    <li data-type="<?php echo $item->id; ?>" data-name="<?php echo $item->ticket_title; ?>" data-price="<?php echo $item->ticket_price; ?>" data-thumbnail="<?php echo $item->ticket_thumbnail; ?>" class="nav-item ticket-item">
                      <a class="nav-link" id="<?php echo "pass-tab-".$count; ?>" data-toggle="tab" href="<?php echo "#pass-".$count ?>" role="tab" aria-controls="<?php echo "pass-".$count ?>" aria-selected="false">
                        <h3 class="text-center"><?php echo $item->ticket_title; ?></h3>
                      </a>
                    </li>
                  <?php endif; ?>
                <?php endforeach; ?>
              </ul>


                <div class="row">
                  <div class="col-lg-7">
                    <div class="tab-content" id="myTabContent">
                    <?php
                      $count = 0;
                     foreach(LeeController::$viewBag['list_tickets'] as $item) :
                       $count++;
                       ?>

                      <?php if($count == 1): ?>
                    <div class="tab-pane fade show active" id="<?php echo "pass-".$count; ?>" role="tabpanel" aria-labelledby="<?php echo "pass-tab-".$count; ?>">
                      <br/>
                    <p><?php echo $item->ticket_desc; ?></p>
                    <div class="text-center">
                    <img class="img-fluid ticket-banner" src="<?php echo Routes::getBaseUrl().$item->ticket_thumbnail; ?>" />
                      <figcaption class="ticket-banner-caption">
                        Note: This is not the actual entry pass.
                        Just a sample version.
                      </figcaption>
                    </div>
                      <p>
                        The process for purchasing an online entry ticket is
                        quite simple - fill the form and pay the fee.
                      </p>
                    </div>

                  <?php else: ?>
                    <div class="tab-pane fade" id="<?php echo "pass-".$count; ?>" role="tabpanel" aria-labelledby="<?php echo "pass-tab-".$count; ?>">
                      <br/>
                    <p><?php echo $item->ticket_desc; ?></p>
                    <div class="text-center">
                    <img class="img-fluid ticket-banner" src="<?php echo Routes::getBaseUrl().$item->ticket_thumbnail; ?>" />
                      <figcaption class="ticket-banner-caption">
                        Note: This is not the actual entry pass.
                        Just a sample version.
                      </figcaption>
                    </div>
                      <p>
                        The process for purchasing an online entry ticket is
                        quite simple - fill the form and pay the fee.
                      </p>
                    </div>
                  <?php endif; ?>


                    <?php endforeach; ?>
                    </div>
                  </div>

                  <div class="col-lg-5">
                    <form action="<?php echo Routes::getBaseUrl() ?>add_to_cart" method="post" class="ticket-form">

                      <fieldset>
                        <legend class="text-center">Ticket Information</legend>
                        <input type="hidden" id="payment_from_page" name="payment_from_page" value="Ticket Booking" />
                        <input type="hidden" id="product_name" name="product_name" value="" />
                        <input type="hidden" id="product_price" name="product_price" value="" />
                        <input type="hidden" id="product_quantity" name="product_quantity" value="1" />
                        <input type="hidden" id="product_thumbnail" name="product_thumbnail" value="" />
                        <input type="hidden" id="product_type" name="product_type" value="" />
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="phone" class="form-control" name="phone" id="phone">
                        </div>
                        <div class="form-group">
                          <label for="date">Date of Visit</label>
                          <input type="date" class="form-control" name="visit_date" id="visit_date">
                        </div>
                        <div class="text-center">
                          <input type="submit" class="btn btn-success" name="btnTicketSubmit" id="btnSubmit" value="ADD TO CART"/>
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


    <script>
      $(function() {

        //set value by default
        $('#product_name').val($('.ticket-item:first-child').attr("data-name"));
        $('#product_price').val($('.ticket-item:first-child').attr("data-price"));
        $('#product_thumbnail').val($('.ticket-item:first-child').attr("data-thumbnail"));
        $('#product_type').val($('.ticket-item:first-child').attr("data-type"));

        $('body').on('click', '.ticket-item' , function() {
          var product_name = $(this).attr("data-name");
          var product_price = $(this).attr("data-price");
          var product_thumbnail = $(this).attr("data-thumbnail");
          var product_type = $(this).attr("data-type");


          $('#product_name').val(product_name);
          $('#product_price').val(product_price);
          $('#product_thumbnail').val(product_thumbnail);
          $('#product_type').val(product_type);
        });

        $('.ticket-form').on('submit', function() {
          if($('#name').val() == "") {
            alert('Please enter your name!');
            return false;
          }else if($('#email').val() == "") {
            alert('Please enter your email!');
            return false;
          }else if($('#phone').val() == "") {
            alert('Please enter your contact number!');
            return false;
          }else if($('#visit_date').val() == "") {
            alert('Please choose your date of visit!');
            return false;
          }else{
            return true;
          }
        });


      });
    </script>
