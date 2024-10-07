<?php

namespace App\Http\Helpers\Integrations;


interface IntegrationInterface
{
    public function getHeadScript(): string;
    public function getBodyScript(): string;
}
?>






