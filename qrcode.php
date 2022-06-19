<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container mt-5">
        <div class="container-fluid">
            <div class="card text-center">
                <div class="card-header">
                    Generate QRCode
                </div>
                <center>
                    <form action="" method="POST">
                        <div class="card-body">
                            <h5 class="card-title">Masukan Kode</h5>
                            <div class="col-4">
                                <input type="number" name="kode" class="form-control" placeholder="981723912">
                            </div>
                            <input type="submit" name="generate" id="btn_submit" class="btn btn-primary mt-2" value="Generate Code">
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="container-fluid">
            <div class="card text-center">
                <div class="card-header">
                    QRCode
                </div>
                <?php
                    if (isset($_POST['generate'])){
                        /*create folder*/
                        $tempdir="img-qrcode/";
                        if (!file_exists($tempdir))
                        mkdir($tempdir, 0755);
                        $target_path=$tempdir . $_POST['kode'] . ".png";

                        /*using server localhost*/
                        $fileImage="https://chart.googleapis.com/chart?chs=350x350&cht=qr&chld=M|1&choe=UTF-8&chl=" . $_POST['kode'];

                        /*get content from url*/
                        $content=file_get_contents($fileImage);

                        /*save file */
                        file_put_contents($target_path, $content);

                        echo "
                        <p class='result'>Result :</p>
                        <p><img src=' " . $tempdir . $_POST['kode'] . ".png'></p>
                        ";
                    }
                    ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>