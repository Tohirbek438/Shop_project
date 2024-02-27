<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\DeleteCartController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\OrderAdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

//SiteController

Route::get('/shop-detail',[SiteController::class,'shopDetail'])->name('shop.detail');

Route::get('/',[SiteController::class,'index'])->name('home');

Route::get('/contact',[SiteController::class,'contact']);

Route::get('/blog',[SiteController::class,'blog']);

Route::get('/blog/category/{name}',[SiteController::class,'blogCategory'])->name('blogBigCategory');
Route::get('/blog/view/{id}',[SiteController::class,'blogView'])->name('blogView');
Route::get('/blog/search',[SiteController::class,'blogSearch'])->name('blogSearch');

Route::get('/product-category/{name}',[SiteController::class,'shopGrid'])->name('shop.grid');

Route::get('/shop-grid',[SiteController::class,'showProducts'])->name('show.product');

Route::get('/get-products',[SiteController::class,'getProducts'])->name('get.products');

Route::get('/lang/{lang}',function($lang){
    session(['lang' => $lang]);
    return back();
});
Route::get('/admin/create',function(){
    return view('admin.adminIndex.create');
});

Route::post('/save-admin',[AdminLoginController::class,'saveAdmin'])->name('saveAdmin');
Route::delete('/delete-admin/{id}',[AdminLoginController::class,'deleteAdmin'])->name('deleteAdmin');

Route::get('/product-one/{id}',[SiteController::class,'productOne'])->name('product.one');

//UserLoginController
// Route::get('/user/login',[UserLoginController::class,'login'])->name('user.login');
// Route::post('/user/kirish',[UserLoginController::class,'kirish'])->name('user.kirish');
// Route::post('/user/logout',[UserLoginController::class,'logout'])->name('user.logout');
//ContactController

Route::get('/contact',[ContactController::class,'contact'])->name('contact');
Route::post('/save-contact',[ContactController::class,'saveContact'])->name('saveContact');
//AdminLoginController
Route::get('/admin/login',[AdminLoginController::class,'login'])->name('admin.login');
Route::post('/admin/kirish',[AdminLoginController::class,'kirish'])->name('kirish');
Route::delete('/admin/logout',[AdminLoginController::class,'logout'])->name('admin.logout');
Route::get('/admin/index',[AdminLoginController::class,'index']);


//AdminController
Route::get('/admin/category',[AdminController::class,'category'])->name('admin.category');
Route::get('/admin/product',[AdminController::class,'product'])->name('admin.product');
Route::get('/admin/create-product',[AdminController::class,'createProduct'])->name('admin.create.product');
Route::post('/admin/product-save',[AdminController::class,'saveProduct'])->name('admin.save-product');
Route::get('/admin/product-one/{id}',[AdminController::class,'productShow'])->name('product-one');
Route::get('/admin/product-edit/{id}',[AdminController::class,'productEdit'])->name('product-edit');
Route::put('/admin/product-edit-save',[AdminController::class,'productEditSave'])->name('product-edit-save');
Route::get('/admin/order-index',[OrderAdminController::class,'orderIndex'])->name('order-one');

//CartController

Route::post('/add-button-cart',[CartController::class,'addCartButton'])->name('addCartButton');
Route::get('/cart',[ CartController::class,'cart'])->name('cart');
Route::get('/shop-cart',[CartController::class,'shopCart'])->name('shop.cart');
// Route::get('/cart/check-out',[CartController::class,'checkOut']);
Route::get('/add-cart',[CartController::class,'addCart']);

Route::post('/remove-cart',[CartController::class,'removeCart'])->name('remove.item');

Route::get('/user/login',[UserLoginController::class,'login'])->name('user.login');

Route::post('/user/sign',[UserLoginController::class,'signIn'])->name('user.kirish');

Route::post('/user/logout',[UserLoginController::class,'logout'])->name('auth.logout');


Route::get('/order/save-order',[OrderController::class,'orderProducts'])->name('save.order')->middleware('web');

Route::post('/order/order-save',[OrderController::class,'saveOrder'])->name('order.save');
Route::delete('/admin/order/delete-order/{id}',[OrderAdminController::class,'deleteOrder'])->name('deleteOrder');
Route::get('/admin/order/edit-order/{id}',[OrderAdminController::class,'editOrder'])->name('editOrder');
Route::put('/admin/order/edit-save-order/{id}',[OrderAdminController::class,'EditSaveOrder'])->name('EditSaveOrder');

//EditSaveOrder
Route::post('/edit/{id}/{signal}',[CartController::class,'editQuantity'])->name('edit.product');
Route::post('/dellItem/{id}',[DeleteCartController::class,'dellItem'])->name('dellItem');

//Checkout
Route::get('/order/check-out',[OrderController::class,'checkout']);
Route::post('/save/check-out',[OrderItemController::class,'saveCheckOut'])->name('save.check-out');

//CostController
Route::post('/filter-product',[CostController::class,'priceFilter'])->name('priceFilter');


Route::get('/add-like',[LikeController::class,'addLike'])->name('add-like');
Route::get('/like-index',[LikeController::class,'likeIndex'])->name('like-index');
Route::delete('/like-delete/{id}',[LikeController::class,'likeDelete'])->name('like-delete');

Route::get('/search-product',[SearchController::class,'search'])->name('search.product');


Route::get('/admin/order-item',[\App\Http\Controllers\admin\OrderItemController::class,'orderItem']);
Route::get('/admin/order-item/{id}',[\App\Http\Controllers\admin\OrderItemController::class,'showOrderitem'])->name('showOrderitem');
Route::delete('/admin/order-item-delete/{id}',[\App\Http\Controllers\admin\OrderItemController::class,'DeleteOrderitem'])->name('DeleteOrderitem');


//showOrderItem DeleteOrderitem
//AdminUserController
Route::get('/admin/users/index',[\App\Http\Controllers\admin\AdminUserController::class,'userIndex']);
Route::get('/admin/category-index',[\App\Http\Controllers\admin\CategoryController::class,'createIndex'])->name('category.index');

Route::post('/admin/create-category',[\App\Http\Controllers\admin\CategoryController::class,'createCategory'])->name('create.category');


Route::put('/admin/edit-category/{id}',[\App\Http\Controllers\admin\CategoryController::class,'editCategory'])->name('edit.category');


Route::get('/admin/edit-index-category/{id}',[\App\Http\Controllers\admin\CategoryController::class,'editIndex'])->name('edit.index');

// Route::group(['middleware' => 'auth:user'],function(){
Route::delete('/admin/delete-category/{id}',[\App\Http\Controllers\admin\CategoryController::class,'deleteCategory'])->name('delete.category');
Route::delete('/admin/delete-product/{id}',[AdminController::class,'deleteProduct'])->name('deleteProduct');
// });

//

Route::delete('/admin/delete-user/{id}',[\App\Http\Controllers\admin\AdminUserController::class,'userDelete'])->name('userDelete');

Route::get('/admin/user-show/{id}',[\App\Http\Controllers\admin\AdminUserController::class,'userView'])->name('userView');

//userEdit
Route::get('/admin/admin-index',[AdminController::class,'adminIndex'])->name('adminIndex');

Route::get('/admin/{id}/show',[\App\Http\Controllers\admin\AdminUserController::class,'adminShow'])->name('adminShow');

//adminShow adminEdit
Route::get('/admin/{id}/edit',[\App\Http\Controllers\admin\AdminUserController::class,'adminEdit'])->name('adminEdit');
Route::put('/admin/{id}/save-edit-admin',[\App\Http\Controllers\admin\AdminUserController::class,'editAdmin'])->name('editAdmin');

//editAdmin

//blogController 
Route::get('/admin/blog',[BlogController::class,'blogIndex'])->name('blogIndex');

Route::get('/admin/create-blog',[BlogController::class,'blogMake'])->name('blogMake');


Route::post('/admin/create-blog',[BlogController::class,'createBlog'])->name('create.blog');
Route::get('/admin/blog-category', [BlogController::class,'blogCategory'])->name('blogCategory');
Route::get('/admin/create-blog-category', [BlogController::class,'createCategory'])->name('createCategory');

Route::post('/admin/save-blogcategory',[BlogController::class,'saveBlogCategory'])->name('saveBlogCategory');
Route::get('/admin/view-blog/{id}', [BlogController::class,'adminblogView'])->name('adminblogView');
Route::delete('/admin/blog/{id}/delete', [BlogController::class,'blogDelete'])->name('blogDelete');
Route::get('/admin/blog-edit/{id}', [BlogController::class,'adminblogEdit'])->name('adminblogEdit');

Route::put('/admin/blog-edit-save/{id}',[BlogController::class,'EditSaveBlog'])->name('EditSaveBlog');

//blogDelete adminblogEdit EditSaveBlog

Route::get('/categorySearch/{category}',[SearchController::class,'categorySearch'])->name('categorySearch');

//Admin/Contact
Route::get('/admin/contact', [\App\Http\Controllers\admin\ContactController::class,'contactIndex'])->name('contactIndex');
Route::delete('/admin/contact/{id}/delete', [\App\Http\Controllers\admin\ContactController::class,'contactDelete'])->name('deleteContact');

Route::get('/admin/contact-view/{id}',[\App\Http\Controllers\admin\ContactController::class,'ContactView'])->name('ContactView');


// admin/OrderController


Route::get('/admin/{id}/view',[\App\Http\Controllers\admin\OrderController::class,'view'])->name('orderView');


Route::get('/user/create-user',[UserLoginController::class,'createUser'])->name('user.create');
Route::post('/user/create-user-save',[UserLoginController::class,'create'])->name('createUser');