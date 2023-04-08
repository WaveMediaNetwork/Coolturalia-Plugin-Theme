<?php

    /** ==================SPECIFIC EVENT (specificEvent.php)================== **/
    /**
     * This function brings all event details.
     */
    function printAllEventDetails ()
    {

        if ( !isset($_GET['uid']) )
            return;

//        $events = (new CustomOA_Events_List)->get_customoa_events_list();

        if (isset($_GET['event_category'])) {
            $category_name = sanitize_text_field($_GET['event_category']);
            echo "<h2 style='margin: '>$category_name</h2>";
        }


        $event = get_all_event_data($_GET['uid']);

//        foreach ($events as $event) {
            $event_data = get_custom_event_data($event['uid']);
            $all_event_data = get_all_event_data($event['uid']);

            $featured = $all_event_data['featured'];
            $organisator = $all_event_data['organisator'];
            $other_place = $all_event_data['other_place'];
            $onlineAccessLink = $all_event_data['onlineAccessLink'];
            $organisator_url = $all_event_data['organisator_url'];
            $public_cible = '';
            foreach ($all_event_data['public-cible'] as $public_cible_data) {

                if (!empty ($public_cible_data['lable']['fr'])) {
                    if (!empty($public_cible))
                        $public_cible .= ', ';

                    $public_cible .= $public_cible_data['lable']['fr'];
                }
            }
            $sous_titre = $all_event_data['sous-titre']['fr'];
            $attendanceMode = $all_event_data['attendanceMode']['label']['fr'];
            $organisation_de_levenement = $all_event_data['organisation-de-levenement']['label']['fr'];
            $thematiques_musees = $all_event_data['thematiques-musees']['0']['label']['fr'];
            $labels = '';
            foreach ($all_event_data['labels'] as $labels_data) {

                if (!empty ($labels_data['label']['fr'])) {
                    if (!empty($labels))
                        $labels .= ', ';

                    $labels .= $labels_data['label']['fr'];
                }
            }
            $location = $all_event_data['location'];
            $status = $all_event_data['status']['label']['fr'];
            $lastTiming = $all_event_data['lastTiming'];
            $nextTiming = $all_event_data['nextTiming'];
            $title = !empty($event_data['customoa_event_title']) ? $event_data['customoa_event_title'] : $event['title']['fr'];
            $description = !empty($event_data['customoa_event_description']) ? $event_data['customoa_event_description'] : $event['description']['fr'];
            $image = !empty($event_data['customoa_event_file']) ? CUSTOMOA_PLUGIN_URL . 'includes/images/' . $event_data['customoa_event_file'] : 'https://cibul.s3.amazonaws.com/' . $event['image']['filename'];
            $duration = $event['dateRange']['fr'];
            $category = !empty($event_data['category']) ? $event_data['category'] : $event['type-devenement']['label']['fr'];

            if (isset($_GET['uid']) && $_GET['uid'] == $event['uid']) {
                echo "<div class='eventsDetails'>";
                echo "<div class=''>";
                echo "<div class='eventCard'>";
                echo "<img class='item' src='$image' alt='$title'>";
                echo "<h3 class='EventName'>$title</h3>";
                echo "<span><strong>Organisator:</strong> <a href='$organisator_url'>$organisator</a></span>";
                echo "<br>";
                echo "<span><strong>Description:</strong> $description</span>";
                echo "<br>";

                if (!empty($featured)) {
                    echo "
                        <div style='padding-bottom: 5px;'>
                            <span>$featured</span>
                        </div>";
                }

                if (!empty($duration)) {
                    echo "
                        <div style='padding-bottom: 5px;'>
                            <span><strong>Duration:</strong> $duration</span>
                        </div>";
                }

                if (!empty($category)) {
                    echo "
                        <div style='padding-bottom: 5px;'>
                            <span><strong>Category:</strong> $category</span>
                        </div>";
                }

                if (!empty($other_place)) {
                    echo "
                        <div style='padding-bottom: 5px;'>
                            <span><strong>Place:</strong> $other_place</span>
                        </div>";
                }

                if (!empty($onlineAccessLink)) {
                    echo "
                        <div style='padding-bottom: 5px;'>
                           <span><strong>Online Acces:</strong>$onlineAccessLink</span>
                        </div>";
                }

                if (!empty($sous_titre)) {
                    echo "
                        <div style='padding-bottom: 5px;'>
                           <span><strong>Sous Titre:</strong> $sous_titre</span>
                        </div>";
                }

                if (!empty($attendanceMode)) {
                    echo "
                        <div style='padding-bottom: 5px;'>
                           <span><strong>Attendance:</strong> $attendanceMode</span>
                        </div>";
                }

                if (!empty($organisation_de_levenement)) {
                    echo "
                        <div style='padding-bottom: 5px;'>
                           <span><strong>Organisation De L'Evenement:</strong> $organisation_de_levenement</span>
                        </div>";
                }

                if (!empty($thematiques_musees)) {
                    echo "
                        <div style='padding-bottom: 5px;'>
                           <span><strong>$thematiques_musees</strong></span>
                        </div>";
                }

                if (!empty($labels)) {
                    echo "
                        <div style='padding-bottom: 5px;'>
                           <span><strong>Labels:</strong> $labels</span>
                        </div>";
                }

                if (!empty($location)) {
                    echo "
                        <div style='padding-bottom: 5px;'>
                           <span><strong>Location:</strong>
                           ".$location['address']. ', '
                            .$location['city']. ', '
                            .$location['name']. ', '
                            ."</span>
                        </div>";
                }

                if (!empty($status)) {
                    echo "
                        <div style='padding-bottom: 5px;'>
                           <span><strong>Status:</strong> $status</span>
                        </div>";
                }

                if (!empty($lastTiming)) {
                    echo "
                        <div style='padding-bottom: 5px;'>
                           <span><strong>Last Timing:</strong> ".date('d/m/Y H:i T', strtotime($lastTiming['begin']))." - ".date('d/m/Y H:i T', strtotime($lastTiming['end']))."</span>
                        </div>";

                }

                if (!empty($nextTiming)) {
                    echo "
                        <div style='padding-bottom: 5px;'>
                           <span><strong>Next Timing:</strong> ".date('d/m/Y H:i T', strtotime($nextTiming['begin']))." - ".date('d/m/Y H:i T', strtotime($nextTiming['end']))."</span>
                        </div>";
                }

                    echo "<br>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
//            }
        }
    /**
     * This function brings random events into the YouMightAlsoLike area
     */
    function youMightAlsoLike (){
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
                $title = !empty($event_data['customoa_event_title']) ? $event_data['customoa_event_title'] : $event['title']['fr'];
                $description = !empty($event_data['customoa_event_description']) ? $event_data['customoa_event_description'] : $event['description']['fr'];
                $image = !empty($event_data['customoa_event_file']) ? CUSTOMOA_PLUGIN_URL . 'includes/images/' . $event_data['customoa_event_file'] : 'https://cibul.s3.amazonaws.com/'.$event['image']['filename'];

                $duration = $event['dateRange']['fr'];
                $category = !empty($event_data['category']) ? $event_data['category'] : $event['type-devenement']['label']['fr'];


                echo "<div class='eventCard'>";
                echo "<img class='item' src='$image' alt='$title'>";
                echo "<h2 class='EventName'>$title</h2>";
                echo "<span>$description</span>";
                echo "<br>";
                echo "<span><strong>Duration:</strong> $duration</span>";
                echo "<br>";
                echo "<span><strong>Category:</strong> $category</span>";
                echo "<br>";
                echo "<br>";
                echo "</div>";
            }
        }
    }




    /** ==================ALL EVENTs (allEvents.php)================== **/
