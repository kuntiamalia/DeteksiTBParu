<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIDITPAR - Sistem Deteksi Dini Tuberkulosis Paru</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body id="page-top">
    <style>
        p {
            font-weight: bold;
        }
    </style>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">Siditpar</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/">Beranda</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/#tentang">Tentang TB</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/#gejala">Gejala</a></li>
                    @if(session('username') && session('user_id'))
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{route('deteksi')}}">Deteksi</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{route('riwayat')}}">Riwayat</a></li>
                    @endif
                    <li class="nav-item mx-0 mx-lg-1">
                        @if(session('username') && session('user_id'))
                        <div class="dropdown">
                            <a class="nav-link login py-3 px-0 px-lg-3 rounded dropdown-toggle" style="background-color: #fff;color:#db241e;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ session('username') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" style="font-weight: bold;" href="{{ route('logout') }}">Keluar</a>
                            </div>
                        </div>
                        @else
                        <a class="nav-link login py-3 px-0 px-lg-3 rounded" data-toggle="modal" data-target="#loginModal" href="">
                            Masuk
                        </a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 15vh;">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Form Deteksi</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('diagnosa.submit') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="usia">Usia (dalam satuan tahun)</label>
                        <input type="integer" class="form-control" id="usia" name="usia" placeholder="Masukkan usia Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">Pilih</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="batuk">Apakah Anda mengalami batuk atau batuk berdahak selama 2 minggu atau lebih?</label>
                        <select class="form-select" id="batuk" name="batuk" required>
                            <option value="">Pilih</option>
                            <option value="yes">Ya</option>
                            <option value="no">Tidak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sesak_nafas">Apakah Anda mengalami sesak nafas?</label>
                        <select class="form-select" id="sesak_nafas" name="sesak_nafas"required>
                            <option value="">Pilih</option>
                            <option value="yes">Ya</option>
                            <option value="no">Tidak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nyeri_dada">Apakah Anda mengalami nyeri dada?</label>
                        <select class="form-select" id="nyeri_dada" name="nyeri_dada"required>
                            <option value="">Pilih</option>
                            <option value="yes">Ya</option>
                            <option value="no">Tidak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="malaise">Apakah Anda mengalami malaise atau perasaan tidak nyaman, mudah lelah, dan badan lemas?</label>
                        <select class="form-select" id="malaise" name="malaise"required>
                            <option value="">Pilih</option>
                            <option value="yes">Ya</option>
                            <option value="no">Tidak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nafsu_makan">Apakah Anda mengalami penurunan nafsu makan?</label>
                        <select class="form-select" id="nafsu_makan" name="nafsu_makan"required>
                            <option value="">Pilih</option>
                            <option value="yes">Ya</option>
                            <option value="no">Tidak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="berat_badan">Apakah Anda mengalami penurunan berat badan tanpa disengaja?</label>
                        <select class="form-select" id="berat_badan" name="berat_badan"required>
                            <option value="">Pilih</option>
                            <option value="yes">Ya</option>
                            <option value="no">Tidak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="keringat_malam">Apakah Anda mengalami berkeringat malam hari tanpa melakukan aktivitas fisik?</label>
                        <select class="form-select" id="keringat_malam" name="keringat_malam"required>
                            <option value="">Pilih</option>
                            <option value="yes">Ya</option>
                            <option value="no">Tidak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="demam">Apakah Anda mengalami demam atau demam subfebris (37,6 - 38 derajat celcius)?</label>
                        <select class="form-select" id="demam" name="demam"required>
                            <option value="">Pilih</option>
                            <option value="yes">Ya</option>
                            <option value="no">Tidak</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top:3vh">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hasilModal" tabindex="-1" role="dialog" aria-labelledby="hasilModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hasilModalLabel">Hasil Diagnosis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(session('hasil'))
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>{{ session('nama_pasien') }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>{{ session('jenis_kelamin') }}</td>
                            </tr>
                            <tr>
                                <td>Usia</td>
                                <td>{{ session('usia_pasien') }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="card">
                        <div class="card-content p-3">
                            @if(session('hasil') == 'TB Paru')
                            <h3>Terduga Tuberkulosis Paru</h3> <font color = "red"> Hasil ini belum sepenuhnya akurat, untuk penegakan diagnosis lebih lanjut silakan lakukan pemeriksaan di fasilitas pelayanan kesehatan. </font>
                            @elseif(session('hasil') == 'Non TB Paru')
                            <h3> Non-Tuberkulosis Paru</h3> <font color = "red"> Hasil ini belum sepenuhnya akurat, untuk penegakan diagnosis lebih lanjut silakan lakukan pemeriksaan di fasilitas pelayanan kesehatan. </font>
                            @else
                            {{ session('hasil') }}
                            @endif  
                        </div>
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("usia").addEventListener("input", function() {
            let usiaInput = parseInt(this.value);
            if (isNaN(usiaInput) || usiaInput < 12) {
                this.setCustomValidity("Usia harus lebih dari 12 tahun.");
            } else {
                this.setCustomValidity("");
            }
        });
    });
    </script>
    <script>
        // Fungsi untuk menghapus pesan hasil dari sesi
        function clearSession() {
            $.ajax({
                url: "{{ route('clear.session') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log("Session cleared");
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Cek apakah hasil diagnosis tersedia dalam sesi saat halaman dimuat
        $(document).ready(function() {
            if ("{{ session('hasil') }}") {
                // Jika hasil diagnosis tersedia, tampilkan modal secara otomatis
                $("#hasilModal").modal("show");

                // Atur event listener untuk menangani penutupan modal
                $('#hasilModal').on('hidden.bs.modal', function(e) {
                    // Panggil fungsi untuk menghapus pesan hasil dari sesi
                    clearSession();
                });
            }
        });
    </script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Sertakan file JavaScript DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- Script inisialisasi DataTables -->
    @stack('scripts')
</body>

</html>