<div class="container-fluid">
  <div class="career-banner">
    <div class="headliner">
      <div class="headliner-content">
        <h1>Join the Dazzlin Family</h1>
        <p class="related">
          From part-time to full-time employment opportunities.
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
              <span><i class="fas fa-home"></i> / support / careers</span>
              <h2 id="desc">Careers</h2>
                <p>
                  DSI Entertainment has been at the center of a number of successful
                  ventures - from event management companies to long-running carnivals.
                  Dazzlin Start Island Amusement Park in Toronto is the flagship
                  enterprise of DSI and will complete 6 glorious years this june.
                </p>

                <h3>WHY JOIN DAZZLIN STAR ISLAND?</h3>
                <p>
                  Thinking much? Join us, you psycho!
                </p>
                <p>
                  Be it a summer job, a part-time gig or a full-time work opportunity, we
                  offer the same level of services and benefits package to all the
                  people who wish to be a part of the Dazzlin Family.
                </p>
                <!--Career Icons -->
                <div class="row">
                  <div class="col-lg-3 text-center">
                    <img class="img-fluid" src="images/career-icon1.png" />
                    <span class="text-center text-uppercase career-icon">Flexible Hours</span>
                    <img class="img-fluid" src="images/career-icon2.png" />
                    <span class="text-center text-uppercase career-icon">Health Coverage</span>
                  </div>
                  <div class="col-lg-3 text-center">
                    <img class="img-fluid" src="images/career-icon3.png" />
                    <span class="text-center text-uppercase career-icon">Service Awards</span>
                    <img class="img-fluid" src="images/career-icon4.png" />
                    <span class="text-center text-uppercase career-icon">Discount Offers</span>
                  </div>
                  <div class="col-lg-3 text-center">
                    <img class="img-fluid" src="images/career-icon5.png" />
                    <span class="text-center text-uppercase career-icon">Bonuses</span>
                    <img class="img-fluid" src="images/career-icon6.png" />
                    <span class="text-center text-uppercase career-icon">Lodging Assistance</span>
                  </div>
                  <div class="col-lg-3 text-center">
                    <img class="img-fluid" src="images/career-icon7.png" />
                    <span class="text-center text-uppercase career-icon">Training & Perks</span>
                    <img class="img-fluid" src="images/career-icon8.png" />
                    <span class="text-center text-uppercase career-icon">Education Assistance</span>
                  </div>
                </div>
                <p>Still not convinced eh? Hear what people have to say about working with us!</span>

                <h3> TESTIMONIALS </h3>
                <p>
                  Most of the people working with dazzlin started at the bottom, working on
                  the rides and stations. There experiences will definitely help you decide better
                  for your future with the park.
                </p>
                <!-- Indicators -->
            	  <ul class="carousel-indicators">
            	    <li data-target="#demo" data-slide-to="0" class="active"></li>
            	    <li data-target="#demo" data-slide-to="1"></li>
            	    <li data-target="#demo" data-slide-to="2"></li>
            	  </ul>
<div id="demo" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
  <div class="carousel-item alert alert-info active">
                <div class="row">
                  <div class="col-lg-3 text-center">
                    <img class="img-fluid img-thumbnail" src="images/testimonial1.png" />
                  </div>
                  <div class="col-lg-9">
                    <br/>
                    <p class="quote-box">
                      No matter what job you are in, leadership is a skill that
                      can be transferred anywhere. You have to be able to put
                      those skills into practice and become what a great leader
                      is to you. I am grateful for everything I have learned and
                      excited to see what else I can learn in future.
                    </p>
                    <span class="quote-author text-left">
                      Jason Clarke, HR Director
                    </span>
                  </div>
                </div>
              </div>
              <div class="carousel-item alert alert-info">
                <div class="row">
                  <div class="col-lg-3 text-center">
                    <img class="img-fluid img-thumbnail" src="images/testimonial2.png" />
                  </div>
                  <div class="col-lg-9">
                    <br/>
                    <p class="quote-box">
                      The skills and qualities I have developed have already helped
                      me to discover my passion for leading and educating. The
                      opportunity to lead young adults has helped me understand
                      my passion for assisting others in becoming the best that
                      they can be.
                    </p>
                    <span class="quote-author text-left">
                      Roberta, Operations Supervisor, Training and Development
                    </span>
                  </div>
                </div>
              </div>
              <div class="carousel-item alert alert-info">
                <div class="row">
                  <div class="col-lg-3 text-center">
                    <img class="img-fluid img-thumbnail" src="images/testimonial3.png" />
                  </div>
                  <div class="col-lg-9">
                    <br/>
                    <p class="quote-box">
                      Working with Dazzlin Star Island over the past 4 years provided me
                      with the opportunity to gain key skills. Today, I manage
                      over 300 associates each season – with an overall understanding
                      of the foods operation and the successes and challenges of
                      various types of restaurants.
                    </p>
                    <span class="quote-author text-left">
                      Jonathan Ross, Food & Beverage Manager
                    </span>
                  </div></div></div>

                </div>
                </div>
                <br/>
<p>Are you fired up now? Here are all the available job postings you can apply for. All the Best.</p>
<h3 class="text-center">OPEN JOB POSTIONS AT DAZZLIN STAR ISLAND</h3>
<div class="col-md-6 offset-md-3">
<table class="table table-bordered">
  <thead>
    <tr>
      <th class="text-center">POSITION</th>
      <th class="text-center">TYPE</th>
      <th class="text-center">STATUS</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach(AqsController::$viewBag['list_jobs'] as $item) : ?>
    <tr>
      <td><?php echo $item->job_title; ?></td>
      <td class="text-center"><?php echo $item->job_type; ?></td>
      <td class="text-center"><a href="<?php echo Routes::getBaseUrl() ?>view_job/<?php echo $item->id; ?>">Apply now</a></td>
    </tr>
  <?php endforeach; ?>
</tbody>
</table>

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
      </div>
    </div>
