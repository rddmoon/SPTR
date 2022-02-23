<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,0">
		<title>Tunggakan <?=$pembelian->id?></title>

		<style>
		@page {margin:0 -1cm}
		html {margin:0 1cm}
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 14px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			.invoice-box table tr.teks {
				column-width: auto;
				table-layout: fixed;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
    <div class="section">
      <div class="section-header">
          <h1>Detail Tunggakan</h1>
      </div>
    </div>
		<div class="text-right">
				<a href="<?=site_url('tunggakan/cetak/'.$pembelian->id)?>" target="_blank" class="btn btn-warning btn-lg">
				<i class="fa fa-file"></i> Cetak</a>
		</div>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									<b>ID Pembelian&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembelian->id?></b><br>
                  <b>Pembeli</b><br>
                  NIK:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembeli_selected->NIK?><br>
                  Nama:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembeli_selected->nama_pembeli?><br>
                  Alamat:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembeli_selected->alamat?><br>
                  No. Telepon:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembeli_selected->telepon?><br>
                  <b>Unit Rumah</b><br>
                  Perumahan:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$perumahan_selected->nama?><br>
                  Cluster:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$unit_selected->cluster?><br>
                  Blok:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$unit_selected->blok?><br>
                  Tipe Rumah:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$unit_selected->tipe_rumah?><br>
                  <b>Metode</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$metode_selected->nama_metode?><br>
                  <b>Cicilan ke</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$cicilan_ke?><b> / </b> <?=$metode_selected->banyaknya_cicilan?><br>
                  <b>Tanggal Pembelian</b>&nbsp;
                    <?php setlocale(LC_TIME, 'IND');
  												$thedate = explode("-", $pembelian->tanggal_beli);
  												$s = strftime('%d %B %Y', mktime(0, 0, 0, $thedate[1], $thedate[2], $thedate[0]));
  												echo " ".$s."";?><br />
                  <br>
                  <b>Harga Beli</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?="Rp".number_format($pembelian->harga_beli, 2);?><br>
                  <b>Cicilan Perbulan</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?="Rp".number_format($pembelian->cicilan_perbulan, 2);?><br>
                  <b>Tunggakan</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pembelian->tunggakan?><br>
                  <b>Total Uang Masuk</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?="Rp".number_format($pembelian->uang_masuk, 2);?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Tunggakan</td>

					<td>Sebesar</td>
				</tr>
				<?php $total = 0; ?>
				<?php foreach ($pembayaran->result() as $key => $value){ ?>
					<?php if ($value->blokir == "blokir"){ ?>
						<tr class="item">
							<td>Cicilan <?=$value->jenis?>
								<?php setlocale(LC_TIME, 'IND');
											$thedate = explode("-", $value->tanggal_jatuh_tempo);
											$s = strftime('%B %Y', mktime(0, 0, 0, $thedate[1], $thedate[2], $thedate[0]));
											echo " (".$s.")";?>
							</td>

							<td><?="Rp".number_format($value->biaya, 2);?></td>
							<?php $total = $total + $value->biaya; ?>
						</tr>
					<?php } ?>
				<?php } ?>

				<tr class="total">
					<td></td>

					<td>Total:&nbsp&nbsp&nbsp&nbsp<?="Rp".number_format($total, 2);?></td>
				</tr>
			</table>
		</div>
	</body>
</html>
