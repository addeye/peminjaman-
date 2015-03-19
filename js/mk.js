(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var id_mk = 0;
		var main = "../../admin/mk/mk.data.php";

		// tampilkan data mata kuliah dari berkas mk.data.php
		// ke dalam <div id="data-mk"></div>
		$("#data-mk").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data mk yang sudah di perbaharui
					// ke dalam <div id="data-mk"></div>
					$("#data-mk").html(data).show();
				});
			} else {
				// tampilkan data mk dari berkas mk.data.php
				// ke dalam <div id="data-mk"></div>
				$("#data-mk").load(main);
			}
		});

		// ketika tombol ubah/tambah ditekan
		$('.ubah, .tambah').live("click", function(){

			var url = "../../admin/mk/mk.form.php";
			// ambil nilai id dari tombol ubah
			id_mk = this.id;

			if(id_mk != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data Mata Kuliah");
			} else {
				
				$("#myModalLabel").html("Tambah Data Mata Kuliah");
			}

			$.post(url, {id: id_mk} ,function(data) {
				// tampilkan mk.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "../../admin/mk/mk.input.php";
			// ambil nilai id dari tombol hapus
			id_mk = this.id;

			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: id_mk} ,function() {
					// tampilkan data mk yang sudah di perbaharui
					// ke dalam <div id="data-mk"></div>
					$("#data-mk").load(main);
				});
			}
		});

		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			id_hal = this.id;

			$.post(main, {halaman: id_hal} ,function(data) {
				// tampilkan data mk yang sudah di perbaharui
				// ke dalam <div id="data-mk"></div>
				$("#data-mk").html(data).show();
			});
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-mk").bind("click", function(event) {
			var url = "../../admin/mk/mk.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			var v_kdmk = $('input:text[name=kdmk]').val();
			var v_mk = $('input:text[name=mk]').val();
			var v_sks = $('input:text[name=sks]').val();


			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {
				id: id_mk, 
				kdmk: v_kdmk, 
				mk: v_mk, 
				sks: v_sks

				} ,function() {
				// tampilkan data mk yang sudah di perbaharui
				// ke dalam <div id="data-mk"></div>
				$("#data-mk").load(main);

				// sembunyikan modal dialog
				$('#dialog-mk').modal('hide');

				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data Mata Kuliah");
			});
		});
	});
}) (jQuery);
