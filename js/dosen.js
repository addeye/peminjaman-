(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var id_pgr = 0;
		var main = "../../admin/dosen/dosen.data.php";

		// tampilkan data dosen dari berkas dosen.data.php
		// ke dalam <div id="data-dosen"></div>
		$("#data-dosen").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data dosen yang sudah di perbaharui
					// ke dalam <div id="data-dosen"></div>
					$("#data-dosen").html(data).show();
				});
			} else {
				// tampilkan data dosen dari berkas dosen.data.php
				// ke dalam <div id="data-dosen"></div>
				$("#data-dosen").load(main);
			}
		});

		// ketika tombol ubah/tambah ditekan
		$('.ubah, .tambah').live("click", function(){

			var url = "../../admin/dosen/dosen.form.php";
			// ambil nilai id dari tombol ubah
			id_dsn = this.id;

			if(id_dsn != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data Dosen");
			} else {
				
				$("#myModalLabel").html("Tambah Data Dosen");
			}

			$.post(url, {id: id_dsn} ,function(data) {
				// tampilkan dosen.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "../../admin/dosen/dosen.input.php";
			// ambil nilai id dari tombol hapus
			id_dsn = this.id;

			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: id_dsn} ,function() {
					// tampilkan data dosen yang sudah di perbaharui
					// ke dalam <div id="data-dosen"></div>
					$("#data-dosen").load(main);
				});
			}
		});

		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			id_hal = this.id;

			$.post(main, {halaman: id_hal} ,function(data) {
				// tampilkan data dosen yang sudah di perbaharui
				// ke dalam <div id="data-dosen"></div>
				$("#data-dosen").html(data).show();
			});
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-dosen").bind("click", function(event) {
			var url = "../../admin/dosen/dosen.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			var v_nip = $('input:text[name=nip]').val();
			var v_nama = $('input:text[name=nama]').val();
			var v_password = $('input:text[name=password]').val();

			var v_status = $('select[name=status]').val();

			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {
				id: id_dsn, 
				nip: v_nip, 
				nama: v_nama, 
				password: v_password, 

				status: v_status
				} ,function() {
				// tampilkan data dosen yang sudah di perbaharui
				// ke dalam <div id="data-dosen"></div>
				$("#data-dosen").load(main);

				// sembunyikan modal dialog
				$('#dialog-dosen').modal('hide');

				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data Dosen");
			});
		});
	});
}) (jQuery);
