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

// Detail supir
function detailSupir(id) {
    fetch(`/monitor/${id}/detail`)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            document.getElementById(
                "detailFoto"
            ).src = `/storage/foto/${data.foto}`;
            document.getElementById(
                "detailFotoKtp"
            ).src = `/storage/foto_ktp/${data.foto_ktp}`;
            document.getElementById("detailNama").innerText = data.nama;
            document.getElementById("detailNomorKtp").innerText = data.no_ktp;
            document.getElementById("detailTanggalLahir").innerText =
                data.t_lahir;
            document.getElementById("detailUmur").innerText = data.umur;
            document.getElementById("detailPlatTruk").innerText = data.p_truk;
            document.getElementById("detailAsal").innerText = data.asal;

            // Tampilkan modal detail
            var myModal = new bootstrap.Modal(
                document.getElementById("detail_supir")
            );
            myModal.show();
        })
        .catch((error) => console.error("Error:", error));
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

//edit torder
function editTOrder(Torder) {
    document.getElementById("edit-torder").action = `/torder/${Torder.id}`;
    document.getElementById("perusahaanedit").value = Torder.perusahaan;
    document.getElementById("no_spkedit").value = Torder.no_spk;
    document.getElementById("no_doedit").value = Torder.no_do;
    document.getElementById("j_barangedit").value = Torder.j_barang;
    document.getElementById("jumlahedit").value = Torder.jumlah;
    document.getElementById("ppnedit").value = Torder.ppn;
    document.getElementById("pphedit").value = Torder.pph;
    document.getElementById("t_susutedit").value = Torder.t_susut;
    document.getElementById("c_susutedit").value = Torder.c_susut;
    document.getElementById("t_barangedit").value = Torder.t_barang;
    document.getElementById("t_bongkaredit").value = Torder.t_bongkar;
    document.getElementById("t_angkutedit").value = Torder.t_angkut;
}

// hapus torder
function deleteTOrder(id) {
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
            const form = document.getElementById("deleteTOrder");
            form.action = `/torder/${id}`;
            form.submit();
        }
    });
}

//edit PTrans
function editPTrans(PTrans) {
    document.getElementById("edit-ptrans").action = `/ptrans/${PTrans.id}`;
    document.getElementById("editno_do").value = PTrans.no_do;
    document.getElementById("plat_trukedit").value = PTrans.plat_truk;
    document.getElementById("supiredit").value = PTrans.supir;
    document.getElementById("tgl_muatedit").value = PTrans.tgl_muat;
    document.getElementById("tgl_bongkaredit").value = PTrans.tgl_bongkar;
    document.getElementById("tot_muatedit").value = PTrans.tot_muat;
    document.getElementById("tot_bongkaredit").value = PTrans.tot_bongkar;
    document.getElementById("no_spbedit").value = PTrans.no_spb;
}

// hapus ptrans
function deletePTrans(id) {
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
            const form = document.getElementById("deletePTrans");
            form.action = `/ptrans/${id}`;
            form.submit();
        }
    });
}

//edit invoice
function editInvoice(invoice) {
    document.getElementById("edit-invoice").action = `/invoice/${invoice.id}`;
    document.getElementById("editt_masuk").value = invoice.t_masuk;
    document.getElementById("editt_kirim").value = invoice.t_kirim;
    document.getElementById("editdurasi").value = invoice.durasi;
    document.getElementById("editi_nomor").value = invoice.i_nomor;
    document.getElementById("editj_ditagih").value = invoice.j_ditagih;
    document.getElementById("editj_dibayar").value = invoice.j_dibayar;
    document.getElementById("editn_pajak").value = invoice.n_pajak;
    document.getElementById("editnom_pajak").value = invoice.nom_pajak;
}

// hapus invoice
function deleteInvoice(id) {
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
            const form = document.getElementById("deleteInvoice");
            form.action = `/invoice/${id}`;
            form.submit();
        }
    });
}
