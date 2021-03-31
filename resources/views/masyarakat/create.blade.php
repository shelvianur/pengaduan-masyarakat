@extends('layouts.master')
@section('title')
Pengaduan | Pengaduan Masyarakat
@endsection

@section('content2')
<div class="col">
    <div class="card shadow">
        <div class="card-header border-0">
            <h3 class="mb-0">Laporan !</h3><br>
            <form action="{{route('user.pengaduan.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="jl">Judul Laporan</label>
                    <input type="text" class="form-control  form-control-muted" id="jl" placeholder="Isi judul laporan*" name="judul" required>
                </div>
                <div class="form-group">
                    <label for="tgl">Tanggal Kejadian</label>
                    <input type="datetime-local" class="form-control  form-control-muted" id="tgl" placeholder="Pilih Tanggal Kejadian*" name="tgl" required>
                </div>
                <div class="form-group">
                    <label for="il">Isi Laporan</label>
                    <textarea type="text" class="form-control  form-control-muted" id="il" placeholder="Isi Laporan*" rows="6" name="isi_laporan" required></textarea>
                </div>
                <!-- <div class="form-group">
                    <label for="ul">Upload Lampiran</label>
                    <input type="file" class="form-control  form-control-muted" id="ul" placeholder="Pilih Tanggal Kejadian*" name="foto[]" required multiple>
                </div> -->
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