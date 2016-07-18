<?php
	class Database extends PDO{
		function __construct($DB_TYPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASS){
			parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME,$DB_USER,$DB_PASS);
		}

		public function proccessRows($rowSet,$singleRow = false,$fetchMode){
			$rowSet->execute();
			$result = $rowSet->fetchAll($fetchMode);
			if($singleRow == true && $result){
				return $result[0];
			}
			return $result;
		}

		public function select($sql,$array = array(),$singleSelect = false,$fetchMode = PDO::FETCH_ASSOC){
			$sth = $this->prepare($sql);
			if(!empty($array)){		
				foreach($array as $key => $value){
					$sth->bindValue("$key",$value);
				}
			}
			return $this->proccessRows($sth,$singleSelect,$fetchMode);

		}

		public function insert($table,$data){
			ksort($data);
			$fieldNames = implode('`,`', array_keys($data));
			$fieldValue = ':'.implode(', :', array_keys($data));
			$sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValue)");
			

			foreach ($data as $key => $value) {
				$sth->bindValue(":$key",$value);
			}
			$sth->execute();
		}

		public function update($table,$data,$where){
			ksort($data);
			$fieldDetails = null;
			foreach ($data as $key => $value) {
				$fieldDetails .= "`$key` = :$key, ";
			}
			$fieldDetails = rtrim(trim($fieldDetails),",");
			$sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
			foreach ($data as $key => $value) {
				$sth->bindValue(":$key",$value);
			}
			$sth->execute();

		}








		public static function secureNumber($num){
			$num = trim($num);
			$num = stripslashes($num);
			$num = htmlspecialchars($num);
			$num = filter_var($num,FILTER_VALIDATE_INT);
			$num = addslashes($num);
			return $num;
		}
		public static function secureString($str){
			$str = trim($str);
			$str = stripslashes($str);
			$str = htmlspecialchars($str);
			$str = addslashes($str);
			return $str;
		}


	}
?>