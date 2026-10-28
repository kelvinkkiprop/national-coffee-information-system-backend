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
        u {
            /* text-decoration-style: dotted; */
            /* text-decoration: underline  !important;
            text-decoration-style: dashed  !important;
            text-decoration-thickness: 2px  !important;
            text-underline-offset: 4px  !important; */
            text-decoration: none !important;
            border-bottom: 2px dashed #000;
            padding-bottom: 2px;
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
                        The Coffee Board of Kenya hereby grants <b><u>@if($item->user){{ $item->user?->name }}@endif</u></b>
                        @if($item->user && $item->user->profile)
                            <b><u>&nbsp;{{ optional($item->user->profile)->postal_address }}&nbsp;</u></b>
                            <b><u>&nbsp;{{ optional($item->user->profile)->physical_address }}&nbsp;</u></b>
                        @endif
                        and authorizes the said applicant to facilitate Coffee growers (Unions, grower millers, associations, cooperative
                        societies) with direct coffee sales agency services in the Republic of Kenya for a period of one (1) year from
                        the <b><u>&nbsp;{{ Carbon\Carbon::parse($item->effective_date)->format('dS F Y') }}&nbsp;</u></b>
                        to <b><u>&nbsp;{{ Carbon\Carbon::parse($item->expiry_date)->format('dS F Y') }}&nbsp;</u></b> (Both days inclusive).
                    </p>
                    <div class="my-2">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Licence No.:<b><u>&nbsp;{{ $item->application_number }}&nbsp;</u></b></p>
                                <p>Issued On:<b><u>&nbsp;{{ Carbon\Carbon::parse($item->effective_date)->format('dS F Y') }}&nbsp;</u></b></p>
                            </div>
                            <div class="col-md-6">
                                <p>&nbsp;</p>
                                <p>Expiry Date:<b><u>&nbsp;{{ Carbon\Carbon::parse($item->expiry_date)->format('dS F Y') }}&nbsp;</u></b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <p class="text-justify">
                        <small><b>Notice:</b> This Licence is issued subject to compliance with the requirements for approval and the provisions
                            of the Coffee (General) Regulations, 2019 currently in force and the Rules made thereunder and to such conditions as
                            are stipulated herein.The Agent shall maintain professionalism at all times.</small>
                    </p>
                    <div class="row py-2 my-2">
                        <div class="col-md-6">
                            <div>
                                <br><br>
                                <span><b>Date Printed:</b></span> <br>
                                <span><b>{{ Carbon\Carbon::parse($date_printed ?? '')->format('dS-M-Y') }}</b></span>
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
                        <img src="data:image/svg+xml;base64,{{ $qr_code ?? '' }}" alt="QR Code" width="100" height="100"> <br>
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
                        <td>The Agent shall not engage in any business that is contrary to the provisions of the Coffee Regulation;</td>
                    </tr>
                    <tr>
                        <th>02</th>
                        <td>The Agent shall comply with the Coffee Industry Code of Practice and Standards;</td>
                    </tr>
                    <tr>
                        <th>03</th>
                        <td>The Agent shall allow free access to the premises by the inspectors authorized by the Authority or county government;</td>
                    </tr>
                    <tr>
                        <th>04</th>
                        <td>The Authority may vary, suspend or revoke the Agent's licence issued if the holder fails to abide with the terms and conditions of the licence;</td>
                    </tr>
                    <tr>
                        <th>05</th>
                        <td>The Agent shall remit monthly returns to the Authority;</td>
                    </tr>
                    <tr>
                        <th>06</th>
                        <td>The Agent's licence shall not be transferable; and</td>
                    </tr>
                    <tr>
                        <th>07</th>
                        <td>Any other requirements that may be given by the authority from time to time.</td>
                    </tr>
                </table>
            </div>
        </div>

    </main>
</body>

</html>
