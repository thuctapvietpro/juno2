<?php
include_once("Database.php");
class Pagination extends Database
{
	protected $page = NULL;
	protected $rows_per_page = NULL;
	protected $per_row = NULL;
	
	protected $total_rows = NULL;
	protected $total_pages = NULL;
	protected $list_pages = '';

	protected $prev = null;
	protected $next = null;

	protected $table = "users";


	
	
	
	public function __construct(){
		$this->connect();	
	}
	
	public function set_page($pagekey = 'page')
	{
		if (isset($_GET[$pagekey]) && $_GET[$pagekey] != '' && (int)$_GET[$pagekey]) {

			$this->page = $_GET[$pagekey];

		} else {

			$this->page = 1;
		}
	}
	
	public function get_page(){
		return $this->page;
	}
	//
	public function set_rows_per_page($rows_per_page){
		$this->rows_per_page = $rows_per_page;
	}
	
	public function get_rows_per_page(){
		return $this->rows_per_page;
	}
	//
	public function set_per_row(){
		$this->per_row = $this->page*$this->rows_per_page - $this->rows_per_page;
	}
	
	public function get_per_row(){
		return $this->per_row;
	}
	
	//
	public function set_total_rows (){
		$sql = "SELECT * FROM $this->table";
		$this->query($sql);
		$this->total_rows = $this->num_rows($sql);
	}
	
	public function get_total_rows(){
		return $this->total_rows;
	}
	//
	public function set_total_pages(){
		$this->total_pages = ceil($this->total_rows/$this->rows_per_page);
	}
	
	public function get_total_pages(){
		return $this->total_pages;
	}
	//
	public function set_list_pages($filename = 'Pagination', $strparam = null){

		$this->prev = ($this->page - 1);

		if ($this->page == 1) {
			$this->prev = 1;
		}
		if ($this->page != 1) {
			$this->list_pages .= '<li><a href="'.$filename.'.php?'.$strparam.'&page='.$this->prev.'">&laquo;</a></li>';
		}

		for($i = 1; $i<= $this->total_pages; $i++){
			if($i == $this->page){
				$this->list_pages.='<li class="active"><span>'.$i.'</span></li>';
			}
			else{
				$this->list_pages.='<li><a href = "'.$filename.'.php?'.$strparam.'&page='.$i.'">'.$i.'</a></li>';
			}
		}

		$this->next = ($this->page + 1);

		if ($this->page == $this->total_pages) {
			$this->next = $this->total_pages;
		}

		if ($this->page < $this->total_pages) {
			$this->list_pages.= '<li><a href="'.$filename.'.php?'.$strparam.'&page='.$this->next.'">&raquo;</a></li>';
		}
	}
	
	public function get_list_pages(){
		return $this->list_pages;
	}

	public function set_row()
	{
		$sql = "SELECT * FROM {$this->table} LIMIT $this->per_row,$this->rows_per_page";
		$this->query($sql);
	}
	
}	
	
	
	
