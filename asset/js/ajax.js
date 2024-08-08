$(document).ready(function() {
    // Fungsi untuk memuat konten
    function loadContent(page) {
        $.ajax({
            url: 'views/' + page, // URL endpoint PHP atau file yang menyediakan konten
            type: 'GET',
            success: function(response) {
                $('.main-content').html(response); // Isi konten ke div.main-content
            },
            error: function(xhr, status, error) {
                console.log('Error:', status, error); // Debugging error
                $('.main-content').html('<p>Terjadi kesalahan saat memuat konten.</p>');
            }
        });
    }

    // Tangani klik menu
    $('ul li a').on('click', function(e) {
        e.preventDefault();
        var href = $(this).attr('href').substring(1); // Ambil ID dari href (misalnya 'dashboard')

        // Mapping href ke file PHP atau endpoint
        var page;
        switch (href) {
            case 'dashboard':
                page = 'dashboard.php';
                break;
            case 'member':
                page = 'members.php';
                break;
            case 'book':
                page = 'books.php';
                break;
            case 'transaction':
                page = 'loans_returns.php';
                break;
            case 'logout':
                window.location.href = './func/logout.php';
                return; // Menghentikan eksekusi script lebih lanjut
            default:
                page = '404.php'; // Halaman tidak ditemukan
        }

        loadContent(page);
    });

    // Mengambil path dari URL
    var pathname = window.location.pathname;

    // Mengambil nama file dari path
    var filename = pathname.split('/').pop();
    console.log(filename);
    if (filename == "admin.php" ) {
        // Muat konten default pada halaman awal
        loadContent('dashboard.php');
    }
});
