<?php
// public/index.php

// Start session first thing
session_start();

require_once '../core/App.php';
require_once '../core/Controller.php';
require_once '../core/Database.php';
require_once '../core/Model.php';
require_once '../core/Auth.php';

// Run app
$app = new App();
