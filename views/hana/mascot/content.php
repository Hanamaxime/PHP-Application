<div class="container-fluid">
  <div class="mascot-banner">
    <div class="headliner">
      <div class="headliner-content">
        <h1>Captain Slothonaut Arrives</h1>
        <p class="related">
        Join Dazzlin Star Island and our adventure-seeking sloth for fun
        adventures throughout the day
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
              <span><a href="<?= Routes::getBaseUrl() . "home"; ?>"><i class="fas fa-home"></i></a> / visit / <a href="<?= Routes::getBaseUrl() . "mascot"; ?>">mascot</a></span>
              <h2 id="desc">Meet the Mascot</h2>
              <p>
                Your visit to Dazzlin Star Island Amusement Park will be considered
                incomplete if you didn't get to spend some time having fun with our
                fuzzy little captain. Everyone is excited about meeting our fuzzy little
                mascot and here is why.
              </p>
                <div class="row">
                  <div class="col-lg-5 text-center">
                    <img src="images/slothonaut.png" class="mascot-shake img-fluid" alt="dazzlin mascot" />
                  </div>
                  <div class="col-lg-7 mascot-div">
                    <span class="text-center"> Get Excited about Captain Slothonaut </span>
                    <ul>
                      <li> Free Mascot Pass for month of April & May 2018</li>
                      <li> Group Meetups </li>
                      <li> Take a selfie </li>
                      <li> Available from 02:00 PM to 05:00 PM </li>
                    </ul>
                    <img src="images/mascot-ticket.png" class="ticket-banner img-fluid" alt="dazzlin mascot ticket" />
                    <figcaption class="ticket-banner-caption text-center">
                      Note: This is not the actual mascot pass. Just a sample version.
                    </figcaption>
                  </div>
                </div>


                <div class="row">
                  <div class="col-lg-6">
                  <form action="#" method="post" class="contact-form">
                  <div class="form-group">
                   <label for="name">Name</label>
                   <input type="text" class="form-control" name="name" value="<?php echo HanaController::$viewBag['name']; ?>" placeholder="Enter Full Name" />
                  </div>

                  <div class="form-group">
                   <label for="group_size">How many people are in your group?</label>
                   <input type="text" class="form-control" name="group_size" value="<?php echo HanaController::$viewBag['group_size']; ?>" placeholder="Enter Group Size: Max - 12" />
                  </div>

                  <div class="form-group">
                   <label for="date_of_meet">Date of Meet</label>
                   <input type="date" class="form-control" name="date_of_meet" value="<?php echo HanaController::$viewBag['date_of_meet']; ?>" />
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name ="email" value="<?php echo HanaController::$viewBag['email']; ?>" placeholder="spaceadventurer@galaxy.com">
                  </div>

                  <div class="form-group">
                   <label for="phone">Phone Number</label>
                   <input type="text" class="form-control" name="phone"  value="<?php echo HanaController::$viewBag['phone']; ?>" placeholder="999-9999-999">
                  </div>

                  <label for="time_of_meet">Select Time Slot</label>
                    <fieldset>
                      <?php
                      //$time_slots = array('02:00 PM','02:15 PM','02:30 PM','02:45 PM','03:00 PM','03:15 PM','03:30 PM','03:45 PM','04:00 PM','04:15 PM','04:30 PM','04:45 PM','05:00 PM');
                      $time_slots = array('02:00 PM','02:30 PM','03:00 PM','03:30 PM','04:00 PM','04:30 PM','05:00 PM');
                      $checked = "";
                      for ($i=0; $i < count($time_slots); $i++) {
                        $checked = $time_slots[$i] == HanaController::$viewBag['time_of_meet'] ? "checked" : "";
                        echo "<div class='form-check radio-btn'><input class='form-check-input' type='radio' ".$checked." name='time_of_meet' value= '".$time_slots[$i]."' /></div>"."<label class='radio-circle-btn'>".$time_slots[$i]."</label>" ;
                      }
                      ?>
                  </fieldset>


                <div class='err_msg text-center'><?php echo HanaController::$viewBag['err_msg']; ?></div>
                <div class="text-center">
                <input type="submit" name="btnSubmit" id="btnSubmit" value="Book Now" class="btn btn-success"/>
              </div>
              </form>
            </div>

            <div class="col-lg-6 order-first">
              <h3>Our Story</h3>
              <p>
                Deep within the forest, all of the animals lived in harmony.
                Each animal utilized its special talents to make life in the
                forest run smoothly for everyone. The smart fox taught all of
                the young animals, the birds would sing, the elephants would
                scare away predators and the sloths…they were… always resting.
                The sloths were very important to forest because their calming
                influence made sure that the others didn’t get too stressed or
                overwork themselves. The sloths were a happy group, but all they
                did was sleep and hang out on their tree, using as little energy
                as possible. All of the sloths were like this, except for Captain Slothonaut,
                who lived for thrills and adventure despite his slow space.
                Slothonaut searched galaxy-wide for a place to call his own
                that would fulfill his need for speed.
              </p>
              <p>
                After lightyears of searching and testing out the fastest rollercoasters he knew
                he must create his own ride empire and behold, Dazzlin Star Island
                was born for fast and slow thrill-seekers alike. It’s not too hard
                to spot Slothonaut walking around his ride kingdom, as he is very slow.
                Make sure you catch him for a photo and if you’re lucky he might even join you for a ride!
              </p>
              <h3> Explore More </h3>
              <div class="row">
              <div class="col-lg-2">
                <a href="<?php echo Routes::getBaseUrl(); ?>giftshop" target="_blank">
                  <img src="images/mascot-icon1.png" alt="dazzlin star gift shop" class="mascot-icons" />
                </a>
              </div>
              <div class="col-lg-10">
                <span>
                  <a href="<?php echo Routes::getBaseUrl(); ?>giftshop" target="_blank">Dazzlin Gift Shop</a>
                </span>
                <p>For a limited time, enjoy upto 30% discount on accessories.</p>
              </div>
              <div class="col-lg-2">
                <a href="<?php echo Routes::getBaseUrl(); ?>game" target="_blank">
                  <img src="images/mascot-icon2.png" alt="dazzlin star online game" class="mascot-icons" />
                </a>
              </div>
              <div class="col-lg-10">
                <span>
                  <a href="<?php echo Routes::getBaseUrl(); ?>game" target="_blank">Whack-o-Mole Contest</a>
                </span>
                <p>Wanna win tickets? Beat top scorers in this game online.</p>
              </div>
              <div class="col-lg-2">
                <a href="<?php echo Routes::getBaseUrl(); ?>ticket_booking" target="_blank">
                <img src="images/mascot-icon3.png" alt="dazzlin star ticket booking" class="mascot-icons" />
                </a>
              </div>
              <div class="col-lg-10">
                <span>
                  <a href="<?php echo Routes::getBaseUrl(); ?>ticket_booking" target="_blank">Buy Tickets</a>
                </span>
                <p>Entry Pass, Fast Pass, Season Pass - we have them all, with massive discount.</p>
              </div>
            </div>
            </div>
          </div>
        </div>
        <p class="alert alert-success">
          The park is open 7 days a week and is operational between
          08:00 AM to 09:00 PM, but the timing of rides and restaurants might vary.
        </p>
      </div>
    </div>
  </div>
</div>
</div>
