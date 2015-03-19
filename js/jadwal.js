(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var id_jdwl = 0;

		var main = "../../admin/jadwal/jadwal.data.php";

		// tampilkan data jadwal dari berkas jadwal.data.php
		// ke dalam <div id="data-jadwal"></div>
		$("#data-jadwal").load(main);

		


		

			//ketika dropdown memilih kelas
			$("#filter-jadwal").bind("click", function(e) {
			

			var v_prodi = $('select[name=prodi]').val();
			var v_kelas = $('select[name=kelas]').val();
			var v_angkatan = $('select[name=angkatan]').val();
			var v_semester = $('select[name=semester]').val();
			var v_thajaran = $('select[name=thajaran]').val();

            
            if(v_prodi!="" && v_kelas!="" && v_angkatan!="" && v_semester!="" && v_thajaran!="" ) {
				$.post(main, {
					filter:0,
					
					prodi: v_prodi,
					kelas: v_kelas,
					semester : v_semester,
					angkatan: v_angkatan,
					thajaran: v_thajaran

				} ,function(data) {
					// tampilkan data jadwal yang sudah di perbaharui
					// ke dalam <div id="data-jadwal"></div>
					$("#data-jadwal").html(data).show();
				});
			} else 
			{
				// tampilkan data jadwal dari berkas jadwal.data.php
				// ke dalam <div id="data-jadwal"></div>
				$("#data-jadwal").load(main);
			}
		});



/*$("#excel-jadwal").bind("click", function(e) {
			
           var url = "../../admin/jadwal/jadwal.export.act.php";
			var v_prodi = $('select[name=prodi]').val();
			var v_kelas = $('select[name=kelas]').val();
			var v_angkatan = $('select[name=angkatan]').val();
			var v_semester = $('select[name=semester]').val();
			var v_thajaran = $('select[name=thajaran]').val();

				$.post(url, {
	                
					prodi: v_prodi,
					kelas: v_kelas,
					semester : v_semester,
					angkatan: v_angkatan,
					thajaran: v_thajaran

				} ,function() {
					// tampilkan data jadwal yang sudah di perbaharui
					// ke dalam <div id="data-jadwal"></div>
					$("#data-jadwal").load(main);
        });
		});*/










		// ketika tombol ubah/tambah ditekan
		$('.ubah, .tambah').live("click", function(){

			var url = "../../admin/jadwal/jadwal.form.php";
			// ambil nilai id dari tombol ubah
			id_jdwl = this.id;

			if(id_jdwl != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data jadwal");
			} else {
				
				$("#myModalLabel").html("Tambah Data jadwal");
			}

			$.post(url, {id: id_jdwl} ,function(data) {
				// tampilkan jadwal.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
				$("#modalhilang").show();
			});
		});

$('.upload').live("click", function(){

			var url = "../../admin/jadwal/jadwal.upload.php";
			// ambil nilai id dari tombol ubah
	
				
				$("#myModalLabel").html("Upload Data jadwal");
				$("#modalhilang").hide();
				
		

			$.post(url, function(tampil) {
				// tampilkan jadwal.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(tampil);
				
			});
		});

		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "../../admin/jadwal/jadwal.input.php";
			// ambil nilai id dari tombol hapus
			id_jdwl = this.id;

			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: id_jdwl} ,function() {
					// tampilkan data jadwal yang sudah di perbaharui
					// ke dalam <div id="data-jadwal"></div>
					$("#data-jadwal").load(main);
				});
			}
		});

		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			id_hal = this.id;

			$.post(main, {halaman: id_hal} ,function(data) {
				// tampilkan data jadwal yang sudah di perbaharui
				// ke dalam <div id="data-jadwal"></div>
				$("#data-jadwal").html(data).show();
			});
		});


		// ketika tombol simpan ditekan
		$("#simpan-jadwal").bind("click", function(event) {
			

			// mengambil nilai dari inputbox, textbox dan select
			var v_prodi = $('select[name=prodi]').val();
			var v_kelas = $('select[name=kelas]').val();
			var v_angkatan = $('select[name=angkatan]').val();
			var v_semester = $('select[name=semester]').val();
			var v_thajaran = $('select[name=thajaran]').val();
			var v_hari = $('select[name=hari]').val();
			var v_jam = $('select[name=jam]').val();
			
			var v_gedung = $('select[name=gedung]').val();
			var v_lantai = $('select[name=lantai]').val();
			var v_noruang = $('select[name=noruang]').val();
			var v_mk = $('select[name=kodemk]').val();
			var v_dosen = $('select[name=dosen]').val();
			var v_asstdosen = $('select[name=asstdosen]').val();

			
			

			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(main, {
				id: id_jdwl,
				prodi: v_prodi, 
				kelas: v_kelas,
				angkatan: v_angkatan, 
				semester: v_semester, 
				thajaran: v_thajaran, 
				hari: v_hari,
				jam: v_jam,
				gedung : v_gedung,
				lantai : v_lantai,
				noruang : v_noruang,
				mk : v_mk,
				dosen: v_dosen,
				asstdosen : v_asstdosen
				} ,function() {
				// tampilkan data jadwal yang sudah di perbaharui
				// ke dalam <div id="data-jadwal"></div>
				$("#data-jadwal").load(main);

				// sembunyikan modal dialog
				$('#dialog-jadwal').modal('hide');

				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data jadwal");
			});
		});
	
	});
}) (jQuery);
