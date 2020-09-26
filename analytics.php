<?php
include "includes/header.php";
include "includes/admin_header.php";
$popularposts = popularposts();
$fixposts = fixposts();
$chart1title = chart1title();
$engagingposts = chart2engaging();
$notengagingposts = chart2notengaging();
?>
<title>Analytics</title>
</head>

<body>

    <div class="container">
        <div class="wrapper">
            <h1 class="text-center">ANALYTICAL VIEW</h1>
            <div class="div-visit-view">
                <div class="card analytics-card">
                    <div class="row">

                        <div class="col-md-6">
                            <canvas id="visit-view"></canvas>
                            <script src="scripts/jquery.js"></script>
                            <script src="scripts/chart.bundle.js"></script>
                            <script>
                                $(document).ready(function() {
                                    var ctx = document.getElementById("visit-view");
                                    var myChart = new Chart(ctx, {
                                        type: "bar",
                                        data: {
                                            labels: [<?php for ($i = 0; $i < sizeof($chart1title); $i++) {
                                                            echo json_encode($chart1title[$i]["post_id"]) . ',';
                                                        }
                                                        ?>],
                                            datasets: [{
                                                label: "# of Views",
                                                data: [<?php for ($i = 0; $i < sizeof($chart1title); $i++) {
                                                            echo json_encode($chart1title[$i]["post_view"]) . ',';
                                                        }
                                                        ?>],
                                                backgroundColor: [
                                                    "rgba(255, 99, 132, 0.2)",
                                                    "rgba(54, 162, 235, 0.2)",
                                                    "rgba(255, 206, 86, 0.2)",
                                                    "rgba(75, 192, 192, 0.2)",
                                                    "rgba(153, 102, 255, 0.2)",
                                                    "rgba(255, 159, 64, 0.2)",
                                                ],
                                                borderColor: [
                                                    "rgba(255, 99, 132, 1)",
                                                    "rgba(54, 162, 235, 1)",
                                                    "rgba(255, 206, 86, 1)",
                                                    "rgba(75, 192, 192, 1)",
                                                    "rgba(153, 102, 255, 1)",
                                                    "rgba(255, 159, 64, 1)",
                                                ],
                                                borderWidth: 1,
                                            }, ],
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true,
                                                    },
                                                }, ],
                                            },
                                        },
                                    });
                                });
                            </script>
                        </div>
                        <div class="col-md-6">
                            <canvas id="site-stay-time"></canvas>
                            <script>
                                $(document).ready(function() {
                                    var ctx2 = document.getElementById("site-stay-time");
                                    var myChart2 = new Chart(ctx2, {
                                        type: "doughnut",
                                        data: {
                                            labels: ["Not Engaging", "Enagaged Posts"],
                                            datasets: [{
                                                label: "# of Votes",
                                                data: [<?php echo json_encode($notengagingposts) ?>, <?php echo json_encode($engagingposts) ?>],
                                                backgroundColor: [
                                                    "rgba(255, 99, 132, 0.2)",
                                                    "rgba(54, 162, 235, 0.2)",
                                                ],
                                                borderColor: ["rgba(255, 99, 132, 1)", "rgba(54, 162, 235, 1)"],
                                                borderWidth: 1,
                                            }, ],
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true,
                                                    },
                                                }, ],
                                            },
                                        },
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="popular-post-list">
                <h1 class="text-center">POPULAR POSTS</h1>
                <table class="table  table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">POST TITLE</th>
                            <th scope="col">POST TIME</th>
                            <th scope="col">TOTAL VIEWS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($popularposts as $popularpost) {
                            echo "  <tr>
                            <th scope='row'>" . $popularpost["post_id"] . "</th>
                            <td>" . $popularpost["post_heading"] . "</td>
                            <td>" . $popularpost["created_at"] . "</td>
                            <td>" . $popularpost["post_view"] . "</td>
                        </tr>";
                        }
                        ?>


                    </tbody>
                </table>
            </div>
            <div class="not-engage-post-list">

                <h1 class="text-center">FIX THESE POSTS</h1>
                <table class="table table-danger">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">POST TITLE</th>
                            <th scope="col">POST TIME</th>
                            <th scope="col">TOTAL VIEWS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($fixposts as $fixpost) {
                            echo "  <tr>
                            <th scope='row'>" . $fixpost["post_id"] . "</th>
                            <td>" . $fixpost["post_heading"] . "</td>
                            <td>" . $fixpost["created_at"] . "</td>
                            <td>" . $fixpost["post_view"] . "</td>
                        </tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <?php
    include "includes/footer.php";
    ?>