<?php

if ( file_exists("fav_movies.xml")  ) {
    $fav_movies = fopen("fav_movies.xml", "r");
    $data = fread($fav_movies, filesize("fav_movies.xml"));
    fclose($fav_movies);

    $xml = simplexml_load_file("fav_movies.xml");

    foreach($xml->movie as $movie) {
        $movieArray = array();

        foreach($movie as $key => $value)
        {
            $movieArray[(string)$key] = (string)$value;
            
        }

        $movies[] = $movieArray;
       
    }

    echo '<table border="1" cellspacing="2">';     

    //rows
    for ($i = 0; $i < count($movies); $i++) {
        //columns
        if ($i % 3 == 0) {
            echo '<tr></tr>';
        }
                echo "<td>";
                print_r($movies[$i]);
                echo "</td>";
        
        }
    echo '<table>';

    // print_r($movies);

    unlink("fav_movies.xml");
}   else {
    echo "file not found";
}
