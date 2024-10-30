@extends('layouts.master')
@section('tittle','User')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Edit Data User</h3>
                            <a class = "btn btn-danger" href="/user">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="/user/{{$user->id}}/update" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Nama User</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="nama"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Username</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="username"
                                    id=""
                                    value="{{ $user->username }}"
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">No Telp</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="notelp"
                                    id=""
                                    value="{{ $user->notelp }}"
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                            </div>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection