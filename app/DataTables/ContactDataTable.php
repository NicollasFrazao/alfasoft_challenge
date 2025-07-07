<?php

namespace App\DataTables;

use App\Models\Contact;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ContactDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()->eloquent($query)
            
            ->editColumn('created_at', function ($contact)
            {
                return \Carbon::create($contact->created_at)->format('d/m/Y H:i:s');
            })

            ->editColumn('updated_at', function ($contact)
            {
                return \Carbon::create($contact->updated_at)->format('d/m/Y H:i:s');
            })

            ->addColumn('action', 'contacts.datatable_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Company $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $contacts = Contact::query();
        return $contacts;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('datatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0, 'asc')
                    ->buttons(
                        Button::make('create')
                            ->tltle('Adicionar'),
                        /*
                        Button::make('export')
                            ->title('Exportar'),
                        */
                        Button::make('print')
                            ->title('Imprimir'),
                        Button::make('reset')
                            ->title('Redefinir'),
                        Button::make('reload')
                            ->title('Recarregar'),
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return 
        [
            Column::make('id')
                ->title('#'),
            Column::make('name')
                ->title('Nome'),
            Column::make('email')
                ->title('E-mail'),
            Column::make('phone')
                ->title('Telefone'),
            /*
            Column::make('created_at')
                ->title('Criado em'),
            Column::make('updated_at')
                ->title('Alterado em'),
            */
            Column::computed('action')
                ->title('Ações')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() : string
    {
        return 'contacts_'.date('YmdHis');
    }
}
