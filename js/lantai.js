(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var id_lantai = 0;
		var main = "../../admin/lantai/lantai.data.php";

		// tampilkan data mata kuliah dari berkas lantai.data.php
		// ke dalam <div id="data-lantai"></div>
		$("#data-lantai").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data lantai yang sudah di perbaharui
					// ke dalam <div id="data-lantai"></div>
					$("#data-lantai").html(data).show();
				});
			} else {
				// tampilkan data lantai dari berkas lantai.data.php
				// ke dalam <div id="data-lantai"></div>
				$("#data-lantai").load(main);
			}
		});

		// ketika tombol ubah/tambah ditekan
		$('.ubah, .tambah').live("click", function(){

			var url = "../../admin/lantai/lantai.form.php";
			// ambil nilai id dari tombol ubah
			id_lantai = this.id;

			if(id_lantai != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data Lantai");
			} else {
				
				$("#myModalLabel").html("Tambah Data Lantai");
			}

			$.post(url, {id: id_lantai} ,function(data) {
				// tampilkan lantai.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "../../admin/lantai/lantai.input.php";
			// ambil nilai id dari tombol hapus
			id_lantai = this.id;

			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: id_lantai} ,function() {
					// tampilkan data lantai yang sudah di perbaharui
					// ke dalam <div id="data-lantai"></div>
					$("#data-lantai").load(main);
				});
			}
		});

		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			id_hal = this.id;

			$.post(main, {halaman: id_hal} ,function(data) {
				// tampilkan data lantai yang sudah di perbaharui
				// ke dalam <div id="data-lantai"></div>
				$("#data-lantai").html(data).show();
			});
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-lantai").bind("click", function(event) {
			var url = "../../admin/lantai/lantai.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			
			var v_lantai = $('input:text[name=lantai]').val();
		


			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {
				id: id_lantai, 
				 
				lantai: v_lantai
				

				} ,function() {
				// tampilkan data lantai yang sudah di perbaharui
				// ke dalam <div id="data-lantai"></div>
				$("#data-lantai").load(main);

				// sembunyikan modal dialog
				$('#dialog-lantai').modal('hide');

				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data Lantai");
			});
		});
	});
}) (jQuery);
