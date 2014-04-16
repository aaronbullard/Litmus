<?php

use Litmus\Handler\LitmusHandler as LitmusHandler;

IoC::register('controller: litmus::image', function()
{
    return new Litmus_Image_Controller( new LitmusHandler );
});