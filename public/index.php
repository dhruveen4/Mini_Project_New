<?php
main::start("SalesJan2009.csv");
class main{
    static public function start($SalesJan2009){
        $records = csv::getRecords($SalesJan2009);
        $table = html::generateTable($SalesJan2009);
        echo $table;
    }
}


class html{
    public static function
    generateTable($records) {
        $html = '<html>';
        $html = html_hreader::getHtmlHeader();
        $html = html_body::open_HtmlBody();

        //Start Table
        $html .= html_table::open_htmlTable();
// Header Row
//    $html .= '<tr>';

        $count = 0;


        foreach ($records as $record){

//        if($count == 0){


            $array = $record->returnArray();
            $fields = array_keys($array);
            $values = array_values($array);

            while ($count == 0){

                $html .= html_tableHead::open_TableHead();
                $html .= create_table_Rows::open_tableRow();


//            print_r($for);
//            $html1  = create_table_Header::createHeader($for);
//            $html .= $html1;


                foreach ($fields as $value) {
                    $html .= create_table_Header::createHeader($value);
                }
                $html .= create_table_Rows::close_tableRow();
                $html .= html_tableHead::close_TableHead();

                $count++;

            }
}

class create_table_Headers{

}

class create_table_Rows{

}

class tableData{

}

class html_header{

}

class html_body{

}

class html_table{

}

class html_tablehead{

}

class csv{

}

class record{

}

class recoedFactory{

}