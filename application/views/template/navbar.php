<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <h4 class="navbar-brand" href="#">
            Self Diagnosis COVID-19
        </h4>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="<?= base_url('Dashboard') ?>">Home</a>
                <a class="nav-link" href="<?= base_url('Diagnosa') ?>">Survei</a>
                <a class="nav-link" href="<?= base_url('Diagnosa/displayResult') ?>">Result</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Account</button>
            <div class="dropdown-content">
                <a href="<?= base_url('Users/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</nav>