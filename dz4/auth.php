<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 21.08.2016
 * Time: 12:41
 */

class DataBase {
private db_host = '';
private db_user = '';
private db_pass = '';
private db_name = '';

    public function connect(){
        if(!$this->con){
            $myconn = @mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->dn_name);
            if($myconn){
                $seldb = @mysqli_select_db($this->db_name, $myconn);
                if($seldb){
                    $this->con = true;
                    return TRUE;
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        } else {
            return TRUE;
        }
    }
//      проверка переменной соединения на существование
    public function disconnect(){
        if($this->con){
            if(@mysqli_close()){
                $this->con = false;
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    //        проверка на существование таблицы
    private $result = array();
    private function tableExist($table){
        $tablesInDb = @mysqli_query('SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"');
        if($tablesInDb){
            if(mysqli_num_rows($tablesInDb) == 1){
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    public function select($table, $rows = '*', $where = null, $order = nell){
//        выборка информации
        $q = 'SELECT '.$rows.' FROM '.$table;
        if($where !=null)
            $q .= ' WHERE '.$where;
        if($order != null)
            $q .= ' ORDER BY '.$order;
        if($this->tableExist($table)){
            $query = @mysqli_query($q);
            if($query){
                $this->numRes = mysqli_num_rows($query);
                for($i = 0; $i < $this->numRes; $i++){
                    $r = mysqli_fetch_array($query);
                    $key = array_keys($r);
                    for($x = 0; $x < count($key); $x++){
                        if(!is_int($key[$x])){
                            if(mysqli_num_rows($query) > 1)
                                $this->result[$i][$key[$x]] = $r[$key[$x]];
                            elseif (mysqli_num_rows($query) < 1)
                                $this->result = null;
                            else
                                $this->result[$key[$x]] = $r[$key[$x]];
                        }
                    }
                }
                return TRUE;
            } else {
                return FALSE;
            }
        } else
            return FALSE;
    }

    public function insert($table, $values, $rows = null){
//        вставка значений в таблицу
        if($this->tableExist($table)){
            $insert = 'INSERT INTO '.$table;
            if ($rows != null){
                $insert .= ' ('.$rows.')';
            }
            for ($i = 0; $i < count($values); $i++){
                if (is_string($values[$i]))
                    $values[$i] = '"'.$values[$i].'"';
            }
            $values = implode(',', $values);
            $insert .= ' VALUES ('.$values.')';
            $ins = @mysqli_query($insert);
            if($ins){
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
//      удаляем таблицу или запись по условию
    public function delete($table, $where = null){
        if($this->tableExist($table)){
            if($where == null){
                $delete = 'DELETE '.$table.' WHERE '.$where;
            }
            $del = @mysqli_query($delete);
            if($del){
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function update($table, $rows, $where, $condition){
        if($this->tableExist($table)){
            for ($i = 0; $i < count($where); $i++){
                if($i%2 != 0){
                    if(is_string($where[$i])){
                        if(($i+1) != null)
                            $where[$i] = '"'.$where[$i].'"';
                        else
                            $where[$i] = '"'.$where[$i].'"';
                    }
                }
            }
            $where = implode($condition, $where);
            $update = 'EPDATE '.$table.' SET ';
            $keys = array_keys($rows);
            for ($i = 0; $i < count($rows); $i++){
                if (is_string($rows,[$keys[$i]])){
                    $update .= $keys[$i].'="'.$rows[$keys[$i]].'"';
                } else{
                    $update .= $keys[$i].'='.$rows[$keys[$i]];
                }
                if($i != (count($rows)-1)){
                    $update .= ',';
                }
            }
            $update .= ' WHERE '.$where;
            $query = @mysqli_query($update);
            if($query) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
}