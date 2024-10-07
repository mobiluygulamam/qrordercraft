<?php 
namespace App\Http\Helpers\Integrations;
class GoogleTagManager implements IntegrationInterface
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getHeadScript(): string
    {
        return '<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({"gtm.start":
        new Date().getTime(),event:"gtm.js"});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!="dataLayer"?"&l="+l:"";j.async=true;j.src=
        "https://www.googletagmanager.com/gtm.js?id="+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,"script","dataLayer","' . $this->id . '");</script>';
    }

    public function getBodyScript(): string
    {
        return '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=' . $this->id . '" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>';
    }
} ?>