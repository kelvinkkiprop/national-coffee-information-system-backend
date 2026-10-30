<!DOCTYPE html>
<html>

<head>
    <title>KonzaOSS | Receipt</title>
    <style>
        @page {
            margin-top: 86px;
            margin-bottom: 24px;
        }

        @font-face {
            font-family: 'DM_Sans';
            /* src: url('{{ public_path('fonts/tw-cen-mt/TwCenMT-Regular.ttf') }}') format('truetype'); */
            src: url('{{ public_path('fonts/DM_Sans/DMSans-Medium.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'DM_Sans', sans-serif;
            text-align: justify;
            text-justify: inter-word;       /* Standard */
        }
        body::before {
            content: "";
            position: fixed;
            top: 50%;
            left: 50%;
            width: 400px;
            height: 400px;
            background: url('./images/coffee_board_logo.png') no-repeat center;
            background-size: contain;
            opacity: 0.08;
            transform: translate(-50%, -50%);
            pointer-events: none;
            z-index: -1;
        }

        footer {
            left: 0;
            right: 0;
        }

        .content {
            margin-top: 20px;
        }

        .col-print-1 {
            width: 8%;
            float: left;
        }

        .col-print-2 {
            width: 16%;
            float: left;
        }

        .col-print-3 {
            width: 25%;
            float: left;
        }

        .col-print-4 {
            width: 33%;
            float: left;
        }

        .col-print-5 {
            width: 42%;
            float: left;
        }

        .col-print-6 {
            width: 50%;
            float: left;
        }

        .col-print-7 {
            width: 58%;
            float: left;
        }

        .col-print-8 {
            width: 66%;
            float: left;
        }

        .col-print-9 {
            width: 75%;
            float: left;
        }

        .col-print-10 {
            width: 83%;
            float: left;
        }

        .col-print-11 {
            width: 92%;
            float: left;
        }

        .col-print-12 {
            width: 100%;
            float: left;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            /* text-align: right; */
            /* float: right; */
            text-align: right;
        }

        .m-0  { margin: 0 !important; }
        .m-1  { margin: 0.25rem !important; }
        .m-2  { margin: 0.5rem !important; }
        .m-3  { margin: 1rem !important; }
        .m-4  { margin: 1.5rem !important; }
        .m-5  { margin: 3rem !important; }

        .mt-0 { margin-top: 0 !important; }
        .mt-1 { margin-top: 0.25rem !important; }
        .mt-2 { margin-top: 0.5rem !important; }
        .mt-3 { margin-top: 1rem !important; }
        .mt-4 { margin-top: 1.5rem !important; }
        .mt-5 { margin-top: 3rem !important; }

        .mb-0 { margin-bottom: 0 !important; }
        .mb-1 { margin-bottom: 0.25rem !important; }
        .mb-2 { margin-bottom: 0.5rem !important; }
        .mb-3 { margin-bottom: 1rem !important; }
        .mb-4 { margin-bottom: 1.5rem !important; }
        .mb-5 { margin-bottom: 3rem !important; }

        .ms-0 { margin-left: 0 !important; }
        .ms-1 { margin-left: 0.25rem !important; }
        .ms-2 { margin-left: 0.5rem !important; }
        .ms-3 { margin-left: 1rem !important; }
        .ms-4 { margin-left: 1.5rem !important; }
        .ms-5 { margin-left: 3rem !important; }

        .me-0 { margin-right: 0 !important; }
        .me-1 { margin-right: 0.25rem !important; }
        .me-2 { margin-right: 0.5rem !important; }
        .me-3 { margin-right: 1rem !important; }
        .me-4 { margin-right: 1.5rem !important; }
        .me-5 { margin-right: 3rem !important; }

        .mx-0 { margin-left: 0 !important; margin-right: 0 !important; }
        .mx-1 { margin-left: 0.25rem !important; margin-right: 0.25rem !important; }
        .mx-2 { margin-left: 0.5rem !important; margin-right: 0.5rem !important; }
        .mx-3 { margin-left: 1rem !important; margin-right: 1rem !important; }
        .mx-4 { margin-left: 1.5rem !important; margin-right: 1.5rem !important; }
        .mx-5 { margin-left: 3rem !important; margin-right: 3rem !important; }

        .my-0 { margin-top: 0 !important; margin-bottom: 0 !important; }
        .my-1 { margin-top: 0.25rem !important; margin-bottom: 0.25rem !important; }
        .my-2 { margin-top: 0.5rem !important; margin-bottom: 0.5rem !important; }
        .my-3 { margin-top: 1rem !important; margin-bottom: 1rem !important; }
        .my-4 { margin-top: 1.5rem !important; margin-bottom: 1.5rem !important; }
        .my-5 { margin-top: 3rem !important; margin-bottom: 3rem !important; }

        .p-0  { padding: 0 !important; }
        .p-1  { padding: 0.25rem !important; }
        .p-2  { padding: 0.5rem !important; }
        .p-3  { padding: 1rem !important; }
        .p-4  { padding: 1.5rem !important; }
        .p-5  { padding: 3rem !important; }

        .pt-0 { padding-top: 0 !important; }
        .pt-1 { padding-top: 0.25rem !important; }
        .pt-2 { padding-top: 0.5rem !important; }
        .pt-3 { padding-top: 1rem !important; }
        .pt-4 { padding-top: 1.5rem !important; }
        .pt-5 { padding-top: 3rem !important; }

        .pb-0 { padding-bottom: 0 !important; }
        .pb-1 { padding-bottom: 0.25rem !important; }
        .pb-2 { padding-bottom: 0.5rem !important; }
        .pb-3 { padding-bottom: 1rem !important; }
        .pb-4 { padding-bottom: 1.5rem !important; }
        .pb-5 { padding-bottom: 3rem !important; }

        .ps-0 { padding-left: 0 !important; }
        .ps-1 { padding-left: 0.25rem !important; }
        .ps-2 { padding-left: 0.5rem !important; }
        .ps-3 { padding-left: 1rem !important; }
        .ps-4 { padding-left: 1.5rem !important; }
        .ps-5 { padding-left: 3rem !important; }

        .pe-0 { padding-right: 0 !important; }
        .pe-1 { padding-right: 0.25rem !important; }
        .pe-2 { padding-right: 0.5rem !important; }
        .pe-3 { padding-right: 1rem !important; }
        .pe-4 { padding-right: 1.5rem !important; }
        .pe-5 { padding-right: 3rem !important; }

        .px-0 { padding-left: 0 !important; padding-right: 0 !important; }
        .px-1 { padding-left: 0.25rem !important; padding-right: 0.25rem !important; }
        .px-2 { padding-left: 0.5rem !important; padding-right: 0.5rem !important; }
        .px-3 { padding-left: 1rem !important; padding-right: 1rem !important; }
        .px-4 { padding-left: 1.5rem !important; padding-right: 1.5rem !important; }
        .px-5 { padding-left: 3rem !important; padding-right: 3rem !important; }

        .py-0 { padding-top: 0 !important; padding-bottom: 0 !important; }
        .py-1 { padding-top: 0.25rem !important; padding-bottom: 0.25rem !important; }
        .py-2 { padding-top: 0.5rem !important; padding-bottom: 0.5rem !important; }
        .py-3 { padding-top: 1rem !important; padding-bottom: 1rem !important; }
        .py-4 { padding-top: 1.5rem !important; padding-bottom: 1.5rem !important; }
        .py-5 { padding-top: 3rem !important; padding-bottom: 3rem !important; }

        .w-100 {
            width: 100%
        }

        .border-2 {
            border: 1.5px solid black;
        }

        table,
        th,
        td {
            padding: 4px;
            border: 0.5px solid #000;
            border-collapse: collapse;
        }

        th {
            white-space: nowrap;
        }


        .hidden-table-border {
            border-collapse: collapse !important;
            border: none !important;
        }

        .hidden-table-border th,
        .hidden-table-border td {
            border: none !important;
        }

        .hidden-table-border2 th,
        .hidden-table-border2 td {
            border: 1px solid #FFFFFF !important;
            border-collapse: collapse !important;
        }

        .hidden-table-border2 {
            border: 1px !important;
        }

        .borderless-table,
        .borderless-table th,
        .borderless-table td {
            border: none !important;
            border-top: 1px solid #000 !important;
            border-left: none !important;
            border-right: none !important;
            border-bottom: none !important;
            outline: none;
            box-shadow: none;
            padding: 8px;
        }
        .borderless-table {
            width: 100%;
            border-collapse: collapse;
        }
        .totals-row td {
            border: none !important;
        }
        .totals-row td:nth-child(n+3) {
            border-top: 1px solid #000 !important;
        }

        .right {
            text-align: right;
        }

        a {
            color: #593A2C;
            text-decoration: none;
        }

        .bg-brown-100 {
            background-color: #593A2C;
            color: #FFFFFF;
            radius: 0.25rem;
        }
       .badge-success {
            display: inline-block;
            background-color: #198754;
            color: #FFFFFF;
            padding: 0.25rem 0.6rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 500;
        }
        .badge-danger {
            display: inline-block;
            background-color: #E2251D;
            color: #FFFFFF;
            padding: 0.25rem 0.6rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .bg-dark {
            background-color: #000000;
        }

        .text-white {
            color: #FFFFFF;
        }

        .text-success {
            color: #593A2C;
        }

        .text-black {
            color: #000000;
        }
        .text-danger{
            color: #E2251D !important;
        }
        .text-muted {
            color: #6c757d !important;
        }
        .text-uppercase {
            text-transform: uppercase;
        }

        .underline {
            border-bottom: 1px solid #000;
        }

        .fw-bolder {
            font-weight: bolder;
            font-size: 24px !important;
        }

        .text-justify {
            text-align: justify !important;
            text-justify: inter-word !important;
        }

        .text-xs {
            font-size: 11px;
        }

        .text-sm {
            font-size: 12px;
        }
        .text-xs {
            font-size: 10px;
        }
        .text-xxs {
            font-size: 8px;
        }
    </style>
</head>

<body>

    <header>
        <div class="my-2">
            <div class="row">
                <div class="col-print-2">
                    <img id="logo" src="./images/coffee_board_logo.png" width="102" alt="Logo">
                </div>
                <div class="col-print-10">
                    <div class="my-3">
                        <h2 class="p-0 m-0">Coffee Board of Kenya</h2>
                        <div class="p-0 m-0 text-muted">
                            P.O. Box 30566 - 00100, Nairobi <br>
                            Tel: 0718 770000 / 0100 55000
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-4">
            <br><br><br><br><br>
            <div class="text-center">
                @if($item->status)
                    <h1 class="text-uppercase">{{ $item->status->alias }}</h1>
                @endif
            </div>
        </div>
        <div class="my-4">
            <table class="w-100 mb-4 hidden-table-border">
                <thead>
                    <tr>
                        <td width="50%" align="left">
                            <p><strong>BILLED TO:</strong></p>
                            @if($item->user)
                            <div class="text-muted">
                                <p class="m-0 p-0 text-uppercase">{{ $item->user?->name }}</p>
                                <p class="m-0 p-0">{{ $item->user?->email }}</p>
                                <p class="m-0 p-0">{{ $item->user?->profile?->phone_number }}</p>
                            </div>
                            @endif
                        </td>
                        <td width="50%" align="right">
                            <div class="text-muted">
                                <p class="m-0 p-0">@if($item->status){{ $item->status->alias }}@endif No: @if($item->invoice_number){{ $item->invoice_number }}@endif</p>
                                <p class="m-0 p-0">@if($item->created_at){{ $item->created_at->format('F d, Y') }}@endif</p>
                                <p class="m-0 p-0">Reference No: @if($item->pesaflow_invoice_number){{ $item->pesaflow_invoice_number }}@endif</p>
                            </div>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
    </header>


    <main>
        <div class="my-2">
            <div class="mb-4">
                <table class="borderless-table w-100">
                    <thead>
                        <tr>
                            <td><strong>Item</strong></td>
                            <td><strong>Quantity</strong></td>
                            <td><strong>Unit Price</strong></td>
                            <td><strong>Total</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $item->service?->name }} ({{ $item->tariff?->name }})</td>
                            <td>1</td>
                            <td>{{ $item->currency}}&nbsp;{{ number_format($item->amount,2) }}</td>
                            <td>{{ $item->currency}}&nbsp;{{ number_format($item->amount,2) }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><strong>Subtotal</strong></td>
                            <td>
                                <strong>{{ $item->currency }}&nbsp;{{ number_format($item->amount, 2) }}</strong>
                            </td>
                        </tr>
                        <tr class="totals-row">
                            <td></td>
                            <td></td>
                            <td><h3>Total</h3></td>
                            <td>
                                <h3>{{ $item->currency }}&nbsp;{{ number_format($item->amount, 2) }}</h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-right">
                    <p class="p-0 m-0 text-muted text-sm"><i>{{ $amount_in_words }}</i></p>
                    <p class="p-0 m-0 text-danger" style="font-size: 24px; font-weight: 400; letter-spacing: 6px; opacity: 0.3;">
                        @if($item->status_id==1) UNPAID  @else PAID @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="my-2">
            <p class="p-0 m-0">
                <h3 class="p-0 m-0">Thank you!</h3>
            </p>
        </div>
        <div class="my-2">
            <hr style="border-top: 0.2px solid; opacity: 0.1;">
            <p class="text-muted p-0 m-0">
                <small class="text-xs">This document is computer generated and therefore not signed. It is a valid document issued under the authority of the Coffee Board of Kenya.</small>
            </p>
        </div>
        <div class="my-2">
            <table class="w-100 mb-4 hidden-table-border">
                <thead>
                    <tr>
                        <td align="left">
                            <p class="m-0 p-0"><strong>PAYMENT INFORMATION</strong></p>
                            <div>
                                <p class="m-0 p-0">eCitizen:<strong> eCitizen Payments</strong></p>
                                <p class="m-0 p-0">M-Pesa Paybill:<strong> 222222</strong></p>
                                <p class="m-0 p-0">Account No:<strong> @if($item->pesaflow_invoice_number){{ $item->pesaflow_invoice_number }}@endif</strong></p>
                            </div>
                        </td>
                        <td align="right">
                            <div class="text-right my-3">
                                <img src="data:image/svg+xml;base64,{{ $qr_code ?? '' }}" alt="QR Code" width="100" height="100">
                            </div>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
    </main>

</body>
</html>
