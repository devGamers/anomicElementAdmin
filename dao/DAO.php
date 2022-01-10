<?php

abstract class DAO
{
    public abstract function ajouter();

    public abstract function modifier();

    public abstract function supprimer();

    public abstract function readOne();

    public abstract function readAll();

    public abstract function recherche($search);
}