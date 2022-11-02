@extends('Layout')

@section('Content')
<h2>Table Berita</h2>
<a href="#" onclick="ModalTambahBerita()" class="btn btn-success my-3"> + Add New Data</a>

<table id="table_id" class="table table-bordered">
<thead>
    <tr>
        <th>#</th>
        <th>News</th>
        <th>Action</th>

    </tr>
</thead>
    <tbody>
        @foreach ($berita as $berita)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $berita->nama_berita }}</td>
            <td>
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal" data-url="{{ route('berita.update',['id'=>$berita->kd_berita]) }}" data-nama_berita="{{ $berita->nama_berita }}">Update</a>
                <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('berita.delete',['id'=>$berita->kd_berita]) }}">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<form action="{{ route('berita.add') }}" method="post">
    @csrf
<div class="modal fade" id="ModalTambahBerita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Tambah</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="mb-3">
                <label  class="form-label">Nama Berita</label>
                <textarea name="nama_berita" class="form-control" required></textarea>
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
    function ModalTambahBerita () {
       $('#ModalTambahBerita').modal('show');
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
                        <label for="exampleFormControlInput1" class="form-label">Nama Berita</label>
                        <input type="text" name="nama_berita" value="${$(e.relatedTarget).data('nama_berita')}" class="form-control" id="exampleFormControlInput1"
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
</script>
@endsection
