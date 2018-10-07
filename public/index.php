<?php
main::start("SalesJan2009.csv");
class main{
    static public function start($filename){
        $records = csv::getRecords($filename);
        $table = html::generateTable($records);
        echo $table;
    }
}
class html{

}

class create_table_Headers{

}

class create_table_Rows{

}

class tableData{

}

class csv{

}

class record{

}

class recoedFactory{

}