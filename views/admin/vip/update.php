<div class="container">
    <h1>Vip tour</h1>
    <hr>
    <div class="err_msg"><?php echo YuriyController::$viewBag['err_msg']; ?></div>
    <form action="#" method="post">
        <fieldset>
            <legend>Details</legend>

            <input type="hidden" name="id" value="<?php echo YuriyController::$viewBag['id']; ?>"/>


            <div class="form-group">
                <label for="licence_plate">Name</label>
                <input type="text" class="form-control" name="name" value="<?php if (isset(YuriyController::$viewBag['name'])) echo YuriyController::$viewBag['name']; ?>">
            </div>

            <div class="form-group">
                <label for="date_of_visit">Date of visit</label>
                <input type="date" class="form-control" name="date_of_visit" value="<?php if (isset(YuriyController::$viewBag['date_of_visit'])) echo YuriyController::$viewBag['date_of_visit']; ?>">
            </div>

            <div class="form-group">
                <label for="vehicle_type">Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php if (isset(YuriyController::$viewBag['phone'])) echo YuriyController::$viewBag['phone']; ?>">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" value="<?php if (isset(YuriyController::$viewBag['email'])) echo YuriyController::$viewBag['email']; ?>">
            </div>

            <div class="form-group">
                <label for="charged">Charged</label>
                <input type="text" class="form-control" name="charged" value="<?php if (isset(YuriyController::$viewBag['charged'])) echo YuriyController::$viewBag['charged']; ?>"/>
            </div>

            <input type="submit" class="btn btn-success" value="Update vip" name="btnSubmit" title="Update this vip"/>

            <a href="<?php echo Routes::getBaseUrl(); ?>vip_admin" class="btn btn-primary" title="Go back to all vips">Go back</a>
        </fieldset>
    </form>
</div>