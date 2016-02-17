@extends('Master')

@section('main_content')
  <h1>All Attributes</h1>
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Creator</th>
        <th>Note</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      @foreach($attrs as $attr)
        <tr>
          <td>{{$attr->labelName}}</td>
          <td>{{$attr->creator}}</td>
          <td>{{$attr->notes}}</td>
          @if($attr->editable)
            <td>
              <a href="updateattr/{{$attr->id}}" role="button" class="btn btn-primary btn-xs">Update</a>
              <a href="delattr/{{$attr->id}}" role="button" class="btn btn-danger btn-xs">Delete</a>
            </td>
          @else
            <td>
              <a href="updateattr/{{$attr->id}}" role="button" class="btn btn-primary btn-xs disabled">Update</a>
              <a href="delattr/{{$attr->id}}" role="button" class="btn btn-danger btn-xs disabled">Delete</a>
            </td>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>
@stop