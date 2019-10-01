@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ATEC GRS</div>
                    <iframe src="https://calendar.google.com/calendar/embed?height=1000&amp;wkst=2&amp;bgcolor=%23ffffff&amp;ctz=Europe%2FLisbon&amp;src=YXRlY2NhbGVuZGFyQGdtYWlsLmNvbQ&amp;color=%23039BE5&amp;showTz=0&amp;showCalendars=1&amp;showTabs=0&amp;showPrint=0&amp;mode=WEEK&amp;hl=pt_PT&amp;showTitle=0&amp;showNav=1&amp;showDate=1&amp;" style="border-width: 0; border-radius: 10px; border-style: solid; width: auto; height: 50vh" frameborder="1" scrolling="no"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
