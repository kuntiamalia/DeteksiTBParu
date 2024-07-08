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
    <div class="container" style="margin-top: 20vh;">
        <div class="card rounded shadow-lg" style="background-color: white;">
            <div class="card-body">
                <h2 class="card-title">Riwayat Deteksi</h2>
                <div class="table-responsive">
                    <table id="riwayatTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Usia</th>
                                <th scope="col">Hasil</th>
                                
                                <!-- Tambahkan kolom lain jika diperlukan -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayatPerhitungan as $riwayat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $riwayat->created_at->format('d-m-Y') }}</td>
                                <td>{{ $riwayat->nama_pasien }}</td>
                                <td>{{ $riwayat->jenis_kelamin }}</td>
                                <td>{{ $riwayat->usia }}</td>
                                <td>{{ $riwayat->hasil }}</td>
                                
                                <!-- Tambahkan kolom lain jika diperlukan -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#riwayatTable').DataTable();
        });
    </script>
    @endpush

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