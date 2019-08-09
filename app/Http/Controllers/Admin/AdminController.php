<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings;
use View;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $settings = Settings::find(1);

        View::share('settings', $settings);
    }

    public function index() {
        return view('admin.dashboard');
    }

    public function settings() {
        return view('admin.settings.index');
    }


    public function settingsUpdate(Request $request) {
        $this->validate($request, [
            'facebook'=>'required',
            'instagram'=>'required',
            'telegram'=>'required',
            'bot'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'phone_1'=>'required'
        ]);

        $old_image = $request->old_logo;
        $new_image = $request->logo;

        if ($new_image == null) {
            $request->logo = $old_image;
        }

        $old_price = $request->old_price_list;
        $new_price = $request->price_list;

        if ($new_price == null) {
            $request->price_list = $old_price;
        }

        $settings = Settings::find(1);
        $settings->fill($request->all());

        if ($new_image != null) {
            $image = $request->file('logo');

            $filename = time() . '-logo.' . $image->getClientOriginalExtension();
            $path = 'uploads/settings/' . $filename;
            $image->move('uploads/settings', $filename);
            $settings->logo = $path;
        }

        if ($new_price != null) {
            $file = $request->file('price_list');

            $filename = time() . '-pricelist.' . $file->getClientOriginalExtension();
            $path = 'uploads/settings/' . $filename;
            $file->move('uploads/settings', $filename);
            $settings->price_list = $path;
        }

        $settings->save();
        return redirect()->route('admin.settings')->with('message', 'Настройки успешно обновлены.');
    }

    public function password(Request $request) {
        $this->validate($request, [
            'password'=>'required'
        ]);
        $user = User::where('email', 'info@dst.uz')->first();
        $user->password = Hash::make($request->get('password'));
        $user->save();

        return response()->json(['success' => 'Пароль изменен.', 'message' => 'Используйте его для входа в профиль в следующий раз.']);
    }
}
