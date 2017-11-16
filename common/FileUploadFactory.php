<?php
define ( 'SAVEFILEMODE', 'file' );
class FileUploadFactory {
	// 参数有file,aliyunoss,sae
	var $fileuploader;
	function __construct($type = 'file') {
		switch ($type) {
			case 'aliyunoss' :
				require_once ('AliyunossFileUpoad.php');
				$this->fileuploader = new AliyunossFileUpoad ();
				// code...
				break;
			case 'sae' :
				$this->fileuploader = new SAEFileUpload ();
				break;
			default :
				require_once ('FileUpload.php');
				$this->fileuploader = new FileUpload ();
				break;
		}
	}
	function SaveRemotePic($picurl, $webroot) {
		return $this->fileuploader->SaveRemotePic ( $picurl, $webroot );
	}
	function SaveFormFile($formfiledata, $filename = '', $path) {
		return $this->fileuploader->SaveFormFile ( $formfiledata, $filename, $path );
	}
	function SaveFile($filecontent, $extension, $webroot) {
		return $this->fileuploader->SaveFile ( $filecontent, $extension, $webroot );
	}
}