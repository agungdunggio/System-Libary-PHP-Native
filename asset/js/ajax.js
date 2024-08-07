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

    // Tangani klik menu dengan event delegation
    $(document).on('click', 'ul li a, .section-member a', function(e) {
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
            case 'add_member':
                page = 'add/add_member.php';
                break;
            case 'add_book':
                page = 'add/add_book.php';
                break;
            case 'add_transaction':
                page = 'add_loans_returns.php';
                break;
            case 'logout':
                window.location.href = './func/logout.php';
                return; // Menghentikan eksekusi script lebih lanjut
            default:
                page = '404.php'; // Halaman tidak ditemukan
        }
        
        loadContent(page);
    });



    // Muat konten default pada halaman awal
    loadContent('dashboard.php');
});
