<?php
interface IConnection{
    //public function connect($Parameters);

    public function disconnect();

    public function consult($sql_sql);

    public function transaction($sq_transaction, $type ="");
}
{

}