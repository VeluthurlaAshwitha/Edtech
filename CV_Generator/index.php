<?php
require_once('../../config.php');

// Ensure the user is logged in and has site administration capability.
require_login();
$context = context_system::instance();
require_capability('moodle/site:config', $context);

// Set up the page.
$PAGE->set_url(new moodle_url('/local/cv_generator/index.php'));
$PAGE->set_context($context);
$PAGE->set_title('CV Generator');
$PAGE->set_heading('CV Generator');

// Output starts here.
echo $OUTPUT->header();

// Main plugin content.
echo '<h2>Welcome to the CV Generator</h2>';
echo '<p>Use this tool to generate personalized cover letters and CVs.</p>';

// Output ends here.
echo $OUTPUT->footer();
Save and close the file.

