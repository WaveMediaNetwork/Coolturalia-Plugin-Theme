<!DOCTYPE html>
<?php
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
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="23" height="23" viewBox="0 0 256 256" xml:space="preserve">
                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                            <path d="M 45 3 c 7.785 0 14.118 6.333 14.118 14.118 v 6.139 c 0 7.785 -6.333 14.118 -14.118 14.118 c -7.785 0 -14.118 -6.333 -14.118 -14.118 v -6.139 C 30.882 9.333 37.215 3 45 3 M 45 0 L 45 0 c -9.415 0 -17.118 7.703 -17.118 17.118 v 6.139 c 0 9.415 7.703 17.118 17.118 17.118 h 0 c 9.415 0 17.118 -7.703 17.118 -17.118 v -6.139 C 62.118 7.703 54.415 0 45 0 L 45 0 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 55.094 45.846 c 11.177 2.112 19.497 12.057 19.497 23.501 V 87 H 15.409 V 69.347 c 0 -11.444 8.32 -21.389 19.497 -23.501 C 38.097 47.335 41.488 48.09 45 48.09 S 51.903 47.335 55.094 45.846 M 54.639 42.727 C 51.743 44.227 48.47 45.09 45 45.09 s -6.743 -0.863 -9.639 -2.363 c -12.942 1.931 -22.952 13.162 -22.952 26.619 v 17.707 c 0 1.621 1.326 2.946 2.946 2.946 h 59.29 c 1.621 0 2.946 -1.326 2.946 -2.946 V 69.347 C 77.591 55.889 67.581 44.659 54.639 42.727 L 54.639 42.727 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        </g>
                    </svg>
            <a href="<?php echo $theme_path?>/HTML/options.php" id="optionsIcon">
                <div class="one"></div>
                <div class="two"></div>
                <div class="three"></div>
            </a>
        </div>
    </header>
    <main>
        <div id="container">
            <div id="highlights">
                <h2>Highlights</h2>
                <hr>
                <div class="eventsDetails">
                    <div class="owl-carousel owl-theme">
                        <?php
                        $events = (new CustomOA_Events_List)->get_customoa_events_list();

                        foreach ($events as $event) {
                            $event_data = get_custom_event_data($event['uid']);
                            $event_visibility = get_option('customoa_event_'. $event['uid'] .'_visibility', 'visible');

                            if ( $event_visibility == 'hidden' )
                                continue;  // skip current event in this loop if the visibility is set to HIDDEN


                            $title = !empty($event_data['customoa_event_title']) ? $event_data['customoa_event_title'] : $event['title']['fr'];
                            $description = !empty($event_data['customoa_event_description']) ? $event_data['customoa_event_description'] : $event['description']['fr'];
                            $image = !empty($event_data['customoa_event_file']) ? CUSTOMOA_PLUGIN_URL . 'includes/images/' . $event_data['customoa_event_file'] : 'https://cibul.s3.amazonaws.com/'.$event['image']['filename'];
                            $duration = $event['dateRange']['fr'];
                            $category = !empty($event_data['customoa_event_category']) ? $event_data['customoa_event_category'] : $event['type-devenement']['label']['fr'];
                            $single_event_url = '/wp-content/themes/coolturalia-theme/HTML/specificEvent.php?uid=' . $event['uid'];

                            if(isset($event_data ['customoa_event_highlighted']) && $event_data['customoa_event_highlighted'] == 'yes') {
                                echo "<div class='eventsDetails'>";
                                echo "<div class=''>";
                                echo "<div class='eventCard'>";
                                echo "<a href='$single_event_url'>";
                                echo "<img class='item' src='$image' alt='$title'>";
                                echo "<h2 class='EventName'>$title</h2>";
                                echo "<span>$description</span>";
                                echo "<br>";
                                echo "<span><strong>Duration:</strong> $duration</span>";
                                echo "<br>";
                                echo "<span><strong>Category:</strong> $category</span>";
                                echo "<br>";
                                echo "<br>";
                                echo "</a>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div id="categories">
                <div id="categoriesHead">
                    <h2>Categories</h2>
                </div>
                <hr>
                <ul>
                    <?php
                    $events = (new CustomOA_Events_List)->get_customoa_events_list();
                    $displayed_categories = array(); // initialize array to keep track of displayed categories

                    foreach ($events as $event) {
                        $event_data = get_custom_event_data($event['uid']);
                        $category = !empty($event_data['customoa_event_category']) ? $event_data['customoa_event_category'] : $event['type-devenement']['label']['fr'];
                        $category_url = '/wp-content/themes/coolturalia-theme/HTML/allEvents.php?event_category=' . $category;
                        // check if category has already been displayed
                        if (!in_array($category, $displayed_categories)) {
                            // if not, display it and add it to the displayed categories array
                            echo "<li>";
                            echo "<div class='eventCat' style='display: inline-block; width: 100%;'>
                                    <strong style='display: inline-block;'>Category:</strong>
                                    <a class='categoryLink' style='display: inline-block;' href='$category_url'>
                                        <i>$category</i>
                                    </a>
                                    <span class='catSvg' style='display: inline-block; float: right;'> ></span>
                                  </div>";
                            echo "</li>";

                            $displayed_categories[] = $category; // add category to displayed categories array
                        }
                    }
                    ?>
                </ul>
            </div>
            <div id="aboutUs">
                <h2>About Us</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <div class="item">
                    <svg fill="#fff" height="50px" width="50px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.9 491.9" xml:space="preserve">
                            <g><g><path d="M441.249,0h-390.4c-28,0-50.8,22.8-50.8,50.8v390.4c0,28,22.8,50.7,50.7,50.7h390.4c28,0,50.7-22.8,50.7-50.7V50.8
                                        C492.049,22.8,469.249,0,441.249,0z M432.349,304l-77-77c-4.3-4.3-11.4-4.3-15.7,0l-55.9,55.9l-96.7-96.7
                                        c-4.3-4.3-11.4-4.3-15.7,0l-111.6,111.4V59.7h372.6V304z"/><circle cx="297.049" cy="139.9" r="42.9"/></g></g>
                            </svg>
                </div>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
<script src="<?php echo $theme_path.'/gallery.js'?>"></script>
</body>