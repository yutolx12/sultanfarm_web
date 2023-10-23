@extends('layouts.template')
@section('content')

<div class="page-title">
  <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
          <h4 class="py-3 mb-4 fw-normal" style="color: #228896">Monitoring Domba</h4>

      </div>
      <!-- <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route ('home')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Monitoring Domba</li>
              </ol>
          </nav>
      </div> -->
  </div>
    </div>
<div class="card">
    <div class="card-body">


<!--Card-->
<div class="col-lg-12">

    <div class="container text-center">
        <div class="row align-items-start">
          <div class="col">
            <video class="w-60" autoplay loop muted>
              <source src="{{ asset('video/sultan.mp4')}}" type="video/mp4"/>
            </video>
         <!--   <img src="{{ asset('landing/img/detaildomba.png') }}" class="rounded float-left" alt="Responsive image" width="550px"> -->
          </div>
          <div class="col">
            <div class="card border-secondary" style="background-color: #F3F3F3">
                <div class="card-body">
                  <p class="text-lg-start" style="font-size: 15px; color: #0B4149">Kode Domba</p>
                  <p class="text-lg-start" style="font-size: 15px; color: #228896">DX1234565678</p>
<br>
<p class="text-lg-start" style="font-size: 15px; color: #0B4149">Jenis Domba</p>
<p class="text-lg-start" style="font-size: 15px; color: #228896">Taxel</p>
<br>
<p class="text-lg-start" style="font-size: 15px; color: #0B4149">Tipe Domba</p>
<p class="text-lg-start" style="font-size: 15px; color: #228896">Trading</p>
<br>
<p class="text-lg-start" style="font-size: 15px; color: #0B4149">Usia Domba</p>
<p class="text-lg-start" style="font-size: 15px; color: #228896">3 Tahun</p>
<br>
<p class="text-lg-start" style="font-size: 15px; color: #0B4149">Bobot Domba</p>
<p class="text-lg-start" style="font-size: 15px; color: #228896">50 kg</p>
                    </div>
                  </div>


                </div>
              </div>
          </div> 
        </div>
      </div>
</div>



    </div>
</div>

@endsection