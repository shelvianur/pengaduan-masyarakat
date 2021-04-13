@extends('user-layouts.master')

@section('content1')
<!-- <section id="contact" class="contact">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <p>Tulis Pengaduan Masyarakat</p>
        </div>
        <div class="row">
            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200" style="margin: auto;">
            <form action="{{route('user.pengaduan.store')}}" method="post" role="form" class="php-email-form">
                <div class="form-group">
                    <label for="jl">Judul Laporan</label>
                    <input type="text" name="judul" class="form-control" id="jl" placeholder="Masukkan Judul Laporan*" required/>
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="tgl">Tanggal Kejadian</label>
                    <input type="datetime-local" class="form-control" name="tgl" id="tgl" required/>
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="il">Isi Laporan</label>
                    <textarea class="form-control" id="il" name="isi_laporan" rows="10" data-rule="required" data-msg="Please write something for us" required></textarea>
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="ul">Upload Lampiran</label>
                    <div class="input-field mt-1">
                        <div class="input-images-1" style="padding-top: .5rem;"></div>
                    </div>
                </div>
                <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Kirim Pengaduan</button></div>
            </form>
            </div>

        </div>
    </div>
</section> -->

<section class="contact">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <p>Tulis Pengaduan Masyarakat</p>
        </div>
        @if($message = Session::get('gagal'))
            <div class="alert alert-danger" role="alert">
                {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200" style="margin: auto;">
                <form action="{{route('user.pengaduan.store')}}" method="post" enctype="multipart/form-data" role="form" class="php-form">
                    @csrf
                    <div class="form-group">
                        <label for="jl">Judul Laporan</label>
                        <input type="text" class="form-control  form-control-muted" id="jl" placeholder="Isi judul laporan*" name="judul" required>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <label for="tgl">Tanggal Kejadian</label>
                        <input type="datetime-local" class="form-control form-control-muted" id="tgl" placeholder="Pilih Tanggal Kejadian*" name="tgl" required>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <label for="il">Isi Laporan</label>
                        <textarea type="text" class="form-control  form-control-muted" id="il" placeholder="Isi Laporan*" rows="6" name="isi_laporan" required></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <label for="ul">Upload Lampiran</label>
                        <div class="input-field mt-1">
                            <div class="input-images-1" style="padding-top: .5rem;"></div>
                        </div>
                        @error('images')
                        <div class="text-muted font-italic">
                            <small><span class="text-danger font-weight-700">{{ $message }}</span></small>
                        </div>
                        @enderror
                    </div>
                    <div class="text-center" >
                        <button type="submit">Kirim Pengaduan</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</section>



<script type="text/javascript">
    $(function () {

        $('.input-images-1').imageUploader();

    });
</script>
@endsection