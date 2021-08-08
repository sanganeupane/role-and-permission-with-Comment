<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\ApplicationController;



Route::any('/', [ApplicationController::class, 'index'])->name('index');




Route::group(['namespace' => 'backend', 'prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

    Route::any('/', [\App\Http\Controllers\backend\DashbordController::class, 'home'])->name('home');
    Route::any('/index', [\App\Http\Controllers\backend\DashbordController::class, 'index'])->name('index');
    Route::any('/addAdminUser', [\App\Http\Controllers\backend\DashbordController::class, 'addAdminUser'])->name('addAdminUser');
    Route::any('/showAdminUser', [\App\Http\Controllers\backend\DashbordController::class, 'showAdminUser'])->name('showAdminUser');
    Route::any('/editAdminUser/{id?}', [\App\Http\Controllers\backend\DashbordController::class, 'editAdminUser'])->name('editAdminUser');
    Route::any('/editAdminUserAction', [\App\Http\Controllers\backend\DashbordController::class, 'editAdminUserAction'])->name('editAdminUserAction');
    Route::any('/deleteAdminAction/{id?}', [\App\Http\Controllers\backend\DashbordController::class, 'deleteAdminAction'])->name('deleteAdminAction');
//    Route::any('/updateAdminType', [\App\Http\Controllers\backend\DashbordController::class, 'updateAdminType'])->name('updateAdminType');


    Route::any('/add-company', [\App\Http\Controllers\backend\LeadController\LeadController:: class, 'addCompany'])->name('add-company');
    Route::any('/addCompanyAction', [\App\Http\Controllers\backend\LeadController\LeadController:: class, 'addCompanyAction'])->name('addCompanyAction');
    Route::any('/show-company', [\App\Http\Controllers\backend\LeadController\LeadController:: class, 'showCompany'])->name('show-company');
    Route::any('/editLead/{id?}', [\App\Http\Controllers\backend\LeadController\LeadController:: class, 'editLead'])->name('editLead');
    Route::any('/editLeadAction', [\App\Http\Controllers\backend\LeadController\LeadController:: class, 'editLeadAction'])->name('editLeadAction');
    Route::any('/deleteLeadAction/{criteria?}', [\App\Http\Controllers\backend\LeadController\LeadController:: class, 'deleteLeadAction'])->name('deleteLeadAction');


    Route::any('/view-company/{id?}', [\App\Http\Controllers\backend\LeadController\LeadController:: class, 'viewCompany'])->name('view-company');
    Route::any('/addCommentAction', [\App\Http\Controllers\backend\LeadController\LeadController:: class, 'addCommentAction'])->name('addCommentAction');
    Route::any('/deleteCommentAction/{comments?}', [\App\Http\Controllers\backend\LeadController\LeadController:: class, 'deleteCommentAction'])->name('deleteCommentAction');


    Route::any('/addService', [\App\Http\Controllers\backend\LeadController\LeadController:: class, 'addService'])->name('addService');
    Route::any('/addServiceAction', [\App\Http\Controllers\backend\LeadController\LeadController:: class, 'addServiceAction'])->name('addServiceAction');
    Route::any('/deleteServiceAction/{id?}', [\App\Http\Controllers\backend\LeadController\LeadController:: class, 'deleteServiceAction'])->name('deleteServiceAction');
    Route::any('/editService/{id?}', [\App\Http\Controllers\backend\LeadController\LeadController:: class, 'editService'])->name('editService');
    Route::any('/editServiceAction', [\App\Http\Controllers\backend\LeadController\LeadController:: class, 'editServiceAction'])->name('editServiceAction');

    //    Route::any('/showService', [\App\Http\Controllers\backend\LeadController\LeadController:: class, 'showService'])->name('showService');


    Route::any('/addAccounts', [\App\Http\Controllers\backend\AccountController\AccountController:: class, 'addAccounts'])->name('addAccounts');
    Route::any('/addAccountsAction', [\App\Http\Controllers\backend\AccountController\AccountController:: class, 'addAccountsAction'])->name('addAccountsAction');
    Route::any('/show-accounts', [\App\Http\Controllers\backend\AccountController\AccountController:: class, 'showAccounts'])->name('show-accounts');
    Route::any('/editAccount/{id?}', [\App\Http\Controllers\backend\AccountController\AccountController:: class, 'editAccount'])->name('editAccount');
    Route::any('/editAccountAction', [\App\Http\Controllers\backend\AccountController\AccountController:: class, 'editAccountAction'])->name('editAccountAction');
    Route::any('/deleteAccountAction/{id?}', [\App\Http\Controllers\backend\AccountController\AccountController:: class, 'deleteAccountAction'])->name('deleteAccountAction');



    Route::any('/addClient', [\App\Http\Controllers\backend\ClientController\ClientController:: class, 'addClient'])->name('addClient');
    Route::any('/showClient', [\App\Http\Controllers\backend\ClientController\ClientController:: class, 'showClient'])->name('showClient');
    Route::any('/addClientAction', [\App\Http\Controllers\backend\ClientController\ClientController:: class, 'addClientAction'])->name('addClientAction');
    Route::any('/editClient/{id?}', [\App\Http\Controllers\backend\ClientController\ClientController:: class, 'editClient'])->name('editClient');
    Route::any('/editClientAction', [\App\Http\Controllers\backend\ClientController\ClientController:: class, 'editClientAction'])->name('editClientAction');
    Route::any('/deleteClientAction/{id?}', [\App\Http\Controllers\backend\ClientController\ClientController:: class, 'deleteClientAction'])->name('deleteClientAction');


    Route::any('/invoice', [\App\Http\Controllers\backend\InvoiceController\InvoiceController:: class, 'invoice'])->name('invoice');
    Route::any('/showInvoice', [\App\Http\Controllers\backend\InvoiceController\InvoiceController:: class, 'showInvoice'])->name('showInvoice');
    Route::any('/addInvoice', [\App\Http\Controllers\backend\InvoiceController\InvoiceController:: class, 'addInvoice'])->name('addInvoice');
    Route::any('/editInvoice/{id?}', [\App\Http\Controllers\backend\InvoiceController\InvoiceController:: class, 'editInvoice'])->name('editInvoice');
    Route::any('/editInvoiceAction', [\App\Http\Controllers\backend\InvoiceController\InvoiceController:: class, 'editInvoiceAction'])->name('editInvoiceAction');
    Route::any('/deleteInvoiceAction/{id?}', [\App\Http\Controllers\backend\InvoiceController\InvoiceController:: class, 'deleteInvoiceAction'])->name('deleteInvoiceAction');

});


Route::group(['namespace' => 'backend'], function () {
    Route::any('/login', [\App\Http\Controllers\login\LoginAdminController:: class, 'login'])->name('login');
    Route::any('/loginDashbord', [\App\Http\Controllers\login\LoginAdminController:: class, 'loginDashbord'])->name('loginDashbord');
    Route::any('/admin-logout', [\App\Http\Controllers\login\LoginAdminController:: class, 'logout'])->name('admin-logout');


});
