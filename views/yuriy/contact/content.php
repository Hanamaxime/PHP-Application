<div class="container-fluid">
  <div class="contact-banner">
    <div class="headliner">
      <div class="headliner-content">
        <h1>We are here to help</h1>
        <p class="related">
          You can call, email or visit, we will provide answers to all your questions.
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
              <span><i class="fas fa-home"></i> / support / contact</span>
              <h2 id="desc">Contact Us</h2>
                <p>
                  Dazzlin Star Island is a 210-acre theme park located in Woodbine
                  Racetrack, Toronto, approximately 20 kilometres north of Downtown.
                  To get in touch with us, you can call, email or visit our amusement
                  park. We will try our best to respond to all of your queries asap!
                </p>
                <div class="row">
                  <div class="col-lg-7">
                    <div class="row">
                      <!--Contact Field 1: Address -->
                      <div class="col-lg-2 text-center">
                        <img class="img-fluid contact-icon" src="images/contact-icon1.png" />
                      </div>
                      <div class="col-lg-10 alert alert-primary">
                        <span>ADDRESS</span>
                        <p>
                          Dazzlin Star Island Amusement Park <br />
                          WB Racetrack, 555 Rexdale Blvd, Toronto, ON M9W 5L2
                        </p>
                      </div>
                      <!--Contact Field 2: Helpline -->
                      <div class="col-lg-2 text-center">
                        <img class="img-fluid contact-icon" src="images/contact-icon2.png" />
                      </div>
                      <div class="col-lg-10 alert alert-primary">
                        <span>HELPLINE</span>
                        <p>
                          +1-647-213-5432/33/34<br />
                          +1-416-124-3215/16/17
                        </p>
                      </div>
                      <!--Contact Field 3: Email -->
                      <div class="col-lg-2 text-center">
                        <img class="img-fluid contact-icon" src="images/contact-icon3.png" />
                      </div>
                      <div class="col-lg-10 alert alert-primary">
                        <span>EMAIL</span>
                        <p>
                          info@dazzlin.xyz (for general queries) <br />
                          pr@dazzlin.xyz (for PR/ marketing queries)
                        </p>
                      </div>
                      <!--Contact Field 4: Facebook -->
                      <div class="col-lg-2 text-center">
                        <img class="img-fluid contact-icon" src="images/contact-icon4.png" />
                      </div>
                      <div class="col-lg-10 alert alert-primary">
                        <span>FACEBOOK</span>
                        <p>
                          Like and follow our <a href="https://www.facebook.com/dazzlinstarisland"  target="_blank">page</a><br />
                          Our community is active between 6 AM to 10 PM for Q/A.
                        </p>
                      </div>
                      <!--Contact Field 5: Twitter -->
                      <div class="col-lg-2 text-center">
                        <img class="img-fluid contact-icon" src="images/contact-icon5.png" />
                      </div>
                      <div class="col-lg-10 alert alert-primary">
                        <span>TWITTER</span>
                        <p>
                          Follow us on <a href="https://twitter.com/@dazzlin_island" target="_blank">@dazzlin_island</a><br />
                          Our community is active between 6 AM to 6 PM for Q/A.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-5">
                    <h3 class="text-center">Send us your queries</h3>
                  <form id="" action="#" method="post" class="contact-form">
                    <fieldset>
                        <div class="form-group">
                            <span id="name_err" class="error"><?php echo $data['errMsg']; ?></span>
                        </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="<?php echo $data['name']; ?>"/
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" value="<?php echo $data['email']; ?>"/>
                      </div>
                      <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input class="form-control" type="text" name="phone" id="phone" value="<?php echo $data['phone']; ?>"/>
                      </div>
                      <div class="form-group">
                        <label for="subject">Subject</label>
                        <input class="form-control" type="text" name="subject" id="subject" value="<?php echo $data['subject']; ?>"/>
                      </div>
                      <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" class="form-control"><?php echo $data['message']; ?></textarea>
                      </div>
                      <div class="form-group text-center">
                        <input class="btn btn-success" type="submit" value="SUBMIT" name="SUBMIT" id="SUBMIT" />
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
