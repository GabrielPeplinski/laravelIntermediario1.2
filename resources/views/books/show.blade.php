@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-bordered table-striped col-lg-7 col-md-6 col-sm-8 col-xs-8 text-center">
            <tbody>
            <tr>
                <th class="col-md-2 col-sm-2 col-xs-2">ID do Livro</th>
                <td class="col-md-2 col-sm-2 col-xs-2">{{ $book->id }}</td>
            </tr>
            <tr>
                <th class="col-md-2 col-sm-2 col-xs-2">Título</th>
                <td class="col-md-2 col-sm-2 col-xs-2">{{ $book->title }}</td>
            </tr>
            <tr>
                <th class="col-md-2 col-sm-2 col-xs-2">Autor</th>
                <td class="col-md-2 col-sm-2 col-xs-2">{{ $book->author }}</td>
            </tr>
            <tr>
                <th class="col-md-2 col-sm-2 col-xs-2">Doador</th>
                <td class="col-md-2 col-sm-2 col-xs-2">{{ $book->user->name }}</td>
            </tr>
            <tr>
                <th class="col-md-2 col-sm-2 col-xs-2">Adicionado</th>
                <td class="col-md-2 col-sm-2 col-xs-2">{{date( 'd/m/Y' ,strtotime($book->created_at))}}</td>
            </tr>
            <tr>
                <th class="col-md-2 col-sm-2 col-xs-2">Situação</th>
                @if ($book -> available === 0)
                    <td class="col-md-2 col-sm-2 col-xs-2">Emprestado!</td>
                @else
                    <td class="col-md-2 col-sm-2 col-xs-2">Disponível</td>
                @endif
            </tr>
            </tbody>
        </table>
        <table class="text-center">
            <tbody>
            <tr class="mt-2">
                <td class="col-xg-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    @if ($book -> available === 1)
                        <form action="/borrows/{{$book->id}}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn-sm btn-success text-dark f-left">Emprestar</button>
                        </form>
                    @endif
                </td>
                @can('edit', $book)
                    <td class="col-xg-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <form action="/books/{{ $book->id }}/edit" method="POST">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn-sm btn-secondary text-dark">Editar</button>
                        </form>
                    </td>
                @endcan
                @can('destroy', $book)
                    <td class="col-xg-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <form action="/books/{{ $book->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sm btn-danger text-dark">Deletar</button>
                        </form>
                    </td>
                @endcan
            </tr>
            </tbody>
        </table>
    </div>
@endsection
