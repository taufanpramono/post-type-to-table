<?php  

function display_events() {
    $args = array(
        'post_type' => 'event', // Nama custom post type
        'posts_per_page' => -1, // Menampilkan semua post
        'orderby' => 'DESC',
        'meta_key' => 'tanggal_event',
    );

    $events_query = new WP_Query($args);

    $output = '<table id="event-styling-table">';
    $output .= '<tr>';
    $output .= '<th> Tanggal Event </th><th> Nama Event </th>';
    $output .= '</tr>';

    $grouped_events = array();

    if ($events_query->have_posts()) {
        while ($events_query->have_posts()) {
            $events_query->the_post();
            $current_date = get_field('tanggal_event'); // Mendapatkan tanggal_event saat ini
            $event_title = get_the_title();
            $event_type = get_field('jenis_event');
			

            if (!isset($grouped_events[$current_date])) {
                $grouped_events[$current_date] = array(
                    'titles' => array($event_title),
                    'types' => array($event_type)
                );
            } else {
                $grouped_events[$current_date]['titles'][] = $event_title;
                $grouped_events[$current_date]['types'][] = $event_type;
            }
        }
        
        foreach ($grouped_events as $date => $events) {
            $output .= '<tr>';
            $output .= '<td rowspan="' . count($events['titles']) . '">' . $date . '</td>';
            $output .= '<td><span class="style-'.$events['types'][0].'">'.$events['types'][0].'</span> '. $events['titles'][0] . '</td>';
            $output .= '</tr>';
            
            // Output additional rows for the same date, if any
            for ($i = 1; $i < count($events['titles']); $i++) {
			
				
                $output .= '<tr>';
                $output .= '<td><span class="style-'.$events['types'][$i].'">'.$events['types'][$i]. '</span> '. $events['titles'][$i] . '</td>';
                $output .= '</tr>';
            }
        }

        wp_reset_postdata();
    } else {
        $output .= '<tr><td colspan="3">Tidak ada event yang ditemukan.</td></tr>';
    }
    $output .= '</table>';

    return $output;
}


function data_event_testing() {
 return display_events();
}
add_shortcode ('data_event','data_event_testing'); 

?>
