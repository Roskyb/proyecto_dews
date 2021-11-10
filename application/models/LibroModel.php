<?php 

class LibroModel extends CI_Model {


	public function getGeneros()
	{
		$queryString = "SELECT distinct genero FROM libros;";
		$query = $this->db->query($queryString);
		return $query->result();
	}

	public function getLibros($genero = "")
	{
		$queryString = "SELECT idlibro, a.titulo, b.nombre as autor
						FROM libros a
						JOIN autores b on a.idautor=b.idautor";
		if($genero != "") $queryString .= " WHERE a.genero=\"$genero\"";
		
		$query = $this->db->query($queryString);
		
		return $query->result();
	}
	

	public function prestarLibro($idlibro)
	{
		$queryString = "SELECT idprestamo, count(*) as cont
						FROM prestamos
						WHERE idlibro=$idlibro";
		$query = $this->db->query($queryString)->result();
		if($query->cont < 4 && $query[0]->idprestamo){
			
			$insertString = "INSERT INTO prestamos VALUES(fecha, idlibro)";
		}
	}


}