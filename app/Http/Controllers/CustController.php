<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Cust;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustController extends Controller
{
    function read()
    {
        $data = Cust::all();

        return $data;
    }

    function getCustomerById($id)
    {
        $data = Cust::find($id);

        return $data;
    }

    function deleteAkun($id)
    {
        $data = Cust::find($id);

        if (!$data) {
            return response()->json(['success' => false, 'message' => 'Akun Tidak Ditemukan'], 404);
        }

        $data->delete();

        return response()->json(['success' => true, 'message' => 'Akun Berhasil Dihapus']);
    }

    function updateCustomer(Request $request)
    {
        $id_cust = $request->input('id_cust');
        $username = $request->input('username');
        $nomor = $request->input('nomor');
        $alamat = $request->input('alamat');
        $email = $request->input('email');

        $customer = Cust::find($id_cust);

        if (!$customer) {
            return response()->json(['success' => false, 'message' => 'Tidak Ditemukan'], 404);
        }

        $customer->username = $username;
        $customer->nomor_cust = $nomor;
        $customer->alamat = $alamat;
        $customer->email = $email;
        $customer->save();

        // if($customer){
            return response()->json(['success' => true, 'message' => 'Data Berhasil Diubah']);
       

    }

    // HALAMAN CUSTOMER
    public function editAccount()
    {
        $customer = Auth::user();

        return $customer;
    }

    public function updateAccount(Request $request)
    {
        $customer = Auth::user();
        $customer->username = $request->input('username');
        $customer->email = $request->input('email');
        $customer->nomor_cust = $request->input('nomor');
        $customer->alamat = $request->input('alamat');
        $customer->save();

        return redirect()->route('editAccount')->with('success', 'Akun berhasil diperbarui');
    }

}
