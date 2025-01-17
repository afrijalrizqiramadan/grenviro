<?php

namespace App\Livewire;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class Customer extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return DB::table('customers');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('telp')
            ->add('email')
            ->add('location')
            ->add('maps', function ($customer) {
                return sprintf(
                    '<button type="button" onclick="window.location.href=\'%s\'" class="btn btn-success btn-rounded btn-icon">
                        <i class="mdi mdi-map-marker"></i>',
                    e($customer->maps),
                );
            })
            ->add('registration_date_formatted', fn ($model) => Carbon::parse($model->registration_date)->format('d/m/Y'))
            ->add('type')
            ->add('capacity')
            ->add('province', function ($customer) {
                return \Indonesia::findProvince($customer->province)?->name ?? '-';
            })
            ->add('regency', function ($customer) {
                return \Indonesia::findCity($customer->regency)?->name ?? '-';
            })
            ->add('district', function ($customer) {
                return \Indonesia::findDistrict($customer->district)?->name ?? '-';
            })

            ->add('village', function ($customer) {
                return \Indonesia::findVillage($customer->village)?->name ?? '-';
            })
        
            ->add('status', function ($customer) {
                return sprintf(
                    '<span class="badge badge-info bg-success me-1"style="color: white;">%s</span>',
                    e($customer->status),
                );
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),

            Column::make('Nama', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Telp', 'telp')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Lokasi', 'location')
                ->sortable()
                ->searchable(),

                Column::make('Peta', 'maps')
                ->sortable()
                ->searchable(),

            Column::make('Tanggal Pendaftaran', 'registration_date_formatted', 'registration_date')
                ->sortable(),

            Column::make('Tipe', 'type')
                ->sortable()
                ->searchable(),

            Column::make('Kapasitas', 'capacity')
                ->sortable()
                ->searchable(),

            Column::make('Provinsi', 'province')
                ->sortable()
                ->searchable(),

            Column::make('Kota', 'regency')
                ->sortable()
                ->searchable(),

            Column::make('Kecamatan', 'district')
                ->sortable()
                ->searchable(),
            Column::make('Desa', 'village')
                ->sortable()
                ->searchable(),


            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            //     Column::action('Action'),

        ];
    }

 
    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
         redirect()->route('customer.edit', ['customer' => $rowId]);
    }

    // public function actions($row): array
    // {
    //     return [
    //         Button::add('edit')
    //             ->slot('Edit')
    //             ->id()
    //             ->class('btn btn-primary btn-sm')
    //             ->dispatch('edit', ['rowId' => $row->id])
    //     ];
    // }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
