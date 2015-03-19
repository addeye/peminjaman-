(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var id_gedung = 0;
		var main = "../../admin/gedung/gedung.data.php";

		// tampilkan data mata kuliah dari berkas gedung.data.php
		// ke dalam <div id="data-gedung"></div>
		$("#data-gedung").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data gedung yang sudah di perbaharui
					// ke dalam <div id="data-gedung"></div>
					$("#data-gedung").html(data).show();
				});
			} else {
				// tampilkan data gedung dari berkas gedung.data.php
				// ke dalam <div id="data-gedung"></div>
				$("#data-gedung").load(main);
			}
		});

		// ketika tombol ubah/tambah ditekan
		$('.ubah, .tambah').live("click", function(){

			var url = "../../admin/gedung/gedung.form.php";
			// ambil nilai id dari tombol ubah
			id_gedung = this.id;

			if(id_gedung != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data Gedung");
			} else {
				
				$("#myModalLabel").html("Tambah Data Gedung");
			}

			$.post(url, {id: id_gedung} ,function(data) {
				// tampilkan gedung.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "../../admin/gedung/gedung.input.php";
			// ambil nilai id dari tombol hapus
			id_gedung = this.id;

			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: id_gedung} ,function() {
					// tampilkan data gedung yang sudah di perbaharui
					// ke dalam <div id="data-gedung"></div>
					$("#data-gedung").load(main);
				});
			}
		});

		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			id_hal = this.id;

			$.post(main, {halaman: id_hal} ,function(data) {
				// tampilkan data gedung yang sudah di perbaharui
				// ke dalam <div id="data-gedung"></div>
				$("#data-gedung").html(data).show();
			});
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-gedung").bind("click", function(event) {
			var url = "../../admin/gedung/gedung.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			
			var v_gedung = $('input:text[name=gedung]').val();
		


			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {
				id: id_gedung, 
				 
				gedung: v_gedung
				

				} ,function() {
				// tampilkan data gedung yang sudah di perbaharui
				// ke dalam <div id="data-gedung"></div>
				$("#data-gedung").load(main);

				// sembunyikan modal dialog
				$('#dialog-gedung').modal('hide');

				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data Gedung");
			});
		});
	});
}) (jQuery);
