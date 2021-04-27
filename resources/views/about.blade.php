@extends('layout.default')
@section('content')
    <div class="row">
        <div class="col-xl-3">
            <!--begin::Nav Panel Widget 2-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Wrapper-->
                    <div class="d-flex justify-content-between flex-column pt-4 h-100">
                        <!--begin::Container-->
                        <div class="pb-5">
                            <!--begin::Header-->
                            <div class="d-flex flex-column flex-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-120 symbol-circle symbol-success overflow-hidden">
                                    <span class="symbol-label">
                                        <img src="{{ URL::asset('/media/me/klemen.png') }}" alt="" width="140px">
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Username-->
                                <a href="#" class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">Klemen Praznik</a>
                                <!--end::Username-->
                                <!--begin::Info-->
                                <div class="font-weight-bold text-dark-50 font-size-sm pb-6">Inženir informatike</div>
                                <div class="font-weight-bold text-dark-50 font-size-sm pb-6">3. letnik FRI VSŠ</div>
                                <!--end::Info-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="pt-1" style="text-align: justify">
                                <!--begin::Text-->
                                <p class="text-dark-75 font-weight-nirmal font-size-lg m-0 pb-7">Najraje programiram v programskem jeziku C#, imam pa široko znanje tehnologij na področju spletnih aplikacij kot so HTML, CSS, JavaScript (VueJS, jQuery), PHP, ASP .NET, .NET CORE.</p>
                                <!--end::Text-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--eng::Container-->
                        <!--begin::Footer-->
                        <div class="d-flex flex-center" data-toggle="tooltip" title="" data-placement="right" data-original-title="Moj email" href="mailTo:kp5207@student.uni-lj.si">
                            <a href="mailTo:kp5207@student.uni-lj.si" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14">Kontaktiraj me</a>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Nav Panel Widget 2-->
        </div>
        <div class="col-lg-9">
        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">
                    O projektu
                </h3>
            </div>
            <div class="card-body">
                <div>
                   Projekt pri predmetu Spletne tehnologije.
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
