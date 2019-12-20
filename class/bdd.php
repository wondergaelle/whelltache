<?php
class Db
{
    private $_host = '127.0.0.1';
    private $_dbname = 'whelltache';
    private $_user = 'root';
    private $_password = 'root';
    private $_port = 8889;
    private $_link = false;

    public function __construct()
    {
        try {
            $this->_link = new PDO('mysql:dbname=' . $this->_dbname . ';host=' . $this->_host.";port=".$this->_port, $this->_user, $this->_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            die('Connexion échouée : ' . $e->getMessage());
        }
    }

    public function selectAll($table)
    {
        $query = "SELECT * FROM $table ";
        $stmt = $this->_link->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function select($table, $parametres)
    {

        $filtre = $this->_prepareParam1($parametres);

        $query = "SELECT * FROM $table WHERE $filtre";

        return $this->_query($query,$table, $parametres);
    }

    public function delete($table, $parametres)
    {

        $filtre = $this->_prepareParam1($parametres);

        $query = "DELETE FROM $table WHERE $filtre";

        return $this->_query($query,$table, $parametres);
    }

    private function _query($query, $table, $parametres)
    {
        $stmt = $this->_link->prepare($query);

        $this->_prepareParam2($parametres, $stmt);

        $stmt->execute();
        return $stmt->fetchAll();
    }

    private function _prepareParam1($parametres)
    {
        $filtre = " 1 = 1 ";

        foreach ($parametres as $key => $p)
        {
            $filtre .= " AND ".$key." =:".$key;
        }

        return $filtre;
    }

/*    private function _prepareParam2( $parametres, $stmt )
    {
        foreach ($parametres as $key => $p)
        {
            $stmt->bindParam(':'.$key, $p, PDO::PARAM_STR);
        }
    }*/
}
