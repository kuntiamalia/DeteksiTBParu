<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIDITPAR - Sistem Deteksi Dini Tuberkulosis Paru</title>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            alert('Sistem Deteksi Dini Tuberkulosis Paru ini hanya untuk pengguna dewasa!');
        });
    </script>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
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
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="true" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#head">Beranda</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#tentang">Tentang TB</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#gejala">Gejala</a></li>
                    @if(session('username') && session('user_id'))
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{route('deteksi')}}">Deteksi</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{route('riwayat')}}">Riwayat</a></li>
                    @endif
                    <li class="nav-item mx-0 mx-lg-1">
                        @if(session('username') && session('user_id'))
                        <div class="dropdown">
                            <a class="nav-link login py-3 px-0 px-lg-3 rounded dropdown-toggle" style="background-color: #fff;color:#db241e;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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


    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form login -->
                    <form id="loginForm" action="{{ route('login') }}" method="POST">
                        @csrf <!-- CSRF token -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </form>
                    <!-- Tautan untuk membuka modal pendaftaran -->
                    <p class="mt-3 text-center">Belum punya akun? <a href="#" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Daftar disini</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Daftar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form pendaftaran -->
                    <form id="registerForm" action="{{ route('register') }}" method="POST">
                        @csrf <!-- CSRF token -->
                        <div class="form-group">
                            <label for="username">Nama Pengguna</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan nama pengguna">
                            @error('username')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate">
                            @error('birthdate')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="Male">Laki-laki</option>
                                <option value="Female">Perempuan</option>
                            </select>
                            @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Kata Sandi</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi">
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi kata sandi">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </form>
                    <!-- Tautan untuk membuka modal login -->
                    <p class="mt-3 text-center">Sudah punya akun? <a href="#" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Masuk disini</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center" id="head">
        <div class="container">
            <div class="row">
                <div class="col-5 text-left">
                    <h2>Selamat Datang di SIDITPAR</h2>
                    <p>Sistem Deteksi Dini Tuberkulosis Paru</p>
                    <p>Siditpar merupakan sistem yang dapat digunakan untuk mendeteksi dini tuberkulosis paru. Melalui sistem deteksi dini ini diharapkan dapat mendukung program berupa pemerintah Temukan TBC Obati Sampai Sembuh (TOSS TBC). Target dari program TOSS TBC yang ditetapkan oleh pemerintah yaitu 90% penurunan kasus TBC dan 95% penurunan kematian akibat TBC.</p>
                </div>
                <div class="col-5">
                    <img src="img/67af3926tosstb.jpeg" style="margin-top: -70px;" height="500vh" alt="">
                </div>
            </div>
        </div>
    </header>
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="tentang">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Tentang Tuberkulosis</h2>

            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center" style="margin-top: 10vh;">
                <div class="col-6">
                    <h4>Tuberkulosis</h4>
                    <p class="mt-4">Tuberkulosis disebabkan oleh bakteri Mycobacterium tuberculosis. Tuberkulosis umumnya menyerang organ paru-paru, namun tidak menutup kemungkinan dapat menyerang organ lain atau disebut tuberkulosis ekstra paru. Penularan tuberkulosis dapat terjadi melalui percikan dahak dari penderita ketika batuk, bersin, atau bicara.</p>
                </div>
                <div class="col-6">
                    <h4>Faktor Risiko</h4>
                    <p class="mt-4">Kelompok orang yang rentan terinfeksi tuberkulosis antara lain:</p>
                    <p>1. Penderita HIV atau gangguan imun lainya</p>
                    <p>2. Pengkomsumsi obat imunosupresan dalam jangka waktu lama</p>
                    <p>3. Perokok</p>
                    <p>4. Pengkonsumsi alkohol tinggi</p>
                    <p>5. Anak usia kurang dari 5 tahun dan lansia</p>
                            <p>6. Kontak erat dengan penderita TBC aktif</p>
                            <p>7. Petugas kesehatan</p>
                            <p>8. Berada ditempat dengan risiko tinggi penularan dalam jangka waktu lama</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section-->
    <section class="page-section" id="gejala">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Gejala Tuberkulosis</h2>
            <p style="margin-top: 10vh;">Gejala yang utama yang muncul pada penderita adalah batuk yang dialami selama dua minggu atau lebih. Batuk yang dialami dapat disertai dahak, atau dahak bercampur darah. Gejala lain yang dapat muncul umunya dapat berupa:</p>
            <div class="container" style="margin-left: 5vh;">
                <p>1. Sesak nafas</p>
                <p>2. Nyeri dada</p>
                <p>3. Demam tinggi, terutama pada malam hari</p>
                <p>4. Penurunan berat badan tanpa disengaja</p>
                <p>5. Berkeringat malam hari tanpa melakukan aktivitas</p>
                <p>6. Penurunan nafsu makan</p>
                <p>7. Malaise</p>
            </div>
        </div>
    </section>
    <!-- Copyright Section-->
   <!-- */ <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; SIDITPAR TEAM <span id="tahun"></span></small></div>
        <script>
            var tahun = new Date().getFullYear();
            document.getElementById("tahun").innerHTML = tahun;
        </script>
    </div> -->
    <div class="modal fade" id="notif" tabindex="-1" role="dialog" aria-labelledby="notifLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    @if(session('login') || session('register'))
                    <div class="card">
                        <div class="card-content p-3 text-center">
                            <h3>{{ session('login') }}{{ session('register') }}</h3>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
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
            // Periksa apakah salah satu atau kedua sesi 'login' atau 'register' ada
            var hasLogin = "{{ session('login') }}";
            var hasRegister = "{{ session('register') }}";

            if (hasLogin || hasRegister) {
                // Jika hasil diagnosis tersedia, tampilkan modal secara otomatis
                $("#notif").modal("show");

                // Atur event listener untuk menangani penutupan modal
                $('#notif').on('hidden.bs.modal', function(e) {
                    // Panggil fungsi untuk menghapus pesan hasil dari sesi
                    clearSession();
                });
            }
        });
    </script>
    
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>\
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