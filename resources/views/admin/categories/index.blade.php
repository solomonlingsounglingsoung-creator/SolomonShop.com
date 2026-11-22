@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">

    <div class="my-3">
        <h1 class="mt-4">Categories</h1>
  
       <a href="{{ route('backend.categories.create') }}"
   class="btn btn-primary float-end">
    Create Category
       </a>
        <a class="nav-link active" href="{{ route('shop') }}">
                 Home
            </a>
    </div>


    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="">Dashboard</a>
        </li>

        <li class="breadcrumb-item active">
            Categories
        </li>
    </ol>


    <div class="card mb-4">

        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Categories Lists
        </div>


        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>#</th>
                    </tr>
                </thead>
                   <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>#</th>
                    </tr>
                </tfoot>
                <tbody>

                    @php
                        $i = 1;
                    @endphp


                    @foreach ($categories as $category)

                        <tr>

                            <td>
                                {{ $i++ }}
                            </td>


                            <td>
                                {{ $category->name }}
                            </td>


                            <td>
                                    <a href="{{route('backend.categories.edit',$category->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                <button
                                    type="button"
                                    class="btn btn-sm btn-danger delete"
                                    data-id="{{ $category->id }}"
                                >
                                    Delete
                                </button>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>



<!-- Delete Modal -->
<div class="modal fade"
     id="deleteModal"
     tabindex="-1"
     aria-labelledby="deleteModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header bg-danger text-light">

                <h1 class="modal-title fs-5"
                    id="deleteModalLabel">
                    Delete Category
                </h1>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                </button>

            </div>


            <div class="modal-body">
                Are you sure you want to delete this category?
            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Close
                </button>


                <form
                    action=""
                    id="deleteForm"
                    method="POST">

                    @csrf

                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-danger">
                        Yes, Delete
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection



@section('script')

<script>

$(document).ready(function () {

    $('tbody').on('click', '.delete', function () {

        let id = $(this).data('id');

        $('#deleteForm').attr(
            'action',
            '/backend/categories/' + id
        );

        let deleteModal = new bootstrap.Modal(
            document.getElementById('deleteModal')
        );

        deleteModal.show();

    });

});

</script>

@endsection