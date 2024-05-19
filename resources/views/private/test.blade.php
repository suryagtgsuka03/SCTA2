<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script></script>
</head>

<body>

    <div class="container mt-3">
        <h3>Extra Large Modal Example</h3>
        <p>Click on the button to open the modal.</p>

        <a style="text-decoration: none" href="#" data-bs-toggle="modal" data-bs-target="#myModal">Buka Modal</a>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
            Open modal
        </button>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="modal-body">
                        <form id="truckForm">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="mb-3">
                                <label for="nomor_ktp" class="form-label">Nomor KTP</label>
                                <input type="number" class="form-control" id="nomor_ktp" name="nomor_ktp"
                                    maxlength="16">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                            </div>
                            <div class="mb-3">
                                <label for="umur" class="form-label">Umur</label>
                                <input type="text" class="form-control" id="umur" name="umur" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="plat_truk" class="form-label">Plat Truk</label>
                                <input type="text" class="form-control" id="plat_truk" name="plat_truk">
                            </div>
                            <div class="mb-3">
                                <label for="asal" class="form-label">Asal</label>
                                <input type="text" class="form-control" id="asal" name="asal">
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</body>
<script src="{{ asset('JS/script.js') }}"></script>

</html>
