<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Feedback Form</title>
</head>

<body>
    <div class="form_container">
        <h1>Feedback Form</h1>
        <form action='process.php' method='POST'>
            <label for="name">Your Name (optional):</label>
            <input type="text" id="name" name="name">
            <label for="course">Course Title:</label>
            <select id="course" name="course">
                <option>PHP Track</option>
                <option>JS Track</option>
                <option>HTML & CSS Track</option>
                <option>Python Track</option>
            </select>
            <label for="rate">Given Score(1-10):</label>
            <select id="rate" name="rate">
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
            <label for="reason">Reason:</label>
            <textarea id="reason" name="reason"></textarea>
            <input type="submit">
        </form>
    </div>
</body>

</html>