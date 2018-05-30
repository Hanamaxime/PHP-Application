<div class="container-fluid">
  <div class="dining-banner">
    <div class="headliner">
      <div class="headliner-content">
        <h1>5 Stars Pizzeria</h1>
        <p class="related">
          From the heart of Italy, and the streets of Naples.
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
              <span><a href="<?= Routes::getBaseUrl() . "home"; ?>"><i class="fas fa-home"></i></a> / visit / <a href="<?= Routes::getBaseUrl() . "dining"; ?>">dining</a> /  <a href="<?= Routes::getBaseUrl() . "dining1"; ?>">5 stars pizzeria</a></span>
              <div class="row">
                <div class="col-lg-8">
                    <h2 id="desc">5 Stars Pizzeria</h2>
                      <p>Enjoy some of the most exquisite and authentic Italian pizzas
                        with your friends and family at 5 Stars Pizzeria located in  Dazzlin
                        Star Island Amusement Park.
                      </p>
                <div class="row">
                <div class="col-lg-12 text-center">
                  <img class="img-fluid" src="images/dining1-banner.png" />
                </div>
                </div>
                <br/>
              <!-- COMBO 1 -->
              <div class="row">
                <div class="col-lg-2 text-center">
                  <img class="img-fluid" src="images/combo1.png" alt="Combo Image" />
                </div>
                <div class="col-lg-8">
                  <p><strong>Combo 1</strong></p>
                    <p>Two slices of our famous Marinara pizza with
                      extra sauce, sliced garlic, oregano, parmesan,
                      chili flakes. Comes with a side garden salad with
                      house dressing and beverage.
                    </p>
                </div>
                <div class="col-lg-2">
                  <p>$15.99</p>
                </div>
              </div>

              <!-- COMBO 2 -->
              <div class="row">
                <div class="col-lg-2 text-center">
                  <img class="img-fluid" src="images/combo2.png" alt="Combo Image" />
                </div>
                <div class="col-lg-8">
                  <p><strong>Combo 2</strong></p>
                    <p>Two slices of our famous Diavola pizza with tomato, spicy
                      salami, mozzarella, chili,
                      onion and kalamata olives. Comes with a side garden salad
                      with house dressing and beverage.
                    </p>
                </div>
                <div class="col-lg-2">
                  <p>$15.99</p>
                </div>
              </div>

              <!-- COMBO 3 -->
              <div class="row">
                <div class="col-lg-2 text-center">
                  <img class="img-fluid" src="images/combo3.png" alt="Combo Image" />
                </div>
                <div class="col-lg-8">
                  <p><strong>Combo 3</strong></p>
                    <p>Two slices of our famous Melanzane pizza with tomato,
                      basil, garlic, oregano, thyme, mozzarella and whipped ricotta.
                      Comes with a side garden salad with house dressing and beverage.
                    </p>
                </div>
                <div class="col-lg-2">
                  <p>$15.99</p>
                </div>
              </div>

              <!-- COMBO 4 -->
              <div class="row">
                <div class="col-lg-2 text-center">
                  <img class="img-fluid" src="images/combo4.png" alt="Combo Image" />
                </div>
                <div class="col-lg-8">
                  <p><strong>Combo 4</strong></p>
                    <p>Two slices of our famous Hawaiana pizza with tomato, basil,
                      mozzarella, pineapple, jalapeno, double smoked bacon and ham.
                      Comes with a side garden salad with house dressing and beverage.
                    </p>
                </div>
                <div class="col-lg-2">
                  <p>$15.99</p>
                </div>
              </div>
          </div>

          <div class="col-lg-1">
          </div>


          <div class="col-lg-3">
            <h3 class="text-center">WEEKLY POLLS</h3>
              <?php
              $polls = array();
              $polls['total'] = 0;
              $i = 0;
              foreach (AndreiController::getPollResults() as $results) {
              //        echo "poll ID " . $results->poll_id . " has " . $results->total_votes . " votes<br/>";
              $name = AndreiController::getPollById($results->poll_id);
              $polls[$i]['poll_name'] = $name->poll_title;
              $polls[$i]['poll_id'] = $results->poll_id;
              $polls[$i]['total_votes'] = $results->total_votes;
              $polls['total'] += $results->total_votes;
              $i++;
              }
              // calculate total and precentages
              for ($i = 0; $i < 3; $i++) {
              $polls[$i]['percent'] = ($polls[$i]['total_votes'] / $polls['total']) * 100;
              }

              ?>

              <div id="bar-chart">
                  <div class="graph">
                      <ul class="y-axis">
                          <li><span>100</span></li>
                          <li><span>75</span></li>
                          <li><span>50</span></li>
                          <li><span>25</span></li>
                          <li><span>0</span></li>
                      </ul>
                      <div class="bars">
                          <div class="bar-group">
                              <?php
                              for ($i = 0; $i < 3; $i++) {
                                  ?>
                                  <div class="bar bar-<?php echo $i + 1; ?> stat-<?php echo $i + 1; ?>" style="height: <?php echo $polls[$i]['percent']; ?>%;">
                                      <span><?php echo $polls[$i]['total_votes']; ?></span>
                                  </div>
                                  <?php
                              }
                              ?>
                          </div>
                      </div>
                  </div>
                  <?php
                  for ($i = 0; $i < 3; $i++) {
                      ?>
                      <div class="legend">
                          <div class="legend__col legend__col-<?= $i; ?>">
                              <?php echo $polls[$i]['poll_name'], ", votes: ", $polls[$i]['total_votes']; ?>
                              <?php //echo $polls[$i]['total_votes']; ?>
                          </div>

                      </div>
                      <?php
                  }
                  ?>
                  <a class="btn btn-light" href="<?php echo Routes::getBaseUrl(). 'polls'; ?>">See all polls</a>

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
