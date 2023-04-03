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
        <div class="infoContainer">
            <div class="infoEvent">
                <h3>When? <span class="">Today</span></h3>
                <h3>When? <span class="">Today</span></h3>
                <span>#Category 1</span>
            </div>
            <div class="clearContainer">
                <span class="clear">
                    <svg width="15px" height="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.5 3.75C1.08579 3.75 0.75 4.08579 0.75 4.5C0.75 4.91421 1.08579 5.25 1.5 5.25V3.75ZM22.5 5.25C22.9142 5.25 23.25 4.91421 23.25 4.5C23.25 4.08579 22.9142 3.75 22.5 3.75V5.25ZM1.5 5.25H22.5V3.75H1.5V5.25Z" fill="#71717A"/>
                        <path d="M9.75 1.5V0.75V1.5ZM8.25 3H7.5H8.25ZM7.5 4.5C7.5 4.91421 7.83579 5.25 8.25 5.25C8.66421 5.25 9 4.91421 9 4.5H7.5ZM15 4.5C15 4.91421 15.3358 5.25 15.75 5.25C16.1642 5.25 16.5 4.91421 16.5 4.5H15ZM15.75 3H16.5H15.75ZM14.25 0.75H9.75V2.25H14.25V0.75ZM9.75 0.75C9.15326 0.75 8.58097 0.987053 8.15901 1.40901L9.21967 2.46967C9.36032 2.32902 9.55109 2.25 9.75 2.25V0.75ZM8.15901 1.40901C7.73705 1.83097 7.5 2.40326 7.5 3H9C9 2.80109 9.07902 2.61032 9.21967 2.46967L8.15901 1.40901ZM7.5 3V4.5H9V3H7.5ZM16.5 4.5V3H15V4.5H16.5ZM16.5 3C16.5 2.40326 16.2629 1.83097 15.841 1.40901L14.7803 2.46967C14.921 2.61032 15 2.80109 15 3H16.5ZM15.841 1.40901C15.419 0.987053 14.8467 0.75 14.25 0.75V2.25C14.4489 2.25 14.6397 2.32902 14.7803 2.46967L15.841 1.40901Z" fill="#71717A"/>
                        <path d="M9 17.25C9 17.6642 9.33579 18 9.75 18C10.1642 18 10.5 17.6642 10.5 17.25H9ZM10.5 9.75C10.5 9.33579 10.1642 9 9.75 9C9.33579 9 9 9.33579 9 9.75H10.5ZM10.5 17.25V9.75H9V17.25H10.5Z" fill="#71717A"/>
                        <path d="M13.5 17.25C13.5 17.6642 13.8358 18 14.25 18C14.6642 18 15 17.6642 15 17.25H13.5ZM15 9.75C15 9.33579 14.6642 9 14.25 9C13.8358 9 13.5 9.33579 13.5 9.75H15ZM15 17.25V9.75H13.5V17.25H15Z" fill="#71717A"/>
                        <path d="M18.865 21.124L18.1176 21.0617L18.1176 21.062L18.865 21.124ZM17.37 22.5L17.3701 21.75H17.37V22.5ZM6.631 22.5V21.75H6.63093L6.631 22.5ZM5.136 21.124L5.88343 21.062L5.88341 21.0617L5.136 21.124ZM4.49741 4.43769C4.46299 4.0249 4.10047 3.71818 3.68769 3.75259C3.2749 3.78701 2.96818 4.14953 3.00259 4.56231L4.49741 4.43769ZM20.9974 4.56227C21.0318 4.14949 20.7251 3.78698 20.3123 3.75259C19.8995 3.7182 19.537 4.02495 19.5026 4.43773L20.9974 4.56227ZM18.1176 21.062C18.102 21.2495 18.0165 21.4244 17.878 21.5518L18.8939 22.6555C19.3093 22.2732 19.5658 21.7486 19.6124 21.186L18.1176 21.062ZM17.878 21.5518C17.7396 21.6793 17.5583 21.75 17.3701 21.75L17.3699 23.25C17.9345 23.25 18.4785 23.0379 18.8939 22.6555L17.878 21.5518ZM17.37 21.75H6.631V23.25H17.37V21.75ZM6.63093 21.75C6.44274 21.75 6.26142 21.6793 6.12295 21.5518L5.10713 22.6555C5.52253 23.0379 6.06649 23.25 6.63107 23.25L6.63093 21.75ZM6.12295 21.5518C5.98449 21.4244 5.89899 21.2495 5.88343 21.062L4.38857 21.186C4.43524 21.7486 4.69172 22.2732 5.10713 22.6555L6.12295 21.5518ZM5.88341 21.0617L4.49741 4.43769L3.00259 4.56231L4.38859 21.1863L5.88341 21.0617ZM19.5026 4.43773L18.1176 21.0617L19.6124 21.1863L20.9974 4.56227L19.5026 4.43773Z" fill="#71717A"/>
                    </svg>Clear
                </span>
            </div>
        </div>
        <div id="containerAllEvents">
            <a href="<?php echo $theme_path?>/HTML/specificEvent.php">
                <div >
                    <div class="eventsDetails">
                        <div class="owl-carousel owl-theme">
                            <?php
                            $events = (new CustomOA_Events_List)->get_customoa_events_list();

                            if(isset($_GET['highlight']) && $_GET['highlight'] == 'yes') {
                                echo "<ul>";
                                foreach ($events as $event) {
                                    $title = $event['title']['fr'];
                                    echo "<li>$title</li>";
                                }
                                echo "</ul>";
                            } else {
                                foreach ($events as $event) {
                                    $event_data = get_custom_event_data($event['uid']);
//                              $title = $event['title']['fr'];
//                              $description = $event['description']['fr'];
//                              $category = $event['type-devenement']['label']['fr'];
//                              $image = 'https://cibul.s3.amazonaws.com/'.$event['image']['filename'];
//                              $event_data['customoa_event_title'];
//
                                    $title = !empty($event_data['customoa_event_title']) ? $event_data['customoa_event_title'] : $event['title']['fr'];
                                    $description = !empty($event_data['customoa_event_description']) ? $event_data['customoa_event_description'] : $event['description']['fr'];
                                    $image = !empty($event_data['customoa_event_file']) ? CUSTOMOA_PLUGIN_URL . 'includes/images/' . $event_data['customoa_event_file'] : 'https://cibul.s3.amazonaws.com/'.$event['image']['filename'];

                                    $duration = $event['dateRange']['fr'];
                                    $category = !empty($event_data['category']) ? $event_data['category'] : $event['type-devenement']['label']['fr'];


                                    echo "<div class='eventCard'>";
                                    echo "<img class='item' src='$image' alt='$title'>";
                                    echo "<h2 class='EventName'>$title</h2>";
                                    echo "<p>$description</p>";
                                    echo "<p><strong>Duration:</strong> $duration</p>";
                                    echo "<p><strong>Category:</strong> $category</p>";
                                    echo "</div>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo $theme_path?>/HTML/specificEvent.php">
                <div>
                    <div class="eventsDetails">
                        <div class="owl-carousel owl-theme">
                            <?php
                            $events = (new CustomOA_Events_List)->get_customoa_events_list();

                            if(isset($_GET['highlight']) && $_GET['highlight'] == 'yes') {
                                echo "<ul>";
                                foreach ($events as $event) {
                                    $title = $event['title']['fr'];
                                    echo "<li>$title</li>";
                                }
                                echo "</ul>";
                            } else {
                                foreach ($events as $event) {
                                    $event_data = get_custom_event_data($event['uid']);
//                              $title = $event['title']['fr'];
//                              $description = $event['description']['fr'];
//                              $category = $event['type-devenement']['label']['fr'];
//                              $image = 'https://cibul.s3.amazonaws.com/'.$event['image']['filename'];
//                              $event_data['customoa_event_title'];
//
                                    $title = !empty($event_data['customoa_event_title']) ? $event_data['customoa_event_title'] : $event['title']['fr'];
                                    $description = !empty($event_data['customoa_event_description']) ? $event_data['customoa_event_description'] : $event['description']['fr'];
                                    $image = !empty($event_data['customoa_event_file']) ? CUSTOMOA_PLUGIN_URL . 'includes/images/' . $event_data['customoa_event_file'] : 'https://cibul.s3.amazonaws.com/'.$event['image']['filename'];

                                    $duration = $event['dateRange']['fr'];
                                    $category = !empty($event_data['category']) ? $event_data['category'] : $event['type-devenement']['label']['fr'];


                                    echo "<div class='eventCard'>";
                                    echo "<img class='item' src='$image' alt='$title'>";
                                    echo "<h2 class='EventName'>$title</h2>";
                                    echo "<p>$description</p>";
                                    echo "<p><strong>Duration:</strong> $duration</p>";
                                    echo "<p><strong>Category:</strong> $category</p>";
                                    echo "</div>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </a>
            <div>
                <h2>You might also like</h2>
                <hr class="adjust">
                <div class="eventsDetails">
                    <div class="owl-carousel owl-theme">
                        <?php
                        $events = (new CustomOA_Events_List)->get_customoa_events_list();
                        foreach ($events as $event) {
                            $title = $event['title']['fr'];
                            $image = 'https://cibul.s3.amazonaws.com/'.$event['image']['filename'];
                            $description = $event['description']['fr'];
                            $duration = $event['dateRange']['fr'];
                            $category = $event['type-devenement']['label']['fr'];

                            echo "<div class='eventCard'>";
                            echo "<img class='item' src='$image' alt='$title'>";
                            echo "<h2 class='EventName'>$title</h2>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>
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