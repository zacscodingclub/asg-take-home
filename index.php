<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SuperBowl of Crime</title>
        <link rel="stylesheet" href="/assets/css/foundation.min.css">
        <link rel="stylesheet" href="/assets/css/app.css">
    </head>
    <body>
        <!-- Loading -->
        <div class="loading">Loading&#8230;</div>
        <!-- /Loading -->

        <!-- Body -->
        <div class="body-content hide">

            <!-- Team Name -->
            <div class="row">
                <div class="large-12 columns">
                    <h2>The <span id="team-name"></span> are the Most Arrested Team in the NFL</h2>
                </div>
            </div>
            <!-- /Team Name -->

            <!-- Team Stats -->
            <div class="row">
                <div class="large-12 medium-12 columns">
                    <table id="arrest-table" class="hover">
                        <thead>
                            <tr>
                                <th>Arrest Type</th>
                                <th>Number of Arrests</th>
                            </tr>
                        </thead>
                        <tbody id="arrest-body">
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /Team Stats -->
        </div>
        <!-- /Body -->

        <script src="/assets/js/vendor/jquery.js"></script>
        <script src="/assets/js/vendor/foundation.js"></script>
        <script src="/assets/js/app.js"></script>
    </body>
</html>
