@extends('backend/layouts/master')

@section('main-content')
@include('backend/layouts/side-top-bar')

<div class="content">
    <div class="container">
        <h2>Trashed Fruits List</h2>
        <table id="fruitsTable" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Old Price</th>
                    <th scope="col">New Price</th>
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
                            <img src="{{ asset('uploads/fruits/' . $item->fr_img) }}" alt="{{ $item->fr_name }}">
                        </div>
                    </td>
                    <td class="align-middle">{{ $item->fr_qty }}</td>
                    <td class="align-middle">{{ $item->fr_old_price }}</td>
                    <td class="align-middle">{{ $item->fr_cur_price }}</td>

                    <td class="align-middle">
                        <!-- Add action buttons here, e.g., Edit, Delete, etc. -->
                        {{-- <a href="#" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a> --}}

                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#restoreModal{{ $item->id }}">
                            <i class="fas fa-eye"></i>
                        </button>
                        @include('backend/modals/restore_modal')

                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                            <i class="fas fa-trash"></i>
                        </button>
                        @include('backend/modals/delete_modal')
                    </td>
                </tr>
                
                @if(session()->has('restore_fruits'))
                    <div class="alert alert-success text-center mb-0">
                        {{ session('restore_fruits') }}
                    </div>
                @php
                    session()->forget('restore_fruits');
                @endphp
                @endif

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection