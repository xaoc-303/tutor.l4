<div class="row">
<div class="col-md-3"><ul class="nav nav-pills nav-stacked catalog-menu" style="max-width: 300px;"></ul></div>
<div id="catalog-content" class="col-md-9"></div>
</div>
<script type="text/javascript">

    function DelegateCatalogMenu() {
        $(".catalog-menu li").delegate("a","click", function() {
            Request($(this).attr('data-url'));
        });
    };

    function Request(url){
        console.log(url);
        $.getJSON("{{URL::action('CatalogController@getFilesInDir')}}/"+url,
            function(data){
                console.log(data);
                switch (data[0]) {
                    case 'files':
                        $(".catalog-menu li").undelegate("a","click");
                        $(".catalog-menu li").remove();
                        $.each(data[1], function(key, val){
                            $(".catalog-menu").append('<li><a href="#" data-url="' + val.href + '">' + val.text + '</a></li>');
                        });
                        DelegateCatalogMenu();
                        break;
                    case 'text':
                        $("#catalog-content").html(data[1]);
                        break;
                    case 'img':
                        $("#catalog-content").html(data[1]);
                        break;
                }

            }

        );
    };





    $(function(){
        Request('');
    });
</script>