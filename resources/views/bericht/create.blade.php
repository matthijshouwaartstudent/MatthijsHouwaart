@extends('app')
@section('content')
<div class="row">
  <div class="col-md-6">
    @if($errors->any())
    @foreach($errors->all() as $err)
    <p class="alert alert-danger">{{ $err }}</p>
    @endforeach
    @endif
    <form method="POST" action="{{ route('bericht.store') }}">
      @csrf
      <div class="mb-3">
        <label>Bericht Content<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="bericht_content" value="{{ old('bericht_content' )}}" />
      </div>
      <div class="mb-3">
        <button class="btn btn-primary">Save</button>
        <a class="btn btn-danger" href="{{ route('bericht.index') }}">Back</a>
      </div>
@endsection
