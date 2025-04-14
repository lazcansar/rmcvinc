<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminPage;
use App\Http\Controllers\SitemapController;


// Frontend Pages
Route::get('/',[PageController::class,'index'])->name('home');
Route::get('/kurumsal',[PageController::class,'about'])->name('about');
Route::get('/hizmetler',[PageController::class,'services'])->name('services');
Route::get('/hizmetler/{slug}', [PageController::class,'serviceDetail'])->name('service.detail');
Route::get('/blog',[PageController::class,'blog'])->name('blog');
Route::get('/blog/{slug}', [PageController::class,'blogDetail'])->name('blog.detail');
Route::get('/galeri',[PageController::class,'gallery'])->name('gallery');
Route::get('/iletisim',[PageController::class,'contact'])->name('contact');
Route::get('/giris-yap',[PageController::class,'login'])->name('login');
Route::post('/giris-yap',[PageController::class,'authenticate'])->name('login.post');
// Route::get('/kayit',[PageController::class,'register'])->name('register');
Route::post('/logout',[PageController::class,'logout'])->name('logout');


// Backend Pages
Route::middleware('auth')->group(function(){
    Route::get('/admin/dashboard',[AdminPage::class,'index'])->name('admin.index');
// Gallery
    Route::get('/admin/galeri',[AdminPage::class,'gallery'])->name('admin.gallery');
    Route::post('/admin/galeri',[AdminPage::class,'gallery'])->name('gallery.store');
    Route::get('/admin/galeri/sil/{imagename}', [AdminPage::class,'galleryDelete'])->name('gallery.delete');
// Social Media
    Route::get('/admin/sosyal-medya', [AdminPage::class, 'social'])->name('admin.social');
    Route::post('/admin/sosyal-medya', [AdminPage::class, 'social'])->name('admin.social.post');
    Route::get('/admin/sosyal-medya/sil/{id}', [AdminPage::class, 'socialDelete'])->name('admin.social.delete');
// Services
    Route::get('/admin/hizmetler', [AdminPage::class, 'services'])->name('admin.services');
    Route::post('/admin/hizmetler', [AdminPage::class, 'services'])->name('admin.services.post');
    Route::get('/admin/hizmetler/guncelle/{id}', [AdminPage::class, 'serviceUpdate'])->name('admin.service.update');
    Route::post('/admin/hizmetler/guncelle/{id}', [AdminPage::class, 'serviceUpdate'])->name('admin.service.update.post');
    Route::get('/admin/hizmetler/sil/{id}', [AdminPage::class, 'serviceDelete'])->name('admin.service.delete');
// Blog
    Route::get('/admin/blog', [AdminPage::class, 'blog'])->name('admin.blog');
    Route::post('/admin/blog', [AdminPage::class, 'blog'])->name('admin.blog.post');
    Route::get('/admin/blog/guncelle/{id}', [AdminPage::class, 'blogUpdate'])->name('admin.blog.update');
    Route::post('/admin/blog/guncelle/{id}', [AdminPage::class, 'blogUpdate'])->name('admin.blog.update.post');
    Route::get('/admin/blog/sil/{id}', [AdminPage::class, 'blogDelete'])->name('admin.blog.delete');

// Contact
    Route::get('/admin/iletisim', [AdminPage::class, 'contact'])->name('admin.contact');
    Route::post('/admin/iletisim', [AdminPage::class, 'contact'])->name('admin.contact.post');
// Sitemap
    Route::post('/admin/sitemap/generate', [SitemapController::class,'generate'])->name('admin.sitemap.generate');
});
