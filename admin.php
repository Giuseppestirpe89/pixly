<!doctype html>
<html>

<head>
    <?php
        include("includes/headerAdmin.php");
    ?>
        <?php
        include("includes/head.php");
    ?>

</head>

<body>
    <section id="intro" class="intro-section">
        <div style="width: 75%">
            <canvas id="canvas"></canvas>
            <button id="randomizeData" class="btn btn-primary">Randomize Data</button>
        </div>
        <script>
            var randomScalingFactor = function() {
                return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
            };
            var randomColorFactor = function() {
                return Math.round(Math.random() * 255);
            };

            var barChartData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: 'Most Liked',
                    backgroundColor: "rgba(220,220,220,0.5)",
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
                }, {
                    label: 'Most Shared',
                    backgroundColor: "rgba(151,187,205,0.5)",
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
                }, {
                    label: 'Most Viewed',
                    backgroundColor: "rgba(151,187,205,0.5)",
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
                }]

            };
            window.onload = function() {
                var ctx = document.getElementById("canvas").getContext("2d");
                window.myBar = new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        title: {
                            display: true,
                            text: "Closer look to the Stats"
                        },
                        tooltips: {
                            mode: 'label'
                        },
                        responsive: true,
                        scales: {
                            xAxes: [{
                                stacked: true,
                            }],
                            yAxes: [{
                                stacked: true
                            }]
                        }
                    }
                });
            };

            $('#randomizeData').click(function() {
                $.each(barChartData.datasets, function(i, dataset) {
                    dataset.backgroundColor = 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',.7)';
                    dataset.data = [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()];

                });
                window.myBar.update();
            });
        </script>

        <br />
        <section/>
        <!-- Footer section -->
        <?php
            include("includes/footer.php");
        ?>
</body>

</html>