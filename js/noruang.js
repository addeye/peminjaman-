(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var id_noruang = 0;
		var main = "../../admin/no_ruangan/noruang.data.php";

		// tampilkan data mata kuliah dari berkas noruang.data.php
		// ke dalam <div id="data-noruang"></div>
		$("#data-noruang").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data noruang yang sudah di perbaharui
					// ke dalam <div id="data-noruang"></div>
					$("#data-noruang").html(data).show();
				});
			} else {
				// tampilkan data noruang dari berkas noruang.data.php
				// ke dalam <div id="data-noruang"></div>
				$("#data-noruang").load(main);
			}
		});

		// ketika tombol ubah/tambah ditekan
		$('.ubah, .tambah').live("click", function(){

			var url = "../../admin/no_ruangan/noruang.form.php";
			// ambil nilai id dari tombol ubah
			id_noruang = this.id;

			if(id_noruang != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data Nomor Ruangan");
			} else {
				
				$("#myModalLabel").html("Tambah Data Nomor Ruangan");
			}

			$.post(url, {id: id_noruang} ,function(data) {
				// tampilkan noruang.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "../../admin/no_ruangan/noruang.input.php";
			// ambil nilai id dari tombol hapus
			id_noruang = this.id;

			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: id_noruang} ,function() {
					// tampilkan data noruang yang sudah di perbaharui
					// ke dalam <div id="data-noruang"></div>
					$("#data-noruang").load(main);
				});
			}
		});

		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			id_hal = this.id;

			$.post(main, {halaman: id_hal} ,function(data) {
				// tampilkan data noruang yang sudah di perbaharui
				// ke dalam <div id="data-noruang"></div>
				$("#data-noruang").html(data).show();
			});
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-noruang").bind("click", function(event) {
			var url = "../../admin/no_ruangan/noruang.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			
			var v_noruang = $('input:text[name=noruang]').val();
		


			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {
				id: id_noruang, 
				 
				noruang: v_noruang
				

				} ,function() {
				// tampilkan data noruang yang sudah di perbaharui
				// ke dalam <div id="data-noruang"></div>
				$("#data-noruang").load(main);

				// sembunyikan modal dialog
				$('#dialog-noruang').modal('hide');

				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data Nomor Ruangan");
			});
		});
	});
}) (jQuery);
