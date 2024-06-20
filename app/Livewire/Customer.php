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
        return DB::table('Customers');
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
            ->add('images')
            ->add('registration_date_formatted', fn ($model) => Carbon::parse($model->registration_date)->format('d/m/Y'))
            ->add('type')
            ->add('capacity')
            ->add('province')
            ->add('regency')
            ->add('district')
            ->add('village')
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

            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Telp', 'telp')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Location', 'location')
                ->sortable()
                ->searchable(),

                Column::make('Maps', 'maps')
                ->sortable()
                ->searchable(),

            Column::make('Images', 'images')
                ->sortable()
                ->searchable(),

            Column::make('Registration date', 'registration_date_formatted', 'registration_date')
                ->sortable(),

            Column::make('Type', 'type')
                ->sortable()
                ->searchable(),

            Column::make('Capacity', 'capacity')
                ->sortable()
                ->searchable(),

            Column::make('Province', 'province')
                ->sortable()
                ->searchable(),

            Column::make('Regency', 'regency')
                ->sortable()
                ->searchable(),

            Column::make('District', 'district')
                ->sortable()
                ->searchable(),

            Column::make('Village', 'village')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

                Column::action('Action'),

        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('registration_date'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions($row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

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
