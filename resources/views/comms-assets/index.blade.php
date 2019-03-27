@extends('layouts.app')

@section('title', 'Comms Assets')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-content">
          <h2><i class="fa fa-copyright"></i> Comms Assets</h2>
          <div class="row">
            <div class="col-lg-6">
              <div>
                <ul class="list-group">
                  <li class="list-group-item">
                    <a href="https://drive.google.com/open?id=1oPNBwynKIaGBK6l5rHMdBdAYWehZMeIRpHVU8mudo-4" target="_blank">Core Messaging</a>
                  </li>
                  <li class="list-group-item">
                    <a href="https://drive.google.com/open?id=1lc4L9CpfvAblql-XTselS83lL3WDPQwKJjV7b1WNDZw" target="_blank">Panduan Pesan Utama</a>
                  </li>
                  <li class="list-group-item">
                    <a href="https://drive.google.com/open?id=1PSYT8aarq0NWH5xX9EhCgJYTFY8SNH3LYCuSj_sOJCs" target="_blank">Writing Style Guide</a>
                  </li>
                  <li class="list-group-item">
                    <a href="https://drive.google.com/drive/folders/1SdMOcQhC4bg189FAs-onpfOlqeLFj1RO?usp=sharing" target="_blank">Branding Guideline</a>
                  </li>
                  <li class="list-group-item">
                    <a href="https://drive.google.com/open?id=16QcHU5pQEmuzgg0zNlkY48rklDvXsutl" target="_blank">Organization presentation deck</a>
                  </li>
                  <li class="list-group-item">
                    <a href="https://drive.google.com/drive/folders/1ZVLN9l-4cfxXAyV8UtYJshRx3lI4L7MD?usp=sharing" target="_blank">Photo Library</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6">
              <div>
                <ul class="list-group">
                  <li class="list-group-item">
                    <a href="https://drive.google.com/drive/folders/1EiVeWo-P0HDhFBbc1W5fkYB20FKp6G8z?usp=sharing" target="_blank">Logo</a>
                  </li>
                  <li class="list-group-item">
                    <a href="https://drive.google.com/drive/folders/1sIGJ4Fvngm5v73WxzVeSmUYSj_b5SlxV?usp=sharing" target="_blank">Font</a>
                  </li>
                  <li class="list-group-item">
                    <a href="https://drive.google.com/drive/folders/1Q9Fp-sYp7YjHySaIotEzjDeHUvBCyxCh?usp=sharing" target="_blank">Consent Form</a>
                  </li>
                  <li class="list-group-item">
                    <a href="https://drive.google.com/drive/folders/164SABK4Nsv1gxH656kKJmOZ8idSVELV5?usp=sharing" target="_blank">Letterhead</a>
                  </li>
                  <li class="list-group-item">
                    <a href="https://drive.google.com/file/d/1LD8QwSq9rB1aCGlnP2lFRaTdrqjNk82o/view?usp=sharing" target="_blank">Multimedia Request Form</a>
                  </li>
                  <li class="list-group-item">
                    <a href="https://drive.google.com/drive/folders/19W6pq7ynOm3zzDCrbfkj-Bee4MmsO8N1?usp=sharing" target="_blank">Video</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-content">
          <h2><i class="fa fa-file-image-o"></i> KOPERNIK PHOTOS STOCK</h2>
          <div class="lightBoxGallery">
            <a href="assets/images/gallery/1.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/1s.jpg')}}"></a>
            <a href="assets/images/gallery/2.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/2s.jpg')}}"></a>
            <a href="assets/images/gallery/3.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/3s.jpg')}}"></a>
            <a href="assets/images/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/4s.jpg')}}"></a>
            <a href="assets/images/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/5s.jpg')}}"></a>
            <a href="assets/images/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/6s.jpg')}}"></a>
            <a href="assets/images/gallery/7.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/7s.jpg')}}"></a>
            <a href="assets/images/gallery/8.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/8s.jpg')}}"></a>
            <a href="assets/images/gallery/9.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/9s.jpg')}}"></a>
            <a href="assets/images/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/10s.jpg')}}"></a>
            <a href="assets/images/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/12s.jpg')}}"></a>
            <a href="assets/images/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/4s.jpg')}}"></a>
            <a href="assets/images/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/5s.jpg')}}"></a>
            <a href="assets/images/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/6s.jpg')}}"></a>
            <a href="assets/images/gallery/7.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/7s.jpg')}}"></a>
            <a href="assets/images/gallery/2.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/2s.jpg')}}"></a>
            <a href="assets/images/gallery/3.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/3s.jpg')}}"></a>
            <a href="assets/images/gallery/1.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/1s.jpg')}}"></a>
            <a href="assets/images/gallery/9.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/9s.jpg')}}"></a>
            <a href="assets/images/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/10s.jpg')}}"></a>
            <a href="assets/images/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/11s.jpg')}}"></a>
            <a href="assets/images/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/12s.jpg')}}"></a>
            <a href="assets/images/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/4s.jpg')}}"></a>
            <a href="assets/images/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/5s.jpg')}}"></a>
            <a href="assets/images/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/4s.jpg')}}"></a>
            <a href="assets/images/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/5s.jpg')}}"></a>
            <a href="assets/images/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/6s.jpg')}}"></a>
            <a href="assets/images/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/12s.jpg')}}"></a>
            <a href="assets/images/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/4s.jpg')}}"></a>
            <a href="assets/images/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/5s.jpg')}}"></a>
            <a href="assets/images/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/10s.jpg')}}"></a>
            <a href="assets/images/gallery/1.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/1s.jpg')}}"></a>
            <a href="assets/images/gallery/2.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/2s.jpg')}}"></a>
            <a href="assets/images/gallery/3.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/3s.jpg')}}"></a>
            <a href="assets/images/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/4s.jpg')}}"></a>
            <a href="assets/images/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/5s.jpg')}}"></a>
            <a href="assets/images/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/6s.jpg')}}"></a>
            <a href="assets/images/gallery/7.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/7s.jpg')}}"></a>
            <a href="assets/images/gallery/8.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/8s.jpg')}}"></a>
            <a href="assets/images/gallery/9.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/9s.jpg')}}"></a>
            <a href="assets/images/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/10s.jpg')}}"></a>
            <a href="assets/images/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/11s.jpg')}}"></a>
            <a href="assets/images/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/12s.jpg')}}"></a>
            <a href="assets/images/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/4s.jpg')}}"></a>
            <a href="assets/images/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/5s.jpg')}}"></a>
            <a href="assets/images/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/6s.jpg')}}"></a>
            <a href="assets/images/gallery/7.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/7s.jpg')}}"></a>
            <a href="assets/images/gallery/2.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/2s.jpg')}}"></a>
            <a href="assets/images/gallery/3.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/3s.jpg')}}"></a>
            <a href="assets/images/gallery/1.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/1s.jpg')}}"></a>
            <a href="assets/images/gallery/9.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/9s.jpg')}}"></a>
            <a href="assets/images/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/10s.jpg')}}"></a>
            <a href="assets/images/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/11s.jpg')}}"></a>
            <a href="assets/images/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/12s.jpg')}}"></a>
            <a href="assets/images/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/4s.jpg')}}"></a>
            <a href="assets/images/gallery/7.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/7s.jpg')}}"></a>
            <a href="assets/images/gallery/8.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/8s.jpg')}}"></a>
            <a href="assets/images/gallery/9.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/9s.jpg')}}"></a>
            <a href="assets/images/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/10s.jpg')}}"></a>
            <a href="assets/images/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/11s.jpg')}}"></a>
            <a href="assets/images/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/12s.jpg')}}"></a>
            <a href="assets/images/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/4s.jpg')}}"></a>
            <a href="assets/images/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/5s.jpg')}}"></a>
            <a href="assets/images/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/5s.jpg')}}"></a>
            <a href="assets/images/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/4s.jpg')}}"></a>
            <a href="assets/images/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/5s.jpg')}}"></a>
            <a href="assets/images/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/6s.jpg')}}"></a>
            <a href="assets/images/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/12s.jpg')}}"></a>
            <a href="assets/images/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/4s.jpg')}}"></a>
            <a href="assets/images/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/5s.jpg')}}"></a>
            <a href="assets/images/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/10s.jpg')}}"></a>
            <a href="assets/images/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="{{ asset('img/gallery/11s.jpg')}}"></a>
            <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
            <div id="blueimp-gallery" class="blueimp-gallery">
              <div class="slides"></div>
              <h3 class="title"></h3>
              <a class="prev">‹</a>
              <a class="next">›</a>
              <a class="close">×</a>
              <a class="play-pause"></a>
              <ol class="indicator"></ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
</div>
@endsection
