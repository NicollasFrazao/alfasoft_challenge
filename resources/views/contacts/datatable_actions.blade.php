<div class="btn-group">
    <a href="{{ route('contacts.show', [$id]) }}" class="btn btn-default btn-xs" data-toggle="tooltip" title="Visualizar">
        <i class="fas fa-eye"></i>
    </a>
    
    <a href="{{ route('contacts.edit', [$id]) }}" class="btn btn-default btn-xs" data-toggle="tooltip" title="Editar">
        <i class="fas fa-edit"></i>
    </a>

    {!! Form::open(["route" => ["contacts.destroy", $id], "method" => "delete"]) !!}
        {!! Form::button("<i class='fas fa-trash'></i>", [
            "type"        => "submit",
            "onclick"     => "return confirm('Tem certeza que deseja efetuar a exclusão?');",
            "class"       => "btn btn-danger btn-xs",
            "data-toggle" => "tooltip",
            "title"       => "Excluir",
        ]) !!}
    {!! Form::close() !!}
</div>