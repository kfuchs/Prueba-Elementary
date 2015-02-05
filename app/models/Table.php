<?php 

class Table extends BaseController{

    private $_db;
    public function __construct($bd) {
        $this->_db = $bd;
    }
    public function get($editable, $table, $columns, $Search_columns, $sJoin = null) {

        $index_column = 'id';

        $sLimit = "";
        if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ) {
            $sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".intval( $_GET['iDisplayLength'] );
        }

        $sOrder = "";
        if ( isset( $_GET['iSortCol_0'] ) ) {
            $sOrder = "ORDER BY  ";
            for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ ) {
                if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" ) {
                    $sortDir = (strcasecmp($_GET['sSortDir_'.$i], 'ASC') == 0) ? 'ASC' : 'DESC';
                    $sOrder .= "`".$columns[ intval( $_GET['iSortCol_'.$i] ) ]."` ". $sortDir .", ";
                }
            }

            $sOrder = substr_replace( $sOrder, "", -2 );
            if ( $sOrder == "ORDER BY" ) {
                $sOrder = "";
            }
        }

        $Get_sSearch = $_GET['sSearch'];
        $sSearch = ltrim($Get_sSearch);
        $sWhere = "";

        if ( $sSearch != "" )
        {
            $aWords = preg_split('/\s+/', $_GET['sSearch']);
            $sWhere = "WHERE (";

            for ( $j=0 ; $j<count($aWords) ; $j++ )
            {
                if ( $aWords[$j] != "" )
                {
                    $sWhere .= "(";
                    for ( $i=0 ; $i<count($Search_columns) ; $i++ )
                    {
                        $sWhere .= $Search_columns[$i]." LIKE '%". $aWords[$j] ."%' OR ";
                    }
                    $sWhere = substr_replace( $sWhere, "", -3 );
                    $sWhere .= ") AND ";
                }
            }
        $sWhere = substr_replace( $sWhere, "", -4 );
        $sWhere .= ')';
        }

        for ( $i=0 ; $i<count($columns) ; $i++ ) 
        {
            if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' ) 
            {
                if ( $sWhere == "" ) { $sWhere = "WHERE ";}
                else { $sWhere .= " AND "; }
                $sWhere .= "`".$columns[$i]."` LIKE :search".$i." ";
            }
        }

        $sQuery = "SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $columns))."`, `".$table."`.id as id FROM `".$table."` ".$sJoin." ".$sWhere." ".$sOrder." ".$sLimit;
        $statement = $this->_db->prepare($sQuery);

        if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" ) 
        {
            $statement->bindValue(':search', '%'.$_GET['sSearch'].'%', PDO::PARAM_STR);
        }
        for ( $i=0 ; $i<count($columns) ; $i++ ) 
        {
            if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' ) 
            {
                $statement->bindValue(':search'.$i, '%'.$_GET['sSearch_'.$i].'%', PDO::PARAM_STR);
            }
        }

        $statement->execute();
        $rResult = $statement->fetchAll();
        $iFilteredTotal = current($this->_db->query('SELECT FOUND_ROWS()')->fetch());
        $sQuery = "SELECT COUNT(`".$index_column."`) FROM `".$table."`";
        $iTotal = current($this->_db->query($sQuery)->fetch());

        $output = array("sEcho" => intval($_GET['sEcho']), "iTotalRecords" => $iTotal,"iTotalDisplayRecords" => $iFilteredTotal, "aaData" => array()
        );

        foreach($rResult as $aRow) 
        {
            $row = array();
            for ( $i = 0; $i < count($columns); $i++ ) 
            { $row[] = $aRow[ $columns[$i] ];}
            if ($editable === true) {
               $row[]='<td> <i id="'.$aRow['id'].'" class="glyphicon glyphicon-pencil" OnClick="EditPerfil('.$aRow['id'].');" data-toggle="modal" data-target="#UP"></i>&nbsp;&nbsp; <i id="'.$aRow['id'].'" class="glyphicon glyphicon-trash" OnClick="DeleteConfirm('.$aRow['id'].')"></i>  </td>';
            }
            $output['aaData'][] = $row;
        }
        echo json_encode( $output );
    }
}





