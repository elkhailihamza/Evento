<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

use PDF;

class PDFController extends Controller
{
    public function index()
    {
        return view('pdf.ticket');
    }
    public function generatePDF(Reservation $reservation)
    {
        $pdfName = $reservation->ticket->event->title.'_'.$reservation->ticket->ticket_name.'_'.$reservation->created_at;
        $data = ['title' => 'YouEvento', 'reservation' => $reservation];
        $pdf = PDF::loadView('pdf.ticket', $data);
        return $pdf->download($pdfName.'.pdf');
    }
}
