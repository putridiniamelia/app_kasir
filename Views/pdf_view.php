<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/lineicons.css'); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?=base_url('assets/css/materialdesignicons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?=base_url('assets/css/main.css'); ?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/style.css'); ?>" />
    <style>
        table {
            margin: 0 auto; /* Membuat tabel berada di tengah */
            width: 80%; /* Lebar tabel */
            border-collapse: collapse; /* Menghilangkan jarak antar border */
        }
        th, td {
            border: 1px solid black; /* Menambahkan border */
            padding: 8px; /* Padding di dalam sel */
        }
        th {
            background-color: #B0C4DE; /* Warna latar header */
        }
    </style>
    <title>Laporan Stok Produk Sepatu</title>  
</head> 
<body>  
  <br/>
  <h2 align=center>Laporan Stok Shoes Store</h2>  
  <br/>
  <table>
      <thead>    
          <tr align=center>  
              <th width="5%">No</th>  
              <th width="25%">Nama Produk</th>
              <th width="20%">Harga Beli</th>  
              <th width="20%">Harga Jual</th>  
              <th width="20%">Stok</th>
          </tr>
      </thead>  
      <tbody>
          <?php
          if(isset($listProduk)) :
             $no = 0; // inisialisasi nomor
                foreach($listProduk as $baris) :
                   $no++;
          ?>
                  <tr align=center>
                      <td><?= $no ?></td>
                      <td><?= $baris->nama_produk ?></td>
                      <td><?= $baris->harga_beli ?></td>
                      <td><?= $baris->harga_jual ?></td>
                      <td><?= $baris->stok ?></td>
                  </tr>
          <?php
                endforeach;    
             endif;
          ?>
      </tbody>
  </table>
</body>  
</html>
