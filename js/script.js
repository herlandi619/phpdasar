$(document).ready(function(){

    //hide tombol cari
    $('#tombol-cari').hide();

   //event ketika diketik pake jquery
   $('#keyword').on('keyup', function(){

        //memunculkan loader
        $('.loader').show();

        //cara 1 menggunakan load ajax
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val())

        //cara 2 menggunakan $.get()
        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {
            $('#container').html(data);
            $('.loader').hide();
        });


   });

});

