(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var id_jdwl = 0;

		var main = "../../user/jadwal/jadwal.data.php";

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










		});
}) (jQuery);
