@extends('backend/layouts/master')

@section('main-content')
@include('backend/layouts/side-top-bar')

<div class="content">
    <div class="container">
        <h2>Fruits List</h2>
        <table id="fruitsTable" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Old Price</th>
                    <th scope="col">New Price</th>
                    <th scope="col">Available</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample data for demonstration purposes -->
                @foreach ($fruits as $item)
                <tr class="align-items-center justify-content-center">
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $item->fr_name }}</td>

                    <td class="align-middle">
                        <div class="image-container" style="height: 100px;">
                            <img src="{{ asset('uploads/fruits/' . $item->fr_img) }}" alt="{{ $item->fr_name }}" height="50px" width="60px">
                        </div>
                    </td>

                    <td class="align-middle">{{ $item->fr_qty }}</td>
                    <td class="align-middle">{{ $item->fr_old_price }}</td>
                    <td class="align-middle">{{ $item->fr_cur_price }}</td>

                    <td class="align-middle">
                        @if($item->fr_availability)
                            <a href="{{ route('avl_to_unavl', $item->id) }}" class="btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                        @else
                            <a href="{{ route('unavl_to_avl', $item->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                        @endif
                    </td>

                    <td class="align-middle">
                        <!-- Add action buttons here, e.g., Edit, Delete, etc. -->
                        <a href="{{ route('edit_fruit', $item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>

                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#softDeleteModal{{ $item->id }}">
                            <i class="fas fa-eye-slash"></i>

                        </button>
                        @include('backend/modals/soft_delete_modal')

                    </td>
                </tr>
                
                @if(session()->has('fr_soft_delete'))
                    <div class="alert alert-warning text-center mb-0">
                        {{ session('fr_soft_delete') }}
                    </div>
                @php
                    session()->forget('fr_soft_delete');
                @endphp
                @endif

                @if(session()->has('update_fruit'))
                    <div class="alert alert-primary text-center mb-0">
                        {{ session('update_fruit') }}
                    </div>
                @php
                    session()->forget('update_fruit');
                @endphp
                @endif

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection