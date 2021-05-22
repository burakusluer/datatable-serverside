<?php
/**
 * Created by PhpStorm.
 * User: Burak
 * Date: 22.05.2021
 * Time: 12:21
 */

class dataBaseCon extends PDO {
	public function __construct( $dsn = "mysql:host=localhost;dbname=northwind;charset=utf8", $username = "root", $passwd = "", $options = array() ) {
		parent::__construct( $dsn, $username, $passwd, $options );
	}

	public function getCustomers( $limit = 10, $offset = 0, $search = null ) {
		if ( $search == null ) {
			try {
				$prep = $this->prepare( "SELECT * FROM customers LIMIT $limit OFFSET $offset" );
				if ( $prep->execute() ) {
					return $prep->fetchAll( PDO::FETCH_ASSOC );
				} else {
					return $prep->errorCode();
				}
			} catch ( PDOException $exception ) {
				return $exception->getMessage();
			}
		}else{
			try {
				$prep = $this->prepare( "SELECT * FROM customers WHERE 
id LIKE :lik 
or  company LIKE :lik
or  customers.last_name LIKE :lik
or  customers.first_name LIKE :lik
or  customers.email_address LIKE :lik
or  customers.job_title LIKE :lik
or  customers.business_phone LIKE :lik
or  customers.home_phone LIKE :lik
or  customers.mobile_phone LIKE :lik
or  customers.fax_number LIKE :lik
or  customers.address LIKE :lik
or  customers.city LIKE :lik
or  customers.state_province LIKE :lik
or  customers.zip_postal_code LIKE :lik
or  customers.country_region LIKE :lik
or  customers.web_page LIKE :lik
or  customers.notes LIKE :lik
or  customers.attachments LIKE :lik
LIMIT $limit OFFSET $offset" );
				if ( $prep->execute( array( ":lik"=>"%$search%" ) ) ) {
					return $prep->fetchAll( PDO::FETCH_ASSOC );
				} else {
					return $prep->errorCode();
				}
			} catch ( PDOException $exception ) {
				return $exception->getMessage();
			}
		}
	}

	public function countRows() {
		    try {
		            $prep = $this->prepare("select count(*) as 'total' from customers");
		            if ($prep->execute()){
		                return $prep->fetch(PDO::FETCH_ASSOC);
		            }else{
		                return $prep->errorCode();
		            }
		        } catch (PDOException $exception) {
		           return $exception->getMessage();
		        }
	}

	public function likeQueryTotal($search = null  ) {
		try {
			$prep = $this->prepare( "SELECT count(*) as 'total' FROM customers WHERE 
id LIKE :lik 
or  company LIKE :lik
or  customers.last_name LIKE :lik
or  customers.first_name LIKE :lik
or  customers.email_address LIKE :lik
or  customers.job_title LIKE :lik
or  customers.business_phone LIKE :lik
or  customers.home_phone LIKE :lik
or  customers.mobile_phone LIKE :lik
or  customers.fax_number LIKE :lik
or  customers.address LIKE :lik
or  customers.city LIKE :lik
or  customers.state_province LIKE :lik
or  customers.zip_postal_code LIKE :lik
or  customers.country_region LIKE :lik
or  customers.web_page LIKE :lik
or  customers.notes LIKE :lik
or  customers.attachments LIKE :lik" );
			if ($prep->execute(array( ":lik"=>"%$search%" ))){
				return $prep->fetch(PDO::FETCH_ASSOC);
			}else{
				return $prep->errorCode();
			}
		} catch (PDOException $exception) {
			return $exception->getMessage();
		}
	}

}