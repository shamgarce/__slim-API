<?php
/*<script>-----------------------------------------*/
class Book {
	public $bookname='';
	public $bookprice=0;
	function __construct($bookname='',$bookprice=0){
		$this->bookname 	= $bookname;
		$this->bookprice 	= $bookprice;
	}
	public function show(){
		echo "book {$this->bookname} price :{$this->bookprice}&quot;";
	}
}
/*----------------------------------------</script>*/
?>
