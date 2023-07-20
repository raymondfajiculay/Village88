<div class="container mt-5">
    <div class="position-relative">
        <h1>Your money: <?php echo $money; ?></h1>
        <h2>Chance Left: <?php echo $chance; ?></h2>
        <a href="/reset" class="btn btn-danger position-absolute top-0 end-0">Reset Game</a>
    </div>
    <div class="d-flex mt-5 gap-1">
        <form class="card text-center col-3 p-3" action="/bet" method="POST">
            <p>Low Risk</p>
            <input type="hidden" name="loss" value="-25">
            <input type="hidden" name="gain" value="100">
            <input type="hidden" name="risk" value="Low-Risk">
            <input type="submit" value="Bet" class=" btn btn-primary">
            <p>by -25 up to 100</p>
        </form>
        <form class=" card text-center col-3 p-3" action="/bet" method="POST">
            <p>Moderate Risk</p>
            <input type="hidden" name="loss" value="-100">
            <input type="hidden" name="gain" value="1000">
            <input type="hidden" name="risk" value="Moderate-Risk">
            <input type="submit" value="Bet" class=" btn btn-primary">
            <p>by -100 up to 1000</p>
        </form>
        <form class="card text-center col-3 p-3" action="/bet" method="POST">
            <p>High Risk</p>
            <input type="hidden" name="loss" value="-500">
            <input type="hidden" name="gain" value="2500">
            <input type="hidden" name="risk" value="High-Risk">
            <input type="submit" value="Bet" class=" btn btn-primary">
            <p>by -500 up to 2500</p>
        </form>
        <form class=" card text-center col-3 p-3" action="/bet" method="POST">
            <p>Severe Risk</p>
            <input type="hidden" name="loss" value="-3000">
            <input type="hidden" name="gain" value="5000">
            <input type="hidden" name="risk" value="Severe-Risk">
            <input type="submit" value="Bet" class=" btn btn-primary">
            <p>by -3000 up to 5000</p>
        </form>
    </div>
    <div class="border rounded p-4 mt-5">
        <h3>Game Host:</h3>
        <div class="border rounded p-2 overflow-auto" style="height: 20rem">
            <?php if (isset($logs)) {
                foreach ($logs as $log) : ?>
                    <p class="text-<?= $log['color'] ?>"><?php echo $log["log"]; ?></p>
            <?php endforeach;
            } ?>
        </div>
    </div>
</div>