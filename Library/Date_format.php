<?php 
    class date_format {
    	/**
    	 * @Access		:	Public
    	 * @Function	:	get_formatted_date
    	 * @Description	:	Function to change the date format as required MM/DD/YYYY to YYYY-MM-DD Format
    	 * @Param		:	Date
    	 */
        public function get_formatted_date($date) {
        	$converted_date = new DateTime($date);
			return $converted_date->format('Y-m-d');
    	}
        
        /**
    	 * @Access		:	Public
    	 * @Function	:	get_formatted_date1
    	 * @Description	:	Function to change the date format as required X to F d, Y Format
    	 * @Param		:	Date
    	 */
        public function get_formatted_date1($date) {
        	$converted_date = new DateTime($date);
			return $converted_date->format('F d, Y');
    	}
        
        public function get_formatted_date2($date) {
        	$converted_date = new DateTime($date);
			return $converted_date->format('m/d/Y');
    	}
        
        /**
    	 * @Access		:	Public
    	 * @Function	:	validate_date
    	 * @Description	:	Function to check the date format
    	 * @Param		:	Date
         * @Return		:	True/False
    	 */
        public function validate_date($date, $format = 'F d,Y'){
            $d = DateTime::createFromFormat($format, $date);
            return $d && $d->format($format) == $date;
		}
		
		//Login + Job 
		// global variable is required like messages
		// for variable we will test with $GLOBALS['z'] which is PHP
		// for function -> look for some design patterns
		// for class -> look for some design patterns
		// for interface -> design patern
		// 
    }
?>