<?php 
namespace App\Http\Helpers\Integrations;

class GoogleAnalytics implements IntegrationInterface
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getHeadScript(): string
    {
        return '<script async src="https://www.googletagmanager.com/gtag/js?id=' . $this->id . '"></script>
                <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag("js", new Date());
                gtag("config", "' . $this->id . '");
                </script>';
    }

    public function getBodyScript(): string
    {
        return ''; // Google Analytics için body scriptine gerek yok
    }
}

?>