<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,0">
		<title>Cetak Tagihan <?=$pembelian->id?></title>

		<style>
		@page {margin:0 -1cm}
		html {margin:0 1cm}
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 0px solid #eee;
				box-shadow: 0 0 0 rgba(0, 0, 0, 0.15);
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
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td class="title" colspan="2">
						<table>
							<tr>
								<td>
									<div class="title">
										<img src="<?=base_url()?>assets/image/logoITG.jpg" style="width: 100%; max-width: 275px;" />
									</div>
									<div class="" style="font-size:14px;color:#b77620;">
										<b>Kantor Pemasaran:</b>
									</div>
									<div class="" style="font-size:14px;">
										Perum Deltasari Indah Blok AM no.44<br />
										Kec. Waru, Sidoarjo
									</div>

								</td>
								<td>
									<div class="" style="font-size:18px;">
										<b><br />Tagihan Tunggakan</b>
									</div>
									<?php setlocale(LC_ALL, 'IND');
									 			echo strftime('%d %B %Y');?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Yth. <?=$pembeli_selected->nama_pembeli?><br />
									<?=$pembeli_selected->alamat?><br />
									<?=$pembeli_selected->telepon?>
								</td>
								<td>
									<b>Pembelian Unit</b><br />
									ID: <?=$pembelian->id?><br />
									Perumahan: <?=$perumahan_selected->nama?><br />
									Cluster: <?=$unit_selected->cluster?><br />
									Blok: <?=$unit_selected->blok?><br />
									Harga: <?="Rp".number_format($pembelian->harga_beli, 2);?><br />
									Metode: <?=$metode_selected->nama_metode?><br />
									Cicilan Perbulan: <?="Rp".number_format($pembelian->cicilan_perbulan, 2);?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<table>
					<tr>
						<td>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDengan hormat,<br><br>
							Perlu kami beritahukan bahwa piutang kami pada saudara yang telah jatuh tempo sebanyak <?=$pembelian->tunggakan?> pembayaran,
							dengan rincian sebagai berikut:
						</td>
					</tr>
				<table>

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

				<table>
					<tr>
						<td>
							Keterlambatan pembayaran mungkin akibat kekeliruan, jika ada alasan lain, hendaknya Saudara memberikan penjelasan kepada kami.
							Walaupun demikian, kami berharap pembayaran untuk piutang tersebut dapat segera kami terima.<br>
							Atas perhatian Saudara, kami ucapkan terima kasih.
						</td>
					</tr>
				<table>

				<tr class="ttd">
					<td></td>
					<td>PT. Indo Tata Graha</td>
				</tr>

				<tr class="ttd">
					<td></td>

					<td ><br /><br /><br /><?=ucwords($this->fungsi->user_login()->nama)?></td>
				</tr>
			</table>
		</div>
    <script type="text/javascript">
      window.print();
    </script>
	</body>
</html>
