<?php

namespace AppBundle\Services;

use Symfony\Component\HttpFoundation\Response;
use Pimcore\Model\Asset\Folder as AssetFolder;
use Pimcore\Model\Asset;

/**
 * Common Service
 *
 * This service will perform all the functionality those are common for actions.
 *  @author Amita Pandey
 */
class Common
{
    // get asset folder by path
    public function getFolderPath($folderObjPath, $table)
    {
        $acaFolderObj = AssetFolder::getByPath($folderObjPath);
        
        if (! is_object(AssetFolder::getByPath($folderObjPath . '/' . $table))) {
            
            $folderObj = $this->createFolder($table, $acaFolderObj);
        } else {
            $folderObj = AssetFolder::getByPath($folderObjPath . '/' . $table);
        }
        
        return $folderObj;
    }
    /** 
     * method to validate positive value 
     * @throws checkInteger
     */
        public static function checkInteger($object,$int,$keys) {
        $keyFields = '';
       if (gettype($int)=='object' && substr(strval($int), 0, 1) == "-" ){
                $keyFields =  $object->getClass()->getFieldDefinitions()[$keys]->getTitle();
            }
            return $keyFields ;
    }

    /** 
     * method to validate Required value 
     * @throws checkRequired
     */    
    public static function checkRequired($object,$int,$keys) {
        $keyFields = '';
       if ($int==''){
                $keyFields =  $object->getClass()->getFieldDefinitions()[$keys]->getTitle();
       }
            return $keyFields ;
    }
    /** 
     * method to validate AlphaNumeric 
     * @throws checkAlphaNumeric
     */    
    public static function checkAlphaNumeric($object,$int,$keys) {
        $keyFields = '';
        if (preg_match('/^[a-z\d]+$/i', $int) && preg_match('/[a-z]/i', $int) && preg_match('/\d/', $int)) {
                //retrun false ;
        }else {
            $keyFields =  $object->getClass()->getFieldDefinitions()[$keys]->getTitle();
            return $keyFields ;
        }
    }
    /** 
     * method to validate character 
     * @throws checkChar
     */
    public static function checkChar($object,$int,$keys) {
        $keyFields = '';
        if (preg_match('/[a-zA-Z]/',$int) && !preg_match( '/\d/',$int) && !preg_match('/[^a-zA-Z\d]/',$int)) {
                //retrun false ;
        }else {
            $keyFields =  $object->getClass()->getFieldDefinitions()[$keys]->getTitle();
            return $keyFields ;
        }
    }
 
    /** 
     * method to validate email 
     * @throws checkEmail
     */   
    public static function checkEmail($object,$email,$keys) {
        $keyFields = '';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $keyFields =  $object->getClass()->getFieldDefinitions()[$keys]->getTitle();
            return $keyFields ;
        }
    }

    /** 
     * method to validate range 
     * @throws checkRange
     */
    public static function checkRange($object,$int,$keys) {
        
        if(gettype($int)=='object'){
            $var = $int->getvalue();
        }else {
           $var = $int ; 
        }
        if (!($var >= RANGE_FROM && $var <= RANGE_TO)) {
            $keyFields =  $object->getClass()->getFieldDefinitions()[$keys]->getTitle();
            return $keyFields ;
        }
    }
    /** 
     * method to validate number fields
     * @param type $getSbject
     * @throws validateFields
     */
    public static function validateFields($object = null, $fieldsToValidate = array()) {
       $checkIntegerResponse =array();
       $checkRequiredResponse =array();
       $checkAlphaNumericResponse =array();
       $checkRangeResponse =array();
       $checkCharResponse =array();
       $checkEmailResponse =array();
       
       if(!empty($fieldsToValidate)){     
           foreach($fieldsToValidate as $key=>$fieldValue){
             $fild = "get$key"; 
            $valueToValidate = $object->$fild();

                foreach($fieldValue as $validationKey){

                    if($validationKey==CHECK_INTEGER) {
                            $checkIntegerResponse[] = self::checkInteger($object,$valueToValidate,$key);            
                    }
                    if($validationKey==CHECK_REQUIRED) {
                            $checkRequiredResponse[] = self::checkRequired($object,$valueToValidate,$key);            
                    }
                    if($validationKey==CHECK_ALPHANUMERIC) {
                            $checkAlphaNumericResponse[] = self::checkAlphaNumeric($object,$valueToValidate,$key);            
                    }
                    if($validationKey==CHECK_RANGE) {
                       
                            $checkRangeResponse[] = self::checkRange($object,$valueToValidate,$key);            
                    }
                    if($validationKey==CHECK_CHARACTER) {
                            $checkCharResponse[] = self::checkChar($object,$valueToValidate,$key);            
                    }
                    if($validationKey==CHECK_EMAIL) {
                            $checkEmailResponse[] = self::checkEmail($object,$valueToValidate,$key);            
                    }
                }
            }
            
            if(!empty(array_filter($checkRequiredResponse))){

                            $msg[] = implode(",\n",array_filter($checkRequiredResponse)).VALIDATE_BLANK_VALUE; 
            }
            if(!empty(array_filter($checkIntegerResponse))){

                            $msg[] = implode(",\n",array_filter($checkIntegerResponse)).VALIDATE_QUANTITY_VALUE; 
            } 
            if(!empty(array_filter($checkAlphaNumericResponse))){

                            $msg[] = implode(",\n",array_filter($checkAlphaNumericResponse)).VALIDATE_ALPHANUMERIC_VALUE; 
            }
            if(!empty(array_filter($checkCharResponse))){

                            $msg[] = implode(",\n",array_filter($checkCharResponse)).VALIDATE_CHAR_VALUE; 
            }
            if(!empty(array_filter($checkEmailResponse))){

                            $msg[] = implode(",\n",array_filter($checkEmailResponse)).VALIDATE_EMAIL; 
            }
            if(!empty(array_filter($checkRangeResponse))){

                            $msg[] = implode(",\n",array_filter($checkRangeResponse)).VALIDATE_RANGE.RANGE_FROM.'-'.RANGE_TO; 
            }
             if(!empty($msg)){
                throw new \Pimcore\Model\Element\ValidationException(implode(",\n",($msg)), 500); 
             }
        }
       
    }
    
    /**
     *
     * @param $key
     * @param $parentObj
     * @return \Pimcore\Model\DataObject\AbstractObject|Folder|bool
     */
    public function createFolder($key, $parentObj)
    {
        try {
            if ($key) {
                $folderObj = new AssetFolder();
                if ($parentObj) {
                    if ($parentObj instanceof AssetFolder) {
                        $folderObj->setParent($parentObj);
                    } else {
                        return false;
                    }
                }
                
                $folderObj->setFilename($key);
                return $folderObj->save();
            }
            return false;
        } catch (\Exception $ex) {
            print_r($ex); die;
        }
    }
    
    /**
     * This function is used for getting folder id.
     *
     * @param array
     * @return N\A
     * @author Amita Pandey
     * @throws \HttpException
     */
    public static function getFolderId($fullPath, $folderName, $parentObj = ''){
                
        $folderObj = \Pimcore\Model\DataObject::getByPath('/'.$fullPath);        
        if($folderObj) {
            return $folderObj->getId();
        } else {
            $folderObj = new \Pimcore\Model\DataObject\Folder();
            $folderObj->setParentId( ($parentObj) ? $parentObj : 1 );
            $folderObj->setKey( $folderName );
            $folderObj->save();
            return $folderObj->getId();
        }
    }    
    
    /**
     * This function is used for sending the mail
     * @param type $subject
     * @param type $message
     * @param type $email
     */
    public function sendMail($subject, $message, $email)
    {        
         //sending an email document (pimcore document)
        $mail = new \Pimcore\Mail();
                
        $mail->addTo( [$email] );
        $mail->setBodyHtml( $message );
        //$mail->setDocument('/email/registerCustomer');
        //$mail->setParams();
        $mail->setSubject( $subject );
        
        $mail->send();
        
    }

    /**
     * method to get protected value
     * @param type $accessProtected
     * @throws accessProtected
     */
     public static function accessProtected($fieldObj) {
        $name = 'value';
        $prefix = chr(0) . '*' . chr(0);
        return $fieldObj[$prefix . $name];
     }  
     /**
     * method to validate import file
     * @param type $validateImportFile
     * @throws validateImportFile
     */
      public function validateImportFile($inputFile){
            
            $fileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFile);
            $approvedFormat = array('csv', 'xlsx');
            if (!file_exists($inputFile)) {
                return $error = $inputFile . " was not found" ;
                die;
            }
            if (!is_readable($inputFile)) {
                return $error = $inputFile . " does not have read permission" ;
                die;
            }
            if (in_array(strtolower($fileType), $approvedFormat)){
                
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($fileType);
                $reader->setReadDataOnly(TRUE);
                $spreadsheet = $reader->load($inputFile);
                $worksheet = $spreadsheet->getActiveSheet();
                $worksheetData = $reader->listWorksheetInfo($inputFile);

                // Get the highest row and column numbers referenced in the worksheet
                $highestRow = $worksheet->getHighestDataRow(); // e.g. 10
                $highestColumn = $worksheet->getHighestDataColumn();
                $lastRowLastColumn = $highestColumn . $highestRow;
                
                if(count($worksheetData)>1){
                    return $errormsg = "Can not add multiple worksheet.";
                    die;
                }
                else {
                    $rowData = $spreadsheet->getActiveSheet()->rangeToArray("A1:$lastRowLastColumn",NULL,TRUE,TRUE,FALSE); 
                    return $rowData ;
                }
                    
            } else {
                return $error = "Given file format is not supported";
                die;
            }
        }   


    /**
     * This function is used for getting language
     * @param type $language
     */
    public function getLanguage()
    {        
      $languages = \Pimcore\Tool::getValidLanguages(); 
        return $languages ;
    }  

    
}
