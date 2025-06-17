<?php

namespace App\Http\Controllers;

use App\Jobs\DeleteProduct;
use App\Jobs\ManageStock;
use App\Jobs\StoreProduct;
use App\Jobs\UpdateProduct;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        dispatch_sync(new StoreProduct($request->all()));

        return redirect()->back()->with('alert', [
            'type' => 'success',
            'message' => 'penambahan sedang di proses',
        ]);
    }

    public function update(Request $request, $id)
    {
        dispatch_sync(new UpdateProduct($request->all(), $id));

        return redirect()->intended('/')->with('alert', [
            'type' => 'success',
            'message' => 'berhasil mengupdate product'
        ]);
    }

    public function destroy($id)
    {
        dispatch_sync(new DeleteProduct($id));

        return redirect()->back()->with('alert', [
            'type' => 'success',
            'message' => 'berhasil menghapus product'
        ]);
    }

    public function stock(Request $request) {
        $user_id = auth()->user()->id;

        dispatch_sync(new ManageStock($request->all(), $user_id ));

        return redirect()->back()->with('alert', [
            'type'=>'success',
            'message'=> ' berhasil mengubah stock',
        ]);
    }
}
