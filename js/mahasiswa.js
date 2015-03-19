(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var id_mhs = 0;
		var main = "../../admin/mahasiswa/mahasiswa.data.php";

		// tampilkan data mahasiswa dari berkas mahasiswa.data.php
		// ke dalam <div id="data-mahasiswa"></div>
		$("#data-mahasiswa").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data mahasiswa yang sudah di perbaharui
					// ke dalam <div id="data-mahasiswa"></div>
					$("#data-mahasiswa").html(data).show();
				});
			} else {
				// tampilkan data mahasiswa dari berkas mahasiswa.data.php
				// ke dalam <div id="data-mahasiswa"></div>
				$("#data-mahasiswa").load(main);
			}
		});

		// ketika tombol ubah/tambah ditekan
		$('.ubah, .tambah').live("click", function(){

			var url = "../../admin/mahasiswa/mahasiswa.form.php";
			// ambil nilai id dari tombol ubah
			id_mhs = this.id;

			if(id_mhs != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data Mahasiswa");
			} else {
				
				$("#myModalLabel").html("Tambah Data Mahasiswa");
			}

			$.post(url, {id: id_mhs} ,function(data) {
				// tampilkan mahasiswa.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "../../admin/mahasiswa/mahasiswa.input.php";
			// ambil nilai id dari tombol hapus
			id_mhs = this.id;

			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: id_mhs} ,function() {
					// tampilkan data mahasiswa yang sudah di perbaharui
					// ke dalam <div id="data-mahasiswa"></div>
					$("#data-mahasiswa").load(main);
				});
			}
		});

		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			id_hal = this.id;

			$.post(main, {halaman: id_hal} ,function(data) {
				// tampilkan data mahasiswa yang sudah di perbaharui
				// ke dalam <div id="data-mahasiswa"></div>
				$("#data-mahasiswa").html(data).show();
			});
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-mahasiswa").bind("click", function(event) {
			var url = "../../admin/mahasiswa/mahasiswa.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			var v_nim = $('input:text[name=nim]').val();
			var v_nama = $('input:text[name=nama]').val();
			var v_password = $('input:text[name=password]').val();
			var v_prodi = $('select[name=prodi]').val();
			var v_jurusan = $('select[name=jurusan]').val();
			var v_kelas = $('select[name=kelas]').val();
			var v_angkatan = $('select[name=angkatan]').val();
			var v_status = $('select[name=status]').val();

			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {
				id: id_mhs, 
				nim: v_nim, 
				nama: v_nama, 
				password: v_password, 
				prodi: v_prodi, 
				jurusan: v_jurusan, 
				kelas: v_kelas,
				angkatan: v_angkatan,  
				status: v_status
				} ,function() {
				// tampilkan data mahasiswa yang sudah di perbaharui
				// ke dalam <div id="data-mahasiswa"></div>
				$("#data-mahasiswa").load(main);

				// sembunyikan modal dialog
				$('#dialog-mahasiswa').modal('hide');

				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data Mahasiswa");
			});
		});
	});
}) (jQuery);
