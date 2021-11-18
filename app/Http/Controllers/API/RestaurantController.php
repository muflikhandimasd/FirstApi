<?php

namespace App\Http\Controllers\API;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class RestaurantController extends Controller
{
    public function createRestoMenu(Request $request)
    {
        $resto = new Restaurant();

        $message = [
            'name_resto.required'   => "Resto name required",
            'address.required'      => "Address required",
            'phone.required'        => "Phone required",
            'open_serve.required'   => "open serve required",
        ];

        $request->validate([
            'name_resto'   => ["required"],
            'address'      => ["required"],
            'phone'        => ["required"],
            'open_serve'   => ["required"],
        ], $message);

        $resto->name_resto     = $request->name_resto;
        $resto->address        = $request->address;
        $resto->phone          = $request->phone;
        $resto->open_serve     = $request->open_serve;
        $resto->rating         = $request->rating;
        // you must save that to database
        $resto->save();

        foreach ($request->list_menu as $value) {
            $menu = [
                'resto_id'   => $resto->id,
                'name_menu'  => $value['name_menu'],
                'price'      => $value['price'],
                'category'   => $value['category'],
            ];
            Menu::create($menu);
        }

        $data = Menu::where('resto_id', $resto->id)->get();

        return response()->json([
            'status'  => 1,
            'message' => "Berhasil",
            'resto'   => $resto,
            'result'  => $data

        ], Response::HTTP_OK);
    }

    public function getRestoMenu($id)
    {
        $resto = Restaurant::where('id', $id)->first();

        if (!$resto) {
            return $this->responError(0, "Data Ga ada");
        }

        $data = Menu::where('resto_id', $id)->get();

        return response()->json([
            'status'  => 1,
            'message'  => "Berhasil",
            'resto' => $resto,
            'menu' => $data
        ], Response::HTTP_OK);
    }



    public function cari(Request $request)
    {
        $request->search;

        $menu = Menu::where('name_menu', 'like', "%" . $request->search . "%")->orwhere('category', 'like', "%" . $request->search . "%")->first();
        if (!$menu) {
            return $this->responError(0, "$request->search, tidak ada");
        }
        $menus = Menu::where('name_menu', 'like', "%" . $request->search . "%")->orwhere('category', 'like', "%" . $request->search . "%")->get();
        return response()->json([
            'status'    => 1,
            'result'    => $menus
        ], Response::HTTP_OK);
    }

    public function editResto(Request $request, $resto_id)
    {
        $resto = Restaurant::findOrFail($resto_id);

        $validasi = Validator::make($request->all(), [
            'name_resto'  => 'required',
            'address'   => 'required',
            'open_serve'   => 'required',
            'phone'   => 'required'
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }

        $resto->update([
            'name_resto'  => $request->name_resto,
            'address'   => $request->address,
            'open_serve'   => $request->open_serve,
            'phone'   => $request->phone
        ]);

        return response()->json([
            'status'   => 1,
            'message'  => "Resto berhasil diupdate",
            'result'  => $resto
        ], Response::HTTP_OK);
    }



    public function getAllMenu()
    {
        $menu = Menu::all();
        return response()->json([
            'status'  => 1,
            'message'  => "Berhasil mendapatkan semua menu",
            'result' => $menu
        ], Response::HTTP_OK);
    }

    public function hapusMenuPadaResto($resto_id, $menu_id)
    {
        //cari resto
        $resto                        = Restaurant::find($resto_id);

        if (!$resto) {
            return $this->responError(0, "resto pada resto tidak di temukan");
        }

        //cari resto
        $menu                        = Menu::find($menu_id);

        if (!$menu) {
            return $this->responError(0, "menu pada resto tidak di temukan");
        }

        $menu->delete();

        return response()->json([
            'status'                  => 1,
            'pesan'                   => "$menu->name_menu, menu berhasil di hapus"
        ], Response::HTTP_NOT_FOUND);
    }

    public function responError($status, $message)
    {
        return response()->json([
            'status'   => $status,
            'message'  => $message
        ], Response::HTTP_NOT_FOUND);
    }
}