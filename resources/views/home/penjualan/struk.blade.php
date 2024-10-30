
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk</title>
    <style>
        .kotak {
            border: 1px solid black;
            padding: 10px;
            width: 380px;
        }
</style>
<body onload="window.print();">  
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="card-body">
              <div class="kotak">
    <table border="0" width="350">   
        <tr>    
          <center>
            <div><h1>Inventory</h1></div>
      </center>
      </tr>
      <tr>
      <td colspan="2">ID Produk : {{ $penjualan->id }}<br><hr></td>
      <td colspan="2">Kasir : {{ $penjualan->user->nama }}<br><hr></td>
      </tr>
      <tr>
        <td colspan="2"> Jumlah :{{ $penjualan->total }}<br><hr></td>
      </tr>
      <tr>
        
      </tr>
      </tr>
      <tr>
        <center>
        <td colspan="2">Waktu : {{$penjualan->created_at}}</td>
      </center>
      </tr>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
      </body>
</head>
