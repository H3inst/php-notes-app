<?php
session_start();

require 'database/database.php';
require 'models/form_model.php';
require 'models/notes_model.php';
require 'controllers/template_controller.php';
require 'controllers/form_controller.php';
require 'controllers/notes_controller.php';

// Database
$connect = Database::connect();

// Template
$template = new Template();
$template->getTemplate();