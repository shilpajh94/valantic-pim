<?php

namespace B2BSalesforcePTGEMEABundle\PimDataImport;

interface IDataImport
{
    public function importData();
    public function downloadFile();
}