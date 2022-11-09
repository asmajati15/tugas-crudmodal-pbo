@extends('Layout')

@section('Content')
<h2>Table Profile</h2>
<a href="#" onclick="ModalTambahProfile()" class="btn btn-success my-3"> + Add New Data</a>

<table id="table_id" class="table table-bordered">
<thead>
    <tr>
        <th>#</th>
        <th>Profile</th>
        <th>Action</th>

    </tr>
</thead>
    <tbody>
        @foreach ($profile as $profile)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $profile->nama_profile }}</td>
            <td>
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal" data-url="{{ route('profile.update',['id'=>$profile->kd_profile]) }}" data-nama_profile="{{ $profile->nama_profile }}">Update</a>
                <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('profile.delete',['id'=>$profile->kd_profile]) }}">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<form action="{{ route('profile.add') }}" method="post">
    @csrf
<div class="modal fade" id="ModalTambahProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Tambah</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="mb-3">
                <label  class="form-label">Nama Profile</label>
                <textarea name="nama_profile" class="form-control" required></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
        </div>
        </div>
    </div>
</div>
</form>

<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">

        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function ModalTambahProfile () {
       $('#ModalTambahProfile').modal('show');
    }

    $('#updateModal').on('shown.bs.modal', function(e) {
        var html = `
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="${$(e.relatedTarget).data('url')}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Profile</label>
                        <input type="text" name="nama_profile" value="${$(e.relatedTarget).data('nama_profile')}" class="form-control" id="exampleFormControlInput1"
                            placeholder="name@example.com">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            `;
        $('#modal-content').html(html);
    });
    
    @if(session()->has('success'))
    Swal.fire(
    'Success',
    '{{ session('success') }}',
    'success'
    )
    @endif
</script>
@endsection
