<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tanda Tangan Digital - CI3</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .signature-wrapper {
            position: relative;
            width: 100%;
            height: 250px;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 2px dashed #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        canvas#signature-pad {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            cursor: crosshair;
        }

        .card {
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Form Permohonan Menghadap</h5>
					
                </div>
                <div class="card-body">
    <form id="sig-form" action="<?= base_url('signature/save') ?>" method="POST">
        
        <div class="mb-3">
            <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Contoh: Budi Santoso" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="pekerjaan" class="form-label fw-bold">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Contoh: Karyawan Swasta" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="tanggal" class="form-label fw-bold">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= date('Y-m-d') ?>" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="keperluan" class="form-label fw-bold">Keperluan</label>
            <textarea name="keperluan" class="form-control" id="keperluan" rows="2" placeholder="Tuliskan alasan kunjungan/keperluan Anda" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Tanda Tangan Digital</label>
            <div class="signature-wrapper">
                <canvas id="signature-pad"></canvas>
            </div>
            <div class="form-text text-danger">
                <i class="bi bi-info-circle"></i> Gunakan jari atau mouse untuk tanda tangan di atas.
            </div>
        </div>

        <input type="hidden" name="signature_data" id="signature_data">

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success btn-lg">
                Simpan Data & Tanda Tangan
            </button>
            <button type="button" id="clear" class="btn btn-outline-secondary btn-sm">
                Bersihkan Tanda Tangan
            </button>
        </div>
    </form>
</div>
                <div class="card-footer text-center text-muted">
                    <small>&copy; 2026 Aplikasi Tanda Tangan - CodeIgniter 3</small>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>

<script>
    // Inisialisasi Canvas
    const canvas = document.getElementById("signature-pad");
    
    // Fungsi untuk mengatur resolusi canvas agar tidak blur
    function resizeCanvas() {
        const ratio = Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
    }

    window.onresize = resizeCanvas;
    resizeCanvas();

    const signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgba(255, 255, 255, 0)', // Transparan
        penColor: 'rgb(0, 0, 128)' // Warna tinta biru gelap
    });

    // Handle tombol hapus
    document.getElementById('clear').addEventListener('click', function() {
        signaturePad.clear();
    });

    // Handle pengiriman form
    const form = document.getElementById('sig-form');
    form.addEventListener('submit', function(e) {
        if (signaturePad.isEmpty()) {
            alert("Harap masukkan tanda tangan Anda terlebih dahulu.");
            e.preventDefault();
        } else {
            // Masukkan data base64 ke input hidden
            const dataUrl = signaturePad.toDataURL('image/png');
            document.getElementById('signature_data').value = dataUrl;
        }
    });
</script>

</body>
</html>