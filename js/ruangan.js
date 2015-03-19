(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var id_ruangan = 0;
		var main = "../../admin/ruangan/ruangan.data.php";

		// tampilkan data ruangan dari berkas ruangan.data.php
		// ke dalam <div id="data-ruangan"></div>
		$("#data-ruangan").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data ruangan yang sudah di perbaharui
					// ke dalam <div id="data-ruangan"></div>
					$("#data-ruangan").html(data).show();
				});
			} else {
				// tampilkan data ruangan dari berkas ruangan.data.php
				// ke dalam <div id="data-ruangan"></div>
				$("#data-ruangan").load(main);
			}
		});

		// ketika tombol ubah/tambah ditekan
		$('.ubah, .tambah').live("click", function(){

			var url = "../../admin/ruangan/ruangan.form.php";
			// ambil nilai id dari tombol ubah
			id_ruangan = this.id;

			if(id_ruangan != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data Ruangan");
			} else {
				
				$("#myModalLabel").html("Tambah Data Ruangan");
			}

			$.post(url, {id: id_ruangan} ,function(data) {
				// tampilkan ruangan.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "../../admin/ruangan/ruangan.input.php";
			// ambil nilai id dari tombol hapus
			id_ruangan = this.id;

			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: id_ruangan} ,function() {
					// tampilkan data ruangan yang sudah di perbaharui
					// ke dalam <div id="data-ruangan"></div>
					$("#data-ruangan").load(main);
				});
			}
		});

		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			id_hal = this.id;

			$.post(main, {halaman: id_hal} ,function(data) {
				// tampilkan data ruangan yang sudah di perbaharui
				// ke dalam <div id="data-ruangan"></div>
				$("#data-ruangan").html(data).show();
			});
		});
		
		$('.tamil').live("click", function(event){
			var url = "../../admin/ruangan/denah_ruangan.php";
			// mengambil nilai dari inputbox
			id_ruang = this.id;

			$.post(url, {id: id_ruang} ,function(data) {
				// tampilkan data ruangan yang sudah di perbaharui
				// ke dalam <div id="data-ruangan"></div>
				$(".modalview").html(data).show();
			});
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-ruangan").bind("click", function(event) {
			var url = "../../admin/ruangan/ruangan.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			var v_gedung = $('select[name=gedung]').val();
			var v_lantai = $('select[name=lantai]').val();
				var v_noruang = $('select[name=noruang]').val();
				var v_fungru = $('select[name=fungru]').val();
			var v_kapasitas = $('input:text[name=kapasitas]').val();
			//var v_denah = $('input:file[name=denah]').val();
		
			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url,{
				id: id_ruangan, 
				gedung: v_gedung, 
				lantai: v_lantai, 
				noruang: v_noruang, 
				fungru: v_fungru, 
				kapasitas: v_kapasitas 
				//denah: v_denah				
				} ,function() {
				// tampilkan data ruangan yang sudah di perbaharui
				// ke dalam <div id="data-ruangan"></div>
				$("#data-ruangan").load(main);


				// sembunyikan modal dialog
				$('#dialog-ruangan').modal('hide');

				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data Ruangan");
			} 
			);
		});
	});
}) (jQuery);
