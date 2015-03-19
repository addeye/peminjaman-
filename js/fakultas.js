(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var id_fakultas = 0;
		var main = "../../admin/fakultas/fakultas.data.php";

		// tampilkan data mata kuliah dari berkas fakultas.data.php
		// ke dalam <div id="data-fakultas"></div>
		$("#data-fakultas").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data fakultas yang sudah di perbaharui
					// ke dalam <div id="data-fakultas"></div>
					$("#data-fakultas").html(data).show();
				});
			} else {
				// tampilkan data fakultas dari berkas fakultas.data.php
				// ke dalam <div id="data-fakultas"></div>
				$("#data-fakultas").load(main);
			}
		});

		// ketika tombol ubah/tambah ditekan
		$('.ubah, .tambah').live("click", function(){

			var url = "../../admin/fakultas/fakultas.form.php";
			// ambil nilai id dari tombol ubah
			id_fakultas = this.id;

			if(id_fakultas != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data Fakultas");
			} else {
				
				$("#myModalLabel").html("Tambah Data Fakultas");
			}

			$.post(url, {id: id_fakultas} ,function(data) {
				// tampilkan fakultas.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "../../admin/fakultas/fakultas.input.php";
			// ambil nilai id dari tombol hapus
			id_fakultas = this.id;

			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: id_fakultas} ,function() {
					// tampilkan data fakultas yang sudah di perbaharui
					// ke dalam <div id="data-fakultas"></div>
					$("#data-fakultas").load(main);
				});
			}
		});

		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			id_hal = this.id;

			$.post(main, {halaman: id_hal} ,function(data) {
				// tampilkan data fakultas yang sudah di perbaharui
				// ke dalam <div id="data-fakultas"></div>
				$("#data-fakultas").html(data).show();
			});
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-fakultas").bind("click", function(event) {
			var url = "../../admin/fakultas/fakultas.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			var v_fakultas = $('input:text[name=fakultas]').val();



			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {
				id: id_fakultas, 
				fakultas: v_fakultas, 

				} ,function() {
				// tampilkan data fakultas yang sudah di perbaharui
				// ke dalam <div id="data-fakultas"></div>
				$("#data-fakultas").load(main);

				// sembunyikan modal dialog
				$('#dialog-fakultas').modal('hide');

				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data Fakultas");
			});
		});
	});
}) (jQuery);
