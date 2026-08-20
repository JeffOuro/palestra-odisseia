<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment('Pensar com profundidade para viver com mais clareza.');
})->purpose('Exibir mensagem da Odisseia Filosófica');
