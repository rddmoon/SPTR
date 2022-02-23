<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,0">
		<title>Kwitansi <?=$kwitansi->id?></title>

    <style>
      @page {margin:0 -1cm}
      html {margin:0 1cm}
      .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
      }

      .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
        table-layout: auto;
        border-collapse: collapse;
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
        width: 25%;
        /* white-space: nowrap; */
        font-weight: bold;
        padding-right: 5px;
				padding-left: 10px;
      }

      .invoice-box table tr.heading td:nth-child(2) {
        /* background-image: url('http://i.imgur.com/H8dFf.png'); */
        line-height: 24px;
        /* background-position: 0 0px; */
        position: relative;
        width:100%;
        font-weight: normal;
        text-align: left;
        /* background: #eee; */
        /* border-bottom: 1px solid #ddd; */
        /* display:inline; */
      }

      .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
      }

      .invoice-box table tr.item.last td {
        border-bottom: none;
      }

      .invoice-box table tr.tanggal td:nth-child(2) {
        /* border-top: 2px solid #eee; */
        font-weight: bold;
      }

      .invoice-box table tr.ttd td:nth-child(2) {
        /* border-bottom: 1px solid #eee;
        display: inline; */
        padding-right: 20px;
        font-weight: normal;
        text-align: right;
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
                  <div class="" style="font-size:20px;">
                    <b><br />Kwitansi</b>
                  </div>
                  No: <?=$kwitansi->id?><br />
                  Tanggal: <?php setlocale(LC_TIME, 'IND');
												$thedate = explode("-", $kwitansi->tanggal_bayar);
												$s = strftime('%d %B %Y', mktime(0, 0, 0, $thedate[1], $thedate[2], $thedate[0]));
												echo " ".$s."";?><br />
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- <tr class="information">
          <td colspan="2">
            <table>
              <tr>
                <td>
                  <div class="" style="color:#b77620">
                    <b>Kantor Pemasaran:</b>
                  </div>
                  Perum Deltasari Indah Blok AM no.44<br />
                  Kec. Waru, Sidoarjo
                </td>
              </tr>
            </table>
          </td>
        </tr> -->

        <tr class="heading">
          <td>Telah diterima dari</td>
          <td><?=$kwitansi->nama_pembeli?></td>
        </tr>
        <tr class="heading">
          <td>Uang Sejumlah</td>

          <td><?="Rp".number_format($kwitansi->biaya, 2);?></td>
        </tr>
        <tr class="heading">
          <td>Untuk Pembayaran</td>

          <td><?=$kwitansi->keterangan;?></td>
        </tr>

        <tr class="tanggal">
          <td></td>

          <td><br />Sidoarjo,
						<?php setlocale(LC_TIME, 'IND');
									$thedate = explode("-", $kwitansi->tanggal_bayar);
									$s = strftime('%d %B %Y', mktime(0, 0, 0, $thedate[1], $thedate[2], $thedate[0]));
									echo " ".$s."";?>
        </tr>

        <tr class="ttd">
          <td></td>
					<?php if($kwitansi->pencetak == null){ ?>
						<td ><br /><br /><br /><br /><i>(belum dicetak)</i></td>
					<?php } else{?>
          	<td ><br /><br /><br /><br /><?=ucwords($kwitansi->pencetak)?></td>
					<?php } ?>
        </tr>
      </table>
    </div>
	</body>
</html>
