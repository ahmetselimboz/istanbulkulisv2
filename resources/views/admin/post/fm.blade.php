<script>
    jQuery('.imageRepo').click(function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'{{ route('imagerepo') }}',
            dataType: 'JSON',
//data:{name:name, password:password, repassword:repassword, email:email},
            success:function(data){
                $(".image_standart").append('<input type="text" name="serversearch" id="serversearch" class="form-control col-md-12 my-2 clearfix" placeholder="Sunucuda Ara" >');
                $.each( data.images, function( key, value ) {
                    $(".image_standart").append('<div class="col-md-4 mb-2">' +
                        '<img src="https://www.sonsayfa.com/'+value.slug+'" class="img-thumbnail">' +
                        '<span class="btn btn-mini btn-warning btn-default imageclick" data-src="'+value.slug+'">Seç</span>' +
                        '</div>');
                });
                $(".imageclick").on("click", function(){
                    var selected = $(this).data('src');
                    $(".image-select").append('' +
                        '<img src="https://www.sonsayfa.com/'+selected+'" class="col-md-3 p-0 d-block">' +
                        '<input name="image-select" type="hidden" value="'+selected+'">' +
                        '<span class="btn btn-danger btn-mini float-left w-25 removeimg my-1">Sil</span>');
                    $("#Repo").removeClass("show");
                    $(".image_standart").html('');
                    $(".removeimg").click(function (){
                        $(".image-select").html('');
                    });
                });
// Resim Arama
                $('#serversearch').marcoPolo({
                    url: '{{ route('searchfmkeyword') }}',
                    formatItem: function (data, $item) {
                        return  '<img src="https://www.sonsayfa.com/'+data.slug+'" style="width:10%; margin:10px " class="imageclickSearch">' + data.title;
                    },
                    onSelect: function (data, $item) {
                        console.log(data.slug)
                        $("#Repo").removeClass("show");
                        $(".image_standart").html('');
                        $(".image-select").append('' +
                            '<img src="https://www.sonsayfa.com/'+data.slug+'" class="col-md-3 p-0 d-block">' +
                            '<input name="image-select" type="hidden" value="'+data.slug+'">' +
                            '<span class="btn btn-danger btn-mini float-left w-25 removeimg my-1">Sil</span>');
                        $(".removeimg").click(function (){
                            $(".image-select").html('');
                        });
                    }
                });
// Resim Arama
            },
            error: function(xhr, status, error) {
                if(error){
//console.log("hata")
                }
            }
        });
    });
</script>