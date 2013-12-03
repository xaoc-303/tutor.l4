<header role="navigation" class="navbar navbar-inverse navbar-fixed-top" style="box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{URL::to('/')}}"><span class="glyphicon glyphicon-{{!Session::has('user_auth')?'home':'tower'}}"></span></a>
    </div>
    <nav role="navigation" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active">
          <a href="{{URL::action('RadioController@getIndex')}}">Радио</a>
        </li>
        <li>
          <a href="#">Item 2</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(!Session::has('user_auth'))
        <li>
          <a href="{{URL::action('Admin_Controller@getAuth')}}">Авторизация</a>
        </li>
        @else
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> {{Session::get('user_name','')}} <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#" data-toggle="modal" data-target="#myModal">Сменить имя</a></li>
          <li class="divider"></li>
          <li><a href="{{URL::action('Admin_Controller@getLogout')}}">Выйти</a></li>
        </ul>
        </li>
        @endif
      </ul>
    </nav>
  </div>
</header>

<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Сменить логин</h4>
      </div>
      <div class="modal-body">
        <div id="msg-save-name"></div>
        <p>Старый логин</p>
        <input type="text" name="login_old" class="form-control"/>
        <p>Новый логин</p>
        <input type="text" name="login_new" class="form-control"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <button id="save-name" type="button" class="btn btn-primary">Сохранить</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function () {
  
  // окно смены имени открыто
  $('#myModal').on('shown.bs.modal', function () {
    $(".modal-body input:first").focus();
  });

  // попытка сменить имя
  $("#save-name").on('click', function() {
    $.post(
      "{{URL::action('MainController@postRenameLogin')}}",
      {
        login_old: $('.modal-body input[name=login_old]').val(),
        login_new: $('.modal-body input[name=login_new]').val(),
      },
      function(response){
        $("#msg-save-name").removeClass();
        $("#msg-save-name").addClass("alert");
        $("#msg-save-name").addClass( response.code == 0 ? 'alert-success' : 'alert-danger' );
        $("#msg-save-name").text(response.message);

        if(response.code == 0) {
          $(".modal-footer button").addClass("disabled");
          setTimeout(function() {
            $('#myModal').modal('hide');
            location.reload();
          }, 2000);
        }
      }
      );
  });
});
</script>