<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- Bootstrap -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/styleDiagnosis.css'); ?>">
</head>

<body>
    <?= $navbar; ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mt-3">Hasil Diagnosa</h1>
                <h4 class="mt-5">Hai, <?= $name; ?>!</h4>
                <?php if ($resultList) {
                    foreach ($resultList as $r) :?>
                        <h4><?= $r['namaSolusi']; ?></h4>
                        <p><?= $r['solusi']; ?></p>
                <?php endforeach;?>

                <?php } else { ?>
                    <p>Anda belum memiliki data, silahkan lakukan diagnosa mandiri terlebih dahulu</p>
                    <a href="<?= base_url('Diagnosa') ?>" class="button">Mulai Diagnosa</a>
                <?php } ?>
                <br>
                
            </div>
</body>