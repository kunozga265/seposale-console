<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuotationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class,'home'])->name('home');

/* Invoices */
Route::get('/{client_serial}/invoices/{invoice_serial}', [InvoiceController::class,'show'])->name('invoices.show');

/* Quotations */
Route::get('/{client_serial}/quotations/{quotation_serial}', [QuotationController::class,'show'])->name('quotations.show');
Route::get('/{client_serial}/quotations/{quotation_serial}/download', [QuotationController::class,'download'])->name('quotations.download');
