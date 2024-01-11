<?php

namespace ContitechCS\CatalogUIApiBundle\Security;

use Pimcore\Model\User as PimUser;
use ContitechCS\CatalogUIApiBundle\Interfaces\ConstantsInterface;

class ApiKeyUserProvider implements ConstantsInterface
{
    public function getUserDetailByApiKey($apiKey)
    {
        $usersObj = new PimUser\Listing();
        $usersObj->setCondition('apiKey="' . $apiKey . '"');
        $users = $usersObj->load();

        if (count($users)) {
            return $this->extractUserDetail($users);
            // exit;
        } else {
            throw new \Exception('User Not Found');
        }
    }

    /**
     * Extract User Detail By Object
     * @return array
     * @param array $users
     * @access private
     */
    private function extractUserDetail($users)
    {
        try {
            $detail = [];
            foreach ($users as $obj) {
                $detail['firstName'] = $obj->getFirstName();
                $detail['lastName'] = $obj->getLastName();
                $detail['type'] = $obj->getType();
                $detail['email'] = $obj->getEmail();
                $detail['userName'] = $obj->getName();
                $detail['lastLogin'] = $obj->getLastLogin();
            }

            return $detail;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }


    /**
     * Function to validate api key.
     *
     * @param Request $request
     *
     * @return boolean true/false
     *
     * @throws \Exception
     */
    public function validateApiKey()
    {
        try {
            $request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

            $apiKey = $request->headers->get('apiKey');

            $status = false;

            if (!$apiKey) {
                throw new \Exception(self::API_KEY_REQUIRED_MSG);
            }

            $usersObj = new PimUser\Listing();
            $usersObj->setCondition('apiKey="' . $apiKey . '"');
            $users = $usersObj->load();

            if (count($users)) {
                $status = true;
            }
            return $status;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
