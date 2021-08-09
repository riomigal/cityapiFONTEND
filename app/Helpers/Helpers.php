<?php

use Keygen\Keygen;

function api_key_generator()
{
    return Keygen::alphanum(rand(20, 30))->generate();
}