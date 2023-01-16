<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="<?= base_url('Asset/css') ?>/sb-admin-2.min.css"> 

    <style>
        @page{
            margin:20px; 
        }

        .table{ 
            width:100%;
            border-collapse: collapse;
            text-align: center;
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
            margin-bottom: 60px;

        }
        .table td, .table th {
            border: 1px solid #A0A0A0;
            padding: 8px;
        }
        .table th {   
            font-size: 13px;


        }
        .table tr:nth-child(even){background-color: #f2f2f2;}
    </style>
</head>
<body  >
    <div class=""> 
            <img src="<?= base_url()?>/Asset/img/logo/head.jpg" alt="" class="img w-100 p-0 m-0"> 
    </div>
    <div>
                <table class="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Kode Kegiatan</td>
                            <td>Nama</td>
                            <td>Kegiatan</td>
                            <td>Waktu Presensi</td>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php $no = 0; foreach ($get_presensi as $v) : $no++;?>

                            <tr>
                                <td><?= $no ?></td>
                                <td><?= 'KGT~'.$v->kode_id ?></td>
                                <td><?= $v->nama_lengkap ?></td>
                                <td><?= $v->nama_kgt ?></td>
                                <td><?= $v->waktu_presensi ?></td>
                            </tr> 
                        
                        <?php endforeach; ?>
                    </tbody>
                </table>
    </div>

</body>
</html>