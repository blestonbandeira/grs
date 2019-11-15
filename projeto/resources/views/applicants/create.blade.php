@extends('layouts.app')

@section('content')

<div class="modal fade modalCalendar" style="width: 98vw !important; margin: 15px;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 100vw!important; margin: 15px;">
        <div class="modal-content d-flex justify-content-end" style="width: 95.5vw!important;">
            <div class="container-fluid" style="width: 90vw!important;">
                <button id="btnCloseModalFromInterviews" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style=" margin-top: 7px;background: #0089f2; border-radius: 17px; color: #fff; border: transparent; padding: 2px 10px 2px 10px;" aria-hidden="true">&times;</span>
                </button>
                <div class="row" style="width: 90vw!important;">
                    <div id="modalSuccessMessage" class="container-fluid" style="visibility:hidden; border-radius:10px; border: 1px solid #0089f2!important; padding: 50px; width: 26.7vw!important; position:absolute; z-index:100; background-color:white;">
                    </div>
                            
                    <div id="applicantListFromInterviews" class="col-md-2">
                    </div>
                    <div id="modalTime" class="col-md-10">
                        <div class="container" style="margin: 15px;">
                            <div id="calendar" style="width: 74vw!important;"></div>
                        </div>
                        <div id="hoursShowFromInterviews" class="container-fluid modal fade modalHours" style="width: 55vw!important;" role="dialog">
                            <div class="row">
                                <div>
                                    <ul id="interSelected">

                                    </ul>
                                </div>

                                <div class="col-md-1">
                                    <select id="hourSelectChange" class="form-control" style="width: 50px;">
                                    </select>
                                </div>

                                <div class="col-md-1">
                                    <b>:</b>
                                </div>

                                <div class="col-md-1">
                                    <select id="minSelectChange" class="form-control" style="width: 50px;">
                                    </select>
                                </div>

                                <div class="col-md-1">
                                    <b>h</b>
                                </div>
                                <div class="col">
                                    <button class="btn btn-info" onclick="saveInterview()">Guardar</button>
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