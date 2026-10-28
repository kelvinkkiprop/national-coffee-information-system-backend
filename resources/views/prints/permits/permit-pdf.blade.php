<!DOCTYPE html>
<html>

<head>
    <title>KonzaOSS | CPMS | Construction Permit</title>
    <style>
        @font-face {
            font-family: 'Tw Cen MT';
            /* src: url('{{ public_path('fonts/tw-cen-mt/TwCenMT-Regular.ttf') }}') format('truetype'); */
            src: url('{{ public_path('fonts/tw-cen-mt/TwCenMTStd.otf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @page {
            size: A4 potrait;
            margin: 20px;
        }

        html,body {
            font-family: 'Tw Cen MT', sans-serif;
            text-align: justify;
            text-align: left;
            font-weight: normal;
        }
        .page {
            background: #F4EBE1 !important;
            width: 100%;
            height: 282mm;
        }
        .page-break {
            page-break-after: always;
        }

        .border-brown {
            border: 3px solid #593A2C !important;
            border-radius: 0.8rem !important;
        }
        .m-1 {
            margin: 0.25rem;
        }

        .my-1 {
            margin: 0.5rem 0 0.5rem 0;
        }
        .m-2{
            margin: 1rem !important;
        }
        .my-2{
            margin-top: 1rem !important;
            margin-bottom: 1rem !important;
        }
        .my-4{
            margin-top: 2rem !important;
            margin-bottom: 2rem !important;
        }
        .p-2 {
            padding: 1rem !important;
        }
        .py-2 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }
        .text-justify {
            text-align: justify !important;
        }
        .text-lg{
            font-size: larger !important;
        }

        .row {
            width: 100%;
            clear: both;
        }
        .col-md-6 {
            display: inline-block;
            width: 48%;
            vertical-align: top;
            margin-bottom: 8px;
        }
        table{
            width: 100%;
        }
        table,
        th,
        td {
            padding: 8px;
            border: 0.5px solid #000;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <main>

        <div class="page border-brown">
            <!-- Page_1 -->
            <div class="m-2 p-2">
                <div class="my-2">
                    <div class="text-center">
                        <div>
                            <img class="my-1" id="logo" src="./images/logo_main.png" width="132" alt="Logo"/>
                            <h3 class="my-1">COFFEE BOARD OF KENYA</h3>
                            <h3 class="my-1"><span class="text-sm1">MOVEMENT PERMIT</span></h3>
                        </div>
                    </div>
                </div>
                <div class="my-2">
                    <p class="text-justify">
                        The Coffee Board of Kenya hereby authorizes <b><u>@if($item->user){{ $item->user?->name }}@endif</u></b>
                        @if($item->user?->profile)Address {{ $item->user?->profile?->postal_address }} {{ $item->user?->profile?->physical_address }}
                        County:<b><u>&nbsp;{{$item->user?->profile?->county?->name}}&nbsp;</u></b> Sub County:<b><u>&nbsp;{{$item->user?->profile?->subCounty?->name}}&nbsp;</u></b>
                        Ward:<b><u>&nbsp;{{$item->user?->profile?->ward?->name}}&nbsp;</u></b>Street Name:<b><u>&nbsp;{{$item->user?->profile?->street_name}}&nbsp;</u></b>
                        Plot Number:<b><u>&nbsp;{{$item->user?->profile?->plot_number}}&nbsp;</u></b>@endif
                        Permit No: <b><u>{{ $item->application_number }}</u></b> to move {{ $item->number_of_bags }} bags of {{ $item->coffeeSpecies?->name }}
                        {{ $item->coffeeForm?->alias }} from <b><u>{{ $item->origin }}</u></b> to <b><u>{{ $item->destination }}</u></b> by Road/Rail
                        for a distance of {{ $item->distance }}KM, Name of the Driver(s): <b><u>{{ $item->driver_name }}</u></b> and ID Number(s):
                        <b><u>{{ $item->driver_id_number }}</u></b> starting from {{ Carbon\Carbon::parse($item->effective_date)->format('dS F Y') }}.
                    </p>
                    <div class="my-2">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Effective Date:<b><u>&nbsp;{{ Carbon\Carbon::parse($item->effective_date)->format('dS F Y') }}&nbsp;</u></b></p>
                                <p>Expiry Date:<b><u>&nbsp;{{ Carbon\Carbon::parse($item->expiry_date)->format('dS F Y') }}&nbsp;</u></b></p>
                            </div>
                            <div class="col-md-6">
                                {{-- <p>Nature of Permit:<b><u>&nbsp;{{$item->type?->name}}&nbsp;</u></b></p> --}}
                                <p>Valid For:<b><u>&nbsp;{{$item->duration}} Days&nbsp;</u></b></p>
                                <p>Mark:<b><u>&nbsp;{{ $item->mark }}&nbsp;</u></b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <p class="text-justify">
                        <small><b>Notice:</b> This permit does not exempt the holder from complying with the Crops Act, the Coffee (General) Regulations,
                            and other applicable Kenyan laws and regulations governing coffee production, processing, and trade.</small>
                    </p>
                    <div class="row py-2 my-2">
                        <div class="col-md-6">
                            <div>
                                <br><br><br>
                                <span><b>Date Printed:</b></span> <br>
                                <span><b>{{ Carbon\Carbon::parse($date_printed)->format('dS-M-Y') }}</b></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <div class="text-center">
                                    <span style="display: inline-block; border-bottom: 2px dotted #000; line-height: 0;">
                                        &nbsp;&nbsp;&nbsp;<img src="./images/afa_calistus_fd_sign.png" width="86" alt="Sign"/>&nbsp;&nbsp;&nbsp;
                                    </span> <br>
                                    <span><b>Director General/CEO</b></span> <br>
                                    <span><b>Coffee Board of Kenya</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <div class="text-center">
                        <img src="data:image/svg+xml;base64,{{ $qr_code }}" alt="QR Code" width="100" height="100"> <br>
                        <b><small>Scan to Verify</small></b>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-break"></div>
        <div class="page">
            <!-- Page_2 -->
            <div class="p-2">
                <h3>TERMS &amp; CONDITIONS</h3>
                <table class="text-justify">
                    <tr>
                        <th>01</th>
                        <td>The permit holder shall comply with the Crops Act, the Coffee (General) Regulations, and all other applicable Kenyan laws and regulations governing the coffee industry.</td>
                    </tr>
                    <tr>
                        <th>02</th>
                        <td>The permit shall be used only for the approved purpose and activity.</td>
                    </tr>
                    <tr>
                        <th>03</th>
                        <td>The permit holder shall maintain accurate records and provide them to the relevant authorities upon request.</td>
                    </tr>
                    <tr>
                        <th>04</th>
                        <td>The permit shall not be transferred or assigned to another person or entity without prior written approval from the relevant authority.</td>
                    </tr>
                    <tr>
                        <th>05</th>
                        <td>The relevant authority reserves the right to inspect, suspend, or revoke the permit in the event of non-compliance with applicable laws and regulations.</td>
                    </tr>
                    <tr>
                        <th>06</th>
                        <td>The permit holder shall ensure that all coffee handled under this permit meets applicable quality, safety, traceability, and regulatory requirements.</td>
                    </tr>
                    <tr>
                        <th>07</th>
                        <td>This permit does not exempt the holder from obtaining any other licences or approvals required under Kenyan law.</td>
                    </tr>
                </table>
            </div>
        </div>

    </main>
</body>

</html>
