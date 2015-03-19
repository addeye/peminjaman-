(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var id_akademik = 0;
		var main = "../../admin/akademik/akademik.data.php";

		// tampilkan data akademik dari berkas akademik.data.php
		// ke dalam <div id="data-akademik"></div>
		$("#data-akademik").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data akademik yang sudah di perbaharui
					// ke dalam <div id="data-akademik"></div>
					$("#data-akademik").html(data).show();
				});
			} else {
				// tampilkan data akademik dari berkas akademik.data.php
				// ke dalam <div id="data-akademik"></div>
				$("#data-akademik").load(main);
			}
		});

		// ketika tombol ubah/tambah ditekan
		$('.ubah, .tambah').live("click", function(){

			var url = "../../admin/akademik/akademik.form.php";
			// ambil nilai id dari tombol ubah
			id_akademik = this.id;

			if(id_akademik != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data Akademik");
			} else {
				
				$("#myModalLabel").html("Tambah Data Akademik");
			}

			$.post(url, {id: id_akademik} ,function(data) {
				// tampilkan akademik.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "../../admin/akademik/akademik.input.php";
			// ambil nilai id dari tombol hapus
			id_akademik = this.id;

			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: id_akademik} ,function() {
					// tampilkan data akademik yang sudah di perbaharui
					// ke dalam <div id="data-akademik"></div>
					$("#data-akademik").load(main);
				});
			}
		});

		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			id_hal = this.id;

			$.post(main, {halaman: id_hal} ,function(data) {
				// tampilkan data akademik yang sudah di perbaharui
				// ke dalam <div id="data-akademik"></div>
				$("#data-akademik").html(data).show();
			});
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-akademik").bind("click", function(event) {
			var url = "../../admin/akademik/akademik.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			


			var v_fakultas = $('select[name=fakultas]').val();
			var v_jurusan = $('select[name=jurusan]').val();

			var v_angkatan = $('select[name=angkatan]').val();


			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {
				id: id_akademik, 

				fakultas: v_fakultas, 
				jurusan: v_jurusan,  
				angkatan: v_angkatan, 
	
				} ,function() {
				// tampilkan data akademik yang sudah di perbaharui
				// ke dalam <div id="data-akademik"></div>
				$("#data-akademik").load(main);

				// sembunyikan modal dialog
				$('#dialog-akademik').modal('hide');

				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data Akademik");
			});
		});
	});
}) (jQuery);
