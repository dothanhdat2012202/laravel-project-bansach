<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Banner;
use App\Models\Books;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Termwind\Components\Dd;

class ProductController extends Controller
{
    protected $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository=$productRepository;
    }
    public function index()
    {
        $user = Auth::user();
        $banners=Banner::where('is_active', 1)->get();
        $categories=$this->productRepository->getAllCategory();
        $newbooks= Books::all()->where('book_pages',1);
        $combos=Books::where('category_id',14)->get();
        $mangas=Books::where('category_id',13)->get();
        $bestsellers = Books::whereNotNull('bestseller')
        ->orderBy('bestseller', 'desc')
        ->take(10)
        ->get();
        $wings=Books::take(10)->where('category_id',3)->get();
        return view('homeproduct.product.productlist',compact('newbooks','bestsellers', 'categories','user','banners','wings','combos','mangas'));
    }
    public function order($id)
    {
        $user = Auth::user();
        $banners=Banner::where('is_active', 1)->get();
        $categories=$this->productRepository->getAllCategory();
        $orders = DB::table('invoices')
        ->leftJoin('invoices_detail', 'invoices.id', '=', 'invoices_detail.invoice_id')
        ->select('invoices.*', 'invoices_detail.*')
        ->where('invoices.user_id',$id)
        ->get();
        return view('homeproduct.orderoverview.clientorder',compact('user','banners','categories','orders'));
    }
    public function detail($id)
    {
        $banners=Banner::where('is_active', 1)->get();
        $categories=$this->productRepository->getAllCategory();
        $productdetails=$this->productRepository->prodetail($id);
        $relatedBooks = Books::where('category_id', function($query) use ($id) {
            $query->select('category_id')
                  ->from('books')
                  ->where('id', $id);
        })->get();
        $relatedbysets=Books::where('setofbook_id',function($query) use ($id) {
            $query->select('setofbook_id')
                  ->from('books')
                  ->where('id', $id);
        })->get();
        return view('homeproduct.product.productdetails',compact('productdetails','categories','banners','relatedBooks','relatedbysets'));
    }
    public function productbycategory(Request $request, $cate_id)
    {
        $banners=Banner::where('is_active', 1)->get();
        $categories= $this->productRepository->getAllCategory();
        $productsbycate=$this->productRepository->getAllProductByCate($request, $cate_id);
        if($request->has(''))
        $category=$this->productRepository->getCategory($cate_id);
        return view('homeproduct.product.productbycategory',compact('categories','productsbycate','category','banners'));
    }
    public function productbysob(Request $request, $sob_id)
    {
        $banners=Banner::where('is_active', 1)->get();
        $categories= $this->productRepository->getAllCategory();
        $productsbyset=$this->productRepository->getAllProductBySet($request, $sob_id);
        $set=$this->productRepository->getSet($sob_id);
        return view('homeproduct.product.productbyset',compact('categories','productsbyset','set','banners'));
    }
    public function showcart()
    {
        $banners=Banner::where('is_active', 1)->get();
        $categories= $this->productRepository->getAllCategory();
        return view('homeproduct.product.productcart',compact('categories','banners'));
    }
    public function addtocart(Request $request)
    {
        $product_id=$request->input('product_id');
        $quantity=$request->input('quantity');

        if(Auth::user()) {
            $this->useraddtocart($product_id,$quantity);
        }else {
            $cart=session()->get('cart',[]);
            if(isset($cart[$product_id]))
            {
                $cart[$product_id]['quantity'] += $quantity;
            }else{
                $product=Books::find($product_id);
                $price=$product->price_sale;
                if(!$product)
                {
                    abort(404);
                }
                $cart[$product_id]=[
                    "id" => $product_id,
                    "image" => $product->image,
                    "name" => $product->name,
                    "price" => $price,
                    "quantity" => $quantity
                ];
            }
            session()->put('cart',$cart);
        }
        return redirect()->back()->with('Sản phẩm thêm vào giỏ hàng thành công');
    }
    public function deletefromcart($id)
    {
        if(Auth::user())
        {
            Cart::where('id',$id)->delete();
        }else{
        $cart = session()->get('cart');
        if(isset($cart[$id]))
        {
            unset($cart[$id]);
            session()->put('cart',$cart);
            
        }
        }
        return redirect()->route('showcart');
    }
    public function update_cart(Request $request)
    {
        $route = redirect()->back();
        if($request->has('checkout'))
            $route = redirect()->route('checkout_page');
        $qty = $request->get('input_quantity');
        $productIds=$request->get('pro_id');
        if(Auth::user())
        {
           foreach($productIds as $key=>$productId)
           {
                $cartItem=Cart::where('user_id',Auth::id())->where('id',$productId)->first();
                if($cartItem){
                    $cartItem->quantity=$qty[$key];
                    $cartItem->save();
                }
           }
           return $route;
        }else
        {
        $cart=session()->get('cart');
        
        if ($cart) {
            foreach ($productIds as $key => $productId) {
                //dump($key);
                if (isset($cart[$productId])) {
                    $cart[$productId]['quantity'] = $qty[$key];
                }
                session()->put('cart',$cart);
            }
            return $route;
        }
        }
        //return $route;
    }
    public function checkout_page()
    {
        $banners=Banner::where('is_active', 1)->get();
        $categories=$this->productRepository->getAllCategory();
        $cartitems = session()->get('cart');
        $user = Auth::user();
        if($user)
        {
            $cartitems = Cart::where('user_id',$user->id)->get();
        }

        return view('homeproduct.product.productcheckout',compact('categories','cartitems', 'user','banners'));
    }

    public function apiSearchProduct (Request $request) {

        $getstring=$request->get('keyword');
        $search_products= Books::when($request->get('keyword'), function($query, $keyword) {
            $query->where('name','LIKE',"%{$keyword}%");

            $keywords = explode(' ' , $keyword);
            foreach($keywords as $key) {
                $query->orWhere('name','LIKE',"%{$key}%");
            }
           
        })->get();
        return view('homeproduct.product.api_search', compact('search_products','getstring'));
    }
    public function useraddtocart($id,$quantity=1)
    {
        $book = Books::find($id);
        $cart=Cart::where('book_id',$book->id)->where('user_id',Auth::id())->first();
        if($cart)
        {
            $cart->quantity += $quantity;
        }else{
        $cart = new Cart;
        $cart->book_id=$book->id;
        $cart->name = $book->name;
        $cart->quantity=$quantity;
        $cart->price=$book->price_sale;
        $cart->user_id = Auth::id();
        $cart->image=$book->image;
        }
        $cart->save();
    }
    public function pay($request)
    {
        $des = $request;
        $user=Auth::user();
        $totalAmount=0;
        if(Auth::user())
        {
            $a=Cart::where('user_id',$user->id)->get();
            $invoice = new Invoice();
            $invoice->user_id=$user->id;
            $invoice->shipping_address=$des['address_payment'];
            $invoice->orderdate=now();
            foreach($a as $cartItem){
                $totalAmount +=$cartItem->price*$cartItem->quantity;
            }
            $invoice->total_amount=$totalAmount;
            $invoice->name=$des['name_payment'];
            $invoice->email=$des['email_payment'];
            $invoice->phone_number=$des['phone_payment'];
            $invoice->coupon=$des['coupon'];
            if($des['payment_method_id'] == '1002830518')
            {
                $invoice->payment_method = 0;
            }else{
                $invoice->payment_method = 1;
            }
            $invoice->save();
            $invoiceId = $invoice->id;
            foreach ($a as $cartItem) {
                $invoiceDetail = new InvoiceDetail();
                $invoiceDetail->invoice_id = $invoiceId;
                $invoiceDetail->book_id = $cartItem->book_id; 
                $invoiceDetail->quantity = $cartItem->quantity;
                $invoiceDetail->price=$cartItem->price;
                $invoiceDetail->sub_total=$cartItem->quantity*$cartItem->price;
                $invoiceDetail->save();
            }
        }else{
            $invoice=new Invoice();
            $invoice->user_id=null;
            $invoice->orderdate=now();
            $invoice->shipping_address=$des['address_payment'];
            $cartItem=session()->get('cart');
            foreach($cartItem as $cart)
            {
                $totalAmount += $cart['price']*$cart['quantity'];
            }
            $invoice->total_amount=$totalAmount;
            $invoice->name=$des['name_payment'];
            $invoice->email=$des['email_payment'];
            $invoice->phone_number=$des['phone_payment'];
            $invoice->coupon=$des['coupon'];
            if($des['payment_method_id'] == '1002830518')
            {
                $invoice->payment_method = 0;
            }else{
                $invoice->payment_method = 1;
            }
            $invoice->save();
            $invoiceId = $invoice->id;
            foreach ($cartItem as $cart) {
                $invoiceDetail = new InvoiceDetail();
                $invoiceDetail->invoice_id = $invoiceId;
                $invoiceDetail->book_id = $cart['id']; 
                $invoiceDetail->quantity = $cart['quantity'];
                $invoiceDetail->price=$cart['price'];
                $invoiceDetail->sub_total=$cart['quantity']*$cart['price'];
                $invoiceDetail->save();
            }
        }
        return $invoice;
    }
    public function payment(CheckoutRequest $request)
    {
        $user = Auth::user();
        $code=Coupon::where('coupon','=',$request->coupon)->first();
        $des=$request->all();
        if(isset($code->value)){
            $des['coupon'] =  $code->value;
        }
        

        if ($request->has('utf8') && $request->input('utf8') === '✓') {
                $cartitems = session()->get('cart');
            if($user)
            {
                $cartitems = Cart::where('user_id',$user->id)->get();
            }
            
        }
        return view('homeproduct.payment.payment_pay',compact('cartitems','des'));
    }
    public function getdiscountcode(Request $request){
        $code=Coupon::where('coupon','=',$request->discountCode)->first();
        $status = false;
        $value = '';
        if(!empty($code)){
            $status = true;
            $value = $code->value;
        }
        return response()->json(['success' => $status, 'data' => $value]);
    }
    public function vn_payment(Request $request)
    {
        switch($request->payment_method_id)
        {
        case 'vnpay_qr':
        $invoice = $this->pay($request->all());
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('callback');
        $vnp_TxnRef = $invoice->id; //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $invoice->total_amount; // Số tiền thanh toán
        if(!empty($request->coupon)){
            $code=Coupon::where('coupon','=',$request->coupon)->first();
            $one_percent = $vnp_Amount/100;
            $vnp_Amount = $vnp_Amount - ($one_percent * $code->value);
        }
        $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = ''; //Mã phương thức thanh toán
        $vnp_IpAddr = '192.168.1.11'; //IP Khách hàng thanh toán $_SERVER['REMOTE_ADDR']
        $vnp_TmnCode = '9Q9YJ2AM';
        $vnp_HashSecret = 'QDAJQOGXUXYAUALFIGKQFDEDOUEJCDOK';
        // Invoice
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount* 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        //$this->clearCart(); 

        return redirect()->to($vnp_Url);
        break;
        case '1002830518':
            $invoice = $this->pay($request->all());
            echo 'Thông đơn đơn hàng đã được trả về email của bạn';
            $this->clearCart();
            return redirect()->route('product.index'); 
        break;
        default:
            echo 'Chức năng thanh toán này chưa được tích hợp vì ko có api ';
        }
        
    }
    private function clearCart()
    {
        $count=0;
        if(Auth::user())
        {
        $cartItems=Cart::all();
        foreach($cartItems as $cartItem)
        {
            $book = Books::find($cartItem['book_id']);
            if($book){
            $count = $cartItem['quantity'];
            $quantities = $book->quantity;
            $newquantity=$quantities-$cartItem['quantity'];
            if($newquantity>=0)
                {
                    $book->quantity = $newquantity;
                }
            if($book->bestseller == 0)
            {
                $book->bestseller=$count;
            }else {
                $book->bestseller += $count;
            }
            $book->save();
            }
            $cartItem->delete();
        }
        }else{
            $cartItems=session()->get('cart');
            foreach($cartItems as $cartItem)
            {
            $book = Books::find($cartItem['id']);
            if($book){
            $count = $cartItem['quantity'];
            $quantities = $book->quantity;
            $newquantity=$quantities-$cartItem['quantity'];
            if($newquantity>=0)
                {
                    $book->quantity = $newquantity;
                }
            if($book->bestseller == 0)
            {
                $book->bestseller=$count;
            }else {
                $book->bestseller += $count;
            }
            $book->save();
            }
            session()->forget('cart');
            }
            
        }
    }

    public function callback(Request $request)
    {
        $invoice = Invoice::find($request->vnp_OrderInfo);
        if($request->vnp_ResponseCode == '00')
        {
            $invoice->status = 1;
            $this->clearCart();
        }else{
            $invoice->status = 2;
        }
        $invoice->save();
        return view('homeproduct.payment.vnpay_return');
    }
}
