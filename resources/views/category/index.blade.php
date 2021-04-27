@extends('layout.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Seznam kategorij</div>

                <div class="card-body">
                    @foreach (Auth::user()->categories as $category)
                        {{ $category->name }}: {{ $category->description }} ( {{ $category->user->name}})<br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection