<?php
namespace salfadeco;

class Crud{
	
	var $tables=[];
	var $columns=[];
	var $values=[];
	var $clausules=[];
	var $clausulesOR=[];
	var $orders=[];
	var $start=null;
	var $quantity=null;
	var $tableName=null;
	var $joins=[];
	
	public function setTable($table, $alias=''){
		$this->tableName=$table;
		$this->tables[]=['table'=>$table, 'alias'=>$alias];
	}
	
	public function setValue($col, $val){
		$this->values[$col]=$val;
	}
	
	public function setClausule($col, $op, $val){
		$this->clausules[]=[$col, $op, $val];
	}
	
	public function setClausuleOR($clausules){
		$this->clausulesOR[]=$clausules;
	}
	
	public function setJoin($col1, $op, $col2){
		$this->joins[]=[$col1, $op, $col2];
	}
	
	public function setLimits($start, $quantity){
		$this->start=$start;
		$this->quantity=$quantity;
	}
	
	public function setOrder($col, $val='asc'){
		$this->orders[]=[$col, $val];
	}
	
	public function getMaxId(){
		$primaryKey=$this->getPrimarykey();
		$row=$this->execQueryFirst("select max($primaryKey) as id \n from $this->tableName");
		if(!empty($row)){
			return $row['id'];
		}
		return 0;
	}
	
	public function fixColumn($val){
		if(preg_match("/(.*)\.(.*)/", $val, $match)){
			return "{$match[1]}.`{$match[2]}`";
		}
		return "`{$val}`";
	}
	
	public function fixValue($val){
		return filter_var($val, FILTER_SANITIZE_MAGIC_QUOTES);
	}
	
	private function getValuesUpdateSql(){
		$values="";
		foreach($this->values as $col => $val){
			if(!empty($values)){
				$values.=", \n";
			}
			$values.=$val===null? "`{$col}` = null" : "`{$col}` = '{$this->fixValue($val)}'";
		}
		return $values;
	}
	
	private function getValuesInsertSql(){
		$values="";
		foreach($this->values as $col => $val){
			if(!empty($values)){
				$values.=", \n";
			}
			$values.=$val===null? "null" : "'{$this->fixValue($val)}'";
		}
		return $values;
	}
	
	private function getColsInsertSql(){
		$cols="";
		foreach($this->values as $col => $val){
			if(!empty($cols)){
				$cols.=", \n";
			}
			$cols.="`{$col}`";
		}
		return $cols;
	}
	
	private function makeSqlList($data){
		if(is_array($data)){
			$list="";
			foreach($data as $item){
				if($list!=""){
					$list.=',';
				}
				$list.="'{$this->fixValue($item)}'";
			}
			return $list;
		}
		
		return "'{$this->fixValue($data)}'";
	}
	
	private function clausuleToStr($clausule){
		$columName=$this->fixColumn($clausule[0]);
		$operator=trim($clausule[1]);

		if($operator=='in'){
			$list=$this->makeSqlList($clausule[2]);
			if(empty($list)){
				return "false ";
			}
			$value="({$list})";
		}
		else if($operator=='=' && $clausule[2]===null){
			return " {$columName} is null ";
		}
		else if($operator=='<>' && $clausule[2]===null){
			return " {$columName} is not null ";
		}
		else{
			$value="'".$this->fixValue($clausule[2])."'";
		}

		return " {$columName} {$operator} {$value} ";
	}
	
	private function clausuleORToStr($clausuleOR){
		$clausuleOrStr="";
		foreach($clausuleOR as $clausule){
			if(!empty($clausuleOrStr)){
				$clausuleOrStr.=" or ";
			}
			$clausuleOrStr.=$this->clausuleToStr($clausule);
		}
		return " ({$clausuleOrStr}) ";
	}
	
	private function getWhereSql(){
		$clausules="";
		foreach($this->clausules as $clausule){
			if(!empty($clausules)){
				$clausules.=" \n and ";
			}
			$clausules.=$this->clausuleToStr($clausule);
		}
		
		foreach($this->clausulesOR as $clausuleOR){
			if(!empty($clausules)){
				$clausules.=" \n and ";
			}
			$clausules.=$this->clausuleORToStr($clausuleOR);
		}
		
		foreach($this->joins as $join){
			$clausules.=" \n and {$join[0]} {$join[1]} {$join[2]} ";
		}
		
		return !empty($clausules)? "where $clausules " : "";
	}
	
	private function getLimitsSql(){
		if($this->start!==null && $this->quantity!==null){
			return "limit {$this->fixValue($this->start)}, {$this->fixValue($this->quantity)}";
		}
		if($this->quantity!==null){
			return "limit {$this->fixValue($this->quantity)}";
		}
		return "";
	}
	
	private function getOrderSql(){
		$orderCols="";
		foreach($this->orders as $order){
			if(!empty($orderCols)){
				$orderCols.=", ";
			}
			$orderCols.="`{$this->fixValue($order[0])}` {$this->fixValue($order[1])}";
		}
		return !empty($orderCols)? "order by $orderCols" : "";
	}
	
	public function lock(){
		$this->execStatement("LOCK TABLE {$this->tableName} WRITE\n");
	}
	
	public function unlock(){
		$this->execStatement("UNLOCK TABLES\n");
	}
	
	public function insert(){
		$this->lock();
		$this->execStatement("insert into {$this->tableName} \n (\n{$this->getColsInsertSql()}\n) \n values \n (\n{$this->getValuesInsertSql()}\n)");
		$maxId=$this->getMaxId();
		$this->unlock();
		return $maxId;
	}
	
	public function replace(){
		$this->lock();
		$this->execStatement("replace into {$this->tableName} \n (\n{$this->getColsInsertSql()}\n) \n values \n (\n{$this->getValuesInsertSql()}\n)");
		$maxId=$this->getMaxId();
		$this->unlock();
		return $maxId;
	}
	
	public function delete(){
		$where=$this->getWhereSql();
		if(!empty($where)){
			$this->execStatement("delete from {$this->tableName} \n {$where}");
		}
	}
	
	public function truncate(){
		$this->execStatement("TRUNCATE TABLE {$this->tableName}");
	}
	
	public function optimize(){
		$this->execStatement("optimize table {$this->tableName}");
	}
	
	public function update(){
		$where=$this->getWhereSql();
		if(!empty($where)){
			$this->execStatement("update {$this->tableName} \n set {$this->getValuesUpdateSql()} \n {$where} \n {$this->getOrderSql()} \n {$this->getLimitsSql()}");
		}
	}
	
	public function makeSqlQuery(){
		$slqColums='*';
		if(!empty($this->columns)){
			$slqColums="";
			foreach($this->columns as $col){
				if($slqColums!=""){
					$slqColums.=', ';
				}
				$slqColums.=$col;
			}
		}
		
		return "select $slqColums \n from {$this->makeSqlTablesSql()} \n {$this->getWhereSql()} \n {$this->getOrderSql()} \n {$this->getLimitsSql()}";
	}
	
	private function makeSqlTablesSql(){
		$tablesSql="";
		foreach($this->tables as $tableInfo){
			if(!empty($tablesSql)){
				$tablesSql.=",";
			}
			if(!empty($tableInfo['alias'])){
				$tablesSql.="\n{$tableInfo['table']} as {$tableInfo['alias']}";
			}
			else{
				$tablesSql.="\n{$tableInfo['table']}";
			}
		}
		
		return $tablesSql;
	}
	
	public function makeSqlCountQuery(){
		return "select count(*) as total \n from {$this->makeSqlTablesSql()} \n {$this->getWhereSql()}";
	}
	
	public function load($columns=[]){
		$this->columns=$columns;
		return $this->execQuery($this->makeSqlQuery());
	}
	
	public function count(){
		$row=$this->execQueryFirst($this->makeSqlCountQuery());
		return empty($row)? 0 : $row['total'];
	}
	
	public function loadFirst(){
		$this->setLimits(0, 1);
		return $this->execQueryFirst($this->makeSqlQuery());
	}
	
	public function execQueryFirst($sql){
		$data=$this->execQuery($sql);
		foreach($data as $row){
			return $row;
		}
		return null;
	}
	
	public function execQuery($sql){
		$conn=DbConnector::getInstance();
		return $conn->execQuery($sql);
	}
	
	public function execStatement($sql){
		$conn=DbConnector::getInstance();
		return $conn->execStatement($sql);
	}
	
	public function getPrimarykey(){
		$sql="describe {$this->tableName};";
		$rows=$this->execQuery($sql);
		foreach($rows as $row){
			if($row['Key']=='PRI'){
				return $row['Field'];
			}
		}
		return "";
	}
	
	public function getColumnNames(){
		$names=[];
		$sql="describe {$this->tableName};";
		$data=$this->execQuery($sql);
		foreach($data as $row){
			$names[]=$row['Field'];
		}
		return $names;
	}
}