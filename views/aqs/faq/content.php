<div class="container-fluid">
  <div class="faq-banner">
    <div class="headliner">
      <div class="headliner-content">
        <h1>We are here to help</h1>
        <p class="related">
          Need to know about parking? tickets? find answers to most frequently
          asked questions in the section below!
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
              <h2 id="desc">Frequently Asked Questions</h2>
                <p>Do you have some queries regarding various activities around Dazzlin
                  Star Island? Check out this list of frequently asked questions (FAQs)
                  with associated answers to get prompt responses.
                </p>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                     <form action="#" method="post" role="search" id="faq-seach-frm" class="search-form">
                         <input type="submit" value="" name="btn-search" id="btn-search" class="search-submit">
                         <input type="search" name="search" id="search" class="search-text" placeholder="Search question..." autocomplete="off">
                     </form>
                 </div>
                 </div>
                 <div class="row">
    	             <div class="col-lg-3 col-md-12 col-sm-12">
                     <ul class="list-group">
                       <?php
                       $results = AqsController::$viewBag['faq_categories'];
                       foreach($results as $item) {
                         echo "<li class='list-group-item faq_cat'><a href='#'>".$item->category_item."</a></li>";
                       }
                        ?>
                     </ul>
                   </div>
                   <div class="col-lg-9 col-md-12 col-sm-12">
                     <div class="accordion faq_search_results">
                       <?php
                       $results = AqsController::$viewBag['faq_lists'];
                       foreach($results as $item) {
                         echo "<div class='accordion-item'>
                            <a href='#/'>".$item->question."</a>
                            <div class='content'>
                              <p>".$item->answer."</p>
                            </div>
                          </div>";
                       }
                      ?>
                </div>
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


<script>
    $(function () {
                $("#faq-seach-frm").submit(function (event) {
            var search = $("#search").val();
            if (search == null || search == "") {
                alert("Please enter question to search...");
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Routes::getBaseUrl(); ?>search_by_question',
                    data: { search: search },
                    success: function (data) {
                    $(".faq_search_results").html(data);
                    }
                    });
                    }
                    event.preventDefault();
                    });


    $("ul.list-group .faq_cat").on('click', function () {
    var cate = $(this).text();
    $.ajax({
        type: 'POST',
        url: '<?php echo Routes::getBaseUrl(); ?>search_by_category',
        data: { category: cate },
        success: function (data) {
            $(".faq_search_results").html(data);
        }
    });
    return false;
});
    });
</script>
