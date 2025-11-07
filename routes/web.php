<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CreditVoucherController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class,'home'])->name('home');

/* Invoices */
Route::get('/{client_serial}/invoices/{invoice_serial}', [InvoiceController::class,'show'])->name('invoices.show');

/* Quotations */
Route::get('/{client_serial}/quotations/{quotation_serial}', [QuotationController::class,'show'])->name('quotations.show');
Route::get('/{client_serial}/quotations/{quotation_serial}/download', [QuotationController::class,'download'])->name('quotations.download');

/* Invoices */
Route::get('/{client_serial}/invoices/{invoice_serial}', [InvoiceController::class,'show'])->name('invoices.show');
Route::get('/{client_serial}/invoices/{invoice_serial}/download', [InvoiceController::class,'download'])->name('invoices.download');

/* Invoices */
Route::get('/{client_serial}/receipts/{receipt_serial}', [ReceiptController::class,'show'])->name('receipts.show');
Route::get('/{client_serial}/receipts/{receipt_serial}/download', [ReceiptController::class,'download'])->name('receipts.download');

/* Sales */
Route::get('/{client_serial}/sales/{sale_serial}', [SaleController::class,'show'])->name('sales.show');
Route::get('/{client_serial}/sales/{sale_serial}/download', [SaleController::class,'download'])->name('sales.download');

/* Deliveries */
Route::get('/{client_serial}/deliveries/{delivery_serial}', [DeliveryController::class,'show'])->name('deliveries.show');
Route::get('/{client_serial}/deliveries/{delivery_serial}/download', [DeliveryController::class,'download'])->name('deliveries.download');

/* Collections */
Route::get('/{client_serial}/collections/{collection_serial}', [CollectionController::class,'show'])->name('collections.show');
Route::get('/{client_serial}/collections/{collection_serial}/download', [CollectionController::class,'download'])->name('collections.download');

/* Credit Vouchers */
Route::get('/{serial}/credit-vouchers/{credit_voucher_serial}', [CreditVoucherController::class,'show'])->name('credit-vouchers.show');
Route::get('/{serial}/credit-vouchers/{credit_voucher_serial}/download', [CreditVoucherController::class,'download'])->name('credit-vouchers.download');
