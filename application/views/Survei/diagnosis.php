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
        <?php echo form_open('Diagnosa/inputGejala' , array('class' => 'table-responsive')); ?>
            
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
                                <div class="form-group">
                                    <div class="radio">
                                        <input type="checkbox" class="container_radio" name="gejala[]" id="gejala[]" value="<?= (int)$gejala['id']; ?>"><?= $gejala['jenisGejala']; ?>
                                        <!-- <span class="checkmark"></span> -->

                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php
                        
                    endforeach;
                    ?>
                    <tr style="background-color:#c1c1c1ad;">
                        <td><b>CONTACT HISTORY (UNUSEABLE)</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Have a history of close contact with patients with confirmed COVID-19 or probable COVID-19<br /><small>"Melakukan kontak fisik, atau berada dalam satu ruangan, atau berkunjung (berada dalam radius 1 meter dengan kasus pasien dalam pengawasan, probable atau konformasi) dalam 2 hari sebelum kasus timbul gejala dan hingga 14 hari setelah kasus timbul gejala"</small< /td>
                        <td>
                            <div class="form-group">
                                <div class="radio">
                                    <label class="container_radio">No
                                        <input type="radio" class="b1" name="b1" id="b1" value="0">
                                        <span class="checkmark_t"></span>
                                    </label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="radio">
                                    <label class="container_radio">Yes
                                        <input type="radio" class="b1" name="b1" id="b1" value="1">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr style="background-color:#c1c1c1ad;">
                        <td><b>MOBILITY HISTORY (UNUSEABLE)</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Have a history of traveling or living abroad with local transmission</td>
                        <td>
                            <div class="form-group">
                                <div class="radio">
                                    <label class="container_radio">No
                                        <input type="radio" class="a1" name="a1" id="a1" value="0">
                                        <span class="checkmark_t"></span>
                                    </label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="radio">
                                    <label class="container_radio">Yes
                                        <input type="radio" class="a1" name="a1" id="a1" value="1">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Have a history of traveling or living in a local transmission area in Indonesia</td>
                        <td>
                            <div class="form-group">
                                <div class="radio">
                                    <label class="container_radio">No
                                        <input type="radio" class="a2" name="a2" id="a2" value="0">
                                        <span class="checkmark_t"></span>
                                    </label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="radio">
                                    <label class="container_radio">Yes
                                        <input type="radio" class="a2" name="a2" id="a2" value="1">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button  class="btn btn-primary" id="btnSubmit">Submit</button>
            <?php echo form_close(); ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div id="result"></div>
        </div>
    </div>
</body>

</html>