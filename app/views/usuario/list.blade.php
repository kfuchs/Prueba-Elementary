
<div class="apollo-table" >
    <table class="table table-hover" id="example">
        <tbody style="">
            <tr>
                <td style="font-size: 14px; color:#1b7be2;" colspan="6" class="dataTables_empty">
                    Cargando datos del servidor...
                </td>
            </tr>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#example').dataTable({
                "aoColumnDefs": [
                {"sClass": "widthM",              "sTitle": "Nombre",       "aTargets": [0]},
                {"sClass": "aling_right widthS",  "sTitle": "Correo",       "aTargets": [1]},
                {"sClass": "aling_right widthS",  "sTitle": "UserName",  "aTargets": [2]},
                {"sClass": "widthM",              "sTitle": "Fecha/C", "aTargets": [3]},
                {"sClass": "widthM",              "sTitle": "Fecha/A", "aTargets": [4]},
                {"sClass": "widthM",              "sTitle": "Opciones", "aTargets": [5]},
                ],
                "bJQueryUI": false,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "usuario/tabla"
            });
        });
    </script>
</div>
