function changeImage() {
	const prevImage = document.getElementById('prevImage');  
	const inputImage = document.getElementById('imageprdk');
  
	inputImage.addEventListener('change', function() {
	  console.log('test');
	  if (inputImage.files && inputImage.files[0]) {
		const reader = new FileReader();
		reader.onload = function(e) {
		  prevImage.src = e.target.result;
		}
  
		reader.readAsDataURL(inputImage.files[0]);
	  }
	});
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


