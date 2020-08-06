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
Route::get('locale/{locale}', function ($locale)
{
    Session::put('locale', $locale);
    return redirect()->back();
});
Route::get('/', 'HomeController@index');

Route::get('trang-chu', 'HomeController@getHome')->name('dashboard');

// login admin
Route::get('/admin/login', 'LoginAdminController@get_login_admin')->name('get.admin.login');
Route::post('/admin/login', 'LoginAdminController@post_login_admin')->name('post.admin.login');
Route::get('logout', 'LoginAdminController@get_logout_admin');

// trang chủ admin
Route::get('admin', 'DashboardController@get_admin')->name('get.admin')->middleware('CheckLoginAdmin');

Route::get('loaisanpham/{id}/{tenloai}', 'HomeController@loaisanpham');

Route::get('ctsp/{id}/{tenloai}', 'HomeController@ctsp');

Route::get('/lien-he-mobile', 'HomeController@get_lienhe')->name('get.lienhe.mobile');
Route::post('/lien-he-mobile', 'HomeController@post_lienhe_mobile');
Route::post('/lien-he', 'HomeController@post_lienhe')->name('post.lien-he');

Route::get('gioi-thieu', 'HomeController@get_gioithieu')->name('get.gioithieu');

Route::get('bai-viet', 'HomeController@get_baiviet')->name('get.blog');
Route::get('loaibaiviet/{id}/{tenloai}', 'HomeController@loaibaiviet');
Route::get('chi-tiet-bai-viet/{id}/{tenloai}', 'HomeController@get_chitietbaiviet')->name('get.chitietbaiviet');

Route::post('/danhgia/{id}', 'HomeController@postsaveComment')->name('post.save.products');

// Route::get('search', 'SearchController@searchResult');


Route::get('/search', 'SearchController@getSearch')->name('get.search');
Route::post('/autocomplete', 'SearchController@postSearch')->name('autocomplete.fetch');

//cart
Route::group(['prefix' => 'pages'], function ()
{
    Route::group(['prefix' => 'cart'], function ()
    {
        Route::get('add/{id}', 'CartController@addProduct')->name('add.cart');

        Route::get('gio-hang', 'CartController@getListCart')->name('get.list.cart');

        Route::delete('delete/{id}', 'CartController@getDeleteCart')->name('get.delete.cart');
        Route::delete('delete_all_cart', 'CartController@getDelete_all_cart');

        Route::get('update', 'CartController@getUpdateCart')->name('get.update.cart');

        Route::get('checkout', 'CartController@getcheckout')->name('get.checkout');
        Route::post('checkout', 'CartController@postcheckout');

        Route::get('care_customer', 'CartController@getcare_customer')->name('get.care_customer');
    });
});
//info account
Route::get('thong-tin-ca-nhan', 'InfoCustomerController@get_update_ttcx')->name('get.info');
Route::post('thong-tin-ca-nhan', 'InfoCustomerController@post_update_ttcx')->name('post.info');

Route::get('lichsugiaodich/{id}', 'InfoCustomerController@getlichsugiaodich')->name('get.lichsugiaodich');
Route::get('chitiethoadonkh/{id}', 'InfoCustomerController@getchitiethoadonkh');
Route::get('huydonhang/{id}', 'InfoCustomerController@gethuydonhang');

Route::get('logout_account', 'HomeController@get_logout_account')->name('get.logout.account');

Route::get('thay-doi-mat-khau', 'HomeController@getchange_pass')->name('get.change_pass');
Route::post('thay-doi-mat-khau', 'HomeController@postchange_pass');
Route::get('logout_change_pass', 'HomeController@get_logout_change_pass')->name('get.logout.change_pass');

Route::get('quen-mat-khau', 'HomeController@get_forgot_password')->name('get.forgot_password');
Route::post('quen-mat-khau', 'HomeController@sendTokenResetPassword');

Route::get('reset/password', 'HomeController@resetPassword')->name('get.link.reset_password');
Route::post('reset/password', 'HomeController@saveResetPassword');

//user
Route::get('dang-ky', 'RegisterController@get_register')->middleware('login')->name('dang-ky');
Route::post('dang-ky', 'RegisterController@post_register')->name('post.register');

route::get('refresh_captcha', 'RegisterController@get_refresh')->name('get.refresh');


Route::get('xac-nhan-tai-khoan', 'RegisterController@verify_account')->name('user.verify.account');

Route::get('dang-nhap', 'DangNhapController@getLogin')->middleware('login')->name('dang-nhap');
Route::post('dang-nhap', 'DangNhapController@postLogin');

Route::get('facebook-login', 'SocialController@redirectToProvider');
Route::get('facebook-login-callback', 'SocialController@handleProviderCallback');

Route::get('dang-xuat', 'DangNhapController@get_logout')->name('get.logout.all');

//admin
Route::group(['prefix' => 'admin', 'middleware' => 'CheckLoginAdmin'], function ()
{

    Route::group(['prefix' => 'admin'], function ()
    {

        Route::get('add', 'AdminController@getthem')->name('get.add.admin');
        Route::post('add', 'AdminController@postthem');

        Route::get('update/{id}', 'AdminController@getsua')->name('get.update.admin');
        Route::post('update/{id}', 'AdminController@postsua');

        Route::delete('delete/{id}', 'AdminController@getxoa')->name('get.delete.admin');

        Route::get('change_pass/{id}', 'AdminController@getchange_pass')->name('get.change_pass');
        Route::post('change_pass/{id}', 'AdminController@postchange_pass');
    });

    Route::group(['prefix' => 'contact'], function ()
    {
        Route::get('list', 'ContactController@getdanhsach')->name('get.list.contact');
        Route::post('contact/getData', 'ContactController@getData')->name('get.data.contact');

        Route::delete('delete/{id}', 'ContactController@getxoa')->name('get.delete.contact');
        Route::delete('delete_all', 'ContactController@get_delete_all');
    });

    Route::group(['prefix' => 'comment'], function ()
    {
        Route::get('list', 'CommentController@getlistComment')->name('get.list.comment');
        Route::post('comment/getData', 'CommentController@getData')->name('get.data.comment');

        Route::delete('delete/{id}', 'CommentController@getxoa')->name('get.delete.comment');
        Route::delete('delete_all', 'CommentController@get_delete_all');
        Route::get('changeStatusComment', 'CommentController@changeStatusComment')->name('get.changeStatusComment');

    });

    Route::group(['prefix' => 'cate_product'], function ()
    {
        Route::get('list', 'CateProductController@get_list')->name('get.list.cate_product');
        Route::post('cate_product/getData', 'CateProductController@getData')->name('get.data.cate_product');

        Route::get('add', 'CateProductController@get_add')->name('get.add.cate_product');
        Route::post('add', 'CateProductController@post_add');

        Route::get('edit/{id}', 'CateProductController@get_edit')->name('get.edit.cate_product');
        Route::post('edit/{id}', 'CateProductController@post_edit');

        Route::delete('delete/{id}', 'CateProductController@get_delete')->name('get.delete.cate_product');
        Route::get('changeStatusCateProduct', 'CateProductController@changeStatusCateProduct')->name('get.changeStatusCateProduct');

    });

    Route::group(['prefix' => 'cate_product_detail'], function ()
    {
        Route::get('list', 'CateProductDetailController@get_list')->name('get.list.cate_product_detail');
        Route::post('cate_product_detail/getData', 'CateProductDetailController@getData')->name('get.data.cate_product_detail');

        Route::get('add', 'CateProductDetailController@get_add')->name('get.add.cate_product_detail');
        Route::post('add', 'CateProductDetailController@post_add');

        Route::get('edit/{id}', 'CateProductDetailController@get_edit')->name('get.edit.cate_product_detail');
        Route::post('edit/{id}', 'CateProductDetailController@post_edit');

        Route::delete('delete/{id}', 'CateProductDetailController@get_delete')->name('get.delete.cate_product_detail');

        Route::get('changeStatusCateProductDetail', 'CateProductDetailController@changeStatusCateProductDetail')->name('get.changeStatusCateProductDetail');

    });

    Route::group(['prefix' => 'product'], function ()
    {
        Route::get('list', 'ProductController@get_list')->name('get.list.product');
//        Route::post('products/getData', 'ProductController@getData')->name('get.data.products');

        Route::get('product_add', 'ProductController@get_add')->name('get.add.product');
        Route::post('product_add', 'ProductController@post_add')->name('post.add.product');

        Route::get('product_edit/{id}', 'ProductController@get_edit')->name('get.edit.product');
        Route::post('product_edit/{id}', 'ProductController@post_edit')->name('post.edit.product');

        Route::delete('delete/{id}', 'ProductController@get_delete')->name('get.delete.product');
        Route::delete('delete_all', 'ProductController@get_delete_all');

        Route::get('delete_img/{id}', 'ProductController@getDeleteImages')->name('get.product_img.delete.');
        Route::post('sortTable_img', 'ProductController@post_sortTable');

        Route::get('changeStatusProduct', 'ProductController@changeStatusProduct')->name('get.changeStatusProduct');


    });
    Route::group(['prefix' => 'cate_post'], function ()
    {
        Route::get('list', 'CatePostController@get_list')->name('get.list.cate_post');
        Route::post('cate_posts/getData', 'CatePostController@getData')->name('get.data.cate_posts');

        Route::get('add', 'CatePostController@get_add')->name('get.add.cate_post');
        Route::post('add', 'CatePostController@post_add');

        Route::get('edit/{id}', 'CatePostController@get_edit')->name('get.edit.cate_post');
        Route::post('edit/{id}', 'CatePostController@post_edit');

        Route::delete('delete/{id}', 'CatePostController@get_delete')->name('get.delete.cate_post');

        Route::get('changeStatusCatePost', 'CatePostController@changeStatusCatePost')->name('get.changeStatusCatePost');

    });
    Route::group(['prefix' => 'post'], function ()
    {
        Route::get('list', 'PostController@get_list')->name('get.list.post');
        Route::post('posts/getData', 'PostController@getData')->name('get.data.posts');

        Route::get('add', 'PostController@get_add')->name('get.add.post');
        Route::post('add', 'PostController@post_add');

        Route::get('edit/{id}', 'PostController@get_edit')->name('get.edit.post');
        Route::post('edit/{id}', 'PostController@post_edit');

        Route::delete('delete/{id}', 'PostController@get_delete')->name('get.delete.post');
        Route::delete('delete_all', 'PostController@get_delete_all');

        Route::get('changeStatusPost', 'PostController@changeStatusPost')->name('get.changeStatusPost');

    });

    Route::group(['prefix' => 'page'], function ()
    {
        Route::get('list', 'PageController@get_list')->name('get.list.page');
        Route::post('pages/getData', 'PageController@getData')->name('get.data.pages');

        Route::get('add', 'PageController@get_add')->name('get.add.page');
        Route::post('add', 'PageController@post_add');

        Route::get('edit/{id}', 'PageController@get_edit')->name('get.edit.page');
        Route::post('edit/{id}', 'PageController@post_edit');

        Route::delete('delete/{id}', 'PageController@get_delete')->name('get.delete.page');
        Route::delete('delete_all', 'PageController@get_delete_all');

        Route::get('changeStatusPage', 'PageController@changeStatusPage')->name('get.changeStatusPage');
    });
    Route::group(['prefix' => 'users'], function ()
    {
        Route::get('list', 'UserController@get_list')->name('get.list.user');
        Route::post('users/getData', 'UserController@getData')->name('get.data.users');

        Route::get('edit/{id}', 'UserController@get_edit')->name('get.edit.user');
        Route::post('edit/{id}', 'UserController@post_edit');

        Route::delete('delete/{id}', 'UserController@get_delete')->name('get.delete.user');
        Route::delete('delete_all', 'UserController@get_delete_all');

        Route::get('changeStatusUser', 'UserController@changeStatusUser')->name('get.changeStatusUser');
    });
    Route::group(['prefix' => 'slider'], function ()
    {
        Route::get('list', 'SliderController@get_list')->name('get.list.slider');
        Route::post('slider/getData', 'SliderController@getData')->name('get.data.slider');

        Route::get('add', 'SliderController@get_add')->name('get.add.slider');
        Route::post('add', 'SliderController@post_add');

        Route::get('edit/{id}', 'SliderController@get_edit')->name('get.edit.slider');
        Route::post('edit/{id}', 'SliderController@post_edit');

        Route::delete('delete/{id}', 'SliderController@get_delete')->name('get.delete.slider');
        Route::delete('delete_all', 'SliderController@get_delete_all');

        Route::get('changeStatusSlider', 'SliderController@changeStatusSlider')->name('get.changeStatusSlider');
    });
    Route::group(['prefix' => 'bill'], function ()
    {
        Route::get('list', 'BillController@get_list')->name('get.list.bill');
        Route::post('bills/getData', 'BillController@getData')->name('get.data.bills');

        // thay đổi status đơn hàng
        Route::get('duyet/{id}', 'BillController@get_duyet');
        Route::get('vanchuyen/{id}', 'BillController@get_vanchuyen');
        Route::get('thanhtoan/{id}', 'BillController@get_thanhtoan');
        Route::get('huy/{id}', 'BillController@get_huy');

        // ds don hàng hủy
        Route::get('danhsachhuy', 'BillController@getdanhsachhuy')->name('get.list.huy');
        Route::post('bills/getCancel', 'BillController@getCancel')->name('get.data.cancel');

        // chi tiết đơn hàng
        Route::get('bill_detail/{id}', 'BillController@get_bill_detail')->name('get.bill_detail');

        Route::get('inhoadon/{id}', 'BillController@get_inhoadon')->name('get.inhoadon');

        Route::get('edit/{id}', 'BillController@get_edit')->name('get.edit.bill');
        Route::post('edit/{id}', 'BillController@post_edit');

        Route::delete('delete/{id}', 'BillController@get_delete')->name('get.delete.bill');
        Route::delete('delete_all', 'BillController@get_delete_all');
    });
});

