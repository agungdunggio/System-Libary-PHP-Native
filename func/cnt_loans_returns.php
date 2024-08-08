<?php
require 'functions.php';


function insert($data): int
{
    global $conn;

    // Ambil data dari form
    $nik_anggota = htmlspecialchars($data["nik_anggota"]);
    $id_buku = htmlspecialchars($data["id_buku"]);
    $tanggal_pinjam = htmlspecialchars($data["tanggal_pinjam"]);
    $batas_pinjam = htmlspecialchars($data["batas_pinjam"]);

    $query = "INSERT INTO loans (nik_anggota, id_buku, tanggal_pinjam, batas_pinjam) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("siss", $nik_anggota, $id_buku, $tanggal_pinjam, $batas_pinjam);
    if ($stmt->execute()) {
        $id_peminjaman = $stmt->insert_id;

        $tanggal_kembali = null; 
        $denda = 0;

        $query_returns = "INSERT INTO returns (id_peminjaman, tanggal_kembali, denda) VALUES (?, ?, ?)";
        $stmt_returns = $conn->prepare($query_returns);
        $stmt_returns->bind_param("isi", $id_peminjaman, $tanggal_kembali, $denda);

        if ($stmt_returns->execute()) {
            $stmt_returns->close();
            return 1;
        } else {
            echo "Error inserting into returns: " . $stmt_returns->error;
            $stmt_returns->close();
            return -1;
        }
    } else {
        echo "Error inserting into loans: " . $stmt->error;
        $stmt->close();
        return -1;
    }

    $stmt->close();
    return 0;
}


function delete($id): int
{
    global $conn;
    
    $id = mysqli_real_escape_string($conn, $id);

    $query_returns = "DELETE FROM returns WHERE id_peminjaman = ?";
    $stmt_returns = $conn->prepare($query_returns);
    $stmt_returns->bind_param("i", $id);
    $stmt_returns->execute();
    
    $query_loans = "DELETE FROM loans WHERE id_peminjaman = ?";
    $stmt_loans = $conn->prepare($query_loans);
    $stmt_loans->bind_param("i", $id);
    $stmt_loans->execute();

    $affected_rows = mysqli_affected_rows($conn);

    $stmt_returns->close();
    $stmt_loans->close();
    
    return $affected_rows;
}


function update($data): int
{
    global $conn;

    // Ambil data dari form
    $id = htmlspecialchars($data["id_peminjaman"]);
    $nik_anggota = htmlspecialchars($data['nik_anggota']);
    $id_buku = htmlspecialchars($data['id_buku']);
    $tanggal_pinjam = htmlspecialchars($data['tanggal_pinjam']);
    $batas_pinjam = htmlspecialchars($data['batas_pinjam']);

    // Prepare the SQL query
    $query = "UPDATE loans 
              SET nik_anggota = ?, 
                  id_buku = ?, 
                  tanggal_pinjam = ?, 
                  batas_pinjam = ? 
              WHERE id_peminjaman = ?";

    // Initialize prepared statement
    $stmt = $conn->prepare($query);

    // Bind parameters to the prepared statement
    $stmt->bind_param("sissi", $nik_anggota, $id_buku, $tanggal_pinjam, $batas_pinjam, $id);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Check for errors
        if ($stmt->affected_rows > 0) {
            $stmt->close();
            return 1; // Return 1 if update was successful
        } else {
            $stmt->close();
            return 0; // Return 0 if no rows were affected (e.g., ID not found)
        }
    } else {
        // Handle error
        echo "Error updating record: " . $stmt->error;
        $stmt->close();
        return -1; // Return -1 if there was an error
    }
}



function returns($data): int {
    global $conn;

    $id = htmlspecialchars($data["id_peminjaman"]);
    $tanggal_kembali = htmlspecialchars($data['tanggal_kembali']);
    $denda = htmlspecialchars($data['denda']);

    $query = "UPDATE returns 
              SET tanggal_kembali = ?, 
                  denda = ? 
              WHERE id_peminjaman = ?;";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssi', $tanggal_kembali, $denda, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        return 0;
    }

    return 1;
}

