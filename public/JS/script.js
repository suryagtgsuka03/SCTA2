// animasi company profile
document.addEventListener("DOMContentLoaded", function () {
    // Mendapatkan semua elemen dengan kelas .animated
    const animatedElements = document.querySelectorAll(".animated");

    function checkAnimation() {
        // Iterasi melalui setiap elemen .animated
        animatedElements.forEach((element) => {
            const elementPosition = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;

            // Jika elemen masuk ke dalam viewport
            if (elementPosition < windowHeight * 0.75 && elementPosition > 0) {
                // Tambahkan kelas active untuk memicu animasi
                element.classList.add("active");
            }
        });
    }

    // Panggil fungsi checkAnimation saat halaman dimuat dan saat dilakukan scroll
    document.addEventListener("scroll", checkAnimation);
    window.addEventListener("load", checkAnimation);
});

// umur monitoring
document
    .getElementById("tanggal_lahir")
    .addEventListener("change", function () {
        var dob = new Date(this.value);
        var today = new Date();
        var age = today.getFullYear() - dob.getFullYear();
        if (
            today.getMonth() < dob.getMonth() ||
            (today.getMonth() === dob.getMonth() &&
                today.getDate() < dob.getDate())
        ) {
            age--;
        }
        document.getElementById("umur").value = age;
    });

// edit umur monitoring
document
    .getElementById("editTanggalLahir")
    .addEventListener("change", function () {
        var dob = new Date(this.value);
        var today = new Date();
        var age = today.getFullYear() - dob.getFullYear();
        if (
            today.getMonth() < dob.getMonth() ||
            (today.getMonth() === dob.getMonth() &&
                today.getDate() < dob.getDate())
        ) {
            age--;
        }
        document.getElementById("editUmur").value = age;
    });

// nomor KTP monitoring
document.getElementById("nomor_ktp").addEventListener("input", function () {
    if (this.value.length > 16) {
        this.value = this.value.slice(0, 16);
    }
});

// edit nomor KTP monitoring
document.getElementById("editNomorKtp").addEventListener("input", function () {
    if (this.value.length > 16) {
        this.value = this.value.slice(0, 16);
    }
});

// Edit Supir monitoring
document.addEventListener("DOMContentLoaded", function () {
    var edit_supir = document.getElementById("edit_supir");
    edit_supir.addEventListener("show.bs.modal", function (event) {
        var button = event.relatedTarget;
        var supirId = button.getAttribute("data-id");

        fetch("/monitor/" + supirId + "/edit")
            .then((response) => response.json())
            .then((data) => {
                document.getElementById("editNama").value = data.nama;
                document.getElementById("editNomorKtp").value = data.no_ktp;
                document.getElementById("editTanggalLahir").value =
                    data.t_lahir;
                document.getElementById("editUmur").value = data.umur;
                document.getElementById("editPlatTruk").value = data.p_truk;
                document.getElementById("editAsal").value = data.asal;
                var form = document.getElementById("editSupirForm");
                form.action = "/monitor/" + supirId;
            });
    });
});

// hapus supir monitoring
function deleteSupir(id) {
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Data ini tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById("deleteSupir");
            form.action = `/supir/${id}`;
            form.submit();
        }
    });
}

// edit pengeluaran
function editPengeluaran(pengeluaran) {
    document.getElementById(
        "edit-pengeluaran"
    ).action = `/pengeluaran/${pengeluaran.id}`;
    document.getElementById("tanggal").value = pengeluaran.tanggal;
    document.getElementById("jumlah").value = pengeluaran.jumlah;
    document.getElementById("sumber").value = pengeluaran.sumber;
    document.getElementById("keterangan").value = pengeluaran.keterangan;
}

// hapus pengeluaran
function deletePengeluaran(id) {
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Data ini tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById("deletePengeluaran");
            form.action = `/pengeluaran/${id}`;
            form.submit();
        }
    });
}

//edit pemasukan
function editPemasukan(pemasukan) {
    document.getElementById(
        "pemasukan-edit-form"
    ).action = `/pemasukan/${pemasukan.id}`;
    document.getElementById("tanggal").value = pemasukan.tanggal;
    document.getElementById("jumlah").value = pemasukan.jumlah;
    document.getElementById("sumber").value = pemasukan.sumber;
    document.getElementById("keterangan").value = pemasukan.keterangan;
}

// hapus pemasukan
function deletePemasukan(id) {
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Data ini tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById("deletePemasukan");
            form.action = `/pembukuan/${id}`;
            form.submit();
        }
    });
}
