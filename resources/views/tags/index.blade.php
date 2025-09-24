@extends('layouts.app')
@section('title', 'Tags')
@section('page-title', 'Gerenciar Tags')
@section('content')
    <div class="mb-4">
        <form action="{{ route('tags.store') }}" method="POST" class="d-flex gap-2">
            @csrf
            <input type="text" name="name" class="form-control" placeholder="Nova tag" required>
            <input type="color" name="color" value="#007bff" class="form-control form-control-color" title="Escolha a cor">
            <button type="submit" class="btn btn-success">Adicionar</button>
        </form>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <form action="{{ route('tags.update', $tag->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('PUT')
                            <input type="color" name="color" value="{{ $tag->color }}" class="form-control form-control-color" title="Editar cor" onchange="this.form.submit()">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
