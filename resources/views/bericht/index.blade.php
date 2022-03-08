@extends('app')
@section('content')
@if(session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif
    <div class="card">
      <div class="card-header">
        <form class="row row-cols-auto g-1">
          <div class="col">
            <input class="form-control" type="text" name="q" value="{{ $q }}" placeholder="Zoek hier...
            "/>
          </div>
          <div class="col">
            <button class="btn btn-success">Zoek</button>
          </div>
          <div class="col">
            <a class="btn btn-primary" href="{{ route('bericht.create') }}">Toevoegen</a>
          </div>
        </form>
      </div>
      <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-striped table-hover m-0">
          <thead>
            <th>#</th>
            <th>Bericht Content</th>
            <th>Gemaakt Op</th>
            <th>Laatst Gewijzigd Op</th>
          </thead>
        <?php $no = 1 ?>
        @foreach ($berichten as $bericht)
        <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $bericht->bericht_content }}</td>
          <td>{{ $bericht->created_at }}</td>
          <td>{{ $bericht->updated_at }}</td>
          <td>
            <a class="btn btn-sm btn-warning" href="{{ route('bericht.edit', $bericht) }}">Bewerk</a>
            <form method="POST" action="{{ route('bericht.destroy', $bericht) }}" style="display:inline;" onsubmit="return confirm ('Delete?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger">Delete</button>
          </td>
        </tr>
        @endforeach
        </table>
      </div>
    </div>
    @endsection
