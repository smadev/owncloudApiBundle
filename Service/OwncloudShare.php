<?php

namespace Syren7\OwncloudApiBundle\Service;

use Syren7\OwncloudApiBundle\lib\ocs;
use Sabre\DAV\Exception;

class OwncloudShare {
	/**
	 * @var ocs $ocs
	 */
	protected $ocs;

	/**
	 * OwncloudApiShare constructor.
	 *
	 * @param string $ocHost
	 * @param string $ocUser
	 * @param string $ocPass
	 */
	public function __construct($ocHost, $ocUser, $ocPass) {
            $this->ocs = new ocs($ocHost, $ocUser, $ocPass, ocs::OCS_OWNCLOUD_FILE_SHARING);
	}

	/**
         *
         * @param string $path
         * @param integer $shareType
         * @param string $shareWith group Id
         * @return boolean
         */
	public function share($path, $shareType, $shareWith) {
            $response = $this->ocs->request('', array(
                'path' 	=> $path,
                'shareType' => $shareType,
                'shareWith' => $shareWith
            ));
            return $response->getStatusCode() == 100;
	}
}