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
    <link rel="stylesheet" href="<?= base_url('assets/css/styleDashboard.css'); ?>">

</head>

<!-- diagnosis page for covid diagnosis website -->

<body>
    <?= $navbar; ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mt-3">Diagnosis</h1>
                <h4 class="mt-5">Hai, <?= $name; ?>!</h4>
                <p class="mt-3">Pertanyaan-pertanyaan berikut dirancang untuk membantu Anda menentukan apakah Anda mungkin perlu dites COVID-19. Jika Anda mengalami tanda-tanda peringatan darurat, segera hubungi 119.</p>
                <p class="mt-3">Jika Anda mengalami gejala-gejala berikut ini, silakan hubungi penyedia layanan primer Anda atau hotline COVID-19 di 119.</p>
                <br>
                <p class="mt-3">The following questions are designed to help you determine whether you may need to be tested for COVID-19. If you are experiencing any emergency warning signs, please call 119 immediately.</p>
                <p class="mt-3">If you are experiencing any of the following symptoms, please contact your primary care provider or the COVID-19 hotline at 119.</p>
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Gejala-gejala</th>
                    <th scope="col">Solusi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Demam, Pilek, Menggigil, Badan Lemas, dan Badan Terasa Dingin pada Malam Hari</td>
                    <td>Minum Obat Pereda Demam</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Demam, Pilek, Pusing, Batuk Berdahak dan Susah Menelan</td>
                    <td>Tetap Terhidrasi</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Denyut Jantung Tidak Normal, Diare, Ruam pada Kulit, dan Badan Pegal-pegal</td>
                    <td>Istirahat yang Cukup</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Badan Lemas, Kehilangan Indra Perasa, dan Ruam pada Kulit</td>
                    <td>Pantau Gejala</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Demam, Susah Menelan, Kehilangan Indra Perasa, dan Ruam pada Kulit</td>
                    <td>Lakukan Isolasi Mandiri</td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>Demam, Pilek, Pusing, Batuk Kering, Batuk Berdahak, Denyut Jantung Tidak Normal, Susah Menelan, Sesak Nafas, Diare, Menggigil, Badan Lemas, Kehilangan Indra Perasa, Ruam pada Kulit, Mata Merah, Dada Terasa Berat, Meriang, Badan Pegal-pegal, dan Badan Terasa Dingin pada Malam Hari</td>
                    <td>Hubungi Dokter</td>
                </tr>
            </tbody>
        </table><br>
        <?php echo form_open('Diagnosa/inputGejala', array('class' => 'table-responsive')); ?>

        <table class="table">
            <tbody>
                <tr style="background-color:#c1c1c1ad;">
                    <td><b>FEELED SYMPTOMS</b></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php

                foreach ($dataGejala as $gejala) :

                ?>
                    <tr>
                        <td>
                            <?= $gejala['jenisGejala']; ?>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="radio">
                                    <input type="checkbox" class="container_radio" name="gejala[]" id="gejala[]" value="<?= (int)$gejala['id']; ?>">
                                    <!-- <span class="checkmark"></span> -->

                                </div>
                            </div>
                        </td>

                    </tr>
                <?php

                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    </div>
    <div class="container">
        <div class="row ">
            <h5 class="survei-error">
                <?php echo $this->session->flashdata('msg'); ?>
            </h5>
            <div class="col ">
                <div class="col-md-12 mt-3 ">
                    <button class="btn btn-primary " id="btnSubmit" style=" margin-left : 40%">Submit</button>
                    <?php echo form_close(); ?>
                </div>
            </div>


        </div>
    </div>

    <br>
    <br>
    <br>
    <br>

    <?= $footer; ?>
</body>

</html>