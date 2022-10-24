<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\IEDatabase;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DfxController;
use App\Http\Controllers\InventoryLean;
use App\Http\Controllers\auditController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ercDataController;
use App\Http\Controllers\ApiMovieController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LeanMediaController;
use App\Http\Controllers\inspectionController;
use App\Http\Controllers\recruitmentController;
use App\Http\Controllers\siOfficerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// AUTH CONTROLLER
    Route::get('/login',[LoginController::class,'index'])->middleware('guest');
    Route::post('/login',[LoginController::class,'authenticate']);

    Route::get('/register',[RegisterController::class,'index']);
    Route::post('/register',[RegisterController::class,'store']);
//event
    Route::get('/event', [eventController::class, 'index']);
    Route::get('/event/show', [eventController::class, 'show'])->name('event.show');
    Route::get('/event/area', [eventController::class, 'area'])->name('event.area');
    Route::post('/event/save', [eventController::class, 'save'])->name('event.save');
    Route::post('/event/update', [eventController::class, 'update'])->name('event.update');
    Route::post('/event/delete', [eventController::class, 'delete'])->name('event.delete');
    Route::post('/event/deleteCheckbox', [eventController::class, 'deleteCheckbox'])->name('event.deleteCheckbox');
    Route::get('/event/showUpdate', [eventController::class, 'showUpdate'])->name('event.showUpdate');
    Route::get('/event/showSelectDelete', [eventController::class, 'showSelectDelete'])->name('event.showSelectDelete');

//employeeController
    Route::get('/recruitment/input', [recruitmentController::class, 'index']);
    Route::get('/recruitment/mail', [recruitmentController::class, 'sendEmail']);
    Route::get('/recruitment/show', [recruitmentController::class, 'showTable'])->name('recruitment.showTable');
    Route::get('/recruitment/showTable', [recruitmentController::class, 'show'])->name('recruitment.show');
    Route::POST('/recruitment/search', [recruitmentController::class, 'search'])->name('recruitment.search');
    Route::get('/recruitment/showDepartemenList', [recruitmentController::class, 'showDepartemen'])->name('recruitment.showDepartemenList');
    Route::POST('/recruitment/import', [recruitmentController::class, 'importExcel'])->name('recruitment.import');
    Route::POST('/recruitment/statusCandidate', [recruitmentController::class, 'statusCandidate'])->name('recruitment.statusCandidate');
    Route::POST('/recruitment/deleteCandidate', [recruitmentController::class, 'deleteCandidate'])->name('recruitment.deleteCandidate');
    Route::POST('/recruitment/sendEmail', [recruitmentController::class, 'sendEmail'])->name('recruitment.sendEmail');
    Route::GET('/recruitment/showSelectCandidate', [recruitmentController::class, 'showSelectCandidate'])->name('recruitment.showSelectCandidate');
    
    Route::get('/recruitment/test_index', [recruitmentController::class, 'recruitment_index']);
    Route::get('/recruitment/result/index', [recruitmentController::class, 'result_index'])->name('recruitment.result.index');
    Route::get('/recruitment/result/next', [recruitmentController::class, 'result_next'])->name('recruitment.result.next');
    Route::get('/recruitment/result/search', [recruitmentController::class, 'result_search'])->name('recruitment.result.search');

    // Route::get('/recruitment/test/tanggalTest', [recruitmentController::class, 'tanggalTest'])->name('recruitment.test.tanggalTest');
    // Route::get('/recruitment/test/searchDataCandidate', [recruitmentController::class, 'searchDataCandidate'])->name('recruitment.test.searchDataCandidate');
    // Route::get('/recruitment/download_file_excel', [recruitmentController::class, 'download_file_excel']);
    
    Route::get('/recruitment/test', [recruitmentController::class, 'test']);
    Route::post('/recruitment/test/save', [recruitmentController::class, 'save_test'])->name('recruitment.test.save');
    Route::get('/recruitment/test/main', [recruitmentController::class, 'test_main']);
    Route::post('/recruitment/show/quis', [recruitmentController::class, 'show_quis'])->name('recruitment.show.quis');
    Route::post('/recruitment/show/soal_jawaban', [recruitmentController::class, 'soal_jawaban'])->name('recruitment.show.soal_jawaban');
    Route::get('/recruitment/show/testOnline', [recruitmentController::class, 'show_testOnline'])->name('recruitment.show.testOnline');
    Route::get('/recruitment/check/main', [recruitmentController::class, 'check_main'])->name('recruitment.check.main');
    Route::get('/recruitment/check/done', [recruitmentController::class, 'check_done'])->name('recruitment.check.done');
    Route::get('/recruitment/check/time', [recruitmentController::class, 'check_time'])->name('recruitment.check.time');

    Route::get('/recruitment/remove/time', [recruitmentController::class, 'remove_time'])->name('recruitment.remove.time');
//--erc--//
    //progress erc chart
            Route::get('/erc',[ercDataController::class, 'index']);
            Route::POST('/erc/save/',[ercDataController::class, 'Save'])->name('erc.save');//Live Save
            Route::get('sumERC/',[ercDataController::class, 'sumERC'])->name('erc.sumERC');//Sum ERC
            Route::get('erc/live_search/action_show_data/', [ercDataController::class, 'action_summary'])->name('erc.live_search.action_show_data');//live search
            Route::get('/erc/dataERC',[ercDataController::class, 'dataERC']);//data ERC
            Route::get('/erc/dataERC/delete/{id}',[ercDataController::class, 'delete_dataERC']);//delete erc delete
            Route::POST('erc/live_search/action_show_data_erc/', [ercDataController::class, 'action_data'])->name('erc.live_search.action_show_data_erc');//live search
            Route::POST('/erc/data_save/',[ercDataController::class, 'data_Save'])->name('erc.data_save');//Live Save
        Route::post('/erc/sumERC/search','ercDataController@search_sumERC');
        Route::get('/erc/sumERC/search_all','ercDataController@search_sumERC_all');
        Route::post('/erc/dataERC/search','ercDataController@search_dataERC');
        
//IE Database
    Route::get('/Ie_base/man_separation',[IEDatabase::class, 'man_separation']);
    Route::get('/ie_base/cs',[IEDatabase::class, 'computer_stitching']);
    Route::get('ie_base/live_search/action_cs/', [IEDatabase::class, 'action_cs'])->name('ie_base.live_search.action_cs');
    Route::POST('/ie_base/save_cs/', [IEDatabase::class, 'Save_cs'])->name('ie_base.save_cs');
    Route::POST('/ie_base/save/', [IEDatabase::class, 'Save'])->name('ie_base.save');

    Route::get('/Ie_base/area',[IEDatabase::class, 'main_cell']);
    Route::get('ie_base/live_search/action_cutting/', [IEDatabase::class, 'action_cutting'])->name('ie_base.live_search.action_cutting');
    Route::get('ie_base/live_search/action_sewing/', [IEDatabase::class, 'action_sewing'])->name('ie_base.live_search.action_sewing');
    Route::get('ie_base/live_search/action_assembling/', [IEDatabase::class, 'action_assembling'])->name('ie_base.live_search.action_assembling');
    Route::get('ie_base/live_search/action_stockfit/', [IEDatabase::class, 'action_stockfit'])->name('ie_base.live_search.action_stockfit');
    Route::get('ie_base/live_search/action_offline/', [IEDatabase::class, 'action_offline'])->name('ie_base.live_search.action_offline');
    Route::get('ie_base/live_search/tos/searchProcess', [IEDatabase::class, 'searchProcessTOS'])->name('ie_base.live_search.tos.searchProcess');
    Route::get('ie_base/live_search/tos/search', [IEDatabase::class, 'searchTOS'])->name('ie_base.live_search.tos.search');
    Route::get('ie_base/live_search/optionArea', [IEDatabase::class, 'optionArea'])->name('ie_base.live_search.optionArea');
    // additional route
        Route::get('/ie_base/archive/{id}',[IEDatabase::class, 'Archive']);
        Route::get('/Ie_base/search/{id}',[IEDatabase::class, 'cellSearch']);
        Route::get('/ie_base/history/{id}',[IEDatabase::class, 'history']);
    //IE TOS
        //index
        Route::get('ie_base/tos/index',[IEDatabase::class, 'tosIndex']);
        Route::post('ie_base/tos/index/print_pdf',[IEDatabase::class, 'cetak_pdf'])->name('ie_base.tos.index.print_pdf');
        Route::POST('/ie_base/tos/save_tos', [IEDatabase::class, 'SaveTOS'])->name('ie_base.tos.save_tos');
        Route::POST('/ie_base/tos/', [IEDatabase::class, 'update_tos'])->name('ie_base.tos.update_tos');

//LEAN Media
    // NEW BALANCE
    Route::get('/leanmedia/form_input', [LeanMediaController::class, 'form_input']);
    // SOP Image - Video
        Route::get('/leanmedia/index', [LeanMediaController::class, 'index']);
        Route::get('/leanmedia/concept', [LeanMediaController::class, 'concept']);
        Route::get('/leanmedia/sop/{id}', [LeanMediaController::class, 'sop']);
        Route::get('leanmedia/live_search/sop/{id}', [LeanMediaController::class, 'action_sop'])->name('leanmedia.live_search.sop.{id}');
        Route::get('leanmedia/action_getData/sop/', [LeanMediaController::class, 'action_getDatasop'])->name('leanmedia.action_getData.sop');
        Route::get('leanmedia/action_modal_sop',  [LeanMediaController::class, 'action_modal_sop'])->name('leanmedia.action_modal_sop');
        Route::get('leanmedia/action_modal_addData', [LeanMediaController::class, 'action_model_addData'])->name('leanmedia.action_modal_addData');
        Route::get('leanmedia/action_search_process', [LeanMediaController::class, 'action_search_process'])->name('leanmedia.action_search_process');
        Route::get('leanmedia/action_search_process2', [LeanMediaController::class, 'action_search_process2'])->name('leanmedia.action_search_process2');
        Route::get('leanmedia/action_inputList',[LeanMediaController::class, 'action_inputList'])->name('leanmedia.action_inputList');
    // OIB Image - Video
        Route::get('/leanmedia/oib_index', 'LeanMediaController@oib_index');
        Route::get('/leanmedia/oib', 'LeanMediaController@oib');
        Route::get('leanmedia/live_search/oib', 'LeanMediaController@action_oib')->name('leanmedia.live_search.oib');
        Route::get('leanmedia/action_getData/oib/', 'LeanMediaController@action_getDataoib')->name('leanmedia.action_getData.oib');
        Route::get('leanmedia/action_modal_oib',[LeanMediaController::class, 'action_modal_oib'])->name('leanmedia.action_modal_oib');
    // CCQP Image - Video
        Route::get('/leanmedia/ccqp/', 'LeanMediaController@ccqp');
        Route::get('leanmedia/live_search/ccqp/', 'LeanMediaController@action_ccqp')->name('leanmedia.live_search.ccqp');
        Route::get('leanmedia/live_getData/ccqp/', 'LeanMediaController@action_getDataccqp')->name('leanmedia.live_getData.ccqp');
    // action
        Route::post('/leanmedia/save_sop', 'LeanMediaController@save_sop');
        Route::post('/leanmedia/save', [LeanMediaController::class, 'save']);
        Route::post('/leanmedia/save/swcs', 'LeanMediaController@save_swcs');
        Route::post('/leanmedia/save_video', 'LeanMediaController@Save_video_swcs')->name('leanmedia.save_video');
        Route::get('/leanmedia/delete/{id}', 'LeanMediaController@delete');
        Route::get('/openPDF', 'LeanMediaController@openPDF');
        // live delete
            Route::POST('leanmedia/delete_model', 'LeanMediaController@delete_model')->name('leanmedia.delete_model');
            Route::POST('leanmedia/delete_model_all', 'LeanMediaController@delete_model_all')->name('leanmedia.delete_model_all');
        // live save
            Route::POST('/leanmedia/save_swcs/', 'LeanMediaController@Save_swcs')->name('leanmedia.save_swcs');
        //live update
            Route::POST('/leanmedia/update_image/', 'LeanMediaController@Update_image')->name('leanmedia.update_image');



    Route::get('/leanmedia/search_image/sop/{id}',[LeanMediaController::class, 'search_image']);
    Route::get('/leanmedia/search_image/oib/{id}',[LeanMediaController::class, 'search_image_oib']);
    Route::get('/leanmedia/search_image/cr/{id}',[LeanMediaController::class, 'search_image_cr']);
    Route::get('/leanmedia/search_image/ccqp/{id}',[LeanMediaController::class, 'search_image_ccqp']);
    Route::get('/leanmedia/search_video/sop/{id}',[LeanMediaController::class, 'search_video']);
    Route::get('/leanmedia/search/swcs/{id}', [LeanMediaController::class, 'search_swcs']);
    Route::get('/leanmedia/make_sop', [LeanMediaController::class, 'make_sop']);

    Route::get('leanmedia/cell_area_sop', [LeanMediaController::class, 'find_cell_area_sop'])->name('leanmedia.cell_area_sop');

    Route::get('/test', [InventoryLean::class, 'test']);

//LEAN Media
    // NEW BALANCE
    Route::get('/InventoryLean', [InventoryLean::class, 'index']);
    Route::get('/InventoryLean/show', [InventoryLean::class, 'show'])->name('inventoryLean.show');
    Route::get('/InventoryLean/showLocation', [InventoryLean::class, 'show_location'])->name('inventoryLean.showLocation');
    Route::get('/InventoryLean/showDetailInventory', [InventoryLean::class, 'show_detail'])->name('inventoryLean.showDetailInventory');
    Route::post('/InventoryLean/saveLocation', [InventoryLean::class, 'save_location'])->name('InventoryLean.saveLocation');
// 6s part
    Route::get('/audit',[auditController::class, 'index'])->name('audit');
    Route::post('/audit/form',[auditController::class, 'form'])->name('audit.form');
    Route::get('/audit/form/{id}',[auditController::class, 'form_id']);
    Route::get('/audit/manage_index','auditController@manage_index');
    Route::post('/audit/manage','auditController@manage');
    Route::get('/audit/action/{id}','auditController@action');
    Route::get('/audit/register/auditor','auditController@register_auditor');
    Route::get('/audit/report',[auditController::class, 'report'])->name('audit.report');
    Route::get('/audit/report_ex','auditController@report_ex');
    // crud 
        Route::POST('/audit/save',[auditController::class, 'save_audit'])->name('audit.save');
        Route::POST('/audit/manage/save','auditController@save_manage');
        Route::POST('/audit/action/save','auditController@save_action');
        Route::POST('/audit/action/update','auditController@update_action');

    //action
        Route::post('/audit_pdf','auditController@cetak_pdf');
        Route::get('/audit/manage/send','auditController@send');

    // js 
        Route::get('/audit/show/list_cell',[auditController::class, 'js_show_list_auditor'])->name('audit.show.list_cell');
        Route::get('audit/live_search/show_action/', 'auditController@js_audit_action_show')->name('audit.live_search.show_action');
        Route::get('audit/live_search/show_done_action/', 'auditController@js_audit_action_show_done')->name('audit.live_search.show_done_action');
        Route::post('audit/multiple_delete/manage/', 'auditController@js_DeleteMultiple_manage')->name('audit.multiple_delete.manage');
        Route::get('audit/live_show/ShowAuditor/', 'auditController@js_form_auditor')->name('audit.live_show.ShowAuditor');
        Route::get('audit/live_show/form_register/', 'auditController@js_form_register')->name('audit.live_show.form_register');
        Route::post('audit/save_auditor','auditController@js_save_auditor')->name('audit.save_auditor');
        Route::post('audit/multiple_delete/auditor/', 'auditController@js_DeleteMultiple_auditor')->name('audit.multiple_delete.auditor');

        Route::get('/seq_inspection',[inspectionController::class, 'seq_inspection']);
        Route::get('/seq_inspection/main',[inspectionController::class, 'main']);
        Route::get('/seq_inspection/save_count',[inspectionController::class, 'save_count'])->name('seq_inspection.save_count');
        Route::get('/seq_inspection/save_self',[inspectionController::class, 'save_self'])->name('seq_inspection.save_self');
        Route::get('/seq_inspection/save_seq',[inspectionController::class, 'save_seq'])->name('seq_inspection.save_seq');
        Route::get('/seq_inspection/reload',[inspectionController::class, 'reload'])->name('seq_inspection.reload');
    
    //dfx
        //--dfx--//
        Route::get('/dfx', [DfxController::class,'index']);
        Route::get('/dfx/main', [DfxController::class,'main'])->name('dfx.main');
        Route::get('/dfx/changeSeason', [DfxController::class,'changeSeason'])->name('dfx.changeSeason');
        Route::get('/dfx/changeModel', [DfxController::class,'changeModel'])->name('dfx.changeModel');
        Route::post('/dfx/search', [DfxController::class,'search']);
        Route::post('/dfx/upload', [DfxController::class,'importexcel']);
        Route::get('/dfx/input', [DfxController::class,'form_input']);
        Route::post('/dfx/save', [DfxController::class,'save_dfx']);

        
        Route::get('/belajar',[inspectionController::class, 'belajar']);
        Route::get('/api-movie', [ApiMovieController::class, 'index']);
    // SI
        Route::get('/SI_',[siOfficerController::class, 'index']);
        Route::get('/SI_dashboard',[siOfficerController::class, 'dashboard']);
        Route::post('/SI_/upload',[siOfficerController::class, 'upload']);
        Route::get('/SI_/sarchData',[siOfficerController::class, 'searchData'])->name('SI_.sarchData');
        Route::get('/SI_/searchAll',[siOfficerController::class, 'searchAll'])->name('SI_.searchAll');
        Route::get('/SI_/searchEXP',[siOfficerController::class, 'searchEXP'])->name('SI_.searchEXP');
        Route::post('/SI_/updateInspection',[siOfficerController::class, 'updateInspection'])->name('SI_.updateInspection');
            Route::post('/SI_/live_search/action_show_SI',[siOfficerController::class, 'action_Search_SI'])->name('SI_.live_search.action_show_SI');

