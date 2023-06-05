@extends('layouts.admin')
@section('content')
    <div class="container mt-4">

        <table class="table table-dark align-middle rounded-2">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Ispeziona/Modifica</th>
                    <th scope="col">Elimina
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $proj)
                    <tr style="height: 80px">
                        <th scope="row">{{ $proj->id }}</th>
                        <td>{{ $proj->title }}</td>
                        <td>{{ $proj->description }}</td>
                        <td>
                            <div class="btn-group justify-content-center w-100">

                                <a class="btn btn-success" href="{{ route('admin.projects.show', $proj->slug) }}">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a class="btn btn-warning" href="{{ route('admin.projects.edit', $proj->slug) }}">
                                    <i class="fa-solid fa-glasses"></i>
                                </a>

                            </div>
                        </td>
                        <td>
                            <form action="{{ route('admin.projects.destroy', $proj->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
