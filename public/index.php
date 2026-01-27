<?php
// public/index.php

// Start session first thing
session_start();

// Use for local
// require_once '../core/App.php';
// require_once '../core/Controller.php';
// require_once '../core/Database.php';
// require_once '../core/Model.php';
// require_once '../core/Auth.php';

// Use for replit deployment
// Use absolute paths based on current file location
require_once __DIR__ . '/../core/App.php';
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../core/Model.php';
require_once __DIR__ . '/../core/Auth.php';

// Run app
$app = new App();
