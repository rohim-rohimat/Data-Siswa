<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        p{
            font-size: 40px;
            font-weight: bold;
            margin-left:   290px;
            padding-top: 20px;
        }
        .btn{
            background-color: lightgreen;
            width: 900px;
            height: 520px;
            margin-top: 40px;
            margin-left: 180px;
            border-top-right-radius: 40px;
            border-top-left-radius: 40px;
            border-bottom-right-radius: 40px;
            border-bottom-left-radius: 40px;
        }
        label{
            font-size: 25px;
            margin-left: 300px;
        }
        input{
            font-size: 20px;
            margin-left: 10px;
            margin-top: 5px;
        }
        .box-1{
            height: 40px;
            width: 120px;
            font-size: 15px;
            margin-left: 270px;
            margin-top: 25px;
        }
        .box-2{
            height: 40px;
            width: 120px;
            font-size: 15px;
            margin-left: 20px;
        }
        .box-3{
            height: 40px;
            width: 120px;
            font-size: 15px;
            margin-left: 20px;
        }

        .output1 {
            text-align: center;
            justify-content: center;
            align-items: center;
            display: flex;
            font-size: xx-large;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    
    <div class="btn">
        <p>Masukan Data Siswa</p>

        <form action="" method="post" class="">
            <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama">
        <br><br>
        <label for="nis">Nis : </label>
        <input type="text" name="nis" id="nis">
        <br><br>
        <label for="rayon">Rayon : </label>
        <input type="text" name="rayon" id="rayon">
        <br>
        <button type="submit" value="tambah" name="tambah" class="box-1">tambah</button>
        <button type="submit" value="hapus data" name="reset" class="box-3"><a>HAPUS DATA</a></button>
    </form>

        <?php 
        session_start();
        
        if (!isset($_SESSION['dataSiswa'])) {
            $_SESSION['dataSiswa'] = array();
        }
        
        if (isset($_POST['nama']) && isset($_POST['nis']) && isset($_POST['rayon'])) {
            $data = array(
                'nama' => $_POST['nama'],
                'nis' => $_POST['nis'],
                'rayon' => $_POST['rayon'],
            );
            array_push($_SESSION['dataSiswa'], $data);
        };  
        //proses penghapusan data siswa
        if(isset($_GET['hapus'])) {
            $index = $_GET['hapus'];
            unset($_SESSION['dataSiswa'][$index]);
            //Redirect kembali ke halaman ini setelah penghapusan
            header('location: http://localhost/LATIHANSESSION/latihan1.php');
            exit;
        }
        
        // var_dump($_SESSION['dataSiswa']);
        
        echo '<div class="output1">';
        echo '<table>';
        echo '<tr>';
        echo  '<th>NAMA<th>';
        echo '<th>NIS<th>';
        echo '<th>RAYON<th>';
        echo '<th>AKSI<th>';
        echo '</tr>';
        
        foreach ($_SESSION['dataSiswa'] as $index => $value) {
            echo '<tr>';
            echo '<td>'. $value['nama'] .'<td>';
            echo '<td>'. $value['nis'] .'<td>';
            echo '<td>'. $value['rayon'] .'<td>';
            echo '<td><a href="?hapus='.$index.'">Hapus</a></td>';
            echo '<tr>';
            echo '</div>';
        }
        echo '</table>';
        
        if(isset($_POST['reset'])){
            session_destroy();
            header('location: http://localhost/LATIHANSESSION/latihan1.php');
            exit;
        }
         
        ?>
        </div>
    </body>
</html>