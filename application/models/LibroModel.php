<?php

class LibroModel extends CI_Model
{


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
		if ($genero != "") $queryString .= " WHERE a.genero=\"$genero\"";

		$query = $this->db->query($queryString);

		return $query->result();
	}


	public function prestarLibro($idlibro)
	{
		$queryString = "SELECT idprestamo, count(*) as cont
						FROM prestamos
						WHERE idlibro=$idlibro";
		$query = $this->db->query($queryString)->result();
		if ($query[0]->cont < 4 && $query[0]->idprestamo) {
			$fechaHoy = date("Y-m-d");
			$insertString = "INSERT INTO prestamos (fecha, idlibro) VALUES(\"$fechaHoy\", $idlibro)";
			$queryInsert = $this->db->query($insertString);
			return $queryInsert ? $query[0]->idprestamo : false;
		} else return false;
	}
}
