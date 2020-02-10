<?php //php 7.0.8

    // Usage instructions
    function help() {
        echo "Enter note in the format:\n\tC0, G#5, etc.\n\n"
            . "Do not use flats (b), and only use octaves 0 - 8."
            . "Type 'help' to repeat these instructions."
            . "Type 'exit' to quit.\n";
    }

    help();

    // Main loop
    while (true) {

        $input = trim(fgets(STDIN));

        // Validate input format
        if (preg_match("/^[A-G]{1}[#]?[0-8]{1}$/", $input)) {

            // Handle invalid notes (B#, E#)
            if (preg_match("/^[BE]{1}[#]{1}[0-8]{1}$/", $input)) {
                echo substr($input, 0, -1) . " is not a note.  "
                    . "Please enter a valid note!\n";
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
                echo $baseNotes[$note] * pow(2, $octave) . "\n";
            }

        }

        // 'help' keyword prints instructions
        if (preg_match("/help/", $input)) {
            help();
        }

        // 'exit' keyword terminates program
        if (preg_match("/exit/", $input)) {
            break;
        }

    }

?>
