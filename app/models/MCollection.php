<?php
	// MCollection is a basic tool to be able to create
	// models for mongodb
	// Since mongodb uses collections, and not tables
 	// the class name will be the same as the collection name to be able to be rendered properly
	// see Users.php
	class MCollection{

		/* Connection String
		---------------------*/
		protected static $conn = null;


		public function __construct(){

			if(self::$conn == null){
				self::$conn = LMongo::collection(get_called_class());
			}
		}

		/*	use this to call every instance
			as a convention.
		-------------------------------------*/
		public static function instance(){
			$class = get_called_class();
			if($class::$conn != null){
				return $class::$conn;
			}else{
				$coll = new $class;
				return $class::instance();
			}
		}

	}
