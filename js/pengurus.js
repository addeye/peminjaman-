(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var id_pgr = 0;
		var main = "../../admin/pengurus/pengurus.data.php";

		// tampilkan data pengurus dari berkas pengurus.data.php
		// ke dalam <div id="data-pengurus"></div>
		$("#data-pengurus").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data pengurus yang sudah di perbaharui
					// ke dalam <div id="data-pengurus"></div>
					$("#data-pengurus").html(data).show();
				});
			} else {
				// tampilkan data pengurus dari berkas pengurus.data.php
				// ke dalam <div id="data-pengurus"></div>
				$("#data-pengurus").load(main);
			}
		});

		// ketika tombol ubah/tambah ditekan
		$('.ubah, .tambah').live("click", function(){

			var url = "../../admin/pengurus/pengurus.form.php";
			// ambil nilai id dari tombol ubah
			id_pgr = this.id;

			if(id_pgr != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data Pengurus");
			} else {
				
				$("#myModalLabel").html("Tambah Data Pengurus");
			}

			$.post(url, {id: id_pgr} ,function(data) {
				// tampilkan pengurus.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "../../admin/pengurus/pengurus.input.php";
			// ambil nilai id dari tombol hapus
			id_pgr = this.id;

			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: id_pgr} ,function() {
					// tampilkan data pengurus yang sudah di perbaharui
					// ke dalam <div id="data-pengurus"></div>
					$("#data-pengurus").load(main);
				});
			}
		});

		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			id_hal = this.id;

			$.post(main, {halaman: id_hal} ,function(data) {
				// tampilkan data pengurus yang sudah di perbaharui
				// ke dalam <div id="data-pengurus"></div>
				$("#data-pengurus").html(data).show();
			});
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-pengurus").bind("click", function(event) {
			var url = "../../admin/pengurus/pengurus.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			var v_nip = $('input:text[name=nip]').val();
			var v_nama = $('input:text[name=nama]').val();
			var v_password = $('input:text[name=password]').val();

			var v_status = $('select[name=status]').val();

			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {
				id: id_pgr, 
				nip: v_nip, 
				nama: v_nama, 
				password: v_password, 

				status: v_status
				} ,function() {
				// tampilkan data pengurus yang sudah di perbaharui
				// ke dalam <div id="data-pengurus"></div>
				$("#data-pengurus").load(main);

				// sembunyikan modal dialog
				$('#dialog-pengurus').modal('hide');

				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data Pengurus");
			});
		});
	});
}) (jQuery);
