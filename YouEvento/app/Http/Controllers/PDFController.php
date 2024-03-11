<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = ['title' => 'Ticket'];
        $pdf = PDF::loadView('pdf.ticket', $data);
        return $pdf->download('ticket.pdf');
    }
}