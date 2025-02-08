<?php
require_once(__DIR__ . '/../../config.php');
global $DB, $USER;

$userid = $USER->id;
$data = $DB->get_record('data_content', ['userid' => $userid]);

$template = "
Dear [HIRING_MANAGER],

I am excited to apply for [JOB_TITLE]. With my skills in [SKILLS], I am confident I can contribute effectively to your team. My background includes [EXPERIENCE]. I am eager to bring this experience to [COMPANY_NAME].

Sincerely,
[NAME]";

$coverletter = str_replace(
    ['[HIRING_MANAGER]', '[JOB_TITLE]', '[SKILLS]', '[EXPERIENCE]', '[NAME]'],
    [$data->hiring_manager, $data->job_title, $data->skills, $data->experience, $data->name],
    $template
);

echo nl2br($coverletter);
