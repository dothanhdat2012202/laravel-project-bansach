<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;
use App\Repositories\CustomerRepository;

class InvoiceBackendController extends Controller
{
    protected $customerRepository;
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository=$customerRepository;
    }
    public function index()
    {
        $invoices=$this->customerRepository->getAllPaginate();
        $template='backend.invoice.index';
        return view('backend.dashboard.index',compact('template','invoices'));
    }
    public function getInvoiceDetail($id)
    {
        $invoiceDetail=InvoiceDetail::where('invoice_id',$id)->get();
        $invoice=Invoice::where('id',$id)->first();
        $productIds=$invoiceDetail->pluck('book_id');
        $booksInfo = Books::select('id', 'name', 'image')->whereIn('id', $productIds)->get();
        $template='backend.invoice.invoicedetail';
        return view('backend.dashboard.index',compact('template','invoiceDetail','invoice','booksInfo'));
    }
}