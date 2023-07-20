<div class="container mt-5">
    <h1 class="text-center mt-3">Feedback Form</h1>
    <form action='feedback/result' method='POST'>
        <div class="form-group mt-3">
            <label for="name">Your Name (optional):</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Juan Pedro">
        </div>
        <div class="form-group mt-3">
            <label for="course">Course Title:</label>
            <select class="form-control" id="course" name="course">
                <option>PHP Track</option>
                <option>JS Track</option>
                <option>HTML & CSS Track</option>
                <option>Python Track</option>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="rate">Given Score(1-10):</label>
            <select class="form-control" id="rate" name="rate">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="reason">Reason:</label>
            <textarea class="form-control" id="reason" name="reason"></textarea>
        </div>
        <div class="mt-3 text-center">
            <input type="submit" class="btn btn-primary">
        </div>
    </form>
</div>