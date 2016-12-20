@extends('layouts.app')
@section('content')
<div class="row">
   <div class="col-md-8 col-md-offset-2">
    @if ($queryResults->isComplete())
    <table class="table table-hover">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
      @foreach($queryResults->rows() as $row)
        <tr>
          @foreach ($row as $column => $value)
            <td>{{ $value }}</td>
          @endforeach
        </tr>
      @endforeach
    </table>
    @else
        <h2>Nothing to show</h2>
    @endif
  </div>
</div>
@stop
