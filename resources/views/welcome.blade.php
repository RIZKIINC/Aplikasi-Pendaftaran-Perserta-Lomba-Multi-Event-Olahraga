@extends('landing.layouts.master')
<style>


.modal-kegiatan .modal-dialog {
    max-width: 100%;
    margin: 0;
}

.modal-kegiatan > .modal-content {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background-color: #f8f9fa;
    border: none;
}

.modal-kegiatan > .modal-header {
    background-color: #343a40;
    color: #fff;
    padding: 15px;
    border-bottom: none;
}

.modal-kegiatan > .modal-header h4 {
    font-size: 24px;
    margin-bottom: 0;
}

.modal-kegiatan > .modal-body {
    flex-grow: 1;
    padding: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-kegiatan > .modal-body .row {
    margin-bottom: 20px;
}

.modal-kegiatan > .modal-body .col-md-6 {
    padding: 0 15px;
}

.modal-kegiatan > .modal-body h4 {
    font-size: 24px;
    margin-bottom: 10px;
}

.modal-kegiatan > .modal-body p {
    margin-bottom: 0;
}
.event-info-item {
}
.event-info-item {
    background: #939e99;
    padding: 10px;
    color: white;
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.event-info-item i {
    margin-right: 10px;
    color: #343a40;
    font-size: 44px;
    display: none !important;
}

.event-info-item p {
    margin: 0;
}


.modal-footer {
    background-color: #f8f9fa;
    border-top: none;
    padding: 15px;
    text-align: right;
}

.modal-footer button {
    color: #fff;
    background-color: #343a40;
    border: none;
    border-radius: 4px;
    padding: 8px 16px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.modal-footer button:hover {
    background-color: #555;
}

.modal-body img {
    width: 100%;
    height: auto;
    border-radius: 5px;
}
</style>
@section('content')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Multi Event!</div>
            <div class="masthead-heading text-uppercase">Lets grow with us</div>
            {{-- <a class="btn btn-primary btn-xl text-uppercase" href="/pendaftaran">Register</a> --}}
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Kegiatan</h2>
            </div>
            <div class="row text-center">
                @foreach($events as $key => $event)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#myModal{{ $key+1 }}">
                                {{-- <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div> --}}
                                <img class="img-fluid" src="{{ $event->image ? Storage::disk('local')->url('images/event/'. $event->image) : asset('landing/assets/img/portfolio/1.jpg') }}"/>
                            </a>

                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">{{ $event->title }}</div>
                                <div class="portfolio-caption-subheading text-muted">{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }} </div>
                            </div>
                        </div>
                    </div>


        <!-- Modal -->
        <div class="modal fade" id="myModal{{ $key+1 }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>{{ $event->title }}</h4>
                                <p>{!! $event->description !!}</p>
                            </div>
                            <div class="col-md-6">
                                <div class="event-info">
                                    <div class="event-info-item">
                                        <i class="fas fa-calendar-alt"></i> &nbsp;
                                        <p>Tanggal: {{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</p>
                                    </div>
                                    <div class="event-info-item">
                                        <i class="fas fa-map-marker-alt"></i> &nbsp;
                                        <p>Lokasi: {{ $event->location }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{ $event->image ? Storage::disk('local')->url('images/event/'. $event->image) : asset('landing/assets/img/portfolio/1.jpg') }}" alt="Gambar Kejuaraan Pencak Silat" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
                @endforeach
            </div>
        </div>

    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Berita</h2>
            </div>
            <div class="row">
                @foreach($news as $key => $new)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal{{ $key+1 }}">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ $new->image ? Storage::disk('local')->url('images/news/'. $new->image) : asset('landing/assets/img/portfolio/1.jpg') }}"/>
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">{{ $new->title }}</div>
                            <div class="portfolio-caption-subheading text-muted">{{ $new->created_at->format('d M Y') }}</div>
                        </div>
                    </div>
                </div>
                <div class="portfolio-modal modal fade" id="portfolioModal{{ $key+1 }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-bs-dismiss="modal"><img src="{{ asset('landing/assets/img/close-icon.svg') }}" alt="Close modal" /></div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="modal-body">
                                            <!-- Project details-->
                                            <h2 class="text-uppercase">{{ $new->title }}</h2>
                                            <p class="item-intro text-muted">{{ date('d-m-Y H:i', strtotime($new->created_at)) }}</p>
                                            <img class="img-fluid d-block mx-auto" src="{{ $new->image ? Storage::disk('local')->url('images/news/'. $new->image) : asset('landing/assets/img/portfolio/1.jpg') }}"/>
                                            <p>{!! $new->description !!}</p>
                                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                <i class="fas fa-xmark me-1"></i>
                                                Tutup
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Developer</h2>
                </div>
                <div class="row">
                    @foreach($teams as $team)
                    <div class="{{ $team->order == '1' ? 'col-12' : 'col-lg-4' }}">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{ $team->image ? Storage::disk('local')->url('images/team/'. $team->image) : asset('landing/assets/img/team/1.jpg') }}"/>
                            <h4>{{ $team->name }}</h4>
                            <p class="text-muted">{{ $team->position }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row p-4" style="background: #EDEDED;">
                    <div class="col-lg-8 mx-auto text-center">
                        <h2>Koni</h2>
                        <p class="text-muted">
                            <b>Komite Olahraga Nasional Indonesia (KONI)</b> adalah satu-satunya organisasi yang berwenang dan bertanggung jawab mengelola,membina, mengembangkan & mengkoordinasikan seluruh pelaksanaan kegiatan olahraga prestasi setiap anggota di Indonesia.
                        </p>
                    </div>

                    <hr>
                    <div class="col-lg-8 mx-auto text-center">
                        <h2>Anggota</h2>
                        <p class="text-muted">
                            <b>KONI memiliki anggota  34 KONI Provinsi, yang membawahi 514 KONI Kabupaten/Kota, 71 organisasi induk cabang olahraga dan 6 organisasi fungsional.
                        </p>
                    </div>
                </div>
            </div>
        </section>
@endsection
