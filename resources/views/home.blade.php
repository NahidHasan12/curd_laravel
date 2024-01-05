@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @if (session()->has('success'))
                <div style="font-size: 15px" class="badge d-block bg-success">{{ session()->get('success') }}</div>
            @elseif(session()->get('error'))
                <div style="font-size: 15px" class="badge d-block bg-danger">{{ session()->get('error') }}</div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between"><p>CURD Area</p>
                 <a href="{{ route('curd.index') }}" class="btn btn-sm btn-primary">addNew</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>address</th>
                                <th>Type</th>
                                <th>img</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=>$item)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->type->type_name }}</td>
                                    <td>
                                        <img width="150px" height="100px" src="{{ asset('CurdImg/'.$item->image) }}" alt="">
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('curd.edit',$item->id) }}" class="btn btn-sm btn-primary m-1">Edit</a>
                                        <a href="{{ route('curd.delete',$item->id) }}" class="btn btn-sm btn-danger m-1">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

</script>
@endpush
