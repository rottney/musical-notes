<?php //php 7.0.8

    // Validate input format
    $input = trim(fgets(STDIN));
    if (!preg_match("/[A-G]{1}[#]?[0-8]{1}/", $input)) {
        echo "Please enter note in the format:\n\tC0, G#5, etc.\n\n";
        echo "Do not use flats (b), and only use octaves 0 - 8.";
    }

    // If input is valid, calculate frequency
    else {

        // "Base notes" = notes in octave 0
        $baseNotes = array(
            "C" => 16.35,
            "C#" => 17.32,
            "D" => 18.35,
            "D#" => 19.45,
            "E" => 20.60,
            "F" => 21.83,
            "F#" => 23.12,
            "G" => 24.50,
            "G#" => 25.96,
            "A" => 27.50,
            "A#" => 29.14,
            "B" => 30.87,
        );
        
        // Record note and octave
        $note = substr($input, 0, -1);
        $octave = substr($input, -1);
        
        // Result is (freq. of base note) times 2 to the [octave]th power
        echo $baseNotes[$note] * pow(2, $octave);
    }
    
?>
