<?php

namespace app\views;

class TodoView {
    private static $contentPage;

    public static function renderTodoView() {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>dev101</title>
            <link rel="stylesheet" href="http://localhost/todo/public/css/bootstrap.min.css">
            <link rel="stylesheet" href="http://localhost/todo/public/css/reset.css">
            <link rel="stylesheet" href="http://localhost/todo/public/css/style.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        </head>

        <body>
            <div class="main rounded-4 p-5">
                <header class="todoHeader">
                    <h1 class="title display-1">to<span id="title1">do.</span></h1>
                    <div class="profile">
                        <h6><?= ucfirst($_SESSION['userName']) ?? '' ?></h6>
                        <img src="http://localhost/todo/public/images/profile.png" width="45">
                    </div>
                </header>

                <div class="container1">

                    <!-- ___________section 1______  -->
                    <div class="part1 mx-1 rounded-4">

                        <!-- _________________Filters part____________________  -->
                        <div>
                            <h4 class="title2 mb-3">Filters</h4>
                            <ul class="list1 fw-semibold">
                                <li class="mb-2 list_item rounded ">
                                    <a href="/todo/tasks"><i class="bi bi-inboxes"></i> All</a>
                                </li>
                            </ul>
                        </div>
                        <!-- _________________End of Filters____________________  -->
                    </div>
                    <!-- ___________End of section 1______  -->

                    <!-- ___________section 2______  -->
                    <div class="part2 mx-3 rounded-4 ">
                        <?= self::$contentPage ?>
                    </div>
                    <!-- ___________End of section 2______  -->

                </div>

            </div>

            <script src="http://localhost/todo/public/js/script.js"></script>

        </body>

        </html>
<?php
    }


    static function setInfo($contentPage) {
        self::$contentPage = $contentPage;
    }
}
