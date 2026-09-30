<?php

namespace App\Http\Controllers;

use Api\NationalCode;
use App\Models\PhoneCode;
use App\Models\role;
use App\Models\User;
use App\Models\user_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Log;

class UserController extends Controller
{
    public function login()
    {
        return view('user.user.login');
    }
    public function loginWithCode()
    {
        return view('user.user.loginWithCode');
    }
    public function checkAuth(Request $request)
    {
        $data['validate'] = false;
        $user = User::where('phoneNumber', $request->phoneNumber)->first();
        if ($user) {
            $data['validate'] = true;
        }
        $data['checkCode'] = false;
        $data['match'] = false;
        $phoneCode = PhoneCode::where('phoneNumber', $request->phoneNumber)->first();
        if ($phoneCode) {
            if ($phoneCode->code == $request->code) {
                $data['checkCode'] = true;
            }
        }
        if (!$data['validate'] && $data['checkCode']) {
            // $result = NationalCode::check($request->nationalCode, $request->phoneNumber);
            // if ($result['data']) {
            $data['match'] = true;
            // }
        }
        return response()->json($data);
    }
    public function checkUser(Request $request)
    {
        $user = User::where('phoneNumber', $request['phoneNumber'])->first();
        if ($user->isApproved == 0 || $user->isApproved == -1) {
            return redirect()->back()->with('failure', "$user->name $user->family عزیز شما فعلا اجازه ورود ندارید.");
        }
        Auth::login($user);
        return to_route('home')->with('success', "$user->name $user->family عزیز خوش آمدید.");
    }
    public function checkUserPopup(Request $request)
    {
        $user = User::where('phoneNumber', $request['phoneNumber'])->first();
        if (isset($request['password'])) {
            if ($user) {
                if (Hash::check($request['password'], $user['password'])) {
                    Auth::login($user);
                    return redirect()->back()->with('success', "$user->name $user->family عزیز خوش آمدید.");
                } else {
                    return redirect()->back()->with('failure', "رمز عبور وارد شده اشتباه است.");
                }
            } else {
                return redirect()->back()->with('failure', "شماره مورد نظر یافت نشد ، ابتدا ثبت نام کنید.");
            }
        }
        if (isset($request['code'])) {
            $user = User::where('phoneNumber', $request['phoneNumber'])->first();
            Auth::login($user);
            return redirect()->back()->with('success', "$user->name $user->family عزیز خوش آمدید.");
        }
    }
    public function validate(Request $request)
    {
        // return response()->json($request->all());
        $data['validate'] = false;
        $data['pass'] = false;
        $data['match'] = false;
        $user = User::where('phoneNumber', $request->phoneNumber)->first();
        if ($user) {
            $data['validate'] = true;
            if (isset($request['password'])) {
                if (Hash::check($request->password, $user->password)) {
                    $data['pass'] = true;
                }
            }
            if (isset($request['code'])) {
                $phoneCode = PhoneCode::where('phoneNumber', $request->phoneNumber)->first();
                if ($phoneCode) {
                    if ($request->code == $phoneCode->code) {
                        $data['pass'] = true;
                    }
                }
            }
            if ($user->nationalCode == $request->nationalCode) {
                $data['match'] = true;
            }
        }
        return response()->json($data);
    }
    public function forgetPassword()
    {
        return view('user.user.forgetPassword');
    }
    public function send_code(Request $request)
    {
        $flag = false;
        $user = User::where('phoneNumber', $request->phoneNumber)->first();
        if ($user) {
            $flag = true;
        }
        if (!$flag) {
            $code = rand(1000, 10000);
            PhoneCode::upsert(['phoneNumber' => $request->phoneNumber, 'code' => $code], ['phoneNumber'], ['code']);
            // $ch = curl_init('https://api.iranpayamak.com/ws/v1/sms/pattern');
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            // curl_setopt($ch, CURLOPT_HTTPHEADER, [
            //     'Accept: application/json',
            //     'Api-Key: M1MIQPQ9s85i6dxdzTeRGx9t87AtRQJlXNiu01e7awuQz94TkI',
            //     'Content-Type: application/json'
            // ]);
            // $payload = [
            //     'code' => '7fvdx77gveizxqn',
            //     'attributes' => [
            //         'activation_code' => $code,
            //     ],
            //     'recipient' => $request->phoneNumber,
            //     'line_number' => '50002178584000',
            //     'number_format' => 'english'
            // ];
            // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
            // $response = curl_exec($ch);
        }
        return response()->json($flag);
    }
    public function send_sms(Request $request)
    {
        $flag = false;
        $user = User::where('phoneNumber', $request->phoneNumber)->first();
        if ($user) {
            $flag = true;
        }
        if ($flag) {
            $code = rand(1000, 10000);
            PhoneCode::upsert(['phoneNumber' => $request->phoneNumber, 'code' => $code], ['phoneNumber'], ['code']);
            // $ch = curl_init('https://api.iranpayamak.com/ws/v1/sms/pattern');
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            // curl_setopt($ch, CURLOPT_HTTPHEADER, [
            //     'Accept: application/json',
            //     'Api-Key: M1MIQPQ9s85i6dxdzTeRGx9t87AtRQJlXNiu01e7awuQz94TkI',
            //     'Content-Type: application/json'
            // ]);
            // $payload = [
            //     'code' => '7fvdx77gveizxqn',
            //     'attributes' => [
            //         'activation_code' => $code,
            //     ],
            //     'recipient' => $request->phoneNumber,
            //     'line_number' => '50002178584000',
            //     'number_format' => 'english'
            // ];
            // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
            // $response = curl_exec($ch);
        }
        return response()->json($flag);
    }
    public function setPassword(Request $request)
    {
        $user = User::where('phoneNumber', $request->phoneNumber)->first();
        return view('user.user.setPassword', ['user' => $user]);
    }
    public function savePassword(Request $request)
    {
        $user = User::find($request->user_id);
        $user->password = $request->password;
        $user->save();
        return to_route('user.login');
    }
    public function signup()
    {
        return view('user.user.signup');
    }
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => ['required'],
                'family' => ['required'],
                'phoneNumber' => ['required', 'min:11', 'max:11'],
                'nationalCode' => ['required', 'min:10', 'max:10'],
                'code' => ['required', 'min:4', 'max:4'],
                'password' => ['required', 'min:4', 'max:8'],
            ],
            [
                'name.required' => 'پر کردن این فیلد الزامی است.',
                'family.required' => 'پر کردن این فیلد الزامی است.',
                'phoneNumber.required' => 'پر کردن این فیلد الزامی است.',
                'phoneNumber.max' => 'شماره تلفن باید 11 رقمی باشد.',
                'phoneNumber.min' => 'شماره تلفن باید 11 رقمی باشد.',
                'nationalCode.max' => 'کد ملی باید 10 رقمی باشد.',
                'nationalCode.min' => 'کد ملی باید 10 رقمی باشد.',
                'nationalCode.required' => 'پر کردن این فیلد الزامی است.',
                'code.required' => 'پر کردن این فیلد الزامی است.',
                'code.max' => 'کد فعال سازی باید 4 رقمی باشد.',
                'code.min' => 'کد فعال سازی باید 4 رقمی باشد.',
                'password.required' => 'پر کردن این فیلد الزامی است.',
                'password.max' => 'رمز عبور حداکثر باید 8 رقمی باشد.',
                'password.min' => 'رمز عبور حدافل باید 4 رقمی باشد.',
            ]
        );
        $user = User::create([
            'name' => $request->name,
            'family' => $request->family,
            'phoneNumber' => $request->phoneNumber,
            'nationalCode' => $request->nationalCode,
            'password' => $request->password,
        ]);
        return to_route('user.login')->with('success', 'با موفقیت ثبت نام شدید لطفا وارد شوید.');
    }
    public function adminSignup()
    {
        // $logo = logo::first();
        $roles = role::all();
        return view('admin.user.signup', ['roles' => $roles]);
    }
    public function adminStore(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate(
            [
                'name' => ['required'],
                'family' => ['required'],
                'phoneNumber' => ['required', 'min:11', 'max:11'],
                'nationalCode' => ['required', 'min:10', 'max:10'],
                'password' => ['required', 'min:4', 'max:8'],
                'roles' => ['required'],
            ],
            [
                'name.required' => 'پر کردن این فیلد الزامی است.',
                'family.required' => 'پر کردن این فیلد الزامی است.',
                'phoneNumber.required' => 'پر کردن این فیلد الزامی است.',
                'phoneNumber.max' => 'شماره تلفن باید 11 رقمی باشد.',
                'phoneNumber.min' => 'شماره تلفن باید 11 رقمی باشد.',
                'nationalCode.max' => 'کد ملی باید 10 رقمی باشد.',
                'nationalCode.min' => 'کد ملی باید 10 رقمی باشد.',
                'nationalCode.required' => 'پر کردن این فیلد الزامی است.',
                'password.required' => 'پر کردن این فیلد الزامی است.',
                'password.max' => 'رمز عبور حداکثر باید 8 رقمی باشد.',
                'password.min' => 'رمز عبور حدافل باید 4 رقمی باشد.',
                'roles.required' => 'پر کردن این فیلد الزامی است.',
            ]
        );
        $user = User::where('phoneNumber', $request['phoneNumber'])->first();
        if ($user) {
            return redirect()->back()->with('failure', 'این شماره قبلا ثبت شده است ، لطفا وارد شوید.');
        }
        // $result = NationalCode::check($request->nationalCode, $request->phoneNumber);
        // if (!$result['data']) {
        //     return redirect()->back()->with('failure', 'شماره تلفن و کدملی باهم مطابقت ندارند.');
        // }
        $user = User::create([
            'name' => $request->name,
            'family' => $request->family,
            'phoneNumber' => $request->phoneNumber,
            'nationalCode' => $request->nationalCode,
            'password' => $request->password,
        ]);
        foreach ($request->roles as $role) {
            user_role::create([
                'user_id' => $user['id'],
                'role_id' => $role
            ]);
        }
        return redirect()->back()->with('message', 'کاربر جدید برای سایت ایجاد شد.');
    }
    public function logout()
    {
        $name = Auth::user()->name;
        Auth::logout();
        return to_route('home')->with('failure', $name . ' عزیز به امید دیدار.');
    }
    public function index()
    {
        $users = User::paginate(10);
        // $logo = logo::first();
        return view('admin.user.index', [
            'users' => $users,
            // 'logo' => $logo
        ]);
    }
    public function delete(User $user)
    {
        if ($user['mainImage']) {
            Storage::disk('public')->delete($user['mainImage']);
        }
        $user->delete();
        return to_route('user.index')->with('message', $user['name'] . $user['family'] . " " . "حذف شد .");
    }
    public function edit(Request $request)
    {
        $user = User::find($request['id'])->load('roles');
        $roleIds = User::find($request['id'])->roles->pluck('id');
        $roles = role::all();
        return response()->json(['user' => $user, 'roles' => $roles, 'roleIds' => $roleIds]);
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate(
            [
                'popupName' => ['required'],
                'popupFamily' => ['required'],
                'popupPhoneNumber' => ['required', 'min:11', 'max:11'],
                'popupNationalCode' => ['required', 'min:10', 'max:10'],
            ],
            [
                'popupName.required' => 'پر کردن این فیلد الزامی است.',
                'popupFamily.required' => 'پر کردن این فیلد الزامی است.',
                'popupPhoneNumber.required' => 'پر کردن این فیلد الزامی است.',
                'popupPhoneNumber.max' => 'شماره تلفن باید 11 رقمی باشد.',
                'popupPhoneNumber.min' => 'شماره تلفن باید 11 رقمی باشد.',
                'popupNationalCode.max' => 'کد ملی باید 10 رقمی باشد.',
                'popupNationalCode.min' => 'کد ملی باید 10 رقمی باشد.',
                'popupNationalCode.required' => 'پر کردن این فیلد الزامی است.',
            ]
        );
        $user = User::find($request->user_id);
        $name = $user->name;
        $user->name = $request->popupName;
        $user->family = $request->popupFamily;
        $user->phoneNumber = $request->popupPhoneNumber;
        $user->nationalCode = $request->popupNationalCode;
        $user->isActive = $request->isActive ?? 0;
        $user->isApproved = $request->approvingStatus;
        $user->save();
        return to_route('user.index')->with('message',  $name . ' به روزرسانی شد .');
    }
    public function profile($user = null)
    {
        if (!$user) {
            $user = Auth::user();
        }
        $roles = [];
        foreach ($user->roles as $role) {
            if ($role['name'] == 'admin') {
                $roles[] = 'ادمین';
            }
            if ($role['name'] == 'general_user') {
                $roles[] = 'کاربر عمومی';
            }
        }
        $user['persianRoles'] = $roles;
        // $products = product::all();
        // $cats = category::all();
        // $logo = logo::first();
        // $services = service::all();
        return view('user.user.profile', [
            // 'products' => $products,
            'user' => $user,
            // 'categories' => $cats,
            // 'logo' => $logo,
            // 'services' => $services,
        ]);
    }
    public function profileEdit(Request $request)
    {
        $user = User::find($request['id']);
        if ($user->mainImage) {
            $user->mainImage = asset('storage/' . $user['mainImage']);
        }
        return response()->json($user);
    }
    public function updateProfile(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => ['required'],
                'family' => ['required'],
                'email' => ['nullable', 'email'],
                'phoneNumber' => ['required'],
                'mainImage' => ['max:100'],
            ],
            [
                'name.required' => 'پر کردن این فیلد الزامی است.',
                'family.required' => 'پر کردن این فیلد الزامی است.',
                'phoneNumber.required' => 'پر کردن این فیلد الزامی است.',
                'email.email' => 'ساختار ایمیل را رعایت کنید.',
                'mainImage.max' => 'حجم فایل نباید بیشتر از 100 کیلوبایت باشد.',
            ]
        );
        if (isset($request['removedImg'])) {
            Storage::disk('public')->delete($request['removedImg']);
            $user = User::where('mainImage', $request['removedImg'])->first();
            $user->mainImage = null;
            $user->save();
        }
        $user = User::find($request->user_id);
        if (isset($request['mainImage'])) {
            if ($user['mainImage']) {
                Storage::disk('public')->delete($user['mainImage']);
            }
            $img_path = $request->mainImage->store('userImgs', 'public');
        } else {
            $img_path = $user['mainImage'];
        }
        $user->name = $request->name;
        $user->family = $request->family;
        $user->phoneNumber = $request->phoneNumber;
        $user->email = $request->email;
        if ($request->password) {
            $password = Hash::make($request->password);
            $user->password = $password;
        }
        $user->mainImage = $img_path;
        $user->save();
        return redirect()->back()->with('message',  'پروفایل شما با موفقیت به روزرسانی شد.');
    }
    public function search(Request $request)
    {
        if ($request->activity == 'all' && $request->approve == 'all') {
            $users = User::where('name', 'like', '%' . $request['name'] . '%')->where('family', 'like', '%' . $request['family'] . '%')->where('phoneNumber', 'like', '%' . $request['phoneNumber'] . '%')->where('nationalCode', 'like', '%' . $request['nationalCode'] . '%')->paginate(10);
            return view('admin.user.index', ['users' => $users]);
        }
        if ($request->activity != 'all' && $request->approve != 'all') {
            $users = User::where('name', 'like', '%' . $request['name'] . '%')->where('family', 'like', '%' . $request['family'] . '%')->where('phoneNumber', 'like', '%' . $request['phoneNumber'] . '%')->where('nationalCode', 'like', '%' . $request['nationalCode'] . '%')->where('isActive', $request['activity'])->where('isApproved', $request['approve'])->paginate(10);
            return view('admin.user.index', ['users' => $users]);
        }
        if ($request->activity != 'all') {
            $users = User::where('name', 'like', '%' . $request['name'] . '%')->where('family', 'like', '%' . $request['family'] . '%')->where('phoneNumber', 'like', '%' . $request['phoneNumber'] . '%')->where('nationalCode', 'like', '%' . $request['nationalCode'] . '%')->where('isActive', $request['activity'])->paginate(10);
            return view('admin.user.index', ['users' => $users]);
        }
        if ($request->approve != 'all') {
            $users = User::where('name', 'like', '%' . $request['name'] . '%')->where('family', 'like', '%' . $request['family'] . '%')->where('phoneNumber', 'like', '%' . $request['phoneNumber'] . '%')->where('nationalCode', 'like', '%' . $request['nationalCode'] . '%')->where('isApproved', $request['approve'])->paginate(10);
            return view('admin.user.index', ['users' => $users]);
        }
    }
    public function removeActivationCode(Request $request)
    {
        $row = PhoneCode::where('phoneNumber', $request->phoneNumber)->first();
        if ($row) {
            $row->delete();
        }
        return response()->json($row);
    }
}
