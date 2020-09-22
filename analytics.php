<?php
include "includes/header.php";
include "includes/admin_header.php";
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
                        </div>
                        <div class="col-md-6">
                            <canvas id="site-stay-time"></canvas>
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
                        <tr>
                            <th scope="row">1</th>
                            <td>POST TITLE1</td>
                            <td>POST TIME1</td>
                            <td>25</td>
                        </tr>

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
                        <tr>
                            <th scope="row">1</th>
                            <td>POST TITLE1</td>
                            <td>POST TIME1</td>
                            <td>25</td>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</body>
<?php
include "includes/footer.php";
?>
