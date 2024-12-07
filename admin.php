<section>
    <h2>Contact Submissions</h2>
    <div class="submissions">
        <?php
        // Correct path to the contact_messages.txt file
        $path = __DIR__ . "/data/contact_messages.txt";

        // Check if the file exists
        if (!file_exists($path)) {
            echo "<p>Error: The file 'contact_messages.txt' does not exist at $path.</p>";
            exit;
        }

        // Read the file contents
        $submissions = file_get_contents($path);

        // Check if the file is empty
        if (empty(trim($submissions))) {
            echo "<p>No submissions yet.</p>";
        } else {
            // Split the file into individual submissions (separated by double newlines)
            $entries = explode("\n\n", trim($submissions));

            // Loop through each entry and display it
            foreach ($entries as $entry) {
                echo "<div class='submission'>";
                echo nl2br(htmlspecialchars($entry)); // Convert newlines to <br> tags and escape HTML
                echo "</div><hr>";
            }
        }
        ?>
    </div>
</section>
