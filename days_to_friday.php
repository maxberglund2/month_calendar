<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Date</title>
</head>
<body>
    <form action="#" method="post">
        <input type="date" name="dateInput" id="dateInput">
        <input type="submit" name="submit" value="ok">
    </form>
    <?php
        if (isset($_POST['submit'])) {
            $date = $_POST['dateInput'];
            $daysToFriday = 5 - date('w', strtotime($date)); 
            if ($daysToFriday === 0) {
                echo '<img src="https://media1.giphy.com/media/zhgv3yoOa9epXtNdxH/giphy.gif?cid=790b7611rbl9luymwydcafq6lstdcd51a2n05704zo8esqrq&ep=v1_gifs_search&rid=giphy.gif&ct=g" alt="Penguin jumping!" width="480" height="480">';
            } else {
                echo "<p>$daysToFriday</p>";
            }
        }
    ?>
</body>
</html>