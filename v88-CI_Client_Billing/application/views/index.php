<div class="container">
    <form action="<?php echo base_url(); ?>clients/show" method="POST" class="d-flex p-2 ml-auto gap-2">
        <input type="date" class="form-control" name="start">
        <input type="date" class="form-control" name="end">
        <input type="submit" value="Show" class="btn btn-primary">
    </form>
    <?php
    if (!empty($results)) {
    ?>
        <h1>List of total charges per month:</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $result) { ?>
                    <tr>
                        <td> <?= $result->month ?></td>
                        <td> <?= $result->year ?></td>
                        <td> <?= $result->total_amount ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    <?php } ?>
</div>