<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>E-Tiket</title>
    <style>
        #customers {
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
            text-align: center;
        }

        #destinasi td {
            font-size: 14px;
        }

        #customers tr:hover {
            background-color: #4ccccd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: #4ccccd;
        }
    </style>
</head>
<?php date_default_timezone_set('Asia/Jakarta'); ?>

<body style="background-color: whitesmoke">
    <div class="kolom" style="background-color:white; width:700px; height:680px; margin:auto; margin-top:20px; margin-bottom: 20px; box-shadow: 3px 3px 5px 6px #ccc; ">
        <div>
            <div class="card-body table-responsive">

                <h1>E-Tiket</h1>
                <fieldset>
                    <table id="destinasi">
                        <tr>
                            <td>
                                <p style="margin-bottom: 2px;">Kode Booking</p>
                                <h3 style="margin-top: 2px;"><?= $booking['tbooking_no'] ?></h3>
                            </td>
                            <td></td>
                            <td></td>

                            <td colspan="3">
                                <h3 style=" font-weight:bold; margin-bottom: 2px;"> <?= $booking['mdestinasi_nama'] ?></h3>
                                <hr style="margin-top: 2px; margin-bottom: 2px;">
                                <h5 style="margin-top: 2px; font-weight:normal;"><?= date('d/m/Y') ?> <?= date('H:i:s') ?></h5>
                            </td>

                        </tr>
                        <tr>
                            <td> Ticket ID </td>
                            <td> : </td>
                            <td width=" 240px" style="text-align: left;"><?= $booking['rticket_id'] ?> </td>

                            <td> Jumlah </td>
                            <td> : </td>
                            <td width=" 200px" style="text-align: left;"><?= $booking['tbooking_jumlah'] ?></td>
                        </tr>
                        <tr>
                            <td> Days </td>
                            <td> : </td>
                            <td tyle="text-align: left;"><?= $booking['rmoment_name'] ?> </td>

                            <td> Harga </td>
                            <td> : </td>
                            <td> Rp. <?= number_format($booking['rticket_harga'], 2, '.', ',') ?></td>
                        </tr>
                        <tr>
                            <td> Date Visited </td>
                            <td> : </td>
                            <td> <?= $booking['tbooking_date_visited'] ?></td>

                            <td> Total </td>
                            <td> : </td>
                            <td> Rp. <?= number_format($booking['tbooking_total'], 2, '.', ',') ?></td>
                        </tr>
                        <?php if ($booking['tticket_status'] != 'dipesan' && $booking['tticket_status'] != 'digunakan') : ?>
                            <tr>
                                <td> Status </td>
                                <td> : </td>
                                <td> <?= $booking['tticket_status'] ?></td>
                            </tr>
                        <?php endif ?>

                    </table>
                </fieldset>
                <br />
                <h3>Detail Pengunjung</h3>
                <table id="customers">
                    <tr>
                        <th width="50px">No</th>
                        <th>Nama Pengunjung</th>
                        <th>Jenis Tiket</th>
                        <th>Pengunjung ID</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><?= $booking['rvisitors_nama'] ?></td>
                        <td><?= $booking['rvarianticket_nama'] ?></td>
                        <td><?= $booking['rvisitors_id'] ?></td>
                    </tr>
                </table>
            </div>
            <br>
            <?php if ($booking['tticket_status'] == 'dipesan' || $booking['tticket_status'] == 'digunakan') : ?>
                <p style="font-size: 14px;">Note : <br>
                    - Disimpan sebagai bukti pembayaran yang SAH. <br>
                    - Tiket ini dapat dicetak dan dibawa untuk ditunjukkan kepada petugas destinasi.
                    <br>&nbsp;&nbsp; Sertakan identitas diri para pengunjung untuk melakukan verifikasi tiket ini.
                </p>
            <?php endif ?>
        </div>
    </div>
</body>

</html>