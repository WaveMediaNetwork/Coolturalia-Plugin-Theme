<!DOCTYPE html>
<?php
include_once( '../../../../wp-load.php');
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
                <h2>My Coolagenda</h2>
            </div>
            <div class="printContainer">
                <span class="print">
                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 16.75H16C15.8011 16.75 15.6103 16.671 15.4697 16.5303C15.329 16.3897 15.25 16.1989 15.25 16C15.25 15.8011 15.329 15.6103 15.4697 15.4697C15.6103 15.329 15.8011 15.25 16 15.25H18C18.3315 15.25 18.6495 15.1183 18.8839 14.8839C19.1183 14.6495 19.25 14.3315 19.25 14V10C19.25 9.66848 19.1183 9.35054 18.8839 9.11612C18.6495 8.8817 18.3315 8.75 18 8.75H6C5.66848 8.75 5.35054 8.8817 5.11612 9.11612C4.8817 9.35054 4.75 9.66848 4.75 10V14C4.75 14.3315 4.8817 14.6495 5.11612 14.8839C5.35054 15.1183 5.66848 15.25 6 15.25H8C8.19891 15.25 8.38968 15.329 8.53033 15.4697C8.67098 15.6103 8.75 15.8011 8.75 16C8.75 16.1989 8.67098 16.3897 8.53033 16.5303C8.38968 16.671 8.19891 16.75 8 16.75H6C5.27065 16.75 4.57118 16.4603 4.05546 15.9445C3.53973 15.4288 3.25 14.7293 3.25 14V10C3.25 9.27065 3.53973 8.57118 4.05546 8.05546C4.57118 7.53973 5.27065 7.25 6 7.25H18C18.7293 7.25 19.4288 7.53973 19.9445 8.05546C20.4603 8.57118 20.75 9.27065 20.75 10V14C20.75 14.7293 20.4603 15.4288 19.9445 15.9445C19.4288 16.4603 18.7293 16.75 18 16.75Z" fill="#000000"/>
                        <path d="M16 8.75C15.8019 8.74741 15.6126 8.66756 15.4725 8.52747C15.3324 8.38737 15.2526 8.19811 15.25 8V4.75H8.75V8C8.75 8.19891 8.67098 8.38968 8.53033 8.53033C8.38968 8.67098 8.19891 8.75 8 8.75C7.80109 8.75 7.61032 8.67098 7.46967 8.53033C7.32902 8.38968 7.25 8.19891 7.25 8V4.5C7.25 4.16848 7.3817 3.85054 7.61612 3.61612C7.85054 3.3817 8.16848 3.25 8.5 3.25H15.5C15.8315 3.25 16.1495 3.3817 16.3839 3.61612C16.6183 3.85054 16.75 4.16848 16.75 4.5V8C16.7474 8.19811 16.6676 8.38737 16.5275 8.52747C16.3874 8.66756 16.1981 8.74741 16 8.75Z" fill="#000000"/>
                        <path d="M15.5 20.75H8.5C8.16848 20.75 7.85054 20.6183 7.61612 20.3839C7.3817 20.1495 7.25 19.8315 7.25 19.5V12.5C7.25 12.1685 7.3817 11.8505 7.61612 11.6161C7.85054 11.3817 8.16848 11.25 8.5 11.25H15.5C15.8315 11.25 16.1495 11.3817 16.3839 11.6161C16.6183 11.8505 16.75 12.1685 16.75 12.5V19.5C16.75 19.8315 16.6183 20.1495 16.3839 20.3839C16.1495 20.6183 15.8315 20.75 15.5 20.75ZM8.75 19.25H15.25V12.75H8.75V19.25Z" fill="#000000"/>
                    </svg>Print
                </span>
            </div>
        </div>
        <hr>
        <div id="containerAllEvents">
            <div id="dateCalendar">
                <div class="infoEvent">
                    <h3>Month/Year</h3>
                </div>
                <div class="addDate">
                    <button type="button"><span>Add to my phone calendar</span></button>
                </div>
            </div>
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
                    $event_visibility = get_option('customoa_event_'. $event['uid'] .'_visibility', 'visible');
                    if ( $event_visibility == 'hidden' )
                        continue;  // skip current event in this loop if the visibility is set to HIDDEN

                    $title = !empty($event_data['customoa_event_title']) ? $event_data['customoa_event_title'] : $event['title']['fr'];
                    $description = !empty($event_data['customoa_event_description']) ? $event_data['customoa_event_description'] : $event['description']['fr'];
                    $image = !empty($event_data['customoa_event_file']) ? CUSTOMOA_PLUGIN_URL . 'includes/images/' . $event_data['customoa_event_file'] : 'https://cibul.s3.amazonaws.com/'.$event['image']['filename'];

                    $duration = $event['dateRange']['fr'];
                    $category = !empty($event_data['category']) ? $event_data['category'] : $event['type-devenement']['label']['fr'];
                    $single_event_url = '/wp-content/themes/coolturalia-theme/HTML/specificEvent.php?uid=' . $event['uid'];

                    echo "<div class='eventsDetails'>";
                    echo "<div class=''>";
                    echo "<div class='eventCard'>";
                    echo "<a href='$single_event_url'>";
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
            <div id="dateCalendar">
                <div class="infoEvent">
                    <h3>Month/Year</h3>
                </div>
                <div class="addDate">
                    <button type="button"><span>Add to my phone calendar</span></button>
                </div>
            </div>
            <div>
                <div class="eventsDetails">
                    <div class="eventCards">
                        <h3 class="EventName">Event Name</h3>
                        <span class="adjust4">#Category 1</span>
                        <div class="adjust2">
                            <span>Day/Month/Year</span>
                            <span>Day/Month/Year</span>
                            <span>Time</span>
                        </div>
                        <span>Price/free</span>
                        <a href=""><span>Address detail</span></a>
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