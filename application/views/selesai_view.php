<?php $this->load->view('header') ?>
<style>
@media print {
body * {
  visibility: hidden;
}
#print, #print * {
  visibility: visible;
}
#print {
  position: absolute;
  width: 100%;
  left: 0;
  top: 0;
}
.noprint{
  display: none;
}
}
</style>
<!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(/img/carousel-1.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Sewa Aset</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Sewa Aset</a></li>  
                            <li class="breadcrumb-item"><a href="#">Detail</a></li>  
                            <li class="breadcrumb-item"><a href="#">Sewa</a></li> 
                            <li class="breadcrumb-item"><a href="#">Selesai</a></li>
                                                  </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->  

<div class="container">
  <div class="col-sm-12">
    <p>Berikut ini adalah data produk yang anda sewa, <br>silahkan anda cetak sebagai bukti ketika anda akan melakukan pembayaran ditempat kami.</p><br>
    <div class="panel panel-default" id="print">
      <div class="panel-heading text-primary">
        Data Sewa
      </div>
      <div class="panel-body"> 
       <p>Atas Nama : <?php echo $this->session->userdata('nama')?></p>
        <p>No Telp : <?php echo $this->session->userdata('notelp')?></p>
        <p>Email : <?php echo $this->session->userdata('email')?></p>
        <p>Alamat : <?php echo $this->session->userdata('alamat')?></p>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Produk</th>
              <th>Masa Sewa</th>
              <th>Dari Tanggal</th>
              <th>Sampai Tanggal</th>
              <th>Subtotal</th>
              <th class="noprint">#</th>

            </tr>
          </thead>
          <tbody>
            <?php
              $data = $this->cart->contents();
              if (!empty($data)) {
                $no = 1;
                foreach ($data as $k) {
                  echo '<tr>';
                    echo '<td>'.$no.'</td>';
                    echo '<td>'.$k['name'].'</td>';
                    echo '<td>'.$k['masasewa'].' Tahun</td>';
                    echo '<td>'.$k['dari'].'</td>';
                    echo '<td>'.$k['sampai'].'</td>';
                    echo '<td>'.$this->all_model->format_harga($k['subtotal']).'</td>';
                    echo '<td><a href="'.base_url('sewa/hapus/'.$k['rowid']).'" class="noprint">Hapus</a></td>';
                  echo '</tr>';
                  $no++;
                }
              }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th>Total</th>
              <th><?php echo $this->all_model->format_harga($this->cart->total());?></th>
              <th class="noprint"></th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="panel-footer noprint text-center">
        <a href="#" class="btn btn-primary" onclick="print();">Cetak</a>
        <a href="<?php echo base_url('sewa/tutup')?>" class="btn btn-success  pull-right">Selesai</a>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('footer') ?>
