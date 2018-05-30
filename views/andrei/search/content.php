<div class="container-fluid">
    <div class="dining-banner search-banner">
    </div>
</div>
<div class="container">
    <?php
    if (isset($_POST['search-btn'])) {
        ?>
        <h2 class="feature_event_title">Search Results</h2>
        <?php
        if (!empty(AndreiController::searchByTable($_POST['search_term'], $_POST['db_table']))) {
            foreach (AndreiController::searchByTable($_POST['search_term'], $_POST['db_table']) as $item) {

                $link = "";
                $title = "";
                switch ($_POST['db_table']) {
                    case 'polls' :
                        $link = "<a href='" . Routes::getBaseUrl() . "polls/' class='btn btn-sm btn-event'>View result</a>";
                        $title = "Polls";
                        break;
                    case 'events' :
                        $link = "<a href='" . Routes::getBaseUrl() . "viewEvent/" . $item->ID . "' class='btn btn-sm btn-event'>View result</a>";
                        $title = "Events";
                        break;
                    case 'faqs' :
                        $link = "<a href='" . Routes::getBaseUrl() . "faq/' class='btn btn-sm btn-event'>View result</a>";
                        $title = "FAQ";
                        break;
                    case 'giftshop_stores' :
                        $link = "<a href='" . Routes::getBaseUrl() . "giftshop_detail/" . $item->product_category . "/" . $item->id . "' class='btn btn-sm btn-event'>View result</a>";
                        $title = "Gift Shop";
                        break;
                }
                echo "You searched for '" . $_POST['search_term'] . "' and it was found in $title page." . $link . "<br/>";


            }
            echo "<a href='" . Routes::getBaseUrl() . "search/' class='btn btn-sm btn-info'>Back to Search</a>";
        } else {
            echo "Nothing was found, sorry.";
            echo "<a href='" . Routes::getBaseUrl() . "search/' class='btn btn-sm btn-info'>Back to Search</a>";
        }

    } else {

        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="search-txt">What are you looking for?</label>
                <input type="text" class="form-control" name="search_term" id="search-txt"
                       placeholder="Type your search word...">
                <!--            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
            </div>
            <div class="form-group">
                <label for="db_table">Select table where to perform search</label>
                <select name="db_table" id="db_table">
                    <option value="polls">Polls</option>
                    <option value="events">Events</option>
                    <option value="faqs">FAQ questions</option>
                    <option value="giftshop_stores">Giftshop descriptions</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" name="search-btn" value="Search this">
        </form>
        <?php
    }?>
</div>