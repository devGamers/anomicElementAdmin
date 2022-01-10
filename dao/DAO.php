<?php

abstract class DAO
{
    public abstract function readOne();

    public abstract function readAll();

    public abstract function recherche($search);
}