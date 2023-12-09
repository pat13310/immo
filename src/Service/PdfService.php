<?php

namespace App\Service;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfService
{
    public function __construct(private Dompdf $dompdf, private Options $options)
    {
        $options->set('defaultFont', "Arial");
        $dompdf->setOptions($options);
    }

    public function show($filename, $html)
    {
        $this->dompdf->loadHtml($html);
        $this->dompdf->render();
        $this->dompdf->stream($filename, ['Attachment' => false]);
    }

    public function generate($html)
    {
        $this->dompdf->loadHtml($html);
        $this->dompdf->render();
        $this->dompdf->output();
    }
}
