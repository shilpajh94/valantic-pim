<?php

namespace ContitechCS\CatalogUIApiBundle\Services;

use Pimcore\Log\Handler\ApplicationLoggerDb;
use Symfony\Component\HttpFoundation\Response;

class Rest
{
    public static function output($status = true, $msg = '', $httpcode = 200, $data = [])
    {
        try {
            if ($status == false && $httpcode == 200) {
                $httpcode = 400;
            }
            return new Response(json_encode(['status' => $status, 'code' => $httpcode,
                'data' => $data, 'msg' => $msg]), $httpcode, ['content-type' => 'application/json']);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
