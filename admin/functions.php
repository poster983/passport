<!--

The MIT License (MIT)

Copyright (c) Wed Jul 06 2016 Joseph Hassell joseph@thehassellfamily.net

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORTOR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
-->

<?




function barChartTally($dep) {
    include "../sqlconnect.php";
    $day = date( 'Y-m-d', strtotime(" Today "));

    $sql = "SELECT tally, date, period, place FROM tally WHERE date = '$day' AND place = '$dep' ORDER BY period";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            $$row["period"] = $row["tally"];

        }
    }
    $tallyBarpre = "barChartTally" . $dep;
    $tallyBar = str_replace(' ', '', $tallyBarpre);
    echo $tallyBar;
    ?>
 <div class="container">
    <div class="row">
      <div class="col s12 m5">
        <div class="card-panel white hoverable">
            <canvas id="<? echo $tallyBar;?>" width="5" height="200"></canvas>
    <script>
    var ctx = document.getElementById("<? echo $tallyBar;?>");
    var <? echo $tallyBar;?> = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["A", "B", "C", "D", "E L1", "E L2", "F", "G", "H"],
        datasets: [{
            //label: '# of Votes',
            data: [<? echo $a;?>, <? echo $b;?>, <? echo $c;?>, <? echo $d;?>, <? echo $eL1;?>, <? echo $eL2;?>, <? echo $f;?>, <? echo $g;?>, <? echo $h;?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(0, 150, 136, 0.2)',
                'rgba(121, 85, 72, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(0, 150, 136, 1)',
                'rgba(121, 85, 72, 1)'
            ],
            borderWidth: 1
        }]
            },
    options: {


        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        legend: {
            display: false,
        },
        title: {
            display: true,
            text: 'Todays Pass Demand'
        }
    }


    });
    </script>

        </div>
      </div>
    </div>
    </div>

<?
}
/*
function lineChartMonth($dep) {
    include "../sqlconnect.php";
     $sqlm = "SELECT tally, MID(date,1,7) AS dates place FROM tally WHERE place = '$dep' ORDER BY date";

    $resultm = $conn->query($sqlm);
    if ($resultm->num_rows > 0) {

        while($rowm = $resultm->fetch_assoc()) {
           /* $premonth = $rowm["date"];
            $monthwd = substr ($premonth,0,7);
            $monthv = str_replace('-', 'l', $monthwd);
            $$month = $monthv
           // $month = $rowm["sdate"];
            $$month = 0;
          //  echo $2016l06;





        }
    }
}
*/
?>
