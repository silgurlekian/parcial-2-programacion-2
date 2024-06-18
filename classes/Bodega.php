<?php

class Bodega
{
    private int $id;
    private string $nombre;
    private string $ubicacion;

    /**
     * Devuelve todas las bodegas
     * 
     * @return array Array de objetos Bodega
     */
    public static function listaCompleta(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM bodegas";

        $statement = $conexion->prepare($query);
        $statement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $statement->execute();

        return $statement->fetchAll();
    }

    /**
     * Obtiene una bodega por su ID
     * 
     * @param int $id ID de la bodega
     * @return Bodega|null Objeto Bodega encontrado o null si no existe
     */
    public static function obtenerPorId(int $id): ?Bodega
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM bodegas WHERE id = :id";

        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $statement->execute();

        return $statement->fetch() ?: null;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @param string $nombre
     * @return self
     */
    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * Get the value of ubicacion
     */
    public function getUbicacion(): string
    {
        return $this->ubicacion;
    }

    /**
     * Set the value of ubicacion
     *
     * @param string $ubicacion
     * @return self
     */
    public function setUbicacion(string $ubicacion): self
    {
        $this->ubicacion = $ubicacion;
        return $this;
    }
}
