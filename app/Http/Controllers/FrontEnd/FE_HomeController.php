<?php


namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Administrator\App\Models\Users;

class FE_HomeController extends Controller
{
    public function index()
    {
        $products = DB::table('vw_mst_product')->get();

        // Ambil ID produk
        $productIds = $products->pluck('id');

        // Ambil gambar dari tbl_mst_catalog, 2 per produk
        $catalogImages = DB::table('tbl_mst_catalog')
            ->whereIn('product_id', $productIds)
            ->select('product_id', 'images')
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy('product_id')
            ->map(function ($items) {
                return $items->take(2)->pluck('images')->toArray();
            });

        // Gabungkan ke produk
        foreach ($products as $product) {
            $product->images = $catalogImages[$product->id] ?? [];
        }

        return view('frontend.home',  compact('products'));
    }

    public function shop()
    {
        $products = DB::table('vw_mst_product')->get();
        $flower = DB::table('tbl_mst_flowertype')->get();
        $productType = DB::table('tbl_mst_producttype')->get();
        $colours  = DB::table('tbl_mst_colour')->get();
        $colourCounts = DB::table('vw_mst_product')
            ->select('colour_id', DB::raw('count(*) as total'))
            ->groupBy('colour_id')
            ->pluck('total', 'colour_id');


        // Hitung jumlah produk per tipe dari view vw_mst_product
        $productCounts = DB::table('vw_mst_product')
            ->select('product_type_id', DB::raw('count(*) as total'))
            ->groupBy('product_type_id')
            ->pluck('total', 'product_type_id');
        // Ambil ID produk
        $productIds = $products->pluck('id');

        // Ambil gambar dari tbl_mst_catalog, 2 per produk
        $catalogImages = DB::table('tbl_mst_catalog')
            ->whereIn('product_id', $productIds)
            ->select('product_id', 'images')
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy('product_id')
            ->map(function ($items) {
                return $items->take(2)->pluck('images')->toArray();
            });

        // Gabungkan ke produk
        foreach ($products as $product) {
            $product->images = $catalogImages[$product->id] ?? [];
        }

        // Map setiap tipe dan tambahkan field 'total_product'
        $productType = $productType->map(function ($item) use ($productCounts) {
            $item->total_product = $productCounts[$item->id] ?? 0;
            return $item;
        });
        // Map setiap warna dan tambahkan field 'total_product'
        $colours = $colours->map(function ($item) use ($colourCounts) {
            $item->total_product = $colourCounts[$item->id] ?? 0;
            return $item;
        });
        return view('frontend.shop', compact('products', 'flower', 'productType', 'colours'));
    }

    public function getProducts(Request $request)
    {
        $perPage = 2;
        $page = $request->get('page', 1); // default ke 1
        $startPrice = (float) $request->get('startPrice');
        $endPrice = (float) $request->get('endPrice');
        $productTypeId = (int) $request->get('product_type_id');
        $colourId = $request->get('colour_id');
        $flower = $request->get('flower');

        // Jika ternyata string JSON seperti "[]", ubah jadi array
        if (is_string($colourId)) {
            $colourId = json_decode($colourId, true);
        }

        if (is_string($flower)) {
            $flower = json_decode($flower, true);
        }

        // Pastikan array
        if (!is_array($colourId)) {
            $colourId = [];
        }

        if (!is_array($flower)) {
            $flower = [];
        }
        $query = DB::table('vw_mst_product')
            ->whereBetween('price_final', [$startPrice, $endPrice]);

        if ($productTypeId) {
            $query = $query->where('product_type_id', $productTypeId);
        }
        if (count($colourId) > 0) {
            $query = $query->whereIn('colour_id', $colourId);
        }
        if (count($flower) > 0) {
            $query = $query->whereIn('flower_type_id', $flower);
        }



        $products = $query->paginate($perPage, ['*'], 'page', $page);

        // Ambil ID produk
        $productIds = $products->pluck('id');

        // Ambil gambar dari tbl_mst_catalog, 2 per produk
        $catalogImages = DB::table('tbl_mst_catalog')
            ->whereIn('product_id', $productIds)
            ->select('product_id', 'images')
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy('product_id')
            ->map(function ($items) {
                return $items->take(2)->pluck('images')->toArray();
            });
        // Gabungkan ke produk
        foreach ($products as $product) {
            $product->images = $catalogImages[$product->id] ?? [];
        }



        $items = $products->items();
        return response()->json([
            'data' => $items,
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
            'per_page' => $products->perPage(),
            'total' => $products->total(),
            'from' => $products->firstItem(),
            'to' => $products->lastItem(),
            'starPrice' => $request->get('starPrice'),
            'endPrice' => $request->get('endPrice'),
            'colour' => $request->get('colour'),
            'flower' => $request->get('flower'),
        ]);
    }

    public function recentProduct()
    {
        $products = DB::table('vw_mst_product')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Ambil ID produk
        $productIds = $products->pluck('id');

        // Ambil gambar dari tbl_mst_catalog, 2 per produk
        $catalogImages = DB::table('tbl_mst_catalog')
            ->whereIn('product_id', $productIds)
            ->select('product_id', 'images')
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy('product_id')
            ->map(function ($items) {
                return $items->take(2)->pluck('images')->toArray();
            });

        // Gabungkan ke produk
        foreach ($products as $product) {
            $product->images = $catalogImages[$product->id] ?? [];
        }

        return response()->json([
            'data' => $products,
        ]);
    }

    public function productDetail()
    {
        $id = request()->get('id');
        $product = DB::table('vw_mst_product')->where('id', $id)->first();
        $productFeature = DB::table('vw_mst_product')
            ->inRandomOrder()
            ->get();
        // Ambil ID produk
        $productIds = $productFeature->pluck('id');

        // Ambil gambar dari tbl_mst_catalog, 2 per produk
        $catalogImages = DB::table('tbl_mst_catalog')
            ->whereIn('product_id', $productIds)
            ->select('product_id', 'images')
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy('product_id')
            ->map(function ($items) {
                return $items->take(2)->pluck('images')->toArray();
            });
        // Gabungkan ke produk
        foreach ($productFeature as $products) {
            $products->images = $catalogImages[$products->id] ?? [];
        }


        $itemsFeature = $productFeature->toArray();
        $images = DB::table('tbl_mst_catalog')->where('product_id', $id)->get();
        return view('frontend.product-detail', compact('product', 'itemsFeature', 'images'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->get('product_id');
        $quantity = $request->get('quantity');
        $product = DB::table('vw_mst_product')->where('id', $productId)->first();
        // Ambil gambar dari tbl_mst_catalog, 2 per produk
        $catalogImages = DB::table('tbl_mst_catalog')
            ->where('product_id', $product->id)
            ->select('product_id', 'images')
            ->orderBy('id', 'desc')
            ->limit(2)
            ->pluck('images')
            ->toArray();
        // Gabungkan ke produk
        $product->images = $catalogImages;
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found!',
            ]);
        }
        // Simpan ke session
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['qty'] += $quantity;
        } else {
            $cart[$productId] = [
                'qty' => $quantity,
                'product_id' => $product->id,
                'name_product' => $product->name_produk,
                'price_first' => $product->price_first,
                'price_final' => $product->price_final,
                'images' => $product->images[0] ?? '',
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart successfully!',
        ]);
    }

    public function removeFromCart(Request $request)
    {
        $productId = $request->get('product_id');
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return response()->json([
                'status' => 'success',
                'message' => 'Product removed from cart successfully!',
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Product not found in cart!',
        ]);
    }

    public function updateCart(Request $request)
    {
        $productIds = $request->input('product_id'); // array
        $quantities = $request->input('qty');        // array

        $cart = session()->get('cart', []);
        $updated = false;

        foreach ($productIds as $index => $productId) {
            if (isset($cart[$productId])) {
                $cart[$productId]['qty'] = $quantities[$index];
                $updated = true;
            }
        }


        if ($updated) {
            session()->put('cart', $cart);
            return response()->json([
                'status' => 'success',
                'message' => 'Cart updated successfully!'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'No matching products found in cart!'
        ]);
    }

    public function clearCart()
    {
        session()->forget('cart');
        return response()->json([
            'status' => 'success',
            'message' => 'Cart cleared successfully!',
        ]);
    }

    public function getCart()
    {
        $cart = session()->get('cart');
        return response()->json([
            'status' => 'success',
            'data' => $cart,
        ]);
    }



    public function contact()
    {
        return view('frontend.contact');
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function myaccount()
    {
        return view('frontend.myaccount');
    }

    public function faq()
    {
        return view('frontend.faq');
    }


    public function checkout()
    {
        return view('frontend.checkout');
    }
    public function cart()
    {
        return view('frontend.cart');
    }
    public function login()
    {
        return view('frontend.login');
    }
    public function register()
    {
        return view('frontend.register');
    }
}
