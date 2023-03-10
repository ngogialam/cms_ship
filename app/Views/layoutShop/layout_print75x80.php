<html>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
  <title>In đơn hàng chuyển phát nhanh</title>
  <meta charset="utf-8" content="text/html" />
  <link rel="icon" href="<?php echo base_url('public/favicon.ico') ?>">
  <link rel="apple-touch-icon" href="<?php echo base_url('public/favicon.ico') ?>">

  <style type="text/css">
  * {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }

  body,
  p,
  span {
    font-family: "Arial" !important;
    font-size: 9px;
  }

  .h3,
  h3 {
    font-size: 10px;
    font-weight: bold;
    margin: 0;
    width: 100%;
    /* padding: 2px 0; */
  }

  span {
    font-size: 15px;
  }

  p {
    margin-bottom: 0px;
    /* line-height: 12px; */
    margin-top: 0;
  }

  .row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
  }

  /*@media print {*/
  .col-sm-1,
  .col-sm-2,
  .col-sm-3,
  .col-sm-4,
  .col-sm-5,
  .col-sm-6,
  .col-sm-7,
  .col-sm-8,
  .col-sm-9,
  .col-sm-10,
  .col-sm-11,
  .col-sm-12 {
    float: left;
  }

  .col-sm-12 {
    width: 100%;
  }

  .col-sm-11 {
    width: 91.66666667%;
  }

  .col-sm-10 {
    width: 83.33333333%;
  }

  .col-sm-9 {
    width: 70%;
  }

  .col-sm-8 {
    width: 66.66666667%;
  }

  .col-sm-7 {
    width: 58.33333333%;
  }

  .col-sm-6 {
    width: 50%;
  }

  .col-sm-5 {
    width: 41.66666667%;
  }

  .col-sm-4 {
    width: 33.33333333%;
  }

  .col-sm-3 {
    width: 30%;
  }

  .col-sm-2 {
    width: 16.66666667%;
  }

  .col-sm-1 {
    width: 8.33333333%;
  }

  /*}*/

  #wrapper-print .container {
    width: 225px;
    padding: 0;
    /* height: 218px; */
    /* border: 1px solid red; */
    margin-bottom: 0px;
    padding-left: 9px;
    padding-right: 3px;
    overflow: hidden;
  }

  .row.header-print {
    margin-top: 30px;
  }

  .header-print {
    margin: 15px 0;
  }

  .header-print img {
    max-width: 100%;
  }

  .header-print h3 {
    text-transform: uppercase;
    color: #333;
    font-size: 20px;
    text-align: center;
    margin-top: 7px;
  }

  .wrap-content-print {
    border-top: 1px #000 solid;
    margin: 0px;
    padding-right: 5px;
  }

  .wrap-content-print .left-cont {
    border-right: 1px #000 solid;
  }

  p.border-dad {
    margin: 0;
    padding: 0px 0;
  }

  .border-dad-fee-vc {
    border-bottom: 1px #000 solid;
    width: 100%;
    padding: 10px 0;
    margin: 0;
  }

  .border-print-dad {
    border-bottom: 1px #000 solid;
  }

  .center {
    text-align: center;
  }

  .full-width {
    width: 100%;
  }

  p.money_cod {
    text-align: center;
    font-weight: bold;
    font-size: 20px;
  }

  .wrap-qc-pr {}

  .qr-code {
    text-align: center;
  }

  .qr-code img {
    width: 128px;
  }

  .logo_GTK img {
    width: 71px !important;
  }

  .content-print p {
    padding-left: 12px;
    font-size: 10px;
    line-height: 18px;
    margin-bottom: 4px;
  }

  .content-print p:last-child {
    margin-bottom: 0;
  }

  .btn-warning-custom {
    background-color: #ffc436;
    border: none;
    color: #333;
    text-transform: uppercase;
  }

  .btn-warning-custom:hover,
  .btn-warning-custom:focus {
    background-color: #e6a916;
    border: none;
    color: #333;
  }

  .logo_holaship {
    /* text-align: center; */
    padding-left: 5px;
  }

  .logo_nvc {
    text-align: center;
    margin: 10px 0;
  }

  .logo_nvc img {
    width: 130px;
  }

  .ng-order {
    margin: 10px 0;
    text-align: center;
  }

  .ng-order p {
    margin-bottom: 0;
  }

  .ng-order {
    margin: 10px 0;
  }

  p.ng-binding {
    word-wrap: break-word;
    font-weight: bold;
    font-size: 13px !important;
  }

  .ng-img-barcode {
    margin-bottom: 0;
    margin-top: 10px;
    text-align: center;
  }

  .des-text-print {
    font-size: 9px !important;
    /* font-weight: 600; */
  }

  .text-sign {
    height: 25px;
  }


  @media print {

    .col-sm-1,
    .col-sm-2,
    .col-sm-3,
    .col-sm-4,
    .col-sm-5,
    .col-sm-6,
    .col-sm-7,
    .col-sm-8,
    .col-sm-9,
    .col-sm-10,
    .col-sm-11,
    .col-sm-12 {
      float: left;
    }

    .col-sm-12 {
      width: 100%;
    }

    .col-sm-11 {
      width: 91.66666667%;
    }

    .col-sm-10 {
      width: 83.33333333%;
    }

    .col-sm-9 {
      width: 75%;
    }

    .col-sm-8 {
      width: 66.66666667%;
    }

    .col-sm-7 {
      width: 58.33333333%;
    }

    .col-sm-6 {
      width: 50%;
    }

    .col-sm-5 {
      width: 41.66666667%;
    }

    .col-sm-4 {
      width: 33.33333333%;
    }

    .col-sm-3 {
      width: 25%;
    }

    .col-sm-2 {
      width: 16.66666667%;
    }

    .col-sm-1 {
      width: 8.33333333%;
    }
  }

  .wrap-print-order {
    margin-bottom: 30px;
  }

  .container.wrap-print-order {
    /* border: 1px solid #ccc;  */
  }

  .content-print h3 {
    font-size: 15px;
    font-weight: bold;
    margin-bottom: 0;
  }

  .wrap-tienthu h3 {
    float: left;
  }

  .content-print p span {
    font-weight: bold;
  }

  .number-order-print {
    margin: 0px;
  }

  .p-sort-code {
    /* padding: 30px 0px;
            line-height: 12px; */
    font-weight: bold;
    font-size: 15px;
    text-align: center;
  }

  @page {
    margin: 0
  }

  body {
    margin: 0
  }

  .sheet {
    margin: 0;
    overflow: hidden;
    position: relative;
    box-sizing: border-box;
    page-break-after: always;
  }

  /** Paper sizes **/
  body.A3 .sheet {
    width: 297mm;
    height: 419mm
  }

  body.A3.landscape .sheet {
    width: 420mm;
    height: 296mm
  }

  body.A4 .sheet {
    width: 210mm;
    height: 296mm
  }

  body.A4.landscape .sheet {
    width: 297mm;
    height: 209mm
  }

  body.A5 .sheet {
    width: 148mm;
    height: 209mm
  }

  body.A5.landscape .sheet {
    width: 210mm;
    height: 147mm
  }

  body.letter .sheet {
    width: 216mm;
    height: 279mm
  }

  body.letter.landscape .sheet {
    width: 280mm;
    height: 215mm
  }

  body.legal .sheet {
    width: 216mm;
    height: 356mm
  }

  body.legal.landscape .sheet {
    width: 357mm;
    height: 215mm
  }

  /** Padding area **/
  .sheet.padding-10mm {
    padding: 10mm
  }

  .sheet.padding-15mm {
    padding: 15mm
  }

  .sheet.padding-20mm {
    padding: 20mm
  }

  .sheet.padding-25mm {
    padding: 25mm
  }

  /** For screen preview **/
  @media screen {

    /*body { background: #e0e0e0 }*/
    .sheet {
      background: white;
      box-shadow: 0 .5mm 2mm rgba(0, 0, 0, .3);
      margin: 5mm auto;
    }
  }

  /** Fix for Chrome issue #273306 **/
  @media print {
    body.A3.landscape {
      width: 420mm
    }

    body.A3,
    body.A4.landscape {
      width: 297mm
    }

    body.A4,
    body.A5.landscape {
      width: 210mm
    }

    body.A5 {
      width: 148mm
    }

    body.letter,
    body.legal {
      width: 216mm
    }

    body.letter.landscape {
      width: 280mm
    }

    body.legal.landscape {
      width: 357mm
    }
  }

  #barcode {
    padding: 0px 15px;
    display: table;
    height: 43px;
    width: 100%;
    text-align: center;
    font-size: 10px;
    font-weight: bold;
    text-transform: uppercase;
  }

  #barcode img {
    width: 100%;
    /* height: 30px; */
  }

  .no-print,
  .no-print * {
    display: none !important;
  }

  .fee-style {
    word-break: break-all;
    /* line-height: 10px; */
    text-align: center;
    font-size: 10px;
  }

  .title,
  .title-note {
    font-size: 9px;
    font-weight: 100;
  }

  .pdl5 {
    padding-left: 5px;
  }

  .pdr5 {

    padding-right: 5px;
  }

  .right-cont {
    border-left: 1px #000 solid;
  }

  .text-weight {
    font-weight: 600;
    font-size: 10px;
  }

  .showDots {
    max-width: 205px;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
  }

  .max-address {
    height: 12px;
    overflow: hidden;
  }

  .max-address-receive {
    height: 42px;
    overflow: hidden;
  }

  .showDots-receive {
    max-width: 205px;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
  }

  .showDots-note {
    max-width: 205px;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
  }

  .max-hh {
    height: 13px;
    line-height: 14px;
    overflow: hidden;
  }

  .t-title {
    font-size: 7px;
  }

  .txt-center {
    text-align: center;
    padding-top: 2px;
  }

  .fs11 {
    font-size: 11px;
  }

  .mgl30 {
    margin-left: 30px;
  }
  </style>
</head>

<body>
  <div id="wrapper-print">
    <?=view($view)?>
  </div>
</body>

</html>