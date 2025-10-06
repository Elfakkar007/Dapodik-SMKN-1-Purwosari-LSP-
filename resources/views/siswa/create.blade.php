@extends('layouts.app')

@section('content')
    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        @include('siswa._form', ['formType' => 'create'])
    </form>
@endsection
