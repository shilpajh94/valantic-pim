<?php

namespace B2BTranslationBundle\PimDataImport;

interface IDataImport
{
    public function importData();
    public function downloadFile();
}
