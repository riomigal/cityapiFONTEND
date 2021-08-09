<?php

namespace Tests\Unit;

use Base62\Base62;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Str;
use Keygen\Keygen;

class UserTest extends TestCase
{
    /**
     * @test
     */
    public function api_key_generator()
    {
        $api_key = Keygen::alphanum(rand(20, 30))->generate();

        $this->assertThat(
            Str::length($api_key),
            $this->logicalAnd(
                $this->greaterThan(19.00),
                $this->lessThan(31.00)
            )
        );
    }
}