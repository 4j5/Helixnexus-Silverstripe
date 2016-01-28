<?php

global $project;
$project = 'app';

global $database;
$database = 'project_db';

require_once("conf/ConfigureFromEnv.php");

// Set the site locale
i18n::set_locale('en_GB');
