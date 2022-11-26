<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\VideoController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Front\DisclaimerController;
use App\Http\Controllers\Front\SubscriberController;
use App\Http\Controllers\Front\SubCategoryController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Front\PhotoGalleryController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\Admin\AdminPhotoGalleryController;
use App\Http\Controllers\Admin\AdminAdvertisementController;



/* Front */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('news-detail/{id}', [PostController::class, 'news_detail'])->name('news_detail');
Route::get('news-category/{id}', [SubCategoryController::class, 'index'])->name('news-category');
Route::get('photo-gallery', [PhotoGalleryController::class, 'index'])->name('photo_gallery');
Route::get('video-gallery', [VideoController::class, 'index'])->name('video_gallery');
Route::get('about', [AboutController::class, 'index'])->name('about');
Route::get('faq', [FaqController::class, 'index'])->name('faq');
Route::get('terms', [TermsController::class, 'index'])->name('terms');
Route::get('privacy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('disclaimer', [DisclaimerController::class, 'index'])->name('disclaimer');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
//Route::post('contact/send-email', [ContactController::class, 'send_email'])->name('contact_form_submit');
Route::post('contact-form-submit', [ContactController::class, 'contact_form_submit'])->name('contact_form_submit');
Route::post('subscriber', [SubscriberController::class, 'subscriber'])->name('subscriber');
Route::get('subscriber/verify/{token}/{email}', [SubscriberController::class, 'verify'])->name('subscriber_verify');




/* Admin */
Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home')->middleware('admin:admin');
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
Route::get('admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
Route::post('admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');

Route::get('admin/edit-profile', [AdminProfileController::class, 'edit_profile'])->name('admin_edit_profile')->middleware('admin:admin');
Route::post('admin/edit-profile-submit', [AdminProfileController::class, 'edit_profile_submit'])->name('admin_edit_profile_submit')->middleware('admin:admin');

Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');

/* Admin Group */

Route::group(['middleware'=>'admin:admin'], function() {
    Route::get('admin/home-advertisement', [AdminAdvertisementController::class, 'home_ad_show'])->name('admin_home_ad_show');
    Route::post('admin/home-advertisement-update', [AdminAdvertisementController::class, 'home_ad_update'])->name('admin_home_ad_update');

    Route::get('admin/top-advertisement', [AdminAdvertisementController::class, 'top_ad_show'])->name('admin_top_ad_show');
    Route::post('admin/top-advertisement-update', [AdminAdvertisementController::class, 'top_ad_update'])->name('admin_top_ad_update');

    Route::get('admin/sidebar-advertisement', [AdminAdvertisementController::class, 'sidebar_ad_view'])->name('admin_sidebar_ad_view');
    Route::get('admin/sidebar-advertisement-create', [AdminAdvertisementController::class, 'sidebar_ad_create'])->name('admin_sidebar_ad_create');
    Route::post('admin/sidebar-advertisement-store', [AdminAdvertisementController::class, 'sidebar_ad_store'])->name('admin_sidebar_ad_store');
    Route::get('admin/sidebar-advertisement-edit/{id}', [AdminAdvertisementController::class, 'sidebar_ad_edit'])->name('admin_sidebar_ad_edit');
    Route::post('admin/sidebar-advertisement-update/{id}', [AdminAdvertisementController::class, 'sidebar_ad_update'])->name('admin_sidebar_ad_update');
    Route::get('admin/sidebar-advertisement-delete/{id}', [AdminAdvertisementController::class, 'sidebar_ad_delete'])->name('admin_sidebar_ad_delete');

    Route::get('admin/category/show', [AdminCategoryController::class, 'show'])->name('admin_category_show');
    Route::get('admin/category/create', [AdminCategoryController::class, 'create'])->name('admin_category_create');
    Route::post('admin/category/store', [AdminCategoryController::class, 'store'])->name('admin_category_store');
    Route::get('admin/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin_category_edit');
    Route::post('admin/category/update/{id}', [AdminCategoryController::class, 'update'])->name('admin_category_update');
    Route::get('admin/category/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin_category_delete');

    Route::get('admin/sub-category/show', [AdminSubCategoryController::class, 'show'])->name('admin_sub_category_show');
    Route::get('admin/sub-category/create', [AdminSubCategoryController::class, 'create'])->name('admin_sub_category_create');
    Route::post('admin/sub-category/store', [AdminSubCategoryController::class, 'store'])->name('admin_sub_category_store');
    Route::get('admin/sub-category/edit/{id}', [AdminSubCategoryController::class, 'edit'])->name('admin_sub_category_edit');
    Route::post('admin/sub-category/update/{id}', [AdminSubCategoryController::class, 'update'])->name('admin_sub_category_update');
    Route::get('admin/sub-category/delete/{id}', [AdminSubCategoryController::class, 'delete'])->name('admin_sub_category_delete');

    Route::get('admin/post/show', [AdminPostController::class, 'show'])->name('admin_post_show');
    Route::get('admin/post/create', [AdminPostController::class, 'create'])->name('admin_post_create');
    Route::post('admin/post/store', [AdminPostController::class, 'store'])->name('admin_post_store');
    Route::get('admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit');
    Route::post('admin/post/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update');
    Route::get('admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete');
    Route::get('admin/tag/delete/{id}', [AdminPostController::class, 'delete_tag'])->name('admin_tag_delete');

    Route::get('admin/setting', [AdminSettingController::class, 'index'])->name('admin_setting');
    Route::post('admin/setting/update', [AdminSettingController::class, 'update'])->name('admin_setting_update');

    Route::get('admin/photo-gallery/show', [AdminPhotoGalleryController::class, 'show'])->name('admin_photo_gallery_show');
    Route::get('admin/photo-gallery/create', [AdminPhotoGalleryController::class, 'create'])->name('admin_photo_gallery_create');
    Route::post('admin/photo-gallery/store', [AdminPhotoGalleryController::class, 'store'])->name('admin_photo_gallery_store');
    Route::get('admin/photo-gallery/edit/{id}', [AdminPhotoGalleryController::class, 'edit'])->name('admin_photo_gallery_edit');
    Route::post('admin/photo-gallery/update/{id}', [AdminPhotoGalleryController::class, 'update'])->name('admin_photo_gallery_update');
    Route::get('admin/photo-gallery/delete/{id}', [AdminPhotoGalleryController::class, 'delete'])->name('admin_photo_gallery_delete');

    Route::get('admin/video-gallery/show', [AdminVideoController::class, 'show'])->name('admin_video_gallery_show');
    Route::get('admin/video-gallery/create', [AdminVideoController::class, 'create'])->name('admin_video_gallery_create');
    Route::post('admin/video-gallery/store', [AdminVideoController::class, 'store'])->name('admin_video_gallery_store');
    Route::get('admin/video-gallery/edit/{id}', [AdminVideoController::class, 'edit'])->name('admin_video_gallery_edit');
    Route::post('admin/video-gallery/update/{id}', [AdminVideoController::class, 'update'])->name('admin_video_gallery_update');
    Route::get('admin/video-gallery/delete/{id}', [AdminVideoController::class, 'delete'])->name('admin_video_gallery_delete');

    Route::get('admin/page/about', [AdminPageController::class, 'about'])->name('admin_about_page');
    Route::post('admin/page/about/update', [AdminPageController::class, 'about_update'])->name('admin_about_page_update');

    Route::get('admin/page/faq', [AdminPageController::class, 'faq'])->name('admin_faq_page');
    Route::post('admin/page/faq/update', [AdminPageController::class, 'faq_update'])->name('admin_faq_page_update');

    Route::get('admin/page/contact', [AdminPageController::class, 'contact'])->name('admin_contact_page');
    Route::post('admin/page/contact/update', [AdminPageController::class, 'contact_update'])->name('admin_contact_page_update');

    Route::get('admin/page/terms', [AdminPageController::class, 'terms'])->name('admin_terms_page');
    Route::post('admin/page/terms/update', [AdminPageController::class, 'terms_update'])->name('admin_terms_page_update');

    Route::get('admin/page/privacy', [AdminPageController::class, 'privacy'])->name('admin_privacy_page');
    Route::post('admin/page/privacy/update', [AdminPageController::class, 'privacy_update'])->name('admin_privacy_page_update');

    Route::get('admin/page/disclaimer', [AdminPageController::class, 'disclaimer'])->name('admin_disclaimer_page');
    Route::post('admin/page/disclaimer/update', [AdminPageController::class, 'disclaimer_update'])->name('admin_disclaimer_page_update');

    Route::get('admin/page/login', [AdminPageController::class, 'login'])->name('admin_login_page');
    Route::post('admin/page/login/update', [AdminPageController::class, 'login_update'])->name('admin_login_page_update');

    Route::get('admin/page/contact', [AdminPageController::class, 'contact'])->name('admin_contact_page');
    Route::post('admin/page/contact/update', [AdminPageController::class, 'contact_update'])->name('admin_contact_page_update');

    Route::get('admin/faq/show', [AdminFaqController::class, 'show'])->name('admin_faq_show');
    Route::get('admin/faq/create', [AdminFaqController::class, 'create'])->name('admin_faq_create');
    Route::post('admin/faq/store', [AdminFaqController::class, 'store'])->name('admin_faq_store');
    Route::get('admin/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit');
    Route::post('admin/faq/update/{id}', [AdminFaqController::class, 'update'])->name('admin_faq_update');
    Route::get('admin/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin_faq_delete');

    Route::get('admin/subscribers', [AdminSubscriberController::class, 'show'])->name('admin_subscribers');
    Route::get('admin/subscribers/send-email', [AdminSubscriberController::class, 'send_email'])->name('admin_subscribers_send_email');
    Route::post('admin/subscribers/send-email-submit', [AdminSubscriberController::class, 'send_email_submit'])->name('admin_subscribers_send_email_submit');




    
    
    
});
