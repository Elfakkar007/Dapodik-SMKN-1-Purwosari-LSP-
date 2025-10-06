@extends('layouts.app')

@section('content')
    <form action="{{ route('siswa.update', $siswa) }}" method="POST">
        @csrf
        @method('PUT')
        @include('siswa._form', ['formType' => 'edit', 'siswa' => $siswa])
    </form>
@endsection
