<?php

use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogCommentController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\BlogTagController;
use App\Http\Controllers\Admin\BlogUserController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ShopCategoryController;
use App\Http\Controllers\Admin\ShopConnectionController;
use App\Http\Controllers\Admin\ShopDeliveryController;
use App\Http\Controllers\Admin\ShopOrderController;
use App\Http\Controllers\Admin\ShopProductController;
use App\Http\Controllers\Admin\ShopPromocodeController;
use App\Http\Controllers\Admin\ShopReviewAdminController;
use App\Http\Controllers\Admin\ShopSaleController;
use App\Http\Controllers\Admin\ShopSectionController;
use App\Http\Controllers\Admin\UserAddressController;
use App\Http\Controllers\Blog\BlogMainController;
use App\Http\Controllers\Pages\PageFeedbackController;
use App\Http\Controllers\Pages\PageLandingController;
use App\Http\Controllers\Shop\ShopMainController;
use App\Http\Controllers\Shop\ShopMainProductController;
use App\Http\Controllers\Shop\ShopReviewController;
use App\Http\Controllers\Shop\ShopSearchController;
use App\Http\Controllers\User\UserCartController;
use App\Http\Controllers\User\UserCompareController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserResetPasswordController;
use App\Http\Controllers\User\UserWishlistController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PageLandingController::class, 'index'])->name('pages.landing');
Route::get('/contact_us', function () {
    return view('pages.contact');
})->name('pages.contact');
Route::get('/contact_us/send_mail', [PageFeedbackController::class, 'send']);

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [MainController::class, 'index'])
        ->name('admin.index');

    Route::resource('/categories', BlogCategoryController::class)->except('show');
    Route::get('/categories/trash', [BlogCategoryController::class, 'trash'])
        ->name('categories.trash');
    Route::get('/categories/restore/{category}', [BlogCategoryController::class, 'restore'])
        ->name('categories.restore');

    Route::resource('/tags', BlogTagController::class)->except('show');
    Route::get('/tags/trash', [BlogTagController::class, 'trash'])
        ->name('tags.trash');
    Route::get('/tags/restore/{tag}', [BlogTagController::class, 'restore'])
        ->name('tags.restore');

    Route::get('/users/trash', [BlogUserController::class, 'trash'])
        ->name('users.trash');
    Route::resource('/users', BlogUserController::class)->except('create', 'store');
    Route::get('/users/restore/{user}', [BlogUserController::class, 'restore'])
        ->name('users.restore');

    Route::resource('/posts', BlogPostController::class)->except('show');
    Route::get('/posts/restore/{post}', [BlogPostController::class, 'restore'])
        ->name('posts.restore');
    Route::get('/posts/trash', [BlogPostController::class, 'trash'])
        ->name('posts.trash');

    Route::resource('/comments', BlogCommentController::class)->except('show');
    Route::get('/comments/trash', [BlogCommentController::class, 'trash'])
        ->name('comments.trash');
    Route::get('/comments/restore/{comment}', [BlogCommentController::class, 'restore'])
        ->name('comments.restore');

    Route::resource('/shop_sections', ShopSectionController::class)->except('show');
    Route::get('/shop_sections/restore/{shop_section}', [ShopSectionController::class, 'restore'])
        ->name('shop_sections.restore');

    Route::resource('/shop_categories', ShopCategoryController::class)->except('show');
    Route::get('/shop_categories/trash', [ShopCategoryController::class, 'trash'])
        ->name('shop_categories.trash');
    Route::get('/shop_categories/restore/{shop_category}', [ShopCategoryController::class, 'restore'])
        ->name('shop_categories.restore');

    Route::resource('/shop_products', ShopProductController::class)->except('show');
    Route::get('/shop_products/trash', [ShopProductController::class, 'trash'])
        ->name('shop_products.trash');
    Route::get('/shop_products/restore/{shop_product}', [ShopProductController::class, 'restore'])
        ->name('shop_products.restore');
    Route::get('/shop_products/gallery/{shop_product}/view', [ShopProductController::class, 'gallery_view'])
        ->name('shop_products.gallery_view');
    Route::get('/shop_products/gallery/{shop_product}/add_photo', [ShopProductController::class, 'gallery_add_photo'])
        ->name('shop_products.gallery_add_photo');
    Route::post('/shop_products/gallery/{shop_product}/save_photo', [ShopProductController::class, 'gallery_save_photo'])
        ->name('shop_products.gallery_save_photo');
    Route::post('/shop_products/gallery/{shop_product}/delete_photo', [ShopProductController::class, 'gallery_delete_photo'])
        ->name('shop_products.gallery_delete_photo');

    Route::get('/shop_connections', [ShopConnectionController::class, 'index'])
        ->name('shop_connections.index');
    Route::get('/shop_connections/{shop_product}/edit', [ShopConnectionController::class, 'edit'])
        ->name('shop_connections.edit');
    Route::put('/shop_connections/{shop_product}/update', [ShopConnectionController::class, 'update'])
        ->name('shop_connections.update');

    Route::resource('/shop_sales', ShopSaleController::class)->except('show');
    Route::get('/shop_sales/trash', [ShopSaleController::class, 'trash'])
        ->name('shop_sales.trash');
    Route::get('/shop_sales/restore/{shop_sales}', [ShopSaleController::class, 'restore'])
        ->name('shop_sales.restore');

    Route::resource('/shop_promocodes', ShopPromocodeController::class)->except('show');
    Route::get('/shop_promocodes/trash', [ShopPromocodeController::class, 'trash'])
        ->name('shop_promocodes.trash');
    Route::get('/shop_promocodes/restore/{shop_promocode}', [ShopPromocodeController::class, 'restore'])
        ->name('shop_promocodes.restore');

    Route::resource('/shop_deliveries', ShopDeliveryController::class)->except('show');
    Route::get('/shop_deliveries/trash', [ShopDeliveryController::class, 'trash'])
        ->name('shop_deliveries.trash');
    Route::get('/shop_deliveries/restore/{shop_delivery}', [ShopDeliveryController::class, 'restore'])
        ->name('shop_deliveries.restore');

    Route::get('/shop_orders/completed', [ShopOrderController::class, 'completed'])
        ->name('shop_orders.completed');
    Route::get('/shop_orders/canceled', [ShopOrderController::class, 'canceled'])
        ->name('shop_orders.canceled');
    Route::resource('/shop_orders', ShopOrderController::class);
    Route::get('/shop_orders/restore/{shop_order}', [ShopOrderController::class, 'restore'])
        ->name('shop_orders.restore');

    Route::resource('/user_addresses', UserAddressController::class)->except('show', 'delete');

    Route::resource('/shop_reviews', ShopReviewAdminController::class);
});

Route::middleware('guest')->group(function () {
    Route::get('/auth', [UserController::class, 'index'])->name('auth');
    Route::post('/register', [UserController::class, 'register'])->name('auth.register');
    Route::post('/login', [UserController::class, 'login'])->name('auth.login');
});

// Email verify
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('account');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Password reset
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');
Route::post('/forgot-password', [UserResetPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', function ($token, Request $request) {
    return view('auth.reset-password', ['token' => $token, 'request' => $request]);
})->middleware('guest')->name('password.reset');
Route::post('/reset-password', [UserResetPasswordController::class, 'storeNewPassword'])
    ->middleware('guest')->name('password.update');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/account', [UserController::class, 'account'])->name('account');
    Route::post('/account/add_address', [UserController::class, 'storeAddress'])->name('account.new_address');
    Route::post('/account/{address_id}/update_address', [UserController::class, 'updateAddress'])
        ->name('account.update_address');

    Route::post('/account/wishlist/addOrRemove', [UserWishlistController::class, 'addOrRemoveFromWishlist'])
        ->name('account.wishlist.addOrRemove');

    Route::get('/shop/review/{uuid}', [ShopReviewController::class, 'index'])->name('review.index');
    Route::post('/shop/review/storeReview', [ShopReviewController::class, 'store'])->name('review.store');
});

Route::post('/compare/add', [UserCompareController::class, 'addToCompare'])->name('user.compare.add');
Route::post('/compare/remove', [UserCompareController::class, 'removeFromCompare'])->name('user.compare.remove');
Route::get('/compare/{type}', [UserCompareController::class, 'index'])->name('user.compare');

Route::get('/cart', [UserCartController::class, 'cart'])->name('user.cart');
Route::post('/cart/add', [UserCartController::class, 'addToCart'])->name('user.addToCart');
Route::post('/cart/remove', [UserCartController::class, 'removeFromCart'])->name('user.removeFromCart');
Route::post('/cart/plusqty', [UserCartController::class, 'plusQty'])->name('user.plusQty');
Route::post('/cart/minusqty', [UserCartController::class, 'minusQty'])->name('user.minusQty');
Route::post('/cart/clear', [UserCartController::class, 'clear'])->name('user.clearCart');
Route::post('/cart/verify_promocode', [UserCartController::class, 'verifyPromocode'])->name('user.verifyPromocode');

Route::get('/checkout', [UserOrderController::class, 'orderCreate'])->name('order.create');
Route::post('/complete', [UserOrderController::class, 'orderStore'])->name('order.complete');
Route::get('/order_complete', [UserOrderController::class, 'orderConfirm'])->name('order.info');


Route::get('/blog', [BlogMainController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogMainController::class, 'show'])->name('blog.show');
Route::get('/blog/category/{slug}', [BlogMainController::class, 'category'])->name('blog.category');
Route::get('/blog/tag/{slug}', [BlogMainController::class, 'tag'])->name('blog.tag');

//Shop Search
Route::get('/shop/search', [ShopSearchController::class, 'search'])->name('shop.search');

Route::get('/shop/product/{shop_product}', [ShopMainProductController::class, 'index'])->name('shop.product');

Route::get('/shop', [ShopMainController::class, 'index'])->name('shop.index');
Route::get('/shop/{shop_section}', [ShopMainController::class, 'section'])->name('shop.section');
Route::get('/shop/{shop_section}/{shop_category}', [ShopMainController::class, 'category'])->name('shop.category');
