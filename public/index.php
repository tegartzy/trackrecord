<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Tegarsatria\trackrecord\FoxMind\app\router;
use Tegarsatria\trackrecord\FoxMind\controller\indexController;
use Tegarsatria\trackrecord\FoxMind\model\indexModel;

router::add('/', 'GET', indexController::class, 'index');
router::add('/tambahNote', 'GET', indexController::class, 'formtambah');
router::add('/tambahNote', 'POST', indexController::class, 'tambahdata');
router::add('/keterangan', 'GET', indexController::class, 'keterangan');

router::run();
?>