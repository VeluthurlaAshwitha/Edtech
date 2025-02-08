<?php
require_once(__DIR__ . '/../../config.php');

global $DB, $USER;

require_login(); // Ensure the user is logged in.

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/cv_generator/index.php'));
$PAGE->set_title('CV Generator');
$PAGE->set_heading('Generate Your Cover Letter');

// Handle form submission.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = (object)[
        'userid' => $USER->id,
        'name' => required_param('name', PARAM_TEXT),
        'skills' => required_param('skills', PARAM_TEXT),
        'experience' => required_param('experience', PARAM_TEXT),
        'education' => required_param('education', PARAM_TEXT),
        'achievements' => required_param('achievements', PARAM_TEXT),
        'created_at' => time(),
    ];

    $DB->insert_record('cv_generator_data', $data);

    redirect(new moodle_url('/local/cv_generator/index.php', ['success' => 1]));
}

// Display the form.
echo $OUTPUT->header();

if (optional_param('success', 0, PARAM_INT)) {
    echo $OUTPUT->notification('Your CV data has been saved successfully!', 'notifysuccess');
}

echo '<form method="post">';
echo '<label for="name">Name:</label><input type="text" name="name" id="name" required><br>';
echo '<label for="skills">Skills:</label><textarea name="skills" id="skills" required></textarea><br>';
echo '<label for="experience">Experience:</label><textarea name="experience" id="experience" required></textarea><br>';
echo '<label for="education">Education:</label><textarea name="education" id="education" required></textarea><br>';
echo '<label for="achievements">Achievements:</label><textarea name="achievements" id="achievements" required></textarea><br>';
echo '<button type="submit">Save and Generate Cover Letter</button>';
echo '</form>';

echo $OUTPUT->footer();
