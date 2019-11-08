
<section class="content-header">
  <h1 style="text-align: center;">Administraci&oacute;n de formularios</h1>
  <hr>
</section>

<section class="content" style="min-height:200px;">
  <div class="box centered">
    <table id="tblForms" name="tblForms" class="table table table-hover table-striped table-responsive">
        <thead>
          <th>ID</th>
          <th>NOMBRE</th>
          <th>PATH</th>
          <th>FECHA CREADO</th>
          <th>ACCIONES</th>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div class="">

    </div>
	</div>
</section>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    fillForms();
  });

  var dT = '';
  function fillForms(){
    var settings = {
    "async": true,
    "crossDomain": true,
    "url": "https://formio.grupopuntacana.com/form/",
    "method": "GET",
    "headers": {
            "x-jwt-token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7Il9pZCI6IjVkYTY0NWNmY2JkNzdlN2RkNTQyNDlmNCJ9LCJmb3JtIjp7Il9pZCI6IjVkYTY0NWJmY2JkNzdlN2RkNTQyNDllYSJ9LCJpYXQiOjE1NzMyMTg5NTYsImV4cCI6MTU3MzIzMzM1Nn0.4MBaB0PK5YlO1XAnzR4RGWLJgVXWKhf0KZE5e_4SC0I",
            "User-Agent": "PostmanRuntime/7.19.0",
            "Accept": "*/*",
            "Cache-Control": "no-cache",
            "Postman-Token": "88f5ac97-f67f-4df2-b153-93abf6c4128d,1aee4fc5-b4c3-404f-a86b-22f7ab998aba",
            "Host": "formio.grupopuntacana.com",
            "Accept-Encoding": "gzip, deflate",
            "Connection": "keep-alive",
            "cache-control": "no-cache"
        }
    }

    $.ajax(settings).done(function (response) {
        var d = response, h = '';
        for(var i=0;i<d.length;i++){
            if(d[i].type == 'form'){
                console.log('d[i]',d[i]);
                h+= '<tr>';
                h+= '<td>'+d[i]._id+'</td>';
                h+= '<td>'+d[i].title+'</td>';
                h+= '<td>'+d[i].path+'</td>';
                h+= '<td>'+d[i].created+'</td>';
                h+= '<td><button class="btn btn-default btn-xs" onclick="loadAnswers(\''+d[i]._id+'\')">Ver</button></td>';
                h+= '</tr>';
            }
            $('#tblForms tbody').html(h);
        }
        console.log(response);
    });
  }

  function loadAnswers(id){

      load_screen($("#base_url").val() + "index.php", "forms/answers/"+id, "57_tag", !0, "1")

  }
</script>
