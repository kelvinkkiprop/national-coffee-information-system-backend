<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>NCIS | Template</title>
        <style>
            @page {
                size: A4;
                margin: 12px;
            }
            @font-face {
                font-family: 'DM_Sans';
                /* src: url('{{ public_path('fonts/tw-cen-mt/TwCenMT-Regular.ttf') }}') format('truetype'); */
                src: url('{{ public_path('fonts/DM_Sans/DMSans-Medium.ttf') }}') format('truetype');
                font-weight: normal;
                font-style: normal;
            }
            body {
                margin:0;
                padding:0;
                font-family: 'DM_Sans', sans-serif;
                /* font-family: DejaVu Sans,
                Arial, sans-serif;
                color:#26332b; */
                width:100%;
                /* height:297mm; */
                /* font-size:8.2pt; */
            }
            body::before {
                content: "";
                position: fixed;
                width: 100%;
                height: 100%;
                /* background:url('{{ public_path('images/coffee_board_logo.png') }}') no-repeat center; */
                background: url('./images/coffee_beans_background_image.png') no-repeat center;
                background-size: contain;
                z-index: -1;
            }
            .page {
                width: 100%;
                height: 286mm;
            }
            footer {
                position: absolute;
                bottom: 4mm;
                left: -0 !important;
                right: -4px !important;
                width: auto;
            }

            .border-success {
                border: 3px solid #1d5b32;
            }
            .border-danger {
                border: 1px solid #9b1d2d;
            }
            .border-bottom-red {
                border-bottom: 3px solid #9b1d2d;
            }
             .border-top-red {
                border-top: 3px solid #9b1d2d;
            }
            .border-outline-red {
                outline: 1px solid #9b1d2d;
                outline-offset: -6px;
            }
            .bg-success {
                background-color: #1d5b32 !important;
            }
            .bg-danger {
                background-color: #9b1d2d !important;
            }
            .bg-light {
                background-color: #ffffff !important;
            }
            .text-success {
                color: #1d5b32 !important;
            }
            .text-danger {
                color: #9b1d2d !important;
            }
            .text-dark {
                color: #000000 !important;
            }
            .text-warning {
                color: #e7d9b9 !important; //#c99b55;
            }
            .text-light {
                color: #ffffff !important;
            }
            .text-muted {
                color: #6c757d !important;
            }

            .text-uppercase{
                text-transform: uppercase;
            }
            .text-capitalize{
                text-transform: capitalize;
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

            .row-print {
                display: table;
                width: 100%;
                table-layout: fixed;
                border-collapse: collapse;
            }
            .row-print > [class*="col-print-"] {
                display: table-cell;
                vertical-align: top;
                box-sizing: border-box;
                padding: 0 5px;
            }
            .col-print-1  {
                width: 8.33333333% !important;
            }
            .col-print-2  {
                width: 16.66666667% !important;
            }
            .col-print-3  {
                width: 25% !important;
            }
            .col-print-4  {
                width: 33.33333333% !important;
            }
            .col-print-5  {
                width: 41.66666667% !important;
            }
            .col-print-6  {
                width: 50% !important;
            }
            .col-print-7  {
                width: 58.33333333% !important;
            }
            .col-print-8  {
                width: 66.66666667% !important;
            }
            .col-print-9  {
                width: 75% !important;
            }
            .col-print-10 {
                width: 83.33333333% !important;
            }
            .col-print-11 {
                width: 91.66666667% !important;
            }
            .col-print-12 {
                width: 100% !important;
            }

            .rounded-0 {
                border-radius: 0;
            }
            .rounded-1 {
                border-radius: 0.25rem;
            }
            .rounded-2 {
                border-radius: 0.375rem;
            }
            .rounded-3 {
                border-radius: 0.5rem;
            }
            .rounded-4 {
                border-radius: 1rem;
            }
            .rounded-5 {
                border-radius: 2rem;
            }
            .rounded-circle {
                border-radius: 50%;
            }
            .rounded-top-5 {
                border-top-left-radius: 1.7rem;
                border-top-right-radius: 1.7rem;
            }
            .rounded-bottom-5 {
                border-bottom-left-radius: 1.7rem;
                border-bottom-right-radius: 1.7rem;
            }

            .m-0  {
                margin: 0 !important;
            }
            .m-1  {
                margin: 0.25rem !important;
            }
            .m-2  {
                margin: 0.5rem !important;
            }
            .m-3  {
                margin: 1rem !important;
            }
            .m-4  {
                margin: 1.5rem !important;
            }
            .m-5  {
                margin: 3rem !important;
            }
            .my-0 {
                margin-top: 0 !important;
                margin-bottom: 0 !important;
            }
            .my-1 {
                margin-top: 0.25rem !important;
                margin-bottom: 0.25rem !important;
            }
            .my-2 {
                margin-top: 0.5rem !important;
                margin-bottom: 0.5rem !important;
            }
            .my-3 {
                margin-top: 1rem !important;
                margin-bottom: 1rem !important;
            }
            .my-4 {
                margin-top: 1.5rem !important;
                margin-bottom: 1.5rem !important;
            }
            .my-5 {
                margin-top: 3rem !important;
                margin-bottom: 3rem !important;
            }
            .p-0  {
                padding: 0 !important;
            }
            .p-1  {
                padding: 0.25rem !important;
            }
            .p-2  {
                padding: 0.5rem !important;
            }
            .p-3  {
                padding: 1rem !important;
            }
            .p-4  {
                padding: 1.5rem !important;
            }
            .p-5  {
                padding: 3rem !important;
            }
            .py-0 {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }
            .px-1 {
                padding-left: 0.25rem !important;
                padding-right: 0.25rem !important;
            }
            .px-2 {
                padding-left: 0.5rem !important;
                padding-right: 0.5rem !important;
            }
            .px-3 {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
            .px-4 {
                padding-left: 1.5rem !important;
                padding-right: 1.5rem !important;
            }
            .px-5 {
                padding-left: 3rem !important;
                padding-right: 3rem !important;
            }
            .py-0 {
                padding-top: 0 !important;
                padding-right: 0 !important;
            }
            .py-1 {
                padding-top: 0.25rem !important;
                padding-bottom: 0.25rem !important;
            }
            .py-2 {
                padding-top: 0.5rem !important;
                padding-bottom: 0.5rem !important;
            }
            .py-3 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important;
            }
            .py-4 {
                padding-top: 1.5rem !important;
                padding-bottom: 1.5rem !important;
            }
            .py-5 {
                padding-top: 3rem !important;
                padding-bottom: 3rem !important;
            }

            .alert {
                position: relative;
                /* padding: 0.75rem 1rem; */
                padding: 0.35rem 0.5rem;
                /* margin-bottom: 1rem; */
                margin-bottom: 0.5rem;
                border: 1px solid transparent;
                border-radius: 0.375rem;
                box-sizing: border-box;
            }
            .alert-success {
                color: #0f5132;
                background-color: #d1e7dd;
                border-color: #badbcc;
            }
            .alert-danger {
                color: #842029;
                background-color: #f8d7da;
                border-color: #f5c2c7;
            }

            .container {
                width: 100%;
                padding-right: 12px;
                padding-left: 12px;
                margin-right: auto;
                margin-left: auto;
                box-sizing: border-box;
            }
            fieldset {
                border: 1px solid #d1e7dd;
            }
            .logo-wrapper {
                display: inline-block;
                max-width: 100%;
                overflow: hidden;
                padding: 5px;
                box-sizing: border-box;
            }
            .dotted-underline {
                display: inline-block;
                border-bottom: 1.2px dashed #d1e7dd;
                padding-bottom: 1.2px;
                line-height: normal;
            }
        </style>
    </head>
    <body>
        <main class="page rounded-5 border-success border-outline-red">
            <header class="bg-success rounded-top-5 text-light border-bottom-red py-2">
                <div class="row-print">
                    <div class="col-print-2 text-center">
                        <div class="logo-wrapper bg-light rounded-circle border-danger">
                            <img id="logo" src="./images/coffee_board_logo.png" width="86" height="86" alt="Logo">
                        </div>
                    </div>
                    <div class="col-print-8">
                        <div class="my-4">
                            <h2 class="m-0 text-uppercase">Coffee Board of Kenya</h2>
                            <h4 class="m-0 text-warning"><i>Our Coffee, Our Heritage</i></h4>
                        </div>
                    </div>
                    <div class="col-print-2 text-center">
                        <div class="logo-wrapper bg-light rounded-5 border-danger">
                            <img id="logo" src="./images/mark_of_origin.png" width="102" height="86" alt="Mark of Origin">
                        </div>
                    </div>
                </div>
            </header>
            <section>
                <div>
                    <div class="text-center my-3">
                        <h6 class="m-0">THE COFFEE ACT (No. 8 of 2026)</h6>
                        <h6 class="m-0 text-muted">THE COFFEE (GENERAL) REGULATIONS, 2026</h6>
                        <h2 class="m-0 text-success">COFFEE BUYER'S LICENSE</h2>
                    </div>
                    <div class="container row-print">
                        <div class="col-print-3">
                            <div class="alert alert-success rounded-5">
                                <p class="m-0 text-muted text-sm">License No</p>
                                <h5 class="m-0 text-dark">{{ $item->application_number }}</h5>
                            </div>
                        </div>
                        <div class="col-print-3">
                            <div class="alert alert-success">
                                <p class="m-0 text-muted text-sm">Valid From</p>
                                <h5 class="m-0 text-dark">{{ Carbon\Carbon::parse($item->effective_date)->format('d M, Y') }}</h5>
                            </div>
                        </div>
                        <div class="col-print-3">
                            <div class="alert alert-success">
                                <p class="m-0 text-muted text-sm">Valid To</p>
                                <h5 class="m-0 text-dark">{{ Carbon\Carbon::parse($item->expiry_date)->format('d M, Y') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="container row-print">
                        <div class="col-print-12">
                            <fieldset class="my-4">
                                <legend class="bg-success text-light rounded-4 px-2">
                                    <h5 class="m-0 py-1 px-4 text-uppercase">Applicant</h5>
                                </legend>
                                <div class="my-2">
                                    <div class="row-print">
                                        <div class="col-print-6">
                                            <p class="m-1"><span class="text-muted">Name:</span>&nbsp;<span class="dotted-underline text-capitalize">&nbsp;{{ $item->user?->name }}</u></p>
                                            <p class="m-1"><span class="text-muted">Email:</span> <span class="dotted-underline text-capitalize">&nbsp;{{ $item->user?->email }}</u></p>
                                            <p class="m-1"><span class="text-muted">Town/City:</span>&nbsp;<span class="dotted-underline text-capitalize">&nbsp;{{ $item->user?->profile?->town }}</u></p>
                                            <p class="m-1"><span class="text-muted">County:</span>&nbsp;<span class="dotted-underline text-capitalize">&nbsp;{{ $item->user?->profile?->county?->name}}</u></p>
                                            <p class="m-1"><span class="text-muted">Ward:</span>&nbsp;<span class="dotted-underline text-capitalize">&nbsp;{{ $item->user?->profile?->ward?->name}}</u></p>
                                        </div>
                                        <div class="col-print-6">
                                            <p class="m-1"><span class="text-muted">Registration No:</span>&nbsp;<span class="dotted-underline text-capitalize">&nbsp;{{ $item->application_number }}</u></p>
                                            <p class="m-1"><span class="text-muted">Mobile No:</span> <span class="dotted-underline text-capitalize">&nbsp;{{ $item->user?->profile?->phone_number }}</u></p>
                                            <p class="m-1"><span class="text-muted">Street/Road:</span> <span class="dotted-underline text-capitalize">&nbsp;{{ $item->user?->profile?->street_name }}</u></p>
                                            <p class="m-1"><span class="text-muted">Sub County:</span>&nbsp;<span class="dotted-underline text-capitalize">&nbsp;{{ $item->user?->profile?->subCounty?->name}}</u></p>
                                            <p class="m-1"><span class="text-muted">L.R. No./Plot No:</span> <span class="dotted-underline text-capitalize">&nbsp;{{ $item->user?->profile?->plot_number }}</u></p>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="my-4">
                                <div class="alert alert-success text-justify">
                                    <p class="m-1 text-dark">
                                        <b class="text-success text-capitalize">{{ $item->user?->name }}</b> is hereby authorized to <b class="text-success">buy clean coffee</b> only at the
                                        exchange for <b class="text-success">export (local sale or value addition) or import (for secondary processing)</b> in Kenya, from <b class="text-success">
                                        {{ Carbon\Carbon::parse($item->effective_date)->format('d M, Y') }} - {{ Carbon\Carbon::parse($item->expiry_date)->format('d M, Y') }}</b>.
                                    </p>
                                </div>
                            </div>
                            <fieldset class="my-4">
                                <legend class="bg-danger text-light rounded-4 px-2">
                                    <h5 class="m-0 py-1 px-4 text-uppercase">Terms &amp; Conditions</h5>
                                </legend>
                                <div class="my-2 text-justify1">
                                    <p class="m-1"><b class="text-danger">1. </b>A licensed buyer shall submit trading returns to the Board on a monthly basis;</p>
                                    <p class="m-1"><b class="text-danger">2. </b>The licensed buyer shall comply with the Kenya Coffee Industry Standards and Code of Practice;</p>
                                    <p class="m-1"><b class="text-danger">3. </b>The licensed buyer shall allow free access to the premises by inspectors authorized by the Board;</p>
                                    <p class="m-1"><b class="text-danger">4. </b>The Board may vary, suspend or revoke this license if the holder fails to abide by its terms and conditions;</p>
                                    <p class="m-1"><b class="text-danger">5. </b>The coffee buyer's license does not include the Board engaging in direct sale; and</p>
                                    <p class="m-1"><b class="text-danger">6. </b>The coffee buyer's license is not transferable.</p>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </section>
            <footer>
                <div class="container row-print my-2">
                    <div class="col-print-6">
                        <div class="my-5">
                            <p class="m-1 text-xs text-muted">Date Printed</p>
                            <h6 class="m-1">{{ Carbon\Carbon::parse($date_printed)->format('d-M-Y') }}</h6>
                            <p class="m-1 text-xs text-muted">This document is valid without a signature. Scan the QR code to verify.</p>
                        </div>
                    </div>
                    <div class="col-print-6">
                        <p class="text-right">
                            <img src="data:image/svg+xml;base64,{{ $qr_code ?? '' }}" alt="QR Code" width="100" height="100">
                        </p>
                    </div>
                </div>
                <div class="bg-success rounded-bottom-5 text-light border-top-red py-2">
                    <div class="text-light text-center">
                        <b class="p-5 text-sm"><i>Coffee Board of Kenya · Certificate of Quality</i></b>
                    </div>
                </div>
            </footer>
        </main>
    </body>
</html>
