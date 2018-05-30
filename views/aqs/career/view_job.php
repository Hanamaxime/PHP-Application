<?php foreach(AqsController::$viewBag['job_detail'] as $item): ?>
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
              <span><i class="fas fa-home"></i> / support / careers / <?php echo $item->job_title; ?></span>
              <h2 id="desc"><?php echo $item->job_title; ?></h2>
                <p>
                  For the available job position of <?php echo $item->job_title; ?>
                  at Dazzlin Star Island Amusement Park, these are the requirements
                  and specifications. If you are interested, you can fill-in the
                  application form below.
                </p>

        <h3>Job Requirements</h3>
        <p><?php echo $item->job_requirements; ?></p>

        <h3>Job Benefits</h3>
        <p><?php echo $item->job_benefits; ?></p>

        <h3>Employer Contact</h3>
        <p>
          Email: <a href="mailto:careers@dazzlin.xyz">careers@dazzlin.xyz</a>
        </p>
        <p>
          Phone: +1-647-432-3246/47/48
        </p>
        <h3>Last Date to Apply</h3>
        <p>
          <?php echo $item->job_expire_date; ?>
        </p>
        <a href="#" id="apply-btn" class="btn btn-primary">APPLY NOW</a>
        <br>
        <form action="#" class="application-frm contact-form" method="post">

          <h3>Personal Data</h3>
        <div class="form-group">
            <label for="fullname">Full Name *</label>
            <input type="text" class="form-control" maxlength="50" name="fullname" id="fullname" placeholder="Enter full name">
        </div>
        <div class="form-group">
            <label for="address">Current Address *</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Enter complete address">
        </div>
        <div class="form-group">
            <label for="phone">Phone Number *</label>
            <input type="text" class="form-control" maxlength="10" name="phone" id="phone" placeholder="Enter current mobile number">
        </div>
        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" class="form-control" maxlength="50" name="email" id="email" placeholder="Enter email address">
        </div>


        <h3>Application Form</h3>

            <p>Answer all questions completely and accurately. Notify the Human
              Resources Department of all changes of address. This application is
              valid for a period of one year and may be renewed by request.</p>
            <div>
                <input type="hidden" id="job_id" name="job_id" value="<?php echo $item->id; ?>" />
            </div>
            <div class="form-group">
                <label>How did you learn about this job position? * </label>
                <select name="hearfrom_list" id="hearfrom_list" class="form-control">
                    <option value="Newspaper">Newspaper</option>
                    <option value="Technical Journal">Technical Journal</option>
                    <option value="Family/Friends">Family/Friends</option>
                </select>
            </div>
            <div class="form-group">
                <label for="available_date">Start Date Availability *</label>
                <input type="date" class="form-control datepicker" name="available_date" id="available_date" placeholder="Pick your available start date">
            </div>
            <div class="form-group">
                <label for="resume_url">LinkedIn Profile Link (optional)</label>
                <input type="text" id="resume_url" class="form-control" maxlength="255" name="resume_url" placeholder="e.g. https://ca.linkedin.com/in/aqs-malhotra-381b7752">
            </div>

            <span>Notice & Consent</span>
            <p>We are collecting your personal information on this form to determine your suitability for the position you have applied for and, if we hire you, for the purpose of our employment relationship. We will use and disclose your personal information only for those purposes or as permitted or required by law.</p>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="agreement_box" id="agreement_box"> By submitting this form, you consent to our collecting, using and disclosing your personal information for these purposes. If you have any questions about this, you may contact the Human Resources Department
                </label>
            </div>
            <div class="err_msg">
              <?php echo AqsController::$viewBag['err_msg']; ?>
            </div>
            <input type="submit" id="btn-submit-app" name="btnApplicantSubmit" class="btn btn-success" value="Submit Application" />
        </form>
        </div>

  </div>
</div>
</div>
</div>
</div>

<?php endforeach; ?>



<script>
  $(function() {
    $('.application-frm').hide();
    $('body').on('click','#apply-btn', function() {
      event.preventDefault();
      $('.application-frm').toggle(500);
    })

    $('.application-frm').on('submit', function() {
      var fullname = $('#fullname').val();
      var address = $('#address').val();
      var phone = $('#phone').val();
      var email = $('#email').val();
      var hearfrom_list = $('#hearfrom_list').val();
      var available_date = $('#available_date').val();
      var resume_url = $('#resume_url').val();

      //validation
      if(fullname == "") {
        alert("Your name is required!");
        $('#fullname').focus();
        return false;
      }else if(address == "") {
        alert("Your address is required!");
        $('#address').focus();
        return false;
      }else if(phone == "") {
        alert("Your contact number is required!");
        $('#phone').focus();
        return false;
      }else if(email == "") {
        alert("Your email is required!");
        $('#email').focus();
        return false;
      }else if(hearfrom_list == "") {
        alert("Please choose one of the options provided!");
        $('#hearfrom_list').focus();
        return false;
      }else if(available_date == "") {
        alert("Your choose start date of your first shift!");
        $('#available_date').focus();
        return false;
      }else if(resume_url == "") {
        alert("Your LinkedIn profile link is required!");
        $('#resume_url').focus();
        return false;
      }else if($('#agreement_box').prop( "checked" ) == false){
        alert("Please check terms and conditions checkbox before submitting your application!");
        return false;
      }else{
        alert("Thanks for submitting your application. We will contact you shortly!");
        return true;
      }

    });





  });
</script>
