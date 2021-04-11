@extends('layouts.master')
@section('title')
Pengaduan | Pengaduan Masyarakat
@endsection

@section('content2')
<div class="col">
    <div class="card shadow">
        <div class="card-header border-0">
            <h3 class="mb-0">Laporan !</h3><br>
            <form action="/user/update/{{$pengaduan->id_pengaduan}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="jl">Judul Laporan</label>
                    <input type="text" class="form-control  form-control-muted" id="jl" value="{{$pengaduan->judul_laporan}}" name="judul" required>
                </div>
                <div class="form-group">
                    <label for="tgl">Tanggal Kejadian</label>
                    <input type="datetime-local" class="form-control  form-control-muted" id="tgl" value="{{$pengaduan->tgl_pengaduan}}" name="tgl" required>
                </div>
                <div class="form-group">
                    <label for="il">Isi Laporan</label>
                    <textarea type="text" class="form-control  form-control-muted" id="il" rows="6" name="isi_laporan" required>{{$pengaduan->isi_laporan}}</textarea>
                </div>
                <div class="input-group hdtuto control-group lst increment" >
                    <input type="file" name="imagename[]" class="myfrm form-control">
                    <div class="input-group-btn"> 
                        <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                    </div>
                </div>
                <div class="clone hide">
                    <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                        <input type="file" name="imagename[]" class="myfrm form-control" multiple="
                        multiple">
                        <div class="input-group-btn"> 
                        <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                        </div>
                    </div>
                </div>
                
                    <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>
            </form>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto control-group lst").remove();
      });
    });
</script>
@endsection