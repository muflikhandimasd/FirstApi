<?php

namespace App\Http\Controllers\API;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function editResto()
    {
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

    public function responSuccess($status, $message)
    {
        return response()->json([
            'status'   => $status,
            'message'  => $message
        ], Response::HTTP_OK);
    }

    public function responError($status, $message)
    {
        return response()->json([
            'status'   => $status,
            'message'  => $message
        ], Response::HTTP_NOT_FOUND);
    }
}