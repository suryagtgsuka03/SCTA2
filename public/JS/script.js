document.addEventListener("DOMContentLoaded", function() {
  // Mendapatkan semua elemen dengan kelas .animated
  const animatedElements = document.querySelectorAll('.animated');

  function checkAnimation() {
    // Iterasi melalui setiap elemen .animated
    animatedElements.forEach(element => {
      const elementPosition = element.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;

      // Jika elemen masuk ke dalam viewport
      if (elementPosition < windowHeight * 0.75 && elementPosition > 0) {
        // Tambahkan kelas active untuk memicu animasi
        element.classList.add('active');
      }
    });
  }

  // Panggil fungsi checkAnimation saat halaman dimuat dan saat dilakukan scroll
  document.addEventListener('scroll', checkAnimation);
  window.addEventListener('load', checkAnimation);
  
});

// umur monitoring
document.getElementById('tanggal_lahir').addEventListener('change', function() {
    var dob = new Date(this.value);
    var today = new Date();
    var age = today.getFullYear() - dob.getFullYear();

    // Check if the birthday has occurred this year or not
    if (today.getMonth() < dob.getMonth() || (today.getMonth() === dob.getMonth() && today.getDate() < dob
            .getDate())) {
        age--;
    }

    // Set the calculated age to the input field
    document.getElementById('umur').value = age;
});

// nomor KTP
document.getElementById('nomor_ktp').addEventListener('input', function() {
  if (this.value.length > 16) {
      this.value = this.value.slice(0, 16); // Menghapus karakter yang lebih dari 16
  }
});