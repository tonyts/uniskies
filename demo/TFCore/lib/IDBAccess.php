<?php

/**
 * DataBase Access interface
 *
 * @author Tony Tsang
 */
interface IDBAccess {
    /**
     * Execution a Database query, return the resource tag.
     *
     * @param string $exec The query string
     * @return The query result tag or FALSE.
     */
    function ExecuteQuery($exec);
    /**
     * Execution a Database query, return the result array.
     *
     * @param string $exec The query string
     * @return array The query result array or FALSE.
     */
    function ExecuteArray($exec);
    /**
     * Execution a Database query, return the rows number.
     *
     * @param string $exec The query string
     * @return int The query result rows or FALSE.
     */
    function ExecuteRowsNumber($exec);
    /**
     * Get the last insert id.
     */
    function LastInsertID();
    /**
     * Get the select fields.
     */
    function GetFields($exce);
    
    function FilterValue($value);
    /**
     * Reconnect to database
     */
    public function Reconnect();
    /**
     * Return Select Query List
     */
    public function GetQueryHistory();
    
    public function GetLastError();
    
    public function FreeResult();
}
?>
