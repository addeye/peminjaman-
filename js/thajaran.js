(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var id_thajaran = 0;
		var main = "../../admin/thajaran/thajaran.data.php";

		// tampilkan data mata kuliah dari berkas thajaran.data.php
		// ke dalam <div id="data-thajaran"></div>
		$("#data-thajaran").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data thajaran yang sudah di perbaharui
					// ke dalam <div id="data-thajaran"></div>
					$("#data-thajaran").html(data).show();
				});
			} else {
				// tampilkan data thajaran dari berkas thajaran.data.php
				// ke dalam <div id="data-thajaran"></div>
				$("#data-thajaran").load(main);
			}
		});

		// ketika tombol ubah/tambah ditekan
		$('.ubah, .tambah').live("click", function(){

			var url = "../../admin/thajaran/thajaran.form.php";
			// ambil nilai id dari tombol ubah
			id_thajaran = this.id;

			if(id_thajaran != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data Tahun Ajaran");
			} else {
				
				$("#myModalLabel").html("Tambah Data Tahun Ajaran");
			}

			$.post(url, {id: id_thajaran} ,function(data) {
				// tampilkan thajaran.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "../../admin/thajaran/thajaran.input.php";
			// ambil nilai id dari tombol hapus
			id_thajaran = this.id;

			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: id_thajaran} ,function() {
					// tampilkan data thajaran yang sudah di perbaharui
					// ke dalam <div id="data-thajaran"></div>
					$("#data-thajaran").load(main);
				});
			}
		});

		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			id_hal = this.id;

			$.post(main, {halaman: id_hal} ,function(data) {
				// tampilkan data thajaran yang sudah di perbaharui
				// ke dalam <div id="data-thajaran"></div>
				$("#data-thajaran").html(data).show();
			});
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-thajaran").bind("click", function(event) {
			var url = "../../admin/thajaran/thajaran.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			var v_thajaran = $('input:text[name=thajaran]').val();




			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {
				id: id_thajaran, 
				thajaran: v_thajaran, 

				} ,function() {
				// tampilkan data thajaran yang sudah di perbaharui
				// ke dalam <div id="data-thajaran"></div>
				$("#data-thajaran").load(main);

				// sembunyikan modal dialog
				$('#dialog-thajaran').modal('hide');

				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data Tahun Ajaran");
			});
		});
	});
}) (jQuery);
