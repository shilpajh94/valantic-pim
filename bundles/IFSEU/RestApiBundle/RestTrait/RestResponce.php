<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @package    RestApiBundle
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */
namespace IFSEU\RestApiBundle\RestTrait;

use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Tool\Utils;

trait RestResponce
{

    /**
     * Method to convert data to JSON Response
     *
     * @param array $data
     * @param int $status
     *
     * @return JsonResponse
     */
    public function jsonResponce($data, $status = 200)
    {
        $objRes = new JsonResponse();
        $objRes->setStatusCode($status);
        $objRes->setData($data);
        return $objRes;
    }

    /**
     * Method to get appropriate error response.
     *
     * @param string $type
     * @param string $message
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function responseCode($type, $message = '')
    {
        try {
            $arr = array();
            $arr['ObjectNotFound'] = array('code' => 404, 'message' => 'No Record Found');
            $arr['BadRequest'] = array('code' => 400, 'message' => 'Bad Request');
            $arr['MissingApiKey'] = array('code' => 403, 'message' => 'Missing Api Key');
            $arr['InvalidApiKey'] = array('code' => 403, 'message' => 'Invalid API Key');
            $arr['MissingId'] = array('code' => 400, 'message' => 'Bad Request');
            $arr['InsufficientPermissions'] = array('code' => 403, 'message' => 'Access Denied');

            if (isset($arr[$type]) && $arr[$type] != null) {
                $response['code'] = $arr[$type]['code'];
                $response['response']['status'] = 'false';
                $response['response']['message'] = $message ? $message : $arr[$type]['message'];
            } else {
                throw new \Exception('Please set a valid response type.');
            }
            return $response;
        } catch (\Exception $exec) {
            throw new \Exception($exec);
        }
    }
}
