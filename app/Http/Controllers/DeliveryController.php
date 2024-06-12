<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Customer;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DeliveryController extends Controller
{

    protected $model = Santri::class;
    protected $listeners = ['hapus' => 'dihapus','cetak' => 'dicetak'];

    public function deliveryPage(Request $request): View {

        $user = Auth::user();

        if($user->hasRole('administrator')) {
            $statuses = DeliveryStatus::with('customer')->orderBy('delivery_date', 'desc')
            ->get();

            return view('admin/delivery', compact('statuses'));

        }
    }
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function ($id) {
                return route('santri.detail', $id);
            });
        $this->setDefaultSort('created_at', 'desc');

    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Jenis Kelamin')
                ->options([
                    '' => 'Semua',
                    'Perempuan' => 'Perempuan',
                    'Laki-Laki' => 'Laki-Laki',
                ])->filter(function (Builder $query, $value) {
                    if ($value) {
                        $query->where('jenis_kelamin', $value);
                    }
                }),

            SelectFilter::make('Kelas')
                ->options(
                    Kelas::query()->orderBy('nama_kelas')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($kelas) => $kelas->nama_kelas)
                        ->toArray()
                )->filter(function (Builder $query, string $kelas) {
                    return $query->whereHas('kelas', function ($query) use ($kelas) {
                        return $query->where('id', $kelas);
                    });
                })
        ];
    }
    public function view($id)
    {
        $this->emit('viewModal', [
            'title' => 'Edit Data',
            'body' => 'santri.cetakkartu',
            'model' => $id,
            'status' => 'cetakkartu',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make('Santri ID', 'id')->sortable()->deselected(),
            Column::make("NISN", "nisn")
                ->searchable()
                ->sortable(),
            Column::make("Nama", "nama_lengkap")
                ->searchable(fn(Builder $query, $keyword) => $query->orWhere('nama_lengkap', 'like', "%{$keyword}%"))
                ->html()
                ->format(function ($id, $santri, $row) {
                    $image= $santri->avatar != null && $santri->avatar->nama_file != null ? noImageWhenError($santri->avatar->nama_file) : getNoImage();
                    return "<span class='fw-bold text-success'> <img src='$image' class='avatar-xxs me-1 rounded-circle' /> $santri->nama_lengkap</span>";
                })
                ->sortable(),

            Column::make("Jenis Kelamin", "jenis_kelamin")
                ->unclickable()
                ->deselected(),
            Column::make("Tempat Lahir", "tempat_lahir")
                ->unclickable()->deselected()
                ->sortable(),

            Column::make("Tanggal Lahir", "tanggal_lahir")
                ->unclickable()->deselected()
                ->format(fn($tanggal_lahir) => Carbon::parse($tanggal_lahir)->format('d F Y'))
                ->sortable(),
            Column::make('WA Ortu', 'nohpnotifikasi')
                ->unclickable(),
            Column::make('Unit Sekolah', 'unit_sekolah.namaunit')
                ->unclickable()->sortable(),
            Column::make('Kelas', 'kelas')->unclickable(),

        ];
    }

    public function cetak($id){
        $this->deletePdf();
            $santri = Santri::find($id);
                    try {
            $nama_file = "{$santri->nis}";
            $nama_file = \Str::slug($nama_file) . '.png';
            $path = storage_path('app/qrcode/');
            if (!file_exists($path)) {
                File::makeDirectory($path);
            }

            \QrCode::size(1200)->style('round')->margin(3)->format('png')->generate($santri->nis, storage_path('app/qrcode/') . $nama_file);
            // $this->flash('success', 'Berhasil', [
            //     'text' => 'Kode QR berhasil dibuat ulang'
            // ], route('santri.semua'));

        } catch (\Exception $exception) {
            // $this->alert('warning', 'Kesalahan', [
            //     'text' => 'Kesalahaan saat regenerate kode QR'
            // ]);
        }
        $blanko = Blanko::find($id);
        $pdf=PDF::loadView('livewire.pdf.kartusantri2',compact('santri','blanko'));
        $pdf->setPaper('A4','potrait');
        $pdf->set_option('dpi','116');
        $pdf->set_option('defaultFont','Helvetica');
        // $content = $pdf->output();
        // $content = $pdf->download()->getOriginalContent();
        // Storage::put('public/pdf/kartusantri.pdf',$content);
        // Storage::disk('local')->makeDirectory('/pdf');
        $path = 'pdf/';
        $pdf->save($path  . 'kartusantri.pdf');
        // $path = 'storage/pdf/';
        // file_put_contents($path, $content);
        // return $pdf->stream('kartusantri.pdf');
        // return view('livewire.pdf.kartusantri',[
        //     'santri' => $santri,
        // ]);
    }
}
