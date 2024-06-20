<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Customer;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\CentrePoint;

class CustomerController extends Controller
{
    public function index()
    {
        // Menampilkan data dari tabel space
        return view('customer.index');
    }
    public function create()
    {
        $provinces = \Indonesia::allProvinces();
        $centrepoint = CentrePoint::get()->first();
        return view('customer.create', compact('provinces','centrepoint'));
    }

    public function customerPage(Request $request): View {

        $user = Auth::user();

        if($user->hasRole('administrator')) {
            $statuses = DeliveryStatus::with('customer')->orderBy('delivery_date', 'desc')
            ->get();

            return view('customer/index', compact('statuses'));

        }
    }
    public function store(Request $request)
    {
        // Lakukan validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:25',
            'address' => 'required|string',
            'telp' => 'required|integer',
            'email' => 'required|email|max:20',
            'location' => 'required|string|max:20',
            'maps' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'images' => 'required|string|max:20',
            'registration_date' => 'required|date',
            'type' => 'required|string|max:20',
            'capacity' => 'required|numeric',
            'device_id' => 'required|integer',
            'province' => 'required|integer',
            'regency' => 'required|integer',
            'district' => 'required|integer',
            'village' => 'required|integer',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

        // melakukan pengecekan ketika ada file gambar yang akan di input
        $customer = new Customer();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uploadFile = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/imgCover/', $uploadFile);
            $customer->image = $uploadFile;
        }

        // Memasukkan nilai untuk masing-masing field pada tabel space berdasarkan inputan dari
        // form create
        //return dd($spaces);

        // proses simpan data
        $customer->save();

        // redirect ke halaman index space
        if ($customer) {
            return redirect()->route('customer.index')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->route('customer.index')->with('error', 'Data gagal disimpan');
        }
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Space $space)
    {
        // mencari data space yang dipilih berdasarkan id
        // kemudian menampilkan data tersebut ke form edit space
        $space = Space::findOrFail($space->id);
        return view('space.edit', [
            'space' => $space
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Space $space)
    {
        // Menjalankan validasi
        $validated = $request->validate([
            'name' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg',
            'location' => 'required'
        ]);

        // Jika data yang akan diganti ada pada tabel space
        // cek terlebih dahulu apakah akan mengganti gambar atau tidak
        // jika gambar diganti hapus terlebuh dahulu gambar lama
        $space = Space::findOrFail($space->id);
        if ($request->hasFile('image')) {

            if (File::exists("uploads/imgCover/" . $space->image)) {
                File::delete("uploads/imgCover/" . $space->image);
            }

            $file = $request->file("image");
            //$uploadFile = StoreImage::replace($space->image,$file->getRealPath(),$file->getClientOriginalName());
            $uploadFile = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/imgCover/', $uploadFile);
            $space->image = $uploadFile;
        }

        // Lakukan Proses update data ke tabel space
        $space->update([
            'name' => $request->name,
            'location' => $request->location,
            'content' => $request->content,
            'slug' => Str::slug($request->name, '-'),
        ]);

        // redirect ke halaman index space
        if ($space) {
            return redirect()->route('space.index')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->route('space.index')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // hapus keseluruhan data pada tabel space begitu juga dengan gambar yang disimpan
        $space = Space::findOrFail($id);
        if (File::exists("uploads/imgCover/" . $space->image)) {
            File::delete("uploads/imgCover/" . $space->image);
        }
        $space->delete();
        return redirect()->route('space.index');
    }
}
