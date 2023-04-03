<!DOCTYPE html>
<?php
include_once '../../../../wp-load.php';
$theme_path = get_stylesheet_directory_uri();
?>
<html lang="en">
<head>
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coolturalia</title>
    <link href="<?php echo $theme_path?>/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Metrophobic&family=Work+Sans:ital,wght@0,300;0,700;1,300&display=swap" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

</head>
<body>
<div id="content-mobile">
    <header>
        <a href="<?php echo get_site_url();?>">
            <h1>Coolturalia</h1>
        </a>
        <div class="activeIcons">
            <svg width="23px" height="23px" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:#2e2f42;}</style></defs><title/>
                <g data-name="Layer 2" id="Layer_2"><g id="Export">
                        <path class="cls-1" d="M64,3A61,61,0,1,1,3,64,61.06,61.06,0,0,1,64,3m0-3a64,64,0,1,0,64,64A64,64,0,0,0,64,0Z"/>
                        <path class="cls-1" d="M51.13,59.24a1.51,1.51,0,0,1-1.32-.79,6.39,6.39,0,0,0-11.27,0A1.5,1.5,0,0,1,35.89,57a9.39,9.39,0,0,1,16.56,0,1.5,1.5,0,0,1-.61,2A1.53,1.53,0,0,1,51.13,59.24Z"/>
                        <path class="cls-1" d="M79,59.24A1.51,1.51,0,0,1,77.63,57a9.39,9.39,0,0,1,16.56,0,1.5,1.5,0,1,1-2.64,1.42,6.39,6.39,0,0,0-11.27,0A1.51,1.51,0,0,1,79,59.24Z"/>
                        <path class="cls-1" d="M64,103.07c-6.33,0-11.75-4.07-12.61-9.46a2,2,0,0,1,0-.23V75.83a1.5,1.5,0,0,1,1.5-1.5H75.13a1.5,1.5,0,0,1,1.5,1.5V93.38a2,2,0,0,1,0,.23C75.75,99,70.33,103.07,64,103.07Zm-9.63-9.82c.69,3.89,4.8,6.82,9.63,6.82s8.94-2.93,9.63-6.82V77.33H54.37Zm20.76.13h0Z"/>
                    </g></g>
            </svg>
            <a href="<?php echo $theme_path?>/HTML/options.php" id="optionsIcon">
                <div class="one"></div>
                <div class="two"></div>
                <div class="three"></div>
            </a>
        </div>
    </header>
    <main>
        <div class="infoContainer">
            <div class="infoEvent">
                <h3>Hello, username!</h3>
                <h3>Do you feel <br> curious today?</span></h3>
            </div>
        </div>
        <div id="container">
            <div id="highlights">
                <h2>Just for you</h2>
                <hr>
                <div class="eventsDetails">
                    <div class="owl-carousel owl-theme">
                        <a href="<?php echo $theme_path?>/HTML/personalEvent.php">
                            <div class="eventCard">
                                <div class="item">
                                    <svg fill="#fff" height="50px" width="50px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.9 491.9" xml:space="preserve">
                                    <g><g><path d="M441.249,0h-390.4c-28,0-50.8,22.8-50.8,50.8v390.4c0,28,22.8,50.7,50.7,50.7h390.4c28,0,50.7-22.8,50.7-50.7V50.8
                                                C492.049,22.8,469.249,0,441.249,0z M432.349,304l-77-77c-4.3-4.3-11.4-4.3-15.7,0l-55.9,55.9l-96.7-96.7
                                                c-4.3-4.3-11.4-4.3-15.7,0l-111.6,111.4V59.7h372.6V304z"/><circle cx="297.049" cy="139.9" r="42.9"/></g></g>
                                    </svg>
                                </div>
                                <h3 class="EventName">Event Name</h3>
                                <span>Day/Month/Year</span>
                                <br>
                                <span>#Category 1</span>
                            </div>
                        </a>
                        <div class="eventCard">
                            <div class="item">
                                <svg fill="#fff" height="50px" width="50px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.9 491.9" xml:space="preserve">
                                <g><g><path d="M441.249,0h-390.4c-28,0-50.8,22.8-50.8,50.8v390.4c0,28,22.8,50.7,50.7,50.7h390.4c28,0,50.7-22.8,50.7-50.7V50.8
                                            C492.049,22.8,469.249,0,441.249,0z M432.349,304l-77-77c-4.3-4.3-11.4-4.3-15.7,0l-55.9,55.9l-96.7-96.7
                                            c-4.3-4.3-11.4-4.3-15.7,0l-111.6,111.4V59.7h372.6V304z"/><circle cx="297.049" cy="139.9" r="42.9"/></g></g>
                                </svg>
                            </div>
                            <h3 class="EventName">Event Name</h3>
                            <span>Day/Month/Year</span>
                            <br>
                            <span>#Category 1</span>
                        </div>
                        <div class="eventCard">
                            <div class="item">
                                <svg fill="#fff" height="50px" width="50px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.9 491.9" xml:space="preserve">
                                <g><g><path d="M441.249,0h-390.4c-28,0-50.8,22.8-50.8,50.8v390.4c0,28,22.8,50.7,50.7,50.7h390.4c28,0,50.7-22.8,50.7-50.7V50.8
                                            C492.049,22.8,469.249,0,441.249,0z M432.349,304l-77-77c-4.3-4.3-11.4-4.3-15.7,0l-55.9,55.9l-96.7-96.7
                                            c-4.3-4.3-11.4-4.3-15.7,0l-111.6,111.4V59.7h372.6V304z"/><circle cx="297.049" cy="139.9" r="42.9"/></g></g>
                                </svg>
                            </div>
                            <h3 class="EventName">Event Name</h3>
                            <span>Day/Month/Year</span>
                            <span>#Category 1</span>
                        </div>
                        <div class="eventCard">
                            <div class="item">
                                <svg fill="#fff" height="50px" width="50px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.9 491.9" xml:space="preserve">
                                <g><g><path d="M441.249,0h-390.4c-28,0-50.8,22.8-50.8,50.8v390.4c0,28,22.8,50.7,50.7,50.7h390.4c28,0,50.7-22.8,50.7-50.7V50.8
                                            C492.049,22.8,469.249,0,441.249,0z M432.349,304l-77-77c-4.3-4.3-11.4-4.3-15.7,0l-55.9,55.9l-96.7-96.7
                                            c-4.3-4.3-11.4-4.3-15.7,0l-111.6,111.4V59.7h372.6V304z"/><circle cx="297.049" cy="139.9" r="42.9"/></g></g>
                                </svg>
                            </div>
                            <h3 class="EventName">Event Name</h3>
                            <span>Day/Month/Year</span>
                            <span>#Category 1</span>
                        </div>

                    </div>
                </div>
            </div>
            <div id="categories">
                <div id="categoriesHead">
                    <h2>Categories</h2>
                    <a id="events" href="<?php echo $theme_path?>/HTML/allEvents.php">All events</a>
                </div>
                <hr>
                <ul>
                    <?php
                    $events = (new CustomOA_Events_List)->get_customoa_events_list();
                    $displayed_categories = array(); // initialize array to keep track of displayed categories

                    foreach ($events as $event) {
                        $category = $event['type-devenement']['label']['fr'];

                        // check if category has already been displayed
                        if (!in_array($category, $displayed_categories)) {
                            // if not, display it and add it to the displayed categories array
                            echo "<li>";
                            echo "<a href='#' class='categoryLink'>";
                            echo "<p><strong>Category:</strong> <i>$category</i></p>";
                            echo "<span>";
                            echo "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24'>";
                            echo "<polygon points='7.293 4.707 14.586 12 7.293 19.293 8.707 20.707 17.414 12 8.707 3.293 7.293 4.707'/>";
                            echo "</svg>";
                            echo "</span>";
                            echo "</a>";
                            echo "</li>";

                            $displayed_categories[] = $category; // add category to displayed categories array
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div id="sticky">
            <button type="button"><a href="<?php echo $theme_path?>/HTML/when.php">When</a></button>
            <button type="button"><a href="<?php echo $theme_path?>/HTML/what.php">What</a></button>
            <button type="button"><a href="<?php echo $theme_path?>/HTML/where.php">Where</a></button>
        </div>
    </main>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="<?php echo $theme_path?>/gallery.js"></script>
</body>