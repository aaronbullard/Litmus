<?php

Route::post('queue/receive', function()
{
    return Queue::marshal();
});