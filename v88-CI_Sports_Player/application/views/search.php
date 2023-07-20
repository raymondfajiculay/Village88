<main class="container d-flex">
    <div class="side-bar d-flex flex-column p-2">
        <form action="search" method="POST" class="form">
            <div class="form-group mt-3">
                <label for="name" class="form-label">Search Users</label>
                <input type="text" class="form-control" placeholder="name" name="name" id="name">
            </div>
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" value="female" id="female" name="female">
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="male" id="male" name="male">
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-group mt-3">
                <label class="form-label">Sports</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="basketball" id="basketball" name="basketball">
                <label class="form-check-label" for="basketball">
                    Basketball
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="volleyball" id="volleyball" name="volleyball">
                <label class="form-check-label" for="volleyball">
                    Volleyball
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="baseball" id="baseball" name="baseball">
                <label class="form-check-label" for="baseball">
                    Baseball
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="soccer" id="soccer" name="soccer">
                <label class="form-check-label" for="soccer">
                    Soccer
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="football" id="football" name="football">
                <label class="form-check-label" for="football">
                    Football
                </label>
            </div>
            <div class="form-group mt-3 text-center">
                <input type="submit" value="Search" class="btn btn-primary">
            </div>
        </form>
    </div>
    <div class="d-flex flex-wrap gap-3 mt-5">
        <?php
        if (isset($results)) {
            foreach ($results as $result) { ?>
                <div style="width:120px;">
                    <img class="img-fluid" src="<?= $result->image_url ?>" style="width:100%; height:120px">
                    <p><?= $result->athlete_name ?></p>
                </div>
        <?php    }
        }
        ?>
    </div>
</main>