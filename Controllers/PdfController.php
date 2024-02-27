<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mproduk;
use Dompdf\Dompdf;

class PdfController extends BaseController
{
    public function index()
    {
        $data = [
            'listProduk' => $this->produk->getLaporanProduk()
        ];
        return view('pdf_view', $data);
    }

    public function generate()
{
    $filename ='LaporanStok' . date('y-m-d-H-i-s');

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();

    // load HTML content
    $data = [
        'listProduk' => $this->produk->getLaporanProduk()
    ];
    $html = view('/pdf_view', $data);
    $dompdf->loadHtml($html);

    // (optional) setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // render html as PDF
    $dompdf->render();

    // output the generated pdf
    $dompdf->stream($filename);
}

}
