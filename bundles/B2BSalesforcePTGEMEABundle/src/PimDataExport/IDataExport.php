<?php

namespace B2BSalesforcePTGEMEABundle\PimDataExport;

interface IDataExport
{
    public function exportData();
    public function uploadFile();
}