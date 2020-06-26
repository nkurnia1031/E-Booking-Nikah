<?php

/**
 *
 */
class Crud
{
    private static $_instance = null;
    public $mysqli;
    public $mysqli2;
    public $dbname = '2020_june_rahma';

    public $result;
    public function __construct()
    {
        $server = 'localhost';
        $dbname = $this->dbname;
        $user = 'root';
        $pass = '';
        try {
            $this->mysqli = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
            $this->mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->mysqli->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $connection = $this->mysqli;
            $this->mysqli2 = new \ClanCats\Hydrahon\Builder('mysql', function ($query, $queryString, $queryParameters) use ($connection) {
                $statement = $connection->prepare($queryString);
                $statement->execute($queryParameters);

                if ($query instanceof \ClanCats\Hydrahon\Query\Sql\FetchableInterface) {

                    //Crud::collect(['ad', 'ads']);
                    return $statement->fetchAll(\PDO::FETCH_OBJ);
                }
            });

        } catch (Exception $e) {
            return $e;
        }
    }

    public static function idupin()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    public static function mysqli()
    {

        // self::$mysqli = $mysqli;
        //self::$mysqli->prepare($raw);
        //return $this;

    }
    public function raw($raw)
    {
        $this->result = $this->mysqli->query($raw)->fetchAll();
        return $this;

    }

    public function getFields($tb)
    {
        $hasil = [];
        $tes = $this->raw("SELECT * FROM information_schema.columns where TABLE_NAME='$tb' and table_schema='$this->dbname'")->result;
        foreach ($tes as $k) {
            $x = [];
            $x['name'] = $k->COLUMN_NAME;
            $x['label'] = $k->COLUMN_COMMENT;
            $x['type'] = Fungsi::$type[$k->DATA_TYPE];
            $x['max'] = $k->CHARACTER_MAXIMUM_LENGTH;

            $x['pnj'] = 12;
            $x['val'] = null;
            $x['red'] = "";
            $x['input'] = true;
            $x['up'] = true;
            $x['tb'] = true;
            $x['var'] = "input[]";
            $x['var2'] = "tb[]";

            array_push($hasil, $x);
        }
        return collect($hasil);
    }

}
