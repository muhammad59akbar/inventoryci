function changeImage(input, previewId) {
    const prevImage = document.getElementById(previewId); // Mendapatkan elemen gambar berdasarkan ID

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            prevImage.src = e.target.result; // Mengupdate src elemen gambar dengan hasil dari file yang dipilih
        }
        reader.readAsDataURL(input.files[0]); // Membaca file dan mengonversinya menjadi URL data
    }
}

  

function changeInputRP() {
	const inputHarga = document.getElementById("harga");
   
	inputHarga.addEventListener("keyup", function(e) {
        let nilai = this.value.replace(/[^,\d]/g, "").toString();
        let split = nilai.split(",");
        let sisa = split[0].length % 3;
        let rupiah = split[0].substr(0, sisa);
        let ribuan = split[0].substr(sisa).match(/\d{3}/gi);
       
        if (ribuan) {
            var separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        this.value = rupiah;
    });
  


}



