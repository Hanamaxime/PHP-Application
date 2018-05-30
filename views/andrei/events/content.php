<div class="container-fluid">
    <div class="dining-banner events-banner">
        <div class="headliner">
            <div class="headliner-content">
                <h1>From distant galaxies to starry concerts</h1>
                <p class="related">
                    Check out all the upcoming events here and register too!
                    <a class="gold-btn" href="#eventdesc">VIEW MORE
                        &nbsp;<i class="fas fa-angle-right arrow"></i></a>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="album py-5 bg-light">
    <div class="container">
      <div class="feature-event">
          <span><a href="<?= Routes::getBaseUrl() . "home"; ?>"><i class="fas fa-home"></i></a> / <a href="<?= Routes::getBaseUrl() . "events"; ?>">event calendar</a></span>
            <h2 class="feature_event_title" id="eventdesc">Event Calendar</h2>
            <p>
              If you are visiting the dazzlin star, we recommend looking
              out for latest events on our calendar here. We publish detailed
              information regarding all upcoming events here. You can view
              and register for these events here.
            </p>
            <div class="row">
        <?php
        foreach (AndreiController::$viewBag['events'] as $item) {
            ?>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow event-body">
                    <img class="card-img-top" src="<?= Routes::getBaseUrl() . $item->event_img; ?>" alt="<?php echo $item->event_title; ?>"
                         title="<?php if (isset($item->meta_key)) {
                             if ('credit' == $item->meta_key) {
                                 echo $item->meta_value;
                             }
                         }   ?>">
                    <div class="card-body">
                        <p class="card-text event-text text-uppercase"><?php echo $item->event_title; ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">

                                <a href="<?php echo Routes::getBaseUrl(). 'viewEvent/'.$item->ID; ?>" class="btn btn-sm btn-event" title="View event">VIEW</a>
                                <!--                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>-->
                            </div>
                            <p class="event-date"><?php echo date("F j, Y", strtotime($item->event_date_start)); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
</div></div>
</div>
</div>
