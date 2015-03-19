(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var id_mngjr = 0;
		var main = "../../admin/mengajar/mengajar.data.php";

		// tampilkan data mengajar dari berkas mengajar.data.php
		// ke dalam <div id="data-mengajar"></div>
		$("#data-mengajar").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data mengajar yang sudah di perbaharui
					// ke dalam <div id="data-mengajar"></div>
					$("#data-mengajar").html(data).show();
				});
			} else {
				// tampilkan data mengajar dari berkas mengajar.data.php
				// ke dalam <div id="data-mengajar"></div>
				$("#data-mengajar").load(main);
			}
		});

		// ketika tombol ubah/tambah ditekan
		$('.ubah, .tambah').live("click", function(){

			var url = "../../admin/mengajar/mengajar.form.php";
			// ambil nilai id dari tombol ubah
			id_mngjr = this.id;

			if(id_mngjr != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data Mengajar");
			} else {
				
				$("#myModalLabel").html("Tambah Data Mengajar");
			}

			$.post(url, {id: id_mngjr} ,function(data) {
				// tampilkan mengajar.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "../../admin/mengajar/mengajar.input.php";
			// ambil nilai id dari tombol hapus
			id_mngjr = this.id;

			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: id_mngjr} ,function() {
					// tampilkan data mengajar yang sudah di perbaharui
					// ke dalam <div id="data-mengajar"></div>
					$("#data-mengajar").load(main);
				});
			}
		});

		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			id_hal = this.id;

			$.post(main, {halaman: id_hal} ,function(data) {
				// tampilkan data mengajar yang sudah di perbaharui
				// ke dalam <div id="data-mengajar"></div>
				$("#data-mengajar").html(data).show();
			});
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-mengajar").bind("click", function(event) {
			var url = "../../admin/mengajar/mengajar.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			


			var v_dosen = $('select[name=dosen]').val();
			var v_mk = $('select[name=mk]').val();

			var v_semester = $('select[name=semester]').val();
			var v_thajaran = $('select[name=thajaran]').val();

			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {
				id: id_mngjr, 

				dosen: v_dosen, 
				mk: v_mk, 
				semester: v_semester, 
				thajaran: v_thajaran
				} ,function() {
				// tampilkan data mengajar yang sudah di perbaharui
				// ke dalam <div id="data-mengajar"></div>
				$("#data-mengajar").load(main);

				// sembunyikan modal dialog
				$('#dialog-mengajar').modal('hide');

				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data Mengajar");
			});
		});
	});
}) (jQuery);
