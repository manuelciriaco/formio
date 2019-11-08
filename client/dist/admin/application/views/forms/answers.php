<?php
/**
 * Created by PhpStorm.
 * User: dduran
 * Date: 11/8/2019
 * Time: 9:07 AM
 */
?>
<div class = 'row'>
    <div class = 'col-md-2'>
        <a onclick = "goBackToList()" class = 'btn btn-light' href="#" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Ir &#193tras</a>
    </div>
</div>
<section class="content-header">
  <h1 style="text-align: center;">Listado de Respuestas</h1>
  <br>
</section>
<div class = 'row'>

    <div class = 'centered' >
<table id="myTable" class="table table-hover table-striped table-responsive">
    <thead>
    <tr>
        <th scope="col">Campo 1</th>
        <th scope="col">Campo 2</th>
        <th scope="col">Campo 3</th>
        <th scope="col">Campo 4</th>
        <th scope="col">Campo 5</th>
        <th scope="col">Campo 6</th>
        <th scope="col">Campo 7</th>
        <th scope="col">Campo 8</th>
        <th scope="col">Fecha Creación</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($data)){

        foreach ($data as $row){
            $timestamp = strtotime($row->fecha_creacion);
            $date = date('d/m/y',$timestamp );

            echo <<<HTML
            
            <tr> 
                <td>{$row->campo1}</td>
                <td>{$row->campo2}</td>
                <td>{$row->campo3}</td>
                <td>{$row->campo4}</td>
                <td>{$row->campo5}</td>
                <td>{$row->campo6}</td>
                <td>{$row->campo7}</td>
                <td>{$row->campo8}</td>
                <td>{$date}</td>  
            </tr>



HTML;

        }
        
            
    }
    
    
    ?>
    </tbody>
</table>
</div>
</div>


<script>
    $(document).ready( function () {
        $.fn.dataTable.ext.classes.sPageButton = 'btn btn-default';
        $('#myTable').DataTable();
    } );

    function goBackToList(){
        load_screen($("#base_url").val() + "index.php", "forms/list", "57_tag", !0, "1");

    }
</script>