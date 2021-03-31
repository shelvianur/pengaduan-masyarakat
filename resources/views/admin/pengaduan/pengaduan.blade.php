@extends('layouts.master')
@section('title')
Pengaduan | Pengaduan Masyarakat
@endsection

@section('content2')
<div class="col">
    <div class="card shadow">
        <div class="table-responsive">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <p>Judul Laporan</p>
                        <h2 class="mb-0">{{$p->judul_laporan}}</h2><br>
                        <p>Foto</p>
                        @foreach ($image as $img)
                            <img src="{{asset('/images/' . $img->foto)}}" width="200" height="200" />
                        @endforeach
                        <br><br>
                        <p>Isi Laporan</p>
                        <h4>{{$p->isi_laporan}}</h4>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
