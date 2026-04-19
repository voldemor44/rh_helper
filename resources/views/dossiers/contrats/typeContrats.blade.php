@extends('layout.app')

@section('content')
    <div class="main-wrapper">


        <div class="page-wrapper">

            <div class="content container-fluid">


                {{--  <div class="row">

                </div>  --}}
                <div class="mt-2"></div>

                <section class="comp-section comp-cards" id="comp_cards align-items-center">
                    <h3 class="text-center">Type de contrat</h3>
                    <div class="mt-5"></div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 d-flex">
                            <div class="card flex-fill">
                                <img alt src="{{asset('assets/img/contrat/contrat4.jpg')}}" class="card-img-top">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Contrat à durée déterminée (CDD) </h5>
                                </div>
                                {{--  <div class="card-body">

                                    <a class="card-link text-center"  href="#">Editer</a>
                                </div>  --}}
                                <a  class="text-center" id="cdd" onclick="ChooseListContratUsers('cdd');">Editer</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 d-flex">
                            <div class="card flex-fill">
                                <img alt src="{{asset('assets/img/contrat/contrat6.jpg')}}" class="card-img-top">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Contrat à durée indeterminée (CDI) </h5>
                                </div>
                                {{--  <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the cards content.</p>
                                    <a class="btn btn-primary" href="#">Go somewhere</a>
                                </div>  --}}
                                <a  class="text-center" id="cdi" onclick="ChooseListContratUsers('cdi');">Editer</a>
                            </div>
                        </div>


                        <div class="col-12 col-md-6 col-lg-4 d-flex">
                            <div class="card flex-fill">
                                <img alt src="{{asset('assets/img/contrat/contrat7.jpg')}}" class="card-img-top" height="20%">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Contrat de prestation </h5>
                                </div>
                                {{--  <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Cras justo odio</li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Vestibulum at eros</li>
                                </ul>  --}}
                                <a class="text-center" id="cp" onclick="ChooseListContratUsers('cp');">Editer</a>
                            </div>
                        </div>



                        <div id="ChooseListContratUsers" class="modal custom-modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">A qui vous voulez-vous éditer ce contrat ? </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>

        </div>

    </div>
@endsection


@section('reeiveName_js')

<script>


</script>


@endsection
