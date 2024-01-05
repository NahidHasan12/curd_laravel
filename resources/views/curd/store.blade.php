@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('success'))
                <div style="font-size: 15px" class="badge d-block bg-success">{{ session()->get('success') }}</div>
            @elseif(session()->get('error'))
                <div style="font-size: 15px" class="badge d-block bg-danger">{{ session()->get('error') }}</div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between"><p>CURD Area</p>
                 <a href="{{ route('home') }}" class="btn btn-sm btn-danger">Back</a>
                </div>

                <div class="card-body">
                  <form action="{{ route('curd.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                        @error('name')
                            <span class="m-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="address">
                        @error('address')
                        <span class="m-1 text-danger">{{ $message }}</span>
                         @enderror
                    </div>

                    <div class="mb-2">
                        <label for="type" class="form-label">Profile Type</label>
                        <select class="form-control" name="type" id="type">
                            @foreach ($type as $item)
                              <option value="{{ $item->id }}">{{ $item->type_name }}</option>
                            @endforeach
                        </select>
                        @error('address')
                        <span class="m-1 text-danger">{{ $message }}</span>
                         @enderror
                    </div>

                    <div class="mb-2">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image" required>
                        @error('image')
                            <span class="m-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-sm btn-info">Store</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
