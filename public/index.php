<?php
main::start("examples.csv");
class main{
    static public function start($examples){
        $records = csv::getRecords($examples);
        $table = html::generateTable($examples);
       
        echo $table;
    }
}

class html{
    public static function
    generateTable($records) {
        $html = '<html>';
        $html = html_header::getHtmlHeader();
        $html = html_body::open_HtmlBody();

        //Start Table
        $html .= html_table::open_htmlTable();
// Header Row
//    $html .= '<tr>';

        $count = 0;


        foreach($records as $record){

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
                $html .= create_table_Rows::open_tableRow();
                foreach($values as  $value2){
                    $html .= tableData::printTabledata($value2);
//
                }
                $html .= create_table_Rows::close_tableRow();
            }

//Finish table and return
            $html .= html_table::close_htmlTable();
            $html .= html_body::close_HtmlBody() ;
            $html .= '</html>';

            return $html;

        }

    }

}

// create table header
class create_table_Header{

    public static function createHeader ($value){

        return '<th>'. $value . '</th>';

    }
}


// create table rows
class create_table_Rows{

    public static function open_tableRow(){
        return '<tr>';
    }
    public static function close_tableRow(){
        return '</tr>';
    }
}


// get table data
class tableData{
    public static function printTabledata ($value){
        return '<td>'. $value . '</td>';
    }
}


// get html header
class html_header{
    public static function getHtmlHeader(){

        $html_header = '<head>';
        $html_header .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';
        $html_header .= '<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>';
        $html_header .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>';
        $html_header .= '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>';
        $html_header .= '</head>';

        return $html_header;
    }
}


// create html body
class html_body{

    public static function open_HtmlBody(){
        return '<body>';
    }
    public static function close_HtmlBody(){
        return '</body>';
    }
}

// create html table
class html_table{
    public static function open_htmlTable(){
        return '<table class="table table-bordered table-striped">';
    }
    public static function close_htmlTable(){
        return '</table>';
    }
}

// create table head
class html_tableHead{
    public static function open_TableHead(){
        return '<thead class="thead-dark">';
    }
    public static function close_TableHead(){
        return '</thead >';
    }

}

class csv {

    static public function getRecords($filename){
        $file = fopen($filename,  "r");

        $fieldNames = array();

        $count =0;

        while(! feof($file)) {
            $record = fgetcsv($file);



            if ($count == 0) {
                $fieldNames = $record;
//    print_r($record);

                $count++;

            } else {
//    print_r($record);

                $records[] = recordFactory::create($fieldNames, $record);

            }
//$count++;

        }

        fclose($file);
        return $record;
    }
}

class record {

    public function __construct( array $fieldNames = null, array $values = null)

    {

//print_r($record);
        if (count($fieldNames) == count($values)) {
            $record = array_combine($fieldNames, $values);
            system::forEachloop($record,2);
            foreach ($record as $property => $value) {
                $this->createProperty($property, $value);
            }
        }
        else{
//        print "blank fields";
        }

    }

    public function createProperty($name, $value){
        $this->{$name} = $value;

    }


    public function returnArray(){

        $array = (array) $this;
//print "record return array";
//var_dump(array_keys($array) );
        return $array;

    }
}

class recordFactory {

    public static  function  create( array $fieldNames = null, array  $values = null) {

        $record = new record($fieldNames, $values);

        return $record;

    }

}
class system {
    public static function printPage($page){
        echo $page;
    }
}