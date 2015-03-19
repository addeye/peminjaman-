(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var id_angkatan = 0;
		var main = "../../admin/angkatan/angkatan.data.php";

		// tampilkan data mata kuliah dari berkas angkatan.data.php
		// ke dalam <div id="data-angkatan"></div>
		$("#data-angkatan").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data angkatan yang sudah di perbaharui
					// ke dalam <div id="data-angkatan"></div>
					$("#data-angkatan").html(data).show();
				});
			} else {
				// tampilkan data angkatan dari berkas angkatan.data.php
				// ke dalam <div id="data-angkatan"></div>
				$("#data-angkatan").load(main);
			}
		});

		// ketika tombol ubah/tambah ditekan
		$('.ubah, .tambah').live("click", function(){

			var url = "../../admin/angkatan/angkatan.form.php";
			// ambil nilai id dari tombol ubah
			id_angkatan = this.id;

			if(id_angkatan != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data Angkatan");
			} else {
				
				$("#myModalLabel").html("Tambah Data Angkatan");
			}

			$.post(url, {id: id_angkatan} ,function(data) {
				// tampilkan angkatan.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "../../admin/angkatan/angkatan.input.php";
			// ambil nilai id dari tombol hapus
			id_angkatan = this.id;

			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: id_angkatan} ,function() {
					// tampilkan data angkatan yang sudah di perbaharui
					// ke dalam <div id="data-angkatan"></div>
					$("#data-angkatan").load(main);
				});
			}
		});

		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			id_hal = this.id;

			$.post(main, {halaman: id_hal} ,function(data) {
				// tampilkan data angkatan yang sudah di perbaharui
				// ke dalam <div id="data-angkatan"></div>
				$("#data-angkatan").html(data).show();
			});
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-angkatan").bind("click", function(event) {
			var url = "../../admin/angkatan/angkatan.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			var v_angkatan = $('input:text[name=angkatan]').val();



			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {
				id: id_angkatan, 
				angkatan: v_angkatan, 

				} ,function() {
				// tampilkan data angkatan yang sudah di perbaharui
				// ke dalam <div id="data-angkatan"></div>
				$("#data-angkatan").load(main);

				// sembunyikan modal dialog
				$('#dialog-angkatan').modal('hide');

				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data Angkatan");
			});
		});
	});
}) (jQuery);
