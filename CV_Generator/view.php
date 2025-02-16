<?php
require_once('../../config.php');

global $DB, $USER;
$userid = $USER->id;

// Fetch CV data for the logged-in user
$cv = $DB->get_record('local_cv_generator_data', ['userid' => $userid]);

if ($cv) {
    echo "<h2>Your CV Details</h2>";
    echo "<p><strong>Name:</strong> " . $cv->name . "</p>";
    echo "<p><strong>Skills:</strong> " . $cv->skills . "</p>";
    echo "<p><strong>Experience:</strong> " . $cv->experience . "</p>";
    echo "<p><strong>Education:</strong> " . $cv->education . "</p>";
    echo "<p><strong>Achievements:</strong> " . $cv->achievements . "</p>";
} else {
    echo "<p>No CV data found.</p>";
}
?>
