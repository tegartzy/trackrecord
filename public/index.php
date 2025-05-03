<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Tegarsatria\trackrecord\FoxMind\app\router;
use Tegarsatria\trackrecord\FoxMind\controller\HomeController;
use Tegarsatria\trackrecord\FoxMind\model\HomeModel;

router::add('/', 'GET', HomeController::class, 'index');
router::add('/tambah', 'GET', HomeController::class, 'formtambah');
router::add('/tambah', 'POST', HomeController::class, 'tambahdata');

router::run();
?>