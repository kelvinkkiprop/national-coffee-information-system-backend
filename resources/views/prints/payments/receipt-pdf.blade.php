<!DOCTYPE html>
<html>

<head>
    <title>KonzaOSS | Receipt</title>
    <style>
        @page {
            margin-top: 102px;
            margin-bottom: 21px;
        }

        @font-face {
            font-family: 'Tw Cen MT';
            /* src: url('{{ public_path('fonts/tw-cen-mt/TwCenMT-Regular.ttf') }}') format('truetype'); */
            src: url('{{ public_path('fonts/tw-cen-mt/TwCenMTStd.otf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Tw Cen MT', sans-serif;
            text-align: justify;
            text-justify: inter-word;       /* Standard */
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

        .left {
            text-align: left;
        }

        .center {
            text-align: center;
        }

        .right {
            /* text-align: right; */
            /* float: right; */
            text-align: right;
        }

        .m-1 {
            margin: 0.25rem;
        }

        .my-1 {
            margin: 0.5rem 0 0.5rem 0;
        }

        .my-2 {
            margin: 1.5rem 0 1.5rem 0 !important;
        }

        .mb-1 {
            margin-bottom: 0.25rem;
        }
        .py-4 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }

        .p-1 {
            padding: 0.25rem;
        }

        .px-2 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-1 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

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
            font-size: 13px;
        }
    </style>
</head>

<body>

    <header>
        <div class="my-1">
            <table class="w-100 mb-4 hidden-table-border">
                <thead>
                    <tr class="mb-4">
                        <th width="50%" align="left"><img id="logo" src="./images/logo_main.png" width="72" alt="Logo"></th>
                        <th width="50%" align="right">
                            Coffee Board of Kenya<br>
                            Tea House, Off Naivasha Road<br>
                            P.O. Box 37962-00100, Nairobi, Kenya<br>
                            EMAIL: info@coffeeboard.go.ke
                        </th>
                    </tr>
                    <tr>
                        <th class="py-4" colspan="2" align="center">
                            @if($item->status)
                                <span>{{ $item->status->alias }}</span>
                                @if($item->status_id==1)
                                    <small class="badge-danger">{{ $item->status->name }}</small>
                                @else
                                    <small class="badge-success">{{ $item->status->name }}</small>
                                @endif
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <th width="90%" align="left">
                            CLIENT INFORMATION<br>
                            @if($item->user)
                            {{ $item->user?->name }}<br>
                            {{ $item->user?->profile?->postal_address }}<br>
                            {{ $item->user?->profile?->physical_address }}<br>
                            {{ $item->user?->email }}<br>
                            @endif
                        </th>
                        <th width="10%" align="right">
                            Receipt No: @if($item->invoice_number){{ $item->invoice_number }}@endif<br>
                            Issued On: @if($item->created_at){{ $item->created_at->format('d/m/Y') }}<br>@endif
                            Settled At: @if($item->settled_at){{ Carbon\Carbon::parse($item->settled_at)->format('d/m/Y') }} @endif
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </header>


    <main>
        <div class="my-2">

            <div class="mb-4">
                <table class="w-100">
                    <thead class="bg-brown-100">
                        <tr>
                            <th class="text-uppercase">Item</th>
                            <th class="text-uppercase">Description</th>
                            <th class="text-uppercase">Qty</th>
                            <th class="text-uppercase">Price</th>
                            <th class="text-uppercase">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{ $item->service?->name }}</th>
                            <td>{{ $item->tariff?->name }}</td>
                            <td>1</td>
                            <td>{{ number_format($item->amount,0) }} x 1</td>
                            <td>{{ number_format($item->amount,0) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="my-2">
                <table class="table hidden-table-border" align="right">
                    <tbody>
                        <tr>
                            <td class="left"><strong>Subtotal</strong></td>
                            <td class="right">{{ $item->currency }}&nbsp;{{ number_format($item->amount,2) }}</td>
                        </tr>
                        <tr>
                            <td class="left"><strong>Convenience Fee</strong></td>
                            <td class="right">{{ $item->currency }}&nbsp;{{ number_format($item->convenience_fee,2) }}</td>
                        </tr>
                        <tr>
                            <td class="left"><strong>Total</strong></td>
                            <td class="right"><strong>{{ $item->currency }}&nbsp;{{ number_format($item->grand_total,2) }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

</body>
</html>
