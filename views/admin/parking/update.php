<div class="container">
    <h1>Parking Contact</h1>
    <hr>
    <div class="err_msg"><?php echo YuriyController::$viewBag['err_msg']; ?></div>
    <form action="#" method="post">
        <fieldset>
            <legend>Details</legend>

            <input type="hidden" name="id" value="<?php echo YuriyController::$viewBag['id']; ?>"/>


            <div class="form-group">
                <label for="licence_plate">License Plate</label>
                <input type="text" class="form-control" name="licence_plate" value="<?php if (isset(YuriyController::$viewBag['licence_plate'])) echo YuriyController::$viewBag['licence_plate']; ?>">
            </div>

            <div class="form-group">
                <label for="date_of_visit">Date of visit</label>
                <input type="date" class="form-control" name="date_of_visit" value="<?php if (isset(YuriyController::$viewBag['date_of_visit'])) echo YuriyController::$viewBag['date_of_visit']; ?>">
            </div>

            <div class="form-group">
                <label for="vehicle_type">Vehicle type</label>
                <input type="text" class="form-control" name="vehicle_type" value="<?php if (isset(YuriyController::$viewBag['vehicle_type'])) echo YuriyController::$viewBag['vehicle_type']; ?>">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" value="<?php if (isset(YuriyController::$viewBag['email'])) echo YuriyController::$viewBag['email']; ?>">
            </div>

            <div class="form-group">
                <label for="charged">Charged</label>
                <input type="text" class="form-control" name="charged" value="<?php if (isset(YuriyController::$viewBag['charged'])) echo YuriyController::$viewBag['charged']; ?>"/>
            </div>

            <input type="submit" class="btn btn-success" value="Update parking" name="btnSubmit" title="Update this parking"/>

            <a href="<?php echo Routes::getBaseUrl(); ?>parking_admin" class="btn btn-primary" title="Go back to all parkings">Go back</a>
        </fieldset>
    </form>
</div>