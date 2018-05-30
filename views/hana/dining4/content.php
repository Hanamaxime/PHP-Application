<div class="container-fluid">
  <div class="dining-banner">
    <div class="headliner">
      <div class="headliner-content">
        <h1>Viva Mexico Cafe</h1>
        <p class="related">
          Missing the Festivities of Día de Muertos? We celebrate that each day!
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
                            <span><a href="<?= Routes::getBaseUrl() . "home"; ?>"><i class="fas fa-home"></i></a> / visit / <a href="<?= Routes::getBaseUrl() . "dining"; ?>">dining</a> /  <a href="<?= Routes::getBaseUrl() . "dining4"; ?>">viva mexico cafe</a></span>
                <div class="row">
                  <div class="col-lg-8">
                    <h2 id="desc">Viva Mexico Cafe</h2>
                      <p>
                        Immerse yourself in the soulful experience with authentic
                        mexican dishes offered at Viva Mexico Cafe. For the month
                        of April, enjoy attractive discounts at all the combos.
                      </p>
                <div class="row">
                <div class="col-lg-12 text-center">
                  <img class="img-fluid" src="images/dining4-banner.png" />
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
                    <p>
                      The Starter Combo. Tacos, choose either Veggie, Beef,
                      Chicken or Pulled Pork Enchiladas, choose between Veggie,
                      Cheese, Beef, Pulled Pork or Chicken. Served with mexican
                      rice and a cold beverage of your choice.
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
                    <p>
                      Fajitas Combo. Tender marinated strips of grilled chicken
                      with sweet red peppers, green peppers and red onions
                      served to you on a sizzling platter with warm tortillas.
                      Served with mexican rice and a cold beverage of your choice.
                    </p>
                </div>
                <div class="col-lg-2">
                  <p>$16.99</p>
                </div>
              </div>

              <!-- COMBO 3 -->
              <div class="row">
                <div class="col-lg-2 text-center">
                  <img class="img-fluid" src="images/combo3.png" alt="Combo Image" />
                </div>
                <div class="col-lg-8">
                  <p><strong>Combo 3</strong></p>
                    <p>
                      Burrito Combo. Spicy servings of juicy meats, cheeses
                      and refried beans wrapped in a soft flour tortilla with
                      tomato, onion, green pepper and cheddar cheese. Served with
                      mexican rice and a cold beverage of your choice.
                    </p>
                </div>
                <div class="col-lg-2">
                  <p>$17.99</p>
                </div>
              </div>

              <!-- COMBO 4 -->
              <div class="row">
                <div class="col-lg-2 text-center">
                  <img class="img-fluid" src="images/combo4.png" alt="Combo Image" />
                </div>
                <div class="col-lg-8">
                  <p><strong>Combo 4</strong></p>
                    <p>
                      Barbacoa Combo. Diced pork & beef marinated and cooked in
                      our own tangy barbecue sauce wrapped in a flour tortilla
                      with green bell peppers, tomato, onion, mushrooms and
                      cheddar cheese. Served with mexican rice and a cold beverage
                      of your choice.
                    </p>
                </div>
                <div class="col-lg-2">
                  <p>$18.99</p>
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
