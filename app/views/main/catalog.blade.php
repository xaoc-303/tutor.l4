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
        $.getJSON("{{URL::action('CatalogController@getFilesInDir')}}/"+url,
            function(data){
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
                    case 'img':
                    case 'video':
                    case 'music':
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