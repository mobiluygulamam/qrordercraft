<?php

namespace App\Http\Helpers;
use App\Http\Helpers\Integrations\IntegrationInterface;

use App\Http\Helpers\Integrations\GoogleTagManager;
use App\Http\Helpers\Integrations\GoogleAnalytics;
use App\Http\Helpers\Integrations\FacebookPixel;


class IntegrationHelper
{
    private $integrations = [];

    public function addIntegration(IntegrationInterface $integration)
    {
        $this->integrations[] = $integration;
    }

    public function getHeadScripts(array $additionalScripts = []): string
    {
        $scripts = [];

        // Entegrasyonlardan başlık scriptlerini al
        foreach ($this->integrations as $integration) {
            $scripts[] = $integration->getHeadScript();
        }

        // Ekstra scriptleri ekle
        foreach ($additionalScripts as $script) {
            $scripts[] = $script;
        }

        return implode("\n", $scripts);
    }

    public function getBodyScripts(): string
    {
        $scripts = [];

        // Entegrasyonlardan body scriptlerini al
        foreach ($this->integrations as $integration) {
            $scripts[] = $integration->getBodyScript();
        }

        return implode("\n", $scripts);
    }
}
