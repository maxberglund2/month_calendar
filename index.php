<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Montserrat:ital,wght@0,300;0,400;1,200&family=Roboto+Mono&family=Source+Code+Pro&family=Tilt+Neon&display=swap');
        * {
            margin:0;
            padding:0;
            font-family: 'Montserrat', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            font-family: Arial, sans-serif;
        }
        th, a {
            background-color: black;
            color: white;
            font-weight: bold;
            text-align: left;
            padding: 10px;
            font-size:25px;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:nth-child(odd) {
            background-color: #fff;
        }
        td {
            padding: 10px;
        }
        tr:hover {
            background-color: #ddd;
        }
        nav {
            display:flex;
            justify-content:center;
            margin: 20px;
        }
        a {
            text-decoration:none;
            padding:15px;
            transition:ease-in-out;
            transition-duration:450ms;
            border-radius:5px;
        }
        a:hover {
            letter-spacing: 0.3em;
            border-radius:10px;
        }
    </style>
</head>
<body>
    <?php
        if (isset($_GET['date'])) {
            $date = $_GET['date'];
            $fullYearURL = strtotime($date);
            $currentYear = date("Y", $fullYearURL);
            $currentMonth = date("m", $fullYearURL);
            $currentDate = date("d", $fullYearURL);
        } else {
            $currentYear = date("Y");
            $currentMonth = date("m");
            $currentDate = date('d');
        }
        
        $previousMonth = date("Y-m-d", strtotime('-1 month', strtotime($currentYear . '-' . $currentMonth . '-' . $currentDate)));
        $rightNow = date("Y-m-d");
        $nextMonth = date("Y-m-d", strtotime('+1 month', strtotime($currentYear . '-' . $currentMonth . '-' . $currentDate)));
        
        echo "<nav><a href='http://localhost/TE4/?date=$previousMonth'>←</a><a href='http://localhost/TE4/?date=$rightNow'>Today</a><a href='http://localhost/TE4/?date=$nextMonth'>→</a></nav>";
        
        echoTable($currentYear, $currentMonth);

         function echoTable($currentYear, $currentMonth) {
            $fullYear = strtotime($currentYear . '-' . $currentMonth . '-01');
            $table = "<table><tr><th colspan='3'>" . date('Y M', $fullYear) . "</th></tr>";
            for ($x = 0; $x < date('t', $fullYear); $x++) {
                $eachDay = 1 + $x;
                $selected_date = strtotime($currentYear . '-' . $currentMonth . '-' . $eachDay);
                $dayName = date('D', $selected_date);
                $week = date("W", $selected_date);
                $style = '';
                $stringTag = '';

                if ($dayName == 'Sun') {
                    $style = 'color: red;';
                    $stringTag= "<tr><td style='$style'>" . $eachDay . "</td><td style='$style' colspan='2'>" . $dayName . "</td></tr>";
                } elseif ($dayName == 'Mon') { 
                    $stringTag= "<tr><td >" . $eachDay . "</td><td width='10'>" . $dayName . "</td><td>" . $week . "w</td></tr>";
                } else {
                    $stringTag= "<tr><td width='10'>" . $eachDay . "</td><td colspan=2>" . $dayName . "</td></tr>";
                }
        
                $table .= $stringTag;
            }
            $table .= "</table>";
            echo $table;
        }
    ?>
</body>
</html>
