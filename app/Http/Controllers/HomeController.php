<?php

namespace App\Http\Controllers;

use App\Cate_product;
use App\Cate_Product_Detail;
use App\Product;
use App\User;
use App\List_image;
use App\Contact;
use App\Bill;
use App\Bill_detail;
use App\Page;
use App\Post;
use App\Cate_post;
use App\Slider;
use App\Comment;
use Carbon\Carbon;
use http\Env\Response;
use File;
use Illuminate\Support\MessageBag;
use Mail, Cart, DB, Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Input;
use App\Repositories\ProductSizeRepository;

class HomeController extends Controller
{
    protected $product_sizeRepo;

    function __construct(ProductSizeRepository $productSizeRepo)
    {
        $this->product_sizeRepo = $productSizeRepo;

        $cate_product = Cate_product::all()->toArray();
        $user = User::all()->toArray();
        $selling_product = DB::table('cate_product_detail')
            ->join('product', 'cate_product_detail.id', '=', 'product.cate_product_detail_id')
            ->where('product.selling_product', '=', 'Bán chạy')
            ->where('product.status', 1)
            ->where('cate_product_detail.status', 1)
            ->get()
            ->toArray();
        $featured_product = DB::table('cate_product_detail')
            ->join('product', 'cate_product_detail.id', '=', 'product.cate_product_detail_id')
            ->where('product.featured_product', '=', 'Nổi bật')
            ->where('product.status', 1)
            ->where('cate_product_detail.status', 1)
            ->get()
            ->toArray();
        $slider = Slider::select('*')
            ->where('status', 1)
            ->get()
            ->toArray();
        $laptop = DB::table('cate_product_detail')
            ->join('product', 'cate_product_detail.id', '=', 'product.cate_product_detail_id')
            ->where('cate_product_detail.parent_id', 3)
            ->where('product.status', 1)
            ->where('cate_product_detail.status', 1)
            ->orderBy('product.created_at', 'desc')
            ->limit(4)
            ->get();
        $phone = DB::table('cate_product_detail')
            ->join('product', 'cate_product_detail.id', '=', 'product.cate_product_detail_id')
            ->where('cate_product_detail.parent_id', 4)
            ->where('product.status', 1)
            ->where('cate_product_detail.status', 1)
            ->orderBy('product.created_at', 'desc')
            ->limit(4)
            ->get();
        $pk = DB::table('cate_product_detail')
            ->join('product', 'cate_product_detail.id', '=', 'product.cate_product_detail_id')
            ->where('cate_product_detail.parent_id', 6)
            ->where('product.status', 1)
            ->where('cate_product_detail.status', 1)
            ->orderBy('product.created_at', 'desc')
            ->limit(4)
            ->get();
        $tb = DB::table('cate_product_detail')
            ->join('product', 'cate_product_detail.id', '=', 'product.cate_product_detail_id')
            ->where('cate_product_detail.parent_id', 9)
            ->where('product.status', 1)
            ->where('cate_product_detail.status', 1)
            ->orderBy('product.created_at', 'desc')
            ->limit(4)
            ->get();
        view()->share([
            'cate_product' => $cate_product,
            'user' => $user,
            'selling_product' => $selling_product,
            'featured_product' => $featured_product,
            'slider' => $slider,
            'laptop' => $laptop,
            'phone' => $phone,
            'pk' => $pk,
            'tb' => $tb,
        ]);
    }

    public function index(Request $request)
    {
        return view('pages.home');
    }

    public function getHome()
    {
        return view('pages.home');
    }

    public function loaisanpham($id, Request $request)
    {
        $product = Product::where('cate_product_detail_id', $id)
            ->where('status', 1);
        $num_rows = Product::where('cate_product_detail_id', $id)
            ->where('status', 1)
            ->get()
            ->toArray();
        if ($request->price)
        {
            $price = $request->price;
            switch ($price)
            {
                case '1':
                    $product->where('price_new', '<', 5000000);
                    break;
                case '2':
                    $product->whereBetween('price_new', [5000000, 10000000]);
                    break;
                case '3':
                    $product->whereBetween('price_new', [10000000, 15000000]);
                    break;
                case '4':
                    $product->whereBetween('price_new', [15000000, 20000000]);
                    break;
                case '5':
                    $product->where('price_new', '>', 20000000);
                    break;
            }
        }
        if ($request->orderby)
        {
            $orderby = $request->orderby;
            switch ($orderby)
            {
                case 'desc':
                    $product->orderBy('id', 'DESC');
                    break;
                case 'asc':
                    $product->orderBy('id', 'ASC');
                    break;
                case 'price_max':
                    $product->orderBy('price_new', 'ASC');
                    break;
                case 'price_min':
                    $product->orderBy('price_new', 'DESC');
                    break;
                default:
                    $product->orderBy('id', 'DESC');
            }

        }
        $product = $product->paginate(8);

        $cate_detail = Cate_Product_Detail::where('id', $id)->get()->toArray();
        $viewData = [
            'product' => $product,
            'cate_detail' => $cate_detail,
            'num_rows' => $num_rows,
        ];
        return view('pages.product.cate_product', $viewData);
    }

    public function ctsp($id, Request $request)
    {
        $product_sizes = $this->product_sizeRepo->sizeProduct($id, NULL);
        $ctsp = Product::where('id', $id)->where('status', 1)->first();
        $list_image = List_image::select('*')->where('product_id', $id)->get()->toArray();

        // select * from product where cate_id = $cate_id and product.id <> $id
        $product_cate_same = Product::where('cate_product_detail_id', $ctsp->cate_product_detail_id)
            ->where('id', '<>', $id)
            ->where('status', 1)
            ->get()
            ->toArray();
        $loaisp = Cate_Product_Detail::where('id', $ctsp['cate_product_detail_id'])
            ->where('status', 1)
            ->first()
            ->toArray();
        $danhmucsp = Cate_product::where('id', $loaisp['parent_id'])
            ->where('status', 1)
            ->first()
            ->toArray();

        // comment-danh giá
        $danhgia = Comment::with('user:id,fullname')->where('product_id', $id)->orderBy('id', 'desc')->paginate(10);
        //gôm nhóm
        $ratingsDashboard = Comment::groupBy('number')
            ->where('product_id', $id)
            ->select(DB::raw('count(number) as total'), DB::raw('sum(number) as sum'))
            ->addSelect('number')
            ->get()->toArray();
        $arrayRatings = [];
        if (!empty($ratingsDashboard))
        {
            for ($i = 1; $i <= 5; $i++)
            {
                $arrayRatings[$i] = [
                    "total" => 0,
                    "sum" => 0,
                    "number" => 0
                ];
                foreach ($ratingsDashboard as $item)
                {
                    if ($item['number'] == $i)
                    {
                        $arrayRatings[$i] = $item;
                        continue;
                    }
                }
            }
        }
        return view('pages.product.detail_product', compact('ctsp', 'list_image', 'loaisp', 'danhmucsp', 'product_cate_same', 'danhgia', 'arrayRatings', 'product_sizes'));
    }

    public function get_baiviet()
    {
        $post = post::select('*')->where('status', 1)->paginate(6);
        return view('pages.post.list_blog', compact('post'));
    }

    public function loaibaiviet($id)
    {
        $cate_post = Cate_post::select('*')
            ->where('id', $id)
            ->where('status', 1)
            ->get()
            ->toArray();
        $post = Post::select('*')
            ->where('cate_post_id', $id)
            ->where('status', 1)
            ->paginate(2);
        return view('pages.post.cate_blog', compact('cate_post', 'post'));
    }

    public function get_chitietbaiviet($id)
    {
        $detail = Post::with('cate_post:id,name')
            ->where('id', $id)
            ->where('status', 1)
            ->get()
            ->toArray();
        return view('pages.post.detail_blog', compact('detail'));
    }

    public function get_gioithieu()
    {
        $page = Page::select('*')->where('status', 1)->get()->toArray();
        return view('pages.page.index', compact('page'));
    }

    //Gửi mail
    public function get_lienhe()
    {
        return view('pages.contact.lienhe');
    }

    public function post_lienhe_mobile(Request $request)
    {
        $rules = [
            'name_contact' => 'required',
            'email_contact' => 'required|email',
            'message' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
            ]);
        }
        else
        {
            $contact = new Contact;
            $contact->email = $request->email_contact;
            $contact->name = $request->name_contact;
            $contact->message = $request->message;
            $contact->save();
            return response()->json([
                'error' => false,
                'message' => 'Liên hệ thành công',
            ]);
        }
    }

    public function post_lienhe(Request $request)
    {
        $rules = [
            'name_contact' => 'required',
            'email_contact' => 'required|email',
            'message' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
            ]);
        }
        else
        {
            $contact = new Contact;
            $contact->email = $request->email_contact;
            $contact->name = $request->name_contact;
            $contact->message = $request->message;
            $contact->save();
            return response()->json([
                'error' => false,
                'message' => 'Liên hệ thành công',
            ]);
        }
    }

    public function postsaveComment(Request $request, $id)
    {
        if ($request->ajax())
        {
            Comment::insert([
                'product_id' => $id,
                'number' => $request->number,
                'content' => $request->r_content,
                'user_id' => get_data_user('web'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            $product = Product::find($id);
            $product->product_total_number += $request->number;
            $product->product_total_rating += 1;
            $product->save();
            return response()->json(['level' => '1']);
        }
    }

    public function get_logout_account()
    {
        Auth::logout();
        Cart::destroy();
        return response([
            'success' => true,
            'message' => 'Đăng xuất thành công',
        ]);
    }

    public function getchange_pass()
    {
        return view('pages.user.change_pass');
    }

    public function postchange_pass(Request $request)
    {
        $rules = [
            'password_old' => 'required',
            'password_new' => 'required',
            'password_confirm' => 'required|same:password_new'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
            ]);
        }
        else
        {
            $password_old = $request->password_old;
            $password_new = $request->password_new;
            if ($password_new == $password_old)
            {
                $errors = new MessageBag(['errorAll' => 'Mật khẩu cũ không được trùng với mật khẩu mới']);
                return response()->json([
                    'error' => true,
                    'message' => $errors,
                ]);
            }
            else
                if (!Hash::check($request->password_old, Auth::User()->password))
                {
                    $errors = new MessageBag(['errorAll' => 'Mật khẩu cũ không đúng']);
                    return response()->json([
                        'error' => true,
                        'message' => $errors
                    ]);
                }
                else
                    if (Hash::check($request->password_old, Auth::User()->password))
                    {
                        $user = Auth::User();
                        $user->password = bcrypt($request->password_new);
                        $user->save();
                        return response()->json([
                            'error' => false,
                            'message' => 'Đổi mật khẩu thành công',
                        ]);
                    }
        }
    }

    public function get_logout_change_pass()
    {
        Auth::logout();
        Cart::destroy();
        return redirect('/');
    }

    public function get_forgot_password()
    {
        return view('pages.user.forgot_password');
    }

    public function sendTokenResetPassword(Request $request)
    {
        $email = $request->email;
        $checkUser = User::where('email', $email)->first();
        if (!$checkUser)
        {
            return redirect()->back()->with('danger', 'Email không tồn tại');
        }
        $token = Hash::make(md5(time() . $email));

        $checkUser->token = $token;
        $checkUser->time_token = Carbon::now();
        $carbon = Carbon::now();

        $checkUser->save();

        //gửi mail
        $url = route('get.link.reset_password', ['token' => $checkUser->token, 'email' => $email]);
        $data = ['route' => $url];

        Mail::send('emails.reset_password', $data, function ($message) use ($email)
        {
            $message->from('duthuyhonghai@gmail.com', 'ThanhRain');
            $message->to($email, 'Reset password')->subject('Lấy lại mật khẩu');
        });
        return redirect()->back()->with('success', 'Bạn vui lòng vào email để kiểm tra link nhé!');
    }

    public function resetPassword(Request $request)
    {
        $token = $request->token;
        $email = $request->email;
        $checkUser = User::where([
            'token' => $token,
            'email' => $email
        ])->first();
        if (!$checkUser)
        {
            return redirect()->back()->with('danger', 'Xin lỗi ! Đường dẫn lấy lại mật khẩu không đúng, xin vui lòng kiểm tra lại.');
        }
        return view('pages.user.reset_password');
    }

    public function saveResetPassword(ResetPasswordRequest $requestResetPassword)
    {
        if ($requestResetPassword->password) // nếu $requestResetPassword tồn tại
        {
            $token = $requestResetPassword->token;
            $email = $requestResetPassword->email;
            $checkUser = User::where([
                'token' => $token,
                'email' => $email
            ])->first();
            if (!$checkUser)
            {
                return redirect()->back()->with('danger', 'Xin lỗi ! Đường dẫn lấy lại mật khẩu không đúng, xin vui lòng kiểm tra lại.');
            }
            $checkUser->password = Hash::make($requestResetPassword->password);
            $checkUser->save();
            echo "<script>
                alert('Mật khẩu đã được đổi thành công!');
                window.location.href = '/ismart/dang-nhap'; '";
            echo "'</script>";
        }
    }
}
