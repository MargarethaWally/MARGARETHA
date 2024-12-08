@extends('layouts.master')

@section('content')
    <div class="container padding">
        <h1 class="text-primarym my-3">Categories</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->name }}</td>
                        <td>
                            <form action="/categories/{{ $item->id }}" method="POST">
                                <a href="/categories/{{ $item->id }}/edit" class="btn btn-info btn-sm">Edit</a>
                                @method('delete')
                                @csrf
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                        </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Tidak ada Data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
