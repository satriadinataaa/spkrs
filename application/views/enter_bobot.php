<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Pengaturan Bobot</title>
  </head>
  <body>


    <div>    <!-- As a heading -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url()?>">SPK Rumah Sakit</a>
           
            <div class="mr-sm-2" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="<?= base_url('Hospital')?>">Insert Data</a>
                </div>
            </div>
        </div>
        </nav>
    </div>

    <div class="container pt-3 pb-5">
        <h3 class="pb-5">Pengaturan Bobot</h3>
        <form method="POST" action="<?= base_url('Home/result_page')?>">
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Bobot Dalam Persen (Jarak) </label>
                <input type="number" class="form-control" name="jarak" placeholder="Contoh : 25.5" required>
            </div>
            <!-- <select class="form-select mb-4" name="jarak_cat">
                <option value="benefit">Benefit</option>
                <option value="cost">Cost</option>
            </select> -->
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Bobot Dalam Persen (Biaya) </label>
                <input type="number" class="form-control" name="biaya" placeholder="Contoh : 25.5" required>
            </div>
            <!-- <select class="form-select mb-4" name="biaya_cat">
                <option value="benefit">Benefit</option>
                <option value="cost">Cost</option>
            </select> -->
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Bobot Dalam Persen (Pelayanan) </label>
                <input type="number" class="form-control" name="pelayanan" placeholder="Contoh : 25.5" required>
            </div>
            <!-- <select class="form-select mb-4" name="pelayanan_cat">
                <option value="benefit">Benefit</option>
                <option value="cost">Cost</option>
            </select> -->
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Bobot Dalam Persen (Fasilitas) </label>
                <input type="number" class="form-control" name="fasilitas" placeholder="Contoh : 25.5" required>
            </div>
            <!-- <select class="form-select mb-4" name="fasilitas_cat">
                <option value="benefit">Benefit</option>
                <option value="cost">Cost</option>
            </select> -->
            
            <button type="submit" class="btn btn-primary btn-block w-100">Submit</button>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>