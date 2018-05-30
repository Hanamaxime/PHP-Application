<div class="container-fluid">
    <div class="dining-banner events-banner">

    </div>
</div>
<div class="container marketing">
<div class="row featurette">
    <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading"><?= AndreiController::$viewBag['event']->event_title; ?></h2>
        <p class="lead"><?= AndreiController::$viewBag['event']->event_description; ?></p>
        <small class="text-muted"><?php echo date("F j, Y", strtotime(AndreiController::$viewBag['event']->event_date_start)); ?></small>
        <a href="<?php echo Routes::getBaseUrl(). 'bookEvent/'.AndreiController::$viewBag['event']->ID; ?>" class="gold-btn" title="Book your visit to this event">BOOK THIS EVENT</a><br/>
<!--        <a class="gold-btn">Book your visit</a><br/>-->
        <a class="btn btn-info" href="<?php echo Routes::getBaseUrl(). 'events'; ?>" title="Go back to all events">Back to Event Calendar</a>
    </div>
    <div class="col-md-5 order-md-1">
        <img class="featurette-image img-fluid mx-auto" src="<?= Routes::getBaseUrl() . AndreiController::$viewBag['event']->event_img; ?>" alt="<?php echo AndreiController::$viewBag['event']->event_title; ?>"
             title="<?php if (isset(AndreiController::$viewBag['event']->meta_key)) {
                 if ('credit' == AndreiController::$viewBag['event']->meta_key) {
                     echo AndreiController::$viewBag['event']->meta_value;
                 }
             }   ?>">
    </div>
</div>
</div>
