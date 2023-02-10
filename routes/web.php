<?php

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

// Route::get('/', function () {
//     return view('website.pages.home');
// });

/**
 * Website Route
 */
Route::get('/', 'Website\FrontPageController@home')->name('website.home');
//Route::get('/{para}', 'Website\FrontPageController@home')->name('website.home');
Route::get('/about', 'Website\FrontPageController@about')->name('website.about');
Route::get('/project', 'Website\FrontPageController@projects')->name('website.projects');
Route::get('/project/{id}', 'Website\FrontPageController@singleProject')->name('website.single.project');
Route::get('/event/{id}', 'Website\FrontPageController@singleEvent')->name('website.single.event');
Route::get('/event', 'Website\FrontPageController@events')->name('website.events');
Route::get('/contact', 'Website\FrontPageController@contacts')->name('website.contacts');
Route::post('/contact', 'Website\FrontPageController@storeContacts')->name('website.contacts');

Auth::routes();

/**
 * Admin Routes
 */

Route::group([
    'prefix' => 'controlpanel',
    'middleware' => ['auth']
], function () {

    Route::get('/ausadmindashboard', 'Admin\AdminHomeController@index')->name('ausadmindashboard');
    Route::get('/admin/register/manage', 'Admin\AdminHomeController@users');
    Route::get('/admin/register/delete/{id}', 'Admin\AdminHomeController@delete');

    //Company Route
    Route::get('/admin/company/manage', 'Admin\WebsiteOptionController@company');
    Route::get('/admin/company/manage/{id}', 'Admin\WebsiteOptionController@companyPublish');
    Route::get('/admin/company/add', 'Admin\WebsiteOptionController@companyAddForm');
    Route::post('/admin/company/add', 'Admin\WebsiteOptionController@companyAdd');
    Route::get('/admin/company/delete/{id}', 'Admin\WebsiteOptionController@companyDelete');
    Route::get('/admin/company/edit/{id}', 'Admin\WebsiteOptionController@companyEdit');
    Route::post('/admin/company/edit', 'Admin\WebsiteOptionController@companyUpdate');

    //Slider Route
    Route::get('/admin/company/slider/manage', 'Admin\WebsiteOptionController@slider');
    Route::get('/admin/company/slider/publish/{id}', 'Admin\WebsiteOptionController@sliderPublish');
    Route::get('/admin/company/slider/unpublished/{id}', 'Admin\WebsiteOptionController@sliderUnpublish');
    Route::get('/admin/company/slider/add', 'Admin\WebsiteOptionController@sliderAddForm');
    Route::post('/admin/company/slider/add', 'Admin\WebsiteOptionController@sliderAdd');
    Route::get('/admin/company/slider/delete/{id}', 'Admin\WebsiteOptionController@sliderDelete');
    Route::get('/admin/company/slider/edit/{id}', 'Admin\WebsiteOptionController@sliderEdit');
    Route::post('/admin/company/slider/edit', 'Admin\WebsiteOptionController@sliderUpdate');

    // Chairman Route
    Route::get('/admin/company/chairman/message', 'Admin\WebsiteOptionController@chairmanMessage');
    Route::post('/admin/company/chairman/message/add', 'Admin\WebsiteOptionController@chairmanMessageUpdate');

    //Mission vision Content Route
    Route::get('/admin/company/others/manage', 'Admin\WebsiteOptionController@mv');
    Route::get('/admin/company/others/publish/{id}', 'Admin\WebsiteOptionController@mvPublish');
    Route::get('/admin/company/others/unpublished/{id}', 'Admin\WebsiteOptionController@mvUnpublish');
    Route::get('/admin/company/others/add', 'Admin\WebsiteOptionController@mvAddForm');
    Route::post('/admin/company/others/add', 'Admin\WebsiteOptionController@mvAdd');
    Route::get('/admin/company/others/delete/{id}', 'Admin\WebsiteOptionController@mvDelete');
    Route::get('/admin/company/others/edit/{id}', 'Admin\WebsiteOptionController@mvEdit');
    Route::post('/admin/company/others/edit', 'Admin\WebsiteOptionController@mvUpdate');

    //Contact Route
    Route::get('/admin/contact/manage', 'Admin\WebsiteOptionController@contactList');
    Route::get('/admin/contact/delete/{id}', 'Admin\WebsiteOptionController@contactDelete');

    //Page Content Route
    Route::get('/admin/page/manage', 'Admin\PageController@page');
    Route::get('/admin/page/publish/{id}', 'Admin\PageController@pagePublish');
    Route::get('/admin/page/unpublished/{id}', 'Admin\PageController@pageUnpublish');
    Route::get('/admin/page/add', 'Admin\PageController@pageAddForm');
    Route::post('/admin/page/add', 'Admin\PageController@pageAdd');
    Route::get('/admin/page/delete/{id}', 'Admin\PageController@pageDelete');
    Route::get('/admin/page/edit/{id}', 'Admin\PageController@pageEdit');
    Route::post('/admin/page/edit', 'Admin\PageController@pageUpdate');

    //Page Content Route
    Route::get('/admin/page/content/manage', 'Admin\PageController@pageContent');
    Route::get('/admin/page/content/publish/{id}', 'Admin\PageController@pageContentPublish');
    Route::get('/admin/page/content/unpublished/{id}', 'Admin\PageController@pageContentUnpublish');
    Route::get('/admin/page/content/add', 'Admin\PageController@pageContentAddForm');
    Route::post('/admin/page/content/add', 'Admin\PageController@pageContentAdd');
    Route::get('/admin/page/content/delete/{id}', 'Admin\PageController@pageContentDelete');
    Route::get('/admin/page/content/edit/{id}', 'Admin\PageController@pageContentEdit');
    Route::post('/admin/page/content/edit', 'Admin\PageController@pageContentUpdate');

    //Service Content Route
    Route::get('/admin/service/manage', 'Admin\ServiceController@service');
    Route::get('/admin/service/publish/{id}', 'Admin\ServiceController@servicePublish');
    Route::get('/admin/service/unpublished/{id}', 'Admin\ServiceController@serviceUnpublish');
    Route::get('/admin/service/add', 'Admin\ServiceController@serviceAddForm');
    Route::post('/admin/service/add', 'Admin\ServiceController@serviceAdd');
    Route::get('/admin/service/delete/{id}', 'Admin\ServiceController@serviceDelete');
    Route::get('/admin/service/edit/{id}', 'Admin\ServiceController@serviceEdit');
    Route::post('/admin/service/edit', 'Admin\ServiceController@serviceUpdate');


    //Project Route
    Route::get('/admin/project/manage', 'Admin\ProjectController@index');
    Route::get('/admin/project/details/{id}', 'Admin\ProjectController@details');
    Route::get('/admin/project/publish/{id}', 'Admin\ProjectController@projectPublish');
    Route::get('/admin/project/unpublished/{id}', 'Admin\ProjectController@projectUnpublish');
    Route::get('/admin/project/add', 'Admin\ProjectController@projectAddForm');
    Route::post('/admin/project/add', 'Admin\ProjectController@projectAdd');
    Route::get('/admin/project/delete/{id}', 'Admin\ProjectController@projectDelete');
    Route::get('/admin/project/edit/{id}', 'Admin\ProjectController@projectEdit');
    Route::post('/admin/project/edit', 'Admin\ProjectController@projectUpdate');

    //Project diagram route
    Route::get('/admin/project/diagram/add/{id}', 'Admin\ProjectController@diagramView');
    Route::get('/admin/project/diagram/add', 'Admin\ProjectController@diagramAddForm');
    Route::post('/admin/project/diagram/add', 'Admin\ProjectController@diagramAdd');
    Route::get('/admin/project/{project_id}/diagram/publish/{id}', 'Admin\ProjectController@diagramPublish');
    Route::get('/admin/project/{project_id}/diagram/unpublished/{id}', 'Admin\ProjectController@diagramUnpublish');
    Route::get('/admin/project/{project_id}/diagram/delete/{id}', 'Admin\ProjectController@diagramDelete');

    //Project featured image route
    Route::get('/admin/project/featured/add/{id}', 'Admin\ProjectController@featuredView');
    Route::get('/admin/project/featured/add', 'Admin\ProjectController@featuredAddForm');
    Route::post('/admin/project/featured/add', 'Admin\ProjectController@featuredAdd');
    Route::get('/admin/project/{project_id}/featured/publish/{id}', 'Admin\ProjectController@featuredPublish');
    Route::get('/admin/project/{project_id}/featured/unpublished/{id}', 'Admin\ProjectController@featuredUnpublish');
    Route::get('/admin/project/{project_id}/featured/delete/{id}', 'Admin\ProjectController@featuredDelete');

    //event Route
    Route::get('/admin/event/manage', 'Admin\EventController@index');
    Route::get('/admin/event/publish/{id}', 'Admin\EventController@eventPublish');
    Route::get('/admin/event/unpublished/{id}', 'Admin\EventController@eventUnpublish');
    Route::get('/admin/event/add', 'Admin\EventController@eventAddForm');
    Route::post('/admin/event/add', 'Admin\EventController@eventAdd');
    Route::get('/admin/event/delete/{id}', 'Admin\EventController@eventDelete');
    Route::get('/admin/event/edit/{id}', 'Admin\EventController@eventEdit');
    Route::post('/admin/event/edit', 'Admin\EventController@eventUpdate');

    //employee Route
    Route::get('/admin/employee/manage', 'Admin\EmployeeController@index');
    Route::get('/admin/employee/publish/{id}', 'Admin\EmployeeController@employeePublish');
    Route::get('/admin/employee/unpublished/{id}', 'Admin\EmployeeController@employeeUnpublish');
    Route::get('/admin/employee/add', 'Admin\EmployeeController@employeeAddForm');
    Route::post('/admin/employee/add', 'Admin\EmployeeController@employeeAdd');
    Route::get('/admin/employee/delete/{id}', 'Admin\EmployeeController@employeeDelete');
    Route::get('/admin/employee/edit/{id}', 'Admin\EmployeeController@employeeEdit');
    Route::post('/admin/employee/edit', 'Admin\EmployeeController@employeeUpdate');

    //Tracker Route
    Route::get('/admin/track/visitor', 'Tracker\VisitorsController@visitors');
    Route::get('/admin/track/session', 'Tracker\VisitorsController@sessions');
    Route::get('/admin/track/error', 'Tracker\VisitorsController@errors');

});
