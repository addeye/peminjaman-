(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var id_fungru = 0;
		var main = "../../admin/fungsi_ruangan/fungru.data.php";

		// tampilkan data mata kuliah dari berkas fungru.data.php
		// ke dalam <div id="data-fungru"></div>
		$("#data-fungru").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data fungru yang sudah di perbaharui
					// ke dalam <div id="data-fungru"></div>
					$("#data-fungru").html(data).show();
				});
			} else {
				// tampilkan data fungru dari berkas fungru.data.php
				// ke dalam <div id="data-fungru"></div>
				$("#data-v").load(main);
			}
		});

		// ketika tombol ubah/tambah ditekan
		$('.ubah, .tambah').live("click", function(){

			var url = "../../admin/fungsi_ruangan/fungru.form.php";
			// ambil nilai id dari tombol ubah
			id_fungru = this.id;

			if(id_fungru != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data Ruangan");
			} else {
				
				$("#myModalLabel").html("Tambah Data Fungsi Ruangan");
			}

			$.post(url, {id: id_fungru} ,function(data) {
				// tampilkan fungru.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "../../admin/fungsi_ruangan/fungru.input.php";
			// ambil nilai id dari tombol hapus
			id_fungru = this.id;

			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: id_fungru} ,function() {
					// tampilkan data fungru yang sudah di perbaharui
					// ke dalam <div id="data-fungru"></div>
					$("#data-fungru").load(main);
				});
			}
		});

		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			id_hal = this.id;

			$.post(main, {halaman: id_hal} ,function(data) {
				// tampilkan data fungru yang sudah di perbaharui
				// ke dalam <div id="data-fungru"></div>
				$("#data-fungru").html(data).show();
			});
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-fungru").bind("click", function(event) {
			var url = "../../admin/fungsi_ruangan/fungru.input.php";

			// mengambil nilai dari inputbox, textbox dan select
		
			var v_fungru = $('input:text[name=fungru]').val();
		


			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {
				id: id_fungru, 
				fungru: v_fungru, 


				
				} ,function() {
				// tampilkan data fungru yang sudah di perbaharui
				// ke dalam <div id="data-fungru"></div>
				$("#data-fungru").load(main);

				// sembunyikan modal dialog
				
				$('#dialog-fungru').modal('hide');

				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data Fungsi Ruangan");
			});
		});
	});
}) (jQuery);
